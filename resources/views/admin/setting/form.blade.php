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
            <label for="logo">Logo</label>
            <input type="file" class="dropify @error('logo') is-invalid @enderror" data-height="180" name="logo" placeholder="Title Name..." value="{{ $setting->logo ?? old('logo') }}">
            @error('logo')
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