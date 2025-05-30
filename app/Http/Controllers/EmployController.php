<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Message;
use App\Models\User;
use App\Models\Payment;

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
        $payments = Payment::where('user_id', auth()->id())
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('employee.finance', compact('payments'));
    }
}
