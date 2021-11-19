<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" id="tujuan" value="{{ $kategori_sppd->tujuan ?? old('tujuan') }}">
            @error('tujuan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="harian">Harian</label>
            <input type="text" class="form-control @error('harian') is-invalid @enderror" name="harian" id="harian" value="{{ $kategori_sppd->harian ?? old('harian') }}">
            @error('harian')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="penginapan">Penginapan</label>
            <input type="text" class="form-control @error('penginapan') is-invalid @enderror" name="penginapan" id="penginapan" value="{{ $kategori_sppd->penginapan ?? old('penginapan') }}">
            @error('penginapan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="transportasi">Transportasi</label>
            <input type="text" class="form-control @error('transportasi') is-invalid @enderror" name="transportasi" id="transportasi" value="{{ $kategori_sppd->transportasi ?? old('transportasi') }}">
            @error('transportasi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="dll">Dan lain lain</label>
            <input type="text" class="form-control @error('dll') is-invalid @enderror" name="dll" id="dll" value="{{ $kategori_sppd->dll ?? old('dll') }}">
            @error('dll')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="jenis">Tujuan</label>
            <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                <option @if($kategori_sppd->jenis ?? old('jenis') == 'Dalam Negeri') selected @endif value="Dalam Negeri">Dalam Negeri</option>
                <option @if($kategori_sppd->jenis ?? old('jenis') == 'Luar Negeri') selected @endif value="Luar Negeri">Luar Negeri</option>
            </select>
            @error('jenis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>