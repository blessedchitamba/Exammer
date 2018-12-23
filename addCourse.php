<!DOCTYPE html>
<html>
 <head>
  <title>Add Courses</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
 <body>
  <br /><br />
  <div class = "container-fluid">
      <div class = "row">
          <div class = "col-md-4 col-sm-4 col-xs-12"></div>
          <div class = "col-md-4 col-sm-4 col-xs-12">
             <h2 align="center">Pick courses to add</h2>
             <br /><br />
             <form method="post" id="framework_form">
              <div class="form-group">
               <select id="framework" name="framework[]" multiple class="form-control" >
                <option value="Codeigniter">Codeigniter</option>
                <option value="CakePHP">CakePHP</option>
                <option value="Laravel">Laravel</option>
                <option value="YII">YII</option>
                <option value="Zend">Zend</option>
                <option value="Symfony">Symfony</option>
                <option value="Phalcon">Phalcon</option>
                <option value="Slim">Slim</option>
               </select>
              </div>
              <div class="form-group">
               <input type="submit" class="btn btn-info" name="submit" value="Submit" />
              </div>
             </form>
            <br />
          </div>
          <div class = "col-md-4 col-sm-4 col-xs-12"></div>
      </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Framework',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 $('#framework_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#framework option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#framework').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>

