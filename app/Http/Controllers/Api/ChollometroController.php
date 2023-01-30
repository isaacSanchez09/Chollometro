<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CholloApiPost;
use App\Http\Requests\CholloEditPost;
use App\Http\Requests\CholloPost;
use App\Models\Chollo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChollometroController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth:sanctum',['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chollos = Chollo::get();
        return $chollos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CholloApiPost $request)
    {
        $chollo = new Chollo($request->all());
        $chollo->user_id = 1;
        $chollo->likes = 0;
        $chollo->unlikes = 0;
        $chollo->available = true;
        $chollo->save();
        return response()->json($chollo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chollo  $chollo
     * @return \Illuminate\Http\Response
     */
    public function show(Chollo $chollo)
    {
        return response()->json($chollo, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chollo  $chollo
     * @return \Illuminate\Http\Response
     */
    public function update(CholloEditPost $request, Chollo $chollo)
    {
        if($request->file('photo')){
            $filename = "$chollo->id-ganga-severa.jpg";
            Storage::delete(asset("public/img/$filename"));
            $request->file('photo')->storeAs('public/img', $filename);
        }
        $chollo->update($request->all());
        return response()->json($chollo);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chollo  $chollo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chollo $chollo)
    {
        $chollo->delete();
        return response()->json(null, 204);
    }
}
