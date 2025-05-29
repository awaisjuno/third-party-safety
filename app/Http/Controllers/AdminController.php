<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetType;
use App\Models\Service;
use App\Models\Training;
use App\Models\Contact;

class AdminController extends Controller
{
    public function financialManagement()
    {
        $budgetTypes = BudgetType::all();
        return view('admin.financial-management', compact('budgetTypes'));
    }

    public function services()
    {
        $services = Service::where('is_delete', 0)->orderByDesc('service_id')->get();
        return view('admin.services', compact('services'));
    }

    public function add_services(Request $request)
    {
        $request->validate([
            'service_name' => 'required|max:100',
            'service_description' => 'nullable'
        ]);

        Service::create([
            'service_name' => $request->service_name,
            'service_description' => $request->service_description,
        ]);

        return redirect()->route('services.index')->with('success', 'Service added successfully.');
    }

    //public function delete($id)
    //{
        //Service::where('service_id', $id)->update(['is_delete' => 1]);
        //return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    //}

    public function trainings() 
    {
        $trainings = Training::where('is_delete', 0)->get();
        return view('admin.trainings', compact('trainings'));
    }

    public function add_training(Request $request) {
        Training::create([
            'training_name' => $request->training_name,
            'training_description' => $request->training_description,
            'duration' => $request->duration,
        ]);

        return redirect()
            ->route('trainings')
            ->with('success', 'Training added successfully.');
    }

    public function contact()
    {
        $contact = Contact::all();
        return view('admin.contact', compact('contact'));
    }
}
