@extends('layout/main')

@section('form')

<div class="container mt-4">
  <h2 class="text-center mb-4 fw-bold">UPLOAD .CSV DATA</h2>
  <div class="col-lg-5 tengah">
    <div class="shadow p-5 bg-body rounded">
        <!-- <label for="formFileMultiple" class="form-label">Input Data Customer</label> -->
        <input class="form-control" type="file" id="formFileMultiple" multiple>
        <label class="form-text mt-2">*CSV only</label>
        <div class="mt-2">
          <button type="submit" onclick="return confirm('Yakin data sudah benar?')" class="btn btn-primary w-100 mt-3 fw-bold">Kirim</button>
        </div>
    </div>
  </div>
</div>

@endsection