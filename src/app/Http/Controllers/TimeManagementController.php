<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Rest;
use App\Models\User;
use Carbon\Carbon;

class TimeManagementController extends Controller
{
    //
    // public function index()
    // {
    //     $today = Carbon::today();

    public function index(Request $request)
    {
        $date = $request->input('date');
        if (isset($date)) {
            $today = Carbon::parse($date);
            $yesterday = $today->copy()->subDay(1)->format('Y-m-d');
            $tomorrow = $today->copy()->addDay(1)->format('Y-m-d');
            $attendances = Attendance::select('attendances.*', 'users.name as user_name')
            ->leftJoin('users', 'users.id', 'attendances.user_id')
            ->where('attendances.date', $date)
                ->paginate(5);
        } else {
            $today = Carbon::today();
            $yesterday = $today->copy()->subDay(1)->format('Y-m-d');
            $tomorrow = $today->copy()->addDay(1)->format('Y-m-d');
            $date = $today->format('Y-m-d');
            $attendances = Attendance::select('attendances.*', 'users.name as user_name')
            ->leftJoin('users', 'users.id', 'attendances.user_id')
            ->where('attendances.date', $date)
                ->paginate(5);
        }
        // $date = $request->input('date');

        // if (isset($date)) {
        //     $today = Carbon::parse($date);
        //     $yesterday = $today->copy()->subDay(1)->format('Y-m-d');
        //     $tomorrow = $today->copy()->addDay(1)->format('Y-m-d');
        //     $attendances = Attendance::where('date', $date)->paginate(5);
        // } else {
        //     $today = Carbon::today();
        //     $yesterday = $today->copy()->subDay(1)->format('Y-m-d');
        //     $tomorrow = $today->copy()->addDay(1)->format('Y-m-d');
        //     $date = $today->format('Y-m-d');
        //     $attendances = Attendance::where('date', $date)->paginate(5);
        // };


        // // $users = User::select('users.name as user_name', 'attendances.start as start', 'attendances.end as end')
        // //     ->leftJoin('attendances', 'users.id', 'attendances.user_id')
        // //     ->paginate(5);
        // // // ->get();

        // // print_r($users->toArray());
        // // exit;
        // foreach ($users as $user) {
        // }
        //ここから
        // $attendances = Attendance::select('attendances.*', 'users.name as user_name')
        //     ->leftJoin('users', 'users.id', 'attendances.user_id')
        //     ->paginate(5);
        // ここまで
        // print_r($attendances->toArray());
        // exit;


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


        $today = $today->format('Y-m-d');
        return view('admin', compact('attendances', 'today'));
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
                'start' => Carbon::now(),  // 勤務開始時間
                'date' => $today,          // 今日の日付
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
                'end' => Carbon::now(),  // 勤務終了時間
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


        // 変更追加
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

        // if ($attendance && !$attendance->break_end) {
        //     $attendance->update([
        //         'break_end' => Carbon::now(),
        //     ]);
        // }

        // 変更追加
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
