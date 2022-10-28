@extends('layout/main')

@section('form')

<div class="container mt-4">
    <h2 class="text-center mb-4">Customer Input</h2>
    <div class="offset-lg-2 col-lg-8 mb-5">
        <form>
            <div class="mb-3">
                <label for="name_perusahaan" class="form-label fw-bold">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: PT. Kencana Griya Abadi</label>
            </div>
            <div class="mb-3">
                <label for="group" class="form-label fw-bold">Group</label>
                <input type="text" id="group" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Sinar Mas</label>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label fw-bold">Status</label>
                <input type="text" id="wilayah" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Aktif</label>
            </div>
            <div class="mb-3">
                <label for="koordinat" class="form-label fw-bold">Koordinat dari Google Maps</label>
                <input type="text" id="koordinat" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: -7.781136899898292, 110.3668603834729</label>
            </div>
            <div class="mb-3">
                <label for="wilayah" class="form-label fw-bold">Wilayah Kabupaten, Provinsi</label>
                <input type="text" id="wilayah" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Kertanegara, Kalimantan Timur</label>
            </div>
            <div class="mb-3">
                <label for="kebutuhan" class="form-label fw-bold">Kebutuhan Perbulan</label>
                <input type="number" id="kebutuhan" class="form-control" autocomplete="off" placeholder="Satuan KL">
                <label class="form-text">Contoh: 200</label>
            </div>
            <div class="mb-3">
                <label for="jenis_industri" class="form-label fw-bold">Jenis Industri</label>
                <input type="text" id="wilayah" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Perkebunan Kelapa Sawit</label>
            </div>
            <div class="mb-3">
                <label for="tipe_cust" class="form-label fw-bold">Tipe Customer</label>
                <input type="text" id="wilayah" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Kontrak</label>
            </div>
            <div class="mb-3">
                <label for="koordinat" class="form-label fw-bold">Dilayani/disupply oleh</label>
                <input type="text" id="koordinat" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Pertamina/Exxon/AKR/Bidding</label>
            </div>
            <div class="mb-3">
                <label for="penyalur" class="form-label fw-bold">Penyalur</label>
                <input type="text" id="penyalur" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: ABC</label>
            </div>
            <div class="mb-3">
                <label for="pelayanan" class="form-label fw-bold">Pelayanan</label>
                <input type="text" id="pelayanan" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: VHS/LOCO/FRANCO</label>
            </div>
                <div class="mb-3 ">
                    <button class="btn btn-primary">Kirim</button>
                </div>
        </form>
    </div>
</div>
@endsection
