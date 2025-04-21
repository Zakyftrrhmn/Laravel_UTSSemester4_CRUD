@extends('layouts.main')
@section('title', 'Edit Data Ulasan')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Ulasan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('ulasan.index') }}" class="text-primary text-decoration-none">Dashboard</a> / Edit Data Ulasan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Form Edit
            </div>
            <div class="card-body">
                <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="isi_ulasan">Isi Ulasan:</label>
                        <input type="text" 
                            class="form-control @error('isi_ulasan') is-invalid @enderror" 
                            id="isi_ulasan" 
                            name="isi_ulasan" 
                            value="{{ old('isi_ulasan', $ulasan->isi_ulasan) }}">
                        @error('isi_ulasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror">
                            <option value="">-- Pilih Rating --</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('rating', $ulasan->rating) == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal: <span class="text-muted" style="font-size: 0.9em;">(Tidak dapat diubah)</span></label>
                        <input type="date" 
                            class="form-control" 
                            id="tanggal" 
                            name="tanggal" 
                            value="{{ old('tanggal', $ulasan->tanggal) }}" 
                            readonly>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
