<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all(); // Mengambil semua data video dari database

        return view('index', compact('videos'));
    }


    function fetch()
    {
        $data = video::all()->toArray();
        return view('videos', compact('data'));
    }

    function insert(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);

        $file = $request->file('video');
        $file->move('upload', $file->getClientOriginalName());
        $file_name = $file->getClientOriginalName();

        $insert = new video();
        $insert->video = $file_name;
        $insert->nama = $request->input('nama');
        $insert->deskripsi = $request->input('deskripsi');
        $insert->album = $request->input('album');
        $insert->artist = $request->input('artist');
        $insert->save();



        $insert->save();

        return redirect('/fetch_video');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $videos = Video::where('nama', 'LIKE', "%$search%")->get();
        return view('search_result', compact('videos'));
    }
    public function edit($file_id)
    {
        $video = Video::find($file_id); // Mengambil data video berdasarkan ID

        if (!$video) {
            return redirect()->back()->with('error', 'Video not found');
        }

        return view('edit', compact('video'));
    }

    public function delete($file_id)
    {
        $video = Video::find($file_id); // Mengambil data video berdasarkan ID

        if (!$video) {
            return redirect()->back()->with('error', 'Video not found');
        }

        // Logika penghapusan data video
        $video->delete();

        return redirect()->back()->with('success', 'Video deleted successfully');
    }

    public function update(Request $request, $file_id)
    {
        $video = Video::find($file_id); // Mengambil data video berdasarkan ID

        if (!$video) {
            return redirect()->back()->with('error', 'Video not found');
        }

        $request->validate([
            'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm',
            // tambahkan validasi lain yang diperlukan
        ]);

        // Update data video
        $video->nama = $request->input('nama');
        $video->deskripsi = $request->input('deskripsi');
        $video->album = $request->input('album');
        $video->artist = $request->input('artist');

        if ($request->hasFile('video')) {
            // Jika ada file video baru, simpan ke direktori dan perbarui nama file
            $file = $request->file('video');
            $file->move('upload', $file->getClientOriginalName());
            $video->video = $file->getClientOriginalName();
        }

        $video->save();

        return redirect()->back()->with('success', 'Video updated successfully');
    }



    public function showUploadForm()
    {
        return view('upload');
    }

    public function showDeleteForm()
    {
        return view('hapus');
    }
}
