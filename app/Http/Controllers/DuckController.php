<?php

namespace App\Http\Controllers;

use App\Models\Duck;
use Illuminate\Http\Request;

class DuckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Duck::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Duck::create()->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Duck::find($id)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Duck::find($id)->delete();
    }

    public function feed($id,$food) {
        $duck = Duck::find($id);
        $newFill = $duck->stomach_fill + $food;
        if ($newFill > $duck->stomach_capacity) {
            $duck->update(['status' => 'dead']);
        }

        $duck->update(['stomach_fill' => $newFill]);
        return $duck->toJson();
    }

    public function view(string $id)
    {
        $duck = Duck::find($id);
        return view('duck')->with('duck',$duck);
    }
}
