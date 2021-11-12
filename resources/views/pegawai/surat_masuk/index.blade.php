@extends('layouts.app')
@section('title', 'Surat Masuk')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('pegawai.profile.index') }}">Pegawai</a></li>
<li class="breadcrumb-item active">Surat</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div aria-multiselectable="true" class="accordion accordion-primary" id="accordion2" role="tablist">
            @foreach($surat as $row)
            <div class="card">
                <div class="card-header" id="headingOne{{ $loop->iteration }}" role="tab">
                    <a aria-controls="collapseOne{{ $loop->iteration }}" aria-expanded="false" data-toggle="collapse" href="#collapseOne{{ $loop->iteration }}"><strong>{{ $row->nomor }}</strong></a>
                </div>
                <div aria-labelledby="headingOne{{ $loop->iteration }}" class="collapse" data-parent="#accordion2" id="collapseOne{{ $loop->iteration }}" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless bd">
                                    <thead>
                                        <tr>
                                            <th colspan="3">
                                                <h5 class="text-center">Surat Masuk</h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Asal</th>
                                            <th>:</th>
                                            <th>{{ $row->asal }}</th>
                                        </tr>
                                        <tr>
                                            <th>Ringkas</th>
                                            <th>:</th>
                                            <th>{{ $row->ringkas }}</th>
                                        </tr>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>:</th>
                                            <th>{{ $row->keterangan }}</th>
                                        </tr>
                                        <tr>
                                            <th>Attachment</th>
                                            <th>:</th>
                                            <th><a href="{{ asset('storage/'.$row->file) }}" class="btn btn-info"><i class="ti-file"></i></a></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <tbody>
                                    @foreach($row->disposisi->where('pegawai_id',$pegawai->id) as $list)
                                    <tr>
                                        <th>
                                            @foreach($list->response as $child)
                                                <ul>
                                                    <li>{{ $child->response }}</li>
                                                </ul>
                                            @endforeach
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </div>
                            <div class="col-md-6">
                                @foreach($row->disposisi->where('pegawai_id',$pegawai->id) as $list)
                                <table class="table table-borderless bd">
                                    <thead>
                                        <tr>
                                            <th colspan="3">
                                                <h5 class="text-left">Disposisi</h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th>Tujuan</th>
                                            <th>:</th>
                                            <th>{{ $list->tujuan }}</th>
                                        </tr>
                                        <tr>
                                            <th>Isi</th>
                                            <th>:</th>
                                            <th>{{ $list->isi }}</th>
                                        </tr>
                                        <tr>
                                            <th>Batas Waktu</th>
                                            <th>:</th>
                                            <th>{{ \Carbon\Carbon::parse($list->batas_waktu)->format('d F Y') }}/{{ \Carbon\Carbon::parse($list->batas_waktu)->diffForHumans() }}</th>
                                        </tr>
                                        <tr>
                                            <th>Catatan</th>
                                            <th>:</th>
                                            <th>{{ $list->catatan }}</th>
                                        </tr>
                                        <tr>
                                            <th>Tipe</th>
                                            <th>:</th>
                                            <th>{{ $list->tipe }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="{{ route('pegawai.surat_masuk.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                                    <input type="hidden" name="disposisi_id" value="{{ $list->id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="response">Response</label>
                                                <textarea class="form-control" name="response" id="response" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-sm btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- accordion -->
    </div>
    {{ $surat->links() }}
</div>
@stop