<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link
			href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap"
			rel="stylesheet"
		/>
        <link rel="stylesheet" href="./style2.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./style2.css" />
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
		<title>Landing Page</title>
    </head>
    <body>
        
        <header>
            <div class="logo-container">
                <h4 class="logo">Venu Book Shop</h4>
                <img src="./img/logo1.png" width="60px">
                <img src="" width="60px">
            </div>

            <nav>
                <ul class="nav-links">
                    <li class="nav-link" ><a href="dash.php" style="text-decoration: none;color:#5f5f79;">DASH BOARD</a></li>
                    <li class="nav-link" ><a href="add_book.php" style="text-decoration: none;color:#5f5f79;">ADD BOOKS</a></li>
                    <li class="nav-link" ><a href="add_cat.php" style="text-decoration: none;color:#070707;">ADD CATEGORY</a></li>
                    <li class="nav-link" ><a href="add_aut.php" style="text-decoration: none;color:#5f5f79;">ADD AUTHOR</a></li>
                </ul>
            </nav>
            <div class="cart">
            <form class="sel_cal" action="logout.php" method="POST" >
    
                           <input class="login" name="btn_logout" type="submit" value="Logout">
                </form>
               
            </div>
        </header>

        <h1 class="heading">ADD CATEGORY</h1>
       <hr>

       <form class="cat-form" action="class.php" method="POST" name="add-cat">
        CATEGORY NAME: <input class="txt-box" type="text" name="txt_cat" placeholder="Username">
        <input class="btn-cat" name="btn_add" type="submit" value="SUBMIT">
       </form>

       <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" >Category Details</h2>
                    </div>
                    <?php
                    
                    require_once "config.php";
                    
                    
                    $sql = "SELECT * FROM tbl_cat";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                       
                                        echo "<th>Name</th>";  
                                        echo "<th>Action</th>";   
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                       
                                        echo "<td>" . $row[1] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read_cat.php?id=". $row['cat_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update_cat.php?id=". $row['cat_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete_cat.php?id=". $row['cat_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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
                    ?>
                </div>
            </div>        
        </div>
        </div>
       
    </body>
</html>
