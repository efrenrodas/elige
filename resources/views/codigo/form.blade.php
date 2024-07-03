<div class="box box-info padding-1">
    <div class="box-body">
        
        {{-- <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $codigo->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $codigo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_curso') }}
            {{-- {{ Form::text('id_curso', $codigo->id_curso, ['class' => 'form-control' . ($errors->has('id_curso') ? ' is-invalid' : ''), 'placeholder' => 'Id Curso']) }} --}}
           {!! Form::select('id_curso', $cursos, $codigo->id_curso, ['class' => 'form-control' . ($errors->has('id_curso') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el curso']) !!}
            {!! $errors->first('id_curso', '<div class="invalid-feedback">:message</div>') !!}
         
        </div>
        {{-- <div class="form-group">
            {{ Form::label('id_curso') }}
            {{ Form::text('id_curso', $codigo->id_curso, ['class' => 'form-control' . ($errors->has('id_curso') ? ' is-invalid' : ''), 'placeholder' => 'Id Curso']) }}
            {!! $errors->first('id_curso', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>