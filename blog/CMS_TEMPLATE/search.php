<?php include "../includes/db.php";?>
<?php include "../includes/header.php";?>



<!-- Navigation -->
<?php include "../includes/nav.php";?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
             if(isset($_POST['search'])){
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags like '%$search'";

                $result = mysqli_query($connection, $query);
                if(!$result){
                    die("query failed" . mysqli_error($connection));}
                $count = mysqli_num_rows($result);
                if($count == 0) {
                    echo "<h1>No result</h1>";
                }else{
//            $query = "SELECT * FROM posts";
//            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)){
                $post_title = $row["post_title"];
                $post_auhor = $row["post_auhor"];
                $post_date = $row["post_date"];
                $post_content = $row["post_content"];
                $post_image = $row["post_image"];
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo " {$post_title}"; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo " {$post_auhor}"; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo " {$post_date}"; ?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo " {$post_content}"; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php }
                }}

            ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "../includes/sidebar.php";?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include "../includes/footer.php";?>
