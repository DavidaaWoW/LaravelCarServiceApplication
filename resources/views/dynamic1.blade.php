@extends('layouts.navbar')

@section('content')
<div class="row" style="margin-top: 5em;">
    @foreach ($brands as $brand)
    <div class="col-sm-6">
        <div class="card" style="padding:20px; max-width:400px;">
            <img src="{{ $brand->logo }}" class="card-img-top" style="width:300px;" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $brand->name }}</h5>
                <a href="{{ route('user.dynamic2', ['brand' => $brand->id]) }}" class="btn btn-primary cardListBtn">@lang('brands.carList')</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection