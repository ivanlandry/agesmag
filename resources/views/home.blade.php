@extends('layouts.app')


@section('content')
    @include('layouts.partials.header')

    @if(session()->has('message'))
        <div class="container">
            <div class="alert alert-success text-center">
                <span >{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif



    @include('layouts.partials.footer')
@endsection
