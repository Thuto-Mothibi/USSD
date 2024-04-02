<?php
//Read varibles sent via post from the gateway
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];

if($text == ""){
// This is the first request > NB:How I start the response with  CON

    $response = "CON What would you want to check \n";
    $response .= "1. My Account Number \n";
    $response .= "2. My Phone Number \n";
}

else if ($text == "1"){
    //Business logic for the first level response
    $response = "CON Choose Account Information You Want To View \n";
    $response .= "1. My Account Number \n";
    $response .= "2. My Account Balance \n";
}

else if ($text == "2"){
    //Business logic for the first level response
    //This is a terminal response > NB:How I start with END
    $response = "END Your Phone Number Is ".$phoneNumber;
}

else if ($text == "1*1"){
    //This is second level response, where the user had selected 1 in the first instance
    $accountNumber = "ACC1001";

    //This is a terminal response > NB:How I start with END
    $response = "END Your Account Number Is ".$accountNumber;
}

else if ($text == "1*2"){
    //This is second level response, where the user had selected 1 in the first instance
    $balance = "BWP 10,000";

    //This is a terminal response > NB:How I start with END
    $response = "END Your Account Balance Is ".$balance;  
} 

//Echo the responseo the API. The response depends on the statement that is fulfilledin each instance.
header("Content-type; text/plain");
echo $response;
?>