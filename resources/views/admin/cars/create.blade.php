@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Add New Car</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Token di sicurezza per il form -->

        <div class="mb-3">
            <label class="form-label">Marca</label>
            <select name="brand_id" class="form-select" aria-label="Default select example">
                <option value="" disabled>Scegli una marca</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ old('model') }}" maxlength="90" required>
        </div>

        <div class="mb-3">
            <label for="production_year" class="form-label">Production Year</label>
            <input type="number" name="production_year" id="production_year" class="form-control" value="{{ old('production_year') }}" min="1900" max="{{ date('Y') }}" required>
        </div>

        <div class="mb-3">
            <label for="hp" class="form-label">Horse Power (HP)</label>
            <input type="number" name="hp" id="hp" class="form-control" value="{{ old('hp') }}" min="0" required>
        </div>

        <div class="mb-3">
          <label for="fuel" class="form-label">fuel</label>
          <input type="text" name="fuel" id="fuel" class="form-control" value="{{ old('fuel') }}" min="0" required>
      </div>

        <div class="mb-3">
            <label for="image" class="form-label">Car Image (optional)</label>
            <input type="text" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Car</button>
    </form>
</div>

@endsection