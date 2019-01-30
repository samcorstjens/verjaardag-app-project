<?php
    require('config/config.php');
    require('config/db.php');

    //CREATE QUERY
    $query = 'SELECT * FROM Songs ORDER BY created_at DESC';

    //GET RESULT
    $result = mysqli_query($conn, $query);

    //FETCH DATA
    $songs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($songs);
    //FREE RESULT
    mysqli_free_result($result);

    //CLOSE CONNECTION
    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
        <div class="container">
          <h1>Posts</h1>
          <a class="btn btn-success" href="Export.php"> Export To Excel </a>
          <div class="row col-12">
            <?php foreach($songs as $song) : ?>
              <div class="jumbotron col-4">

                  <h6>Username: </h6>
                  <p><?php echo $song['username']; ?></p>
                  <h6>E-mail: </h6>
                  <p><?php echo $song['email']; ?></p>
                  <h6>Personal message: </h6>
                  <div class="pmwrapper">
                    <p class="pm"><?php echo $song['personalmessage']; ?></p><br><br>
                  </div><br>
                  <p class="createdAt">Created at: <?php echo $song['created_at']; ?></p>


                <a class="btn btn-secondary" href="post.php?id=<?php echo $song['id']; ?>">Read more</a>

              </div>
            <?php endforeach; ?>
          </div>
        </div>
<?php include('inc/footer.php'); ?>
