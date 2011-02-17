<?php
function discount30_session(){
    $postdata = http_build_query(
        array(
            'xml_req' => '<?xml version="1.0"?><magic><login><portal>disc30</portal><rkey>eCQD785EICEpWXJ14uqm9PDHxhNHrIa3T3bDH0kT9ncSDm45bYuP3pVwrgub5iv5</rkey><akey>QSN5S9Gffdtn2oTyq7XLuOSVSNJnunsr</akey><ref_ip>127.0.0.1</ref_ip></login></magic>'
        )
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    $context  = stream_context_create($opts);
    $result = file_get_contents('http://174.122.153.218/connect/getSession.php', false, $context);

    $xml = simplexml_load_string($result);
    $xmlarray = array();
    XMLToArrayFlat($xml, $xmlarray, '',true);
    $user_session = null;
    foreach($xmlarray as $key=>$value){
        $substr = stristr($key, 'mr_session');
        if(!empty($substr)){
            $user_session = $value;
            break;
        }
    }
    return $user_session;
}
?>