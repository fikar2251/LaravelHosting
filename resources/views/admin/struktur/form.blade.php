<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="parent">Name</label>
            @isset($parent)
                <input type="text" value="{{ $parent->name }}" class="form-control" name="parent" id="parent">
            @else
                <select name="parent" id="parent" class="form-control select2">
                    @foreach($childs as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                    @endforeach
                </select>
            @endisset
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="child">Child</label>
            <select name="child[]" id="child" class="form-control select2" multiple="multiple">
                    @foreach($childs as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                    @endforeach
            </select>
        </div>
    </div>
</div>