<form action="{{ route('quizzes.store') }}" method="post">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <button type="submit">Create Quiz</button>
</form>
