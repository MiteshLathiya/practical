<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Employee;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct(Employee $model)
    {
        $this->Employee = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  $this->Employee->showdata();

        return view('frontend.register')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

        $messages = [
            'firstname.required' => 'Please insert First Name!',
            'lastname.required' => 'Please insert Last Name!',
        
        ];

         $request->validate(
            [
                'firstname'=>'required|string',
                'lastname'=>'required|string',
                'birthdate'=>'required|string',
                'mobile'=>'required|string|unique:employees,mobile',
                'gender'=>'required|before:13 years ago',
                'city'=>'required|string',
                'company'=>'required|string',
                'email'=>'required|email|unique:employees,email',
                'password'=>'required|string|min:8',
                'image'=>'required|image',

            ],$messages
            );


            $image=$request->file('image');
            $filename=rand(). '.'.$image->getClientOriginalExtension();
            $image->move('style/frontend/employee/', $filename);

            $data= array(
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'birthdate'=>$request->birthdate,
                'age'=>$request->age,
                'mobile'=>$request->mobile,
                'gender'=>$request->gender,
                'city'=>$request->city,
                'company'=>$request->company,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'image'=>$filename
            );

            $this->Employee->employeeregister($data);

            return redirect()->route('register')->with('success', 'Employee Register Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        
  
}
