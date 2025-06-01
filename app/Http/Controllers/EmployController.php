<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Message;
use App\Models\User;
use App\Models\Payment;
use App\Models\Finance;
use App\Models\Service;
use App\Models\BudgetType;

class EmployController extends Controller
{

    public function dashboard()
    {
        return view('employee.dashboard');
    }
    /**
     * Show all projects assigned to the employee.
     */
    public function projects()
    {
        $projects = Project::where('assign_to', auth()->id())
                            ->where('is_delete', 0)
                            ->get();

        return view('employee.projects', compact('projects'));
    }

    /**
     * Show all tasks assigned to the employee.
     */
    public function tasks()
    {
        $tasks = Task::where('user_id', auth()->id())
                      ->where('is_delete', 0)
                      ->get();

        return view('employee.tasks', compact('tasks'));
    }

    /**
     * Show message chat with selected user (admin or client).
     */
    public function messages($receiver_id)
    {
        $receiver = User::findOrFail($receiver_id);

        $messages = Message::where(function ($q) use ($receiver_id) {
                $q->where('sender_id', auth()->id())
                  ->where('receiver_id', $receiver_id);
            })
            ->orWhere(function ($q) use ($receiver_id) {
                $q->where('sender_id', $receiver_id)
                  ->where('receiver_id', auth()->id());
            })
            ->where('is_delete', 0)
            ->orderBy('message_id', 'asc')
            ->get();

        return view('employee.messages', compact('receiver', 'messages'));
    }

    /**
     * Send a message (text or image) to user.
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'msg' => 'required_without:img',
            'img' => 'nullable|image|max:2048',
        ]);

        $imgPath = null;

        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('messages', 'public');
        }

        Message::create([
            'msg' => $request->msg,
            'img' => $imgPath,
            'receiver_id' => $request->receiver_id,
            'sender_id' => auth()->id(),
            'status' => 0,
        ]);

        return redirect()->back()->with('success', 'Message sent.');
    }

    /**
     * Show payment history of the employee.
     */
    public function finance()
    {
        $finance = Finance::where('create_by', auth()->id())->get();
        //$services = Service::where('is_active', 1)->get();
        $type = BudgetType::where('is_active', 1)->get();;
        return view('employee.finance', compact('finance', 'type'));
    }

    public function storeFinance(Request $request)
    {
        $request->validate([
            'finance_title' => 'required|string|max:255',
            'finance_description' => 'nullable|string',
            'create_date' => 'required|date',
            'type_id' => 'required|integer|exists:services,id',
        ]);

        Finance::create([
            'finance_title' => $request->finance_title,
            'finance_description' => $request->finance_description,
            'create_date' => $request->create_date,
            'create_by' => auth()->id(),
            'type_id' => $request->type_id,
            'is_approved' => 0,
        ]);

        return redirect()->back()->with('success', 'Finance entry added successfully.');
    }


}
