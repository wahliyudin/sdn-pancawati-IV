<div class="box box-info padding-1" style="width: 80vw;">
    <div class="box-body">
        <input type="hidden" name="user_id" value="{{ $identitas->user_id }}">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}"
                        id="nama" value="{{ $identitas->nama ?? auth()->user()->name }}" placeholder="Nama">
                    @error('nama')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control {{ $errors->has('jenis_kelamin') ? ' is-invalid' : '' }}"
                        name="jenis_kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"
                        class="form-control {{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" id="tempat_lahir"
                        value="{{ $identitas->tempat_lahir }}" placeholder="tempat lahir">
                    @error('tempat_lahir')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tanggal_lahir"
                            class="form-control datetimepicker-input {{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}"
                            data-target="#reservationdate" value="{{ $identitas->tanggal_lahir }}">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('tanggal_lahir')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" name="nisn"
                        class="form-control {{ $errors->has('nisn') ? ' is-invalid' : '' }}" id="nisn"
                        value="{{ $identitas->nisn }}" placeholder="NISN">
                    @error('nisn')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Peserta Didik</label>
                    <input type="text" name="alamat"
                        class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat"
                        value="{{ $identitas->alamat }}" placeholder="Alamat">
                    @error('alamat')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jumlah_saudara">Jumlah Saudara</label>
                            <input type="number" name="jumlah_saudara"
                                class="form-control {{ $errors->has('jumlah_saudara') ? ' is-invalid' : '' }}"
                                id="jumlah_saudara" value="{{ $identitas->jumlah_saudara }}"
                                placeholder="Jumlah Saudara">
                            @error('jumlah_saudara')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke</label>
                            <input type="number" name="anak_ke"
                                class="form-control {{ $errors->has('anak_ke') ? ' is-invalid' : '' }}" id="anak_ke"
                                value="{{ $identitas->anak_ke }}" placeholder="Anak Ke">
                            @error('anak_ke')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" name="agama"
                        class="form-control {{ $errors->has('agama') ? ' is-invalid' : '' }}" id="agama"
                        value="{{ $identitas->agama }}" placeholder="Agama">
                    @error('agama')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="suku">Suku</label>
                    <input type="text" name="suku"
                        class="form-control {{ $errors->has('suku') ? ' is-invalid' : '' }}" id="suku"
                        value="{{ $identitas->suku }}" placeholder="Suku">
                    @error('suku')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan"
                        class="form-control {{ $errors->has('kewarganegaraan') ? ' is-invalid' : '' }}"
                        id="kewarganegaraan" value="{{ $identitas->kewarganegaraan }}" placeholder="Kewarganegaraan">
                    @error('kewarganegaraan')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bahasa">Bahasa</label>
                    <input type="text" name="bahasa"
                        class="form-control {{ $errors->has('bahasa') ? ' is-invalid' : '' }}" id="bahasa"
                        value="{{ $identitas->bahasa }}" placeholder="Bahasa">
                    @error('bahasa')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah"
                        class="form-control {{ $errors->has('asal_sekolah') ? ' is-invalid' : '' }}"
                        id="asal_sekolah" value="{{ $identitas->asal_sekolah }}" placeholder="Asal Sekolah">
                    @error('asal_sekolah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">

                <div class="form-group">
                    <label for="no_ijazah">No Ijazah</label>
                    <input type="text" name="no_ijazah"
                        class="form-control {{ $errors->has('no_ijazah') ? ' is-invalid' : '' }}" id="no_ijazah"
                        value="{{ $identitas->no_ijazah }}" placeholder="No Ijazah">
                    @error('no_ijazah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Ijazah</label>
                    <div class="input-group date" id="tanggal_ijazah" data-target-input="nearest">
                        <input type="text" name="tanggal_ijazah"
                            class="form-control {{ $errors->has('tanggal_ijazah') ? ' is-invalid' : '' }} datetimepicker-input"
                            data-target="#tanggal_ijazah" value="{{ $identitas->tanggal_ijazah }}">
                        <div class="input-group-append" data-target="#tanggal_ijazah" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('tanggal_ijazah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gol_darah">Golongan Darah</label>
                    <input type="text" name="gol_darah"
                        class="form-control {{ $errors->has('gol_darah') ? ' is-invalid' : '' }}" id="gol_darah"
                        value="{{ $identitas->gol_darah }}" placeholder="Golongan Darah">
                    @error('gol_darah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berat_badan">Berat Badan</label>
                    <input type="text" name="berat_badan"
                        class="form-control {{ $errors->has('berat_badan') ? ' is-invalid' : '' }}" id="berat_badan"
                        value="{{ $identitas->berat_badan }}" placeholder="Berat Badan">
                    @error('berat_badan')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tinggi_badan">Tinggi Badan</label>
                    <input type="text" name="tinggi_badan"
                        class="form-control {{ $errors->has('tinggi_badan') ? ' is-invalid' : '' }}"
                        id="tinggi_badan" value="{{ $identitas->tinggi_badan }}" placeholder="Tinggi Badan">
                    @error('tinggi_badan')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="riwayat_penyakit">Riwayat Penyakit</label>
                    <input type="text" name="riwayat_penyakit"
                        class="form-control {{ $errors->has('riwayat_penyakit') ? ' is-invalid' : '' }}"
                        id="riwayat_penyakit" value="{{ $identitas->riwayat_penyakit }}"
                        placeholder="Riwayat Penyakit">
                    @error('riwayat_penyakit')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" id=""
                        class="form-control {{ $errors->has('provinsi') ? ' is-invalid' : '' }}"
                        onchange="loadKota(this.value)">
                        <option value="">- Pilih Provinsi -</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}"
                                {{ $identitas->provinsi && $province->id == $identitas->provinsi ? 'selected=""' : '' }}>
                                {{ $province->nama }}</option>
                        @endforeach
                    </select>
                    @error('provinsi')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <select name="kabupaten" id="kabupaten"
                        class="form-control {{ $errors->has('kabupaten') ? ' is-invalid' : '' }}"
                        onchange="loadKecamatan(this.value)">
                        <option value="">- Pilih Provinsi Terlebih Dahulu -</option>
                    </select>
                    @error('kabupaten')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan"
                        class="form-control {{ $errors->has('kecamatan') ? ' is-invalid' : '' }}"
                        onchange="loadDesa(this.value)">
                        <option value="">- Pilih Provinsi Terlebih Dahulu -</option>
                    </select>
                    @error('kecamatan')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="desa_kel">Desa / Kelurahan</label>
                    <select name="desa_kel" id="desa_kel"
                        class="form-control {{ $errors->has('desa_kel') ? ' is-invalid' : '' }}">
                        <option value="">- Pilih Provinsi Terlebih Dahulu -</option>
                    </select>
                    @error('desa_kel')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="number" name="kode_pos"
                        class="form-control {{ $errors->has('kode_pos') ? ' is-invalid' : '' }}" id="kode_pos"
                        value="{{ $identitas->kode_pos }}" placeholder="Kode Pos">
                    @error('kode_pos')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pas_foto">Pas Foto</label> <small>(Dengan latar belakang berwarna biru)</small>
                    @if ($identitas->pas_foto_url)
                        <br><img src="{{ Storage::url($identitas->pas_foto_url) }}" alt="" width="200px"><br>
                        <p></p>
                    @endif
                    <div class="custom-file">
                        <input name="pas_foto_url" type="file"
                            class="custom-file-input {{ $errors->has('pas_foto_url') ? ' is-invalid' : '' }}"
                            id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('pas_foto_url')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-success" onclick="loadTabActive('#data-orang-tua')">Next</button>
    </div>
</div>
