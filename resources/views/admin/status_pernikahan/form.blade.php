<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Status Pernikahan..." value="{{ $status_pernikahan->nama ?? old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="aktifya">Status</label>
            <input type="text" class="form-control @error('aktifya') is-invalid @enderror" name="aktifya" placeholder="Status Pernikahan..." value="{{ $status_pernikahan->aktifya ?? old('aktifya') }}">
            @error('aktifya')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>