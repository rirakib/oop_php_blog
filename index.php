<?php

     include('./libs/database.php');
     include('./libs/config.php');
     
     $db = new Database();
     $cat_query = "SELECT * FROM categories";
     $post_query = "SELECT * FROM posts";
     $categories = $db->select($cat_query);
     $post = $db->select($post_query);
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <?php
        include('./includes/navbar.php');
        include('./includes/header.php');
        
    ?>
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-md-8">
                <h3 class="text-center mt-2 mb-4" >Top posts</h3>
                <div class="row">
                    <?php while ($row = $post->fetch_array()) : ?>
                    <div class="col-md-6 mt-3">
                        <div class="card shadow p-2">
                            <h4><?php echo $row['title'] ?></h4>
                            <span><strong><?php echo $row['author'] ?></strong><span class="float-end"><?php echo $row['created_at'] ?></span>
                            <p><?php echo substr($row['description'],0,70) ?>  <a href="">More </a></p>
                            
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title">
                        <h6 class="text-center mt-3">Categories</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php while ($row = $categories->fetch_array()) :  ?>
                            <li class="list-group-item"><a  href=""><?php echo $row['name']; ?></a></li>
                            <?php endwhile ; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <?php include('./includes/footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>