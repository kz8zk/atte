<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Rest;
use App\Models\User;
use Carbon\Carbon;

class TimeManagementController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date');
        $today = Carbon::today();  // デフォルトは今日の日付

        if ($date) {
            // ユーザーが選択した日付をCarbonインスタンスに変換
            $today = Carbon::parse($date);
        }

        // 昨日と明日の日付を取得
        $yesterday = $today->copy()->subDay(1);
        $tomorrow = $today->copy()->addDay(1);


        // 出席情報を取得
        $attendances = Attendance::select('attendances.*', 'users.name as user_name')
            ->leftJoin('users', 'users.id', '=', 'attendances.user_id')
            ->where('attendances.date', $today->format('Y-m-d'))
            ->paginate(5);

        foreach ($attendances as $attendance) {
            $totalRestTime = 0;

            // 各休憩の時間を合計
            foreach ($attendance->rests as $rest) {
                $start = Carbon::parse($rest->start);
                $end = Carbon::parse($rest->end); // 終了時間は必ず取得

                // 休憩時間を計算して加算
                $totalRestTime += $end->diffInSeconds($start);
            }

            // 勤務の開始と終了時間を取得
            $workStart = Carbon::parse($attendance->start);
            $workEnd = Carbon::parse($attendance->end); // 終了時間は必ず取得

            // 勤務時間を計算
            $totalWorkTime = $workEnd->diffInSeconds($workStart) - $totalRestTime;

            // 時間をh:i:s形式に変換
            $attendance->totalRestTime = gmdate('H:i:s', $totalRestTime);
            $attendance->totalWorkTime = gmdate('H:i:s', $totalWorkTime);
        }

        return view('admin', compact('attendances', 'today', 'yesterday', 'tomorrow'));
    }

    // 勤務開始処理
    public function start()
    {
        // ログイン中のユーザーIDを取得
        $userId = auth()->user()->id;

        // 今日の日付を取得
        $today = Carbon::today();

        // 既に勤務開始が登録されているか確認
        $attendance = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->first();

        if (!$attendance) {
            // 勤務開始データを保存
            Attendance::create([
                'user_id' => $userId,
                'start' => Carbon::now(),
                'date' => $today,
            ]);
        }

        // 勤務開始後、再度トップページにリダイレクト
        return redirect('/');
    }

    // 勤務終了処理
    public function end()
    {
        // ログイン中のユーザーIDを取得
        $userId = auth()->user()->id;

        // 今日の日付を取得
        $today = Carbon::today();

        // 勤務開始データを取得
        $attendance = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->first();

        if ($attendance && !$attendance->end) {
            // 勤務終了時間を保存
            $attendance->update([
                'end' => Carbon::now(),
            ]);
        }

        // 勤務終了後、再度トップページにリダイレクト
        return redirect('/');
    }

    // 休憩開始処理
    public function restStart()
    {
        $userId = auth()->user()->id;
        $today = Carbon::today();

        $attendance = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->first();

        // 休憩が既に開始されていないか確認
        if ($attendance && !$attendance->rests()->whereNull('end')->exists()) {
            Rest::create([
                'attendance_id' => $attendance->id,
                'start' => Carbon::now(),
            ]);
        }

        // 休憩開始後、再度トップページにリダイレクト
        return redirect('/');
    }

    // 休憩終了処理
    public function restEnd()
    {
        $userId = auth()->user()->id;
        $today = Carbon::today();

        $attendance = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->first();

        // 未終了の休憩を取得して終了時間を記録
        if ($attendance) {
            $rest = $attendance->rests()->whereNull('end')->latest()->first();
            if ($rest) {
                $rest->update(['end' => Carbon::now()]);
            }
        }

        // 休憩終了後、再度トップページにリダイレクト
        return redirect('/');
    }
}
