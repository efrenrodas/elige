@extends('layouts.app2')

@section('template_title')
    Update Codigovoto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Codigovoto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('codigovotos.update', $codigovoto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('codigovoto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
