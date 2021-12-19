<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use  Carbon\Carbon;
use App\Http\Resources\UsersResource;

class AuthController extends Controller
{
    //



    public function forgot_password(Request $request){
        $input = $request->only('email');
        $validator = Validator::make($input, [
            'email' => "required|email"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $response = Password::sendResetLink($input);

        $message = $response == Password::RESET_LINK_SENT ? 'Mail send successfully' :  'This email is not included in our users list' ;



        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();


       if(!$tokenData) {
           return response()->json(['message'=>$message]);

       }
       else {
           $token = $tokenData->token;

           return response()->json(['message'=>$message,'token'=>$token]);
       }

    }

    public function passwordReset(Request $request){
        $input = $request->only('email','token', 'password', 'password_confirmation');
        $validator = Validator::make($input, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $response = Password::reset($input, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });
        $message = $response == Password::PASSWORD_RESET ? 'Password reset successfully' : GLOBAL_SOMETHING_WANTS_TO_WRONG;
        return response()->json(['message'=>$message]);
    }

    public function change_password(Request $request)
{
    $input = $request->all();
    $userid = auth()->id();
    $rules = array(
        'old_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    );
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
        $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
    } else {
        try {
            if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
            } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
            } else {
                User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
            }
        } catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            } else {
                $msg = $ex->getMessage();
            }
            $arr = array("status" => 400, "message" => $msg, "data" => array());
        }
    }
    return Response::json($arr);
}

    public function social_login(Request $request , $provider) {

        $email_provider = User::where('email', $request->email)->where('provider_id', $request->provider_id)->first();
        $email = User::where('email', $request->email)->first();
        $provider = User::where('provider_id', $request->provider_id)->first();

        // if($email_provider){
        //     $email=true;
        // }else{
        //     $email=false;
        // }
        $fileName="";
        
        if($email_provider){

            if($email_provider->login == 0){
                $token = $email_provider->createToken('Laravel Password Grant Client')->accessToken;
                $email_provider->update([
                'login'=>1
            ]);
                return response()->json([
                    
                "data"=>new UsersResource($email_provider),  
                'token' => $token]);   
            }else{
                return response(['message' => 'you must logout from other devices']);
            }
            
        }elseif ($email && !$provider) {
                return response(['message' => 'wrong login method']);
        }else {
            $user = User::create([
                
            'email_verified_at'=> now(),
            'provider' => $provider?$provider:"",
            'provider_id' => $request->provider_id?$request->provider_id:"",
            'name'=> $request->name?$request->name:"",
            'email' => $request->email,
            'password' => bcrypt($request->password),            
            'phone'=> $request->phone?$request->phone:"",
         //            'location' => DB::raw("ST_GeomFromText('POINT({$lng} {$lat})')"),
            'address' => $request->address?$request->address:"",
            'type' => "user",
            'point' => 0,
            'approve' => 1,
            'login' => 1,
            'valid_to'=> "2000-1-1",
            'avatar'=>$fileName,
            'email_verified_at'=> now(),
            ]);
            


            
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                return response()->json([
                    "message"=>"user created successfully",           
                    "data"=> new UsersResource($user),  
                    'token' => $token
                ]);   
        }
        
        // if( $user['provider'] == $provider &&  $user['provider_id'] == $request->provider_id){
                
        //     return response(['message' => 'user is already exist']);
        // }

        
    
    }


     public function dealer_social_login(Request $request , $provider) {
        //  dd($request->provider_id);

        $email_provider = User::where('email', $request->email)->where('provider_id', $request->provider_id)->whereNotNull('provider_id')->first();

      
        $email = User::where('email', $request->email)->first();

        $provider = User::where('provider_id', $request->provider_id)->whereNotNull('provider_id')->first();

        // if($email_provider){
        //     $email=true;
        //    }else{
        //         $email=false;
        //     }
        $fileName="";
        
        if($email_provider){
            
            if($email_provider->approve == 1){
                if($email_provider->login == 0){
                    $token = $email_provider->createToken('Laravel Password Grant Client')->accessToken;
                    $email_provider->update([
                    'login'=>1
                ]);
                return response()->json([
                    
                "data"=>new UsersResource($email_provider),  
                'token' => $token]);   
              }else{
                    return response(['message' => 'you must logout from other devices']);
                }
            }else{
                  return response()->json([
                'message' => 'your account not approved yet'
                 ]);   
            }
        }elseif ($email && !$provider &&($request->provider_id != null || !empty($request->provider_id) )) {
            
                return response(['message' => 'wrong login method']);
        }else{ 
            $user = User::create([
                
            'email_verified_at'=> now(),
            'provider' => $provider?$provider:"",
            'provider_id' => $request->provider_id?$request->provider_id:"",
            'name'=> $request->name?$request->name:"",
            'email' => $request->email,
            'password' => bcrypt($request->password),            
            'phone'=> $request->phone?$request->phone:"",
         //            'location' => DB::raw("ST_GeomFromText('POINT({$lng} {$lat})')"),
            'address' => $request->address?$request->address:"",
            'type' => "user",
            'point' => 0,
            'approve' => 1,
            'login' => 1,
            'valid_to'=> "2000-1-1",
            'avatar'=>$fileName,
            'email_verified_at'=> now(),
            ]);
            
            
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                return response()->json([
                    "message"=>"user created successfully",
                    "data"=> new UsersResource($user),  
                    'token' => $token
                ]);   
        
        
            }
        
    
    }


    //  public function dealer_social_login(Request $request , $provider) {

    //     $user = User::where('email', $request->email)->orWhere('phone',$request->phone)->first();
    //     $fileName="";
        
        

    //     if(!$user) {
           
    //         $user = User::create([
                
    //         'email_verified_at'=> now(),
    //         'provider' => $provider?$provider:"",
    //         'provider_id' => $request->provider_id?$request->provider_id:"",
    //         'name'=> $request->name?$request->name:"",
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),            
    //         'phone'=> $request->phone?$request->phone:"",
    //      //            'location' => DB::raw("ST_GeomFromText('POINT({$lng} {$lat})')"),
    //         'address' => $request->address?$request->address:"",
    //         'type' => "dealer",
    //         'point' => 0,
    //         'approve' => 0,
    //         'login' => 1,
    //         'valid_to'=> "2000-1-1",
    //         'avatar'=>$fileName,
    //         'email_verified_at'=> now(),
    //         ]);
            


            
    //             // $token = $user->createToken('Laravel Password Grant Client')->accessToken;
    //             return response()->json([
                    
    //             "data"=> new UsersResource($user),  
    //             // 'token' => $token
    //         ]);   
    //     }
        
    //     // if( $user['provider'] == $provider &&  $user['provider_id'] == $request->provider_id){
                
    //     //     return response(['message' => 'user is already exist']);
    //     // }
    //     if( $user->approve == 1){

    //         if($user->login == 0 ){
    //             $token = $user->createToken('Laravel Password Grant Client')->accessToken;
    //             $user->update([
    //             'login'=>1
    //            ]);
    //             return response()->json([
                    
    //             "data"=>new UsersResource($user),  
    //             'token' => $token]);   
    //         }else{
    //            return response()->json([
    //         'message' => 'you must logout from other devices'
    //     ]);
    //         }
        
    //     }else{
    //               return response()->json([
    //             'message' => 'your account not approved yet'
    //              ]);            

    //     }
    
    // }


}
