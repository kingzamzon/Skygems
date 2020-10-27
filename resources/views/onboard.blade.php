<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Tutors on boarding</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('tutors/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="{{ asset('tutors/assets/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('tutors/assets/css/fontawesome-all.css') }}">
	<link rel="stylesheet" href="{{ asset('tutors/assets/css/style.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('tutors/assets/css/colors/switch.css') }}">
</head>

<body>
	<div class="clearfix"></div>

	
	<div class="wrapper">
		<div class="steps-area steps-area-fixed">
			<div class="image-holder">
				<img src="{{ asset('tutors/assets/img/side-img.jpg') }}" alt="">
			</div>
			<div class="steps clearfix">
				<ul class="tablist multisteps-form__progress">
					<li class="multisteps-form__progress-btn js-active current">
						<span>1</span>
					</li>
					<li class="multisteps-form__progress-btn">
						<span>2</span>
					</li>
					<li class="multisteps-form__progress-btn">
						<span>3</span>
					</li>
					<li class="multisteps-form__progress-btn">
						<span>4</span>
					</li>
					<li class="multisteps-form__progress-btn last">
						<span>5</span>
					</li>
				</ul>
			</div>
		</div>
		<form class="multisteps-form__form" action="#" id="wizard" method="POST">
			<div class="form-area position-relative">
				<!-- div 1 -->
				<div class="multisteps-form__panel js-active" data-animation="slideHorz">
					<div class="wizard-forms">
						<div class="inner pb-50 clearfix">
							<div class="form-content pera-content">
								<div class="step-inner-content">
									<span class="step-no">Step 1</span>
									<h2>What Subject do you wish to teach?</h2>
									<div class="step-box">
										<div class="budget-area">
											<select name="subject" class="valid" aria-invalid="false">
												<option>Biology</option>
												<option>Physics</option>
												<option>Economics</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.inner -->
						<div class="actions">
							<ul>
								<li class="disable" aria-disabled="true"><span class="js-btn-next" title="NEXT">Backward <i class="fa fa-arrow-right"></i></span></li>
								<li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- div 2 -->
				<div class="multisteps-form__panel" data-animation="slideHorz">
					<div class="wizard-forms">
						<div class="inner pb-50 clearfix">
							<div class="form-content pera-content">
								<div class="step-inner-content">
									<span class="step-no bottom-line">Step 2</span>
									<div class="step-progress float-right">
										<span>2 of 5 completed</span>
										<div class="step-progress-bar">
											<div class="progress">
												<div class="progress-bar"></div>
											</div>
										</div>
									</div>

									<h2>What type of class do you want to give?</h2>
									
									<div class="plan-area">
										<div class="plan-icon-text text-center active">
											<div class="plan-icon">
												<i class="fas fa-user"></i>
											</div>
											<div class="plan-text">
												<h3>Individual class</h3>
												<input type="radio" name="your_plan" value="Unlimited Plan" checked="">
											</div>
										</div>
										<div class="plan-icon-text text-center">
											<div class="plan-icon">
												<i class="fas fa-users"></i>
											</div>
											<div class="plan-text">
												<h3>Group class</h3>
												<input type="radio" name="your_plan" value="Unlimited Plan">
											</div>
										</div>
									</div>

									
									
								</div>
							</div>
						</div>
						<!-- /.inner -->
						<div class="actions">
							<ul>
								<li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
								<li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- div 3 -->
				<div class="multisteps-form__panel" data-animation="slideHorz">
					<div class="wizard-forms">
						<div class="inner pb-50 clearfix">
							<div class="form-content pera-content">
								<div class="step-inner-content">
									<span class="step-no bottom-line">Step 3</span>
									<div class="step-progress float-right">
										<span>3 of 5 completed</span>
										<div class="step-progress-bar">
											<div class="progress">
												<div class="progress-bar" style="width:40%"></div>
											</div>
										</div>
									</div>

									<h2>What is your rate for one hour lesson?</h2>

									<div class="step-content-area">
										<div class="input-group form-inner-area">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">
													<b> &#8358; </b> 
												</span>
											  </div>
											<input type="text" name="rate_hour" class="form-control" minlength="2" placeholder="114*" required>
										</div>
										<div class="services-select-option">
											<p>Where will your class be held?</p>
											<ul>
												<li class="bg-white active">
													<label>I can receive at home
														<input type="radio" name="class_held" value="Receive Home" checked="">
													</label>
												</li>
												<li class="bg-white">
													<label>I can travel to student home
														<input type="radio" name="class_held" value="Student Home">
													</label>
												</li>
												<li class="bg-white">
													<label>I can give online tution
														<input type="radio" name="class_held" value="Online Tution">
													</label>
												</li>
											</ul>
										</div>
										<div class="language-select d-none" select-language>
											<p>In what language can you give online tution: </p>
											<select name="languages" class="valid" aria-invalid="false">
												<option>English</option>
												<option>Arabic</option>
												<option>Spanish</option>
												<option>French</option>
											</select>
										</div>
									</div>
									
									
								</div>
							</div>
						</div>
						<!-- ./inner -->
						<div class="actions">
							<ul>
								<li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
								<li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- div 4 -->
				<div class="multisteps-form__panel" data-animation="slideHorz">
					<div class="wizard-forms">
						<div class="inner pb-50 clearfix">
							<div class="form-content pera-content">
								<div class="step-inner-content">
									<span class="step-no bottom-line">Step 4</span>
									<div class="step-progress float-right">
										<span>4 of 5 completed</span>
										<div class="step-progress-bar">
											<div class="progress">
												<div class="progress-bar" style="width:70%"></div>
											</div>
										</div>
									</div>

									<h2>Tell us more about yourself (40 words minimum)</h2>

									<div class="budget-area">
										<p>What's your background? </p>
										<div class="comment-box">
											<textarea name="extra-message" placeholder="I am a teacher ... I have been given private lesson since .... I have degree in ..."></textarea>
										</div>
									</div>
									<div class="budget-area">
										<p>What's your teaching methodology? </p>
										<div class="comment-box">
											<textarea name="extra-message" placeholder="My teaching method is ... I based my class on ... I approach each topic by ...."></textarea>
										</div>
									</div>

									

								</div>
							</div>
						</div>
						<!-- /.inner -->
						<div class="actions">
							<ul>
								<li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
								<li><span class="js-btn-next" title="NEXT">NEXT <i class="fa fa-arrow-right"></i></span></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- div 5 -->
				<div class="multisteps-form__panel" data-animation="slideHorz">
					<div class="wizard-forms">
						<div class="inner pb-50 clearfix">
							<div class="form-content pera-content">
								<div class="step-inner-content">
									<span class="step-no bottom-line">Step 5</span>
									<div class="step-progress float-right">
										<span>5 of 5 completed</span>
										<div class="step-progress-bar">
											<div class="progress">
												<div class="progress-bar" style="width:100%"></div>
											</div>
										</div>
									</div>
									<h2>Complete Final Step</h2>
									<p>Personal Information.</p>
									
									<div class="step-content-field">
										<div class="form-inner-area">
											<input type="text" name="full_name" class="form-control required" minlength="2" placeholder="First and last name *" required>
											<input type="email" name="email" class="form-control required" placeholder="Email Address *" required>
											<input type="text" name="phone" placeholder="Phone">
											<input type="text" name="username" placeholder="username*">
											<input type="password" name="password" placeholder="password*">
										</div>
										<div class="gender-selection">
											<h3>Gender:</h3>
											<div class="services-select-option">
												<ul>
													<li class="bg-white active">
														<label>Male
															<input type="radio" name="gender" value="Male"></label>
													</li>
													<li class="bg-white">
														<label>Female
															<input type="radio" name="gender" value="Female"></label>
													</li>
												</ul>
											</div>
										</div>

										<div class="address-selection">
											<h3>Your address:</h3>
											<div class="form-inner-area">
												<input type="text" name="address" class="form-control" minlength="20" placeholder="Your address*">
												<span>This address will never appear on the website. It will only be communicated to students whose lesson request you accept.</span>
											</div>
										</div>

										<div class="upload-documents">
											<h3>Upload Documents:</h3>
											<div class="upload-araa bg-white">
												<input type="hidden" value="" name="fileContent" id="fileContent">
												<input type="hidden" value="" name="filename" id="filename">
												<div class="upload-icon float-left">
													<i class="fas fa-cloud-upload-alt"></i>
												</div>
												<div class="upload-text">
													<span>( File accepted: pdf. doc/ docx  )</span>
												</div>
												<div class="upload-option text-center">
													<label for="attach">Upload The Documents</label>
													<input id="attach" style="visibility:hidden;" type="file">
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<!-- /.inner -->
						<div class="actions">
							<ul>
								<li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i> BACK </span></li>
								<li><button type="submit" title="NEXT" id="submit_form">SUBMIT <i class="fa fa-arrow-right"></i></button></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script src="{{ asset('tutors/assets/js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('tutors/assets/js/jquery.validate.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script src="{{ asset('tutors/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('tutors/assets/js/main.js') }}"></script>
	<script src="{{ asset('tutors/assets/js/switch.js') }}"></script>
	<script>
		$("#files").change(function() {
			filename = this.files[0].name
			// console.log(filename);
		});

		function UploadFile() {
			var reader = new FileReader();
			var file = document.getElementById('attach').files[0];
			reader.onload = function() {
				document.getElementById('fileContent').value = reader.result;
				document.getElementById('filename').value = file.name;
				document.getElementById('wizard').submit();
			}
			reader.readAsDataURL(file);
		}

		$('#submit_form').click(function(event) {
			event.preventDefault()
			var form_data = $('#wizard').serialize();
			console.log(form_data)
		})

		$('[name="class_held"]').change(function (event) {
			var selected = $(this).val()
			console.log("changed");
			if(selected == "Online Tution")
			{
				$('[select-language]').removeClass("d-none");
			}else {
				$('[select-language]').addClass("d-none");
			}
		});
	</script>
</body>

</html>