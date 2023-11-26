@extends('layouts.base')

@section('template_title')
    Update Book
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Book</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('books.update', $book->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="box box-info padding-1">
                            @include('book.form')
                                <div class="box-footer mt20">
                                    <button type="submit" name="action" value="save"
                                        class="btn btn-primary">Save</button>
                                    <a class="btn btn-danger float-right" href="{{ route('books.index') }}"> Back</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
