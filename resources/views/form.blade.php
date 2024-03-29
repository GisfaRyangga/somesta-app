@extends('layout/main')

@section('form')

<div class="container mt-4">
    @if (Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    @if (Session::has('access_violation'))
        @php
            echo "<script type='text/javascript'>alert('Anda tidak memiliki hak akses fitur ini');</script>";
        @endphp
    @endif
    <h2 class="text-center mb-4 fw-bold">CUSTOMER INPUT</h2>
    <div class="col-lg-5 mb-5 tengah">
        {{-- <div class="alert alert-warning" role="alert">
            [warning] Belum ada form validation
        </div> --}}
        <form method="POST" action="{{ route('perusahaan.submitForm') }}">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama Perusahaan</label>
                <input type="text" name="nama" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: PT. Kencana Griya Abadi</label>
            </div>
            <div class="mb-3">
                <label for="group" class="form-label fw-bold">Perusahaan Group/Holding</label>
                <input type="text" name="group" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Sinar Mas</label>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label fw-bold">Status</label>
                <div>
                    <input type="radio" class="btn-check" name="status" id="option1" value="Aktif" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="option1">Aktif</label>

                    <input type="radio" class="btn-check" name="status" id="option2" value="Inaktif" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="option2">Inaktif</label> 
                </div>
                {{-- <label class="form-text">Contoh: Aktif</label> --}}
            </div>
            <div class="mb-3">
                <label for="koordinat" class="form-label fw-bold">Koordinat dari Google Maps</label>
                <input type="text" name="koordinat" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: -7.781136899898292, 110.3668603834729</label>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label fw-bold">Wilayah Kabupaten, Provinsi</label>
                <input type="text" name="lokasi" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Kertanegara, Kalimantan Timur</label>
            </div>
            <div class="mb-3">
                <label for="kebutuhan" class="form-label fw-bold">Kebutuhan Total per Bulan (KL)</label>
                <input type="number" name="kebutuhan" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: 2000</label>
            </div>
            <div class="mb-3">
                <label for="market_share" class="form-label fw-bold">Market Share Pertamina (%)</label>
                <input type="number" name="market_share" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: 80</label>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label fw-bold">Jenis Industri</label>
                <input type="text" name="jenis" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Perkebunan Kelapa Sawit</label>
            </div>
            <div class="mb-3">
                <label for="tipe_customer" class="form-label fw-bold">Tipe Customer</label>
                <div>
                    <input type="radio" class="btn-check" name="tipe_customer" id="option3" value="Direct" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="option3">Direct</label>

                    <input type="radio" class="btn-check" name="tipe_customer" id="option4" value="Indirect" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="option4">Indirect</label>
                </div>
                {{-- <label class="form-text">Contoh: Kontrak</label> --}}
            </div>
            <div class="mb-3">
                <label for="kompetitor" class="form-label fw-bold">Kompetitor</label>
                <input type="text" name="kompetitor" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Pertamina/Exxon/AKR/Bnameding</label>
            </div>
            <div class="mb-3">
                <label for="penyalur" class="form-label fw-bold">Penyalur</label>
                <input type="text" name="penyalur" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: ABC</label>
            </div>
            <div class="mb-3">
                <label for="pelayanan" class="form-label fw-bold">Layanan</label>
                <div>
                    <input type="radio" class="btn-check" name="layanan" id="layanan1" value="LOCO" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="layanan1">LOCO</label>

                    <input type="radio" class="btn-check" name="layanan" id="layanan2" value="FRANCO" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="layanan2">FRANCO</label>

                    <input type="radio" class="btn-check" name="layanan" id="layanan3" value="VHS" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="layanan3">VHS</label>

                    <input type="radio" class="btn-check" name="layanan" id="layanan4" value="FMS" autocomplete="off">
                    <label class="btn btn-outline-primary ms-2" for="layanan4">FMS</label>
                </div>
                {{-- <label class="form-text">Contoh: VHS/LOCO/FRANCO</label> --}}
            </div>
            <div class="mb-3 ">
                <button type="submit" onclick="return confirm('Yakin data sudah benar?')" class="btn btnmerah btn-primary w-100 mt-3 fw-bold">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection