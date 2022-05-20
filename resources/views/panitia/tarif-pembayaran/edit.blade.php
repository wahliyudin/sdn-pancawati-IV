@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <span class="card-title">{{ __('Edit Data') }}</span>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ route('panitia.tipe-pembayaran.update', Crypt::encrypt($type_of_payment->id)) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama_jenis_pembayaran">Nama Jenis Pembayaran</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('name', $type_of_payment->name) }}" name="name"
                                            id="nama_jenis_pembayaran" placeholder="Nama">
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Keterangan</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('description', $type_of_payment->description) }}"
                                            name="description" id="description" placeholder="Keterangan">
                                        @error('description')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
