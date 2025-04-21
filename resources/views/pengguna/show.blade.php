@extends('layouts.main')
@section('title', 'Detail Data Pengguna')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Data Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('pengguna.index') }}" class="text-primary text-decoration-none">Kembali</a></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-book me-1"></i>
                Informasi Pengguna
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Pengguna</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $user->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ $user->role }}</td>
                    </tr>
                </table>
                <a href="{{ route('pengguna.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
