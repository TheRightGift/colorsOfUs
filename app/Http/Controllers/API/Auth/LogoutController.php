<?php
 
namespace App\Http\Controllers\API\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class LogoutController extends Controller
{
    /**
     * Handle an authentication signout attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function logout() {
        auth()->user()->tokens()->delete();
        // $request->user()->currentAccessToken()->delete();
        auth()->logout();
        return response()->json(['status' => 401]);
    }
}