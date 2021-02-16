<?php
    $user = getenv('MONGOUSER');
    $pass = getenv('MONGOPASS');
    $mongo = new MongoDB\Driver\Command("mongodb://$user:$pass@mongodb.vmware.education:27017/RockMovies");

    if(isset($_POST['Year2'])) { 
        $filter = [ 'Year' => $_REQUEST['Year'] ];
        $query = new MongoDB\Driver\Query($filter);
        $res = $mongo->executeQuery("RockMovies.movies", $query);
        $movie = $res->toArray();

    foreach ($movie as $mov) {
        echo nl2br("\n<strong>Year: </strong>" . $mov->Year . "<br>" . 
        "<strong>Title: </strong>" . $mov->Title . "<br>" . 
        "<strong>URL: </strong> <a href=\"" . $mov->URL . "\">" . $mov->URL . "</a><br>" .
        "<strong>Title Type: </strong>" . $mov->TitleType . "<br>" . 
        "<strong>IMDB Rating: </strong>" . $mov->IMDbRating . "<br>" . 
        "<strong>Run Time: </strong>" . $mov->Runtime . "<br>" . 
        "<strong>Genres: </strong>" . $mov->Genres . "<br>" . 
        "<strong>Release Date: </strong>" . $mov->ReleaseDate . "<br>" . 
        "<strong>Director(s): </strong>" . $mov->Directors . "\n");
        }
    } 
    if(isset($_POST['Title2'])) { 
        $new = '^'.$_REQUEST['Title'];
        $query = new MongoDB\Driver\Query( array('Title' => new MongoDB\BSON\Regex( $new, 'i' ) ) );
        $res = $mongo->executeQuery("RockMovies.movies", $query);
        $movie = $res->toArray();

    foreach ($movie as $mov) {
        echo nl2br("\n<strong>Title: </strong>" . $mov->Title. "<br>" . 
        "<strong>Year: </strong>" . $mov->Year . "<br>" . 
        "<strong>URL: </strong> <a href=\"" . $mov->URL . "\">" . $mov->URL . "</a><br>" .
        "<strong>Title Type: </strong>" . $mov->TitleType . "<br>" . 
        "<strong>IMDB Rating: </strong>" . $mov->IMDbRating . "<br>" . 
        "<strong>Run Time: </strong>" . $mov->Runtime . "<br>" . 
        "<strong>Genres: </strong>" . $mov->Genres . "<br>" . 
        "<strong>Release Date: </strong>" . $mov->ReleaseDate . "<br>" . 
        "<strong>Director(s): </strong>" . $mov->Directors . "\n");
        } 
    }
?> 