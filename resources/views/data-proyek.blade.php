@extends('layouts.master')

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
                            <strong>Data Proyek</strong>
                        </div>
                        <div class="float-right">
                            <a href="{{ url('proyek/create') }}" class="btn btn-success btn-sm">
                                Create
                            </a>
                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <table id="tablecust" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Proyek ID</th>
                                    <th>Nama Proyek</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Deadline</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyek as $item)
                                    <tr>
                                        <td>{{ $item->proyek_id }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->tanggal_mulai }}</td>
                                        <td>{{ $item->tanggal_deadline }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('proyek/' . $item->proyek_id) }}" class="btn btn-warning btn-sm">
                                                Detail
                                            </a>
                                            <a href="{{ url('/proyek/'.$item->proyek_id.'/daftarkan-staff') }}" class="btn btn-success btn-sm">
                                                Tambah Staff
                                            </a>
                                            <a href="{{ url('proyek/' . $item->proyek_id . '/edit') }}"
                                                class="btn btn-primary btn-sm">
                                                Update
                                            </a>
                                            <form action="{{ url('proyek/' . $item->proyek_id) }}" method='POST' class='d-inline'
                                                onsubmit="return confirm('Are you sure to Delete this Project ?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
<script src="{{ asset('sbadmin2/js/swal.min.js') }}">
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush
