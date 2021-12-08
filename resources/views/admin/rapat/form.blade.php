<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal">tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $rapat->tanggal ?? old('tanggal') }}">
            @error('tanggal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="mulai">mulai</label>
            <input type="time" class="form-control @error('mulai') is-invalid @enderror" name="mulai" value="{{ $rapat->mulai ?? old('mulai') }}">
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
            <input type="time" class="form-control @error('selesai') is-invalid @enderror" name="selesai" value="{{ $rapat->selesai ?? old('selesai') }}">
            @error('selesai')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tempat">tempat</label>
            <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{ $rapat->tempat ?? old('tempat') }}">
            @error('tempat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="agenda">agenda</label>
            <textarea class="form-control @error('agenda') is-invalid @enderror" name="agenda">{{ $rapat->agenda ?? old('agenda') }}</textarea>
            @error('agenda')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="pegawais">pegawai</label>
            <select class="form-control select2 @error('pegawais') is-invalid @enderror" name="pegawais[]" multiple>
                @foreach($pegawais as $pegawai)
                <option @if(in_array($pegawai->id,$rapat->peserta_rapat->pluck('pegawai_id')->toArray())) selected @endif value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                @endforeach
            </select>
            @error('pegawais')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="files">file</label>
            <input type="file" class="form-control select2 @error('files') is-invalid @enderror" name="files[]" multiple>
            @error('files')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>