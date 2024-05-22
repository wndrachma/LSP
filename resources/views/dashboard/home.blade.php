@extends('dashboard.main')
@section('title', 'Dashboard')

@section('nav')
    @include('dashboard.nav')
@endsection

@section('top')
    @include('dashboard.top')
@endsection
@section('page', 'Dashboard')

@section('content')
    @include('dashboard.index')
@endsection