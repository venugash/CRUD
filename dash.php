<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link
			href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
		<link rel="stylesheet" href="./style2.css" />
        <title>Landing Page</title>
        <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    </head>
    <body>
        
        <header>
            <div class="logo-container">
                <h4 class="logo">Venu Book Shop</h4>
                <img src="./img/logo1.png" width="60px">
            </div>

            <nav>
                <ul class="nav-links">
                    <li class="nav-link" ><a href="dash.php" style="text-decoration: none;color:#070707;">DASH BOARD</a></li>
                    <li class="nav-link" ><a href="add_book.php" style="text-decoration: none;color:#5f5f79;">ADD BOOKS</a></li>
                    <li class="nav-link" ><a href="add_cat.php" style="text-decoration: none;color:#5f5f79;">ADD CATEGORY</a></li>
                    <li class="nav-link" ><a href="add_aut.php" style="text-decoration: none;color:#5f5f79;">ADD AUTHOR</a></li>
                </ul>
            </nav>
            <div class="cart">
            <form class="sel_cal" action="logout.php" method="POST" >
    
                           <input class="login" name="btn_logout" type="submit" value="Logout">
                </form>
               
            </div>
        </header>
        <div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-4" ><form class="sel_cal" action="#" method="POST" name="add-cat">
                             CATEGORY <?php
                                    
                                    require_once "config.php";
                                    
                                    
                                    $sql = "SELECT * FROM tbl_cat";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            echo"<select class=\"cat_sel\" name=\"cmb_cat1\" >";
                                                while($row = mysqli_fetch_array($result)){
                                                        echo '<option value="'.$row[0].'">'. $row[1] .'</option>';         
                                                }
                                                echo"</select>"    ;
                                            mysqli_free_result($result);
                                        }else{
                                            echo "<p class='lead'><em>No records were found.</em></p>";
                                        }
                                    } else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    }
                                    ?>
                            <input class="btn-book" name="btn_add" type="submit" value="SEARCH">
                            </form></div>
    <div class="col-sm-4"><form class="sel_cal" action="#" method="POST" name="add-cat">
                           
                            <input class="btn-book1" name="btn_all" type="submit" value="SHOW ALL">
                            </form></div>
    <div class="col-sm-4" ><form class="sel_cal" action="#" method="POST" name="add-cat">
    <input class="txt-box" type="text" name="txt_search" placeholder="Book Title/ Author">
                            <input class="btn-book" name="btn_search" type="submit" value="SEARCH">
                            </form></div>
  </div>
