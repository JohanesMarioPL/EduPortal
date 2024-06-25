<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function indexLogin()
    {
        return Response()->view('login');
    }

    public function welcome()
    {
        //        $user = new User();
        //        $user->nrp='72021';
        //        $user->username='johndoe';
        //        $user->password=Hash::make('12345678');
        //        $user->role_id=3;
        //        $user->nama='john doe';
        //        $user->email='johndoe@gmail.com';
        //        $user->fakultas_id=1;
        //        $user->program_studi_id=2;
        //        $user->save();
        return Response()->view('welcome');
    }

    public function indexAdmin()
    {
        return Response()->view('admin.index');
    }

    public function indexFakultas()
    {
        return Response()->view('fakultas.index');
    }

    public function indexProdi()
    {
        return Response()->view('program-studi.index');
    }

    public function indexUser()
    {
        return Response()->view('user.index');
    }

    public function userLogin(Request $request)
    {
        $result = Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);

//        dd($result);
        if ($result) {
            Session::regenerate();
            if (Auth::user()['role_id'] === 1) {
                return redirect('/admin');
            } else if (Auth::user()['role_id'] === 2) {
                return redirect('/fakultas');
            } else if (Auth::user()['role_id'] === 3) {
                return redirect('/program-studi');
            }
            return redirect('/user');
        } else {
            return back()->withInput()->withErrors(['error' => 'Password salah']);
        }
    }

    public function logout(User $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
