<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" placeholder="Kode Klasifikasi..." value="{{ $klasifikasi->kode ?? old('kode') }}">
            @error('kode')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Klasifikasi..." value="{{ $klasifikasi->nama ?? old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="uraian">Uraian</label>
            <input type="text" class="form-control @error('uraian') is-invalid @enderror" name="uraian" placeholder="Uraian Klasifikasi..." value="{{ $klasifikasi->uraian ?? old('uraian') }}">
            @error('uraian')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>