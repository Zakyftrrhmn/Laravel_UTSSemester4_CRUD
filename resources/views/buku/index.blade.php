@extends('layouts.main')
@section('title', 'Data Buku')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Buku</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Data Buku</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('buku.create')}}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Stok</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Stok</th>
                            <th width="280px">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($buku as $b)
                        <tr>
                            <td>{{  $loop->iteration }}</td>
                            <td>{{  $b->judul }}</td>
                            <td>{{  $b->pengarang }}</td>
                            <td>{{  $b->penerbit }}</td>
                            <td>{{  $b->stok }}</td>
                            <td>
                                <a href="{{ route('buku.show', $b->id)}}" class="btn btn-sm btn-secondary">show</a>
                                <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-sm btn-warning">edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{$b->id}}">
                                    Hapus
                                </button>
                            
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="exampleModal{{ $b->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $b->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $b->id }}">Hapus Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data <strong>{{ $b->judul }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('buku.destroy', $b->id) }}" method="POST" style="display:inline;">
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