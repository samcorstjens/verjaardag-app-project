<?PHP

  require('config/config.php');
  require('config/db.php');
  $setSql = "SELECT * FROM songs";
  $setRec = mysqli_query($conn, $setSql);

  $columnHeader = '';
  $columnHeader = "USERNAMES"."\t"."EMAILS"."\t"."PERSONAL_MESSAGES"."\t"."ARTIST1"."\t"."SONG1"."\t"."URL1"."\t"."ARTIST2"."\t"."SONG2"."\t"."URL2"."\t"."ARTIST3"."\t"."SONG3"."\t"."URL3";

  $setData = '';

  while ($rec = mysqli_fetch_row($setRec)) {
      $rowData = '';
      foreach ($rec as $value) {
          $value = '"' . $value . '"' . "\t";
          $rowData .= $value;
      }
      $setData .= trim($rowData) . "\n";
  }


  header("Content-type: application/octet-stream");
  //FILE NAME
  header("Content-Disposition: attachment; filename=Personal_messages.xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  echo ucwords($columnHeader) . "\n" . $setData . "\n";
