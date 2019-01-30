<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verjaardag App</title>
  </head>
  <body>


    <form id="user" action="" method="get">

      <h3>User</h3>
      Username: <input type="text" name="userName" id="userName"><br>
      E-mail: <input type="text" name="eMail" id="eMail"><br>

      <h4>Songs</h4>
      <h5>Song 1</h5>
      Artist: <input type="text" name="artistName1" id="artistName1"><br>
      Titel: <input type="text" name="songName1" id="songName1"><br>
      URL: <input type="text" name="songUrl1" id="songUrl1"><br>

      <h5>Song 2</h5>
      Artist: <input type="text" name="artistName2" id="artistName2"><br>
      Titel: <input type="text" name="songName2" id="songName2"><br>
      URL: <input type="text" name="songUrl2" id="songUrl2"><br>

      <h5>Song 3</h5>
      Artist: <input type="text" name="artistName3" id="artistName3"><br>
      Titel: <input type="text" name="songName3" id="songName3"><br>
      URL: <input type="text" name="songUrl3" id="songUrl3"><br>
      <input type="submit" value="Submit"/>

    </form>


    <?php
    $myfile = fopen("Playlist.txt", "a");
    $txt = "Username: ".$_GET["userName"]."\r\n".
           "E-mail : ".$_GET["eMail"]."\r\n"."\r\n".

           "Artist 1: ".$_GET["artistName1"]."\r\n".
           "Titel 1: ".$_GET["songName1"]."\r\n".
           "URL 1: ".$_GET["songUrl1"]."\r\n"."\r\n".

           "Artist 2: ".$_GET["artistName2"]."\r\n".
           "Titel 2: ".$_GET["songName2"]."\r\n".
           "URL 2: ".$_GET["songUrl2"]."\r\n"."\r\n".

           "Artist 3: ".$_GET["artistName3"]."\r\n".
           "Titel 3: ".$_GET["songName3"]."\r\n".
           "URL 3: ".$_GET["songUrl3"]."\r\n"."\r\n"."\r\n";

    fwrite($myfile, $txt);
    fclose($myfile);
    ?>

  </body>
</html>
