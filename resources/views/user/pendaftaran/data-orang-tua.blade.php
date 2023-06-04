<div class="box box-info padding-1" style="width: 80vw;">
    <div class="box-body">

        <input type="hidden" name="user_id" value="{{ $identitas->user_id }}">
        <h3>Data Ayah</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" name="nama_ayah"
                        class="form-control {{ $errors->has('nama_ayah') ? ' is-invalid' : '' }}" id="nama_ayah"
                        value="{{ old('nama_ayah', $orang_tua?->father?->nama ?? '') }}" placeholder="Nama Ayah">
                    @error('nama_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                    <input type="text"
                        class="form-control {{ $errors->has('tempat_lahir_ayah') ? ' is-invalid' : '' }}"
                        id="tempat_lahir_ayah" name="tempat_lahir_ayah"
                        value="{{ old('tempat_lahir_ayah', $orang_tua?->father?->tempat_lahir ?? '') }}"
                        placeholder="Tempat Lahir Ayah">
                    @error('tempat_lahir_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email_ayah">E-Mail ayah</label>
                    <input type="email" class="form-control {{ $errors->has('email_ayah') ? ' is-invalid' : '' }}"
                        id="email_ayah" name="email_ayah"
                        value="{{ old('email_ayah', $orang_tua?->father?->email ?? '') }}" placeholder="E-Mail ayah">
                    @error('email_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <input type="text"
                        class="form-control {{ $errors->has('pekerjaan_ayah') ? ' is-invalid' : '' }}"
                        id="pekerjaan_ayah" name="pekerjaan_ayah"
                        value="{{ old('pekerjaan_ayah', $orang_tua?->father?->pekerjaan ?? '') }}"
                        placeholder="Pekerjaan Ayah">
                    @error('pekerjaan_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                    <div class="input-group date" id="tanggal_lahir_ayah" data-target-input="nearest">
                        <input type="text" name="tanggal_lahir_ayah"
                            class="form-control datetimepicker-input {{ $errors->has('tanggal_lahir_ayah') ? ' is-invalid' : '' }}"
                            data-target="#tanggal_lahir_ayah"
                            value="{{ old('tanggal_lahir_ayah', $orang_tua?->father?->tanggal_lahir ?? '') }}">
                        <div class="input-group-append" data-target="#tanggal_lahir_ayah" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('tanggal_lahir_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp_ayah">No.Telp ayah</label>
                    <input type="number" class="form-control {{ $errors->has('no_hp_ayah') ? ' is-invalid' : '' }}"
                        id="no_hp_ayah" name="no_hp_ayah"
                        value="{{ old('no_hp_ayah', $orang_tua?->father?->no_hp ?? '') }}" placeholder="No.Telp ayah">
                    @error('no_hp_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <h3>Data Ibu</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="nama_ibu">Nama ibu</label>
                    <input type="text" class="form-control {{ $errors->has('nama_ibu') ? ' is-invalid' : '' }}"
                        id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $orang_tua->mother?->nama ?? '') }}"
                        placeholder="Nama ibu">
                    @error('nama_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir_ibu">Tempat Lahir ibu</label>
                    <input type="text"
                        class="form-control {{ $errors->has('tempat_lahir_ibu') ? ' is-invalid' : '' }}"
                        id="tempat_lahir_ibu" name="tempat_lahir_ibu"
                        value="{{ old('tempat_lahir_ibu', $orang_tua->mother?->tempat_lahir ?? '') }}"
                        placeholder="Tempat Lahir ibu">
                    @error('tempat_lahir_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email_ibu">E-Mail ibu</label>
                    <input type="email" class="form-control {{ $errors->has('email_ibu') ? ' is-invalid' : '' }}"
                        id="email_ibu" name="email_ibu"
                        value="{{ old('email_ibu', $orang_tua->mother?->email ?? '') }}" placeholder="E-Mail ibu">
                    @error('email_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="pekerjaan_ibu">Pekerjaan ibu</label>
                    <input type="text"
                        class="form-control {{ $errors->has('pekerjaan_ibu') ? ' is-invalid' : '' }}"
                        id="pekerjaan_ibu" name="pekerjaan_ibu"
                        value="{{ old('pekerjaan_ibu', $orang_tua->mother?->pekerjaan ?? '') }}"
                        placeholder="Pekerjaan ibu">
                    @error('pekerjaan_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_ibu">Tanggal Lahir ibu</label>
                    <div class="input-group date" id="tanggal_lahir_ibu" data-target-input="nearest">
                        <input type="text" name="tanggal_lahir_ibu"
                            class="form-control datetimepicker-input {{ $errors->has('tanggal_lahir_ibu') ? ' is-invalid' : '' }}"
                            data-target="#tanggal_lahir_ibu"
                            value="{{ old('tanggal_lahir_ibu', $orang_tua->mother?->tanggal_lahir ?? '') }}">
                        <div class="input-group-append" data-target="#tanggal_lahir_ibu"
                            data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('tanggal_lahir_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp_ibu">No.Telp ibu</label>
                    <input type="number" class="form-control {{ $errors->has('no_hp_ibu') ? ' is-invalid' : '' }}"
                        id="no_hp_ibu" name="no_hp_ibu"
                        value="{{ old('no_hp_ibu', $orang_tua->mother?->no_hp ?? '') }}" placeholder="No.Telp ibu">
                    @error('no_hp_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="pekerjaan_ibu">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="5"
                        class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="Alamat">{{ old('alamat', $orang_tua->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-success" onclick="loadTabActive('#kirim-data')">Next</button>
    </div>
</div>
