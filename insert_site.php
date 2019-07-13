<!DOCTYPE html>

<html> 

	
	<head> <! Title and bootstrap4 integration>

			<title> Dummy Google Search Engine </title>
			
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body> <! starting of the body>
			
			<div class="container">
			
				<br>
			
			
				<center> <h2> <b> Insert Website </b> </center>
				
				</br>
				
				<form action = "insert_site.php" method="post" enctype="multipart/form-data">
				
					<div class="form-group"> 
				
						<div class="row">
					         <label class="col-sm-2" for="stitle"> Site Title </label>

								<div class = "col-sm-10">
					
								  <input type="text" class="form-control" id="stitle" name="s_title" placeholder="Enter Site Title" required>
								 
								</div>
						</div>
						
					</div>
					
					<div class="form-group"> 
				
						<div class="row">
							<label class="col-sm-2" for="slink"> Site Link </label>

								<div class = "col-sm-10">
					
								  <input type="text" class="form-control" id="slink" name="s_link" placeholder="Enter Site Link" required>
								 
								</div>
						</div>
					</div>
					
					<div class="form-group"> 
				
						<div class="row">
							<label class="col-sm-2" for="slink"> Site Keywordrs </label>

								<div class = "col-sm-10">
					
								  <input type="text" class="form-control" id="skey" name="s_key" placeholder="Enter Site Keywordrs" required>
								 
								</div>
						</div>
					</div>
					
					<div class="form-group"> 
				
						<div class="row">
							<label class="col-sm-2" for="slink"> Site Description </label>

								<div class = "col-sm-10">
					
								  <textarea class="form-control" id="sdes" name="s_des" placeholder="Enter Site Description "required> </textarea>
								 
								</div>
						</div>
					</div>
					
					<div class="form-group"> 
				
						<div class="row">
							<label class="col-sm-2" for="slink"> Site Image </label>

								<div class = "col-sm-10">
					
								  <input type="file" class="form-control" name="simg" required>
								 
								</div>
						</div>
					</div>
					
					
					<div class="form-group"> 
				
						<div class="row">
							<center>
							   <input type="submit" class="btn btn-outline-success" name="submit" value="Add Website">
							   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							   <input type="reset" class="btn btn-outline-danger" name="cancel" value="Cancel">
							</center>
						</div>
					</div>
					
				
				</form>
			
			</div>
			
			
			
			
			
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
			crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
			integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
			integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>

</html>

<?php

$con=mysqli_connect("localhost" , "root" , "" ,"search"); //Updated


/* mysqli_select_db("search");*/

if(isset($_POST["submit"]))

	{
		 $s_title =addslashes ($_POST["s_title"]);
		 $s_link =addslashes($_POST["s_link"]);
		 $s_key =addslashes($_POST["s_key"]);
		 $s_des =addslashes($_POST["s_des"]);
		 $_simg =addslashes($_FILES["simg"] ["name"]);
	


		 if(move_uploaded_file($_FILES["simg"]["tmp_name"],"img/". $_FILES["simg"] ["name"]))

		{

			$sql = "INSERT INTO website(site_title,site_link,site_key,site_des,site_img) VALUES ('$s_title',
			'$s_link','$s_key','$s_des','$_simg')";
		
			$rs = mysqli_query($con,$sql); //Updated
	
				if($rs)
					{
						echo "<script> alert ('Site uploaded sucessfully') </script>";
		
					}
	
				else
	
					{
						echo "<script> alert ('Uploading Failed ! Please Try Again !!') </script>";
						
					}
	

		} 	
	
	}


?>
