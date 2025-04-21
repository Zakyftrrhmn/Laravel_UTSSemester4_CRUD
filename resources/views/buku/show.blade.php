@extends('layouts.main')
@section('title', 'Detail Buku')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Buku</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('buku.index') }}" class="text-primary text-decoration-none">Kembali</a></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-book me-1"></i>
                Informasi Buku
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Judul</th>
                        <td>{{ $buku->judul }}</td>
                    </tr>
                    <tr>
                        <th>Pengarang</th>
                        <td>{{ $buku->pengarang }}</td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>{{ $buku->penerbit }}</td>
                    </tr>
                    <tr>
                        <th>Tahun</th>
                        <td>{{ $buku->tahun }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $buku->stok }}</td>
                    </tr>
                </table>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
