@extends('layouts.app'){{--Trang này kế thừa layout app.blade.php--}} 

@section('title','Trang chu - Online Store')


{{-- "@section" là nơi cung cấp nội dung ở trang con. --}}
@section('content')
<div class="text-center">
   <a href="{{ route('home') }}">Chao mung den voi ung dung Online Store!</a>
   <a href="{{ route('home.about') }}">About</a>
</div>

@endsection

