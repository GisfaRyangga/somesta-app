@extends('layout/main')

@section('form')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/upload_file.js"></script>

<div class="container mt-4">
  <h2 class="text-center mb-4 fw-bold">UPLOAD EXCEL DATA</h2>
  <div class="col-lg-5 tengah">
    @if (Session::has('pesan'))
      <div class="alert alert-success mb-3">{{Session::get('pesan')}}</div>
    @endif
    <div class="shadow p-4 bg-body rounded-3 required text-center mb-5 row d-flex justify-content-between">
      <div class="col-md-2 align-self-center">
        <h2>1</h2>
      </div>
      <div class="col-md-1 line"></div>
      <div class="col-md-9">
        <p>Mohon gunakan template format yang telah disediakan berikut ini:</p>
        <a href="upload_file_template/somesta.xlsx" class="btn btndownload text-light mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download m-1" viewBox="0 1 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
          </svg>
          <span class="downloadtxt"> Download Template </span>
        </a>
      </div>
    </div>

    <div class="shadow p-4 bg-body rounded-3 required row d-flex justify-content-between">
      {{-- Upload file --}}
      <!-- <label for="formFileMultiple" class="form-label">Input Data Customer</label> -->
      <div class="col-md-2 align-self-center text-center r">
        <h2>2</h2>
      </div>
      <div class="col-md-1 line "></div>
      <div class="col-md-9">
        <form method="post" action="/form/import_excel" enctype="multipart/form-data">
          {{ csrf_field() }}
          <p>Silahkan upload template yang sudah diisi di sini:</p>
          <input id="file" class="form-control upload_excel" type="file" name="file" onchange="return fileValidation()" required="required">
          <label class="form-text mt-2">*Excel only</label>
          <div class="mt-2">
            <button id="btn_upload" type="submit" class="btn btnmerah btn-primary w-100 mt-3 fw-bold btn_upload" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Kirim
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-body">
                <div class="container">
                  <div class="row text-center ">
                    <div class="loader mx-auto"></div>
                    <h2>Mohon tunggu!</h2>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>

  </div>

@endsection