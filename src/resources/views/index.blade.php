@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__content">
    <div class="attendance__alert">
        <h2>{{ $user->name }}さんお疲れ様です！</h2>
    </div>

    <div class="attendance__panel">
        @csrf
        <!-- 勤務開始ボタン -->
        <div class="attendance__button">
            <a href="{{ route('attendance.start') }}">
                <button class="attendance__button-submit" type="button">勤務開始</button>
            </a>
        </div>

        <!-- 勤務終了ボタン -->
        <div class="attendance__button">
            <a href="{{ route('attendance.end') }}">
                <button class="attendance__button-submit" type="button">勤務終了</button>
            </a>
        </div>

        <!-- 休憩開始ボタン -->
        <div class="attendance__button">
            <a href="{{ route('attendance.restStart') }}">
                <button class="attendance__button-submit" type="button">休憩開始</button>
            </a>
        </div>

        <!-- 休憩終了ボタン -->
        <div class="attendance__button">
            <a href="{{ route('attendance.restEnd') }}">
                <button class="attendance__button-submit" type="button">休憩終了</button>
            </a>
        </div>
    </div>
</div>
@endsection