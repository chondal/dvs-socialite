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

            if (isset($response)) {
                $user = config('dvs-socialite.path_user_model')::where('email', $response->email)->first();
                if ($user) {
                    if (config('dvs-socialite.job_success_login')) {
                        \dispatch(new \App\Jobs\SocialLoginJob($user, $response));
                    }
                    Auth::login($user);
                    return redirect(config('dvs-socialite.url_success'));
                } else {
                    if (config('dvs-socialite.register')) {
                        $user = config('dvs-socialite.path_user_model')::create($this->userInfoParse($socialNetwork, $response));
                        if (config('dvs-socialite.job_success_register')) {
                            \dispatch(new \App\Jobs\SocialRegisterJob($user, $response));
                        }
                        Auth::login($user);
                        return redirect(config('dvs-socialite.url_success'));
                    } else {
                        return redirect(config('dvs-socialite.url_error'))->with('warning', 'No se encontro al usuario.');
                    }
                }
            } else {
                return redirect(config('dvs-socialite.url_error'))->with('warning', 'Algo salió mal.');
            }

        } catch (\Throwable $th) {
            return back()->with('warning', 'Hubo un error');
        }
    }

    private function userInfoParse($socialNetwork, $response)
    {
        if ($socialNetwork == 'google') {
            $user = [
                'name' => $response->user['given_name'],
                'lastname' => $response->user['family_name'],
                'email' => $response->user['email'],
            ];
        }

        return $user;
    }
}
