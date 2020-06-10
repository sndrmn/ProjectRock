
<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP-Testing
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
                include("mongo.php");
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
                  $url = "169.254.169.254";
                  include("metadata.php");
                  $test = new metadata();
                  $test->metadata_query($url);
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
