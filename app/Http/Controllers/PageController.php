<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Project;
use App\Models\Contact;
class PageController extends Controller
{
        public function home() {

        $latestProjects = Project::latest()->take(3)->get();
        return view('pages.home', compact('latestProjects'));
    }

    public function about() {
        $teamMembers = TeamMember::all();
        return view('pages.about', compact('teamMembers'));
    }

    public function projects() {
        $projects = Project::latest()->paginate(9);
        return view('pages.projects', compact('projects'));
    }

    public function projectDetail(Project $project) {
        return view('pages.project-detail', compact('project'));
    }

    public function contact() {
        return view('pages.contact');
    }

    public function storeContact(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'request_type' => 'required|string',
            'message' => 'required|string|min:10',
        ]);

        Contact::create($validated);

        return redirect()->route('contact.form')->with('success', 'تم إرسال رسالتك بنجاح!');
    }
}
