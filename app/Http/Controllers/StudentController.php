<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mark;

class StudentController extends Controller
{
    public function index()
    {
        return view('student');
    }

    public function addStudent(Request $request)
    {
        
        $rules = [
            'name' => 'required|unique:marks',
            'h_ct_one' => 'required|numeric|min:0|max:20',
            'h_ct_two' => 'required|numeric|min:0|max:20',
            'h_ct_three' => 'required|numeric|min:0|max:20',
            'half_yearly' => 'required||numeric|min:0|max:100',
            'f_ct_one' => 'required|numeric|min:0|max:20',
            'f_ct_two' => 'required|numeric|min:0|max:20',
            'f_ct_three' => 'required|numeric|min:0|max:20',
            'final' => 'required|numeric|min:0|max:100',
        ];

        $validation = Validator::make($request->all(), $rules);
        if($validation->fails())
            return back()->withErrors($validation)->withInput();

        $user = Mark::create([
            'name' => $request->input('name'),
            'h_ct_one' => $request->input('h_ct_one'),
            'h_ct_two' => $request->input('h_ct_two'),
            'h_ct_three' => $request->input('h_ct_three'),
            'half_yearly' => $request->input('half_yearly'),
            'f_ct_one' => $request->input('f_ct_one'),
            'f_ct_two' => $request->input('f_ct_two'),
            'f_ct_three' => $request->input('f_ct_three'),
            'final' => $request->input('final')
        ]);

        return back()->withSuccess('Data Inderted Successfully');
    }

    public function allStudent()
    {
        $allmark = Mark::all();
        return view('studentlist')->with('allmark');
    }
}
