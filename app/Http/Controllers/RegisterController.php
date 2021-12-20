<?php

namespace App\Http\Controllers;
//use App\User;
use App\Models\User;
use App\Models\OauthAccessToken;
use App\DealerRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;
use App\Http\Resources\UsersResource;
use App\Http\Resources\DealersResource;
use Laravel\Passport\Token;




class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|unique:users',
            'password' => ['required', 'min:8']
        ]);

        if ($v->fails()) {
            return response()->json(['validation_error' => $v->errors()->all()]);
        }

        $img = $request->image;
        if ($request->hasFile('image')) {
            $fileName = '/users/apis/' . time() . $img->getClientOriginalName();
            $img->move(public_path('../storage/app/public/users/apis/'), $fileName);
            // $fileName=url('/public/storage/').$fileName;

        } else {
            $fileName = "";
        }

        // $lat = (float) $request['lat'];
        // $lng = (float) $request['lng'];


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            // 'location' => DB::raw("ST_GeomFromText('POINT({$lng} {$lat})')"),
            'address' => $request->address ? $request->address : "",
            'type' => "user",
            'point' => 0,
            'approve' => 1,
            'valid_to' => "2000-1-1",
            'avatar' => $fileName,
            'email_verified_at' => now(),
            'provider' => $request->provider ? $request->provider : "",
            'provider_id' => $request->provider_id ? $request->provider_id : "",
            "phone_verified" => 0,
            'login' => 1,
        ]);

        //$address =$user->address->getcoordinates();

        $request['remember_token'] = Str::random(10);
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        return response()->json([

            'data'   => new UsersResource(User::find($user->id)),
            'token'  => $token,
        ]);
    }

    public function dealer_register(Request $request)
    {

        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|unique:users',
            'password' => ['required', 'min:8']
        ]);

        if ($v->fails()) {
            return response()->json(['validation_error' => $v->errors()->all()]);
        }

        $img = $request->image;
        if ($request->hasFile('image')) {
            $fileName = '/users/apis/' . time() . $img->getClientOriginalName();
            $img->move(public_path('../storage/app/public/users/apis/'), $fileName);
            $fileName = $fileName;
        } else {
            $fileName = "";
        }

        // $lat = (float) $request['lat'];
        // $lng = (float) $request['lng'];


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address ? $request->address : "",
            'type' => "dealer",
            'point' => 0,
            'approve' => 0,
            'valid_to' => "2000-1-1",
            'avatar' => $fileName,
            'email_verified_at' => now(),
            'provider' => $request->provider ? $request->provider : "",
            'trusted' => 0,
            'provider_id' => $request->provider_id ? $request->provider_id : "",
            "phone_verified" => 0,
            'login' => 1,
        ]);

        // return $user;
        //$address =$user->address->getcoordinates();

        $request['remember_token'] = Str::random(10);
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        return response()->json([
            'message' => "Your Account Created Successfully ,Our System support will contact with you to Complete Your data",
            // 'data' => new DealersResource(User::find($user->id)),
            // 'token' => $token
        ]);
    }


    public function login(Request $request)
    {
        $loginData = $request->validate([
            //'email' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials phone Or Password']);
        }
        if (auth()->user()->login == 0) {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            $user = User::where('id', auth()->user()->id)->first();
            $user->update([
                'login' => 1
            ]);
            return response([
                'data' => new UsersResource(User::find($user->id)),
                'token' => $accessToken
            ]);
        } else {
            return response(['message' => 'you must logout from other devices']);
        }
    }


    public function logoutApi(Request $request)
    {

        $loginData = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        $d = User::where('phone', $request->phone)->first();


        return $d->accessTokens();


        $accessToken = auth()->user()->accessTokens();
        $token = $request->user()->tokens->find($accessToken);

        $token->revoke();
        return response(['message' => 'You have been successfully logged out.'], 200);

        // $token=OauthAccessToken::where('user_id',$d->id)->get();
        return $s;
    }


    public function dealer_login(Request $request)
    {
        $loginData = $request->validate([
            //'email' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials phone Or Password']);
        }

        $user = User::where('id', auth()->user()->id)->where('approve', 1)->first();
        if (auth()->user()->login == 0) {
            if ($user) {
                $accessToken = auth()->user()->createToken('authToken')->accessToken;
                $user->update([
                    'login' => 1
                ]);
                return response()->json([
                    'data' => new DealersResource(User::find($user->id)),
                    'token' => $accessToken
                ]);
            } else {

                return response()->json([
                    'message' => 'your account not approved yet'
                ]);
            }
        } else {
            return response(['message' => 'you must logout from other devices']);
        }
    }


    public function logout(Request $request)
    {
        $user = auth('api')->user();

        $accessToken = auth('api')->user()->token();


        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);
        $user->update([
            'login' => 0
        ]);
        $accessToken->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


    public function redirectToProvider($provider)
    {
        return  Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        /// dd(request()->all());

        $user = User::where('provider_id', $request->provider_id)
            ->where('email', $request->email)
            ->where('provider', $request->provider)
            ->first();



        if (!$user) {
            $user = User::create([
                'email' => $request->email,
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'provider' => $provider,
                'provider_id' => $request->provider_id,
                'name' => $request->name,
            ]);

            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];

            return response()->json($response);
        }
        $accessToken = $user->createToken('Laravel Password Grant Client')->accessToken;

        return response()->json(['user' => $user, 'token' => $accessToken]);
    }
    public function profile()

    {

        $user = User::where('id', auth()->id())->first();

        $token = request()->bearerToken();


        if (\Request::segment(2) == 'api') {

            return response()->json([
                'data' => new UsersResource($user),
                "token" => $token
            ]);
        } else {
            return $user;
        }
    }


    public function dealer_profile()

    {

        $authUser = auth('api')->user();

        $user = User::where('id', $authUser->id)->first();
        $token = request()->bearerToken();

        return response()->json([
            'data' => new DealersResource($user),
            'token' => $token
        ]);
    }


    public function single_user($id)
    {

        $user = User::where('id', $id)->first();

        return response()->json([
            'data' => new UsersResource($user),
        ]);
    }

    public function single_dealer($id)
    {

        $user = User::where('id', $id)->first();

        return response()->json([
            'data' => new dealersResource($user),
        ]);
    }


    public function update(Request $request)
    {
        $user = User::find(auth('api')->user()->id);
        $authUser = auth('api')->user();

        $token = request()->bearerToken();


        if ($user) {
            $v = Validator::make($request->all(), [
                'name' => 'max:255',
                'email' => 'email|unique:users,email,' . $authUser->id,
                'phone' => 'unique:users,phone,' . $authUser->id,
                'password' => ['min:8']
            ]);
            $errors = $v->errors();
            if ($v->fails()) {
                foreach ($errors->all() as $message) {
                    return response()->json($message);
                }
            }
            $user = User::find(auth('api')->user()->id);
            $imgs = $request->image;
            if ($request->hasFile('image')) {
                $fileName = '/users/apis/' . time() . $imgs->getClientOriginalName();
                $imgs->move(public_path('../storage/app/public/users/apis/'), $fileName);
                //   $fileName=url('/public/storage/'.$fileName);
            } else {
                $fileName = $user->avatar;
            }

            $user->update([
                'name' => $request->name ? $request->name : $user->name,
                'password' => isset($request->password) ? bcrypt($request->password) : $user->password,
                'email' => $request->email ? $request->email : $user->email,
                'phone' => $request->phone ? $request->phone : $user->phone,
                'address' => $request->address ? $request->address : $user->address,
                'point' => $request->point ? $request->point : $user->point,
                'avatar' => $fileName,
                'valid_to' => $request->valid_to ? $request->valid_to : "2000-1-1",
                'provider' => $request->provider ? $request->provider : "",
                'provider_id' => $request->provider_id ? $request->provider_id : "",
                'email_verified_at' => now(),
                "phone_verified" => $request->phone_verified ? $request->phone_verified : 0,
            ]);
            $result = User::where('id', $user->id)->first();
            return response()->json([
                "data" =>    new UsersResource($result),
                "token" => $token

            ]);
        } else {
            return response()->json(["message" => "this user is not found"]);
        }
    }

    public function dealers()
    {
        $dealers = User::where('type', 'dealer')->where('approve', 1)->paginate(10);
        if (isset($dealers)) {
            return  DealersResource::collection($dealers);
        } else {
            return response()->json(["message" => "there is no dealer Yet"]);
        }
    }


    public function revoke(Request $request)
    {
        $loginData = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('phone', $request->phone)->first();


        $tokens = Token::where('user_id', $user->id)->get();

        foreach ($tokens as $t) {
            $t->update(['revoked' => true]);
        }

        $user->update(['login' => 0]);




        // if($loginData->fails()) {
        //     return response()->json([
        //         'error' => $loginData->errors()
        //     ]);
        // }

        if (!auth()->attempt($loginData)) {
            return response()->json(['message' => 'Invalid Credentials phone Or Password']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $user = User::where('id', auth()->user()->id)->first();
        $user->update([
            'login' => 1
        ]);
        return response()->json([
            "message" => "You revoked tokens successfully ,and logged again",
            'data' => new UsersResource($user),
            'token' => $accessToken
        ]);
    }


    public function revoke_social(Request $request)
    {

        if ($request->has('email') || $request->has('phone')) {
            $user = User::where('email', $request->email)->orWhere('phone', $request->phone)->first();


            if ($user != Null) {
                $tokens = Token::where('user_id', $user->id)->get();


                foreach ($tokens as $t) {
                    $t->update(['revoked' => true]);
                }


                $user->update(['login' => 0]);


                if ($user->approve == 1) {
                    $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                    $user->update([
                        'login' => 1
                    ]);
                    return response()->json([
                        "data" => new UsersResource($user),
                        'token' => $token
                    ]);
                }
            } else {
                return response()->json([
                    'message' => 'your account not approved yet'
                ]);
            }
        } elseif ($request->provider_id != Null && $request->provider != Null) {

            $user = User::where('provider_id', $request->provider_id)->where('provider', $request->provider)->first();
            // dd($user );
            if ($user != Null) {
                $tokens = Token::where('user_id', $user->id)->get();


                foreach ($tokens as $t) {
                    $t->update(['revoked' => true]);
                }

                $user->update(['login' => 0]);


                if ($user->approve == 1) {
                    $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                    $user->update([
                        'login' => 1
                    ]);
                    return response()->json([
                        "data" => new UsersResource($user),
                        'token' => $token
                    ]);
                } else {
                    return response()->json([
                        'message' => 'your account not approved yet'
                    ]);
                }
            } else {
                return response()->json([
                    'message' => 'No User founded'
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Yourrequest email or phone or provider_id not exists'
            ]);
        }
    }




    public function send_points(Request $request)
    {
        $authUser = auth('api')->user();
        $sender_user = User::where('id', $authUser->id)->first();
        $reciever_user = User::where('phone', $request->phone)->first();
        if ($sender_user->point >= $request->point) {
            $sender_user->update(['point' => $sender_user->point - $request->point]);
            $reciever_user->update(['point' => $reciever_user->point + $request->point]);
            return [
                "sender_user" => $sender_user->point,
                "reciver_user" => $reciever_user->point,
                "transferd_points" => $request->point
            ];
        } else {
            return [
                "message" => "Your Point Balance less Than" . " " . $request->point . " point"
            ];
        }
    }
}
