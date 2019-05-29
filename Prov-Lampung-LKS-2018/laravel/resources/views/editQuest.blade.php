@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <?php if (!empty($data)): ?>
            <?php foreach ($data as $dt): ?>
              <div class="card">
                  <div class="card-header">Edit Pertanyaan : {{ $dt->title }} </div>

                  <div class="card-body">
                    <form action="{{ route('editsQuest.Question', $dt->id_questions) }}" method="post">
                      {{csrf_field()}}
                      <label> Judul Pertanyaan </label><br>
                      <input type="text" name="title" value="{{ $dt->title }}"><br><br>

                      <label> Pertanyaan </label><br>
                      <textarea name="content" rows="8" cols="80">{{ $dt->content }}</textarea><br><br>

                      <input type="submit" name="editQ" value="Perbarui Pertanyaan">
                    </form>
                  </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
    </div>
</div>
@endsection
