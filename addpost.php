<?php
session_start();
require('config/config.php');
require('config/db.php');
$ahref       = "";
$maildata    = $_SESSION["mail"];
$sql         = "SELECT email FROM songs WHERE email = '$maildata'";
$check       = "SELECT * FROM songs WHERE email = '$maildata'";
$checkresult = mysqli_query($conn, $check);
//recapturing data$
$veld        = "";

if (mysqli_num_rows($checkresult)) {
    $veldsearch  = "SELECT * FROM songs WHERE email = '$maildata'";
    $veldcontrol = mysqli_query($conn, $veldsearch);
    $veld        = mysqli_fetch_array($veldcontrol);


}
//CHECK FOR SUBMIT
if (isset($_POST['submit'])) {
    //GET FORM DATA
    $gebruiker       = mysqli_real_escape_string($conn, $_POST['username']);
    $email           = mysqli_real_escape_string($conn, $_POST['email']);
    $personalmessage = mysqli_real_escape_string($conn, $_POST['personalmessage']);

    $artist1 = mysqli_real_escape_string($conn, $_POST['artist1']);
    $song1   = mysqli_real_escape_string($conn, $_POST['song1']);
    $url1    = mysqli_real_escape_string($conn, $_POST['url1']);

    $artist2 = mysqli_real_escape_string($conn, $_POST['artist2']);
    $song2   = mysqli_real_escape_string($conn, $_POST['song2']);
    $url2    = mysqli_real_escape_string($conn, $_POST['url2']);

    $artist3 = mysqli_real_escape_string($conn, $_POST['artist3']);
    $song3   = mysqli_real_escape_string($conn, $_POST['song3']);
    $url3    = mysqli_real_escape_string($conn, $_POST['url3']);
    if (empty($gebruiker) || empty($email) || empty($personalmessage) || empty($artist1) || empty($song1) || empty($url1) || empty($artist2) || empty($song2) || empty($url2) || empty($artist3) || empty($song3) || empty($url3)) {
        echo "Alles moet ingevult worden!";
    } else {
        $query = "INSERT INTO songs(username, email, personalmessage, artist1, song1, url1, artist2, song2, url2, artist3, song3, url3) VALUES('$gebruiker', '$email', '$personalmessage', '$artist1', '$song1', '$url1', '$artist2', '$song2', '$url2', '$artist3', '$song3', '$url3')";
        $all   = mysqli_query($conn, $query);
        if ($all) {
            die(header('refresh: 10; url=index.php') . '<body style="background : #303030;"><h3 style="color:white;">Data has been send. If you wanna make changes to your data, login again after 10 seconds, or press <a style="color:#00bc8c;"href="addpost.php">HERE</a>.</h3>
<span style="color:white;" class="sr-only">Loading...</span></body>');
        } else {
            if (strlen($gebruiker) > 20) {
                echo 'Je gebruikersnaam mag maar 20 letters lang zijn. ';
            } else {
                $result = "UPDATE songs SET username = '$gebruiker', email = '$email', personalmessage = '$personalmessage', artist1 = '$artist1', song1 = '$song1', url1 = '$url1', artist2 = '$artist2', song2 = '$song2', url2 = '$url2', artist3 = '$artist3', song3 = '$song3', url3 = '$url3' WHERE email = '$email'";
                $all2   = mysqli_query($conn, $result);
            }
            if ($all2) {
                die(header('refresh: 10; url=index.php') . '<body style="background:#303030;"><h3 style="color:white;">Data updated. If you wanna make changes to your data, login again after 10 seconds, or press <a style="color:#00bc8c;"href="addpost.php">HERE</a>.</h3>
            <span style="color:white;" class="sr-only">Loading...</span></body>');
            } else {
                echo 'Update fout!';
            }
        }
    }
}

?>
<?php
include('inc/header.php');
?>
       <div class="container row col-12">
          <div class="form col-md-6">
            <h1>Add Posts</h1>
              <form class="" method="post">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="text" readonly name="email" value ="<?php
echo $maildata;
?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?php
echo $veld[1];
?>" >
                </div>
                <div class="form-group">
                  <label>Personal message</label>
                  <textarea type="text" name="personalmessage" class="form-control" rows="5"><?php
echo $veld[2];
?></textarea>
                </div>

                <div class="form-group">
                  <label>Artist 1</label>
                  <input type="text" name="artist1" value ="<?php
echo $veld[3];
?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Song 1</label>
                  <input type="text" name="song1" class="form-control" value ="<?php
echo $veld[4];
?>">
                </div>
                <div class="form-group">
                  <label>URL 1</label>
                  <input type="text" name="url1" class="form-control" value ="<?php
echo $veld[5];
?>">
                </div>
                <div class="form-group">
                  <label>Artist 2</label>
                  <input type="text" name="artist2" class="form-control" value ="<?php
echo $veld[6];
?>">
                </div>
                <div class="form-group">
                  <label>Song 2</label>
                  <input type="text" name="song2" class="form-control" value ="<?php
echo $veld[7];
?>">
                </div>
                <div class="form-group">
                  <label>URL 2</label>
                  <input type="text" name="url2" class="form-control" value ="<?php
echo $veld[8];
?>">
                </div>
                <div class="form-group">
                  <label>Artist 3</label>
                  <input type="text" name="artist3" class="form-control" value ="<?php
echo $veld[9];
?>">
                </div>
                <div class="form-group">
                  <label>Song 3</label>
                  <input type="text" name="song3" class="form-control" value ="<?php
echo $veld[10];
?>">
                </div>
                <div class="form-group">
                  <label>URL 3</label>
                  <input type="text" name="url3" class="form-control" value ="<?php
echo $veld[11];
?>">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary"><br><br><br>
              </form>
          </div>
          <div class="col-md-6">
            <form class="form-group" action="index.html" method="post">
              <h4>Youtube search</h4>
                <iframe class="col-md-12" id="player" type="text/html" width="700" height="380"
                src="http://www.youtube.com/embed?listType=search&list="
                frameborder="0"></iframe><br>
                <div class="input-group">
                <input class="form-control col-12" type="text" name="searchYT" id="searchYT" placeholder="Search: artist - song">
<div class="input-group-append">
<button class="btn btn-secondary" name="search" id="search" type="button">Search</button>
</div>
</div>
<br>
              <!--<h6 id="directURL"></h6>-->
                <h6> Direct Link : <a name="videolink" id="directURL1" href="#" target="_blank">link</a></h6>
                <!--<h6 id="resultURL">Search result: </h6>-->
                <h6> Search Link : <a id="resultURL1" href="#" target="_blank">link</a><h6>

              <!--  <button class="btn btn-primary" name="search2" id="link" type="button">Get link</button>-->

            </form>
          </div>
        </div>
<?php
include('inc/footer.php');
?>
