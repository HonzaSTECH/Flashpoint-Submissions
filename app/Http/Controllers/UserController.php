<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display the list of all users.
     * This is available only to those with permission level 3.
     * @return View
     */
    public function index()
    {
        return view('user.index', ['users' => User::orderBy('user_id')->get()]);
    }

    /**
     * Display details of the user's account.
     * This is available only to the user
     * @param User $user
     * @return View
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for signing up.
     * @return View
     */
    public function register()
    {
        return view('user.register');
    }

    /**
     * Show the form for signing in.
     * @return View
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Process data from the "sign up" form and store the data in the database.
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3', 'max:255', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->uncompromised(), '']
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $user->save();

        return view('home');
    }

    /**
     * Process data from the "log in" form and log in the user.
     * @param Request $request
     * @return bool
     */
    public function auth(Request $request)
    {
        try
        {
            //Username was used
            $this->validate($request, ['login' => ['required', 'min:3', 'max:255', 'exists:users,name']]);
        } catch (ValidationException $e)
        {
            //E-mail address was used
            $this->validate($request, ['login' => ['required', 'min:3', 'max:255', 'email', 'exists:users,email']]);
        }

        //TODO - login

        return view('home');
    }

    /**
     * Update the user's data in the database.
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //TODO - change permissions
    }

    /**
     * Delete the user account from the database.
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return view('user.index', ['users' => User::orderBy('user_id')->get()]);
    }
}
