<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="keterangan">keterangan</label>
            <input type="text" disabled class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ $jam_kerja->keterangan ?? old('keterangan') }}">
            @error('keterangan')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="mulai">mulai</label>
            <input type="time" class="form-control @error('mulai') is-invalid @enderror" name="mulai" value="{{ $jam_kerja->mulai ?? old('mulai') }}">
            @error('mulai')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="selesai">selesai</label>
            <input type="time" class="form-control @error('selesai') is-invalid @enderror" name="selesai" value="{{ $jam_kerja->selesai ?? old('selesai') }}">
            @error('selesai')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>