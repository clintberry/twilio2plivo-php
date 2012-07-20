<?php


require('../Twilio.php');


$account_sid = "ACXXXXXX"; // Your Twil... no, your Plivo account id account sid
$auth_token = "YYYYYY"; // Your Plivo auth token

$client = new Services_Twilio($account_sid, $auth_token);
$call = $client->account->calls->create(
  '+14085551234', 
  '+12125551234',

  // Read TwiML at this URL when a call connects (hold music)
  // Make sure you are including the twilio2plivo helper library at this url as well
  'http://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient'
);

// At the response location, this code will actually generate PlivoXML

$response = new Services_Twilio_Twiml();
$response->say('Hello');
$response->play('https://api.twilio.com/cowbell.mp3', array("loop" => 5));
print $response;