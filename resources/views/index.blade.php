@extends('layouts.app')
@section('content')
    @include('partials.landingPage')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
