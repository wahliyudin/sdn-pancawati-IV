<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\Identity;
use App\Models\Ref\Region;
use App\Models\UserParent;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $identitas = $user->identitas ?? new Identity();
        $identitas->user_id = $user->id;

        $orang_tua = $user->orang_tua ?? new UserParent();
        $orang_tua->user_id = $user->id;

        $provinces = Region::get_provinces();
        return view('user.pendaftaran.pendaftaran', compact('identitas', 'orang_tua',  'provinces'));
    }

    public function storeIdentitasDiri(Request $request)
    {
        if (!in_array(auth()->user()->status_kelulusan, [0, -1])) return redirect()->back()->with('error', 'Maaf! Data
        yang sudah dikirim tidak dapat di ubah');
        $rules = Identity::rules();
        $data = $request->all();
        $request->validate($rules);
        if (auth()->user()->identity && empty($request->pas_foto_url))
            unset($rules['pas_foto_url']);


        $file_url = !empty($data['pas_foto_url']) ? request()->file('pas_foto_url')->store('pas_foto') :
            auth()->user()->identity->pas_foto_url;
        $data['pas_foto_url'] = $file_url;

        Identity::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        return redirect()->route('pendaftaran')
            ->with('success', 'Identitas berhasil di simpan.');
    }
}
