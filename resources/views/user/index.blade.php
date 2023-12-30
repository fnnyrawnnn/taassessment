@extends('main')
@section('title', 'Employee')
@section('dashboard', 'active')
@section('content')
<h1>Halo, {{ Auth::user()->name }}</h1>
@endsection
