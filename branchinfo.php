<?php
 include 'inc/dbh.inc.php';
 include 'header.php';
?>
<?php
 if (isset($_GET['id'])) {
 	$id = $_GET['id'];
 	//echo $id;

 	$sql = "SELECT * FROM data WHERE id = '$id';";
 	$result = mysqli_query($con, $sql);
    $resultcheck = mysqli_num_rows($result);
    if ($resultcheck > 0) {
    	while ($row = mysqli_fetch_assoc($result)) {
    		$name = $row['name'];
    		$bank = $row['adr1'];
    		$ifsc = $row['ifsc'];
    		$micr = $row['micr'];
    		$cont = $row['contact'];
    		$adr2 = $row['adr2'];
    		$adr3 = $row['adr3'];
    		$adr4 = $row['adr4'];
    		$adr5 = $row['adr5'];
    	}
    }
 }
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="rating" content="General" />
  <meta name="robots" content="index, follow" />
  <meta name="revisit-after" content="1 days" />
  <meta name="googlebot" content="index,follow"/>
  <meta forua="true" http-equiv="Cache-Control" content="max-age=0"/>
  <meta name="language" content="English">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <title><?php echo $name; ?> Bank IFSC Code - Get Branch Name, IFSC Code, Contact no and much more...</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

  <div class="container bg-light">
  	<div align="center">
  		<h1><?php echo $name; ?>, <?php echo $bank; ?>, IFSC Code, Contact No, Address, MICR</h1>
  	</div>
       <p class='alert alert-success'>Here is the details</p>
  	   <div class="row justify-content-center pb-3">
        	<table class="table table-responsive-md table-striped">
        		<thead>
        			<th>Bank Name</th>
        			<th>IFSC Code</th>
        			<th>MICR</th>
        			<th>Contact</th>
        			<th>Address</th>
        		</thead>
        		<tbody>
        			<tr>
        				<td><?php echo $name; ?></td>
        				<td><?php echo $ifsc; ?></td>
        				<td><?php echo $micr; ?></td>
        				<td><?php echo $cont; ?></td>
        				<td><?php echo $bank; ?>, <?php echo $adr2; ?>, <?php echo $adr3; ?>, <?php echo $adr4; ?>, <?php echo $adr5; ?></td>
        			</tr>
                    <tr>
                        <td><td>
                        <td></td>
                        <td></td>
                        <td><a href="index.php" class="btn btn-success btn-sm">Go Home</a></td>
                    </tr>
        		</tbody>
        	</table>
        </div>


  	</div>
  </div>
  

<?php
 include 'footer.php';
?>