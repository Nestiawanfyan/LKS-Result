<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;

class QuestionsController extends Controller
{
    public function addQuestion()
    {
      return view('add');
    }

    public function addsQuestion(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'title'       => 'required',
        'content'     => 'required'
      ]);

      if ($validator->fails()) {
        return redirect('/home/question/add')->withErrors($validator)->withInput();
      }

      DB::table('questions')->insert([
        'id_user'       => Auth::id(),
        'title'         => $request->title,
        'content'       => $request->content,
        'date_q'        => date("D:m:Y"),
      ]);

      return redirect('/home/question')->with(['berhasil_tambah' => 'Pertanyaan Telah Ditambah']);
    }

    public function detailQuestion()
    {
      $data = DB::table('questions')->join('users','questions.id_user', '=', 'users.id')->orderBy('id_questions','DECS')->get();
      // $data = DB::select('SELECT * FROM questions  ORDER BY questions.id_questions DESC');
      return view('viewQuestion', compact('data'));
    }

    public function detailsQuestion($id_questions)
    {
      // $data = DB::table('questions')->join('users','questions.id_user', '=', 'users.id')->where('questions.id_questions',$id_questions)->orderBy('questions.id_questions','DESC')->get();
      $data   = DB::select("SELECT * FROM questions INNER JOIN users ON questions.id_user = users.id WHERE questions.id_questions = $id_questions");
      $datas  = DB::select("SELECT * FROM answers INNER JOIN questions ON answers.id_question = questions.id_questions INNER JOIN users ON answers.id_user = users.id WHERE questions.id_questions = $id_questions ORDER BY answers.id DESC");
      $datass = DB::select("SELECT * FROM comments INNER JOIN questions ON comments.id_question = questions.id_questions INNER JOIN users ON comments.id_user = users.id WHERE questions.id_questions = $id_questions ORDER BY comments.id DESC");
      return view('viewDetails', compact('data','datas','datass'));
    }

    public function editQuestion($id_questions)
    {
      $data = DB::table('questions')->where('id_questions',$id_questions)->get();
      return view('editQuest', compact('data'));
    }

    public function editsQuestion(Request $request, $id_questions)
    {
      $validator = Validator::make($request->all(), [
        'title'         => 'required',
        'content'       => 'required',
      ]);

      if ($validator->fails()) {
        return redirect('/home/question/view/edit/'.$id_questions)->withErrors($validator)->withInput();
      }

      DB::table('questions')->where('id_questions',$id_questions)->update([
        'title'             => $request->title,
        'content'           => $request->content,
      ]);
      return redirect('/home/question/view/'.$id_questions)->with(['berhasil_update' => 'Pertanyaan Telah di Perbarui']);
    }

    public function deleteQuestion($id_questions)
    {
      DB::table('questions')->where('id_questions',$id_questions)->delete();
      return redirect('/home/question')->with(['berhasil_delete' => 'Data Telah Terhapus']);
    }

    public function answerQuestion(Request $request, $id_questions)
    {
      $validator = Validator::make($request->all(), [
        'answer'  => 'required',
      ]);

      if ($validator->fails()) {
        return redirect('/home/question/view/10'.$id_questions)->withErrors($validator)->withInput();
      }

      DB::table('answers')->insert([
        'id_user'         => Auth::id(),
        'id_question'    => $id_questions,
        'answer'          => $request->answer,
        'date_a'          => date("D:m:Y"),
      ]);

      return redirect('/home/question/view/'.$id_questions)->with(['Berhail_jawab' => 'Jawaban Telah Di Tambah']);
    }

    public function komentarQuestion($id_questions)
    {
      $data = DB::table('questions')->where('id_questions',$id_questions)->get();
      return view('commant', compact('data'));
    }

    public function komentarsQQuestion(Request $request, $id_questions)
    {
      $validator = Validator::make($request->all(), [
        'comment' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect('/home/question/view/komentar/'.$id_questions)->withError($validator)->withInput();
      }

      DB::table('comments')->insert([
        'id_user'         => Auth::id(),
        'id_question'     => $id_questions,
        'comment'         => $request->comment,
        'date_c'          => date("D:m:Y"),
      ]);

      return redirect('/home/question/view/'.$id_questions)->with(['berhasil_komentar' => 'Komentar Telah Ditambahkan']);
    }

}
