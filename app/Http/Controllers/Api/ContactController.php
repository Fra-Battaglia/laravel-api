<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuestContact;

class ContactController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            "name" => "required|max:50",
            "email" => "required|max:150|email",
            "message" => "required|max:700",
        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors()
            ]);
        }
        $newContact = Contact::create($data);
        Mail::to('hello@example.com')->send(new GuestContact($newContact));
        return response()->json([
            "success" => true,
        ]);
    }
}
