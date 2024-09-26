@extends('layouts.app')

@section('content')

<table class="table table-striped">
  <h1 class="my-5">Il garage di simo tutor - <a href="{{route('admin.cars.create')}}" class="btn btn-primary" role="button">Aggiungi auto<a> </h1>
  <thead>
    <tr>
      <th scope="col">Marca</th>
      <th scope="col">Modello</th>
      <th scope="col">Anno di produzione</th>
      <th scope="col">Carburante</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cars as $key => $car)
      <tr scope="row">
        <td>{{$car->brand->name}}</td>
        <td>{{$car->model}}</td>
        <td>{{$car->production_year}}</td>
        <td>{{$car->fuel}}</td>
        <td>
          <a href="{{route('admin.cars.show', $car->id)}}" class="btn btn-success" role="button">Show<a>
          <a href="{{route('admin.cars.edit', $car->id)}}" class="btn btn-warning" role="button">Edit<a>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection