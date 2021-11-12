<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Deskripsi..." value="{{ $informasi->judul ?? old('judul') }}">
            @error('judul')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="isi">Isi</label>
            <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" placeholder="Status Kategori...">{{ $informasi->isi ?? old('isi') }}</textarea>
            @error('isi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Inggris..." value="{{ $informasi->tanggal ?? old('tanggal') }}">
            @error('tanggal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto" class="dropify" data-height="180" />
            @error('foto')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" id="file" name="file" class="dropify" data-height="180" />
            @error('file')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="kategori_artikel_id">Kategori Artikel</label>
            <select class="form-control @error('kategori_artikel_id') is-invalid @enderror" name="kategori_artikel_id" value="{{ $informasi->kategori_artikel_id ?? old('kategori_artikel_id') }}">
                @foreach($kategori_artikel as $list)
                <option value="{{ $list->id }}" @if($informasi->kategori_artikel_id == $list->id) selected @endif>{{ $list->deskripsi }}</option>
                @endforeach
            </select>
            @error('kategori_artikel_id')
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