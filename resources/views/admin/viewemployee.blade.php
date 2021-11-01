@extends('admin.master')
@include('admin.header')
@include('admin.sidebar')

<div id="layoutSidenav_content">
    <main>
        
        <div class="container-fluid px-4"><br><br>
<section id="main-content" style="margin-left: 30px">
    <section class="wrapper">
        <div class="form-w3layouts">

            <form method="get" action="{{ '/Dashboard/ShowEmployee'}}">
      
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            Show <select name="limit">
                                @if (session()->get('limitdata'))
                                <option value="{{session()->get('limitdata')}}">{{session()->get('limitdata')}}</option>
                                @else
                                <option value="5">5</option>
                                @endif
                               
               
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select> entries
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-5">
                            Search: <input type="text" name="search" value="{{session()->get('searchdata')}}">
                        </div>
                    </div>
                  <br>
                    <div class="row">
                    <div class="col-10">
                    </div>
                    <div class="col-2">
                        <input type="submit">
                    </div>
                    </div>
                </div>


                <br>

                <table  class="table  table-bordered table-hover"  style="width:100%;font-size: 15px;">

                    <thead>
                        <tr>
                            <th>@sortablelink('id')</th>
                            <th>image</th>
                            <th>@sortablelink('firstname')</th>        
                            <th>@sortablelink('lastname')</th>
                            <th>@sortablelink('birthdate')</th>
                            <th>@sortablelink('age')</th>
                            <th>@sortablelink('mobile')</th>
                            <th>@sortablelink('gender')</th>
                            <th>@sortablelink('city')</th>
                            <th>@sortablelink('company')</th>
                            <th>@sortablelink('email ')</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td style="color:black;">{{ $row->id }}</td>
                            <td style="color:black;">  <img src="{{ asset('style/frontend/employee/'.$row->image) }}" alt="" title="" style="width: 100px;height: 100px;"></td>
                            <td style="color:black">{{ $row->firstname }}</td>
                           
                            <td style="color:black">{{ $row->lastname }}</td>
                            <td style="color:black">{{ $row->birthdate }}</td>
                            <td style="color:black">{{ $row->age }}</td>
                          
                            <td style="color:black">{{ $row->mobile }}</td>
                            <td style="color:black">{{ $row->gender }}</td>
                            <td style="color:black">{{ $row->city }}</td> 
                            <td style="color:black">{{ $row->company }}</td>
                            <td style="color:black">{{ $row->email }}</td>
                         
                            
                        </tr>
                        @endforeach
                    </tbody>

                </table><br>
                {{  $data->appends(Request::all())->links() }}
            </form>
        </div>

    </section>

</section>
        </div>
    </main>
</div>
<style>
    .w-5{
       
        width: 25px;
        margin: auto;
       
    }
    </style>    
