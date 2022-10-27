@extends('layout/main')

@section('form')

<div class="container mt-4">
    <h2 class="text-center mb-4">Customer Input</h2>
    <div class="offset-lg-2 col-lg-8">
        <form>
            <div class="mb-3">
                <label for="name_perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: PT. Kencana Griya Abadi</label>
            </div>
            <div class="mb-3">
                <label for="group" class="form-label">Group</label>
                <input type="text" id="group" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Sinar Mas</label>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="pusat">Kantor Pusat</option>
                    <option value="cabangd">Kantor Cabang</option>
                    <option value="side">Side</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="koordinat" class="form-label">Koordinat</label>
                <input type="text" id="koordinat" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: xxxxx</label>
            </div>
            <div class="mb-3">
                <label for="wilayah" class="form-label">Wilayah Kabupaten, Provinsi</label>
                <input type="text" id="wilayah" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Kertanegara, Kalimantan Timur</label>
            </div>
            <div class="mb-3">
                <label for="kebutuhan" class="form-label">Kebutuhan Perbulan</label>
                <input type="number" id="kebutuhan" class="form-control" autocomplete="off" placeholder="Satuan KL">
                <label class="form-text">Contoh: 200</label>
            </div>
            <div class="mb-3">
                <label for="jenis_industri" class="form-label">Jenis Industri</label>
                <select class="form-select" name="jenis_industri" id="jenis_industri">
                    <option value="kelapa_sawit">Perkebunan Kelapa Sawit</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tipe_cust" class="form-label">Tipe Customer</label>
                <select class="form-select" name="tipe_cust" id="tipe_cust">
                    <option value="window">Window Shopping</option>
                    <option value="kontrak">Kontrak</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="koordinat" class="form-label">Dilayani/disupply oleh</label>
                <input type="text" id="koordinat" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: Pertamina/Exxon/AKR/Bidding</label>
            </div>
            <div class="mb-3">
                <label for="penyalur" class="form-label">Penyalur</label>
                <input type="text" id="penyalur" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: ABC</label>
            </div>
            <div class="mb-3">
                <label for="pelayanan" class="form-label">Pelayanan</label>
                <input type="text" id="pelayanan" class="form-control" autocomplete="off">
                <label class="form-text">Contoh: VHS/LOCO/FRANCO</label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Super Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Admin
                    </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection
