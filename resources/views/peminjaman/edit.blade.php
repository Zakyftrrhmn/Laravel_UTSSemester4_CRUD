@extends('layouts.main')
@section('title', 'Edit Data Peminjaman')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Peminjaman</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="#" class="text-primary text-decoration-none">Dashboard</a> / Edit Data Peminjaman</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Data
            </div>
            <div class="card-body">
                <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="buku_id">Judul Buku</label>
                        <select name="buku_id" id="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                            <option value="">-- Pilih Judul Buku --</option>
                            @foreach ($buku as $b)
                                @if ($b->stok > 1)
                                    <option value="{{ $b->id }}" {{ old('buku_id', $peminjaman->buku_id ?? '') == $b->id ? 'selected' : '' }}>
                                        {{ $b->judul }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('buku_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                        <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}">
                        @error('tanggal_pinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali:</label>
                        <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}">
                        @error('tanggal_kembali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="Dipinjam" {{ old('status', $peminjaman->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="Dikembalikan" {{ old('status', $peminjaman->status) == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
