<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>PROJECT ROCK</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="shortcut icon" href="images/favicon.ico"> 
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <div class="logo">
                <span class="icon fa-gem"></span>
            </div>
            <div class="content">
                <div class="inner">
                    <h1>Be humble Be Hungry <br>And always be the hardest <br> worker in the room</h1>
                    <p>Dwayne 'The Rock' Johnson </p>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#therock">THE ROCK</a></li>
                    <li><a href="#movies">Movies</a></li>
                    <li>
                        <a href="#Metadata">Metadata</a>
                    </li>
                    <!--<li><a href="#elements">Elements</a></li>-->
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div id="main">

            <!-- therock -->
            <article id="therock">
                <h2 class="major">The Rock</h2>

                <iframe
                width="560"
                height="315"
                src="https://www.youtube.com/embed/24fdcMw0Bj0"
                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/24fdcMw0Bj0?autoplay=1><img src=https://img.youtube.com/vi/24fdcMw0Bj0/hqdefault.jpg alt='The Rock's Ultimate Workout'><span>▶</span></a>"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                title="The Rock's Ultimate Workout"
                ></iframe>

                <br><br>Click this <a href="https://en.wikipedia.org/wiki/Dwayne_Johnson">link</a> to read up about Dwayne "The Rock" Johnson.
            </article>

            <!-- movies -->
            <article id="movies">
                <h2 class="major">Rock Movies</h2>
                <span class="image main"><img src="images/movies.jpg" alt="" /></span>

                <?php
                if(isset($_POST['Year2'])) { 
                    $user = getenv('MONGOUSER');
                    $pass = getenv('MONGOPASS');
                    $mongo = new MongoDB\Driver\Manager("mongodb://$user:$pass@mongodb.vmware.education:27017/RockMovies");
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
                    $user = getenv('MONGOUSER');
                    $pass = getenv('MONGOPASS');
                    $mongo = new MongoDB\Driver\Manager("mongodb://$user:$pass@mongodb.vmware.education:27017/RockMovies");
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
                <br><br>
                <form method="post"> 
                    <input type="text" name="Year" value=""/> 
                    <input type="submit" name="Year2" value="submit: Movie Year">
                    <br><br>
                    <input type="text" name="Title" value=""/> 
                    <input type="submit" name="Title2" value="submit: Movie Title">
                </form> 

            </article>

            <!-- Metadata-->
            <article id="Metadata">
                <h2 class="major">Metadata</h2>
                <span class="image main"><img src="images/therock2.jpg" alt="" /></span>
                <p>
                    <?php
				    $location = exec("curl -H Metadata:true \"http://169.254.169.254/metadata/instance/compute/location?api-version=2019-03-11&format=text\"");
					if ($location == 'southeastasia'){
						$name = exec("curl -H Metadata:true \"http://169.254.169.254/metadata/instance/compute/name?api-version=2017-08-01&format=text\"");
						$public_ip = exec("curl -H Metadata:true \"http://169.254.169.254/metadata/instance/network/interface/0/ipv4/ipAddress/0/publicIpAddress?api-version=2017-08-01&format=text\"");
					    $private_ip = exec("curl -H Metadata:true \"http://169.254.169.254/metadata/instance/network/interface/0/ipv4/ipAddress/0/privateIpAddress?api-version=2017-08-01&format=text\"");
						$rgname = exec("curl -H Metadata:true \"http://169.254.169.254/metadata/instance/compute/resourceGroupName?api-version=2017-08-01&format=text\"");
						$server_software = $_SERVER['SERVER_SOFTWARE'];
						$client_ip = $_SERVER['REMOTE_ADDR'];
						echo nl2br("<strong>This VM is running in Azure</strong> \n\n <strong>VM Name:</strong> \n$name \n\n <strong>Location:</strong> \n$location \n\n <strong>Public IP:</strong> \n$public_ip \n\n<strong>PRIVATE IP:</strong> \n$private_ip \n\n <strong>RESOURCE GROUP:</strong> \n$rgname \n\n<strong>SERVER SOFTWARE:</strong> \n$server_software\n\n<strong>ClIENT IP:</strong> \n$client_ip");
					} else {
						$instance_id = exec("curl http://169.254.169.254/latest/meta-data/instance-id");
						$reg_az = exec("curl http://169.254.169.254/latest/meta-data/placement/availability-zone/");
	                    $public_hostname = exec("curl http://169.254.169.254/latest/meta-data/public-hostname/");
	                    $public_ipv4 = exec("curl http://169.254.169.254/latest/meta-data/public-ipv4/");
	                    $local_hostname = exec("curl http://169.254.169.254/latest/meta-data/local-hostname/");
	                    $local_ipv4 = exec("curl http://169.254.169.254/latest/meta-data/local-ipv4/");
	                    $server_software = $_SERVER['SERVER_SOFTWARE'];
	                    $client_ip = $_SERVER['REMOTE_ADDR'];
	                    echo nl2br("<strong>This VM is running in AWS</strong> \n\n <strong> INSTANCE ID:</strong> \n$instance_id \n\n<strong>AVAILABILITY ZONE:</strong> \n$reg_az \n\n<strong>PUBLIC HOSTNAME:</strong> \n$public_hostname \n\n<strong>PUBLIC IP:</strong> \n$public_ipv4 \n\n<strong>LOCAL HOSTNAME:</strong> \n$local_hostname \n\n<strong>PRIVATE IP:</strong> \n$local_ipv4 \n\n<strong>SERVER SOFTWARE:</strong> \n$server_software \n\n<strong>ClIENT IP:</strong> \n$client_ip");
					}
                ?>
                </p>
            </article>
        </div>
        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer>
    </div>

    <!-- BG -->
    <div id="bg"></div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>