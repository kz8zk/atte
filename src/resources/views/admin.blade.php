@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="date-display">
    <h2>{{ $today }}</h2>
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