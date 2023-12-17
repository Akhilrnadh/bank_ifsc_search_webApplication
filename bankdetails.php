<?php
 include 'inc/dbh.inc.php';
 include 'header.php';
?>
<?php
if (isset($_POST['submit'])) {
	
	$name = $_POST['name'];
	$state = $_POST['state'];

  if (empty($name) || empty($state)) {
    header('Location: index.php?type=empty');
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<meta name="rating" content="General" />
  <meta name="robots" content="index, follow" />
  <meta name="revisit-after" content="1 days" />
  <meta name="googlebot" content="index,follow"/>
  <meta forua="true" http-equiv="Cache-Control" content="max-age=0"/>
  <meta name="language" content="English">
	<title><?php echo $name; ?> Bank IFSC Code - Get <?php echo $name; ?> <?php echo $state; ?> Branch Name, IFSC Code, Contact no and much more...</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

 <div class="container bg-light">
 	<div align="center">
 		<div class="text-dark">
 			<h1><?php echo $name; ?> <?php echo $state; ?> IFSC Code, Contact No, Address, MICR</h1>
 		</div>

 		<p>List of details on your entered query</p>
    </div>

        

        <?php
        $sql = "SELECT * FROM data WHERE name = '$name' and adr5 LIKE '%$state%';";
        $result = mysqli_query($con, $sql);
        $resultcheck = mysqli_num_rows($result);

        if ($resultcheck > 0) {
        	    echo "<p class='alert alert-success'>Available Branches</p>";
        	    echo "<p class='alert alert-info'>On computer click <strong>CTRL+F</strong> and search your bank easily by specifying city/town</p>";
        	    echo "<p class='alert alert-info'>On mobile click the 3 dots seen on the top right corner. Select <strong>search</strong> option and search your bank easily by specifying city/town</p>";
        	while ($row = mysqli_fetch_assoc($result)) {
        		?>
                 <li class="li"><a href="branchinfo.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> - <?php echo $row['adr1'] ?> - <?php echo $row['adr2'] ?> - <?php echo $row['adr3'] ?> - <?php echo $row['adr4'] ?></a></li>
                 <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        		<?php
        	}
        } else {
        	echo "<p class='alert alert-danger'>Sorry we cannot find any result, Make sure you have given the correct information <a class='btn btn-info btn-sm' href='index.php'>Click Here</a></p>";
        }
        ?>
 	
 </div>

<?php
 include 'footer.php';
?>