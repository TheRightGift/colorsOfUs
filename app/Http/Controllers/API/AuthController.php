<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SignupActivate;
use App\Notifications\ForgotPassword;
use App\Notifications\PasswordUpdate;
use App\Notifications\SignupNotification;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Admin;
use Auth;
use Validator;
use Str;

class AuthController extends Controller
{
    // use AuthenticatesUsers;
    // Super Admin:0
    // Tech Admin:1
    // Admin:2
    // User:3
    // TODO: Email verification before saving data; 
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:8',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 401]);
        }
        $data = $request->only([
            'email',
            'password',
        ]);
        
        $data['password'] = bcrypt($data['password']);
        $data['user_type'] = \App\Models\User::DEFAULT_TYPE;
        $data['activation_token'] = Str::random(60);
        $user = User::create($data);

        // Profiles;
        $profile = $request->only(
            'lastname',
            'firstname',
            'user_id',
        );
        $profile['user_id'] = $user->id;
        $profile = Profile::create($profile);

        if ($user) {
            $user->notify(new SignUpActivate($data['activation_token']));
            return response()->json([
                'user' => $user,
                'status' => 200,
                'profile' => $profile,
            ]);
        }
        else {
            return response('Creation error', 400);
        }
        

        
    }

    // ADMIN REGISTER
    public function adminRegister(Request $request)
    {
        // User Data to validate
        $validator = Validator::make($request->all(), [
            'email' => 'email|required|unique:users',
            'user_type' => 'integer',
            'firstname' => 'required',
            'lastname' => 'required',
            'othername' => 'nullable',
            'username' => 'nullable',
            'phone' => 'required',
            'phone2' => 'nullable',
            'address' => 'required',
            'lga' => 'required',
            'state' => 'required',
            'employment_id' => 'nullable|unique:admins',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 401]);
        }
        $user = $request->only([
            'email',
            'user_type',
        ]);

        
        $user['password'] = bcrypt($user['email']);
        if ($request->user_type == 2) {
            $user['user_type'] = User::TECH_ADMIN_TYPE;
        }
        else {
            $user['user_type'] = User::ADMIN_TYPE;
        }

        $userCreated = User::create($user);
        $data = $request->only([
            'firstname',
            'lastname',
            'othername',
            'username',
            'phone',
            'phone2',
            'address',
            'state',
            'lga',
            'employment_id',
            'profile_img',
            'user_id',
            'created_at' => now(),
        ]);
        $data['user_id'] = $userCreated->id;

        if($request->hasFile('profile_img')){
            $image = $request->file('profile_img');
            $name = $image->getClientOriginalName();
            $image->move(public_path('/images/profile/'), $name);
            $data['profile_img'] = '/images/profile/'.$name;
        }
        $admin = Admin::create($data);
        return response()->json([
            'user' => $userCreated,
            'token' => $userCreated->createToken('accessToken')->accessToken,
            'status' => 200
        ]);
    }

    public function sAdminRegister(Request $request)
    {
        // User Data to validate
        $validator = Validator::make($request->all(), [
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:8',
            'user_type' => 'integer',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 401]);
        }
        $data = $request->only([
            'email',
            'password',
            'user_type',
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['user_type'] = User::SUPER_ADMIN_TYPE;
        $user = User::create($data);

        // Admin;
        $profile = $request->only(
            'lastname',
            'firstname',
            'user_id',
        );
        $profile['user_id'] = $user->id;
        $profile = Admin::create($profile);
        if ($user) {
            return response()->json([
                'user' => $user,
                'profile' => $profile,
                'status' => 200
            ]);
        }
        else {
            return response('Creation error', 400);
        }
        
    }

     /**
     * This function request for old password in order to change to new one
     */
    public function changePassword(Request $request)
    {
        $status = 401;
        $response = ['error' => 'Unauthorised'];
        $user = Auth::user();
        if ($user) {
            $password = $user->password;
            $old_pass = $request->currentPass; 
            if (Hash::check($old_pass, $password )) {
                // The passwords match...
                $data = $request->newPass;
                
                $newPass = $request->user()->fill([
                    'password' => Hash::make($data)
                ])->save();
                return response()->json([
                    'user' => $newPass,
                    'message' => 'Password Changed Successfully'
                ]);
            }
            else {
                return response()->json(['error' => $status]);
            }
        }
        else {
            return response()->json($response);
        }
    }

    public function verifyEmail(Request $request, $id) {
        $user = User::where('activation_token', $id)->update(['activation_token' => null, 'email_verified_at' => now(), 'updated_at' => now()]);
        if ($user) {
            return response()->json(['status'=> 1]);
        }
        else {
            return response()->json(['status'=> 0]);
        }
    }

    public function forgetPass(Request $request) {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->firstOrFail();

        if ($user) {
            $token = Str::random(60);
            $status = DB::table('password_resets')->updateOrInsert(
                ['email' => $request->email],
                ['token' => $token],
                ['created_at' => now()],
            );
            $notify =  $user->notify(new ForgotPassword($token));
        }
        else {
            return response(['message' => 'Email does not exist! Check and retry again', 'status' => 204]);
        }
     
        return response()->json(['message' => 'Check your email to reset your password!', 'status' => $notify], 201);
    }

    public function resetPass(Request $request) {
        $request->validate(['email' => 'required|email']);
        $request->validate(['password' => 'required|min:8|confirmed']);
        $request->validate(['token' => 'required']);

        $user = User::where('email', $request->email)->firstOrFail();

        if ($user) {
            $token = Str::random(60);
            $password = bcrypt($request->password);
            $status = DB::table('password_resets')->where('token', '=', $request->token)->delete();
            if ($status == 1) {
                $update = $user->forceFill(['password' => $password, 'updated_at' => now()])->save();
                $notify =  $user->notify(new PasswordUpdate());
               
                return response()->json(['message' => 'Password Reset successfull!', 'status' => $update], 201);
            }
            else {
                return response()->json(['message' => 'Token Has Expired Or does not Exist!', 'status' => 204]);
            }
        }
        else {
            return response(['message' => 'Email does not exist! Check and retry again', 'status' => 204]);
        }
     
    }

    
}
