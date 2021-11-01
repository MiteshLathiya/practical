<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Company;
use App\Models\Frontend\Employee;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{

    public function __construct(Company $model,Employee $employee)
    {
        $this->Company = $model;
        $this->Employee = $employee;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addcompany');
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
        $request->validate([
            'company'=>'required|string',
            'address'=>'required',
            'city'=>'required',
            'zip'=>'required',
            'mobile'=>'required|string|unique:companies,mobile',
        ]);

        $data=array(

            'name'=>$request->company,
            'address'=>$request->address,
            'city'=>$request->city,
            'zipcode'=>$request->zip,
            'mobile'=>$request->mobile

        );

        $this->Company->addcompany($data);

        return redirect()->back()->with('success', 'Company Added Sucessfully!');
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

    public function viewcompany(Request $request)
    {

        $limit= $request->limit;
        $search= $request->search;
        $request->session()->put('limitdata', $limit);
        $request->session()->put('searchdata', $search);
       
        
        if ($limit == null) {
            $limit= 5;
        }
        
        $data = $this->Company->where('name', 'LIKE', '%'.$search.'%')
                                    ->orWhere('address', 'LIKE', '%'.$search.'%')
                                    ->orWhere('city', 'LIKE', '%'.$search.'%')
                                    ->orWhere('zipcode', 'LIKE', '%'.$search.'%')
                                    ->orWhere('mobile', 'LIKE', '%'.$search.'%')
                                    ->sortable()
                                    ->paginate($limit);

      

       

        return view('admin.viewcompany')->with('data', $data);

  
    }

    public function viewemployee(Request $request)
    {

        $limit= $request->limit;
        $search= $request->search;
        $request->session()->put('limitdata', $limit);
        $request->session()->put('searchdata', $search);
       
        
        if ($limit == null) {
            $limit= 5;
        }
        
        $data = $this->Employee->where('firstname', 'LIKE', '%'.$search.'%')
                                    ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                                    ->orWhere('birthdate', 'LIKE', '%'.$search.'%')
                                    ->orWhere('age', 'LIKE', '%'.$search.'%')
                                    ->orWhere('mobile', 'LIKE', '%'.$search.'%')
                                    ->orWhere('gender', 'LIKE', '%'.$search.'%')
                                    ->orWhere('city', 'LIKE', '%'.$search.'%')
                                    ->orWhere('company', 'LIKE', '%'.$search.'%')
                                    ->orWhere('email', 'LIKE', '%'.$search.'%')    
                                    ->sortable()
                                    ->paginate($limit);

  
        return view('admin.viewemployee', ['data'=>$data]);

        
    }

    public function totalemployee()
    {

        $data=DB::table('employees') ->select('company', DB::raw('count(*) as total'))
        ->groupBy('company')
        ->get();
       
        return view('admin.totalemployee',['data'=>$data]);  

      
    }
}
