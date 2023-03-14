@extends('layout/main')

@section('form')

<div class="container mt-4">

    <h2 class="text-center mb-3 fw-bold">ADMINS <div class="hover-text">ⓘ<span class="tooltip-text" id="right">Pastikan internet stabil saat menghapus admin!</span></div> </h2> 
    <div class="justify-content-center">
      @if (Session::has('pesan'))
      <div class="alert alert-success">{{Session::get('pesan')}}</div>
      @endif

      <table class="table table-bordered kecil mt-3 w-100">
        <thead>
            <tr class="align-middle text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Tipe Admin</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="CustomerData">   
            @foreach ($ref as $data=>$d)
            @if ($d == null)
                
            @else
                @if (strcmp(Session::get('email'), $d['email']) !== 0)
                    <tr class="abu">
                        <td>{{ $local_id }}</td>
                        <td>{{ $d['fullName'] }}</td>
                        <td>{{ $d['admin_type'] }}</td>
                        <td>{{ $d['email'] }}</td>
                        
                        @php
                            $local_id++
                        @endphp

                        <td>
                        <form action="{{ route('delete.admin',$data) }}" method="get">
                            @csrf
                            <button class="btn-danger w-100 btn-aksi btnhapus" onclick="return confirm('Yakin menghapus admin ini?')" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</button>
                        </form>
                        </td>
                    </tr>
                @else
                @endif
            @endif
            @endforeach
        </tbody>
    </table>
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