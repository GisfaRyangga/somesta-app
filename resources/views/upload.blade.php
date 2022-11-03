@extends('layout/main')

@section('form')

<div class="container mt-4">
  <h2 class="text-center mb-4 fw-bold">UPLOAD .CSV DATA</h2>
  <div class="offset-lg-2 col-lg-8">
    <div class="card-body">
        <!-- <label for="formFileMultiple" class="form-label">Input Data Customer</label> -->
        <input class="form-control" type="file" id="formFileMultiple" multiple>
        <label class="form-text">*CSV only</label>
    </div>
  </div>
</div>

@endsection