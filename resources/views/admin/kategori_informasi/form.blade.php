<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi..." value="{{ $kategori_informasi->deskripsi ?? old('deskripsi') }}">
            @error('deskripsi')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Status Kategori..." value="{{ $kategori_informasi->status ?? old('status') }}">
            @error('status')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="inggris">Inggris</label>
            <input type="text" class="form-control @error('inggris') is-invalid @enderror" name="inggris" placeholder="Inggris..." value="{{ $kategori_informasi->inggris ?? old('inggris') }}">
            @error('inggris')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>