<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Keahlian..." value="{{ $keahlian->nama ?? old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Status Keahlian..." value="{{ $keahlian->status ?? old('status') }}">
            @error('status')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>