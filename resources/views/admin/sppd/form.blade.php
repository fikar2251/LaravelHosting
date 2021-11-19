<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nomor">nomor</label>
            <input type="text" name="nomor" id="nomor" value="{{ $sppd->nomor ?? old('nomor') }}" class="form-control @error('nomor') is-invalid @enderror">
            @error('nomor')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="asal">asal</label>
            <input type="text" name="asal" id="asal" value="{{ $sppd->asal ?? old('asal') }}" class="form-control @error('asal') is-invalid @enderror">
            @error('asal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_surat">tanggal surat</label>
            <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ $sppd->tanggal_surat ?? old('tanggal_surat') }}" class="form-control @error('tanggal_surat') is-invalid @enderror">
            @error('tanggal_surat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_berangkat">tanggal berangkat</label>
            <input type="date" name="tanggal_berangkat" id="tanggal_berangkat" value="{{ $sppd->tanggal_berangkat ?? old('tanggal_berangkat') }}" class="form-control @error('tanggal_berangkat') is-invalid @enderror">
            @error('tanggal_berangkat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_kembali">tanggal kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ $sppd->tanggal_kembali ?? old('tanggal_kembali') }}" class="form-control @error('tanggal_kembali') is-invalid @enderror">
            @error('tanggal_kembali')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="pemberi">pemberi</label>
            <input type="text" name="pemberi" id="pemberi" value="{{ $sppd->pemberi ?? old('pemberi') }}" class="form-control @error('pemberi') is-invalid @enderror">
            @error('pemberi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="pegawai_id">pegawai</label>
            <select name="pegawai_id" id="pegawai_id" class="form-control @error('pegawai_id') is-invalid @enderror">
                @foreach($pegawais as $pegawai)
                <option @if($sppd->pegawai_id == $pegawai->id) selected @endif value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
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
            <label for="kategori_sppd_id">kategori sppd</label>
            <select name="kategori_sppd_id" id="kategori_sppd_id" class="form-control @error('kategori_sppd_id') is-invalid @enderror">
                @foreach($kategori_sppds as $kategori_sppd)
                <option @if($sppd->kategori_sppd_id == $kategori_sppd->id) selected @endif value="{{ $kategori_sppd->id }}">{{ $kategori_sppd->tujuan }} - {{ $kategori_sppd->jenis }}</option>
                @endforeach
            </select>
            @error('kategori_sppd_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>