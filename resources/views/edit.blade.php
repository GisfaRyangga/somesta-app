@extends('layout/main')

@section('form')


@section('style_update')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endsection

<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold">CUSTOMER EDIT</h2>
    <div class="col-lg-5 mb-5 tengah">
        {{-- <div class="alert alert-warning" role="alert">
            Pastikan semua field terisi! karena belum ada validation.
        </div> --}}
        <form method="POST" action="{{ route('update.perusahaan',$data_id)}}">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama Perusahaan</label>
                <input type="text" name="nama" class="form-control" autocomplete="off" value="{{ $ref['nama'] }}">
                <label class="form-text">Contoh: PT. Kencana Griya Abadi</label>
            </div>
            <div class="mb-3">
                <label for="group" class="form-label fw-bold">Perusahaan Group/Holding</label>
                <input type="text" name="group" class="form-control" autocomplete="off" value="{{ $ref['group'] }}">
                <label class="form-text">Contoh: Sinar Mas</label>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label fw-bold">Status</label>
                <div>
                    @if ($ref_status == "Aktif")
                    <input type="radio" class="btn-check" name="status" id="option1" value="Aktif" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="option1">Aktif</label>

                    <input type="radio" class="btn-check" name="status" id="option2" value="Inaktif" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="option2">Inaktif</label> 

                    @else
                    <input type="radio" class="btn-check" name="status" id="option1" value="Aktif" autocomplete="off">
                    <label class="btn btn-outline-primary" for="option1">Aktif</label>

                    <input type="radio" class="btn-check" name="status" id="option2" value="Inaktif" autocomplete="off" checked>
                    <label class="btn btn-outline-primary ms-2" for="option2">Inaktif</label> 
                    @endif
                    </div>
                {{-- <input type="text" name="status" class="form-control" autocomplete="off" value="{{ $ref['status'] }}"> --}}
                <label class="form-text">Contoh: Aktif</label>
            </div>
            <div class="mb-3">
                <label for="koordinat" class="form-label fw-bold">Koordinat dari Google Maps</label>
                <input type="text" name="koordinat" class="form-control" autocomplete="off" value="{{ $ref_combined_coords }}">
                <label class="form-text">Contoh: -7.781136899898292, 110.3668603834729</label>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label fw-bold">Wilayah Kabupaten, Provinsi</label>
                <input type="text" name="lokasi" class="form-control" autocomplete="off" value="{{ $ref['lokasi'] }}">
                <label class="form-text">Contoh: Kertanegara, Kalimantan Timur</label>
            </div>
            <div class="mb-3">
                <label for="kebutuhan" class="form-label fw-bold">Kebutuhan Total per Bulan (KL)</label>
                <input type="number" name="kebutuhan" class="form-control" autocomplete="off" placeholder="Satuan KL" value="{{ $ref['kebutuhan'] }}"> 
                <label class="form-text">Contoh: 2000</label>
            </div>
            <div class="mb-3">
                <label for="market_share" class="form-label fw-bold">Market Share Pertamina (%)</label>
                <input type="number" name="market_share" class="form-control" autocomplete="off" placeholder="Satuan KL" value="{{ $ref['market_share'] }}"> 
                <label class="form-text">Contoh: 50</label>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label fw-bold">Jenis Industri</label>
                <input type="text" name="jenis" class="form-control" autocomplete="off" value="{{ $ref['jenis'] }}">
                <label class="form-text">Contoh: Perkebunan Kelapa Sawit</label>
            </div>
            <div class="mb-3">
                <label for="tipe_customer" class="form-label fw-bold">Tipe Customer</label>
                <div>
                    @if ($ref_tipe_customer == "Direct")
                    <input type="radio" class="btn-check" name="tipe_customer" id="option3" value="Direct" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="option3">Direct</label>

                    <input type="radio" class="btn-check" name="tipe_customer" id="option4" value="Indirect" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="option4">Indirect</label>
                    @else
                    <input type="radio" class="btn-check" name="tipe_customer" id="option3" value="Direct" autocomplete="off">
                    <label class="btn btn-outline-primary" for="option3">Direct</label>

                    <input type="radio" class="btn-check" name="tipe_customer" id="option4" value="Indirect" autocomplete="off" checked>
                    <label class="btn btn-outline-primary ms-2" for="option4">Indirect</label>
                    @endif
                </div>
                {{-- <input type="text" name="tipe_customer" class="form-control" autocomplete="off" value="{{ $ref['tipe_customer'] }}"> --}}
            </div>
            <div class="mb-3">
                <label for="kompetitor" class="form-label fw-bold">Kompetitor</label>
                <input type="text" name="kompetitor" class="form-control" autocomplete="off" value="{{ $ref['kompetitor'] }}">
                <label class="form-text">Contoh: Pertamina/Exxon/AKR/Bnameding</label>
            </div>
            <div class="mb-3">
                <label for="penyalur" class="form-label fw-bold">Penyalur</label>
                <input type="text" name="penyalur" class="form-control" autocomplete="off" value="{{ $ref['penyalur'] }}">
                <label class="form-text">Contoh: ABC</label>
            </div>
            <div class="mb-3">
                <label for="pelayanan" class="form-label fw-bold">Layanan</label>
                <div>
                    @if ($ref_layanan == "LOCO")
                    <input type="radio" class="btn-check" name="layanan" id="pelayanan1" value="LOCO" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="pelayanan1">LOCO</label> 
                    @else
                    <input type="radio" class="btn-check" name="layanan" id="pelayanan1" value="LOCO" autocomplete="off">
                    <label class="btn btn-outline-primary" for="pelayanan1">LOCO</label>  
                    @endif

                    @if ($ref_layanan == "FRANCO")
                    <input type="radio" class="btn-check" name="layanan" id="pelayanan2" value="FRANCO" autocomplete="off" checked>
                    <label class="btn btn-outline-primary ms-2" for="pelayanan2">FRANCO</label>
                    @else
                    <input type="radio" class="btn-check" name="layanan" id="pelayanan2" value="FRANCO" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="pelayanan2">FRANCO</label>
                    @endif

                    @if ($ref_layanan == "VHS")
                    <input type="radio" class="btn-check" name="layanan" id="pelayanan3" value="VHS" autocomplete="off" checked>
                    <label class="btn btn-outline-primary ms-2" for="pelayanan3">VHS</label>
                    @else
                    <input type="radio" class="btn-check" name="layanan" id="pelayanan3" value="VHS" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="pelayanan3">VHS</label>
                    @endif

                    @if ($ref_layanan == "FMS")
                    <input type="radio" class="btn-check" name="layanan" id="pelayanan4" value="FMS" autocomplete="off" checked>
                    <label class="btn btn-outline-primary ms-2" for="pelayanan4">FMS</label> 
                    @else
                    <input type="radio" class="btn-check" name="layanan" id="pelayanan4" value="FMS" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="pelayanan4">FMS</label>  
                    @endif
                </div>
                {{-- <input type="text" name="pelayanan" class="form-control" autocomplete="off" value="{{ $ref['pelayanan'] }}"> --}}
                {{-- <label class="form-text">Contoh: VHS/LOCO/FRANCO</label> --}}
            </div>
            <div class="mb-3">
                <button type="submit" onclick="return confirm('Yakin data sudah benar?')" class="btn btn-primary w-100 mt-3 fw-bold">Update</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

@endsection