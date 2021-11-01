@extends('admin.master')
@include('admin.header')
@include('admin.sidebar')

<div id="layoutSidenav_content">
    <main>
        
        <div class="container-fluid px-4"><br><br>
<section id="main-content" style="margin-left: 30px">
    <section class="wrapper">
        <div class="form-w3layouts">

                          

            @if(session()->has('update'))
            <div class="alert alert-success" style="font-size: 16px;">
                {{ session()->get('update') }}
            </div>
            @endif

            @if(session()->has('delete'))
            <div class="alert alert-success" style="font-size: 16px;">
                {{ session()->get('delete') }}
            </div>
            @endif
            <form method="get" action="{{ '/Dashboard/EditCompany'}}">
      
                <div class="container">
              
                  <br>
                    <div class="row">
                    <div class="col-10">
                    </div>
                   <h3>Total Employee</h3>
                    </div>
                </div>


                <br>

                <table  class="table  table-bordered table-hover"  style="width:100%;font-size: 15px;">

                    <thead>
                        <tr>
                        
                            <th>Company Name</th>        
                            <th>Total Employee</th>
                       

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                      
                       
                            <td style="color:black">{{ $row->company }}</td>
                           
                            <td style="color:black">{{ $row->total }}</td>
                         
                        </tr>
                        @endforeach
                    </tbody>

                </table>
             
            </form>
        </div>

    </section>

</section>
        </div>
    </main>
</div>
