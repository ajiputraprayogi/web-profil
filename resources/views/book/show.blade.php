@extends('layouts.base')

@section('template_title')
    {{ $book->name ?? 'Show Book' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Book</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nama:</strong>
                            {{ $book->nama }}
                        </div>
                        <div class="form-group">
                            <strong>Kategori:</strong>
                            {{ $book->kategori }}
                        </div>
                        <div class="form-group">
                            <strong>Keterangan:</strong>
                            {{ $book->keterangan }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
