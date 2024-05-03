<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required|email',
            'message' => 'required'
        ], [
            'name.required' => "Nome richiesto",
            'address.required' => "Email richiesta",
            'address.email' => "Devi inserire una mail corretta",
            'message.required' => "Devi inserire un messaggio",
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($request->all());
        $newLead->save();


        Mail::to('lazzari.marco.ml@gmail.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true,
            'message' => 'Richiesta di contatto inviata correttamente',
            'request' => $request->all()
        ]);
    }
}
