<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../../css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../css/admin.css">

  <title>Admin - Create Post</title>
</head>

<body>

  <!--admin header -->
 <?php include("../../app/includes/adminHeader.php"); ?>
  

  <div class="admin-wrapper clearfix">
    <!-- Left Sidebar -->
     <?php include("../../app/includes/adminSidebar.php"); ?>
    <!-- // Left Sidebar -->

    <!-- Admin Content -->
     <div class="admin-content clearfix">
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add Post</a>
        <a href="index.php" class="btn btn-sm">Manage Posts</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Manage Posts</h2>
        
        <?php include("../../app/includes/messages.php");?>


        <table>
          <thead>
            <th>N</th>
            <th>Title</th>
            <th>Author</th>
            <th colspan="3">Action</th>
          </thead>
          
        <tbody>


          
          
           
        </tbody>
        
        </table>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  

</body>
</html>