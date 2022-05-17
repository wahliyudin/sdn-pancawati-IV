<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\Identity;
use App\Models\User;
use App\Models\UserParent;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Notifications\Verified;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['identity', 'userParent'])->orderby('id', 'desc')->get();

        return view('panitia.siswa.index', [
            'breadcrumb' => [
                'title' => 'Siswa',
                'path' => [
                    'Siswa' => 0
                ]
            ],
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            $user = User::findOrFail($decrypted);
            $identitas = $user->identity ?? new Identity();
            $identitas->user_id = $user->id;

            $orang_tua = $user->userParent ?? new UserParent();
            $orang_tua->user_id = $user->id;
            return view('panitia.siswa.show', [
                'breadcrumb' => [
                    'title' => 'Detail Siswa',
                    'path' => [
                        'Siswa' => route('panitia.siswa.index'),
                        'Detail Siswa' => 0
                    ]
                ],
                'user' => $user,
                'identitas' => $identitas,
                'orang_tua' => $orang_tua
            ]);
        } catch (Exception $th) {
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            User::findOrFail($decrypted)->delete();
            return redirect()->route('panitia.siswa.index')->with('success', 'Siswa Berhasil dihapus');
        } catch (Exception $th) {
        }
    }

    public function verified($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            $user = User::findOrFail($decrypted);
            $password = substr(strtotime('now'), 2, 6);
            $user->update([
                'status_verifikasi' => true,
                'password' => $password
            ]);
            $user->notify(new Verified($user, $password));
            return redirect()->route('panitia.siswa.show', Crypt::encrypt($user->id))
                ->with('success', 'Calon siswa berhasil diverifikasi.');
        } catch (DecryptException $th) {
        }
    }

    public function verifBerkas($id, $status)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            $user = User::findOrFail($decrypted);
            $user->update([
                'status_kelulusan' => $status,
                'catatan_kelulusan' => isset($_GET['catatan_kelulusan']) ? $_GET['catatan_kelulusan'] : '',
            ]);

            // send email notif here
            // $user->notify(new FileVerified($user));

            return redirect()->route('panitia.siswa.show', Crypt::encrypt($user->id))
                ->with('success', 'Calon siswa berhasil diverifikasi.');
        } catch (DecryptException $th) {

        }
    }
}
