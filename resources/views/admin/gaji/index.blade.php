@extends('layouts.app')
@section('title', 'Gaji List')
@push('bread')
<li class="breadcrumb-item active">Gaji</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Back</a>
                <a href="{{ route('admin.gaji.create') }}" class="btn btn-sm btn-primary">Create</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gaji.filter') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="date" class="form-control @error('start') is-invalid @enderror" name="start">
                                @error('start')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="date" class="form-control @error('end') is-invalid @enderror" name="end">
                                @error('end')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success btn-block">Submit</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>pegawai</th>
                                <th>tanggal</th>
                                <th>gaji pokok</th>
                                <th>Penerimaan</th>
                                <th>Potongan</th>
                                <th>Total</th>
                                <th>jabatan</th>
                                <th>golongan</th>
                                <th>admin</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        @php
                        $array_gaji_pokok = [];
                        $array_penerimaan = [];
                        $array_potongan = [];
                        $array_total = [];
                        @endphp
                        <tbody>
                            @foreach($penggajians as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->pegawai->nama }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ number_format($data->gaji_pokok) }}</td>
                                <th>{{ number_format($data->penerimaan->sum('nominal') - $data->gaji_pokok) }}</th>
                                <th>{{ number_format($data->potongan->sum('nominal')) }}</th>
                                <th>{{ number_format($data->gaji_pokok + (($data->penerimaan->sum('nominal') - $data->gaji_pokok) - $data->potongan->sum('nominal'))) }}</th>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->golongan }}</td>
                                <td>{{ $data->admin }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.gaji.print',$data->id) }}" class="btn btn-sm btn-secondary">print</a>
                                        <a href="{{ route('admin.gaji.show',$data->id) }}" class="btn btn-sm btn-success">Rincian</a>
                                        <a href="{{ route('admin.gaji.edit',$data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.gaji.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger delete_confirm" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @php
                            array_push($array_gaji_pokok, $data->gaji_pokok);
                            array_push($array_penerimaan, $data->penerimaan->sum('nominal') - $data->gaji_pokok);
                            array_push($array_potongan, $data->potongan->sum('nominal'));
                            array_push($array_total, $data->gaji_pokok + (($data->penerimaan->sum('nominal') - $data->gaji_pokok) - $data->potongan->sum('nominal')));
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>{{ number_format(array_sum($array_gaji_pokok)) }}</th>
                                <th>{{ number_format(array_sum($array_penerimaan)) }}</th>
                                <th>{{ number_format(array_sum($array_potongan)) }}</th>
                                <th>{{ number_format(array_sum($array_total)) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('admin.script')
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
    $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    })
    $('.delete_confirm').click(function(event) {
        let form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
@endpush