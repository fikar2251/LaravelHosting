<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">Name Role</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name Role..." value="{{ $role->name ?? old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">Permission</label>
            <select name="permission[]" id="permission" class="form-control select2" multiple>
                @foreach($permissions as $value)
                <option value="{{ $value->id }}" >
                    {{ $value->name }}
                </option>
                @endforeach
                @foreach($role->permissions as $data)
                    <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                @endforeach
            </select>
            @error('permission')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
@push('admin.script')
<script>
    $('.select2').select2()
</script>
@endpush