</div>
        
                            

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Book Details</h2>
                            <?php
                            if(array_key_exists('btn_all', $_POST)) 
                            { 
                                require_once "config.php";
                    
                               
                                $sql = "SELECT tbl_book.b_id,tbl_book.b_name,tbl_aut.aut_name,tbl_book.b_price,tbl_book.image_name FROM tbl_book,tbl_aut 
                                        where tbl_book.b_auth= tbl_aut.aut_id";
                                if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<table class='table table-bordered table-striped'>";
                                            echo "<thead style=\"text-align:center\">";
                                                echo "<tr>";
                                                    echo "<th>Book Name</th>";
                                                    echo "<th>Book Author</th>";  
                                                    echo "<th>Book Price</th>";   
                                                    echo "<th>Book Image</th>";   
                                                    echo "<th>Action</th>";   
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                    echo "<td> " . $row[1] . "</td>";
                                                    echo "<td>" . $row[2] . "</td>";
                                                    echo "<td> Rs." . $row[3] . ".00</td>";
                                                    echo "<td><img src=images/$row[4] width=125px height=auto /></td>";
                                                    echo "<td style=\"    width: 104px;\">";
                                                        echo "<a href='read_book.php?id=". $row['b_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                        echo "<a href='update_book.php?id=". $row['b_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                        echo "<a href='delete_book.php?id=". $row['b_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";                            
                                        echo "</table>";
                                       
                                        mysqli_free_result($result);
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                            
                              
                                mysqli_close($link);
                            }
                            else if(array_key_exists('btn_add', $_POST)) 
                            { 
                                require_once "config.php";
                                $category=$_POST["cmb_cat1"];
                              
                                $sql = "SELECT tbl_book.b_id,tbl_book.b_name,tbl_aut.aut_name,tbl_book.b_price,tbl_book.image_name FROM tbl_book,tbl_aut 
                                where tbl_book.b_auth= tbl_aut.aut_id and b_cat='$category'";
                                if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<table class='table table-bordered table-striped'>";
                                            echo "<thead style=\"text-align:center\">";
                                                echo "<tr>";
                                                    echo "<th>Book Name</th>";
                                                    echo "<th>Book Author</th>";  
                                                    echo "<th>Book Price</th>";   
                                                    echo "<th>Book Image</th>";   
                                                    echo "<th>Action</th>";   
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                    echo "<td> " . $row[1] . "</td>";
                                                    echo "<td>" . $row[2] . "</td>";
                                                    echo "<td> Rs." . $row[3] . ".00</td>";
                                                    echo "<td><img src=images/$row[4] width=125px height=auto /></td>";
                                                    echo "<td style=\"    width: 104px;\">";
                                                        echo "<a href='read_book.php?id=". $row['b_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                        echo "<a href='update_book.php?id=". $row['b_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                        echo "<a href='delete_book.php?id=". $row['b_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";                            
                                        echo "</table>";
                                       
                                        mysqli_free_result($result);
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                            
                                
                                mysqli_close($link);
                            }
                            else if(array_key_exists('btn_search', $_POST)) 
                            { 
                                require_once "config.php";
                                $search=$_POST["txt_search"];
                                
                                $sql = "SELECT tbl_book.b_id,tbl_book.b_name,tbl_aut.aut_name,tbl_book.b_price,tbl_book.image_name FROM tbl_book,tbl_aut 
                                where tbl_book.b_auth= tbl_aut.aut_id and b_name LIKE '$search%'or tbl_aut.aut_name LIKE '$search%'";
                                if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<table class='table table-bordered table-striped'>";
                                            echo "<thead style=\"text-align:center\">";
                                                echo "<tr>";
                                                    echo "<th>Book Name</th>";
                                                    echo "<th>Book Author</th>";  
                                                    echo "<th>Book Price</th>";   
                                                    echo "<th>Book Image</th>";   
                                                    echo "<th>Action</th>";   
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                    echo "<td> " . $row[1] . "</td>";
                                                    echo "<td>" . $row[2] . "</td>";
                                                    echo "<td> Rs." . $row[3] . ".00</td>";
                                                    echo "<td><img src=images/$row[4] width=125px height=auto /></td>";
                                                    echo "<td style=\"    width: 104px;\">";
                                                        echo "<a href='read_book.php?id=". $row['b_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                        echo "<a href='update_book.php?id=". $row['b_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                        echo "<a href='delete_book.php?id=". $row['b_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";                            
                                        echo "</table>";
                                       
                                        mysqli_free_result($result);
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                            
                             
                                mysqli_close($link);
                            }
                            else
                            {
                                require_once "config.php";
                    
                               
                                $sql = "SELECT tbl_book.b_id,tbl_book.b_name,tbl_aut.aut_name,tbl_book.b_price,tbl_book.image_name FROM tbl_book,tbl_aut 
                                        where tbl_book.b_auth= tbl_aut.aut_id";
                                if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<table class='table table-bordered table-striped'>";
                                            echo "<thead style=\"text-align:center\">";
                                                echo "<tr>";
                                                    echo "<th>Book Name</th>";
                                                    echo "<th>Book Author</th>";  
                                                    echo "<th>Book Price</th>";   
                                                    echo "<th>Book Image</th>";   
                                                    echo "<th>Action</th>";   
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                    echo "<td> " . $row[1] . "</td>";
                                                    echo "<td>" . $row[2] . "</td>";
                                                    echo "<td> Rs." . $row[3] . ".00</td>";
                                                    echo "<td><img src=images/$row[4] width=125px height=auto /></td>";
                                                    echo "<td style=\"    width: 104px;\">";
                                                        echo "<a href='read_book.php?id=". $row['b_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                        echo "<a href='update_book.php?id=". $row['b_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                        echo "<a href='delete_book.php?id=". $row['b_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";                            
                                        echo "</table>";
                                       
                                        mysqli_free_result($result);
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                            
                              
                                mysqli_close($link);
                            }
                            ?>
                        </div>     
                    </div>
                </div>        
            </div>
        </div> 
    </body>
</html>

