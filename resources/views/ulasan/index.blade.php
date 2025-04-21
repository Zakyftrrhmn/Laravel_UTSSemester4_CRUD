@extends('layouts.main')
@section('title', 'Data Ulasan')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Ulasan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Data Ulasan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('ulasan.create')}}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>judul Buku</th>
                            <th>Isi Ulasan</th>
                            <th>Rating</th>
                            <th>Tanggal</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>judul Buku</th>
                            <th>Isi Ulasan</th>
                            <th>Rating</th>
                            <th>Tanggal</th>
                            <th width="280px">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($ulasan as $u)
                        <tr>
                            <td>{{  $loop->iteration }}</td>
                            <td>{{ $u->buku->judul ?? '-' }}</td>
                            <td>{{  $u->isi_ulasan }}</td>
                            <td>{{  $u->rating }}</td>
                            <td>{{ \Carbon\Carbon::parse($u->tanggal)->translatedFormat('d F Y') }}</td>
                            <td>
                                <a href="{{ route('ulasan.show', $u->id)}}" class="btn btn-sm btn-secondary">show</a>
                                <a href="{{ route('ulasan.edit', $u->id) }}" class="btn btn-sm btn-warning">edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{$u->id}}">
                                    Hapus
                                </button>
                            
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="exampleModal{{ $u->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $u->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $u->id }}">Hapus Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data ulasan dari <strong>
                                                    {{ $u->buku->judul ?? '-' }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('ulasan.destroy', $u->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection