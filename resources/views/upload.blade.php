@extends('layout/main')

@section('form')

<div class="container mt-5 d-flex justify-content-center">
  <div class="row w-25">
      <label for="formFileMultiple" class="form-label">Input Data Customer</label>
      <input class="form-control" type="file" id="formFileMultiple" multiple>
      <label class="form-text">*CSV only</label>
  </div>
</div>

@endsection