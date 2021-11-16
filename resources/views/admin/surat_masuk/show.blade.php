@extends('layouts.app')
@section('title', 'Show')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.surat_masuk.index') }}">Surat Masuk</a></li>
<li class="breadcrumb-item active">Show</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="badge badge-warning">{{ $surat_masuk->nomor }}</span>
                <span class="badge badge-success">{{ $surat_masuk->asal }}</span>
            </div>
            <div class="card-body">
                <table cellpadding="5">
                    <tr>
                        <th>Ringkas</th>
                        <th>:</th>
                        <th>{{ $surat_masuk->ringkas }}</th>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <th>:</th>
                        <th>{{ $surat_masuk->keterangan }}</th>
                    </tr>
                    <tr>
                        <th>File</th>
                        <th>:</th>
                        <th><a href="{{ asset('storage/'.$surat_masuk->file) }}" class="btn btn-sm btn-purple">File</a></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tabledisposisi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tujuan</th>
                                <th>Isi</th>
                                <th>Batas Waktu Dan Tipe</th>
                                <th>Reponse</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($surat_masuk->disposisi as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->tujuan }}</td>
                                <td>{{ $data->isi }}</td>
                                <td>{{ $data->batas_waktu }} / {{ $data->tipe }}</td>
                                <td><a class="btn btn-sm btn-info" data-target="#modaldemo1" data-id="{{ $data->id }}" onclick="ResponsePreview(this)" data-toggle="modal">Response</a></td>
                                <!-- BASIC MODAL -->

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Response Preview</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pegawai</th>
                                <th>Response</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody id="ThisForLoop"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('admin.script')
<script>
    $('#tabledisposisi').DataTable()
    function ResponsePreview(qr)
    {
        $('#ThisForLoop').html('')
        $.ajax({
            url: `/api/admin/surat_masuk/disposisi/response/${$(qr).attr('data-id')}`,
            success: function(response){
                $.each(response, function() {
                $('#ThisForLoop').append(`<tr>` +
                    `<td>` + this.id + `</td>` +
                    `<td>` + this.pegawai.nama + `</td>` +
                    `<td>` + this.response + `</td>` +
                    `<td>` + moment(this.created_at).format('Y-M-D H:m:s') + `</td>` +
                    `</tr>`)
            })
            }
        })
    }
</script>
@endpush