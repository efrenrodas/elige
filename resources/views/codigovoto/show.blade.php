@extends('layouts.app')

@section('template_title')
    {{ $codigovoto->name ?? 'Show Codigovoto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Codigovoto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('codigovotos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Lista:</strong>
                            {{ $codigovoto->id_lista }}
                        </div>
                        <div class="form-group">
                            <strong>Id Codigo:</strong>
                            {{ $codigovoto->id_codigo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
