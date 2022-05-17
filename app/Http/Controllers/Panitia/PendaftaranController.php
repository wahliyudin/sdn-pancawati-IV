<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\Father;
use App\Models\Identity;
use App\Models\Mother;
use App\Models\Ref\Region;
use App\Models\UserParent;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $identitas = $user->identity ?? new Identity();
        $identitas->user_id = $user->id;

        $orang_tua = $user->userParent ?? new UserParent();
        $orang_tua->user_id = $user->id;

        $provinces = Region::get_provinces();
        return view('user.pendaftaran.pendaftaran', compact('identitas', 'orang_tua',  'provinces'));
    }

    public function storeIdentitasDiri(Request $request)
    {
        if (!in_array(auth()->user()->status_kelulusan, [0, -1])) return redirect()->back()->with('error', 'Maaf! Data
        yang sudah dikirim tidak dapat di ubah');
        try {
            $rules = Identity::rules();
            $data = $request->all();
            // dd($request->all());
            if (auth()->user()->identity && empty($request->pas_foto_url))
                unset($rules['pas_foto_url']);
            $request->validate($rules);


            $file_url = !empty($data['pas_foto_url']) ? request()->file('pas_foto_url')->store('public/pas_foto') :
                auth()->user()->identity->pas_foto_url;
            $data['pas_foto_url'] = $file_url;

            Identity::updateOrCreate(
                ['user_id' => auth()->user()->id],
                $data
            );

            return redirect()->route('pendaftaran')
                ->with('success', 'Identitas berhasil di simpan.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storeDataOrangTua(Request $request)
    {
        if (!in_array(auth()->user()->status_kelulusan, [0, -1])) return redirect()->back()->with('error', 'Maaf! Data yang
    sudah dikirim tidak dapat di ubah');
        $rules = UserParent::rules();

        request()->validate($rules);

        $father = Father::updateOrCreate(['user_id' => auth()->user()->id], [
            'user_id' => $request->user_id,
            'nama' => $request->nama_ayah,
            'tempat_lahir' => $request->tempat_lahir_ayah,
            'tanggal_lahir' => $request->tanggal_lahir_ayah,
            'pekerjaan' => $request->pekerjaan_ayah,
            'email' => $request->email_ayah,
            'no_hp' => $request->no_hp_ayah
        ]);

        $mother = Mother::updateOrCreate(['user_id' => auth()->user()->id], [
            'user_id' => $request->user_id,
            'nama' => $request->nama_ibu,
            'tempat_lahir' => $request->tempat_lahir_ibu,
            'tanggal_lahir' => $request->tanggal_lahir_ibu,
            'pekerjaan' => $request->pekerjaan_ibu,
            'email' => $request->email_ibu,
            'no_hp' => $request->no_hp_ibu
        ]);

        UserParent::updateOrCreate(['user_id' => auth()->user()->id], [
            'user_id' => auth()->user()->id,
            'father_id' => $father->id,
            'mother_id' => $mother->id,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('pendaftaran')
            ->with('success', 'Data Orang Tua berhasil di simpan.');
    }

    public function kirim(Request $request)
    {
        if (!in_array(auth()->user()->status_kelulusan, [0, -1])) return redirect()->back()->with('error', 'Maaf! Data yang
    sudah dikirim tidak dapat di ubah');
        auth()->user()->update(['status_kelulusan' => 1]);
        return redirect()->route('pendaftaran')
            ->with('success', 'Data berhasil di kirim.');
    }
}
