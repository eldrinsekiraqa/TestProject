<?php

namespace App\Http\Controllers\Article;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
            'al_desc'=>'required|string',
            'tr_desc'=>'required|string',
            'stock'=>'required',
            'age'=>'required',
            'pur_price'=>'required',
            'sale_price'=>'required',
            'image' => 'required|image|max:2048',
        ]);

        $article = Articles::where('id', $id)
            ->first();

        $image_path = public_path("images/{$article->image}");

        if (File::exists($image_path)) {
            unlink($image_path);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $article->image = $request->file('image')->getClientOriginalName();
        }

        $article->al_desc = $request->input('al_desc');
        $article->tr_desc = $request->input('tr_desc');
        $article->stock = $request->input('stock');
        $article->age=$request->input('age');
        $article->pur_price=$request->input('pur_price');
        $article->sale_price=$request->input('sale_price');
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
        $article = Articles::findOrFail($id);
        $image_path = public_path("images/{$article->image}");

        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $article->delete();
        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully');
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'al_desc'=>'required|string',
            'tr_desc'=>'required|string',
            'stock'=>'required',
            'age'=>'required',
            'pur_price'=>'required',
            'sale_price'=>'required',
            'image' => 'required|image|max:2048',
        ]);
        $user = Auth::user();
        $iconName = time().'.'.request()->image->getClientOriginalExtension();
        $icon_path = '/image/'.$iconName;
        $request->image->move(public_path('images'), $iconName);

        $articleData = [
            'al_desc' => $request->input('al_desc'),
            'tr_desc' => $request->input('tr_desc'),
            'stock' => $request->input('stock'),
            'age'=>$request->input('age'),
            'pur_price'=>$request->input('pur_price'),
            'sale_price'=>$request->input('sale_price'),
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

    public function reduceStock($id){
        $article = Articles::where('id', $id)
            ->first();
        if ($article->stock == 0) {
            return redirect()->back()->with('success','Out of Stock');
        }else{
            $articleStock = $article->stock;
            $article->stock = $articleStock-1;
            $article->save();
        }
        return redirect()->back()->with('success','Sold Item');
    }
}
