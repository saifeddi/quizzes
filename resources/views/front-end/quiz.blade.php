@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('quiz.start.store')}}" method="post">
                    {{ csrf_field() }}

                   @foreach($questions as $question  )

                   <input type="hidden" name="question[]" value="{{$question->id}}">
                   <p><strong>{{$question->question}}</strong></p>
                   <ul class="list-group">
                       @foreach($question->answers as $answer)
                    <li class="list-group-item">{{$answer->answer }} <span><input type="{{$question->getType()}}" value="{{$answer->id}}" name="answer_{{$question->id}}[]"></span> </li>
                    @endforeach
                    </ul>

                   @endforeach
                   <button class="btn btn-success btn-block mt-3" type="submit"> Send </button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
