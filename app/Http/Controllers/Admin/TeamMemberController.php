<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::latest()->paginate(10);
        return view('admin.teammembers.index', compact('members'));
    }

    public function create()
    {
        return view('admin.teammembers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // مسار رفع الصورة إلى public/uploads/team
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/team'), $fileName);
            $imagePath = 'uploads/team/' . $fileName;
        }

        TeamMember::create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.teammembers.index')
                         ->with('success', 'تم إضافة العضو بنجاح.');
    }

    public function edit(TeamMember $teammember)
    {
        return view('admin.teammembers.edit', ['member' => $teammember]);
    }

    public function update(Request $request, TeamMember $teammember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $teammember->image_path;

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وجدت
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/team'), $fileName);
            $imagePath = 'uploads/team/' . $fileName;
        }

        $teammember->update([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.teammembers.index')
                         ->with('success', 'تم تحديث بيانات العضو بنجاح.');
    }

    public function destroy(TeamMember $teammember)
    {

        if ($teammember->image_path) {
            Storage::disk('public')->delete($teammember->image_path);
        }
        $teammember->delete();

        return redirect()->route('admin.teammembers.index')->with('success', 'تم حذف العضو بنجاح.');
    }
}
