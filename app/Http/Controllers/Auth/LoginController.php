<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('slack')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param Request $request
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('slack')->user();

        $redirect = $request->input('redirect');

        if($redirect)
        {
            return redirect($redirect);
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $slackUser
     * @return User
     */
    private function findOrCreateUser($slackUser)
    {
        if ($authUser = User::where('slack_id', $slackUser->id)->first()) {
            Auth::login($authUser);
            return $authUser;
        }

        return User::create([
            'slack_id' => $slackUser->id,
            'name' => $slackUser->name,
            'email' => $slackUser->email,
        ]);
    }
}
