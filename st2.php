<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Farmeurs Chinoirs</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div id="header" class="topmain">
    <table><tr>
  <td><a href="index.php" title="Page d'accueil">
        <img src="images/home.png" alt="Mountain View" style="width:50px;height:50px">
    </a></td>
  <td><div class="log"><h2><br><?php session_start(); echo 'Bonjour '.$_SESSION['name'];?></h2></div></td>
    <td><form method="POST" action="data_manip.php target" target="mainframe">
        <input type="text" name="recherche" value="">
        <input type="submit" name="submit" value="Recherche">
    </form></td>
    </tr></table>
</div>
<!--*****************************************************************************************************-->
<div id="leftcol_container" class="leftcolgclass">
  <div class="leftcol">
    <h2>Nos MMORPG</h2>
    <ul>
        <li><a href="wow.php">World of Warcraft</a></li>
    </ul>
    <p>&nbsp;</p>
</div>
<div class="leftcol_bottom"></div>
<div class="leftcol">
  <h2>Nos RTS</h2>
  <ul>
    <li><a href="st2.php">Starcraft 2</a></li>
</ul>
<p>&nbsp;</p>
</div>
<div class="leftcol_bottom"></div>
<div class="leftcol">
    <h2>Nos Hack & Slash</h2>
      <ul>
        <li><a href="d3.php">Diablo 3</a></li>
    </ul>
    <p>&nbsp;</p>
</div>
<div class="leftcol_bottom"></div>
<div class="leftcol_bottom"></div>
<div class="leftcol_bottom"><a href="https://www.sos-amitie.com/">Nous Contacter</a></div>
</div>
<!--*****************************************************************************************************-->
<div id="main">
    <div id="maincol_container">
        <div class="maincol">
            <h2>Game trailer</h2>
            <iframe width="600" height="400" src="https://www.youtube.com/embed/NlHCTYwDt4k?autoplay=1"
            frameborder="0" allowfullscreen name="gamevid">
            </iframe>
        </div>
        <div class="maincol_bottom"></div>
        <div class="maincol">
                <h1 style="text-size:">Starcraft 2</h1>
        </div>
         <div class="maincol_bottom"></div>
        <div class="maincol">
        <h1>Description</h1><br /><br />
        Récupérez enfin votre monde !
        <br />
        Vous incarnez le hiérarque Artanis, à la tête de la puissante race protoss. Il y a bien des années de cela, Aïur, votre monde natal, est tombé sous l’assaut de l’impitoyable Essaim ; aujourd’hui, vous êtes enfin parvenu à constituer une immense flotte de guerre connue sous le nom d’Armada dorée, et le moment est enfin venu de reconquérir votre foyer originel. Mais c’était sans compter sur un mal antique, Amon, qui menace de faire échouer vos plans : parviendrez-vous à réunifier les factions protoss et dissiper les ténèbres qui risquent de s’abattre sur la galaxie et d’annihiler toute vie dans ce secteur ?
        </div>
        <div class="maincol_bottom"></div>
        <div class="maincol_bottom">
          <div id="footer"><h3>&copy;
            <a href="https://profile.intra.42.fr/users/fcarre">fcarre</a>
            <a href="https://profile.intra.42.fr/users/"></a> 2016</h3>
            </div>
        </div>
    </div>
</div>
<!--*****************************************************************************************************-->
    <div id="rightcol_container" class="rightcolgclass">
        <div class="rightcol">
        <h2>Logins</h2>
            <ul>
              <li>
                <?php
                session_start();
                if ($_SESSION['name'] === '') echo "<a href='login.html'>Login</a>";
                else echo "<a href='logout.php'>Logout</a>";
                ?>
              </li>
            </ul>
        </div>
        <div class="rightcol_bottom"></div>

        <div class="rightcol">
        <h2>Panier</h2>
          <ul>
            <li>
              <a href="panier.php" onclick="window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Panier</a>
              <br /><br />
              <?php
              include "data_manip.php";
              echo "<a href=\"panier.php?action=ajout&amp;l=Starcraft_2&amp;q=1&amp;
              p=".get_prix('Starcraft_2')."\" onclick=\"window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;\">Achat Starcraft 2</a><br><br>";
              ?>
          </ul>
        </div>
    <div class="clear"></div>
  </div>
<!--*****************************************************************************************************-->
</body></html>
