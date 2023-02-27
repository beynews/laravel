<form action="{{ route('quizzes.update', $quiz->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title: Hehehe</label>
        <input type="text" id="title" name="title" value="{{ $quiz->title }}">
    </div>
    <div>
        <label for="description">Description: Huu</label>
        <textarea id="description" name="description">{{ $quiz->description }}</textarea>
    </div>
    <button type="submit">Update Quiz</button>
</form>