<!DOCTYPE html>
<html>
<head>
	<title>Lizards Bot</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/font/css/font-awesome.css">
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand active" href="../index.php">Lizard Bot</a>
	    </div>

	    <div id="navbar" class="navbar-collapse collapse">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="../privacy/"><i class="fa fa-lock"></i> Privacy</a></li>
	        <li class="active"><a href="../contact/"><i class="fa fa-volume-control-phone"></i> Contact Us</a></li>
	        <li><a href="../terms/termsfeed-terms-conditions-pdf-english.pdf"><i class="fa fa-file-pdf-o"></i> Terms and Conditions</a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</nav>
	<br /><br />
	<div class="container">	
		<div class="row">
			<div class="col-md-6">
				<h1 class="lead">Welcome to lizard Bot</h1>
				<hr />
				<form id="form" method="post" onsubmit="return sendMail()">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="name">What is your name</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" id="name" name="name" placeholder="Your Name" required="" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="email">What is your email address</label>
									<div class="input-group">
										<span class="input-group-addon">@</span>
										<input type="email" id="email" name="email" placeholder="Your Email" required="" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<textarea class="form-control" id="message" cols="20" rows="3" placeholder="Tell us your opinion, share your ideas with lizard bot developers"></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-success col-md-12">Send Your Feedback to Lizard Developer's Team </button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div id="form-stat"></div>
			</div>
			<div class="col-md-6">
				<!--slide shows -->
				<h1 class="lead">How can we improve.</h1>
				<hr />
				<div class="thubmnails">
					<img class="img-square" src="../assets/img/example.JPG" height="50%" width="50%">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<br />
				<p>
					The lizard bot is design for user interaction and experience. please tell your what you think and express your feedback on the review book. we are very persistence in provide our users with the best quality assurance experience they deserve.
				</p>
			</div>
		</div>
	</div>
	<hr />
	<div class="container">
		<div class="row">
			<div class="footer">
				<div> 
					Copyright protected &copy; <?= date("Y"); ?> Design and Developed by Ama Technology Team 
					<a href="https://www.amatechteam.com">www.amatechteam.com</a>
				</div>
			</div>	
		</div>
	</div>
	<script type="text/javascript">
		function sendMail(){
			var name = $("#name").val();
			$("#form").slideUp();
			$("#form-stat").html('<ul class="list-group"><li class="list-group-item"><b>'+name+'</b>, <br />Thanks for your feedback, we will look forward into providing our best contribution</li></ul>').fadeIn('fast');
			
			return false;
		}
	</script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</body>
</html>