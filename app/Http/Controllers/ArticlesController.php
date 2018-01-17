<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles=Article::all();
        return View::make('articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'head'=>'required',
            'body'=>'required'
        ];
        $validator=Validator::make(Input::all(),$rules);

        if($validator->fails()){
            return Redirect::to('articles/create')->withErrors($validator)->withInput(Input::all());
        }
        else{
        $article = new Article();
        $article->head = Input::get('head');
        $article->body = Input::get('body');
        $article->user_id = Input::get('user_id');
        $article->save();
        Session::flash('message','Successfully created article');
            return Redirect::to('articles');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article= Article::find($id);
        return View::make('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article= Article::find($id);
        return View::make('articles.edit')->with('article',$article);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = ['head'=>'required','body'=>'required'];
        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return Redirect::to('articles/'.$id.'/edit')->withErrors($validator)->withInput(Input::all());
        }
        else{
        $article = Article::find($id);
        $article->head = Input::get('head');
        $article->body = Input::get('body');
        $article->user_id = Input::get('user_id');
        $article->save();
        Session::flash('message','Successfully update article');
            return Redirect::to('articles');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        Session::flash('message','Successfully deleted article');
        return Redirect::to('articles');
    }
}
