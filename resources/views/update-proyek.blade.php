@extends('layouts.master')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <strong>Update Project</strong>
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
                        <form action="{{ url('proyek/'.$proyek->proyek_id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>Proyek ID</label>
                                <input type="text" name="id" class="form-control @error('id') 
                                 is-invalid @enderror" value="{{ $proyek->proyek_id }}" readonly>

                                @error('id')
                                    <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Proyek</label>
                                <input type="text" name="nama" class="form-control @error('nama')
                                 is-invalid @enderror" value="{{ old('nama',$proyek->nama) }}" autocomplete="off">  

                                @error('nama')
                                    <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') 
                                 is-invalid @enderror" autofocus autocomplete="off"> {{ old('deskripsi',$proyek->deskripsi) }} </textarea>

                                @error('deskripsi')
                                    <div class="invalid-feedback"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Manager</label>
                                <select name="managerId" class="form-control">
                                    @foreach ($managerId as $item)
                                        <option value="{{$item->manager_id}}" 
                                            @if ($item->manager_id === $proyek->manager_id)
                                                selected
                                            @endif
                                            > {{$item->manager_name}} 
                                        </option>
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