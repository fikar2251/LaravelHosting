<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">Name Permission</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name Permission..." value="{{ $permission->name ?? old('name') }}">
            @error('name')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>