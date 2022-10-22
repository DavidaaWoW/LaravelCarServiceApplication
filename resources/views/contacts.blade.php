@extends('layouts.navbar')

@section('content')
<div class="card" style="padding: 20px; margin-top: 2em">
    <p>
        @lang('contacts.name')</p>
    <p> @lang('contacts.schedule') </p>
    <p> @lang('contacts.inn') </p>
    <p> @lang('contacts.ogrn') </p>
    <p> E-mail:
        super-avto@gmail.com </p>
    <p> @lang('contacts.phone') </p>
    </p>
</div>
@endsection