<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Quiz;
use App\UserAnswer ;
use App\UserGiveAnswer;
use Illuminate\Http\Request;
class QuizController extends Controller
{
   public function quizAttent()
   {
       $questions = Question::all();
    
       return view('front-end.quiz',compact('questions'));
   }
   public function quizstore(Request $request)
   {
      $quiz = new Quiz();
      $quiz->user_id = auth()->id();
      $quiz->save();
      $note =  0;
      foreach($request->question as $question )
      {
          $get_question = Question::find($question) ;
          $user_answer = new UserAnswer() ;
          $user_answer->quiz_id =$quiz->id ;
          $user_answer->question = $get_question->question ;
          $answer_correct = Question::find($question)->answers->where('is_valid','1')->pluck('id')->toarray();
          if($answer_correct == $request->get('answer_'.$question) )
             {
                 $user_answer->is_valid = 1 ;
                 $note ++ ;
            }
        else
        {
          $user_answer->is_valid = 0 ;  
        } 

          $user_answer->correct_answer = $get_question->getCorrectAnswer();

        
          $user_answer->save();
          $this->save_give_answer($request, $question, $user_answer);
         

      }
      if($note ==  count($request->question) )
         $quiz->status="success";
      else 
       $quiz->status="failed ";
      $quiz->note = $note ; 

      $quiz->update();

       return redirect()->route('quiz.result', [ 'quiz_id' => $quiz->id]);

   }
   public function result($quiz_id)
   {
       $quiz = Quiz::find($quiz_id);
       return view('front-end.resultat',compact('quiz'));
   }

 private function save_give_answer($request,$question ,$user_answer)
 {
     if( !empty(  $request->get('answer_'.$question)  )  ) 
   {

        foreach ($request->get('answer_'.$question)  as $answer )
        {
            $give_answer = Answer::find($answer);
            $user_qive_answer = new UserGiveAnswer();
            $user_qive_answer->give_answer = $give_answer->answer ; 
            $user_qive_answer->user_answer_id = $user_answer->id ;
            $user_qive_answer->save();

        }
    }
 }

}
