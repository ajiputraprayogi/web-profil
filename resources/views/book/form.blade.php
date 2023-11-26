
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nama') }}
            {{ Form::text('nama', $book->nama, ['class' => 'form-control' . ($errors->has('nama') ? ' is-invalid' : ''), 'placeholder' => 'Nama']) }}
            {!! $errors->first('nama', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('kategori') }}
            {{ Form::text('kategori', $book->kategori, ['class' => 'form-control' . ($errors->has('kategori') ? ' is-invalid' : ''), 'placeholder' => 'Kategori']) }}
            {!! $errors->first('kategori', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('keterangan') }}
            {{ Form::text('keterangan', $book->keterangan, ['class' => 'form-control' . ($errors->has('keterangan') ? ' is-invalid' : ''), 'placeholder' => 'Keterangan']) }}
            {!! $errors->first('keterangan', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>