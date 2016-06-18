<?php
function auth($login, $passwd)
{
  if ($login && $passwd)
  {
    $pwd = hash('whirlpool', $passwd);
    if (file_exists('private/passwd'))
    {
      $table = unserialize(file_get_contents('private/passwd'));
      foreach($table as $tab)
      {
        if ($tab['login'] === $login && $tab['passwd'] === $pwd) return true;
      }
    }
  }
  return false;
};

if ($_POST['submit'] === 'OK')
{
  if (auth($_POST['login'], $_POST['passwd']))
  {
    session_start();
    if ($_POST['login']==='root'){
      header("Location: root.php");
      return;
    }
    $_SESSION['name'] = $_POST['login'];
    header("location: index.php");
  }
  else echo "<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"index.css\"></head><body><div class=\"maincol\"><h1>Bad Login and/or Password, please try again<br /><br /><a href='login.html'>Here.</a></h1></div></body></html>";
}
else echo "Don't try this BIATCH! or I kick your ass !\n";
?>
