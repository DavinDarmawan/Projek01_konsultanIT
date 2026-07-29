<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    
    public function storePublic(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->status = 'unread'; 
        
        $contact->save();

        return response()->json(['message' => 'Pesan berhasil dikirim', 'data' => $contact], 201);
    }



    public function index()
    {
        
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return response()->json(['message' => 'Sukses', 'data' => $contacts], 200);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response()->json(['message' => 'Pesan tidak ditemukan'], 404);
        }

        // Fitur Tambahan: Otomatis ubah status jadi 'read' saat admin membuka detail pesan
        if ($contact->status === 'unread') {
            $contact->status = 'read';
            $contact->save();
        }

        return response()->json(['message' => 'Sukses', 'data' => $contact], 200);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response()->json(['message' => 'Pesan tidak ditemukan'], 404);
        }
        
        
        if ($request->has('status')) {
            $contact->status = $request->status;
            $contact->save();
        }

        return response()->json(['message' => 'Status pesan berhasil diperbarui', 'data' => $contact], 200);
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        
        if ($contact) {
            $contact->delete();
            return response()->json(['message' => 'Pesan berhasil dihapus'], 200);
        }

        return response()->json(['message' => 'Pesan tidak ditemukan'], 404);
    }
}