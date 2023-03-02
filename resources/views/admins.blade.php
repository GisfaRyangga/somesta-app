@extends('layout/main')

@section('form')

<div class="container mt-4">
    
    <h2 class="text-center mb-3 fw-bold">ADMINS</h2>
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
                    <button class="btn-danger w-100 btn-aksi btnhapus" onclick="return confirm('Yakin menghapus admin ini?')">Hapus</button>
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