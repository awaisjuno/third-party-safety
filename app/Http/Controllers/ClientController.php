<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;
use App\Models\UserDetail;
use App\Models\Service;
use App\Models\Training;
use Auth;

class ClientController extends Controller
{
    public function dashboard() {
        $projects = Project::where('created_by', Auth::id())->get();
        return view('client.dashboard', compact('projects'));
    }

    public function projectList() {
        $projects = Project::where('created_by', Auth::id())->get();
        $services = Service::where('is_active', 1)->where('is_delete', 0)->get();
        return view('client.project', compact('projects', 'services'));
    }

    public function addProjectForm() 
    {
        $services = Service::where('is_active', 1)->where('is_delete', 0)->get();
        $users = UserDetail::where('is_active', 1)->where('is_delete', 0)->get();
        return view('client.projects.add', compact('services', 'users'));
    }

    public function storeProject(Request $request) {

        $request->validate([
            'project_title' => 'required|string|max:255',
            'project_description' => 'nullable|string',
            'project_type' => 'nullable|string|max:100',
            'service_id' => 'nullable|integer',
            'starting_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
            'assign_to' => 'nullable|integer'
        ]);

        Project::create([
            'project_title' => $request->project_title,
            'project_description' => $request->project_description,
            'project_type' => $request->project_type,
            'service_id' => $request->service_id,
            'starting_date' => $request->starting_date,
            'delivery_date' => $request->delivery_date,
            'assign_to' => $request->assign_to,
            'created_by' => Auth::id(),
            'is_done' => 0,
        ]);

        return redirect()->route('client.projects')->with('success', 'Project created successfully.');
    }

    /**
     * Show chat messages between authenticated client and receiver (employee/admin).
     */
    public function messageForm($receiver_id)
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

        return view('client.message', compact('receiver', 'messages'));
    }

    /**
     * Send a new message (text or image) to the selected user.
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|integer|exists:users,id',
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
            'status' => 0
        ]);

        return redirect()->back()->with('success', 'Message sent.');
    }

    public function bookTrainingForm() {
        return view('client.training.book');
    }

    public function bookTraining(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Training::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Training booked successfully. Admin will contact you.');
    }
}


?>