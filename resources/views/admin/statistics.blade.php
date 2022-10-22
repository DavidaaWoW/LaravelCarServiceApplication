@extends('layouts.navbar')

@section('content')

<h1 style="margin-top: 2em;">Сгенерирровать случайное количество машин</h1>

<form method="post" action="{{ route('user.generateRand') }}" style="max-width: 1000px">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Количество машин</label>
        <input type="number" value="0" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="count" style="max-width: 5em;">
    </div>
    <button type="submit" class="btn btn-primary" style="margin-right: 4em;">Генерация</button>
</form>

{!! $chart->container() !!}
{!! $chart2->container() !!}
{!! $chart3->container() !!}
{{ $chart->script() }}
{{ $chart2->script() }}
{{ $chart3->script() }}


@endsection