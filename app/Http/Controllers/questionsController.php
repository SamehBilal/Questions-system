<?php

namespace App\Http\Controllers;

use App\mcq;
use Illuminate\Http\Request;

class questionsController extends Controller
{
    public function questions(){

        return view('questions');
    }

    protected function store(){
        mcq::create([
            'Question' => request('Question'),
            'Ans1' => request('Ans1'),
            'Ans2' => request('Ans2'),
            'Ans3' => request('Ans3'),
            'Ans4' => request('Ans4'),
            'Correct' => request('Correct'),
        ]);
        return redirect('/teacher');
    }

}
