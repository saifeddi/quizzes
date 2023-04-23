<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('back-end.question.index',compact('questions'))  ;
        
    }
    public function create()
    {
        return view('back-end.question.create')  ;
         
    }

    public function store (Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $question = new Question();
        $question->question = $request->question ;
        $question->save();
        $this->saveAnswer($question,$request);
        return redirect()->route('questions.index');
 
      
    }
    private function saveAnswer($question , $request)
    {
        foreach($request->get('answer') as $key => $answer){
            $newanswer = new Answer();
            $newanswer->answer = $answer ;
            $newanswer->question_id = $question->id ;
            $newanswer->is_valid = $request->input('is_valid')[$key] ;
           $newanswer->save();

        }
    }
    public function edit($question_id)
    {
        $question = Question::findOrFail($question_id);
        return view('back-end.question.edit',compact('question'))  ;

    }
    public function update(Request $request)
    {
        $question =  Question::findOrFail($request->question_id);
        $question->question = $request->question ;
        $question->save();
        $question->answers->each->delete();
        $this->saveAnswer($question,$request);
        Session::flash('success', 'edit successfull!'); 
        return redirect()->route('questions.index');


    }
    public function remove ($question_id)
    {
      $question = Question::findOrFail($question_id);
      $question->answers->each->delete();
      $question->delete();
      Session::flash('success', 'delete successfull!'); 
      return back();
    
       
    }
}
