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
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody id="CustomerData">   
                <tr>
                    <td>1</td>
                    <td>PT Lintang Abadi</td>
                    <td>grup1</td>
                    <td>status3</td>
                    <td>-7.782299547448744, 110.36725032244684</td>
                    <td>Jawa Timur</td>
                    <td>12000</td>
                    <td>Perkebunan Kelapa Sawit</td>
                    <td>Kontrak</td>
                    <td>Exxon</td>
                    <td>Distribution Division</td>
                    <td>VHS</td>
                    <td>
                        <form>
                            @csrf
                            <button class="btn-primary">Edit</button>
                          </form>
                          <form>
                            @csrf
                            <button class="btn-danger" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                          </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

@endsection