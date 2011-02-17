<?php
session_start();
include('XMLToArrayFlat.php');
include('create_session.php');
require_once('classes/tc_calendar.php');
?>

<?php
$_SESSION['user_session'] = discount30_session();
?>

<html>
<head>
<script type="text/javascript">
function searchHotels()
{
    var city = document.getElementById("city").value;
    var rooms = document.getElementById("rooms").value;
    var checkin = document.getElementById("checkin").value;
    var checkout = document.getElementById("checkout").value;
    alert(checkout);
    var adults = document.getElementById("adults").value;
    var children = document.getElementById("children").value;
    var budget = document.getElementById("budget").value;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
      alert(xmlhttp.readyState);
      alert(xmlhttp.status);
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementById("searchResults").innerHTML=xmlhttp.responseText;
        
      }
    }
    xmlhttp.open("GET","search_hotel.php?city="+city+"&rooms="+rooms+"&checkin="+checkin+"&checkout="+checkout+"&adults="+adults+"&children="+children+"&budget="+budget,true);
    xmlhttp.send();
}
</script>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar.js"></script>

</head
<body>

<div class="header">
  <img src="images/logo.jpg" />
</div>

<div class="title_bar">
 <a href="index.xhtml" class="red_link">Hotel Search</a> | <a href="my_booking.xhtml" class="black_link">My Booking</a>
</div>

<div class="field_box">
    <form>
       <div class="column1">City: <select name="city" id="city">
          <option value="bangalore">Bangalore</option>
          </select> 
       </div>
   
       <div class="column2">No. of rooms:<select name="rooms" id="rooms">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           </select>
       </div><br/><br/>
      
       <div class="column1">Check in date:<br/>
         <?php
	  $myCalendar = new tc_calendar("checkin", true, false);
	  $myCalendar->setIcon("images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("./");
	  $myCalendar->setYearInterval(2000, 2015);
	  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->writeScript();
	  ?>
       </div>
  
       <div class="column2">Check out date:<br/>
         <?php
	  $myCalendar = new tc_calendar("checkout", true, false);
	  $myCalendar->setIcon("images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("./");
	  $myCalendar->setYearInterval(2000, 2015);
	  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->writeScript();
	  ?>
       </div><br/><br/><br/><br/>
  
       <div class="column1">Adults<br/><select name="adults" id="adults">
           <option  value="1">1</option>
           <option  value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
         </select> 
       </div>

       <div class="column1" style="padding-left:10px;">Children<br/><select name="children" id="children">
   		<option value="0">0</option>
                <option  value="1">1</option>
                <option  value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            	</select> 
       </div>

       <div class="column2">Budget<br/><select name="budget" id="budget">
   		<option value="1000-1500">Rs.1000-1500</option>
                <option value="1500-2000">Rs.1500-2000</option>
		<option value="2000-2500">Rs.2000-2500</option>
 		<option value="2500-3000">Rs.2500-3000</option>
           	</select> 
       </div>
 	<br/><br/><br/>

        <input type="button" name="Search" value="Search" onclick="searchHotels()"/>

    </form>
 </div>

    <div id="searchResults" style="display:none;">
             <div id="column1"><span class="blue_text">1.Grand Hotel, Bangalore.</span></div>
        <div class="column1"><span class="text">Room Type: Single</span></div>
        <div class="column2"><span class="text">Price: <strike>1500</strike>/<span class="text_red">1000</span></span></div><br/>
        <div class="column1"><span class="text_bold">INCLUSION - Breakfast, Pickup</span></div>
        <div class="column2"><a href="hotel_info.xhtml"><img src="images/book_btn.png" border="0"/></a></div>
    </div>

</body>
</html>
