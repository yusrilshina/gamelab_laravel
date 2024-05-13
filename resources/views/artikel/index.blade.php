@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $halaman }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $halaman }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header ">
                            <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
                        </div>
                        <div class="card-body">
                            <table class="table  table-bordered table-striped" id="example2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Judul</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($artikel as $a)
                                    <tr>
                                        <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-center"><img src="{{ asset('/storage/gambar/'.$a->gambar) }}" alt="" width="200px"></td>
                                        <td class="text-center">{{ $a->judul }}</td>
                                        <td class="text-center">{{ $a->deskripsi }}</td>
                                        <td class="text-center">{{ $a->kategori->nama_kategori }}</td>
                                        <td>
                                            <form class="deleteForm" action="{{ route('artikel.destroy', $a->id) }}" method="POST">
                                                <a href="{{ route('artikel.edit', $a->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger deleteButton"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    </script>
    @endif

    @endsection