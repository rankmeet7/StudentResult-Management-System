<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;
use App\Models\results;



class resultcontroller extends Controller
{
    public function addresult()
    {
        return view('addresult');
    }

    public function InsertResult(Request $request) {
        $data = $request->validate([
            'seat' => 'required',
            'roll' => 'required',
            'name' => 'required',
            'cla' => 'required'
        ]);

        $class = $request->input('cla');
        $data['class'] = $class;
    
        $subjects = [];
    
        if ($class >= 1 && $class <= 5) {
            $subjects = ['gujarati', 'english', 'math', 'evs'];
        } elseif ($class >= 6 && $class <= 10) {
            $subjects = ['gujarati', 'english', 'math', 'science', 'socialscience'];
        } elseif ($class == 11 || $class == 12) {
            $subjects = ['physics', 'chemistry', 'bio', 'english'];
        }
    
        foreach ($subjects as $subject) {
            $data[$subject] = $request->input($subject);
        }
    
        results::create($data);
    
        return redirect()->route('viewresult')->with('success', 'Result added successfully!');
    }
    

    public function viewresult()
    {
        $results = results::orderBy('class')->get()->groupBy('class');
    
        return view('viewresult', ['results' => $results]);
    }

    public function DeleteResult($id)
    {
    $result = results::where('id', $id)->first();

    if ($result) {
        $result->delete();
        return redirect()->route('viewresult')->with('success', 'Result deleted successfully!');
    }

    return redirect()->route('viewresult')->with('error', 'Result not found.');
    }

    public function EditResult($id)
    {
    $data = results::where('id', $id)->first();

    if (!$data) {
        return redirect()->route('viewresult')->with('error', 'Result not found.');
    }

    $class = $data->class;
    $subjects = [];

    if (in_array($class, ['1st', '2nd', '3rd', '4th', '5th'])) {
        $subjects = ['gujarati', 'english', 'math', 'evs'];
    } elseif (in_array($class, ['6th', '7th', '8th', '9th', '10th'])) {
        $subjects = ['gujarati', 'english', 'math', 'science', 'socialscience'];
    } elseif (in_array($class, ['11th', '12th'])) {
        $subjects = ['physics', 'chemistry', 'bio', 'english'];
    }

    return view('editresult', compact('data', 'subjects'));
    }



    public function UpdateResult(Request $request, $id)
    {
    $data = results::where('id', $id)->first();

    if (!$data) {
        return redirect()->route('viewresult')->with('error', 'Result not found.');
    }

    $cla = $request->cla;

    // Common fields validation
    $rules = [
        'seat' => 'required|string|:results,seat,',
        'roll' => 'required|numeric',
        'name' => 'required|string|max:255',
        'cla' => 'required|string|max:100',
    ];

    // Subject fields validation based on class
    if ($cla >= 1 && $cla <= 5) {
        $subjects = ['gujarati', 'english', 'math', 'evs'];
    } elseif ($cla >= 6 && $cla <= 10) {
        $subjects = ['gujarati', 'english', 'math', 'science', 'socialscience'];
    } elseif ($cla == 11 || $cla == 12) {
        $subjects = ['physics', 'chemistry', 'bio', 'english'];
    } else {
        $subjects = [];
    }

    foreach ($subjects as $subject) {
        $rules[$subject] = 'required|numeric|between:0,100';
    }

    $request->validate($rules);

    // Update fields
    $updateData = [
        'SeatNo' => $request->seat,
        'RollNo' => $request->roll,
        'Name' => $request->name,
        'class' => $request->cla,
    ];

    foreach ($subjects as $subject) {
        $updateData[$subject] = $request->input($subject);
    }

    $data->update($updateData);

    return redirect()->route('viewresult')->with('success', 'Result updated successfully!');
    }

    public function showForm()
    {
        return view('resultform'); // form to enter seat no
    }

    public function fetchResult(Request $request)
    {
        $request->validate([
            'seat' => 'required'
        ]);

        $seat = $request->seat;

        $result = results::where('seat', $seat)->first();

        if (!$result) {
            return back()->with('error', 'Result not found for the given Seat No.');
        }

        $class = $result->class;

        return view('display', compact('result', 'class'));
    }


}
