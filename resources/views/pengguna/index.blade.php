@extends('layouts.main')
@section('title', 'Data Pengguna')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Data Pengguna</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('pengguna.create')}}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="280px">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $u)
                        <tr>
                            <td>{{  $loop->iteration }}</td>
                            <td>{{  $u->name }}</td>
                            <td>{{  $u->email }}</td>
                            <td>{{  $u->role }}</td>
                            <td>
                                <a href="{{ route('pengguna.show', $u->id)}}" class="btn btn-sm btn-secondary">show</a>
                                <a href="{{ route('pengguna.edit', $u->id) }}" class="btn btn-sm btn-warning">edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{$u->id}}">
                                    Hapus
                                </button>
                            
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="exampleModal{{ $u->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $u->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $u->id }}">Hapus Surat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data <strong>{{ $u->email }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('pengguna.destroy', $u->id) }}" method="POST" style="display:inline;">
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