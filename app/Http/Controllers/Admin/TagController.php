<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view("admin.tags.index", compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tags.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationTag $request)
    {
          // $request->validate(
        //     [
        //         'name' => 'required|min:3',
        //     ]
        // );

        $data = $request->all();

        // lo slug è già univoco perchè il nome del tag non può esserre duplicato 
        // a causa di una condizione di validation del dato (ValidationTag)
        $slug = Str::slug($data['name']);

        $data['slug'] = $slug;

        $tag = new Tag();
        $tag->fill($data);
        $tag->save();

        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view("admin.tags.show", compact("tag"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view("admin.tags.edit", compact("tag"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationTag $request, Tag $tag)
    {
        // $request->validate(
        //     [
        //         'name' => 'required|min:3',
        //     ]
        // );

        $data = $request->all();

        // creo slug univoco, nel caso in cui il nuovo è già presente nel database ne creo uno diverso, concatenandolo ad un couter
        // Prova-nuovo-post 
        // Prova-nuovo-post-1
        $slug = Str::slug($data['name']);

        //solo se il nuovo slug è diverso da quello che c'era prima ne crei uno nuovo diverso da quelli presenti sul database
        if($tag->slug != $slug){ 
            $counter = 1;
            while (Tag::where('slug', $slug)->first()) {
                $slug = Str::slug($data['name']) . '-' . $counter;
                $counter++;
            }    
            $data['slug'] = $slug;
        }

        $tag->update($data);
        $tag->save();

        return redirect()->route("admin.tags.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route("admin.tags.index");
    }
}
