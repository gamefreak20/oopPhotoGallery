<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");}?>

<?php

if(empty($_GET['id'])){
  redirect("users.php");
}

$user = User::find_by_id($_GET['id']);

if (isset($_POST['update'])) {

  if($user) {
    $user->username = $_POST['username'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->password = $_POST['password'];

    if(empty($_FILES['user_image'])){
      $user->save();
    } else {
      $user->set_file($_FILES['user_image']);
      $user->upload_photo();
      $user->save();

      redirect("edit_user.php?id={$user->id}");
    }
  }
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

                      <div class="col-md-6">
                        <img src="<?php echo $user->image_path_and_placeholder(); ?>" class="img-responsive" alt="Profile picture">
                      </div>

                      <form class="" action="" method="post" enctype="multipart/form-data">

                      <div class="col-md-6">

                        <div class="form-group">
                          <input type="file" name="user_image">
                        </div>

                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                        </div>

                        <div class="form-group">
                          <label for="first_name">First Name</label>
                          <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Last_Name">Last Name</label>
                          <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                        </div>
                        <div class="form-group">
                          <label for="password">password</label>
                          <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                        </div>
                        <div class="form-group">
                          <a class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id ?>">Delete</a>
                          <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
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
