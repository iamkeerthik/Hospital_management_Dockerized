<?php
$con = mysqli_connect("db", "kirik", "kirik@123", "myhmsdb");

if(isset($_POST['adsub'])){
    $username = $_POST['username1'];
    $password = $_POST['password2'];

    $query = "SELECT * FROM admintb WHERE username='$username';";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verify the entered password with the hashed password from the database
        if(password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            header("Location: admin-panel1.php");
        } else {
            echo("<script>alert('Invalid Username or Password. Try Again!');
                  window.location.href = 'index.php';</script>");
        }
    } else {
        echo("<script>alert('Invalid Username or Password. Try Again!');
              window.location.href = 'index.php';</script>");
    }
}

if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointmenttb set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}




function display_docs()
{
	global $con;
	$query="select * from doctb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		# echo'<option value="" disabled selected>Select Doctor</option>';
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}

if(isset($_POST['doc_sub']))
{
	$name=$_POST['name'];
	$query="insert into doctb(name)values('$name')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}
