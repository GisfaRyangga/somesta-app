@extends('layout/main')

@section('form')
<div class="container mt-5 d-flex justify-content-center">
    <div class="row w-100">
        <table class="table table-bordered">
            <thead>
                <tr class="align-middle">
                    <th>No</th>
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
                    @foreach ($ref as $data=>$d)
                    @if ($data == null)
                        
                    @else
                    <tr>
                        <td>{{ $local_id }}</td>
                        <td>{{ $d['nama'         ] }}</td>
                        <td>{{ $d['group'        ] }}</td>
                        <td>{{ $d['status'       ] }}</td>
                        <td>{{ $d['koor_latitude'] }}</td>
                        <td>{{ $d['lokasi'       ] }}</td>
                        <td>{{ $d['kebutuhan'    ] }}</td>
                        <td>{{ $d['jenis'        ] }}</td>
                        <td>{{ $d['tipe_customer'] }}</td>
                        <td>{{ $d['dilayani'     ] }}</td>
                        <td>{{ $d['penyalur'     ] }}</td>
                        <td>{{ $d['pelayanan'    ] }}</td>
                        @php
                            $local_id++
                        @endphp

                        <td>
                        <form action="" method="">
                            @csrf
                            <button class="btn-primary" onclick="return confirm('in development. Come back later!')">Edit</button>
                        </form>
                        <form action="" method="">
                            @csrf
                            <button class="btn-danger" onclick="return confirm('in development. Come back later!')">Hapus</button>
                        </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
            </tbody>
        </table>
    </div>
  </div>

@endsection