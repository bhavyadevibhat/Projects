  
		  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">FARMIGOS</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>

              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter Location</a>
             

              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	

<?php $stmt = $admin->ret("SELECT * FROM `farmer` INNER JOIN `location` ON location.l_id=farmer.l_id ");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ ?>

              	<a class="dropdown-item" href="product.php?id=<?php echo $row['f_id'] ; ?>"><?php echo $row['l_name'] ; ?></a>

              <?php } ?>
              </div>
             


           
             
            
            </li>

	          
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
			  <li class="nav-item"><a href="status.php" class="nav-link">Status</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="register.php">Register</a>
				  <a class="dropdown-item" href="profile.php">Manage Profile</a>
              	<a class="dropdown-item" href="controller/logout.php">Logout</a>
			  <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
			  <li class="nav-item"><a href="cart.php" class="nav-link">Cart<span class="icon-shopping_cart"></a></li>
			  
	        </ul>
	      </div>
	    </div>
	  </nav>
		  