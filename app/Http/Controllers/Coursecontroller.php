<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\User;
use Illuminate\support\Facades\Auth;


class Coursecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function courses()
    {
        
        $courses=Course::get();
        return view('user.courses',compact('courses'),['courses'=>$courses]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $user = User::findOrFail($id);
    $courses = $user->courses;

    return view('user.profile', compact('user', 'courses'));
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
        //
    }
}
