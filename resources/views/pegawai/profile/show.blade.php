@extends('layouts.app')
@section('title', 'Pegawai Detail')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('pegawai.profile.index') }}">Pegawai</a></li>
<li class="breadcrumb-item active">{{ $pegawai->nip }}</li>
@endpush
@section('content')
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-3">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">
                        <div class="main-img-user profile-user">
                            @if($pegawai->foto != '')
                            <img alt="" id="image" src="{{ asset('storage/'.$pegawai->foto) }}">
                            @else
                            <img alt="" id="image" src="{{ asset('assets/img/brand/icon-2.png') }}">
                            @endif
                            <a data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" class="fas fa-camera profile-edit modal-effect"></a>
                        </div>
                        <div class="justify-content-between mg-b-20 mt-2 text-center">
                            <div>
                                <h5 class="main-profile-name">{{ $pegawai->user->name }}</h5>
                                <p class="main-profile-name-text text-muted">{{ $pegawai->jabatan->nama }}</p>
                                <p class="user-info-rating mt-2 tx-12">
                                    {{ $pegawai->nip }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <a href="#" class="btn btn-info">{{ $pegawai->golongan->nama }} / {{ $pegawai->golongan->ruang }} {{ $pegawai->golongan->pangkat }}</a>
                        </div>
                    </div><!-- main-profile-overview -->
                </div>
            </div>
            <div class="card-footer p-0 d-flex justify-content-center">
                <button class="btn btn-sm btn-danger" id="buttonphotodelete">Delete Photo Profile</button>
            </div>
        </div>
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label tx-13 mg-b-25">
                    Social
                </div>
                <div class="main-profile-social-list">
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info">
                            <i class="icon ion-logo-facebook"></i>
                        </div>
                        <div class="media-body">
                            <span>Facebook</span> <a href="{{ $pegawai->facebook }}">{{ \Str::limit($pegawai->facebook,22) }}</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-danger-transparent text-danger">
                            <i class="icon ion-logo-instagram"></i>
                        </div>
                        <div class="media-body">
                            <span>Instagram</span> <a href="{{ $pegawai->instagram }}">{{ \Str::limit($pegawai->instagram,22) }}</a>
                        </div>
                    </div>
                </div><!-- main-profile-social-list -->
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="main-content-body main-content-body-profile card mg-b-20">
            <nav class="nav main-nav-line">
                <a class="nav-link active" data-toggle="tab" href="#pendidikan">Pendidikan</a>
                <a class="nav-link" data-toggle="tab" href="#file">File Pegawai</a>
                <a class="nav-link" data-toggle="tab" href="#diklat">Diklat</a>
                <a class="nav-link" data-toggle="tab" href="#pelanggaran">Pelanggaran</a>
                <a class="nav-link" data-toggle="tab" href="#mutasi">Mutasi</a>
            </nav>
            <!-- main-profile-body -->
            <div class="main-profile-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="pendidikan">
                        @include('pegawai.profile.pendidikan')
                    </div>
                    <div class="tab-pane" id="file">
                        @include('pegawai.profile.file')
                    </div>
                    <div class="tab-pane" id="diklat">
                        @include('pegawai.profile.diklat')
                    </div>
                    <div class="tab-pane" id="pelanggaran">
                        @include('pegawai.profile.pelanggaran')
                    </div>
                    <div class="tab-pane" id="mutasi">
                        @include('pegawai.profile.mutasi')
                    </div>
                </div>
            </div>
            <!-- main-profile-body -->
        </div>
    </div>
</div>
<input type="hidden" id="id" value="{{ $pegawai->id }}">
<!--/ Row -->
@include('pegawai.profile.modal')
@stop
@push('pegawai.head')
<!---Sweet-alert Css-->
<link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />
@endpush
@push('pegawai.script')
<!-- Sweet alert Plugin -->
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
<script>
    var id = $('#id').val()
    $(document).ready(function() {
        $('#datatablependidikan').DataTable({
            serverSide: true,
            processing: true,
            destroy: true,
            ajax: `/api/pegawai/riwayatpendidikan/${id}`,
            columns: [{
                    data: 'pendidikan_id',
                    name: 'pendidikan_id'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'lokasi',
                    name: 'lokasi'
                },
                {
                    data: 'jurusan',
                    name: 'jurusan'
                },
                {
                    data: 'nomor_ijazah',
                    name: 'nomor_ijazah'
                },
                {
                    data: 'tanggal_ijazah',
                    name: 'tanggal_ijazah'
                },
                {
                    data: 'nama_kepsek_rektor',
                    name: 'nama_kepsek_rektor'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        })
        $('#datatablefilepegawai').DataTable({
            serverSide: true,
            processing: true,
            destroy: true,
            ajax: `/api/pegawai/filepegawai/${id}`,
            columns: [
                {
                    data: 'file',
                    name: 'file'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        })
    })
    $('#buttonphoto').on('click', function() {
        let fd = new FormData()
        if ($('#foto')[0].files[0].size >= 2004403) {
            swal({
                title: "Something Went Wrong",
                text: "file size exceeds the max upload limit of 2 mb",
                type: "error",
                showCancelButton: true,
                confirmButtonText: 'Exit'
            });
        } else {
            fd.append('foto', $('#foto')[0].files[0])
            $.ajax({
                url: `/api/pegawai/photo/${id}`,
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    $('#image').attr('src', response)
                    swal({
                        title: "Successfully",
                        text: "Profile photo successfully changed",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonText: 'Exit'
                    });
                },
                error: function(error) {
                    console.error(error)
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
    })
    $('#buttonfile').on('click', function() {
        let fd = new FormData();

        fd.append('file', $('#filepegawai')[0].files[0])
        fd.append('nama_file',$('#nama_file').val())
        fd.append('tanggal_file',$('#tanggal_file').val())

        $.ajax({
            url: `/api/pegawai/file/${id}`,
            method: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                console.log(response)
                $('#datatablefilepegawai').DataTable().ajax.url(`/api/pegawai/filepegawai/${id}`).load()
                swal({
                    title: "Successfully",
                    text: response,
                    type: "success",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            },
            error: function(error) {
                console.error(error)
                swal({
                    title: "Something Went Wrong",
                    text: error.statusTexts,
                    type: "error",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            }

        })
    })
    $('#buttonpendidikan').on('click', function() {
        let data = $('#modalpendidikan').serializeArray()
        var indexed_array = {};
        $.map(data, function(n, i) {
            indexed_array[n['name']] = n['value'];
        });
        $.ajax({
            url: `/api/pegawai/riwayatpendidikan/store/${id}`,
            method: 'post',
            data: indexed_array,
            success: function(response) {
                console.log(response)
                swal({
                    title: "Successfully",
                    text: "congrats form uploaded",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
                $('#datatablependidikan').DataTable().ajax.url(`/api/pegawai/riwayatpendidikan/${id}`).load()
            },
            error: function(error) {
                console.log(error)
                swal({
                    title: "Something Went Wrong",
                    text: error.statusText,
                    type: "error",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            }
        })
    });
    $('#buttonphotodelete').on('click', function() {
        $.ajax({
            url: `/api/pegawai/photo/delete/${id}`,
            type: 'get',
            success: function(response) {
                console.log(response)
                $('#image').attr('src', response)
                swal({
                    title: "Successfully",
                    text: "Profile photo has been deleted successfully",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            },
            error: function(error) {
                console.error(error)
                swal({
                    title: "Something Went Wrong",
                    text: error.statusTexts,
                    type: "error",
                    showCancelButton: true,
                    confirmButtonText: 'Exit'
                });
            }
        })
    })
    function buttonfilepegawaidelete(qr){
        let data_id = $(qr).attr('data-id')
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            showCancelButton: true,
            closeOnConfirm: false,
        }, function() {
            $.ajax({
                url: `/api/pegawai/filepegawai/delete/${data_id}`,
                success: function(response) {
                    setTimeout(function() {
                        $('#datatablefilepegawai').DataTable().ajax.url(`/api/pegawai/filepegawai/${id}`).load()
                        swal({
                            title: "Successfully",
                            text: "Data has been deleted successfully",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonText: 'Exit'
                        })

                    }, 500)
                    swal.close()
                },
                error: function(error) {
                    setTimeout(function() {
                        swal({
                            title: "Something Went Wrong",
                            text: error.statusTexts,
                            type: "error",
                            showCancelButton: true,
                            confirmButtonText: 'Exit'
                        })
                    }, 500)
                    swal.close()
                }
            })
        });
    }
    

    function buttonriwayatpendidikandelete(qr) {
        let data_id = $(qr).attr('data-id')
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            showCancelButton: true,
            closeOnConfirm: false,
        }, function() {
            $.ajax({
                url: `/api/pegawai/riwayatpendidikan/delete/${data_id}`,
                success: function(response) {
                    setTimeout(function() {
                        $('#datatablependidikan').DataTable().ajax.url(`/api/pegawai/riwayatpendidikan/${id}`).load()
                        swal({
                            title: "Successfully",
                            text: "Data has been deleted successfully",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonText: 'Exit'
                        })

                    }, 500)
                    swal.close()
                },
                error: function(error) {
                    setTimeout(function() {
                        swal({
                            title: "Something Went Wrong",
                            text: error.statusTexts,
                            type: "error",
                            showCancelButton: true,
                            confirmButtonText: 'Exit'
                        })
                    }, 500)
                    swal.close()
                }
            })
        });
    }
</script>
@endpush