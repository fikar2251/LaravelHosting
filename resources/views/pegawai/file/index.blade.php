@extends('layouts.app')
@section('title', 'Document Control')
@push('bread')
<li class="breadcrumb-item active">Document Control</li>
@endpush
@push('pegawai.head')

@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="#" data-target="#modaldemo1" data-toggle="modal" class="btn btn-primary">Add File</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover" id="tablefilepegawai">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Size & Ekstension</th>
                                <th>DateTime</th>
                                <th>Pegawai</th>
                                <th>Access</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--@foreach($file as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td><strong>{{ number_format(Storage::size($data->file) / 1048576,2) }} MB | {{ File::extension($data->file) }}</strong></td>
                            <td>{{ Carbon\Carbon::parse($data->date)->format('d F Y H:i:s') }}</td>
                            <td>{{ $data->pegawai->nama }}</td>
                            <td>@foreach($data->access as $list) {{ $list->user->name.','}} @endforeach</td>
                            <td>
                                <div class="btn-group">
                                    @if($data->password != null)
                                    <a href="#" onclick="ButtonPrompt(this)" data-id="{{ $data->id }}" class="btn btn-indigo"><i class="fa fa-lock"></i></a>
                                    @else
                                    <a href="{{ asset('storage/'.$data->file) }}" class="btn btn-indigo"><i class="fas fa-folder-open"></i></a>
                                    @endif
                                    <a href="#" onclick="CommentPreview(this)" data-id="{{ $data->id }}" data-target="#modaldemo2" data-toggle="modal" class="btn btn-purple"><i class="fas fa-comment-dots"></i></a>
                                    <a href="#" onclick="AccessPreview(this)" data-id="{{ $data->id }}" data-target="#modaldemo3" data-toggle="modal" class="btn btn-warning"><i class="fas fa-universal-access"></i></a>
                                </div>
                            </td>
                            </tr>
                            @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pegawai.file.modal')

<input type="hidden" id="pegawai_id" value="{{ $pegawai->id }}">
@stop
@push('pegawai.head')
<style>
    .modal-open .select2-container {
        z-index: 9999;
    }
</style>
<!---Sweet-alert Css-->
<link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />
@endpush
@push('pegawai.script')
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function() {
        let id = $('#pegawai_id').val()
        $('#tablefilepegawai').DataTable({
            processing: true,
            serverSide: true,
            ajax: `/api/pegawai/file/index/${id}`,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'file_name',
                    name: 'file_name'
                },
                {
                    data: 'size_ekstension',
                    name: 'size_ekstension',
                },
                {
                    data: 'datetime',
                    name: 'datetime'
                },
                {
                    data: 'pegawai',
                    name: 'pegawai'
                },
                {
                    data: 'access',
                    name: 'access'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        })
    })

    function SubmitUploadFilePegawai() {
        event.preventDefault();
        let id = $('#pegawai_id').val()
        let data = $('#FormUploadFilePegawai')[0]
        let form = new FormData()
        console.log($(data).find('input[type=password]').val())
        form.append('nama_file', $(data).find('input[type=text]').val())
        form.append('tanggal_file', $(data).find('input[type=datetime]').val())
        for (let index = 0; index < $(data).find('input[type=file]')[0].files.length; index++) {
            form.append('file[]', $(data).find('input[type=file]')[0].files[index]);
        }
        form.append('password', $(data).find('input[type=password]').val())
        form.append('pegawai_id', $('#pegawai_id').val())
        $.ajax({
            url: `/api/pegawai/file/store/filepegawai`,
            method: 'post',
            data: form,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('#tablefilepegawai').DataTable().ajax.url(`/api/pegawai/file/index/${id}`).load()
                console.log(response)
                swal({
                    title: "Successfully",
                    text: 'Success',
                    type: "success",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            },
            error: function(error) {
                console.log(error)
                swal({
                    title: "Something Went Wrong",
                    text: error.statusTexts,
                    type: "error",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            }
        })
    }

    function SubmitComment() {
        event.preventDefault()
        let data = $('#FormComment')[0]
        let form = new FormData()
        form.append('comment', $(data).find('textarea').val())
        form.append('file_pegawai_id', $('#file_pegawai_id').val())
        form.append('pegawai_id', $('#pegawai_id').val())
        console.log(form.getAll('file_pegawai_id'))
        $.ajax({
            url: '/api/pegawai/file/comment/store',
            method: 'post',
            data: form,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                console.log(response)
                $('#datatablecomment').DataTable().ajax.url(`/api/pegawai/file/comment/${response.file_pegawai_id}`).load()
                swal({
                    title: "Successfully",
                    text: 'Success',
                    type: "success",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            },
            error: function(error) {
                console.log(error)
                swal({
                    title: "Something Went Wrong",
                    text: error.statusTexts,
                    type: "error",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            }
        })
    }

    function SubmitAccess() {
        let data = $('#FormAccess').serialize()
        $.ajax({
            url: '/api/pegawai/file/access/store',
            method: 'post',
            data: data,
            success: function(response) {
                let id = $('#pegawai_id').val()
                $('#datatableaccess').DataTable().ajax.url(`/api/pegawai/file/access/index/${response.file_id}`).load()
                $('#tablefilepegawai').DataTable().ajax.url(`/api/pegawai/file/index/${id}`).load()
                console.log(response)
            },
            error: function(error) {
                console.log(error)
            }
        })
    }

    function AccessPreview(qr) {
        console.log(qr)
        let id = $(qr).attr('data-id')
        $('#file_id').val(id)
        $(`#access`).select2({
            placeholder: 'Select File No',
            ajax: {
                url: `/api/pegawai/file/access/${id}/`,
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        $('#datatableaccess').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: `/api/pegawai/file/access/index/${id}`,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'pegawai',
                    name: 'pegawai'
                }
            ]
        })
    }

    function CommentPreview(qr) {
        let id = $(qr).attr('data-id')
        $('#file_pegawai_id').val(id)
        $('#ThisForLoop').html('')
        $('#datatablecomment').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: `/api/pegawai/file/comment/${id}`,
            columns: [{
                    name: 'foto',
                    data: 'foto'
                },
                {
                    name: 'pegawai',
                    data: 'pegawai'
                },
                {
                    name: 'comment',
                    data: 'comment'
                },
                {
                    name: 'timestamp',
                    data: 'timestamp'
                }
            ],
            order: [
                [3, "asc"]
            ]
        })
    }

    function ButtonPrompt(qr) {
        let id = $(qr).attr('data-id')
        Swal.fire({
            title: 'Input Password to unlock this file',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Look up',
            showLoaderOnConfirm: true,
            preConfirm: (password) => {
                return fetch(`/api/pegawai/file/password/${id}/${password}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = result.value
                console.log(result)
                Swal.fire({
                    title: `${result.value}`
                })
            }
        })
    }
</script>
@endpush