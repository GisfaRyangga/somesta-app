@extends('layout/main')

@section('form')

<table class="table table-bordered border-primary">
    <thead>
        <tr>
            <th>Nama Perusahaan</th>
            <th>Group</th>
            <th>Status</th>
            <th>Koordinat</th>
            <th>Wilayah Kabupaten, Provinsi</th>
            <th>Kebutuhan perbulan</th>
            <th>Jenis Industri</th>
            <th>Tipe Customer</th>
            <th>Disupply oleh</th>
            <th>Penyalur</th>
            <th>Pelayanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="CustomerData">
        
    </tbody>
</table>
@endsection