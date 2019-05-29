@extends('layouts.app')

@section('addquest')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h2>Tambah Pertanyaan</h2> </div>

                <div class="card-body">
                  <form action="{{ route('addsQuest.Question') }}" method="post">
                    {{csrf_field()}}
                    <label> Judul Pertanyaan </label><br>
                    <input type="text" name="title" placeholder=""><br><br>


                    <label> Pertanyaan </label><br>
                    <textarea name="content" rows="8" cols="80"></textarea><br><br>


                    <input type="submit" name="addQ" value="Tambah Pertanyaan">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
