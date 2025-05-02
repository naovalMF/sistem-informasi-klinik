@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard Dokter</h2>
    <p>Selamat datang, {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>
</div>
@endsection
