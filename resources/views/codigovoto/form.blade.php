<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_lista') }}
            {{ Form::text('id_lista', $codigovoto->id_lista, ['class' => 'form-control' . ($errors->has('id_lista') ? ' is-invalid' : ''), 'placeholder' => 'Id Lista']) }}
            {!! $errors->first('id_lista', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_codigo') }}
            {{ Form::text('id_codigo', $codigovoto->id_codigo, ['class' => 'form-control' . ($errors->has('id_codigo') ? ' is-invalid' : ''), 'placeholder' => 'Id Codigo']) }}
            {!! $errors->first('id_codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>