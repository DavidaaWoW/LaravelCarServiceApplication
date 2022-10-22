@extends('layouts.navbar')

@section('content')
<div id="licence" {{ $licenceBlock }}>
    <h1 style="margin:1em;">@lang('profile.driversLicence')</h1>
    <a href="{{ route('user.downloadPDF') }}"><button class="btn btn-info" style="margin-left:5em;">@lang('profile.download')
        </button></a>
</div>
<h1 style="margin:1em;" id="setTheme">@lang('profile.setTheme')</h1>
<a href="{{ route('user.setTheme', 'dark') }}">
    <button class="btn btn-dark" id="btn_dark" style="margin: 1em; margin-left:5em;"><i class="bi bi-moon"></i></button>

</a>
<a href="{{ route('user.setTheme', 'light') }}">
    <button class="btn btn-light" id="btn-white" style="margin: 1em;"><i class="bi bi-brightness-high"></i></button>
</a>
<h1 style="margin: 1em;" id="setLanguage">@lang('profile.setLanguage')</h1>
<a href="{{ route('user.setLan', 'ru') }}">
    <button class="btn btn-secondary" style="margin: 1em; margin-left:5em;">Русский</button>

</a>
<a href="{{ route('user.setLan', 'en') }}">
    <button class="btn btn-secondary" style="margin: 1em;">English</button> <br></br>
</a>
<h1 style="margin: 1em" id="pdfLoad">@lang('profile.uploadLicence')</h1>
<form action="{{ route('user.uploadPDF') }}" enctype="multipart/form-data" method="post" style="max-width: 20em; margin-left: 5em">
    @csrf
    <input class="form-control" type="file" id="formFile" name="formFile" style="margin-bottom: 1em;">
    <input type="submit" class="btn btn-success" id="pdfLoadBtn" value="@lang('profile.submit')">
</form>
<a href="{{ route('user.logout') }}"><button class="btn btn-danger" id="logout" style="margin: 1em; margin-left:5em; margin-top: 5em">@lang('profile.logout')</button></a>
@endsection