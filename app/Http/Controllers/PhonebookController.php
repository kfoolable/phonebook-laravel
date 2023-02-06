<?php

namespace App\Http\Controllers;
use App\Models\Phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    public function index() {
        $phonebooks = Phonebook::orderBy('id','desc')->paginate(5);
        return view('phonebooks.dashboard', compact('phonebooks'));

    }

    public function create() {
        return view('phonebooks.create');
    }

    public function store(Request $request){
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'middleName' => 'required',
            'email' => 'required',
            'contact' => 'required',
        ]);
        
        Phonebook::create($request->post());

        return redirect()->route('phonebooks.index')->with('success','Person information has been added successfully.');
    }

    public function show(Phonebook $phonebook) {
        return view('phonebooks.show',compact('phonebook'));
    }

    public function edit(Phonebook $phonebook) {
        return view('phonebooks.edit',compact('phonebook'));
    }

    public function update(Request $request, Phonebook $phonebook) {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $phonebook->fill($request->post())->save();

        return redirect()->route('phonebooks.index')->with('success','Person has been updated successfully.');
    }

    public function destroy(Phonebook $phonebook) {
        $phonebook->delete();
        return redirect()->route('phonebooks.index')->with('success','Company has been deleted successfully');
    }

}
