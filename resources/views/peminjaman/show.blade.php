@extends('layouts.main')
@section('title', 'Detail Peminjaman')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Peminjaman</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('peminjaman.index') }}" class="text-primary text-decoration-none">Kembali</a></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-book me-1"></i>
                Informasi Peminjaman
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    
                    <tr>
                        <th>Judul Buku</th>
                        <td>{{ $peminjaman->buku->judul }}</td>
                    </tr>
                    
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Kembali</th>
                        <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $peminjaman->status }}</td>
                    </tr>
                </table>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
