@extends('layouts.main')
@section('title', 'Tambah Data Ulasan')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Data Ulasan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Tambah Data Ulasan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah Data
            </div>
            <div class="card-body">
                <form action="{{ route('ulasan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="buku_id">Judul Buku</label>
                        <select name="buku_id" id="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                            <option value="">-- Pilih Judul Buku --</option>
                            @foreach ($buku as $b)
                                @if ($b->stok > 1)
                                    <option value="{{ $b->id }}">{{  $b->judul }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('buku_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="isi_ulasan">Isi Ulasan:</label>
                        <input type="text" class="form-control @error('isi_ulasan') is-invalid @enderror" id="isi_ulasan" name="isi_ulasan" value="{{ old('isi_ulasan') }}">
                        @error('isi_ulasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror">
                            <option value="">-- Pilih Rating --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        @error('rating')

                            <div class="invalid-feedback">{{ $message }}</div>

                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="tanggal">Tanggal: <span class="text-muted" style="font-size: 0.9em;">(Diisi otomatis oleh sistem)</span></label>
                        <input type="date" 
                        class="form-control" 
                        id="tanggal" 
                        name="tanggal" 
                        value="{{ date('Y-m-d') }}" 
                        readonly>
                 
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                  


                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection