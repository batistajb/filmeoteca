<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::paginate(15);
        return view('movie.index', compact('movies'));
    }

    public function create()
    {
        return view('movie.create');

    }

    public function store(Request $request)
    {

        $status = false;
        $msg = false;
        $erro= false;
        $movie = new Movie();

        $movie->title  =  $request->title;
        $movie->year  =  $request->year;
        $movie->director  = $request->director;





        if ($request->hasFile('image')&& $request->file('image')->isValid()) {

            $name = $request->id . "-" . kebab_case($request->title);

            $extesion = $request->image->extension();

            $nameFile = "{$name}.{$extesion}";

            $movie->image = $nameFile;

            $upload = $request->image->storeAs('imageMovie/',$nameFile);

        }

        $status = $movie->save();

        if($status == true)
            $request->session()->flash('msg', 'Filme inserido com Sucesso');
        else
            $request->session()->flash('msg', '"Falha ao inserir"');

        $movies = Movie::paginate(5);

        return back()->with('movies',$movies);

    }

    public function update(Request $request)
    {
            $movie = Movie::find($request->id);
            $movie->title = $request->title;
            $movie->director = $request->director;
            $movie->year = $request->year;


            $movie->save();

        return back();
    }

    public function delete(Request $request)
    {
        $status = false;

        $movie = Movie::find($request->id);
        $status = $movie->delete();

        if($status == true)
            $request->session()->flash('msg', 'Filme Apagado com Sucesso');
        else
            $request->session()->flash('msg', '"Falha ao Apagar"');

        $movies = Movie::paginate(5);

        return back()->with('movies',$movies);

    }

}
