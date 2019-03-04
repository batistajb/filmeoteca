<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(User $client)
    {

        $clients = $client->all();
        $movies = Movie::all();

        $movie1['name']['qtd']= '';
        $movie2['name']['qtd']= '';
        $movie3['name']['qtd']= '';
        $movie4['name']['qtd']= '';
        $movie5['name']['qtd']= '';

        foreach ($movies as $movie)
        {

            $movie1['name'] = $movie->title;
            $movie1['qtd'] = DB::table('favorites')->where('movie_id','=',$movie->id)->count();

        }

         $favorites = Favorite::select("movie_id","cont")
            ->groupBy('movie_id','cont')
            ->orderBy("cont",'desc')
            ->take(6)
            ->get();


        foreach ($favorites as $favorite)
        {
             $movieChart['title'][] = $favorite->movie['title'];
             $movieChart['cont'][] = $favorite['cont'];
        }

        if(empty($favorites))
        {
            $chart = new \App\Charts\Favorite();
            $chart->labels($movieChart['title']);
            $chart->dataset('Filmes mais vistos', 'radar', $movieChart['cont']);
        }

        return view('dashboard', compact('clients','favorites','chart'));
    }

    public function home()
    {
        $movies = Movie::paginate(6);


        $favorites = Favorite::select("movie_id","cont")
            ->groupBy('movie_id','cont')
            ->orderBy("cont",'desc')
            ->take(3)
            ->get();


        foreach ($favorites as $favorite)
        {
            $moviesFavorites['title'][] = $favorite->movie['title'];
            $moviesFavorites['director'][] = $favorite->movie['director'];
            $moviesFavorites['year'][] = $favorite->movie['year'];
            $moviesFavorites['cont'][] = $favorite['cont'];
            $moviesFavorites['image'][] = $favorite->movie['image'];
        }


        return view('home', compact('movies','moviesFavorites'));
    }


    public function like(Request $request)
    {


        $contMax =  Favorite::where('user_id',$request->user_id)->where('movie_id',$request->movie_id)->count();

        if($contMax > 0)
        {
            $request->session()->flash('msg','Você Já Curtiu Esse Filme');
            return back();
        }

        $favorite = new Favorite();
        $favorite->movie_id = $request->movie_id;
        $favorite->user_id = $request->user_id;

        $cont = Favorite::where('movie_id',$request->movie_id)->count();

        $favorite->cont = $cont+1;
        $favorite->save();
        $request->session()->flash('msg','Você Curtiu um FIlme');

        $movies = Movie::paginate(6);

        return back()->with('movies', $movies);
    }

    public function unlike(Request $request)
    {
        Favorite::where('user_id',$request->user_id)->where('movie_id',$request->movie_id)->delete();

        $request->session()->flash('msg','Você descurtiu um filme');
        $movies = Movie::paginate(6);

        return back()->with('movies', $movies);
    }

    public function userEdit()
    {
        $user = User::find(Auth::id());
        return view('user.editUser', compact('user'));
    }

    public function userShow(Request $request)
    {
        return $request;
    }
}
