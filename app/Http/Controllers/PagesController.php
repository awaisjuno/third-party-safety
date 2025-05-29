<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Contact;

class PagesController extends Controller
{
    public function landing()
    {
        return view('pages/landing');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'status' => 0,
            'is_replied' => 0,
        ]);

        return back()->with('success', 'Thank you! Your message has been sent.');
    }

    public function services()
    {
        $services = Service::where('is_delete', 0)->where('is_active', 1)->get();
        return view('pages.services', compact('services'));
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function VerifyForm()
    {
        return view('pages.VerifyForm');
    }
}
