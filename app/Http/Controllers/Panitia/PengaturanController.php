<?php

namespace App\Http\Controllers\Panitia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class PengaturanController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function formPendaftaran(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data['status_pendaftaran'] = isset($data['status_pendaftaran']) ? 1 : 0;
            Setting::updateOrCreate(['id' => 1], $data);
            return redirect()->route('panitia.pengaturan.form-pendaftaran')
                ->with('success', 'Berhasil Update Form Pendaftaran');
        }
        return view('panitia.setting.form-pendaftaran', [
            'breadcrumb' => [
                'title' => 'Form Pendaftaran',
                'path' => [
                    'Dashboard' => route('panitia.dashboard'),
                    'Pengaturan' => route('panitia.pengaturan.form-pendaftaran'),
                    'Form Pendaftaran' => 0
                ]
            ],
            'setting' => $this->setting->first()
        ]);
    }

    public function formLogin(Request $request)
    {
        //
        if ($request->isMethod('post')) {
            $data = $request->all();
            $data['status_login'] = isset($data['status_login']) ? 1 : 0;
            Setting::updateOrCreate(['id' => 1], $data);
            return redirect()->route('panitia.pengaturan.form-login')
                ->with('success', 'Berhasil Update Form Login');
        }

        return view('panitia.setting.form-login', [
            'breadcrumb' => [
                'title' => 'Form Login',
                'path' => [
                    'Dashboard' => route('panitia.dashboard'),
                    'Pengaturan' => route('panitia.pengaturan.form-login'),
                    'Form Login' => 0
                ]
            ],
            'setting' => $this->setting->first()
        ]);
    }
}
