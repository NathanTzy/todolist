<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class doController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id', auth()->user()->id)->get();
        return view('home', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required'
        ]);

        try {
            Todo::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'date' => $request->date
            ]);
            return redirect()->back()->with('success', 'done babe 🍑🥵');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '🍑');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required'
        ]);

        try {
            $todo = Todo::find($id);
            $data = $request->all();
            $todo->update($data);

            return redirect()->back()->with('success', 'done babe 🍑🥵');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '🍑');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        try {
            $todo->delete();
            return redirect()->back()->with('success', 'done babe 🍑🥵');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '🍑');
        }
    }
}
