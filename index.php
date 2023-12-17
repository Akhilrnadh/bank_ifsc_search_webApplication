<?php
 include 'inc/dbh.inc.php';
 include "header.php";
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
	<title>Indian Bank IFSC Code Finder- Get Branch Name, IFSC Code, Contact no and much more...</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
 <div class="container bg-light">
 	<div align="center">
 		<div class="text-dark">
 			<h1>Indian Bank IFSC Code Finder</h1>
 		</div>
 
        <p class="alert alert-info">Get your bank details by filling the form below</p>
    </div>

    <?php
     //fetching data from db
    $sql = "SELECT * FROM bank_names;";
    $result = mysqli_query($con, $sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck > 0) {
    ?>

        <div class="row justify-content-center pb-3">
        	<div class="col-md-4" style="border: 1px solid black; padding: 15px;">
				<form method="POST" action="bankdetails.php">
					<div class="form-group">
						<label>Country</label>
						<select class="form-control" name="country">
							<option>India</option>
						</select>
					</div>
					<div class="form-group">
						<label>Bank Name</label>
						<?php
                         if (isset($_GET['type'])) {
                         	$type = $_GET['type'];
                         	if ($type == 'empty') {
                         		echo "<p class='alert alert-danger'>Please select your bank</p>";
                         	}
                         }
						?>
						<select class="form-control" name="name">
							<option selected disabled hidden>Select Your Bank</option>
							<?php
							while ($row = mysqli_fetch_assoc($result)) {
								$bank = $row['name'];
								$bank = strtoupper($bank);
							?>
							<option><?php echo $bank; ?></option>
							<?php
                             }
							?>
						</select>
					</div>
					<?php
                     }
					?>
					<div class="form-group">
						<label>State</label>
						<input class="form-control" type="text" name="state" placeholder="Enter Your State" autocomplete="off" required>
					</div>
					<div>
						<button name="submit" class="btn btn-success form-control">Search</button>
					</div>
				</form>
        	</div>
        </div>

 </div>

<?php
 include "footer.php";
?>