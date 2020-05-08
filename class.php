<?php
 if(array_key_exists('btn_add', $_POST)) 
 { 
    db_insert();
} 

if(array_key_exists('btn_aut', $_POST)) 
 { 
    db_auth_insert();
} 

if(array_key_exists('button1', $_POST)) 
 { 
    update_aut();
} 

if(array_key_exists('btn_book', $_POST)) 
 { 
	db_book_insert();
} 
if(array_key_exists('btn_all', $_POST)) 
 { 
	showall();
} 

function db_insert()
{
if(isset($_POST["txt_cat"]))
{
	
	$cat = $_POST["txt_cat"];

	
	
	$con = mysqli_connect("localhost","id13588939_venu","6o#nF$7vI6m}ii~F");
	mysqli_select_db($con,"id13588939_book");
	$sql = "INSERT INTO tbl_cat(cat_name) VALUES('$cat')";
	$ret = mysqli_query($con,$sql);
    mysqli_close($con);

    echo "<script type='text/javascript'>location.href = 'add_cat.php';</script>";
}
}

function db_auth_insert()
{
if(isset($_POST["txt_aut"]))
{
	
	$aut = $_POST["txt_aut"];

	
	
	$con = mysqli_connect("localhost","id13588939_venu","6o#nF$7vI6m}ii~F");
	mysqli_select_db($con,"id13588939_book");
	$sql = "INSERT INTO tbl_aut(aut_name) VALUES('$aut')";
	$ret = mysqli_query($con,$sql);
    mysqli_close($con);

    echo "<script type='text/javascript'>location.href = 'add_aut.php';</script>";
}
}

function upd_aut()
{
    if(isset($_POST["txt_aut"]))
{
	
	$aut = $_POST["txt_aut"];

	
	
	$con = mysqli_connect("localhost","id13588939_venu","6o#nF$7vI6m}ii~F");
	mysqli_select_db($con,"id13588939_book");
	$sql = "INSERT INTO tbl_aut(aut_name) VALUES('$aut')";
	$ret = mysqli_query($con,$sql);
    mysqli_close($con);

    echo "<script type='text/javascript'>location.href = 'add_aut.php';</script>";
}
}


function db_book_insert()
{
	if(isset($_POST["txt_name"]))
{
	
	$b_name = $_POST["txt_name"];
	$b_pub = $_POST["date_pub"];
	$b_price = $_POST["txt_price"];
	$b_medium = $_POST["cmb_medium"];
	$image_name = $_FILES["imgfile"]["name"];
	$b_cat = $_POST["cmb_cat"];
	$b_auth = $_POST["cmb_aut"];
	$b_isbn = $_POST["txt_isbn"];
	$con = mysqli_connect("localhost","id13588939_venu","6o#nF$7vI6m}ii~F");
	mysqli_select_db($con,"id13588939_book");
	$sql = "SELECT * FROM tbl_book where b_isbn='$b_isbn'";
	$ret = mysqli_query($con,$sql);
		
		if($row = mysqli_fetch_array($ret))
		{
		echo '<script>alert("You Have entered existing ISBN Number");location.href = \'add_book.php\';</script>'; 
		}
		else 
		{
			move_uploaded_file($_FILES['imgfile']['tmp_name'], "images/$image_name");
			
			$con = mysqli_connect("localhost","id13588939_venu","6o#nF$7vI6m}ii~F");
	mysqli_select_db($con,"id13588939_book");
			$sql = "INSERT INTO tbl_book(b_name,b_pub,b_price,b_isbn,b_medium,b_cat,b_auth,image_name)
			 VALUES('$b_name','$b_pub','$b_price','$b_isbn','$b_medium','$b_cat','$b_auth','$image_name')";
			$ret = mysqli_query($con,$sql);
			
			echo '<script>alert("Number of book inserted 1");location.href = \'add_book.php\';</script>'; 
		
			mysqli_close($con);
		}  
}
}

function showall()
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



