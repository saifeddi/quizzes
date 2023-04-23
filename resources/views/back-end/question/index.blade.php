@extends('layouts.back.app')

@section('content')
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">list  question</li>
        </ol>  

        <a class="float-right mb-3 btn btn-info" href="{{route('questions.create')}}">Naw Question </a>

        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Num</th>
                                                <th>Question</th>
                                                <th>answer </th>
                                                <th>Action  </th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($questions as $key => $question)
                                            <tr>
                                                <td>{{$key}}</td>
                                                <td>{{$question->question}}</td>
                                                <td>
                                                    @foreach($question->answers as $answer)
                                                   <p class="{{$answer->is_valid()}}">{{$answer->answer}}</p>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a class="float-left"  href="{{route('questions.remove',$question->id)}}" onclick="return confirm('Are you sure delete this item ?')"> <i class="fas fa-trash fa-lg" style="color:red"></i> </a>
                                                    

                                                    <a class="float-right" href="{{route('questions.edit',$question->id)}}"><i class="fas fa-edit fa-lg"  style="color:green"></i> </a></br>
                                                </td>
                                               
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
  
     

@endsection