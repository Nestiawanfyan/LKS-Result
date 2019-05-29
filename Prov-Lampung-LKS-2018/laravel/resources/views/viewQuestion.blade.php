@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <?php if (!empty($data)): ?>
            <?php foreach ($data as $dt): ?>
              <div class="card">

                  <div class="card-body">
                    <p>Penanya : {{ $dt->name }}</p>
                    <p>Tanggal Upload : {{ $dt->date_q }}</p>
                    <p>Judul Pertanyaan : {{ $dt->title }}</p>
                    <a href="{{ route('detailsQuest.Question',$dt->id_questions) }}">Lihat</a>
                  </div>
              </div><br>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
    </div>
</div>
@endsection
