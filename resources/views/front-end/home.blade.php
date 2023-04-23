@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <a href="{{route('quiz.start')}}" class="btn btn-primary btn-sm float-left mt-3 mb-3" style="max-width: 100px;">Start quiz </a>
                <div class="card-body">
                 

                    <table class="table">
                        <tr>
                            <th>Num</th>
                            <th>Status </th>
                            <th>Note </th>
                            <th>voir  </th>

                        </tr>
                        <tbody>
                            @foreach($quizzes as $key=>$quiz )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$quiz->status}}</td>
                                    <td>{{$quiz->note}}</td>
                                    <td> 
                                        <a href="{{route('quiz.result',$quiz->id)}}">
                                            voir 
                                        </a>
                                        </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $quizzes->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
