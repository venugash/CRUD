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
		<title>Landing Page</title>
    </head>
    <body>
        
        <header>
            <div class="logo-container">
                <h4 class="logo">Venu Book Shop</h4>
                <img src="./img/logo1.png" width="60px">
            </div>

            <nav>
                <ul class="nav-links">
                    <li class="nav-link" ><a href="dash.php" style="text-decoration: none;color:#5f5f79;">DASH BOARD</a></li>
                    <li class="nav-link" ><a href="add_book.php" style="text-decoration: none;color:#070707;">ADD BOOKS</a></li>
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

        <h1 class="heading">ADD BOOK</h1>
       <hr>

       <form  action="class.php" method="POST" enctype="multipart/form-data" >
        
            <table class="new-table">
                <tr>
                <td>BOOK NAME:</td>
                <td><input class="txt-box1" type="text" name="txt_name" placeholder="Book Name"></td>
                </tr>
                <tr>
                <td>YEAR OF PUBLISHING:</td>
                <td><input class="date-pick" type="date" id="birthday" name="date_pub"></td>
                </tr>
                <tr>
                <td>PRICE:</td>
                <td><input class="txt-box1" type="number" name="txt_price" placeholder="Book Price"></td>
                </tr>
                <tr>
                <td>ISBN:</td>
                <td><input class="txt-box1" type="text" name="txt_isbn" placeholder="Book ISBN"></td>
                </tr>
                <tr>
                <td>MEDIUM:</td>
                <td><select name="cmb_medium">
                <option value="Sinhala">Sinhala</option>
                <option value="Tamil">Tamil</option>
                <option value="English">English</option>
                </select>
                </td>
                </tr>
                <tr>
                <td>IMAGE:</td>
                <td><input type="file" name="imgfile" dummy_image.png /></td>
                </tr>
                <tr>
                <td>CATEGORY:</td>
                <td><?php
                                    
                                    require_once "config.php";
                                    
                                   
                                    $sql = "SELECT * FROM tbl_cat";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            echo"<select name=\"cmb_cat\" >";
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

                </td>
                 </tr>
                 <tr>
                <td>AUTHOR:</td>
                <td><?php
                                    
                                    require_once "config.php";
                                    
                                    
                                    $sql = "SELECT * FROM tbl_aut";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            echo"<select name=\"cmb_aut\"  >";
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
                                    mysqli_close($link);
                    ?>

                </td>
                 </tr>
                 <tr>
                 <td>
                 <input class="btn-book" name="btn_book" type="submit" value="SUBMIT"></td>
                </tr>
    
            </table>
               
         </form>

       
    </body>
    
</html>