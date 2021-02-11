<?php
  $ep = "windowsmongodb.vmware.education";
  $db = "prod";
  $un = "projectrockread";
  $pa = "readme123#";

  $conn = new PDO("sqlsrv:server = tcp:$ep,1433; Database = $db", "$un", "$pa");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $result_str = strtoupper($ep);  
  
  if(isset($_POST['Year2'])) { 
   $temp = $_REQUEST['Year'];
   $tableName = 'DBData';
   $query = "SELECT * FROM $tableName WHERE Year like $temp";
   $stmt = $conn->query($query);
   $result = $stmt-> fetchAll();
	
   foreach( $result as $row ) {
	 $temp2 = substr($row[IMBDBRating],0,3);
	 $temp3 = substr($row[ReleaseDate],0,10);
	 echo nl2br("\n<strong>Year: </strong>" . $row[Year] . "<br>" . 
        "<strong>Title: </strong>" . $row[Title] . "<br>" . 
        "<strong>URL: </strong> <a href=\"" . $row[URL] . "\">" . $row[URL] . "</a><br>" .
        "<strong>Title Type: </strong>" . $row[TitleType] . "<br>" . 
        "<strong>IMDB Rating: </strong>" . $temp2 . "<br>" . 
        "<strong>Run Time: </strong>" . $row[Runtime] . "<br>" . 
        "<strong>Genres: </strong>" . $row[Genres] . "<br>" . 
        "<strong>Release Date: </strong>" . $temp3 . "<br>" . 
        "<strong>Director(s): </strong>" . $row[Directors] . "\n");
        }
   }
  
  if(isset($_POST['Title2'])) { 
   $temp = $_REQUEST['Title'] . '%';
   $tableName = 'DBData';
   $query = "SELECT * FROM $tableName WHERE Title like '$temp'";
   $stmt = $conn->query($query);
   $result = $stmt-> fetchAll();
	
   foreach( $result as $row ) {
	 $temp2 = substr($row[IMBDBRating],0,3);
	 $temp3 = substr($row[ReleaseDate],0,10);
	 echo nl2br("\n<strong>Year: </strong>" . $row[Year] . "<br>" . 
        "<strong>Title: </strong>" . $row[Title] . "<br>" . 
        "<strong>URL: </strong> <a href=\"" . $row[URL] . "\">" . $row[URL] . "</a><br>" .
        "<strong>Title Type: </strong>" . $row[TitleType] . "<br>" . 
        "<strong>IMDB Rating: </strong>" . $temp2 . "<br>" . 
        "<strong>Run Time: </strong>" . $row[Runtime] . "<br>" . 
        "<strong>Genres: </strong>" . $row[Genres] . "<br>" . 
        "<strong>Release Date: </strong>" . $temp3 . "<br>" . 
        "<strong>Director(s): </strong>" . $row[Directors] . "\n");
        }
  }
?> 