<?php
 
// https://www.yelp.com/dataset


// Main Url https://api.yelp.com/v3/businesses/
// Search Terms search?term=movers
// Location &location=Florida+NY+United+States
// Limit Per Request &limit=50
//Requested Category &categories=movers
// Page Number &offset=0 


function companiesList ($offset) {

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.yelp.com/v3/businesses/search?term=movers&location=Florida+NY+United+States&limit=50&categories=movers&offset='.$offset,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 2,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer Token Goes Here'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

 
$total = json_decode($response)->total;

$alinan =  json_decode($response)->businesses;

$data =  json_decode($response)->businesses;

$alinan = count($alinan);
 
 
if ($alinan != $total) {

   $artir = $offset+50;
   
  companiesList($artir);
  
} else {

  return "Thats All";
  
}



}


moversList(0);


 
