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
                                <h3 class="card-title">Tambah Data</h3>
                            </div>
                            <form method="POST" onsubmit="return validasiinput();" role="form" enctype="multipart/form-data"
                                action="{{url('/backend/portofolio')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" class="form-control" name="nama" required autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail2">Deskripsi</label>
                                                <textarea type="text" class="form-control" name="deskripsi" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Gambar</label>
                                                <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg, .img, .jpeg, .imeg, .png" required onchange="previewImage(event)">
                                                <img id="preview" src="#" alt="Preview Gambar" style="display:none; margin-top:10px; max-width:100%; max-height:200px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="reset" onclick="history.go(-1)" class="btn btn-danger">Kembali</button>
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
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
            var reader = new FileReader();
            var imageField = document.getElementById("preview");

            reader.onload = function() {
                if (reader.readyState == 2) {
                    imageField.src = reader.result;
                    imageField.style.display = "block";
                }
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
