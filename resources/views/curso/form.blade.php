<div class="box box-info padding-1">
    <div class="box-body">
       
       
        @if (isset($curso->nombre))
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $curso->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
           {{-- <input type="hidden" class="form-control" name="nombre" id="nombre" v-model="nombreCarrera"> --}}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
        @else
        <div class="form-group">
            {{Form::label('Elegir carrera')}}
            <select v-model="carreraSelected" class="form-control" @change="escuchaCambio">
              {{-- <option value="0">Seleccione una opción</option> --}}
                @foreach (json_decode($carr) as $carrera)
                    <option v-bind:value="{{$carrera->Id}}">{{$carrera->Titulo}}</option>
                    
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{-- {{ Form::label('nombre') }} --}}
            {{-- {{ Form::text('nombre', $curso->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }} --}}
           <input type="hidden" class="form-control" name="nombre" id="nombre" v-model="nombreCarrera">
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <input type="hidden" class="form-control" name="codigoExterno" v-model="carreraSelected">

        @endif
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{-- {{ Form::text('cantidad', $curso->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }} --}}
           @if ($curso->cantidad==0)
           <input type="text"  name="cantidad" class="form-control" v-model="cantidad">
            @else
            <input type="text"  name="cantidad" class="form-control" value="{{$curso->cantidad}}">
           @endif
            
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{-- {{ Form::text('estado', $curso->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }} --}}
            <select class="form-control" name="estado" id="estado">
                <option value="0">Inactivo</option>
                <option selected value="1">Activo</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    &nbsp;
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  
    
</div>
