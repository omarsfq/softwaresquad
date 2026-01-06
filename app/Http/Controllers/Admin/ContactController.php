<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
        public function index() {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy(Contact $contact) {

        // if (auth()->user()->is_super_admin) { ... }
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'تم حذف الرسالة بنجاح.');
    }
}
