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
                                <form action="{{ route('panitia.account.update', Crypt::encrypt($account->id)) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama_jenis_pembayaran">Nama</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('name', $account->name) }}" name="name"
                                            id="nama_jenis_pembayaran" placeholder="Nama">
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="code">Kode</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('code', $account->code) }}" name="code" id="code"
                                            placeholder="Kode">
                                        @error('code')
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
