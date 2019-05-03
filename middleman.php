<?php
    
    
    //     Packix API Middle-man
    //
    //     A middle-man API written in PHP to securely connect to the Packix API
    //     without revealing your developer access key.
    //
    //     Packix API Documentation : https:gist.github.com/andrewwiik/e4f8a6141bbde4a6db34cba6fe128ea3
    //
    //     Copyright (c) 2019 Guillermo Moran
    //     gmoran.me
    
    
    
    $udid = $_POST["UDID"];
    $modelID = $_POST["modelID"];
    $packageID = $_POST["packageID"];
    $developerAccessKey = '00000'; //never post your access key to the server!
    
    
    //API URL
    $url = 'https://repo.packix.com/api/drm/check';
    
    //create a new cURL resource
    $ch = curl_init($url);
    
    //setup request to send json via POST
    $data = array(
                  'udid' => $udid,
                  'model' => $modelID,
                  'identifier' => $packageID,
                  'token' => $developerAccessKey
                  );
    $payload = json_encode(array("user" => $data));
    
    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    
    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    //execute the POST request
    $result = curl_exec($ch);
    
    //close cURL resource
    curl_close($ch);
    
    return $result;
    
?>
