<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Binarization Image with OpenCV</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-lightbox.min.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>

		<div id="wrap">
			<div class="container">

				<div class="row">
					<div class="span12">
						<div id="header">
							<h1>Binarization Image with OpenCV</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="span12">

						<div id="msgbox" class="alert" style="display: none;">
							<span class="close" data-dismiss="alert">x</span>
							<p>Oops, something went wrong.</p>
						</div>

						<div id="dropbox">

							<form id="form-upload" enctype="multipart/form-data" action="./binarizationImage/binarizationImage.php" method="POST" style="display: block;">
								<p>Drop your image here</p>
								<p>or</p>
								<p>
									<input id="file-input" type="file" name="image" />
									<button id="select-btn" class="btn btn-large btn-primary">Select from disk</button>
								</p>
							</form>

							<div id="progress" style="display: none;">
								<p>Uploading....</p>
								<div class="progress progress-striped active">
									<div class="bar" style="width: 50%;"></div>
								</div>
							</div>

							<div id="results" style="display: none;">
								<div class="source-img"></div>
								<div class="lightbox hide fade" tabindex="-1" role="dialog">
									<div class="lightbox-content"></div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="span12">
						<div id="actions" style="display: none;">
							<a href="/" id="restart-btn" class="btn btn-large btn-primary">Restart Binarization Image</a>
						</div>
					</div>
				</div>

			</div>
		</div>

		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/bootstrap-lightbox.js"></script>
		<script src="assets/js/app.js"></script>
	</body>
</html>
