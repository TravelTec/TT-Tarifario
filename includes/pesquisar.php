<?php
header("Access-Control-Allow-Origin: *");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/textsearch/json?query=beaches%20in%20Fortaleza%2C%20Brasil&language=pt&key=AIzaSyByd6tlTD9IkHnbz0eYd1FuIVxF7j8YlpE",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET", 
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 21ceb662-83b7-8bbe-2032-653f76988cea"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $dados = json_decode($response, true);
    for ($i=0; $i < count($dados["results"]); $i++) { 
      $valor = $dados["results"][$i]; 
        
        $tipos = "";
        for ($x=0; $x < count($valor["types"]); $x++) { 
          $tipo = $valor["types"][$x];
          if ($tipo == "natural_feature") {
            $tipos .= "Praia, ";
          }
          if ($tipo == "establishment") {
            $tipos .= "Estabelecimento, ";
          }
          if ($tipo == "tourist_attraction") {
            $tipos .= "Atração turística, ";
          }
          if ($tipo == "point_of_interest") {
            $tipos .= "Ponto de interesse, ";
          }
          if ($tipo == "amusement_park") {
            $tipos .= "Parque, ";
          }
          if ($tipo == "store") {
            $tipos .= "Loja, ";
          }
          if ($tipo == "restaurant") {
            $tipos .= "Restaurante, ";
          }
          if ($tipo == "bar") {
            $tipos .= "Bar, ";
          }
          if ($tipo == "food") {
            $tipos .= "Comida, ";
          } 
        }

        $stars = $valor["rating"];
        if ($stars < 1) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i>";
        }else if ($stars > 1 && $stars <= 1.6) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star-half' style='color:#fbbc04;font-size: 10px;'></i>";
        }else if ($stars > 1.6 && $stars <= 2) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i>";
        }else if ($stars > 2 && $stars <= 2.6) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star-half' style='color:#fbbc04;font-size: 10px;'></i>";
        }else if ($stars > 2.6 && $stars <= 3) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i>";
        }else if ($stars > 3 && $stars <= 3.6) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star-half' style='color:#fbbc04;font-size: 10px;'></i>";
        }else if ($stars > 3.6 && $stars <= 4) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i>";
        }else if ($stars > 4 && $stars <= 4.6) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star-half' style='color:#fbbc04;font-size: 10px;'></i>";
        }else if ($stars > 4.6 && $stars <= 5) {
          $estrelas = "<i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i><i class='fa fa-star' style='color:#fbbc04;font-size: 10px;'></i>";
        }

        $retorno[] = array($valor["name"], floatval(number_format($valor["geometry"]["location"]["lat"], 6, ".", "")), floatval(number_format($valor["geometry"]["location"]["lng"], 6, ".", "")), intval($i), $valor["place_id"], $valor["rating"], $valor["user_ratings_total"], $tipos, $estrelas, $valor["photos"][0]["photo_reference"]); 
    }
    echo json_encode($retorno);
}











