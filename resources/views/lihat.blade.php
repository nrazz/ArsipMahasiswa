@extends('index')
@section('title', 'lihat')
@section('isihalaman')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lihat Arsip</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Lihat</a></li>
                        <li class="breadcrumb-item active">Arsip</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form class="sidebar-form">
                <div class="mt-4 p-4 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h2 class="text-2xl font-semibold mb-4">Detail Arsip Surat</h2>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td><strong>Nomor Surat</strong></td>
                                <td>:</td>
                                <td>{{ $surat->nomor_surat }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kategori</strong></td>
                                <td>:</td>
                                <td>{{ $surat->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <td><strong>Judul</strong></td>
                                <td>:</td>
                                <td>{{ $surat->judul }}</td>
                            </tr>
                            <tr>
                                <td><strong>Waktu Pengarsipan</strong></td>
                                <td>:</td>
                                <td>{{ $surat->created_at }}</td>
                            </tr>
                        </table>

                        <br>
                        <!-- Penampil PDF -->
                        <iframe src="{{ asset('berkas/' . $surat->berkas) }}" width="100%" height="500px"></iframe>
                    </div>
                    <div class="card-footer">
                        <a href="/arsip" class="btn btn-secondary">Kembali</a>
                        <a href="{{ asset('berkas/' . $surat->berkas) }}" download="{{ $surat->judul }}.pdf"
                            class="btn btn-kuning"><i class="fas fa-download"></i> Unduh</a>
                        <a href="/arsip" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
