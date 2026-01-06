<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Contact;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProjectRequest;
class ProjectController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // رفع الصورة إلى public/uploads/projects
    $file = $request->file('cover_image');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/projects'), $fileName);
    $imagePath = 'uploads/projects/' . $fileName;

    Project::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'cover_image_path' => $imagePath,
    ]);

    return redirect()->route('admin.projects.index')
                     ->with('success', 'تم إضافة المشروع بنجاح.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'تم حذف المشروع بنجاح.');


    }
}
