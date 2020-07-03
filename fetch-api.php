<?php
 
 //API URL
 $url = "http://aimtell.com/files/sites.json";
 //Fetch URL Content
 $data = file_get_contents($url);
 $data  = json_decode($data);

 //Process the API Data and send to client
 $responce = [];
 foreach($data->sites as $sites) {
  $id = $sites->id;
  $name = $sites->name;
  $url = $sites->url;
  $responce[] = array("id" => $id, "name" => $name, "url" => $url);
 }
 $responce = json_encode($responce);
 print_r($responce);

?>