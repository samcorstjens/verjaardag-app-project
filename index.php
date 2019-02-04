<?php
session_start();
include ('inc/header.php');

$mail = $_POST["email"];

if (isset($_POST["submit"]) && preg_match("/\b(@)\b/", $_POST['email']))
	{
	include_once $_SERVER['ROOT'] . 'securimage/securimage.php';

	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false)
		{
		echo "<h3>The security code you entered was incorrect.<br /><br />";
		echo "Please go <a href='index.php'>back</a> and try again.</h3>";
		exit;
		}
	  else
		{
		$emaildata = $_POST['email'];
		$_SESSION["mail"] = $emaildata;
		echo "<script> window.location.assign('addpost.php'); </script>";
		}
	}
  else
if (isset($_POST["submit"]))
	{
	echo '<script type="text/javascript">alert("Dit is geen geldig emailadress!")</script>';
	}

?>

    <div class="frontpage container row col-12">
      <h2>Geef hier uw favoriete top 3 dans/meezingliedjes op.</h2>
        <div class="form col-md-5">
            <form action="<?php
$_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" name="email" class="form-control">
                    <br /></br>
                    <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" class="border border-primary" />
										<br>
                    <input type="text" name="captcha_code" size="10" maxlength="6" />
<a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
                    <br /></br>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
<?php
include ('inc/footer.php');
 ?>
