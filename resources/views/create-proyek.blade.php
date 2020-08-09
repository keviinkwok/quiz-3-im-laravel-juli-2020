@extends('layouts.master')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <strong>Create Project</strong>
                </div>
                <div class="float-right">
                    <a href="{{ url('proyek') }}"
                        class="btn btn-danger btn-sm">
                        Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('proyek') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Proyek</label>
                                <input type="text" name="nama" class="form-control @error('nama') 
                                 is-invalid @enderror" value="{{ old('nama') }}" autofocus autocomplete="off">

                                @error('nama')
                                    <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi')
                                 is-invalid @enderror" autocomplete="off"> {{ old('deskripsi') }} </textarea>

                                @error('deskripsi')
                                    <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Manager</label>
                                <select name="managerId" class="form-control">
                                    @foreach ($managerId as $item)
                                        <option value="{{$item->manager_id}}"> {{$item->manager_name}} </option>
                                    @endforeach
                                  </select>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- .content -->
@endsection