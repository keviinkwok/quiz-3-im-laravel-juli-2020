@extends('layouts/master')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <strong>Project Details</strong>
                        </div>
                        <div class="float-right">
                            <a href="{{ url('proyek') }}" class="btn btn-danger btn-sm">
                                Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <h1>{{ $proyek->nama }}</h1>
                        <h2>Manager : {{$proyek->manager_name}}</h2>
                        <p><b>Deskripsi :</b> {{ $proyek->deskripsi }}</p>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
