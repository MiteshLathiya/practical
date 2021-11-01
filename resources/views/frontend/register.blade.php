<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Employee Register</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="{{ asset('style/frontend/') }}/form/form.css">
    <script src='main.js'></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(function() {
    $("#birthdate").datepicker({
    onSelect: function(value, ui) {
        var today = new Date(),
            age = today.getFullYear() - ui.selectedYear;
        $('#age').val(age);
    },
       
    dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
    });
      
});
    </script>
    <script>
      window.setTimeout(function() {
          $("div.alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 4000);
      </script>
</head>
<body>
  
    <!------ Include the above in your HEAD tag ---------->
    
    <div class="container contact-form">
      <br>
      <section class="breadcrumb-section">
  <h2 class="sr-only">Site Breadcrumb</h2>
  <div class="container">
      <div class="breadcrumb-contents">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
                  <li class="breadcrumb-item active">Employee Register</li>
              </ol>
          </nav>
      </div>
  </div>
</section>
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


                <form action="{{ ('/Register/User') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h3>Employee Register</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Firstname</label>
                          <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control" id="inputEmail4" placeholder="Email">
                        
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Lastname</label>
                          <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control" id="inputPassword4" placeholder="Password">
                        
                        </div>
                    </div>
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">DOB</label>
                      <input type="text" id="birthdate" value="{{ old('birthdate') }}" class="form-control" name="birthdate">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Age</label>
    <input type="text" name="age" id="age" class="form-control" value="{{ old('age') }}" style="border: none;background-color: white;" readonly/>
  </div>
</div>
<div class="form-row">
 
  <div class="form-group col-md-6">
    <label for="inputPassword4">Contact</label>
    <input type="number" name="mobile" value="{{ old('mobile') }}"  class="form-control" id="inputPassword4" placeholder="Contact">
  </div>
</div>
                  
                
                    <div class="form-row">
                      <div class="form-group col-md-2">
                        <label for="inputCity">Gender</label>
                      </div>
      
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio"  value="Male" name="gender" id="inlineRadio1"  @if(old('gender') == 'Male') checked @endif>
                          <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio"  name="gender" value="Female" id="inlineRadio2" @if(old('gender') == 'Female') checked @endif>
                          <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                      </div>
                    </div>
                    
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="inputCity">
                      </div>
                   
                    
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputState">Company</label>
                        <select name="company" value="{{ old('company') }}" id="inputState" class="form-control">
                          <option value="" selected>Choose...</option>
                          @foreach ($data as $data1)
                          <option value="{{ $data1->name }}" {{ old('company') == "$data1->name" ? 'selected' : '' }}>{{ $data1->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail4" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-row">
                      <label for="inputPassword4">Image</label>
                      <input type="file" name="image" class="form-control" id="inputPassword4" placeholder="Image">
                    </div>
                   <br>
               <center>  <input type="submit" class="btn btn-primary"></center> 
                  </form>
    </div> 
</body>
</html>