<?php

namespace App\Http\Controllers;

use App\Http\Requests\CholloEditPost;
use App\Http\Requests\CholloPost;
use App\Http\Requests\Likes;
use App\Models\Category;
use App\Models\Chollo;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChollometroController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth',['only' => ['create', 'store', 'edit', 'update', 'destroy', 'vote']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chollos = Chollo::orderBy('title', 'ASC')->paginate(5);
        return view('chollometro.index',compact('chollos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('chollometro.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CholloPost $request)
    {
        $chollo = new Chollo($request->all());
        $chollo->user_id = Auth::user()->id;
        $chollo->likes = 0;
        $chollo->unlikes = 0;
        $chollo->available = true;
        $chollo->save();
        $filename = "$chollo->id-ganga-severa.jpg";
        $request->file('photo')->storeAs('public/img', $filename);
        return redirect()->route('chollometro.show', $chollo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $chollo = Chollo::findOrFail($id);
            $relatedChollos = Chollo::where('category', $chollo->category)->get();
            return view('chollometro.show')->with('chollo', $chollo)->with('relatedChollos', $relatedChollos);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('chollometro.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $chollo = Chollo::findOrFail($id);
            $categories = Category::all();
            if(Auth::user()->id != $chollo->user_id && Auth::user()->rol != "admin"){
                return redirect()->route('chollometro.index');
            }
            return view('chollometro.edit')->with('chollo',$chollo)->with('categories', $categories);

        }catch (ModelNotFoundException $e){
            return redirect()->route('chollometro.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CholloEditPost $request, $id)
    {
        $chollo = Chollo::findOrFail($id);
        if($request->file('photo')){
            $filename = "$chollo->id-ganga-severa.jpg";
            Storage::delete(asset("public/img/$filename"));
            $request->file('photo')->storeAs('public/img', $filename);
        }
        $chollo->update($request->all());
        return redirect("chollometro/$chollo->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $chollo = Chollo::findOrFail($id);
            if(Auth::user()->id != $chollo->user_id && Auth::user()->rol != "admin"){
                return redirect()->route('chollometro.index');
            }
            $filename = "$chollo->id-ganga-severa.jpg";
            Storage::delete(asset("public/img/$filename"));
            $chollo->delete();
            return redirect('/chollometro');
        }catch (ModelNotFoundException $e){
            return redirect()->route('chollometro.index');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rated()
    {
        $chollos = Chollo::selectRaw('*, (likes/(likes + unlikes)* 100) as rated')
            ->orderByRaw('rated DESC')
            ->paginate(5);
        return view('chollometro.index',compact('chollos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newest()
    {
        $chollos = Chollo::latest()->paginate(5);
        return view('chollometro.index',compact('chollos'));
    }

    public function categories(){
        $categories = Category::all();
        return view('chollometro.indexCat',compact('categories'));
    }

    public function addCategory(Request $request){
        try {
            $category = new Category();
            $category->name = $request->nombre;
            $category->save();
            return redirect()->route('categories');
        }catch (ModelNotFoundException $e){
            return redirect()->route('chollometro.index');
        }
    }

    public function delCategory($id){
        try {
            $category = Category::findOrFail($id);
            if(Auth::user()->rol != "admin"){
                return redirect()->route('chollometro.index');
            }
            $category->delete();
            return redirect()->route('categories');
        }catch (ModelNotFoundException $e){
            return redirect()->route('chollometro.index');
        }
    }

    public function myGangas(){
        try{
            $chollos = Chollo::where('user_id',Auth::user()->id)->paginate(5);
            return view('chollometro.profile',compact('chollos'));
        }catch (ModelNotFoundException $e){
            return redirect()->route('chollometro.index');
        }

    }

    public function vote($id,$vote){
        try {
            $chollo = Chollo::findOrFail($id);
            if(Auth::user()->like()->where('chollo_id', $id)->first()){
                $like = Auth::user()->like()->where('chollo_id', $id)->first();
                if($like->voto != $vote){
                    if(!$vote){
                        $chollo->likes--;
                        $chollo->unlikes++;
                    }else{
                        $chollo->likes++;
                        $chollo->unlikes--;
                    }
                }
                $like->voto = $vote;
                $like->save();
            }else{
                $like = new Like();
                $like->chollo_id = $chollo->id;
                $like->user_id = Auth::user()->id;
                $like->voto = $vote;
                $like->save();
                if(!$vote){
                    $chollo->unlikes++;
                }else{
                    $chollo->likes++;
                }
            }
            $chollo->save();
            return redirect("chollometro/$chollo->id");
        }catch (ModelNotFoundException $e){
            return redirect()->route('chollometro.index');
        }
    }
}
