<?php

namespace App\Http\Controllers;

use App\Models\Tree;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['name'=>'index', 'payload'=>Tree::all()];
        return response($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'Tree_name' => 'required',
            'Tree_mean' => 'required',
            'Tree_Feature'=> 'requtred',
            'Tree_PT' => 'required',
        ]);

        $tree = Tree::create([
            'Tree_name' => $fields['Tree_name'],
            'Tree_mean' => $fields['Tree_mean'],
            'Tree_Feature' => $fields['Tree_Feature'],
            'Tree_PT' => $fields['Tree_PT'],
        ]);

        $result = ['name'=>'store', 'payload'=> $tree];
        return response($result, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tree  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ['name'=>'show', 'payload'=>Tree::find($id)];
        return response($result, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tree  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tree, $id)
    {
        $fields = $request->validate([
            'Tree_name' => 'required|string',
            'Tree_mean' => 'required|string',
            'Tree_Feature' => 'required|string',
            'Tree_PT' => 'required|string',
        ]);

        $tree = Tree::where("id",$id)->update($request->all());

        $result = [
            'name' => 'update',
            'payload' => $tree,
        ];
        return response($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tree  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tree = Tree::where('id', $id);
        $tree->delete();
        $result = ['name'=>'destroy', 'payload'=>'Deleted.'];
        return $result;
    }
}
