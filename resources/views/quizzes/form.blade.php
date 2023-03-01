<div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
    <label for="question" class="control-label">{{ 'Pertanyaan' }}</label>
    <input class="form-control" name="question" type="text" id="question" value="{{ isset($quizzes->question) ? $quizzes->question : ''}}" >
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_1') ? 'has-error' : ''}}">
    <label for="answer_1" class="control-label">{{ 'Answer_1' }}</label>
    <input class="form-control" name="answer_1" type="text" id="answer_1" value="{{ isset($quizzes->answer_1) ? $quizzes->answer_1 : ''}}" >
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_2') ? 'has-error' : ''}}">
    <label for="answer_2" class="control-label">{{ 'Answer_2' }}</label>
    <input class="form-control" name="answer_2" type="text" id="answer_1" value="{{ isset($quizzes->answer_2) ? $quizzes->answer_2 : ''}}" >
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_3') ? 'has-error' : ''}}">
    <label for="answer_3" class="control-label">{{ 'Answer_3' }}</label>
    <input class="form-control" name="answer_3" type="text" id="answer_3" value="{{ isset($quizzes->answer_3) ? $quizzes->answer_3 : ''}}" >
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_4') ? 'has-error' : ''}}">
    <label for="answer_4" class="control-label">{{ 'Answer_4' }}</label>
    <input class="form-control" name="answer_4" type="text" id="answer_4" value="{{ isset($quizzes->answer_4) ? $quizzes->answer_4 : ''}}" >
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('jawaban_benar') ? 'has-error' : ''}}">
    <label for="jawaban_benar" class="control-label">{{ 'Jawaban_benar' }}</label>
    <input class="form-control" name="jawaban_benar" type="text" id="jawaban_benar" value="{{ isset($quizzes->jawaban_benar) ? $quizzes->jawaban_benar : ''}}" >
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
