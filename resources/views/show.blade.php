@extends('layout/main')

@section('form')

<div class="container mt-4">
    
    <h2 class="text-center mb-3 fw-bold">ALL CUSTOMER</h2>
    <div class="justify-content-center">
    @if (Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    @if (Session::has('rejected'))
        <div class="alert alert-danger">{{Session::get('rejected')}}</div>
    @endif
    @if ($ref==null)
    <h4 class="text-center mb-3">Data kosong</h4>
    @else
    <a href="/form/export_excel" class="btn btndownload text-light mb-3 ms-0" target="_blank">EXPORT EXCEL</a>
    <table class="table table-bordered kecil mt-3 w-100">
        <thead>
            <tr class="align-middle text-center">
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Perusahaan Group/Holding</th>
                <th>Status</th>
                <th>Koordinat</th>
                <th>Wilayah Kabupaten, Provinsi</th>
                <th>Kebutuhan Total per Bulan (KL)</th>
                <th>Market Share Pertamina (%)</th>
                <th>Jenis Industri</th>
                <th>Tipe Customer</th>
                <th>Kompetitor</th>
                <th>Penyalur</th>
                <th>Layanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="CustomerData">   
            @foreach ($ref as $data=>$d)
            @if ($d == null)
                
            @else
            <tr class="abu">
                <td>{{ $local_id }}</td>
                <td>{{ $d['nama'         ] }}</td>
                <td>{{ $d['group'        ] }}</td>
                <td>{{ $d['status'       ] }}</td>
                <td>{{ $d['koor_latitude'] }}</td>
                <td>{{ $d['lokasi'       ] }}</td>
                <td>{{ $d['kebutuhan'    ] }}</td>
                <td>{{ $d['market_share' ] }}</td>
                <td>{{ $d['jenis'        ] }}</td>
                <td>{{ $d['tipe_customer'] }}</td>
                <td>{{ $d['kompetitor'     ] }}</td>
                <td>{{ $d['penyalur'     ] }}</td>
                <td>{{ $d['layanan'    ] }}</td>
                
                @php
                    $local_id++
                @endphp

                <td>
                <form action="{{ route('edit.perusahaan',$data) }}" method="get">
                    @csrf
                    <button class="btn-primary w-100 mb-1 btn-aksi btnedit">Edit</button>
                </form>
                <form action="{{ route('delete.perusahaan',$data) }}" method="get">
                    @csrf
                    <button class="btn-danger w-100 btn-aksi btnhapus" onclick="return confirm('Yakin menghapus perusahaan ini?')">Hapus</button>
                </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <div class="container mb-5">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Delete All
        </button>
    </div>
    
    <form method="post" action="{{ route('delete_all') }}">
        @csrf
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 ">
                            <label for="deleteconfirmation" class="form-label">Ketikan "delete" untuk hapus semua perusahaan</label>
                            <input type="text" class="form-control" id="deleteconfirmation" placeholder="delete" name="deleteconfirmation" required>
                            <div class="invalid-feedback">
                                Mohon isikan kata "delete"
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
        {{-- <a href="/form/export_excel" class="btn btndownload text-light mb-3" target="_blank">EXPORT EXCEL</a> --}}

    </div>
  </div>

@endsection