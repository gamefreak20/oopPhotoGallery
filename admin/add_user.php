<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");}?>

<?php

$user = new User();

if (isset($_POST['create'])) {

  if($user) {
    $user->username = $_POST['username'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->password = $_POST['password'];

    $user->set_file($_FILES['user_image']);

    $user->save_user_and_image();
  }

  // if ($user) {
  //   $user->title = $_POST['title'];
  //   $user->caption = $_POST['caption'];
  //   $user->alternate_Text = $_POST['alternate_Text'];
  //   $user->description = $_POST['description'];
  //
  //   $user->save();
  // }
}


// $users = user::find_all();

 ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

            <?php include("includes/top_nav.php"); ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include("includes/side_nav.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

          <div class="container-fluid">

              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                          users
                          <small>Subheading</small>
                      </h1>

                      <form class="" action="" method="post" enctype="multipart/form-data">

                      <div class="col-md-6 col-md-offset-3">

                        <div class="form-group">
                          <input type="file" name="user_image">
                        </div>

                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="first_name">First Name</label>
                          <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="Last_Name">Last Name</label>
                          <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="password">password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                          <input type="submit" name="create" class="btn btn-primary pull-right">
                        </div>

                      </div>
                </form>
                  </div>
              </div>
              <!-- /.row -->

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
