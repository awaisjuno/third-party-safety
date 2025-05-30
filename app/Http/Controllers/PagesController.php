<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Training;
use App\Models\Enrollement;
use Illuminate\Support\Facades\Auth;

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

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $services = Service::where('is_delete', 0)->where('is_active', 1)->get();
        return view('pages.services', compact('services'));
    }

    public function trainings()
    {
        $trainings = Training::where('is_delete', 0)->where('is_active', 1)->get();
        return view('pages.trainings', compact('trainings'));
    }

    public function enroll_training($training_id)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to enroll.');
        }

        $trainingExists = Training::where('training_id', $training_id)->exists();

        if (!$trainingExists) {
            return redirect()->back()->with('error', 'Invalid training selected.');
        }

        $userId = Auth::id();

        $alreadyEnrolled = Enrollement::where('user_id', $userId)
            ->where('training_id', $training_id)
            ->exists();

        if ($alreadyEnrolled) {
            return redirect()->back()->with('error', 'You have already enrolled in this training.');
        }

        Enrollement::create([
            'user_id' => $userId,
            'training_id' => $training_id,
            'enroll_date' => now(),
            'is_paid' => false,
        ]);

        return redirect()->back()->with('success', 'Training enrolled successfully!');
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
