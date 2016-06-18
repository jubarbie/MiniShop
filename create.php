<?php
$pathname = 'private';
$filename = 'private/passwd';
$mode = 0777;
$mdp = hash('whirlpool', $_POST['passwd']);
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === 'register')
{
  if (!file_exists ($pathname))
  {
    mkdir ($pathname , $mode);
  }
  $tab = array('login' => $_POST['login'], 'passwd' => $mdp);
  if (file_exists($filename))
  {
    $file = unserialize(file_get_contents($filename));
    foreach ($file as $value)
    {
      if(trim($value['login']) === trim($_POST['login']))
      {
        echo "<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"index.css\"></head><body><div class=\"maincol\"><h1>the acount \"".$_POST['login']."\" already exise.<br />please select another one<br /><br /><a href='login.html'>HERE</a></h1></div></body></html>\n";
        return ;
      }
    }
  }
  $file[] = $tab;
  file_put_contents ($filename, serialize($file));
  echo "<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"index.css\"></head><body><div class=\"maincol\"><h1>the account \"".$_POST['login']."\" has been created.<br />please click in the link below to log-in.<br /><br /><a href='login.html'>HERE</a></h1></div></body></html>\n";
}else
echo "<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"index.css\"></head><body><div class=\"maincol\"><h1>Bab Login and/or Password.<br />please retry and fill all empty field.<br /><br /><a href='login.html'>RETRY</a></h1></div></body></html>\n";
?>
