<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data komentar
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        // Simpan komentar ke dalam database
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();

        // Redirect atau kembalikan respons sesuai kebutuhan
        // Misalnya, kembali ke halaman sebelumnya
        return back()->with('success', 'Komentar berhasil disimpan.');
    }
}
