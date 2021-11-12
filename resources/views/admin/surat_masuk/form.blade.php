<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="asal">Asal</label>
            <input type="text" class="form-control @error('asal') is-invalid @enderror" name="asal" placeholder="Asal..." value="{{ $surat_masuk->asal ?? old('asal') }}">
            @error('asal')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nomor">Nomor</label>
            <input type="text" class="form-control @error('nomor') is-invalid @enderror" name="nomor" placeholder="Nomor..." value="{{ $surat_masuk->nomor ?? old('nomor') }}">
            @error('nomor')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="ringkas">Ringkas</label>
            <input type="text" class="form-control @error('ringkas') is-invalid @enderror" name="ringkas" placeholder="Ringkas..." value="{{ $surat_masuk->ringkas ?? old('ringkas') }}">
            @error('ringkas')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $surat_masuk->tanggal ?? old('tanggal') }}">
            @error('tanggal')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Keterangan...">{{ $surat_masuk->keterangan ?? old('keterangan') }}</textarea>
            @error('keterangan')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" data-height="180" class="dropify @error('file') is-invalid @enderror" name="file" placeholder="Ringkas..." value="{{ $surat_masuk->file ?? old('file') }}">
            @error('file')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="index">Index</label>
            <input type="number" class="form-control @error('index') is-invalid @enderror" name="index" placeholder="Index..." value="{{ $surat_masuk->index ?? old('index') }}">
            @error('index')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="klasifikasi_id">Klasifikasi</label>
            <select class="form-control @error('file') is-invalid @enderror" name="klasifikasi_id" id="klasifikasi_id">
                @foreach($klasifikasi as $list)
                <option value="{{ $list->id }}" @if($surat_masuk->klasifikasi_id == $list->id) selected @endif>{{ $list->kode }} - {{ $list->nama }}</option>
                @endforeach
            </select>
            @error('klasifikasi_id')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
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
<!--Form Element Advanced js-->
<script src="{{ asset('assets/js/formelementadvnced.js') }}"></script>

@endpush