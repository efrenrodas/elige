@extends('layouts.app2')

@section('template_title')
    Update Lista
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Lista</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('listas.update', $lista->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('lista.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
