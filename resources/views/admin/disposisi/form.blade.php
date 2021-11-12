<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" placeholder="tujuan..." value="{{ $disposisi->tujuan ?? old('tujuan') }}">
            @error('tujuan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="isi">Isi</label>
            <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" placeholder="isi...">{{ $disposisi->isi ?? old('isi') }}</textarea>
            @error('isi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <label for="batas_waktu">Batas Waktu</label>
            <input type="date" class="form-control @error('batas_waktu') is-invalid @enderror" name="batas_waktu" placeholder="batas_waktu..." value="{{ $disposisi->batas_waktu ?? old('batas_waktu') }}">
            @error('batas_waktu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="catatan">Catatan</label>
            <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" placeholder="catatan...">{{ $disposisi->catatan ?? old('catatan') }}</textarea>
            @error('catatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tipe">Tipe</label>
            <select class="form-control @error('tipe') is-invalid @enderror" name="tipe" placeholder="tipe...">
                @foreach($tipe as $list)
                <option value="{{ $list }}" @if($disposisi->tipe ?? old('tipe') == $list) selected @endif>{{ $list }}</option>
                @endforeach
            </select>
            @error('tipe')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="pegawai_id">Pegawai</label>
            <select type="text" class="form-control @error('pegawai_id') is-invalid @enderror" name="pegawai_id" placeholder="Nama Dokumen...">
                @foreach($pegawai as $list)
                <option value="{{ $list->id }}" @if($disposisi->pegawai_id ?? old('pegawai_id') == $list->id) selected @endif>{{ $list->nip }} - {{ $list->nama }}</option>
                @endforeach
            </select>
            @error('pegawai_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <label for="surat_masuk_id">Surat Masuk</label>
            <input readonly type="text" class="form-control @error('surat_masuk_id') is-invalid @enderror" name="surat_masuk_id" placeholder="Status Dokumen..." value="{{ $surat_masuk->id }}">
            @error('surat_masuk_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>