    @extends('layouts.admin')


    @section('content')
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->title }}</td>
                <td>{{ $quiz->description }}</td>
                <td>
                    <a href="{{ route('quizzes.edit', $quiz->id) }}">Edit</a>
                    <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('quizzes.create') }}">Create Quiz</a>
    @endsection