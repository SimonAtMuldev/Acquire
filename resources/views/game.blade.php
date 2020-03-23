@extends('layouts.site-template')

@section('content')
    <App id="app" :user="{{ auth()->user() }}"></App>
@endsection
