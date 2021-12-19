<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ContactsResource;
class ContactsController extends Controller
{
     public function contact (Request $request)
    {
        // $user =auth()->id();
        // $authUser = User::where('id', $user)->first();
        $v = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
            ]);
        if ($v->fails()) {
            $errors = $v->errors();
            foreach ($errors->all() as $message) {
                return response(['error' => $message]);
            }
        } else {
                $contact = Contact::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'message' => $request->message,
                ]);

                
                return response()->json([
                    "message" => "your Contact data has been succsessfully saved",
                    "status" => "true",
                    'data' =>new ContactsResource($contact)
                ]);  
        }
    }
}
