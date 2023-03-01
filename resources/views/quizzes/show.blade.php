@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
         

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Quizzes {{ $quizzes->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/quizzes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/quizzes/' . $quizzes->id . '/edit') }}" title="Edit Quizzes"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('quizzes' . '/' . $quizzes->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Quizzes" onclick="return confirm('Are you sure you want to delete this quiz?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="card">
                            <div class="card-header">{{ $quizzes->question }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/quizzes/' . $quizzes->id) }}" accept-charset="UTF-8">
                                    {{ csrf_field() }}

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer_1" value="1">
                                        <label class="form-check-label" for="answer_1">
                                            {{ $quizzes->answer_1 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer_2" value="2">
                                        <label class="form-check-label" for="answer_2">
                                            {{ $quizzes->answer_2 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer_3" value="3">
                                        <label class="form-check-label" for="answer_3">
                                            {{ $quizzes->answer_3 }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="answer_4" value="4">
                                        <label class="form-check-label" for="answer_4">
                                            {{ $quizzes->answer_4 }}
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $quizzes->id }}</td>
                                    </tr>
                                    <tr><th>Question</th><td> {{ $quizzes->question }} </td></tr>
                                    <tr><th>Answer</th><td> {{ $quizzes->jawaban_benar }} </td></tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
