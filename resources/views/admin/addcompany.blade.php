@extends('admin.master')
@include('admin.header')
@include('admin.sidebar')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    window.setTimeout(function() {
        $("div.alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
    </script>
<div id="layoutSidenav_content">
    <main>
        
        <div class="container-fluid px-4"><br><br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('success'))
      <div class="alert alert-success" style="font-size: 16px;">
          <center>{{ session()->get('success') }}<center>
      </div>
      @endif
                <form action="{{ ('/Dashboard/AddCompany') }}" style="margin-left: 70px" method="post" enctype="multipart/form-data">
                  @csrf
                  <h3>Add Company</h3><br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Company Name</label>
                          <input type="text" name="company" value="{{ old('company') }}" class="form-control" id="inputEmail4" placeholder="Company">
                        
                        </div>
                       
                    </div>
                    
               <br>    
<div class="form-row">
 
  <div class="form-group col-md-6">
    <label for="inputPassword4">Address</label>
    <textarea class="form-control" name="address">
    </textarea>
  </div>
</div>
                  
                <br>
                    
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="inputCity">
                      </div>
                   
                    
                    </div>
                    <br>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Zip Code</label>
                        <input type="number" name="zip" value="{{ old('zip') }}" class="form-control" id="inputEmail4" placeholder="Email">
                      </div>
                      
                    </div>
                    <br>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Contact</label>
                        <input type="number" value="{{ old('mobile') }}" name="mobile" class="form-control" id="inputPassword4" placeholder="Contact">
                      </div>
                    </div>
                   <br>
               <center>  <input type="submit" class="btn btn-primary"></center> 
                  </form>
                  <br>
                </main>
</div>
</div>
   