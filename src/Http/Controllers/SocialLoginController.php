<?php

namespace Chondal\DvsSocialite\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;

class SocialLoginController extends Controller
{
    public function redirect($socialNetwork)
    {
        if (collect(config('dvs-socialite.socialsNetworks'))->contains($socialNetwork)) {
            return Socialite::driver($socialNetwork)->redirect();
        }

        return redirect(config('dvs-socialite.url_error'))->with('warning', 'Hubo algun error...');
    }

    public function callback($socialNetwork)
    {
        try {
            $response = Socialite::driver($socialNetwork)->user();

            if ($response) {
                $user = config('dvs-socialite.path_user_model')::where('email', $response->email)->first();
                if ($user) {
                    if (!$user->avatar) {
                        $user->avatar = $response->avatar;
                        $user->update();
                    }
                    Auth::login($user);
                    return redirect(config('dvs-socialite.url_success'));
                } else {
                    return redirect(config('dvs-socialite.url_error'))->with('warning', 'No se encontro al usuario.');
                }
            }

        } catch (\Throwable $th) {
            return back()->with('warning', 'Hubo un error');
        }
    }
}
