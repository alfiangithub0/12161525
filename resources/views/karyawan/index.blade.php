@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Data Karyawan</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/karyawan/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Email</th>
            <th colspan="2">Aksi</th> <!-- MODIFIKASI INI DENGAN MENAMBAHKAN COLSPAN -->
        </tr>
    </thead>
    <tbody>
        @forelse($karyawans as $karyawan)
        <tr>
            <td>{{ $karyawan->name }}</td>
            <td>{{ $karyawan->phone }}</td>
            <td>{{ str_limit($karyawan->address, 50) }}</td>
            <td><a href="mailto:{{ $karyawan->email }}">{{ $karyawan->email }}</a></td>
            <td>
                <form action="{{ url('/karyawan/' . $karyawan->id) }}" method="POST">
                {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td class="text-center" colspan="5">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
                        <div class="float-right">
                            {{ $karyawans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection