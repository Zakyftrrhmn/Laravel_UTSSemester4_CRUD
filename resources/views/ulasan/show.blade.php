@extends('layouts.main')
@section('title', 'Detail Ulasan')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Ulasan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('ulasan.index') }}" class="text-primary text-decoration-none">Kembali</a></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-book me-1"></i>
                Informasi Ulasan
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Judul Buku</th>
                        <td>{{ $peminjaman->buku->judul }}</td>
                    </tr>
                    <tr>
                        <th>Isi Ulasan</th>
                        <td>{{ $ulasan->isi_ulasan }}</td>
                    </tr>
                    
                    <tr>
                        <th>Rating</th>
                        <td>{{ $ulasan->rating }}</td>
                    </tr>
                    
                    <tr>
                        <th>Tanggal </th>
                        <td>{{ \Carbon\Carbon::parse($ulasan->tanggal)->translatedFormat('d F Y') }}</td>
                    </tr>
                </table>
                <a href="{{ route('ulasan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
