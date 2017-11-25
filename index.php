<?php
include('mail/mail.php');
include('config.php'); // Here we got include the config file
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ARDUINO Setup</title>
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="icon"
     href="logo.png"/>
</head>

<body>
  <nav>
    <ul>
        <li><a href="#slide-1">Accueil</a></li>
        <li><a href="#slide-2">Kézako ?</a></li>
        <li><a href="#slide-3">Programme</a></li>
        <li><a href="#slide-4">Contact</a></li>
    </ul>
</nav>

<div class="slides-container">
    <div class="slide" id="slide-1">
<br/><br/><br/><br/>
 <img src="logo.png">


    </div>
    <div class="slide" id="slide-2">
        <div class="centered">
            <h1>Kézako ?</h1>
            <p><div id="description">
<h2>       LE TOUT PREMIER BOOTCAMP ARDUINO D'OPENMINDS CLUB !
</h2>

Arduino Set Up, est un atelier qui permettra aux plus novices de se transformer en connaisseurs de l'Arduino, en seulement DEUX JOURS !
Toute une équipe d’éléctroniciens, membres d’OpenMinds Club, seront mis à votre disposition pour vous coacher et vous aider à réaliser des projets en équipe.
Cet atelier aura lieu spécialement pour mettre en avant le rôle que joue l’esprit de partage et l’OpenSource, à travers l’utilisation de l’OpenHardWare, dans l’évolution de la science et la technologie.
.</p></div>
            <form action="registration/index.php">
              <input type="submit" value="Inscription" class="register-button" >
            </form>
        </div>
    </div>
    <div class="slide" id="slide-3">
        <div class="centered">

        </div>
    </div>
    <div class="slide" id="slide-4">
        <div class="centered">
        <h1> Contactez-nous !</h1><br/><br/>
          <a href="https://twitter.com/clubopenminds" class="fa fa-twitter"></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="https://www.youtube.com/channel/UCTS5jQGSPHuuibdqLUqFAqw" class="fa fa-youtube"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://www.facebook.com/openmindsclub/" class="fa fa-facebook"></a>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="https://www.snapchat.com/add/openmindsclub/" class="fa fa-snapchat-ghost"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="https://www.instagram.com/openmindsclub/" class="fa fa-instagram"></a>

        </div>
    </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.6/TweenLite.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.6/plugins/CSSPlugin.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.6/plugins/ScrollToPlugin.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>



<!--Script subscribe -->

<?php

if(isset($_POST['email']))
{
  // Send an email
$mail=$_POST['email'];
$prenom=$_POST['prenom'];
sendEmail($mail,$prenom);
// Enter in database
$bdd=new PDO($dbname, $user, $pass);

$req=$bdd->prepare('INSERT INTO registration (nom,prenom,annee,specialite,email,telephone,known,level,coming,participated,interested,usthb) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
$arr['nom'] = htmlspecialchars($_POST['nom']);
$arr['usthb'] = htmlspecialchars($_POST['usthb']);
$arr['prenom'] = htmlspecialchars($_POST['prenom']);
$arr['annee'] = htmlspecialchars($_POST['annee']);
$arr['specialite'] = htmlspecialchars($_POST['specialite']);
$arr['email'] = htmlspecialchars($_POST['email']);
$arr['telephone'] = htmlspecialchars($_POST['telephone']);
$arr['known'] = htmlspecialchars($_POST['known']);
$arr['level'] = htmlspecialchars($_POST['level']);
$arr['coming'] = htmlspecialchars($_POST['coming']);
$arr['participated'] = htmlspecialchars($_POST['participated']);
$arr['interested'] = htmlspecialchars($_POST['interested']);
$res = $req->execute(array($arr['nom'], $arr['prenom'], $arr['annee'],$arr['specialite'],$arr['email'],$arr['telephone'],$arr['known'],$arr['level'],$arr['coming'],$arr['participated'],$arr['interested'],$arr['usthb']));

//Success popup
echo
'<div id="overlay">
    <div class="msg success">'.
        '<div class="msg_inner success_inner">'.
            '<h2>Votre inscription a été réussie !</h2>'.
            '<p> Veuillez vérifier votre e-mail pour plus d\'informations.</p>'.
        '</div>'.
'   </div>
 </div>';
}
 ?>
<!-- Script for closing "popup" -->
<script>window.onload = function (){saske=document.getElementById("overlay");
setTimeout(function(){ saske.style.display="none";}, 5000);};
</script>
