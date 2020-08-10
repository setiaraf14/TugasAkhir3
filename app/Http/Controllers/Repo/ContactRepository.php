<?php

namespace App\Http\Controllers\Repo;

use App\Contact;
use Illuminate\Http\Request;

class ContactRepository{
 //sama kan sama nama file reponya
    public function storeContact($request){
        $validatedData = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'pesan' => 'required|min:10' 
        ]);
    
        $contact = Contact::create($validatedData);
        $request->session()->flash('pesan', "Pesan baru dari {$validatedData['email']} ");
        return $contact;
    }

 
    public function destroyContact($request, $contact){
        $contact->delete();
        $request->session()->flash('pesan', "Hapus pesan $contact->email Berhasil");
        return $contact;
    }
}