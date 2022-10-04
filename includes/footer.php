<?php include_once 'connection.php';
	$url = $_SERVER['HTTP_HOST'];
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$email = strip_tags($email);
		$email = str_replace(' ', '', $email);
		$email = mysqli_real_escape_string($con, $email);

		if (strlen($email) != '') {
			$sql = "SELECT * FROM `newsletters` WHERE email = '$email'";
			if (mysqli_num_rows(mysqli_query($con, $sql)) > 0) {
				echo "<script>alert('You have Already Subscribe To Our News Letters')</script>";
			} else {
				$sql = "INSERT INTO `newsletters`(`email`) VALUES ('$email')";
				if (mysqli_query($con, $sql)) {
					echo "<script>alert('Thank You For Subscribing To Our News Letters')</script>";
				}
			}
		}
	}

?>

<!-- <div class="container"> -->
  <footer class="py-5 bg-zoom mt-5 footer">
  	<?php if($role == 1) echo "<main>"; ?>
	  	<div class="container">
		    <div class="row">
		      <div class="col-2 text-light">
		      	<img src="<?php echo 'http://'.$url; ?>/zoomlion/img/zoomlion.png" alt="zoomlion" width="100%">
		        <!-- <h5>Section</h5>
		        <ul class="nav flex-column">
		          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
		          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
		          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
		          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
		          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
		        </ul> -->
		      </div>

		      <div class="col-2 text-warning">
		        <h5 class="text-warning">Section</h5>
		        <ul class="nav flex-column">
		          <li class="nav-item mb-2"><a href="<?php echo 'http://'.$url; ?>/zoomlion/<?php if($role == 1) echo 'admin/'; ?>index.php" class="nav-link p-0 text-light">Home</a></li>
		          <!-- <li class="nav-item mb-2"><a href="<?php echo 'http://'.$url; ?>/zoomlion/<?php //if($role == 1) echo 'admin/'; ?>subscribe.php" class="nav-link p-0 text-light">Subscriptions</a></li> -->
		          <!-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li> -->
		          <li class="nav-item mb-2"><a href="#FAQ" class="nav-link p-0 text-light">Contact</a></li>
		          <li class="nav-item mb-2"><a href="<?php echo 'http://'.$url; ?>/zoomlion/<?php //if($role == 1) echo 'admin/'; ?>about.php" class="nav-link p-0 text-light">About</a></li>
		        </ul>
		      </div>

		      <div class="col-2 text-warning">
		        <h5 class="text-warning">Section</h5>
		        <ul class="nav flex-column">
		          <!-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li> -->
		          <!-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Subscriptions</a></li> -->
		          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
		          <li class="nav-item mb-2"><a href="#FAQ" class="nav-link p-0 text-light">FAQs</a></li>
		          <!-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li> -->
		        </ul>
		      </div>

		      <div class="col-4 offset-1 text-light">
		        <form method="post">
		          <h5 class=" text-warning">Subscribe to our newsletter</h5>
		          <p>Monthly digest of whats new and exciting from us.</p>
		          <div class="d-flex w-100 gap-2">
		            <label for="newsletter" class="visually-hidden">Email address</label>
		            <input id="newsletter" type="email" name="email" class="form-control form-control-lg" placeholder="Email address">
		            <button class="btn btn-light text-zoom fw-bold" name="submit" type="submit">Subscribe</button>
		          </div>
		        </form>
		      </div>
		    </div>

		    <div class="d-flex justify-content-between py-3 my- border-top text-light">
		      <p>&copy; 2021 Company, Inc. All rights reserved.</p>
		      <ul class="list-unstyled d-flex">
		        <li class="ms-3"><a class="link-light  fa-2x" href="#"><i class="fab fa-twitter-square"></i></a></li>
		        <li class="ms-3"><a class="link-light  fa-2x" href="#"><i class="fab fa-instagram"></i></a></li>
		        <li class="ms-3"><a class="link-light  fa-2x" href="#"><i class="fab fa-facebook-square"></i></a></li>
		      </ul>
		    </div>
		</div>
	<?php if($role == 1) echo "<main>"; ?>
  </footer>
<!-- </div> -->

<!-- <script src="<?php echo 'http://'.$url; ?>/zoomlion/js/bootstrapcdn-4.0.0.bootstrap.min.js?style=<?= time(); ?>"></script> -->
<script src="<?php echo 'http://'.$url; ?>/zoomlion/js/bootstrap.bundle.min.js?style=<?//= time(); ?>"></script>
<!-- <script src="<?php echo 'http://'.$url; ?>/zoomlion/js/bootstrap@5.2.0-beta1.min.js?style=<?= time(); ?>"></script> -->
<script src="<?php echo 'http://'.$url; ?>/zoomlion/js/code.jquery.com-jquery-3.6.0.js?style=<?= time(); ?>"></script>
<!-- <script src="<?php echo 'http://'.$url; ?>/zoomlion/js/code.jquery.com-jquery-3.6.0.js?style=<?= time(); ?>"></script> -->
<script src="<?php echo 'http://'.$url; ?>/zoomlion/js/index.js?style=<?= time(); ?>"></script>