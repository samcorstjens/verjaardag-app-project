<?php include('inc/header.php');
if(isset($_POST["submit"]) & $_POST["password"] == "pass"){
echo "<script> window.location.assign('admin.php'); </script>";

}else if(isset($_POST["submit"])){
  Echo "Fout Wachtwoord!";
}

 ?>


    <h1>Admin login.</h1>
    <div class="container row col-md-12">
        <div class="form col-md-4">
            <form class="" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                </div>
            </form>
        </div>
    </div>
<?php include('inc/footer.php'); ?>
