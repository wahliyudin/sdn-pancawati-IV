<div class="box box-info padding-1">
    <div class="box-body">
        <input type="hidden" name="user_id" value="{{ $identitas->user_id }}">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input disabled name="nama" type="text"
                        class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama"
                        value="{{ old('nama', $identitas->nama ?? auth()->user()->name) }}" placeholder="Nama">
                    @error('nama')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select disabled class="form-control {{ $errors->has('jenis_kelamin') ? ' is-invalid' : '' }}"
                        name="jenis_kelamin">
                        <option {{ old('jenis_kelamin', $identitas->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}
                            value="Laki-laki">Laki-laki</option>
                        <option {{ old('jenis_kelamin', $identitas->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}
                            value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input disabled type="text" name="tempat_lahir"
                        class="form-control {{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" id="tempat_lahir"
                        value="{{ old('tempat_lahir', $identitas->tempat_lahir) }}" placeholder="tempat lahir">
                    @error('tempat_lahir')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input disabled type="text" name="tanggal_lahir"
                            class="form-control datetimepicker-input {{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}"
                            data-target="#reservationdate"
                            value="{{ old('tanggal_lahir', $identitas->tanggal_lahir) }}">
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
                    <input disabled type="number" name="nisn"
                        class="form-control {{ $errors->has('nisn') ? ' is-invalid' : '' }}" id="nisn"
                        value="{{ old('nisn', $identitas->nisn) }}" placeholder="NISN">
                    @error('nisn')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input disabled type="number" name="nik"
                        class="form-control {{ $errors->has('nik') ? ' is-invalid' : '' }}" id="nik"
                        value="{{ old('nik', $identitas->nik) }}" placeholder="NIK">
                    @error('nik')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jumlah_saudara">Jumlah Saudara</label>
                            <input disabled type="number" name="jumlah_saudara"
                                class="form-control {{ $errors->has('jumlah_saudara') ? ' is-invalid' : '' }}"
                                id="jumlah_saudara" value="{{ old('jumlah_saudara', $identitas->jumlah_saudara) }}"
                                placeholder="Jumlah Saudara">
                            @error('jumlah_saudara')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke</label>
                            <input disabled type="number" name="anak_ke"
                                class="form-control {{ $errors->has('anak_ke') ? ' is-invalid' : '' }}" id="anak_ke"
                                value="{{ old('anak_ke', $identitas->anak_ke) }}" placeholder="Anak Ke">
                            @error('anak_ke')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input disabled type="text" name="agama"
                        class="form-control {{ $errors->has('agama') ? ' is-invalid' : '' }}" id="agama"
                        value="{{ old('agama', $identitas->agama) }}" placeholder="Agama">
                    @error('agama')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="suku">Suku</label>
                    <input disabled type="text" name="suku"
                        class="form-control {{ $errors->has('suku') ? ' is-invalid' : '' }}" id="suku"
                        value="{{ old('suku', $identitas->suku) }}" placeholder="Suku">
                    @error('suku')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input disabled type="text" name="kewarganegaraan"
                        class="form-control {{ $errors->has('kewarganegaraan') ? ' is-invalid' : '' }}"
                        id="kewarganegaraan" value="{{ old('kewarganegaraan', $identitas->kewarganegaraan) }}"
                        placeholder="Kewarganegaraan">
                    @error('kewarganegaraan')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bahasa">Bahasa</label>
                    <input disabled type="text" name="bahasa"
                        class="form-control {{ $errors->has('bahasa') ? ' is-invalid' : '' }}" id="bahasa"
                        value="{{ old('bahasa', $identitas->bahasa) }}" placeholder="Bahasa">
                    @error('bahasa')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <input disabled type="text" name="asal_sekolah"
                        class="form-control {{ $errors->has('asal_sekolah') ? ' is-invalid' : '' }}"
                        id="asal_sekolah" value="{{ old('asal_sekolah', $identitas->asal_sekolah) }}"
                        placeholder="Asal Sekolah">
                    @error('asal_sekolah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">

                <div class="form-group">
                    <label for="no_ijazah">No Ijazah</label>
                    <input disabled type="number" name="no_ijazah"
                        class="form-control {{ $errors->has('no_ijazah') ? ' is-invalid' : '' }}" id="no_ijazah"
                        value="{{ old('no_ijazah', $identitas->no_ijazah) }}" placeholder="No Ijazah">
                    @error('no_ijazah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Ijazah</label>
                    <div class="input-group date" id="tanggal_ijazah" data-target-input="nearest">
                        <input disabled type="text" name="tanggal_ijazah"
                            class="form-control datetimepicker-input {{ $errors->has('tanggal_ijazah') ? ' is-invalid' : '' }}"
                            data-target="#tanggal_ijazah"
                            value="{{ old('tanggal_ijazah', $identitas->tanggal_ijazah) }}">
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
                    <input disabled type="text" name="gol_darah"
                        class="form-control {{ $errors->has('gol_darah') ? ' is-invalid' : '' }}" id="gol_darah"
                        value="{{ old('gol_darah', $identitas->gol_darah) }}" placeholder="Golongan Darah">
                    @error('gol_darah')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berat_badan">Berat Badan</label>
                    <input disabled type="number" name="berat_badan"
                        class="form-control {{ $errors->has('berat_badan') ? ' is-invalid' : '' }}" id="berat_badan"
                        value="{{ old('berat_badan', $identitas->berat_badan) }}" placeholder="Berat Badan">
                    @error('berat_badan')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tinggi_badan">Tinggi Badan</label>
                    <input disabled type="number" name="tinggi_badan"
                        class="form-control {{ $errors->has('tinggi_badan') ? ' is-invalid' : '' }}"
                        id="tinggi_badan" value="{{ old('tinggi_badan', $identitas->tinggi_badan) }}"
                        placeholder="Tinggi Badan">
                    @error('tinggi_badan')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="riwayat_penyakit">Riwayat Penyakit</label>
                    <input disabled type="text" name="riwayat_penyakit"
                        class="form-control {{ $errors->has('riwayat_penyakit') ? ' is-invalid' : '' }}"
                        id="riwayat_penyakit" value="{{ old('riwayat_penyakit', $identitas->riwayat_penyakit) }}"
                        placeholder="Riwayat Penyakit">
                    @error('riwayat_penyakit')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pas_foto">Pas Foto</label> <small>(Dengan latar belakang berwarna biru)</small>
                    @if ($identitas->pas_foto_url)
                        <br><img src="{{ Storage::url($identitas->pas_foto_url) }}" alt="" width="200px"><br>
                        <p></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
