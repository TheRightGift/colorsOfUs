<?php
 
namespace App\Http\Controllers\API\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'activation_token' => null])) {

            // $request->session()->regenerate();
            $token = auth()->user()->createToken('API Token')->plainTextToken;
            if (Auth::user()->user_type == 1){
                return response()->json([
                    'intended' => 'admin', 
                    'status' => 'ok',
                    'token' => $token,
                    'user' => Auth::user(),
                ]);
            }
            else if (Auth::user()->user_type == 2) {
                return response()->json([
                    'intended' => 'tech_admin',
                    'status' => 'ok',
                    'token' => $token,
                    'user' => Auth::user(),
                ]);
            }
            else if (Auth::user()->user_type == 3) {
                return response()->json([
                    'intended' => 'super',
                    'status' => 'ok',
                    'token' => $token,
                    'user' => Auth::user(),
                ]);
            }
            else {
                return response()->json([
                    'intended' => 'dashboard',
                    'status' => 'ok',
                    'token' => $token,
                    'user' => Auth::user(),
                ]);
            }
            // return redirect()->intended('dashboard');
        }
 
        return response()->json([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}