@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="date-navigation">
    <form method="GET" action="{{ route('admin') }}" class="date-navigation__form">
        <!-- 前日の日付リンク -->
        <a href="{{ route('admin', ['date' => $yesterday->format('Y-m-d')]) }}" class="date-navigation__button">&lt;</a>

        <!-- 現在の選択日付の表示 -->
        <span class="date-navigation__current">{{ $today->format('Y-m-d') }}</span>

        <!-- 翌日の日付リンク -->
        <a href="{{ route('admin', ['date' => $tomorrow->format('Y-m-d')]) }}" class="date-navigation__button">&gt;</a>
    </form>
</div>

<div class="attendance-table">
    <table class="attendance-table__inner">
        <tr class="attendance-table__row">
            <th class="attendance-table__header">名前</th>
            <th class="attendance-table__header">勤務開始</th>
            <th class="attendance-table__header">勤務終了</th>
            <th class="attendance-table__header">休憩時間</th>
            <th class="attendance-table__header">勤務時間</th>

        </tr>
        @foreach ($attendances as $attendance)
        <tr class="attendance-table__row">
            <td class="attendance-table__item">{{ $attendance->user_name }}</td>
            <td class="attendance-table__item">{{ $attendance->start }}</td>
            <td class="attendance-table__item">{{ $attendance->end }}</td>
            <td class="attendance-table__item">{{ $attendance->totalRestTime }}</td>
            <td class="attendance-table__item">{{ $attendance->totalWorkTime }}</td>
        </tr>
        @endforeach
    </table>

    <div class="pagination-container">

        {{ $attendances->links() }}
    </div>
</div>

@endsection