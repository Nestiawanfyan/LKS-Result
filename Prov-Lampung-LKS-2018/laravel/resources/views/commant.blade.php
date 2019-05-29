@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <?php if (!empty($data)): ?>
            <?php foreach ($data as $dt): ?>
            <div class="card">
                <div class="card-header">Tambah Komentar Pada : {{ $dt->title }} </div>

                <div class="card-body">
                  <form action="{{ route('komentarsQuest.Question',$dt->id_questions) }}" method="post">
                    {{ csrf_field() }}
                    <textarea name="comment" rows="8" cols="94"></textarea><br><br>
                    <input type="submit" name="addAnswer" value="Kirim Komentar">
                  </form>
                </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</div>
@endsection
