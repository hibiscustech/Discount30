<?php
    function discount30_verify_session($existing_session){
        $sessiondata = http_build_query(
            array(
                'xml_req' => '<?xml version="1.0"?><magic><login><mr_session>'.$existing_session.'</mr_session><rkey>eCQD785EICEpWXJ14uqm9PDHxhNHrIa3T3bDH0kT9ncSDm45bYuP3pVwrgub5iv5</rkey></login></magic>'
            )
        );
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $sessiondata
                 )
        );
        $context  = stream_context_create($opts);
        $result = file_get_contents('http://174.122.153.218/connect/getSessionStatus.php', false, $context);

        $xml = simplexml_load_string($result);
        $xmlarray = array();
        XMLToArrayFlat($xml, $xmlarray, '',true);
        $verify_session = null;
        foreach($xmlarray as $key=>$value){
            $substr = stristr($key, 'mr_session');
            if(!empty($substr)){
                $verify_session = $value;
                break;
            }
        }
        if($verify_session == $existing_session)
            return true;
        else
            return false;
    }
?>