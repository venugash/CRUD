<?php

require_once "config.php";
 
$name =  "";
$name_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    $id = $_POST["id"];
    
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
   
    if(empty($name_err)){
       
        $sql = "UPDATE tbl_book SET b_name=?,b_pub=?, b_price=?,b_isbn=? where b_id=?;";     
        if($stmt = mysqli_prepare($link, $sql)){ 
            mysqli_stmt_bind_param($stmt, "ssiii", $param_name,  $param_pub, $param_price, $param_isbn,$param_id);
    
            $param_name = $name;   
            $param_pub=$pub;
            $param_price=  $price;
            $param_isbn= $isbn;
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
             
                header("location: dash.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
} else{
    
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM tbl_book WHERE b_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
         
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
  
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);     
                    $name = $row["b_name"];
                    $pub=$row["b_pub"];
                    $price=$row["b_price"];
                    $isbn=$row["b_isbn"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } 
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
       
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }  
    else
    {
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        
                        </div>
                        <div class="form-group">
                            <label>Publication</label>
                            <input type="date" name="name" class="form-control" value="<?php echo $pub; ?>">
                           
                        </div>
                        <div class="form-group ">
                            <label>Price</label>
                            <input type="number" name="name" class="form-control" value="<?php echo  $price; ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input type="text" name="name" class="form-control" value="<?php echo   $isbn; ?>">
                        </div>
                      
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="dash.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>