<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Title Name</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title Name..." value="{{ $setting->title ?? old('title') }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="logo_admin">Logo (Admin)</label>
            <input type="file" class="dropify @error('logo_admin') is-invalid @enderror" data-height="180" name="logo_admin" placeholder="Title Name..." value="{{ $setting->logo_admin ?? old('logo_admin') }}">
            @error('logo_admin')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="logo_pegawai">Logo (Pegawai)</label>
            <input type="file" class="dropify @error('logo_pegawai') is-invalid @enderror" data-height="180" name="logo_pegawai" placeholder="Title Name..." value="{{ $setting->logo_pegawai ?? old('logo_pegawai') }}">
            @error('logo_pegawai')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description..." name="description">{{ $setting->description ?? old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>