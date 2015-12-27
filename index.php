<?php
session_start();
set_time_limit (0);
if(isset($_GET["video"]))
{
require_once('stream.php');
stream($_GET["video"]);
}
else
{
auth();
showVideos();
}

function auth()
{
  if(isset($_SESSION['key']))
  {
  //  showVideos();
  }
  else
  {
    if(isset($_POST['key'])&&$_POST['key']=="1100")
      $_SESSION['key']="1100";
    else {
      {require("login.php");
      die();
    }
    }
  }
}

function showVideos()
  {
echo<<<EOT

          <head>

          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>3 Col Portfolio - Start Bootstrap Template</title>

          <!-- Bootstrap Core CSS -->
          <link href="css/bootstrap.min.css" rel="stylesheet">

          <!-- Custom CSS -->
          <link href="css/3-col-portfolio.css" rel="stylesheet">

          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

          <!-- WARNING: Respond.js does not work if you view the page via file:// -->
          <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->



          </head>

          <body>

          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
              <div class="navbar-header">
                  <a class="navbar-brand" href="logout.php">Logout</a>
              </div>
          </div>
          </nav>

          <!-- Page Content -->
          <div class="container">

              <!-- Page Header -->
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">شقي عمري
                          <small>الكبير</small>
                      </h1>
                  </div>
              </div>

              <div class="row">
EOT;
      $filename;
      $di = new RecursiveDirectoryIterator('D:\honda\groovemixer\songs');
      require_once('C:\xampp2\htdocs\getID3-1.9.10\getid3\getid3.php');
      foreach (new RecursiveIteratorIterator($di) as $filename => $file)
      {

      $path_parts = pathinfo($filename);
      $file_name  = $path_parts['basename'];
      $file_ext   = $path_parts['extension'];
      if(is_dir ( $filename )||$file_ext=="txt"||$file_ext=="jpg"){continue;}
      //$getID3 = new getID3;
      //$ThisFileInfo = $getID3->analyze($filename);


echo<<<EOT
      <div class="col-md-4 portfolio-item">
EOT;
      $imagelink='src\\'.$file_name.'.jpg';
      echo"<a href=\"index.php?video=$filename\">";
      echo"<img class=\"img-responsive\" src=\"$imagelink\" alt=\"\">";
      echo"</a><h3>";
      //  $file_name=strstr($file_name,".",true);
      echo"<a href=\"index.php?video=$filename\">$file_name</a>";
      echo"</h3></div><br>";
      }
}
  ?>
