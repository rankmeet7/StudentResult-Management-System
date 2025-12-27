<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;
use App\Models\results;

class dashbordcontroller extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function showregister()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sid' => 'required|numeric|unique:registration,id',
            'name' => 'required|string|max:255',
            'gen' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
            'cla' => 'required|string|max:50',
            'roll' => 'required|numeric|unique:registration,RollNo',
            'seat' => 'required|string|max:100|unique:registration,SeatNo',
        ]);

        registration::create([
            'id' => $request->sid,
            'Name' => $request->name,
            'Gender' => $request->gen,
            'DateofBirth' => $request->dob,
            'class' => $request->cla,
            'RollNo' => $request->roll,
            'SeatNo' => $request->seat,
        ]);

        return redirect('/home')->with('success', 'Student registered successfully!');
    }

    public function viewregistar()
    {
        $Data = registration::all();
        return view('viewstudent', compact('Data'));
    }

    public function displayresult()
    {
        return view('displayresult');
    }

    public function dashbord()
    {
        $studentCount = registration::count();
        $resultCount = results::count();

        return view('dashbord', compact('studentCount','resultCount'));
    }

    public function addstudent()
    {
        return view('addstudent');
    }

    public function InsertStudent(Request $request)
    {
        $request->validate([
            'sid' => 'required|numeric|unique:registration,id',
            'name' => 'required|string|max:255',
            'gen' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
            'cla' => 'required|string|max:50',
            'roll' => 'required|numeric|unique:registration,RollNo',
            'seat' => 'required|string|max:100|unique:registration,SeatNo',
        ]);

        registration::create([
            'id' => $request->sid,
            'Name' => $request->name,
            'Gender' => $request->gen,
            'DateofBirth' => $request->dob,
            'class' => $request->cla,
            'RollNo' => $request->roll,
            'SeatNo' => $request->seat,
        ]);

        return redirect('/viewstudent')->with('success', 'Student added successfully!');
    }

    public function viewstudent()
    {
        $Data = registration::all();
        return view('viewstudent', compact('Data'));
    }

    public function DeleteStudent($id)
    {
        $check = registration::find($id);
        if ($check) {
            $check->delete();
        }
        return redirect()->route('viewstudent')->with('success', 'Student deleted successfully!');
    }

    public function EditStudent($id)
    {
        $data = registration::find($id);
        return view('editstudent', compact('data'));
    }

    public function UpdateStudent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gen' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
            'cla' => 'required|string|max:50',
            'roll' => 'required|numeric|unique:registration,RollNo,' . $id . ',id',
            'seat' => 'required|string|max:100|unique:registration,SeatNo,' . $id . ',id',
        ]);

        $data = registration::find(id: $id);

        if ($data) {
            $data->update([
                'Name' => $request->name,
                'Gender' => $request->gen,
                'DateofBirth' => $request->dob,
                'class' => $request->cla,
                'RollNo' => $request->roll,
                'SeatNo' => $request->seat,
            ]);
        }

        return redirect()->route('viewstudent')->with('success', 'Student updated successfully!');
    }
}
