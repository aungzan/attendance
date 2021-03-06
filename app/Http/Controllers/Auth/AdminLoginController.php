<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Log;
use Auth;
use App\Admin;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the login request
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        // save $request data in credentials array.
        $credentials = array(
            'username' => $request->username,
            'password' => $request->password,
        );

        /* Logging in
         * if successful, redirect to the intended page.
         */
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect(route('masters.index'));
        }

        // if fail, redirect back to the login page with error message.
        if (empty(Admin::where('username', $request->username)->where('deleted', 0)->exists())) {
            // mail wrong
            return $this->loginFailResponse('username', $request);
        }

        if (empty(Admin::where('email', $request->email)->where('password', bcrypt($request->password))->where('deleted', 0)->exists()))
        {
            // password wrong.
            return $this->loginFailResponse('password', $request);
        }
    }

    /**
     * Redirect back to the login page with error message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function loginFailResponse($type, Request $request)
    {
        return redirect()
            ->back()
            ->withInput($request->only('username'))
            ->withErrors([
                $type => trans('auth.failed'),
            ]);
    }
}
