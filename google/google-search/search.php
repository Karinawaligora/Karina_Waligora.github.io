<?php
$cities = file_get_contents("C:\Apache24\htdocs\cities.json", true);
$json = json_decode($cities);
$results = array();
if(!array_key_exists('name', $_GET)) {
    echo json_encode([]);
    return;
}
else{
    foreach($json as $value){
        if ( is_numeric(stripos($value->name, htmlspecialchars($_GET["name"])))){
        array_push($results, $value);
    }
}
}
$jsonResults = json_encode($results);
echo $jsonResults;
?>
