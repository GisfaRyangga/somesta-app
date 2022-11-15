@extends('layout/main')

@section('form')

<div class="container mt-4">
  <h2 class="text-center mb-4 fw-bold">UPLOAD .CSV DATA</h2>
  <div class="col-lg-5 tengah">
    <div class="shadow p-5 bg-body rounded-3 required">
      <div class="text-center mb-3">
        <p>Mohon gunakan format yang telah disediakan berikut ini</p>
        <a href="csv/somesta.csv" class="btn btndownload btn-primary text-light mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download m-1" viewBox="0 1 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
          </svg>
          <span class="downloadtxt"> Download Template </span>
        </a>
      </div>
      
      {{-- Upload file --}}
      <!-- <label for="formFileMultiple" class="form-label">Input Data Customer</label> -->
      <input class="form-control" type="file" id="formFileMultiple" multiple>
      <label class="form-text mt-2">*CSV only</label>
      <div class="mt-2">
        <button type="submit" onclick="return confirm('Yakin data sudah benar?')" class="btn btnmerah btn-primary w-100 mt-3 fw-bold">Kirim</button>
      </div>
    </div>
  </div>
</div>

@endsection