<?php require 'resources/connect.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection"/>
<title>Untitled Document</title>
</head>
<body>
<div class="page-wrap">
<div class="formElement">
    <form class="" action="" method="post" >
<input type="text" class="datepicker" id="from" name="arr_date" required>
<label for="arr_date">Arrival Date</label>

<input type="text" class="datepicker" id="to" name="dep_date" required>
<label for="dep_date">Depature Date</label></br>
<input name="book" type="submit" class="button" id="book" value="Book" />
  </form>
  <script src="assets/js/jqueryui.js"></script> 
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
    </div>
    </div>
</body>
</html>
