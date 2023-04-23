
@extends('layouts.back.app')
<style>
html, body {
    padding-top: 20px;
}

[data-role="dynamic-fields"] > .form-inline + .form-inline {
    margin-top: 0.5em;
}

[data-role="dynamic-fields"] > .form-inline [data-role="add"] {
    display: none;
}

[data-role="dynamic-fields"] > .form-inline:last-child [data-role="add"] {
    display: inline-block;
}

[data-role="dynamic-fields"] > .form-inline:last-child [data-role="remove"] {
    display: none;
}
</style>
@section('content')
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">create question</li>
        </ol>  
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" action="{{route('questions.update')}}">

                {{ csrf_field() }}
                   <input type="hidden" name="question_id" value="{{$question->id}}">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text " class="form-control" value="{{$question->question}}" name="question" id="question" placeholder="Enter question">
                    </div>
                    <hr>
                  
                    <div class="container">
                        <div class="row">
                           
                            <div class="col-md-12">
                                <div data-role="dynamic-fields">
                                    @foreach($question->answers as $answer )
                                    <div class="form-inline">
                                     <div class="row">
                                        <div class="col-md-7">

                                            <div class="form-group">
                                                <label class="sr-only" for="field-name">answer</label>
                                                <input type="text" name="answer[]" value="{{$answer->answer}}" class="form-control" id="field-name" placeholder="enter answer ">
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <select class="form-control" name="is_valid[]">
                                                <option value="0" {{(!$answer->is_valid) ? 'selected' : ''}}>False </option>
                                                <option value="1" {{($answer->is_valid) ? 'selected' : ''}}>True  </option>
                                                
                                            </select> 
                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                        <i class="fas fa-trash fa-lg"  data-role="remove" style="color:red"></i> 
                                            
                                          
                                            <i class="fas fa-plus fa-lg"  data-role="add" style="color:green"></i> 


                                        </div>
                                     </div>
                                        
                                       
                                       
                                    </div>
                                    @endforeach

                                      <!-- /div.form-inline -->
                                </div>  <!-- /div[data-role="dynamic-fields"] -->
                            </div>  <!-- /div.col-md-12 -->
                        </div>  <!-- /div.row -->
                    </div>
                    <button type="submit" class="btn btn-success btn-block mt-5">Submit</button>
                </form>
            </div>
        </div>
        @include('back-end.question.js.form')

@endsection