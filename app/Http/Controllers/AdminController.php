<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetType;
use App\Models\Service;
use App\Models\Training;
use App\Models\Contact;
use App\Models\Task;
use App\Models\UserDetail;

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

    public function task_management()
    {
        $users = UserDetail::where('is_active', 1)->where('is_delete', 0)->get();
        $tasks = Task::where('is_delete', 0)->orderBy('task_id', 'desc')->get();
        return view('admin.task_management', compact('tasks', 'users'));
    }

    public function store_task(Request $request)
    {
        $request->validate([
            'task_title' => 'required|string|max:255',
            'assign_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:assign_date',
            'assign_to' => 'required|integer',
            'project_id' => 'required|integer',
            'month' => 'required|string|max:20'
        ]);

        Task::create([
            'task_title' => $request->task_title,
            'task_description' => $request->task_description,
            'assign_date' => $request->assign_date,
            'end_date' => $request->end_date,
            'assign_to' => $request->assign_to,
            'project_id' => $request->project_id,
            'month' => $request->month,
            'is_done' => 0,
        ]);

        return redirect()->route('admin.task.management')->with('success', 'Task assigned successfully.');
    }
}
