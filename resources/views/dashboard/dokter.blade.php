@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Dokter</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
</div>
@endsection
