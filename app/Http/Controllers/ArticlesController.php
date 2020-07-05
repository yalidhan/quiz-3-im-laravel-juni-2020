<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artikel = Article::all();
        // dd($artikel);
        return view('pages.artikel', compact('artikel'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cara 1
        // $artikel = new Article;
        // $artikel->id_user = $request->id_user;
        // $artikel->judul = $request->judul;
        // $artikel->isi = $request->isi;
        // $artikel->slug = $request->slug;
        // $artikel->tag = $request->tag;
        // $artikel ->save();
        //cara2
        Article::create([
            'id_user'=>$request->id_user,
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'slug'=>Str::slug($request->judul,'-'),
            'tag'=>$request->tag
        ]);
        //untuk 1 baris
        //untuk validasi
        $request->validate([
            'id_user'=>'required',
            'judul'=>'required',
            'isi'=>'required',
            'tag'=>'required'
        ]);
        // Article::create($request->all());

        return redirect('/artikel')->with('status','Data Artikel Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        $tags= explode(' ',$article->tag);

        return view('pages.detail',compact('article','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        return view('pages.edit', compact('article'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        Article::where('id',$article->id)
                ->update([
                    'judul' =>$request->judul,
                    'isi' =>$request->isi,
                    'slug' =>$request->slug,
                    'tag' =>$request->tag
                ]);
                return redirect('/artikel')->with('status','Data Artikel Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        Article::destroy($article->id);
        return redirect('/artikel')->with('status','Data Artikel Berhasil Dihapus!');
    }
}
