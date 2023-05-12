<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeSong;
use App\Models\User;

class SongController extends Controller
{
    //

    //method untuk tampil data buku
    public function songshow()
    {
        $datasong = TypeSong::orderBy('id', 'ASC')->get();
        return view('view_song',['song'=>$datasong]);
    }

    //method untuk tambah data buku
    public function addsong(Request $request)
    {
        $this->validate($request, [
            'Singer' => 'required',
            'Title' => 'required',
            'Genre' => 'required',
            'Price' => 'required'
        ]);

        TypeSong ::create([
            'Singer' => $request->Singer,
            'Title' => $request->Title,
            'Price' => $request->Price,
            'Genre' => $request->Genre
        ]);

        return redirect('/song');
    }

     //method untuk hapus data buku
     public function removesong($id)
     {
         $datasong=TypeSong::find($id);
         $datasong->delete();
 
         return redirect()->back()->with('status',"Data Deleted Successfully");
     }

   
    public function editsong($id){
        $datasong = TypeSong::where('id','=',$id)->first();
        return view('editsong',compact('datasong'));
    }
    
    public function updatesong(Request $request){
        $request->validate([
            'id' => 'required',
            'Title' => 'required',
            'Price' => 'required',
            'Genre' => 'required'
        ]);

        $id = $request->id;
        $Price   = $request->Price;
        $Title     = $request->Title;
        $Singer  = $request->Singer;
        $Genre   = $request->Genre;

        TypeSong::where('id',"=",$id)->update([
            'Title'=>$Title,
            'Singer'=>$Singer,
            'Genre'=>$Genre,
            'Price'=>$Genre
        ]);
        return redirect()->back()->with('success','Updated Successfully');
    }
}