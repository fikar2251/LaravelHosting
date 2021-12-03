@extends('layouts.app')
@section('title', 'Riwayat Absensi')
@push('bread')
<li class="breadcrumb-item active">Riwayat Absensi</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <table>
                                <tr>
                                    <th>Nama</th>
                                    <th>:</th>
                                    <th>{{ $pegawai->nama }}</th>
                                </tr>
                                <tr>
                                    <th>Divisi</th>
                                    <th>:</th>
                                    <th>{{ $pegawai->unit->nama }}</th>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <form action="{{ route('pegawai.absensi.filter') }}" method="post">
                                @csrf
                                <div class="d-flex">
                                    <input type="month" name="month" class="form-control">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tableabsensi">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0;$i < Carbon\Carbon::parse($month)->lastOfMonth()->format('d');$i++)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($month)->startOfMonth()->addDay($i)->format('Y m d l') }}</td>
                                    <td>
                                        @if(Carbon\Carbon::parse($month)->startOfMonth()->addDay($i)->isWeekend())
                                        <span class="badge badge-danger">Libur</span>
                                        @else
                                        @if(\App\Models\Absensi::where('pegawai_id',$pegawai->id)->whereDate('tanggal',Carbon\Carbon::parse($month)->startOfMonth()->addDay($i)->format('Y-m-d'))->exists())
                                        <span class="badge badge-success">{{\App\Models\Absensi::where('pegawai_id',$pegawai->id)->whereDate('tanggal',Carbon\Carbon::parse($month)->startOfMonth()->addDay($i)->format('Y-m-d'))->first()->masuk ?? 'Belum Absen'}}</span>
                                        @else<span class="badge badge-warning">tidak absen</span>
                                        @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(Carbon\Carbon::parse($month)->startOfMonth()->addDay($i)->isWeekend())
                                        <span class="badge badge-danger">Libur</span>
                                        @else
                                        @if(\App\Models\Absensi::where('pegawai_id',$pegawai->id)->whereDate('tanggal',Carbon\Carbon::parse($month)->startOfMonth()->addDay($i)->format('Y-m-d'))->exists())
                                        <span class="badge badge-success">{{\App\Models\Absensi::where('pegawai_id',$pegawai->id)->whereDate('tanggal',Carbon\Carbon::parse($month)->startOfMonth()->addDay($i)->format('Y-m-d'))->first()->keluar ?? 'Belum Absen'}}</span>
                                        @else<span class="badge badge-warning">tidak absen</span>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('pegawai.script')

<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tableabsensi').DataTable({
            paging: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print', 'pdf'
            ]
        })
    })
</script>
@endpush