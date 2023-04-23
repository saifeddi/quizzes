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
                    <h2 >le statut de cette quiz est: <strong class="alert {{($quiz->status=='success')? 'text-success' : 'text-danger'}}">{{$quiz->status}}</strong>  </h2>
                    <table class="table">
                        <thead>
                            <tr>
                            <th>
                                Question
                            </th>
                            <th>
                                Correct Answer 
                                
                            </th>
                            <th>
                                give answer 
                            </th>
                            <th>
                                correct ? 
                            </th>
                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quiz->user_answers as $user_answer )
                            <tr>
                                <td>
                                    {{$user_answer->question }}
                                </td>
                                <td>
                                    {{$user_answer->correct_answer}}
                                </td>
                                <td>
                                    
                                    {{$user_answer->giveanswer()}}
                                </td>
                                <td> 
                                    {{$user_answer->is_valid}}

                                </td>

                            </tr>
                            @endforeach 

                        </tbody>
                    </table>
                    <hr>
                   <p class="alert alert-info"> Note : <strong>{{$quiz->note}}</strong></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
