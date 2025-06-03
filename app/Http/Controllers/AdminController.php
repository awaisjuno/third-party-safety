<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BudgetType;
use App\Models\Service;
use App\Models\Training;
use App\Models\Contact;
use App\Models\Task;
use App\Models\UserDetail;
use App\Models\Project;
use App\Models\Enrollement;
use App\Models\User;
use App\Models\Certificate;
use App\Models\Month;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function financialManagement()
    {
        $budgetTypes = BudgetType::all();
        $months = Month::get();
        return view('admin.financial-management', compact('budgetTypes', 'months'));
    }

    public function storeFinancialRecord(Request $request)
    {
        $request->validate([
            'finance_title' => 'required|string|max:255',
            'finance_description' => 'nullable|string',
            'create_date' => 'required|date',
            'month_id' => 'required|integer|exists:month,month_id',
            'year' => 'required|digits:4',
            'type_id' => 'required|integer|exists:budget_types,id',
            'create_by' => 'required|integer',
        ]);

        Finance::create([
            'finance_title' => $request->finance_title,
            'finance_description' => $request->finance_description,
            'create_date' => $request->create_date,
            'month_id' => $request->month_id,
            'year' => $request->year,
            'type_id' => $request->type_id,
            'create_by' => $request->create_by,
        ]);

        return redirect()->back()->with('success', 'Financial record added successfully.');
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
            'service_description' => 'nullable',
            'service_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('service_img')) {
            $image = $request->file('service_img');
            $imagePath = $image->store('services', 'public');
        }

        Service::create([
            'service_name' => $request->service_name,
            'service_description' => $request->service_description,
            'img' => $imagePath,
        ]);

        return redirect()->route('services.index')->with('success', 'Service added successfully.');
    }

    public function delete_service($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }

    public function trainings() 
    {
        $trainings = Training::where('is_delete', 0)->get();
        return view('admin.trainings', compact('trainings'));
    }

    public function add_training(Request $request)
    {
        $request->validate([
            'training_name' => 'required|max:255',
            'training_description' => 'nullable|string',
            'duration' => 'required|string',
            'training_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('training_img')) {
            $imagePath = $request->file('training_img')->store('trainings', 'public');
        }

        Training::create([
            'training_name' => $request->training_name,
            'training_description' => $request->training_description,
            'duration' => $request->duration,
            'img' => $imagePath
        ]);

        return redirect()
            ->route('trainings')
            ->with('success', 'Training added successfully.');
    }

    public function delete_training($training_id)
    {
        $training = Training::findOrFail($training_id);

        if ($training->image && \Storage::disk('public')->exists($training->image)) {
            \Storage::disk('public')->delete($training->image);
        }

        $training->delete();

        return redirect()->route('trainings')->with('success', 'Training deleted successfully.');
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

    public function project_management()
    {
        $projects = Project::where('is_delete', 0)->get();
        $approvel = Project::where('is_approved', 0)->get();
        $users = UserDetail::where('is_active', 1)->where('is_delete', 0)->get();
        $services = Service::where('is_active', 1)->where('is_delete', 0)->get();
        $months = Month::get();
        return view('admin.project_management', compact('projects', 'approvel', 'users', 'services', 'months'));
    }

    public function addProject(Request $request)
    {
        $request->validate([
            'project_title' => 'required|string|max:255',
            'project_type' => 'nullable|string|max:100',
            'service_id' => 'nullable|integer',
            'starting_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
            'assign_to' => 'nullable|integer',
        ]);

        Project::create([
            'project_title' => $request->project_title,
            'project_description' => $request->project_description,
            'project_type' => $request->project_type,
            'service_id' => $request->service_id,
            'starting_date' => $request->starting_date,
            'delivery_date' => $request->delivery_date,
            'assign_to' => $request->assign_to,
            'month_id' => $request->month_id,
            'year' => date('Y'),
        ]);

        return redirect()->back()->with('success', 'Project added successfully.');
    }

    public function client() 
    {
      $clients = User::join('user_role', 'user.user_id', '=', 'user_role.user_id')
                ->where('user_role.role_id', 3)
                ->where('user_role.is_delete', 0)
                ->where('user_role.is_active', 1)
                ->select('user.*')
                ->get();
        return view('admin.client', compact('clients'));
    }

    public function employee()
    {
        $pending = User::join('user_role', 'user.user_id', '=', 'user_role.user_id')
            ->where('user_role.role_id', 3)
            ->where('user.status', 0)
            ->where('user_role.is_delete', 0)
            ->select('user.*')
            ->get();

        $active = User::join('user_role', 'user.user_id', '=', 'user_role.user_id')
            ->where('user_role.role_id', 3)
            ->where('user.status', 1)
            ->where('user_role.is_delete', 0)
            ->select('user.*')
            ->get();

        return view('admin.employee', compact('pending', 'active'));
    }

    public function approveEmployee($id)
    {
        User::where('user_id', $id)->update(['status' => 1]);

        return redirect()->back()->with('success', 'Employee approved successfully.');
    }

    public function enrollment()
    {
        $paid = Enrollement::where('is_paid', 0)->get();
        $complete = Enrollement::where('is_completed', 0)->where('is_paid', 1)->get();
        return view('admin.enrollments', compact('paid', 'complete'));
    }

    public function markAsPaid($id)
    {
        $enrollment = Enrollement::findOrFail($id);
        $enrollment->is_paid = 1;
        $enrollment->save();

        return back()->with('success', 'Marked as paid successfully.');
    }

    public function training_completion_form($enroll_id)
    {
        $enrollment = DB::table('enrollment')
            ->join('user_detail', 'enrollment.user_id', '=', 'user_detail.user_id')
            ->where('enrollment.enrollment_id', $enroll_id)
            ->select('enrollment.*', 'user_detail.first_name', 'user_detail.last_name')
            ->first();

        return view('admin.training_completion_form', compact('enrollment'));
    }

    public function training_completion_form_store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollment,enrollment_id',
            'pass_date' => 'required|date',
            'total_marks' => 'required|integer|min:0',
        ]);

        Certificate::create([
            'enrollment_id' => $request->enrollment_id,
            'create_date' => date('Y-m-d'),
            'pass_date' => $request->pass_date,
            'total_marks' => $request->total_marks,
            'unique_id' => uniqid('CERT-')
        ]);

        return redirect()->back()->with('success', 'Certificate added successfully!');
    }

}
