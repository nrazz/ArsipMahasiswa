@extends('index')
@section('title'. 'kategori')
@section('isihalaman')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori Surat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori Surat</li>
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
                <div class="pencarian">
                    <label for="search-input">Cari Kategori:</label>
                    <div class="input-group">
                        <input type="text" id="search-input" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </form>

            <div class="table-responsive" style="padding-top: 20px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($kategori as $k)
                        <tr>
                            <td align="center">{{ $k->id }}</td>
                            <td>{{ $k->nama_kategori }}</td>
                            <td>{{ $k->keterangan }}</td>

                            <td align="center">
                            <a href="#" class="text-warning" data-toggle="modal" data-target="#modalKategoriEdit{{ $k->id}}">
                              <i class="fas fa-edit"></i>
                            </a>


                      <!-- Awal Modal EDIT data Kategori -->
                        <div class="modal fade" id="modalKategoriEdit{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="modalKategoriEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalKategoriEditLabel">Form Edit Data Kategori</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formkategoriedit" id="formkategoriedit" action="/kategori/edit/{{ $k->id}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            

                                            <p>
                                            <div class="form-group row">
                                                <label for="id" class="col-sm-4 col-form-label">ID Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id" name="id" value="{{ $k->id}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_kategori" class="col-sm-4 col-form-label">Nama Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $k->nama_kategori}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $k->keterangan}}">
                                                </div>
                                            </div>


                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="kategoritambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Kategori -->
                        |
                        <a href="#" class="text-danger" data-toggle="modal" data-target="#modalDelete{{ $k->id }}">
    <i class="fas fa-trash-alt"></i>
</a>

<!-- Add this modal for confirmation -->
<div class="modal fade" id="modalDelete{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{ route('kategori.hapus', $k->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
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
<div class="page"> 
<!--awal pagination-->
<div class="page">
    <!--awal pagination-->
    <div class="page">
    <!-- Stylish Pagination -->
    Halaman : {{ $kategori->currentPage() }} <br />
    Jumlah Data : {{ $kategori->total() }} <br />
    Data Per Halaman : {{ $kategori->perPage() }} <br />

    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($kategori->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $kategori->previousPageUrl() }}" aria-label="Previous">&laquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $kategori->lastPage(); $i++)
                    @if ($i == $kategori->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $i }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $kategori->url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor

                {{-- Next Page Link --}}
                @if ($kategori->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $kategori->nextPageUrl() }}" aria-label="Next">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKategoriTambah">
                    Tambah Kategori
                </button>
                
    <!-- Awal Modal tambah data kategori -->
    <div class="modal fade" id="modalKategoriTambah" tabindex="-1" role="dialog" aria-labelledby="modalArsipTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKategoriTambahLabel">Form Input Kategori</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('kategori.tambah')}} " method="POST" enctype="multipart/form-data">
                        @csrf

                        <p>
                        <div class="form-group row">
                            <label for="id" class="col-sm-4 col-form-label">ID Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="id" name="id" placeholder="Masukan ID Kategori">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama_kategori" class="col-sm-4 col-form-label">Nama Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukan Nama Kategori">
                            </div>
                        </div>

                        </p>

                        
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit"  value="" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
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
