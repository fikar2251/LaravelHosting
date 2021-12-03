<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_mulai">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ $cuti->tanggal_mulai ?? old('tanggal_mulai') }}" class="form-control @error('tanggal_mulai') is-invalid @enderror">
            @error('tanggal_mulai')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal_akhir">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ $cuti->tanggal_akhir ?? old('tanggal_akhir') }}" class="form-control @error('tanggal_akhir') is-invalid @enderror">
            @error('tanggal_akhir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="kategori_cuti_id">Kategori Cuti</label>
            <select name="kategori_cuti_id" id="kategori_cuti_id" value="{{ $cuti->kategori_cuti_id ?? old('kategori_cuti_id') }}" class="form-control @error('kategori_cuti_id') is-invalid @enderror">
                @foreach($kategori_cuti as $option)
                <option @if($option->id == $cuti->kategori_cuti_id ?? old('kategori_cuti_id')) selected @endif value="{{ $option->id }}">{{ $option->nama }}</option>
                @endforeach
            </select>
            @error('kategori_cuti_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ $cuti->keterangan ?? old('keterangan') }}</textarea>
            @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>