<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('nombres', $lista->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::text('imagen', $lista->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            <label for="imagen" class="control-label">{{ 'Imagen del curso' }}</label>
            @if (isset($lista->imagen))
                <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $lista->imagen }}" alt=""
                    width="200">
                <br> 
            @endif 
            <input class="form-control" type="file" name="imagen"
                id="imagen"  value="">
           
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        
        </div>

        <div class="form-group">
            {{ Form::label('string') }}
            {{ Form::text('string', $lista->string, ['class' => 'form-control' . ($errors->has('string') ? ' is-invalid' : ''), 'placeholder' => 'String']) }}
            {!! $errors->first('string', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>