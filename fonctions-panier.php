<?php
function make_panier()
{
   if (!isset($_SESSION['panier']))
   {
      $_SESSION['panier']=array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}

function add_art($libelleProduit,$qteProduit,$prixProduit)
{
   if (make_panier() && !is_loked())
   {
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function modif_qte_art($libelleProduit,$qteProduit)
{
   if (make_panier() && !is_loked())
   {
      if ($qteProduit > 0)
      {
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supp_art($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function supp_art($libelleProduit)
{
   if (make_panier() && !is_loked())
   {
      $tmp=array();
      $tmp['libelleProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];
      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
      {
         if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
         {
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
         }
      }
      $_SESSION['panier'] =  $tmp;
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function total()
{
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}

function supp_panier()
{
   unset($_SESSION['panier']);
}

function is_loked()
{
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}

function compt_art()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['libelleProduit']);
   else
   return 0;
}
?>
