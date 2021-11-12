<div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">File Pegawai</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>Add File</h6>
                <form action="/api/admin/pegawai/file" id="formfile" method="post" enctype="multipart/form-data">
                    <input type="file" id="filepegawai" name="filepegawai" class="dropify" data-height="180" />
                    <div class="form-group">
                        <label for="nama_file">Nama File</label>
                        <input type="text" class="form-control" name="nama_file" id="nama_file">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_file">Tanggal</label>
                        <input type="date" class="form-control" readonly name="tanggal_file" id="tanggal_file" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-indigo" id="buttonfile" type="button">Save changes</button> <button class="btn btn-outline-light" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Photo Profile</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>Change Photo Profile</h6>
                <form action="/api/admin/pegawai/photo" id="formphoto" method="post" enctype="multipart/form-data">
                    <input type="file" id="foto" name="foto" class="dropify" data-height="180" />
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-indigo" id="buttonphoto" type="button">Save changes</button> <button class="btn btn-outline-light" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modaldemo7">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Add Riwayat Pendidikan</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="modalpendidikan">
                    <div class="form-group">
                        <label for="pendidikan_id">Tingkat Pendidikan</label>
                        <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                            @foreach($pendidikan as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Sekolah / Universitas</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomor_ijazah">Nomor Ijazah</label>
                        <input type="text" name="nomor_ijazah" id="nomor_ijazah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_ijazah">Tanggal Ijazah</label>
                        <input type="date" name="tanggal_ijazah" id="tanggal_ijazah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama_kepsek_rektor">Nama Kepsek / Rektor</label>
                        <input type="text" name="nama_kepsek_rektor" id="nama_kepsek_rektor" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-indigo" id="buttonpendidikan" type="button">Save changes</button> <button class="btn btn-outline-light" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
@push('admin.head')

<!-- file Uploads -->
<link href="{{ asset('assets/plugins/fileuploads/css/fileuploads.css') }}" rel="stylesheet" type="text/css" />

<!-- File Uploads css -->
<link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

@endpush
@push('admin.script')
<!-- file uploads js -->
<script src="{{ asset('assets/plugins/fileuploads/js/fileuploads.js') }}"></script>
<script src="{{ asset('assets/plugins/fileuploads/js/fileuploads-demo.js') }}"></script>

<!--File-Uploads Js-->
<script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>


@endpush