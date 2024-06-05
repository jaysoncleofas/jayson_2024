<?php

namespace App\Http\Controllers;

use App\Notifications\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        Notification::route('mail', get_setting('email'))
            ->notify(new Contact(
                ...$request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'message' => 'required|max:255',
                ])
            ));
        return response()->json(['success' => true]);
    }
}
