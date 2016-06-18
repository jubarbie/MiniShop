<?php
/*nom | type | prix | img*/
function exists($id)
{
	if ($id && file_exists('datas/data')){
		$file = unserialize(file_get_contents('datas/data'));
		foreach ($file as $value){
			if(trim($value['nom']) === trim($id))
				return true;
		}
	}
    return false;
}
function get_prix($nom){
	if (exists($nom)){
		$tab=fetch();
		foreach($tab as $elm){
			if($elm['nom']===$nom)
				return $elm['prix'];
		}
	}
}
function add($nom, $type, $prix)
{
	if (!file_exists('datas')) mkdir('datas', 0777);
	if (file_exists('datas/data')) $file = unserialize(file_get_contents('datas/data'));
	if (!exists($nom) && is_numeric($prix) && $type)
	{
		$file[]=array('nom'=>$nom, 'type'=>$type, 'prix'=>$prix);
		file_put_contents ('datas/data', serialize($file));
		return true;
	}
	return false;
}
function mod_prix($name, $prix){
	if(exists($name)){
		$tab=fetch();
		foreach ($tab as &$elm){
			if ($elm['nom']==$name){
				$elm['prix']=$prix;
				file_put_contents('datas/data', serialize($tab));
				return true;
			}
		}
	}
	return false;
}
function fetch(){
	if (file_exists('datas/data'))
		return unserialize(file_get_contents('datas/data'));
}
function del($name){
	if (exists($name)){
		$tab=fetch();
		$res=array();
		foreach($tab as $elm){
			if ($elm['nom']!==$name){
				$res[]=$elm;
			}
		}
		file_put_contents('datas/data', serialize($res));
	}
}
function printarticles(){
	$tab=fetch();
	$orderby='type';
	sort($tab[$orderby]);
	echo '<head><title>Farmeurs Chinoirs</title><link rel="stylesheet" type="text/css" href="index.css"></head>';
	echo '<body><div id="header" class="topmain"><a href="root.php" title="Page d\'accueil">
        <img src="images/home.png" alt="Mountain View" style="width:50px;height:50px">
    </a></div>';
	echo '<div id="main">';
	echo '<table><tr>
	<td>type</td>
	<td>nom</td>
	<td>prix</td>
	</tr>';
	foreach($tab as $k=>$elem){
		echo "<tr><td>".$elem["type"]."</td><td>".$elem["nom"]."</td><td>".$elem["prix"]."</td></tr>";
	}
	echo '</table>';
	echo '</div>';
}
if ($_POST['submit']==='Ajouter' && $_POST['name'] && $_POST['prix'])
{
	if (add($_POST['name'],$_POST['type'],$_POST['prix']))
		header("location: root.php");
	else{
		echo '<head><title>Farmeurs Chinoirs</title><link rel="stylesheet" type="text/css" href="index.css"></head>';
		echo '<body><div id="header" class="topmain"><a href="root.php" title="Page d\'accueil">
        <img src="images/home.png" alt="Mountain View" style="width:50px;height:50px">
	    </a></div>';
		echo '<div id="main">';
		echo '<h1>failure</h1>';
		echo '</div>';
		return;
	}
}else if ($_POST['submit']==='Supprimer' && $_POST['name']){
	del($_POST['name']);
	header("location: root.php");
}else if ($_POST['submit']==='Browse'){
	printarticles();
	return;
}else if ($_POST['submit']==='Setprix' && $_POST['prix']){
	if (mod_prix($_POST['nom'], $_POST['prix']))
		header("location: root.php");
	else{
		echo '<head><title>Farmeurs Chinoirs</title><link rel="stylesheet" type="text/css" href="index.css"></head>';
		echo '<body><div id="header" class="topmain"><a href="root.php" title="Page d\'accueil">
        <img src="images/home.png" alt="Mountain View" style="width:50px;height:50px">
	    </a></div>';
		echo '<div id="main">';
		echo '<h1>failure</h1>';
		echo '</div>';
		return;
	}
}else if ($_GET['l']==='Diablo_3'){
	$_GET['p']=get_prix($_GET['l']);
}else if ($_GET['l']==='Stracraft_2'){
	$_GET['p']=get_prix($_GET['l']);
}
?>