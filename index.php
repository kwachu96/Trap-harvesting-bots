<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Trap for harvesting bots</title>
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <div class="page-header">
      <h1>Trap for harvesting bots</h1>
    </div>
    <div class="wrap"></div>
    <div class="container">
      <h3>What is this</h3>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <p>
            It's a simple website to catch bots in traps which harvesting email addresses on websites.
          </p>
        </div>
      </div>
      <h3>How it's works</h3>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <p>
            Bots will be trapped in endless loop with e-mail addresses randomly generated. Bot's database will be useless. It's one of best ways to secure your e-mail address on website.
          </p>
        </div>
      </div>
      <h3>How to use it</h3>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <p>
            You can simply add this code on your page:
            <code>&lt;a href="<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].preg_replace("/(.*)\/(.*).php(.*)/", "$1",  $_SERVER['PHP_SELF']) ?>"&gt;&lt;/a&gt;</code>
            <br>
            This link will be hidden, but it will work against bots. Of course you can add your own text in links and mention about this project. You can download source of this page from GitHub (link in footer).
          </p>
        </div>
      </div>
      <div class="wrap2"></div>
      <div class="row">
        <?php
          $domainstld = array("com", "net",  "org", "biz", "gov", "info", "edu", "pl", "de", "fr", "us", "ru", "es", "se");
          $chars = "0123456789abcdefghijklmnopqrstuvwxyz";
          $x = 0;
          while($x <= 99){
            if ($x % 25 == 0) {
              echo "<div class='col-md-3 col-sm-6 col-xs-12'><div class='list-group'>\n";
            }
            $mail = "";
            for ($i = 1; $i <= mt_rand(5, 12); $i++) {
              $mail .= substr($chars, mt_rand(0, strlen($chars)), 1);
            }
            $mail .= "@";
            for ($i = 1; $i <= mt_rand(6, 18); $i++) {
              $mail .= substr($chars, mt_rand(0, strlen($chars)), 1);
            }
            $mail .= ".".$domainstld[mt_rand(0, (count($domainstld)-1))];
            echo "<a class='list-group-item' href=\"mailto:". $mail. "\">". $mail. "</a> \n";
            $x++;
            if ($x % 25 == 0) {
              echo "</div></div>\n";
            }
          }
          $random = "?";
          for ($i=0; $i < mt_rand(2, 5); $i++) { 
            $random .= substr($chars, mt_rand(0, strlen($chars)), 1);
          }
          $random .= "=";
          for ($i=0; $i < mt_rand(4, 15); $i++) { 
            $random .= substr($chars, mt_rand(0, strlen($chars)), 1);
          }
          $url = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER['PHP_SELF'].$random;
        ?>
      </div>
    </div>
    <div class="more-emails"><a class="more-emails" href="<?php echo $url; ?>">&laquo; More e-mail adresses &raquo;</a></div>
    <div class="wrap3"></div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted pull-left">&copy; Copyright 2016<?php if(date('Y') != 2016) { echo "-".date('Y'); } ?> <a href="https://kwachu.org" target="_blank">Krzysztof Kwaśniak</a></p>
        <p class="text-muted pull-right">Source on <a href="https://github.com/kwachu96/Trap-harvesting-bots" target="_blank">GitHub</a></p>
      </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
