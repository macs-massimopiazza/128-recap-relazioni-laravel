@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1 class="mt-2">{{$car->model}} - <span class="badge bg-primary">{{$car->brand->name}}</h1> 
    <span class="badge bg-primary">Cavalli: {{$car->hp}}</span>
    <span class="badge bg-danger">Carburante: {{$car->fuel}}</span>
    <span class="badge bg-success">Anno di produzione: {{$car->production_year}}</span>
    
    <img src="{{$car->image}}" alt="" class="mt-4">

    <a href="{{route('admin.cars.index')}}" class="btn btn-primary mt-2 d-block" role="button">Indietro<a>
  </div>
@endsection