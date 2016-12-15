## Artist Search Page Instructions
In order to run this widget you must have php installed on your system, either to run through
an active instance of a web server or stand alone.  If you are running it stand alone you can
use the search widget by navigating in a terminal to the directory where you have unzipped the
archive and typing:

```bash
php -S 127.0.0.1:80
```

PHP's integrated web server should run.  You can then open any web browser and navigate to
127.0.0.1 and the search widget should load.

## Architecture
The application itself is built as an angular web app with a simple php script behind.  It is
referencing the angular1 javascript framework and bootstrap css framework via content delivery
networks to prevent having to include them directly with the widget.  If you intend to run
the widget from a computer disconnected from the internet you would first need to download the
angular and bootstrap libraries and fix the references to them within the HTML.

The PHP script, getArtists.php, takes a single parameter via url query string q.  This parameter
is then sent on to Spotify's search api which returns 50 results in json form, the image, name,
url, genre, and popularity parameters are then extracted from the json object and returned as a new json array.

The javascript is creating an angular controller, which in turn is managing a json request and 
it's callback, populating the page with the artist information retreived, by default the artists
are sorted by name and then popularity, however I have also included two buttons that allow you
to control the sort order. 