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
        $halfYearlyAvgCt = 0;
        $marks=[];
        $predata = array(
            'examcount' => 'both',
            'hct1' => true,
            'hct2' => true,
            'hct3' => true,
            'fct1' => true,
            'fct2' => true,
            'fct3' => true,
        );
        $allmark = Mark::all();
        foreach($allmark as $key => $mark)
        {
            $mark['havgct'] = round((($mark['h_ct_one'] + $mark['h_ct_two'] + $mark['h_ct_three']) / 3), 2);
            $mark['h_and_avg_ct'] = round(($mark['havgct'] + $mark['half_yearly']), 2);
            $mark['h_convert'] = round(((($mark['h_and_avg_ct']) / 120) * 100), 2);

            $mark['favgct'] = round((($mark['f_ct_one'] + $mark['f_ct_two'] + $mark['f_ct_three']) / 3), 2);
            $mark['f_and_avg_ct'] = round(($mark['favgct'] + $mark['final']), 2);
            $mark['f_convert'] = round(((($mark['f_and_avg_ct']) / 120) * 100), 2);

            $mark['grand'] = round(($mark['h_convert'] + $mark['f_convert']), 2);
            $mark['avg_grand'] = round((($mark['grand']) / 2), 2);
            $marks[]['avg_grand'] = $mark['avg_grand'];
            $mark['rank'] = '';
        }
        $this->calculateRank($allmark, $marks);

        return view('studentlist', compact('allmark', 'predata'));
    }

    public function calculateRank($allmark, $marks)
    {
        rsort($marks);
        foreach($marks as $keys => $sort) {
            $marks[$keys]['rank'] = (array_search($sort, $marks) + 1);
        }
        foreach ($allmark as $i => $defArr) {
            foreach ($marks as $j => $dayArr) {
                if ($dayArr['avg_grand'] == $defArr['avg_grand']) {
                    $allmark[$i]['rank'] = $marks[$j]['rank'];
                }
            }
        }
        return $allmark;
    }
}
