@extends('layouts.base')

@section('css')
    <link rel="stylesheet" href="{{asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
@endsection

<style>
    .checkbox-lg .form-check-input {
        top: .8rem;
        scale: 1.4;
        margin-right: 0.7rem;
    }

    .checkbox-lg .form-check-label {
        padding-top: 13px;
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles</h1>
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
                            <form method="POST" role="form" enctype="multipart/form-data"
                                action="{{url('/backend/roles/'.$role->id)}}">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" class="form-control" name="nama" value="{{ $role->name }}" required autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Pilih Permissions</label>
                                                <div class="row">
                                                    @foreach ($permission_grup as $row_permission_grup)
                                                        <div class="col-md-3">
                                                            <div class="card card-secondary mb-0">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">
                                                                        {{ $row_permission_grup[0]->permission_grup }}</h3>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                @foreach ($permissions as $row)
                                                                    @if ($row->permission_grup == $row_permission_grup[0]->permission_grup)
                                                                        <div class="form-check checkbox-lg">
                                                                            <input class="form-check-input"
                                                                                name="permissions[]" type="checkbox"
                                                                                value="{{ $row->id }}"
                                                                                id="{{ $row->id }}"@foreach ($role_permission as $row_role_permission)
                                                                                @if($row_role_permission->permission_id == $row->id)
                                                                                checked
                                                                                @endif
                                                                            @endforeach>
                                                                            <label class="form-check-label text-bold"
                                                                                for="{{ $row->id }}">
                                                                                {{ $row->name }}
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
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

@endpush
