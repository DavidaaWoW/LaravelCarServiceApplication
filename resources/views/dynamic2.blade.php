@extends('layouts.navbar')

@section('content')
<div class="row" style="margin-top: 5em;">
    @foreach ($cars as $car)
    <div class="col-sm-6">
        <div class="card" style="padding:20px; max-width:400px;">
            <img src="{{ $car->image }}" class="card-img-top" style="width:300px;" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $car->name }}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection