@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Selamat datang, {{ auth()->user()->name }} ({{ auth()->user()->role }})</h2>
    </div>
@endsection
