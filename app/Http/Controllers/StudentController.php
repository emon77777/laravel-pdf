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
        $marks=[];
        $predata = array(
            'examcount' => 'both',
            'hct1' => true,
            'hct2' => true,
            'hct3' => true,
            'fct1' => true,
            'fct2' => true,
            'fct3' => true,
            'half_yearly_column' => true,
            'final_column' => true,
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

    public function showCustomList(Request $request)
    {
        $marks=[];
        $predata = array(
            'examcount' => $request->input('examcount'),
            'hct1' => $request->input('hct1') ? true : false,
            'hct2' => $request->input('hct2') ? true : false,
            'hct3' => $request->input('hct3') ? true : false,
            'fct1' => $request->input('fct1') ? true : false,
            'fct2' => $request->input('fct2') ? true : false,
            'fct3' => $request->input('fct3') ? true : false,
            'half_yearly_column' => $request->input('half_yearly_column') ? true : false,
            'final_column' => $request->input('final_column') ? true : false,
        );
        $coutnhct = function($predata){
            return (($predata['hct1'] == true ? 1 : 0) + ($predata['hct2'] == true ? 1 : 0) + ($predata['hct3'] == true ? 1 : 0));
        };
        $coutnfct = function($predata){
            return (($predata['fct1'] == true ? 1 : 0) + ($predata['fct2'] == true ? 1 : 0) + ($predata['fct3'] == true ? 1 : 0));
        };
        $coutgrand = function($predata){
            return (($predata['examcount'] == "both" ? 2 : 1));
        };
        $hctCount = ($coutnhct($predata));
        $fctCount = ($coutnfct($predata));
        $grandCount = ($coutgrand($predata));

        $allmark = Mark::all();

        foreach($allmark as $key => $mark)
        {
            if ($hctCount != 0) {
                $mark['havgct'] = round(((($predata['hct1'] == true ? $mark['h_ct_one'] : 0) + ($predata['hct2'] == true ? $mark['h_ct_two'] : 0) + ($predata['hct3'] == true ? $mark['h_ct_three'] : 0)) / $hctCount), 2);
            }else{
                $mark['havgct'] = round((($mark['h_ct_one']  + $mark['h_ct_two'] + $mark['h_ct_three']) / 3), 2);
            }

            $mark['h_and_avg_ct'] = round(($mark['havgct'] + $mark['half_yearly']), 2);
            $mark['h_convert'] = round(((($mark['h_and_avg_ct']) / 120) * 100), 2);

            $mark['favgct'] = round((( ($predata['fct1'] == true ? $mark['f_ct_one'] : 0) + ($predata['fct2'] == true ? $mark['f_ct_two'] : 0) + ($predata['fct3'] == true ? $mark['f_ct_three'] : 0) ) / $fctCount), 2);
            
            $mark['f_and_avg_ct'] = round(($mark['favgct'] + $mark['final']), 2);
            $mark['f_convert'] = round(((($mark['f_and_avg_ct']) / 120) * 100), 2);

            $mark['grand'] = round(  ($predata['examcount'] == "both" ? ($mark['h_convert'] + $mark['f_convert']) : ($mark['f_convert'])), 2);
            $mark['avg_grand'] = round((($mark['grand']) / $grandCount), 2);
            $marks[]['avg_grand'] = $mark['avg_grand'];
            $mark['rank'] = '';
        }
        $this->calculateRank($allmark, $marks);

        return view('studentlist', compact('allmark', 'predata'));
    }

    public function printPDF(Request $request)
    {
        dd('hello');
    }

}
