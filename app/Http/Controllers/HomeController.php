<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Img;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        return view('home');
    }

    public function task1(){

        $categoriesList = Category::pluck('name', 'id');
        //dd($categoriesList);
        return view('welcome', compact('categoriesList'));

    }

    public function savedata(Request $request){
    
        //dd($request->all());

        $article = new Article();
            $article->category_id  = $request->category;
            $article->article = $request->article;
        $article->save();

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $destinationPath = public_path('images');
                $filename = str_slug($request->category) . '_' . time() . '.' . $image->getClientOriginalExtension();;
                $image->move($destinationPath, $filename);

                $new_img = new Img();
                    $new_img->article_id  = $article->id;
                    $new_img->img = $filename;
                $new_img->save();

            }
        }

        return redirect()->route('task1');

    }

    public function articles(){
    
        $all_articles = Article::with('Category', 'Img')->get();
        dd($all_articles);

        return redirect()->route('task1');
        return view('all-articles', compact('all_articles'));

    }

}
