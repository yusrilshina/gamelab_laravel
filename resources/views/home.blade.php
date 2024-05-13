@extends('adminlte.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $jmlartikel }}</h3>
              <p>Jumlah Artikel</p>
            </div>
            <div class="icon">
              <i class="fa-regular fa-newspaper"></i>
            </div>
            <a href="/artikel" class="small-box-footer">
               Artikel <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $jmlkategori }} </h3>
              <p>Jumlah Kategori</p>
            </div>
            <div class="icon">
            <i class="fa-solid fa-list"></i>
            </div>
            <a href="/kategori" class="small-box-footer">
              Kategori  <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection