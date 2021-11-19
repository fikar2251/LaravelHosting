@extends('layouts.app')
@section('title', 'Kenaikan Berkala List')
@push('bread')
<li class="breadcrumb-item active">Kenaikan Berkala</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <td>Kode</td>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Tanggal Generate</th>
                                <th>Tanggal Kenaikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kenaikan_berkalas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode }}</td>
                                <td><a href="{{ route('pegawai.profile.show',$data->pegawai_id) }}">{{ $data->pegawai->nip }}</a></td>
                                <td>{{ $data->pegawai->nama }}</td>
                                <td>{{ $data->tanggal_generate }}</td>
                                <td>{{ $data->tanggal_kenaikan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('pegawai.script')
<script>
    $('#datatable').DataTable()
</script>
@endpush