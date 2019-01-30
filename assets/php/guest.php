<?php
  //MESSAGE VARS
  $smg = '';
  $msgClass = '';
  //CHECK FOR SUBMIT
  if(filter_has_var(INPUT_POST, submit)){
      //GET FORM DATA
      $username = htmlspecialchars($_POST['username']);
      $mail = htmlspecialchars($_POST['mail']);
      $message = htmlspecialchars($_POST['message']);

      //CHECK REQUIRED FIELDS
      if (!empty($username) && !empty($mail) && !empty($message)) {
          //PASSED
          //CHECK MAIL
          if(filter_var($mail, FILTER_VALIDATE_EMAIL) === false){
              //FAILED
              $msg = 'Please use a valid E-mail';
              $msgClass = 'alert-danger';
          } else {
              //PASSED
              $msg = 'Form has been submitted';
              $msgClass = 'alert-success';
              //echo 'Form has been submitted';
          }
      } else {
        //FAILED
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
      }
  }
?>

<?php include('inc/header.php'); ?>
    <div class="container row col-12">
      <div class="col-6">
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
        <form class="form-group col-12" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <h3>User</h3>
            <label>Username</label>
            <input class="form-control col-12" type="text" name="username"
            value="<?php echo isset($_POST['username']) ? $username : ''; ?>"><br>

            <label>E-mail</label>
            <input class="form-control col-12" type="text" name="mail"
            value="<?php echo isset($_POST['mail']) ? $mail : ''; ?>"><br>
            <label>Personal message</label>
            <textarea class="form-control col-12" name="message"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>

          <h4>Song 1</h4>
            Artist: <input class="form-control" type="text" name="artist1"><br>
            Title: <input class="form-control" type="text" name="title1"><br>
            URL: <input class="form-control" type="text" name="url1"><br>

          <h4>Song 2</h4>
            Artist: <input class="form-control" type="text" name="artist2"><br>
            Title: <input class="form-control" type="text" name="title2"><br>
            URL: <input class="form-control" type="text" name="url2"><br>

          <h4>Song 3</h4>
            Artist: <input class="form-control" type="text" name="artist3"><br>
            Title: <input class="form-control" type="text" name="title3"><br>
            URL: <input class="form-control" type="text" name="url3"<br>
          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="done" required>
              <label class="form-check-label" for="done">This form is ready to be submitted</label>
          </div>
          <button class="btn btn-primary" type="submit" name="submit">Submit</button><br>
      </div>

      <div class="col-6">
        <form class="form-group col-12" action="index.html" method="post">
          <h4>Youtube search</h4>
            <iframe class="col-12"  id="player" type="text/html" width="640" height="380"
            src="http://www.youtube.com/embed?listType=search&list="
            frameborder="0"></iframe><br>
            <input class="form-control col-12" type="text" name="searchYT" id="searchYT" placeholder="Search: artist - song">
            <h6 id="directURL">Direct link: </h6>
            <a id="directURL1" href="#" target="_blank">link</a>
            <h6 id="resultURL">Search result: </h6>
            <a id="resultURL1" href="#" target="_blank">link</a><br>
            <button class="btn btn-secondary" name="search" id="search" type="button">Search</button>

        </form>
      </div>
    </div>
<?php include('inc/footer.php'); ?>
