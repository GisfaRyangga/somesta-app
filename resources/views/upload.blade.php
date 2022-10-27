@extends('layout/main')

@section('form')

<div class="mb-3">
  <label for="formFileMultiple" class="form-label">Input Data Customer</label>
  <input class="form-control" type="file" id="formFileMultiple" multiple>
  <label class="form-text">*CSV only</label>
</div>

@endsection