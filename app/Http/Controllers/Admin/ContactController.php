<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address'       => 'nullable|string',
            'email'         => 'nullable|email',
            'phone'         => 'nullable|string|max:20',
            'whatsapp'      => 'nullable|string|max:20',
            'map_embed'     => 'nullable|string',
            'social_media'  => 'nullable|array',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('admin.contact.edit', $contact->id)
                         ->with('success', 'Kontak berhasil diperbarui.');
    }
}