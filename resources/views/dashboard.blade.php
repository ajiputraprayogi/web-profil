@extends('layouts.base')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">How To Use Simple CRUD Maker With This Boiler</h3>
                                </div>
                                <div class="card-body">
                                    <ol>
                                        <li>Create table first, for example <b>book</b></li>
                                        <li>type <code>php artisan make:crud {table_name}</code> for example <code>php
                                                artisan
                                                make:crud book</code></li>
                                        <li>by default your route will be plural name from your table, so if my table was
                                            book the
                                            route is <b>books</b></li>
                                        <li>or you can custom route name by typing <code>php artisan make:crud {table_name}
                                                --route={route_name}</code> for example <code>php artisan make:crud book
                                                --route=book_crud</code>, that code will be change the default route</li>
                                        <li>adding route to your <code>web.php</code> for example
                                            <code>Route::resource('book_crud',
                                                BukuController::class);</code></li>
                                        <li>Finaly adding menu link on <code>sidebar.blade.php</code> for our new crud</li>
                                        <blockquote class="quote-secondary">
                                            <p>if timestamp error when create or editing data adding this code to model
                                                <code>public
                                                    $timestamps = false;</code></p>
                                            <p>if model table name error or not same with table name type this in model
                                                <code>protected $table = 'table_name';</code> for example <code>protected
                                                    $table =
                                  'book';</code>
                                            </p>
                                            <p>
                                                You can edit file <b>.stub</b> in <b>"views/vendor/stubs"</b> folder to
                                                customize
                                                the crud generator view, model & controller
                                            </p>
                                        </blockquote>
                                        <span>More information for crud generator is <a
                                                href="https://github.com/awais-vteams/laravel-crud-generator"
                                                target="blank()">Here</a></span>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-body">
                            <p>Halo Selamat datang...</p>
                        </div> --}}
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
