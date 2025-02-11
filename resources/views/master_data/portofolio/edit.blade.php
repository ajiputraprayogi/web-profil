@extends('layouts.base')

@section('css')
    <link rel="stylesheet" href="{{asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Portofolio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="container-fluit">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data</h3>
                            </div>
                            @foreach ($portofolio as $row)
                            <form method="POST" onsubmit="return validasiinput();" role="form" enctype="multipart/form-data"
                                action="{{url('/backend/portofolio/'.$row->id)}}">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" class="form-control" name="nama" value="{{ $row->nama }}" required autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail2">Deskripsi</label>
                                                <textarea type="text" class="form-control" name="deskripsi" required>{{ $row->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- Kolom untuk Gambar Lama -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Gambar Lama</label>
                                                        @if($row->gambar)
                                                            <img src="{{ asset($row->gambar) }}" alt="Gambar Lama" style="max-width: 100%; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                                        @else
                                                            <p>Tidak ada gambar lama.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            
                                                <!-- Kolom untuk Preview Gambar Baru -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gambar">Gambar Baru</label>
                                                        <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg, .img, .jpeg, .imeg, .png" onchange="previewImage(event)">
                                                        <div style="margin-top: 10px;">
                                                            <img id="preview" src="#" alt="Preview Gambar Baru" style="display: none; max-width: 100%; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="reset" onclick="history.go(-1)" class="btn btn-danger">Kembali</button>
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script src="{{ asset('lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@push('js_in')
    <script src="{{ asset('backend/master_data/users/users_input.js') }}"></script>
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
@endpush
