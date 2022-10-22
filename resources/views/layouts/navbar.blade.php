@extends('layouts.app')

@section('navbar')

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">@lang('app.navbarBrand')</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('user.about') }}">@lang('app.navbarAbout')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.dynamic1') }}">@lang('app.navbarBrands')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.contacts') }}">@lang('app.navbarContacts')</a>
                </li>
            </ul>
        </div>
        <a href="{{ route('user.profile') }}"><button class="btn btn-info"><i class="bi bi-person-circle"></i></button></a>
    </div>
</nav>

@yield('content')

@endsection