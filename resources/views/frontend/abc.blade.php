<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Display month & year menus</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
 $(function() {
    $("#nu_datebirth").datepicker({
    onSelect: function(value, ui) {
        var today = new Date(),
            age = today.getFullYear() - ui.selectedYear;
        $('#a_ge').val(age);
    },
       
    dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
    });
      
});
  </script>
</head>
<body>
   
<p>Dob: <input type="text" id="nu_datebirth" name="nu_datebirth"></p>
<p>Age: <input type="text" name="a_ge" id="a_ge" class="nu_field" readonly/></p>
   
   
</body>
</html>