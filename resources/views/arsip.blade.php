@extends('index')
@section('title', 'arsip')
@section('isihalaman')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Arsip</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <div class="pencarian">
                    <label for="search-input">Cari Arsip:</label>
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
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Pengarsipan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach ($arsip as $a)
        <tr>
            <td align="center">{{ $a->nomor_surat }}</td>
            <!-- <td>{{ $a->nama_kategori }}</td> -->
            <td>
                @if($a->kategorii)
                    {{ $a->kategorii->nama_kategori }}
                @else
                    Tidak Tersedia
                @endif
            </td>
                            <td>{{ $a->judul }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($a->created_at)->isoFormat('dddd, D MMMM Y H:mm:ss') }}
                            </td>

                            <td align="center">
                            <a href="#" class="text-warning" data-toggle="modal" data-target="#modalArsipEdit{{ $a->nomor_surat }}">
    <i class="fas fa-edit"></i>
</a>


                                                     <!-- Awal Modal EDIT data Arsip -->
                        <div class="modal fade" id="modalArsipEdit{{$a->nomor_surat}}" tabindex="-1" role="dialog" aria-labelledby="modalArsipEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalArsipEditLabel">Form Edit Data Arsip</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formarsipedit" id="formarsipedit" action="/arsip/edit/{{ $a->nomor_surat}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            

                                            <p>
                                            <div class="form-group row">
                                                <label for="nomor_surat" class="col-sm-4 col-form-label">Nomor Surat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ $a->nomor_surat}}">
                                                </div>
                                            </div>

                                            <!-- <p>
                                            <div class="form-group row">
                                                <label for="nama_kategori" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $a->nama_kategori}}">
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label for="nama_kategori" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="nama_kategori" name="nama_kategori">
                                                        @foreach ($kategori as $row)
                                                        <option value="{{ $row->id }}" @if($a->kategorii && $a->kategorii->id == $row->id) selected @endif>{{ $row->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $a->judul}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
    <label for="berkas" class="col-sm-4 col-form-label">Berkas (PDF)</label>
    <div class="col-sm-8">
        <input type="file" class="form-control-file" id="berkas" name="berkas" accept=".pdf">
        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti berkas. Berkas saat ini: {{ $a->berkas }}</small>
    </div>
</div>


                                            <!-- <p>
                                            <div class="form-group row">
                                                <label for="waktu" class="col-sm-4 col-form-label">Waktu</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="waktu" name="waktu" value="{{ $a->waktu}}">
                                                </div>
                                            </div> -->

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="arsiptambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Arsip -->
                        |
                        <a href="#" class="text-danger" data-toggle="modal" data-target="#modalDelete{{ $a->nomor_surat }}">
    <i class="fas fa-trash-alt"></i>
</a>

<!-- Add this modal for confirmation -->
<div class="modal fade" id="modalDelete{{ $a->nomor_surat }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
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
                <form action="{{ route('arsip.hapus', $a->nomor_surat) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

                        <a href="{{ url('berkas/' . $a->berkas) }}" target="_blank">
                            <i class="fa fa-download"></i> <!-- Ganti dengan kelas FontAwesome mata -->
                        </a>
                        <!-- <a href="{{ route('arsip.lihat', $a->nomor_surat) }}" class="mr-5 font-medium text-green-400 hover:underline"><i class="fa fa-eye"></i> -->
                        <a href="{{ route('arsip.lihat', ['nomor_surat' => $a->nomor_surat, 'created_at' => $a->created_at]) }}" class="mr-5 font-medium text-green-400 hover:underline"><i class="fa fa-eye"></i></a>

                        
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
    Halaman : {{ $arsip->currentPage() }} <br />
    Jumlah Data : {{ $arsip->total() }} <br />
    Data Per Halaman : {{ $arsip->perPage() }} <br />

    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($arsip->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $arsip->previousPageUrl() }}" aria-label="Previous">&laquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $arsip->lastPage(); $i++)
                    @if ($i == $arsip->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $i }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $arsip->url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor

                {{-- Next Page Link --}}
                @if ($arsip->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $arsip->nextPageUrl() }}" aria-label="Next">&raquo;</a>
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

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalArsipTambah">
                    Arsipkan Surat
                </button>
                
    <!-- Awal Modal tambah data arsip -->
    <div class="modal fade" id="modalArsipTambah" tabindex="-1" role="dialog" aria-labelledby="modalArsipTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalArsipTambahLabel">Form Input Arsip</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('arsip.tambah')}} " method="POST" enctype="multipart/form-data">
                        @csrf

                        <p>
                        <div class="form-group row">
                            <label for="nomor_surat" class="col-sm-4 col-form-label">Nomor Surat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukan Nomor Surat">
                            </div>
                        </div>

                        <!-- <p>
                        <div class="form-group row">
                            <label for="nama_kategori" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukan Kategori">
                            </div>
                        </div>

                        </p> -->

                        <!-- <div class="form-group row">
                                            <label for="id" class="col-sm-4 col-form-label">Kategori</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="id" name="nama_kategori">
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach ($kategori as $row)
                                                    <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
    <label for="nama_kategori" class="col-sm-4 col-form-label">Kategori</label>
    <div class="col-sm-8">
        @if ($kategori->count() > 0)
            <select class="form-control" id="nama_kategori" name="nama_kategori">
                @foreach ($kategori as $row)
                    <option value="{{ $row->id }}" @if($a->kategorii && $a->kategorii->id == $row->id) selected @endif>{{ $row->nama_kategori }}</option>
                @endforeach
            </select>
        @else
            <p>Tidak ada kategori yang tersedia.</p>
        @endif
    </div>
</div>


                                    

                        
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="berkas" class="col-sm-4 col-form-label">Berkas (PDF)</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file"  id="berkas" name="berkas" accept=".pdf" required>
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
<script>
    function showPdf(nomor_surat) {
        $.ajax({
            url: '/arsip/showPdf/' + nomor_surat,
            type: 'GET',
            success: function (response) {
                // Redirect ke /lihat dengan membawa data yang diperlukan
                window.location.href = '/lihat/' + nomor_surat + '?pdfContent=' + response.pdfContent;
            },
            error: function () {
                alert('Gagal menampilkan PDF');
            }
        });
    }
</script>

<!-- /.content-wrapper -->
@endsection
