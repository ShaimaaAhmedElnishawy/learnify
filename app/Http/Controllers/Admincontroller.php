<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\course;
use App\Models\Instructor;

use Illuminate\support\Facades\Auth;

class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        //
    }
    //views all courses
    public function courses()
    { 
        $courses=Course::all();
        return view('/admin/admin_courses',compact('courses'));
    }
 /**
     * Show the form for creating a new resource.
     */
    public function create_course(){
        $courses=Course::all();
        $instructors = Instructor::all();
        return view('/admin/create_course', compact('courses', 'instructors'));    }
    
    /**
     * Store a newly created resource in storage.
     */
     
    public function store_course(Request $request )
    {
        
        $request->validate([
            'name'=>'required|string',
            'content'=>'required|string',
            'price'=>'required|numeric',
            'duration'=>'required|numeric',
            'instructor_id' => 'required|exists:instructors,id', 
            //'instructor_name' => 'required|string',
        ]);
         
            
       $requestData = $request->except(['_token', '_method']);
        Course::create($requestData);


        return back()->with('success', 'Course launched successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $course = Course::find($id);
        return view('admin.edit_course',['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requstData=$request->except(['_token','_method']);
        $course = Course::where('id',$id)->update($requstData);
        return redirect('/admin/admin_courses')->with('message',"course edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::where('id',$id)->delete();
        return redirect('/admin/admin_courses')->with('message',"course edited successfully");
    }

    public function login(Request $request)
    {

        $validData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');
        if (Auth::guard("admin")->attempt($validData, $remember)) {
           $request->session()->regenerate();
            return redirect('/admin/admin_courses');
        } 
        else {
            return back()->withInput($validData)->with('error' ,'invalid email or password');
        }
    }
}
