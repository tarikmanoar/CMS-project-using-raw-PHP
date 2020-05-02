<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<title>Hello, world!</title>
		<style type="text/css" media="screen">
			body{position: relative;}
			.colorBoxOuter{position: fixed;width:195px;height: 200px;display:block;top: 180px;left: 0px;background:#444;text-align: center;z-index: 99999}
			span.red_color{width: 30px; height: 30px;display: block;margin-left: 20px;border-radius: 50%;float: left;background: #FF0000;    margin-top: 20px;}
			span.green_color{width: 30px; height: 30px;display: block;margin-left: 20px;border-radius: 50%;float: left;background:#00804B ;    margin-top: 20px;}
			span.blue_color{width: 30px; height: 30px;display: block;margin-left: 20px;border-radius: 50%;float: left;background:#0000FF ;    margin-top: 20px;}
			span.pink_color{width: 30px; height: 30px;display: block;margin-left: 20px;border-radius: 50%;float: left;background:#FFC0CB ;    margin-top: 20px;}
			span.yellow_color{width: 30px; height: 30px;display: block;margin-left: 20px;border-radius: 50%;float: left;background:#FFFF00 ;    margin-top: 20px;}
			span.lime_color{width: 30px; height: 30px;display: block;margin-left: 20px;border-radius: 50%;float: left;background:#00FF00 ;    margin-top: 20px;}
			.spiner_button{width: 50px;height: 50px;background: #cc9900;display: block;position: absolute;right: -50px;top: 91%;z-index: 99999;text-align: center;font-size: 30px;color:#fff;padding-top: 5px;border-radius: 0px 10px 10px 0px;left:7%;}
			/* Dynamic color */
			body.red_color_bar{background:#FF0000}
			body.green_color_bar{background:#00804B}
			body.blue_color_bar{background:#0000FF}
			body.pink_color_bar{background:#FFC0CB}
			body.yellow_color_bar{background:#FFFF00}
			body.lime_color_bar{background:#00FF00}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
					Click Me
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Modal titleModal titleModal title</h4>
								</div>
								<div class="modal-body">
									...
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<a href="index.php"><button type="button" class="btn btn-primary">Save changes</button></a>
								</div>
							</div>
						</div>
					</div><br><br>
					<div class="col-lg-12">
						<p class="btn btn-primary" onclick="wow()">Click Me</p>
						<script type="text/javascript">
							function wow(){
								swal({
									title: "Good job!",
									text: "You clicked the button!",
									icon: "success",
									buttons: {
										cancel: true,
										confirm: true,
									},
								});
							}
						</script>
					</div><br><br><br>

					<div class="colorBoxInner">
						<div class="spiner_button inOut" onclick="myFunction()" ><i class="fas fa-spider"></i></div>
						<div class="colorBoxOuter"id="spin">
							<span class="red_color"></span>
							<span class="blue_color"></span>
							<span class="yellow_color"></span>
							<span class="green_color"></span>
							<span class="pink_color"></span>
							<span class="lime_color"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<script type="text/javascript" charset="utf-8">
			$("span.red_color").click(function(){
				$("body").addClass("red_color_bar").removeClass("green_color_bar yellow_color_bar  green_color_bar blue_color_bar pink_color_bar lime_color_bar");
			});
			$("span.green_color").click(function(){
				$("body").addClass("green_color_bar").removeClass(" yellow_color_bar red_color_bar green_color_bar blue_color_bar pink_color_bar lime_color_bar");
			});
			$("span.yellow_color").click(function(){
				$("body").addClass("yellow_color_bar").removeClass("green_color_bar  red_color_bar green_color_bar blue_color_bar pink_color_bar lime_color_bar");
			});
			$("span.blue_color").click(function(){
				$("body").addClass("blue_color_bar") .removeClass("green_color_bar yellow_color_bar red_color_bar green_color_bar  pink_color_bar lime_color_bar");
			});
			$("span.pink_color").click(function(){
				$("body").addClass("pink_color_bar").removeClass("green_color_bar yellow_color_bar red_color_bar green_color_bar blue_color_bar lime_color_bar");
			});
			$("span.lime_color").click(function(){
				$("body").addClass("lime_color_bar").removeClass("green_color_bar yellow_color_bar red_color_bar green_color_bar blue_color_bar pink_color_bar");
			});
		</script>
		<script type="text/javascript" charset="utf-8">
			
			// Hide show
			function myFunction() {
			  var x = document.getElementById("spin");
			  if (x.style.display === "none") {
			    x.style.display = "block";
			  } else {
			    x.style.display = "none";
			  }
			}
		</script>
	</body>
</html>