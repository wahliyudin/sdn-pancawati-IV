<div class="box box-info padding-1" style="width: 80vw;">
    <div class="box-body">

        <input type="hidden" name="user_id" value="{{ $identitas->user_id }}">
        <h3>Data Ayah</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" class="form-control" id="nama_ayah" value="{{ $orang_tua->nama_ayah }}"
                        placeholder="Nama Ayah">
                    @error('nama_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                    <input type="text" class="form-control" id="tempat_lahir_ayah"
                        value="{{ $orang_tua->tempat_lahir_ayah }}" placeholder="Tempat Lahir Ayah">
                    @error('tempat_lahir_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="pekerjaan_ayah"
                        value="{{ $orang_tua->pekerjaan_ayah }}" placeholder="Pekerjaan Ayah">
                    @error('pekerjaan_ayah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                    <input type="text" class="form-control" id="tanggal_lahir_ayah"
                        value="{{ $orang_tua->tanggal_lahir_ayah }}" placeholder="Tanggal Lahir Ayah">
                    @error('tanggal_lahir_ayah')
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
                    <input type="text" class="form-control" id="nama_ibu" value="{{ $orang_tua->nama_ibu }}"
                        placeholder="Nama ibu">
                    @error('nama_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir_ibu">Tempat Lahir ibu</label>
                    <input type="text" class="form-control" id="tempat_lahir_ibu"
                        value="{{ $orang_tua->tempat_lahir_ibu }}" placeholder="Tempat Lahir ibu">
                    @error('tempat_lahir_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="pekerjaan_ibu">Pekerjaan ibu</label>
                    <input type="text" class="form-control" id="pekerjaan_ibu"
                        value="{{ $orang_tua->pekerjaan_ibu }}" placeholder="Pekerjaan ibu">
                    @error('pekerjaan_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_ibu">Tanggal Lahir ibu</label>
                    <input type="text" class="form-control" id="tanggal_lahir_ibu"
                        value="{{ $orang_tua->tanggal_lahir_ibu }}" placeholder="Tanggal Lahir ibu">
                    @error('tanggal_lahir_ibu')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="pekerjaan_ibu">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control"
                        placeholder="Alamat">{{ $orang_tua->alamat }}</textarea>
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
