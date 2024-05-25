<!doctype html>
<html lang="en">
  <head>
  	<title>LL Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
						<i class="fa fa-bars"></i>
						<span class="sr-only">Toggle Menu</span>
					</button>
				</div>
				<div class="p-4">
					<h1><a href="index.html" class="logo"><img src="images/logohotel.png"></h1> 
					<ul class="list-unstyled components mb-5">
						<li>
							<a href="HotelHome.php"><span class="fa fa-home mr-3"></span> Home</a>
						</li>
						<li class="active">
							<a href="UserTable.php"><span class="fa fa-user mr-3"></span> User Management</a>
						</li>
						<li>
							<a href="RoomTable.php"><span class="fa fa-briefcase mr-3"></span> Rooms Table</a>
						</li>
						<li>
							<a href="ReservationTable.php"><span class="fa fa-sticky-note mr-3"></span> Reservation Table</a>
						</li>
						<li>
							<a href="AmenityTable.php"><span class="fa fa-paper-plane mr-3"></span> Amenity Table</a>
						</li>
					</ul>
				</div>
			</nav>

        <!-- Page Content  -->



      <div id="content" class="p-4 p-md-5 pt-5">

      <div class="content-container">
          <!-- Title Description -->
          <div class="hotel-description">
            <h1>User Management</h1>
            <p>You are in Admin View</p>
          </div>

		<table class="table">
			<thead>
				<tr>
					<th>User ID</th>
					<th>Full Name</th>
					<th>Role</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Lorenz Bonifacio</td>
					<td>Admin</td>
					<td>lbonifacio</td>
					<td>1234</td>
					<td>lbonifacio@gmail.com</td>
					<td><button type="button" class="btn btn-success" data-bs-dismiss="modal">Edit</button></td>
					<td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Laurenz Briones</td>
					<td>Admin</td>
					<td>lbriones</td>
					<td>5678</td>
					<td>lbriones@gmail.com</td>
					<td><button type="button" class="btn btn-success" data-bs-dismiss="modal">Edit</button></td>
					<td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Jason Agilada</td>
					<td>Customer</td>
					<td>jasonalamillo123</td>
					<td>101010</td>
					<td>jasonalamillo@gmail.com</td>
					<td><button type="button" class="btn btn-success" data-bs-dismiss="modal">Edit</button></td>
					<td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button></td>
				</tr>
				<tr>
					<td>4</td>
					<td>Ravin Agon</td>
					<td>Customer</td>
					<td>ravinagon123</td>
					<td>908070</td>
					<td>ravinagon@gmail.com</td>
					<td><button type="button" class="btn btn-success" data-bs-dismiss="modal">Edit</button></td>
					<td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Kirby Pada</td>
					<td>Customer</td>
					<td>kirbypada123</td>
					<td>654321</td>
					<td>kirbypada@gmail.com</td>
					<td><button type="button" class="btn btn-success" data-bs-dismiss="modal">Edit</button></td>
					<td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button></td>
				</tr>
				<tr>
					<td>6</td>
					<td>Cassey Dela Cuz</td>
					<td>Customer</td>
					<td>casseydelacuz123</td>
					<td>246810</td>
					<td>casseydelacuz@gmail.com</td>
					<td><button type="button" class="btn btn-success" data-bs-dismiss="modal">Edit</button></td>
					<td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button></td>
				</tr>
				<tr>
					<td>7</td>
					<td>Marko Alamillo</td>
					<td>Customer</td>
					<td>markoalamillo123</td>
					<td>135790</td>
					<td>markoalamillo@gmail.com</td>
					<td><button type="button" class="btn btn-success" data-bs-dismiss="modal">Edit</button></td>
					<td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button></td>
				</tr>
			</tbody>
		</table>

	</div>

</div>
</div>
		

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>