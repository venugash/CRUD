<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  
    require_once "config.php";
    
    
    $sql = "SELECT tbl_book.b_name,tbl_book.b_pub,tbl_book.b_price,tbl_book.b_isbn,tbl_book.b_medium,
    tbl_cat.cat_name,tbl_aut.aut_name,tbl_book.image_name from tbl_book, tbl_cat,tbl_aut
     WHERE tbl_book.b_cat=tbl_cat.cat_id and tbl_book.b_auth=tbl_aut.aut_id and b_id=?;";
    
    if($stmt = mysqli_prepare($link, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
      
        $param_id = trim($_GET["id"]);
        
       
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
               
                
                $name = $row["b_name"];
                $author=$row["aut_name"];
                $pub=$row["b_pub"];
                $price=$row["b_price"];
                $isbn=$row["b_isbn"];
                $medium=$row["b_medium"];
                $cat_name=$row["cat_name"];
                $image=$row["image_name"];
                
            } else{
                
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    
    mysqli_stmt_close($stmt);
    
   
    mysqli_close($link);
} else{
    
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record of Book</h1>
                    </div>
                    <div class="form-group">
                        <label>Book Name</label>
                        <p class="form-control-static"><?php echo $row["b_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <p class="form-control-static"><?php echo $row["aut_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Year of publishing</label>
                        <p class="form-control-static"><?php echo $row["b_pub"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $row["b_price"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <p class="form-control-static"><?php echo $row["b_isbn"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Medium</label>
                        <p class="form-control-static"><?php echo $row["b_medium"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <p class="form-control-static"><?php echo $row["cat_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Image</label><br>
                        
                    </div>
                    <?php echo "<img src=images/$image width=200px height=200px />"?>
                   <br>
                    <p style="margin-top:20px;"><a href="dash.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>