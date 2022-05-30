<?php
    function send_sms($msg, $num)
    {
        $auth_basic = base64_encode("info@agricconnect.org:Greatminds1@");

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.labsmobile.com/json/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => '{"message": "'.$msg.'", "tpoa":"Sender","recipient":[{"msisdn": "+'.$num.'"}]}',
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic ".$auth_basic,
            "Cache-Control: no-cache",
            "Content-Type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }
?>