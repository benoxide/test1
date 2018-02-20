<?php 

session_start();
$_SESSION["user"] = $_POST['user'];
if ($_POST['user'] == 1 and $_POST['pass'] == 'pass1')
        {
            Redirect("test1.php");
        }
else if ($_POST['user'] == 2 and $_POST['pass'] == 'pass2')
        {
            Redirect("test1.php");
        }
else
{
		echo "Invalid Credentials";
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}