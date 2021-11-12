<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" placeholder="NIP ..." value="{{ $pegawai->nip ?? old('nip') }}">
            @error('nip')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="NAMA ..." value="{{ $pegawai->nama ?? old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="NIK ..." value="{{ $pegawai->nik ?? old('nik') }}">
            @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" placeholder="Jenis Kelamin ...">
                <option value="Laki Laki">Laki Laki</option>
                <option value="Prempuan">Prempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-8">
        <label for="">Tempat Tanggal Lahir</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                </div>
                <input class="form-control @error('tanggal_lahir') is-invalid @enderror fc-datepicker" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir ?? old('tanggal_lahir') }}" type="date">
                <input class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ $pegawai->tempat_lahir ?? old('tempat_lahir') }}" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir..." type="text">
                @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @error('tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control @error('alamat') is-invalid @enderror">{{ $pegawai->alamat ?? old('alamat') }}</textarea>
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ $pegawai->no_hp ?? old('no_hp') }}">
            @error('no_hp')
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
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email ..." value="{{ $pegawai->user->email ?? old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password ...">
            @error('password')
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
            <label for="status_perkawinan_id">Status Perkawinan</label>
            <select name="status_perkawinan_id" id="status_perkawinan_id" class="form-control @error('status_perkawinan_id') is-invalid @enderror">
                @foreach($status_perkawinan as $row)
                <option @if($pegawai->status_perkawinan_id ?? old('status_perkawinan_id') == $row->id) selected @endif value="{{ $row->id }}">{{ $row->nama }}</option>
                @endforeach
            </select>
            @error('status_perkawinan_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="agama_id">Agama</label>
            <select name="agama_id" id="agama_id" class="form-control @error('agama_id') is-invalid @enderror">
                @foreach($agama as $row)
                <option @if($pegawai->agama_id ?? old('agama_id') == $row->id) selected @endif value="{{ $row->id }}">{{ $row->nama }}</option>
                @endforeach
            </select>
            @error('agama_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="jabatan_id">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                @foreach($jabatan as $row)
                <option @if($pegawai->jabatan_id ?? old('jabatan_id') == $row->id) selected @endif value="{{ $row->id }}">{{ $row->nama }}</option>
                @endforeach
            </select>
            @error('jabatan_id')
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
            <label for="facebook">Facebook</label>
            <input type="link" id="facebook" value="{{ $pegawai->facebook ?? old('facebook') }}" placeholder="https://facebook.com/" name="facebook" class="form-control @error('facebook') is-invalid @enderror">
            @error('facebook')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="link" value="{{ $pegawai->instagram ?? old('instagram') }}" id="instagram" name="instagram" placeholder="https://instagram.com/" class="form-control @error('instagram') is-invalid @enderror">
            @error('instagram')
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
            <label for="tmt">Tmt</label>
            <input type="date" value="{{ $pegawai->tmt ?? old('tmt') }}" name="tmt" id="tmt" class="form-control @error('tmt') is-invalid @enderror">
            @error('tmt')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_kenaikan_berkala_terakhir">Tgl Kenaikan Berkala Terakhir</label>
            <input type="date" value="{{ $pegawai->tanggal_kenaikan_berkala_terakhir ?? old('tanggal_kenaikan_berkala_terakhir') }}" name="tanggal_kenaikan_berkala_terakhir" id="tanggal_kenaikan_berkala_terakhir" class="form-control @error('tanggal_kenaikan_berkala_terakhir') is-invalid @enderror">
            @error('tanggal_kenaikan_berkala_terakhir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_kenaikan_pangkat_terakhir">Tgl Kenaikan Pangkat Terakhir</label>
            <input type="date" value="{{ $pegawai->tanggal_kenaikan_pangkat_terakhir ?? old('tanggal_kenaikan_pangkat_terakhir') }}" name="tanggal_kenaikan_pangkat_terakhir" id="tanggal_kenaikan_pangkat_terakhir" class="form-control @error('tanggal_kenaikan_pangkat_terakhir') is-invalid @enderror">
            @error('tanggal_kenaikan_pangkat_terakhir')
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