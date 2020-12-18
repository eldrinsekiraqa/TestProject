<?php

namespace App\Http\Controllers\Article;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $myarticles = Articles::where('user_id',$user->id)
            ->get();
        return view('articles.index')->with('myarticles',$myarticles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $article = Articles::where('id',$id)
        ->where('user_id',$user->id)
        ->first();
        if($article==null){
            return redirect()->back();
        }else{
            return view('articles.edit', compact('article'))->with(['success'=>'Article has been successfully edited!']);
        }
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
        $validateData = $request->validate([
            'title'=>'required|max:30',
            'excerpt'=>'required|max:100',
            'content'=>'required'
        ]);
        $article = Articles::where('id', $id)
        ->first();

        $article->title = $request->input('title');
        $article->excerpt = $request->input('excerpt');
        $article->content = $request->input('content');
        $article->save();

        return redirect()->route('articles.index')->with('success','Article Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Articles::where('id', $id)->delete();
        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully');
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'title'=>'required|max:30',
            'excerpt'=>'required|max:100',
            'content'=>'required',
            'image' => 'required|image|max:2048',
        ]);
        $user = Auth::user();
        $iconName = time().'.'.request()->image->getClientOriginalExtension();
        $icon_path = '/image/'.$iconName;
        $request->image->move(public_path('images'), $iconName);

        $articleData = [
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content'),
            'user_id' => $user->id,
            'image' =>  $iconName,
        ];

        $article = Articles::create($articleData);

        return redirect()->route('articles.index')->with('success','Article Created Successfully');

    }
    public function show($id){

        $article = Articles::findOrFail($id);

        return view('articles.show')->with('article',$article);
    }
}
