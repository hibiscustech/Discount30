<?php
session_start();
include('XMLToArrayFlat.php');
include('verify_session.php');
?>

<?php
$city = $_GET["city"];
$rooms = $_GET["rooms"];
$checkin = $_GET["checkin"];
$checkout = $_GET["checkout"];
$adults = $_GET["adults"];
$children = $_GET["children"];
$budget = $_GET["budget"];

$response = null;
$verification = discount30_verify_session($_SESSION['user_session']);
if($verification == "1" || $verification == 1){
    /*
    $search_data = http_build_query(
            array(
                'xml_req' => '<?xml version="1.0"?><magic><login><mr_session>'.$_SESSION['user_session'].'</mr_session><rkey>eCQD785EICEpWXJ14uqm9PDHxhNHrIa3T3bDH0kT9ncSDm45bYuP3pVwrgub5iv5</rkey></login><search_n_avail_req><search_q><by_name>Bangalore</by_name></search_q><room_count>1</room_count><avail_from>2011-03-01</avail_from><avail_to>2011-03-03</avail_to><adults>2</adults><childs>0</childs><get_rooms>1</get_rooms><get_price>1</get_price><options><activities>1</activities><amenities>1</amenities><route_map>1</route_map><images>1</images><room_types><details>1</details><image>1</image></room_types><packages><details>1</details><image>1</image></packages></options><use_caching>0</use_caching></search_n_avail_req></magic>'
            )
    );
    $opts = array('http' =>
        array(
             'method'  => 'POST',
             'header'  => 'Content-type: application/x-www-form-urlencoded',
             'content' => $search_data
             )
    );
    $context  = stream_context_create($opts);
    $result = file_get_contents('http://174.122.153.218/connect/getAvailableHotelsWithRates.php', false, $context);
    echo '<br>'.$result;
    $xml = simplexml_load_string($result);
    echo '<br>'.$xml;
     *
     */
    $response = "City: ".$city."<br/>"."Rooms: ".$rooms."<br/>"."Check In: ".$checkin."<br/>"."Checkout: ".$checkout."<br/>"."Adults: ".$adults."<br/>"."Children: ".$children."<br/>"."Budget: ".$budget;
}
 else {
    $response = "Session Expired";
}
echo $response;

?>