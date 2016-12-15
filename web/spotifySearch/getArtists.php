<?php //https://api.spotify.com/v1/search?type=artist&q=[query]

//first we will declare a class to use later that defines the information we are looking to get out of spotify
class Artist {
    public $image;
    public $name;
    public $url;
    public $popularity;
    public $genres;
    
    function __construct($name, $url, $image, $popularity, $genres) {
        $this->image = $image;
        $this->name = $name;
        $this->url = $url;
        $this->popularity = $popularity;
        $this->genres = $genres;
    }
}

try {
//get query string
$query = $_GET['q'];
//urlencode the query
$cleanquery = urlencode($query);
//build request url
$jsonurl = "https://api.spotify.com/v1/search?type=artist&limit=50&q=" . $cleanquery;
//get the response from spotify
$response = json_decode(file_get_contents($jsonurl));
//format response for sending to browser

//this array will hold Artist objects for later conversion to json
$artists = array();
foreach ($response->artists->items as $artist) {
    $image = end($artist->images);
    if(empty($image)) {
        $image = new stdClass();
        $image->url = "no-image.png";
    }
    $artists[] = new Artist( $artist->name,
                        $artist->external_urls->spotify,
                        $image->url,
                        $artist->popularity,
                        $artist->genres
                        );
}
//json encode response and return
echo json_encode($artists);
} catch(Exception $e) {
    echo $e->getMessage();
}
?>