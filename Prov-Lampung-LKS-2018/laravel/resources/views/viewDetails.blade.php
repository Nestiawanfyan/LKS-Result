@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <?php if (!empty($data)): ?>
            <?php foreach ($data as $dt): ?>
              <div class="card">
                  <div class="card-header">Dari : {{ $dt->name }} </div>

                  <div class="card-body">
                    <?php if (Session::get('berhasil_update') == 'berhasil_update'): ?>
                      <p>Data Telah Diperbarui</p>
                    <?php endif; ?>
                    <br>
                    <p>Tanggal Upload : {{ $dt->date_q }}</p>
                    <p>Judul Pertanyaan : {{ $dt->title }}</p>
                    <p>Content :</p>
                    <p style="margin-left:30px;">{{ $dt->content }}</p><br><br>

                    <?php if ($dt->id === auth::id()): ?>
                      <a href="{{ route('editQuest.Question',$dt->id_questions) }}">Edit</a> |
                      <a href="{{ route('hapusQuest.Question',$dt->id_questions) }}">Hapus</a>
                    <?php endif; ?>
                    <a href="{{ route('komentarQuest.Question',$dt->id_questions) }}">Komentar</a>
                  </div>

                  <?php if (!empty($datass)): ?>
                      <?php foreach ($datass as $dtss): ?>
                        <div class="card-body" style="border-top:2px solid rgba(0,0,0,0.3);">
                          <p>Name : {{ $dtss->name }}</p>
                          <p>Tanggal Komentar : {{ $dtss->date_c }}</p>
                          <p>Komentar : {{ $dtss->comment }}</p>
                        </div>
                      <?php endforeach; ?>
                  <?php endif; ?>


            <?php endforeach; ?>
          <?php endif; ?>
        </div>
          <br>
          <div class="card">
              <div class="card-header">Kirim Jawaban :  </div>
              <div class="card-body">
                <form action="{{ route('answerQuest.Question',$dt->id_questions) }}" method="post">
                  {{ csrf_field() }}
                  <textarea name="answer" rows="8" cols="88"></textarea><br><br>
                  <input type="submit" name="addAnswer" value="Kirim Jawaban">
                </form>
              </div>
          </div>

          <br>
          <div class="card">
              <div class="card-header">Jawaban :  </div>
              <?php if (!empty($datas)): ?>
                <?php foreach ($datas as $dts): ?>
                  <div class="card-body" style="border-bottom:2px solid rgba(0,0,0,.03);">
                    <p>Dijawab Oleh : {{ $dts->name }}</p>
                    <p>Tanggal Jawab : {{ $dts->date_a }}</p>
                    <p>Jawaban : {{ $dts->answer }}</p><br>

                    <?php if ($dt->id === auth::id()): ?>
                      <a href="{{ route('editQuest.Question',$dt->id_questions) }}">Edit</a> |
                      <a href="{{ route('hapusQuest.Question',$dt->id_questions) }}">Hapus</a>
                    <?php endif; ?>
                    <!-- <a href="#">Komentar</a> -->

                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
          </div>
        </div>
    </div>
</div>
@endsection
