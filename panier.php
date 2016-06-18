<?php
session_start();
include_once("fonctions-panier.php");

$fail = false;
$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $fail=true;
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
   $l = preg_replace('#\v#', '',$l);
   $p = floatval($p);
   if (is_array($q)){
      $qte_art = array();
      $i=0;
      foreach ($q as $contenu){
         $qte_art[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);

}
if (!$fail)
{
  if ($action === 'ajout') add_art($l,$q,$p);
  else if ($action === 'suppression') supp_art($l);
  else if ($action === 'refresh')
  {
    for ($i = 0 ; $i < count($qte_art) ; $i++) modif_qte_art($_SESSION['panier']['libelleProduit'][$i],round($qte_art[$i]));
  }
}
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Votre panier</title>
    <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <body>
    <form method="post" action="panier.php">
      <table style="width: 400px">
        <tr>
          <td>Votre panier</td>
        </tr>
        <tr>
          <td>Libell&eacute;</td>
          <td>Quantit&eacute;</td>
          <td>Prix Unitaire</td>
          <td>Action</td>
        </tr>
        <?php
        if (make_panier())
        {
           $nb_art=count($_SESSION['panier']['libelleProduit']);
           if ($nb_art <= 0)
           echo "<tr><td>Votre panier est vide </ td></tr>";
           else
           {
              for ($i=0 ;$i < $nb_art ; $i++)
              {
                 echo "<tr>";
                 echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                 echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                 echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
                 echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">&eacute;ffacer</a></td>";
                 echo "</tr>";
              }
              echo "<tr><td colspan=\"2\"> </td>";
              echo "<td colspan=\"2\">";
              echo "Total : ".total()."$";
              echo "</td></tr>";
              echo "<td colspan=\"4\">";
              echo "<input type=\"submit\" value=\"Rafraichir\"/>";
              echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
              echo "</td></tr>";
           }
        }
        ?>
      </table>
    </form>
  </body>
</html>
