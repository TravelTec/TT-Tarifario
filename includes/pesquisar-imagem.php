<?php
 header("Access-Control-Allow-Origin: *");
  function get_content($URL){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $URL);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
}

$html = get_content("https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photo_reference=".$_POST['reference']."&key=AIzaSyByd6tlTD9IkHnbz0eYd1FuIVxF7j8YlpE");

//Instantiate the DOMDocument class.
$htmlDom = new DOMDocument;

//Parse the HTML of the page using DOMDocument::loadHTML
@$htmlDom->loadHTML($html);

//Extract the links from the HTML.
$links = $htmlDom->getElementsByTagName('a');

//Array that will contain our extracted links.
$extractedLinks = array();

//Loop through the DOMNodeList.
//We can do this because the DOMNodeList object is traversable.
foreach($links as $link){

    //Get the link text.
    $linkText = $link->nodeValue;
    //Get the link in the href attribute.
    $linkHref = $link->getAttribute('href');

    //If the link is empty, skip it and don't
    //add it to our $extractedLinks array
    if(strlen(trim($linkHref)) == 0){
        continue;
    }

    //Skip if it is a hashtag / anchor link.
    if($linkHref[0] == '#'){
        continue;
    }

    //Add the link to our $extractedLinks array.
    $extractedLinks[] = array(
        'text' => $linkText,
        'href' => $linkHref
    );

}

echo $extractedLinks[0]["href"];
?>