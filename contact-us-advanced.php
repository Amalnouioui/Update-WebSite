<?php
session_start();

include("php/simple-php-captcha/simple-php-captcha.php");
include("php/php-mailer/PHPMailerAutoload.php");

// Step 1 - Enter your email address below.
$to = 'commercial@itsolution-tn.com';

if(isset($_POST['emailSent'])) {

	$subject = $_POST['subject'];

	// Step 2 - If you don't want a "captcha" verification, remove that IF.
	if (strtolower($_POST["captcha"]) == strtolower($_SESSION['captcha']['code'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];

		// Step 3 - Configure the fields list that you want to receive on the email.
		$fields = array(
			0 => array(
				'text' => 'Name',
				'val' => $_POST['name']
			),
			1 => array(
				'text' => 'Email address',
				'val' => $_POST['email']
			),
			2 => array(
				'text' => 'Message',
				'val' => $_POST['message']
			),
			3 => array(
				'text' => 'Type du projet',
				'val' => implode($_POST['checkboxes'], ", ")
			),
			4 => array(
				'text' => 'Avancement du projet',
				'val' => $_POST['radios']
			)
		);

		$message = "";

		foreach($fields as $field) {
			$message .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "<br>\n";
		}

		$mail = new PHPMailer;

		$mail->IsSMTP();                                      // Set mailer to use SMTP
		$mail->SMTPDebug = 2;                                 // Debug Mode

		// Step 4 - If you don't receive the email, try to configure the parameters below:

		$mail->Host = 'ssl0.ovh.net';				  // Specify main and backup server
		$mail->Port=465;
		$mail->SMTPAuth = true;                             // Enable SMTP authentication
		$mail->Username = 'commercial@itsolution-tn.com';             		  // SMTP username
		$mail->Password = 'itso2016';                         // SMTP password
		$mail->SMTPSecure = 'ssl';                          // Enable encryption, 'ssl' also accepted

		$mail->From = $email;
		$mail->FromName = $_POST['name'];
		$mail->AddAddress($to);
		$mail->AddReplyTo($email, $name);

		$mail->IsHTML(true);

		$mail->CharSet = 'UTF-8';

		$mail->Subject = $subject;
		$mail->Body    = $message;

		// Step 5 - If you don't want to attach any files, remove that code below
		if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
			$mail->AddAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
		}

		if($mail->Send()) {
			$arrResult = array('response'=> 'success');
		} else {
			$arrResult = array('response'=> 'error', 'error'=> $mail->ErrorInfo);
		}

	} else {

		$arrResult['response'] = 'captchaError';

	}

}
?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title>Contact Us  | ITSolution tunisie Solutions IT : Technologie de l'information, developpement site web, integration solution open source, data center, reseau, systeme, securite</title>
		<meta name="keywords" content="itsolution tunisie,website design tunisie,application developpement tunisie,Intégration solution open source,seo,technical support,logo design, it specialise,designing solutions,web page design,securite reseau,data center,systeme,tracking solutions,mooc tunisie,information technologies,Ingénierie Logicielle,html5,CSS3,PHP5,javascript,JQuery,ajax,Java/JEE,dotNet,VB,Android,bash,Windows,Linux,MySQL,SQL Server,PostgreSQL,MongoDB,OpenLDAP,FreeRadius,Asterisk,Apache,Nginx,Tomcat,VMware,Hyper-V,Cisco Router,Cisco Switching,Cisco ASA,Cisco PIX,IPS,IDS,802.1X,Syslog,ITSolution contact" />
		<meta name="description" content="société d’ingénierie informatique basée à Tunis. ITSolution est un éditeur de solutions à très forte valeur ajoutée spécialisé dans le domaine des nouvelles technologies misant sur l’innovation et l’expertis. ITSolution propose à ses clients des solutions individuelles sur-mesure spécialisée dans les technologies de l'information, ingénierie Logicielle, consulting, réseau, Intégration, audits, conseils, formations, informatique..."/>
		<meta name="author" content="ITSolution tunisie Solutions IT">
		<meta name="publisher" content="ITSolution tunisie Solutions IT">
		<meta name="Category" content="business" />
		<meta name="copyright" content="Copyright © ITSolution tunisie 2010" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<meta http-equiv="Content-Language" content="fr" />
		<meta name="Language" content="fr-FR">
		<meta name="webcrawlers" content="ALL">
		<meta name="spiders" content="ALL">
		<meta name="distribution" content="Global,Tunisia">
		<meta name="robots" content="index,follow">
		<meta name="revisit-after" content="7 days">
		<meta name="email" content="commercial@itsolution-tn.com">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="index" href="http://www.itsolution-tn.com/index.html" /> 
		<link rel="alternate" hreflang="fr" href="http://www.itsolution-tn.com/" />
		<link rel="alternate" href="http://www.itsolution-tn.com/" hreflang="x-default" />
		<link rel="canonical" href="http://www.itsolution-tn.com/" />
		<link rel="publisher" type="text/html" title="ITSolution tunisie Solutions IT" href="http://www.itsolution-tn.com/" />
		<link rel="shortcut icon" href="http://www.itsolution-tn.com/img/ITSolution-tunisie-favicon.jpg" />
		<link rel="apple-touch-icon-precomposed" href="http://www.itsolution-tn.com/img/ITSolution-tunisie-favicon.png" />
		<meta property="og:locale" content="fr_FR" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="ITSolution tunisie Solutions IT" />
		<meta property="og:description" content="société d’ingénierie informatique basée à Tunis. ITSolution est un éditeur de solutions à très forte valeur ajoutée spécialisé dans le domaine des nouvelles technologies misant sur l’innovation et l’expertis. ITSolution propose à ses clients des solutions individuelles sur-mesure spécialisée dans les technologies de l'information, ingénierie Logicielle, consulting, réseau, Intégration, audits, conseils, formations, informatique..." />
		<meta property="og:url" content="http://www.itsolution-tn.com/" />
		<meta property="og:site_name" content="ITSolution tunisie Solutions IT" />
		<meta property="article:publisher" content="https://www.facebook.com/itsolution.tunisie?fref=ts" />
		<meta property="og:image" content="http://www.itsolution-tn.com/img/logo-itsolution-solutions-it.png" />
		<meta name="twitter:card" content="summary"/>
		<meta name="twitter:description" content="The company IT Solutions is specialized on computer engineering offering a wide range of services and products to secure and optimize the Information System"/>
		<meta name="twitter:title" content="ITSolution tunisie Solutions IT"/>
		<meta name="twitter:site" content="@itsolution_tn"/>
		<meta name="twitter:domain" content="ITSolution tunisie Solutions IT"/>
		<meta name="twitter:image:src" content="https://pbs.twimg.com/profile_images/684360773364232193/6S9Tg_F1_400x400.png"/>
		<meta name="twitter:creator" content="@itsolution_tn"/>

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css" media="screen">
		<link rel="stylesheet" href="vendor/owlcarousel/owl.theme.default.min.css" media="screen">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">
		<link rel="stylesheet" href="css/theme-animate.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond/respond.js"></script>
			<script src="vendor/excanvas/excanvas.js"></script>
		<![endif]-->
		<meta name="y_key" content="67be84a3e074cc84" />
		<meta name="msvalidate.01" content="9A4FE6939D2C501271F9576E226908CE" />
		<meta name="alexaVerifyID" content="e7QiRwfxckL1iWwEJdr6y_uttiI" />
		<meta name="google-site-verification" content="eBVP9gi3yLaWqi9JkqJwHm9XiHMYmhqULBxN4Lm-dK8" />
	</head>
	<body>
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PG9J6J"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PG9J6J');</script>
		<!-- End Google Tag Manager -->
		<?php include_once("analyticstracking.php") ?>
		<div class="body">
			<header id="header" class="narrow" data-plugin-options="{'alwaysStickyEnabled': false, 'stickyEnabled': false, 'stickyWithGap': false, 'stickyChangeLogoSize': false}">
				<div class="container">
					<div class="logo">
						<a href="index.html">
							<img alt="logo ITSolution tunisie Solutions IT en technologie de l’information" width="192" height="62" data-sticky-width="192" data-sticky-height="62" src="img/logo-itsolution-solutions-it.png">
						</a>
					</div>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
						<ul class="social-icons">
							<li class="facebook"><a href="https://www.facebook.com/itsolution.tunisie" target="_blank" title="Facebook">Facebook ITSolution tunisie</a></li>
							<li class="linkedin"><a href="https://www.linkedin.com/company/itsolution-tunisie" target="_blank" title="Linkedin">Linkedin ITSolution tunisie</a></li>
							<li class="viadeo"><a href="http://www.viadeo.com/fr/company/itsolution-tunisie" target="_blank" title="Viadeo">Viadeo ITSolution tunisie</a></li>
							<li class="googleplus"><a href="https://plus.google.com/105501199580421149209" target="_blank" title="Googleplus">Googleplus ITSolution tunisie</a></li>
							<li class="twitter"><a href="https://twitter.com/itsolution_tn" target="_blank" title="Twitter">Twitter ITSolution tunisie</a></li>
							<li class="vimeo"><a href="https://vimeo.com/itsolution" target="_blank" title="Vimeo">Vimeo ITSolution tunisie</a></li>
							<li class="youtube"><a href="https://www.youtube.com/channel/UC08FMMN_GPpOItWxLfsjEGg" target="_blank" title="Youtube">Youtube ITSolution tunisie</a></li>
							<li class="pinterest"><a href="https://www.pinterest.com/itsolutiontunis" target="_blank" title="Pinterest">Pinterest ITSolution tunisie</a></li>
						</ul>
						<nav class="nav-main mega-menu">
							<ul class="nav nav-pills nav-main" id="mainMenu">
								<li>
									<a href="index.html">Home</a>
								</li>
								<li>
									<a href="about-us.html">About Us</a>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Services
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li><a href="services-mooc-open-edx.html">Moocs Open EDX</a></li>
									</ul>
								</li>
								<li>
									<a href="contact-us-advanced.php">Contact Us</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</header>

			<div role="main" class="main">

				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="./">Home</a></li>
									<li class="active">Contact Us</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h1>Contact Us | ITSolution tunisie</h1>
							</div>
						</div>
					</div>
				</section>

				<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
				<div id="googlemaps" class="google-map"></div>

				<div class="container">

					<div class="row">
						<div class="col-md-6">

							<div class="offset-anchor" id="contact-sent"></div>

							<?php
							if (isset($arrResult)) {
								if($arrResult['response'] == 'success') {
								?>
								<div class="alert alert-success" id="contactSuccess">
									<strong>Success!</strong> Your message has been sent to us.
								</div>
								<?php
								} else if($arrResult['response'] == 'error') {
								?>
								<div class="alert alert-danger" id="contactError">
									<strong>Error!</strong> There was an error sending your message. (<?php echo $arrResult['error'];?>)
								</div>
								<?php
								} else if($arrResult['response'] == 'captchaError') {
								?>
								<div class="alert alert-danger" id="contactError">
									<strong>Error!</strong> Verificantion failed.
								</div>
								<?php
								}
							}
							?>

							<h2 class="short"><strong>Contact</strong> Us | ITSolution tunisie</h2>
							<form id="contactFormAdvanced" action="<?php echo basename($_SERVER['PHP_SELF']); ?>#contact-sent" method="POST" enctype="multipart/form-data">
								<input type="hidden" value="true" name="emailSent" id="emailSent">
								<div class="row">
									<div class="form-group">
										<div class="col-md-6">
											<label>Votre nom *</label>
											<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
										</div>
										<div class="col-md-6">
											<label>Votre address email *</label>
											<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Sujet</label>
											<select data-msg-required="Please enter the subject." class="form-control" name="subject" id="subject" required>
												<option value=""></option>
												<option value="Contact - Technique">Technique</option>
												<option value="Contact - Commercial">Commercial</option>
												<option value="Contact - RH et Recrutement">RH et Recrutement</option>
												<option value="Contact - Autre">Autre</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12">
													<label>Type du projet</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="checkbox-group" data-msg-required="Please select at least one option.">
														<label class="checkbox-inline">
															<input type="checkbox" name="checkboxes[]" id="inlineCheckbox1" value="Développement"> Développement
														</label>
														<label class="checkbox-inline">
															<input type="checkbox" name="checkboxes[]" id="inlineCheckbox2" value="Itégration"> Itégration
														</label>
														<label class="checkbox-inline">
															<input type="checkbox" name="checkboxes[]" id="inlineCheckbox3" value="Réseaux"> Réseaux
														</label>
														<label class="checkbox-inline">
															<input type="checkbox" name="checkboxes[]" id="inlineCheckbox4" value="Sécurité"> Sécurité
														</label>
														<label class="checkbox-inline">
															<input type="checkbox" name="checkboxes[]" id="inlineCheckbox5" value="Datacenter"> Datacenter
														</label>
														<label class="checkbox-inline">
															<input type="checkbox" name="checkboxes[]" id="inlineCheckbox6" value="Autre"> Autre
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12">
													<label>Etat d'avancement du projet</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="radio-group" data-msg-required="Please select one option.">
														<label class="radio-inline">
															<input type="radio" name="radios" id="inlineRadio1" value="Projet futur"> Projet futur
														</label>
														<label class="radio-inline">
															<input type="radio" name="radios" id="inlineRadio2" value="Projet en cours"> Projet en cours
														</label>
														<label class="radio-inline">
															<input type="radio" name="radios" id="inlineRadio3" value="Ancien projet"> Ancien projet
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Pièce jointe</label>
											<input type="file" name="attachment" id="attachment">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Message *</label>
											<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label>Verification *</label>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-4">
											<div class="captcha form-control">
												<div class="captcha-image">
													<?php
													$_SESSION['captcha'] = simple_php_captcha(array(
														'min_length' => 6,
														'max_length' => 6,
														'min_font_size' => 22,
														'max_font_size' => 22,
														'angle_max' => 3
													));

													$_SESSION['captchaCode'] = $_SESSION['captcha']['code'];

													echo '<img id="captcha-image" src="' . "php/simple-php-captcha/simple-php-captcha.php/" . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
													?>
												</div>
												<div class="captcha-refresh">
													<a href="#" id="refreshCaptcha"><i class="fa fa-refresh"></i></a>
												</div>
											</div>
										</div>
										<div class="col-md-8">
											<input type="text" value="" maxlength="6" data-msg-captcha="Wrong verification code." data-msg-required="Please enter the verification code." placeholder="Type the verification code." class="form-control input-lg captcha-input" name="captcha" id="captcha" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" id="contactFormSubmit" value="Send Message" class="btn btn-primary btn-lg pull-right" data-loading-text="Loading...">
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-6">

							<h4 class="push-top">Collaborer avec <strong>ITSolution</strong> tunisie</h4>
							<p><strong>ITSolution</strong> tunisie est une société de service et solution it ayant comme capital la compétence et le potentiel de ses collaborateurs qu’elle s’engage à développer d’une manière continue.</p>

							<hr />

							<h4><strong>Contact</strong> ITSolution tunise</h4>
							<ul class="list-unstyled">
								<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 10 Rue Ibn Abbed, Bardo - Tunis</li>
								<li><i class="fa fa-phone"></i> <strong>Phone:</strong> (+216) 23689978</li>
								<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:commercial@itsolution-tn.com">commercial@itsolution-tn.com</a></li>
							</ul>

							<hr />

							<h4><strong>horaire</strong> de travail</h4>
							<ul class="list-unstyled">
								<li><i class="fa fa-time"></i> Lundi - Vendredi: 8am à 6pm</li>
								<li><i class="fa fa-time"></i> Samedi: 9am à 2pm</li>
								<li><i class="fa fa-time"></i> Dimanche: Fermé</li>
							</ul>

						</div>
					</div>

				</div>

			</div>

			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="footer-ribbon">
							<span>Get in Touch</span>
						</div>
						<div class="col-md-3">
							<div class="newsletter">
								<h4>Newsletter</h4>
								<p>Tenez-vous toujours au courant de nos produits, fonctionnalités et technologies. Entrez votre e-mail et abonnez-vous à notre newsletter.</p>
			
								<div class="alert alert-success hidden" id="newsletterSuccess">
									<strong>Success!</strong> You've been added to our email list.
								</div>
			
								<div class="alert alert-danger hidden" id="newsletterError"></div>
			
								<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
									<div class="input-group">
										<input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit">Go!</button>
										</span>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<h4>Derniers Tweets</h4>
							<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "itsolution_tn", "count": 3}'>
								<p>Please wait...</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-details">
								<h4>Contacter nous</h4>
								<ul class="contact">
									<li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong> 10 Rue Ibn Abbed, Bardo - Tunis</p></li>
									<li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> (+216) 23689978</p></li>
									<li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:commercial@itsolution-tn.com">commercial@itsolution-tn.com</a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<h4>Suivez nous</h4>
							<div class="social-icons">								
								<ul class="social-icons">
									<li class="facebook"><a href="https://www.facebook.com/itsolution.tunisie" target="_blank" title="Facebook">Facebook ITSolution tunisie</a></li>
									<li class="linkedin"><a href="https://www.linkedin.com/company/itsolution-tunisie" target="_blank" title="Linkedin">Linkedin ITSolution tunisie</a></li>
									<li class="viadeo"><a href="http://www.viadeo.com/fr/company/itsolution-tunisie" target="_blank" title="Viadeo">Viadeo ITSolution tunisie</a></li>
									<li class="googleplus"><a href="https://plus.google.com/105501199580421149209" target="_blank" title="Googleplus">Googleplus ITSolution tunisie</a></li>
									<li class="twitter"><a href="https://twitter.com/itsolution_tn" target="_blank" title="Twitter">Twitter ITSolution tunisie</a></li>
									<li class="vimeo"><a href="https://vimeo.com/itsolution" target="_blank" title="Vimeo">Vimeo ITSolution tunisie</a></li>
									<li class="youtube"><a href="https://www.youtube.com/channel/UC08FMMN_GPpOItWxLfsjEGg" target="_blank" title="Youtube">Youtube ITSolution tunisie</a></li>
									<li class="pinterest"><a href="https://www.pinterest.com/itsolutiontunis" target="_blank" title="Pinterest">Pinterest ITSolution tunisie</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<p><a href="http://www.itsolution-tn.com/"><strong>ITSolution</strong> tunisie</a> © Copyright 2016. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.js"></script>
		<script src="vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="vendor/bootstrap/bootstrap.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/jquery.validation/jquery.validation.js"></script>
		<script src="vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.js"></script>
		<script src="vendor/isotope/jquery.isotope.js"></script>
		<script src="vendor/owlcarousel/owl.carousel.js"></script>
		<script src="vendor/jflickrfeed/jflickrfeed.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/vide/vide.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>

		<!-- Specific Page Vendor and Views -->
		<script src="js/views/view.contact.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script>

			/*
			Map Settings

				Find the Latitude and Longitude of your address:
					- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/

			// Map Markers
			var mapMarkers = [{
				address: "10 Rue Ibn Abbed, Khaznadar, Tunis, Le Bardo, Gouvernorat de Tunis, Tunisie",
				html: "<strong>Bureau ITSolution</strong> tunisie<br>10 Rue Ibn Abbed, Bardo - Tunis<br><br><a href='#' onclick='mapCenterAt({latitude: 36.804223, longitude: 10.1295266, zoom: 16}, event)'>[+] zoom here</a>",
				icon: {
					image: "img/pin.png",
					iconsize: [26, 46],
					iconanchor: [12, 46]
				}
			}];

			// Map Initial Location
			var initLatitude = 36.804223;
			var initLongitude = 10.1295266;

			// Map Extended Settings
			var mapSettings = {
				controls: {
					draggable: true,
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 13
			};

			var map = $("#googlemaps").gMap(mapSettings);

			// Map Center At
			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$("#googlemaps").gMap("centerAt", options);
			}

		</script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-73658239-1', 'auto');
			ga('send', 'pageview');

		</script>
		 -->
		<script type="text/javascript">
		
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-73658239-1']);
			_gaq.push(['_trackPageview']);
		
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script>
		<script type="application/ld+json">
			{ 
			  "@context": "http://schema.org/",
			  "@type": "Organization",
			  "address": {
				"@type": "PostalAddress",
				"addressLocality": "Tunis",
				"addressRegion": "Tunisia",
				"postalCode": "2000",
				"streetAddress": "10 Rue Ibn Abbed, Bardo - Tunis"
			  },
			  "telephone": "( 216 ) 23 68 99 78",
			  "name": "ITSolution",
			  "legalName": "ITSolution",
			  "description": "société d’ingénierie informatique basée à Tunis. ITSolution est un éditeur de solutions à très forte valeur ajoutée spécialisé dans le domaine des nouvelles technologies misant sur l’innovation et l’expertis. ITSolution propose à ses clients des solutions individuelles sur-mesure spécialisée dans les technologies de l'information, ingénierie Logicielle, consulting, réseau, Intégration, audits, conseils, formations, informatique...",
			  "founder": { 
				   "@type": "Person",
				   "name": "Badr Houssem",
				   "birthDate": "1985-08-16",
				   "image": "http://www.itsolution-tn.com/img/team/itsolution-team-bard-houssem.jpg",
				   "jobTitle": "Gérant",
				   "email": "mailto:houssem.badr@gmail.com",
				   "telephone": "(216) 23689978"
				},
			  "alumni": [
				{
				  "@type": "Person",
				  "name": "Badr Houssem"
				},
				{
				  "@type": "Person",
				  "name": "Mejri Wajdi"
				}
			  ],
			  "numberOfEmployees": ">5",
			  "url": "http://www.itsolution-tn.com",
			  "sameAs": "http://www.solutions-it.net",
			  "logo": "http://www.itsolution-tn.com/img/logo-itsolution-solutions-it.png",
			  "email": "commercial@itsolution-tn.com",
			  "image": "http://www.itsolution-tn.com/img/slides/slide-0.png"
			}
		</script>

	</body>
</html>
