<?php
session_start();
include('XMLToArrayFlat.php');
include('create_session.php');
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
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementById("searchResults").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","search_hotel.php?city="+city+"&rooms="+rooms+"&checkin="+checkin+"&checkout="+checkout+"&adults="+adults+"&children="+children+"&budget="+budget,true);
    xmlhttp.send();
}
</script>
</head
<body>
    <form>
        City: <input type="text" name="city" id="city" size="20" />
        No. of Rooms: <input type="text" name="rooms" id="rooms" size="20" />
        Check In Data: <input type="text" name="checkin" id="checkin" size="20" />
        Check Out Date: <input type="text" name="checkout" id="checkout" size="20" />
        Adults: <input type="text" name="adults" id="adults" size="20" />
        Children: <input type="text" name="children" id="children" size="20" />
        Budget: <input type="text" name="budget" id="budget" size="20" />

        <input type="button" name="Search" value="Search" onclick="searchHotels()"/>
    </form>

    <div id="searchResults"></div>

</body>
</html>