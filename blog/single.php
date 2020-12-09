<?php include('path.php');?>

<?php include(ROOT_PATH . '/app/controllers/posts.php');
usersOnly();

if(isset($_GET['id']))
{
$post = selectOne('posts', ['id' => $_GET['id']]);

}

$topics = selectAll('topics');
$posts =  selectAll('posts', ['published' => 1]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">

    <title><?php echo $post['title']; ?> | AwaInspires</title>
</head>

<body>



    <!-- header -->
    <?php include(ROOT_PATH . "/app/includes/header.php");?>
    <!-- // header -->

    <!-- Page wrapper -->
    <!-- content -->
    <div class="content clearfix">
        <div class="page-content single">
            <h2 style="text-align: center;"><b><?php echo $post['title']; ?></b></h2>
            <br>
            <h3><?php echo html_entity_decode($post['body']); ?></h3>
            <br>
            <img style="width: 500px; height: auto; margin: auto;" src="<?php echo BASE_URL . '/images/' . $post['image']; ?>">

          
           

            <!-- Blog Comments -->

            <?php  
                
                if(isset($_POST['submit'])){
                    
                    $get_post_id = $_GET['id'];
                   
                    $comment = $_POST['comment'];
                    
                    if( !empty($comment)){
                        
                        $query = "INSERT INTO comments ('post_id', 'comment') ";
                        $query.= "VALUES ($get_post_id, $comment) ";
                    
                        $create_comment_query = mysqli_query($conn, $query);
                    
                        if($create_comment_query){
                        
                                echo "Done";
                            
                        }else{
                            die('<h1>QUERY FAILD</h1>' . mysqli_error($conn)); 
                        }
                
                    }else{
                        
                        echo "<script>alert('Fild cannot be empty')</script>" ;
                        
                    }

                }
                
                ?>
           
            <form action="" method="post" role="form">

                <label for="Comment">Comment</label><br>
                <textarea name="comment" style=" width: 410px; height: 100px;" placeholder="Enter your comment here..."></textarea><br>

                <input type="submit" name='submit' value="Submit">


                <!-- Posted Comments -->

                <?php  
                 
//                $query = "SELECT * FROM comments WHERE post_id = '{$get_post_id}' ";
//                $select_comment_query = mysqli_query($conn, $query);
//                if(!$select_comment_query){
//                    die('<h1>QUERY FAILD</h1>' . mysqli_error($conn));
//                }
//                   while($row = mysqli_fetch_assoc($select_comment_query)){
//                       
//                       $comment = $row['comment'];       
               ?>


                <!-- Comment -->
<!--
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <?php //echo $comment; ?>
                    </div>
                </div>
-->


                <?php 
                   //}
            ?>




            </form>




        </div>

        <div class="sidebar single">
            <!-- fb page -->

            <!-- // fb page -->

            <!-- Popular Posts -->
            <div class="section popular">
                <h2>Popular</h2>

                <?php foreach ($posts as $p): ?>
                <div class="post clearfix">
                    <img src="<?php echo BASE_URL . '/images/' . $p['image']; ?>">
                    <a href="" <?php echo $post['title']; ?> class="title"><?php echo $p['title']; ?></a>
                </div>
                <?php endforeach; ?>


            </div>
            <!-- // Popular Posts -->

            <!-- topics -->
            <div class="section topics">
                <h2>Topics</h2>
                <ul>

                    <?php foreach ($topics as $topic): ?>

                    <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>

                    <?php endforeach; ?>

                </ul>
            </div>
            <!-- // topics -->

        </div>
    </div>
    <!-- // content -->

    </div>
    <!-- // page wrapper -->

    <!-- FOOTER -->
    <?php include(ROOT_PATH . "/app/includes/footer.php");?>
    <!-- // FOOTER -->




</body>

</html>