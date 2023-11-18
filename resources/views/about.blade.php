<!-- about.blade.php -->

@extends('index')
@section('title', 'About')
@section('isihalaman')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">About</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">About</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left col -->
                <div class="col-md-2">
                    <!-- Gambar -->
                    <img src="{{ asset('gambar/fotoemma.jpeg') }}" alt="Your Image" class="img-fluid" style="max-height: 220px; max-width: 220px;">
                </div>
                <!-- right col -->
                <div class="col-md-6">
                    <!-- Informasi -->
                    <h4>Aplikasi ini dibuat oleh:</h4>
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>Ema Nur Azizah</td>
                        </tr>
                        <tr>
                            <td>Prodi</td>
                            <td>:</td>
                            <td>D3-MI PSDKU Kediri</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td>2131730101</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>11 November 2023</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
