<?php
$a = 1;
$content = 'main.php';

if (isset($_GET['a']))
    $a = $_GET['a'];

if ($a == 2){
    $content = 'contacts.php';
} else if ($a == 3) {
    $content = 'catalog/index.php';
} else if ($a == 4) {
    $content = 'policy.php';
} else if ($a == 5) {
    $content = 'terms.php';
}

$catalog = file_get_contents('./catalog/content.json');
$catalog = json_decode($catalog, 1);

if (isset($_GET['article'])) {
    $article = $_GET['article'];
    preg_match('#\<strong\>(.*?)\<\/strong\>#', $catalog['texts'][$article], $matches);
    if (!isset($matches[1])) $matches[1] = '';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title><?php if (isset($_GET['article'])) { echo $matches[1]; } else { ?> η εταιρεία <?php } ?></title>
        <meta name="description" content="Η ανταλλαγή">
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/cookie.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        <script src="js/jquery.min.js"></script>

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="/" class="logo" style="text-transform: uppercase;">
                                <b>η εταιρεία</b>
                            </a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<li><a href="/">Αρχική σελίδα</a></li>
                            <?php foreach($catalog['texts'] as $key => $texts){
                                if ($key == 3) break;
                                preg_match('#\<strong\>(.*?)\<\/strong\>#', $catalog['texts'][$key], $matches);
                                if (isset($matches[1])) {
                                    $matches[1] = preg_replace('#^(.*?)\:#', " ", $matches[1]);
                                    $matches[1] = preg_replace('#("|"|«|»)#', " ", $matches[1]);
                                    if (mb_strlen($matches[1]) > 22) {
                                        $matches[1] = mb_strcut($matches[1], 0, 22) . '...';
                                    }

                                    ?>
                                    <li class="cat-<?=rand(1,4)?>"><a href="./?article=<?=$key?>&a=3"><span><?=$matches[1]?></span></a></li>
                                <?php } else if (!isset($matches[1])) {?>
                                    <li class="cat-<?=rand(1,4)?>"><a href="./?article=<?=$key?>&a=3"><span>%!langText(articles)!%-<?=$key?></span></a></li>
                                <?php } } ?>
                            <li><a href="./?a=2">Επαφές</a></li>
						</ul>
						<!-- /nav -->

					</div>
				</div>
				<!-- /Main Nav -->
			</div>
			<!-- /Nav -->
		</header>
		<!-- /Header -->

        <?php include($content);?>

		<!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-5">
						<div class="footer-widget">
							<div class="footer-logo">
                                <a href="/" class="logo" style="text-transform: uppercase;">
                                    <b>η εταιρεία</b>
                                </a>
							</div>
							<ul class="footer-nav">
								<li><a href="./?a=4">Πολιτική προστασίας προσωπικών δεδομένων</a></li>
                                <li><a href="./?a=5">Όροι και προϋποθέσεις</a></li>
							</ul>
							<div class="footer-copyright">
                                Η ιστοσελίδα χρησιμοποιεί cookies. Επιτρέπουν την αναγνώριση σας και να λάβετε πληροφορίες σχετικά με την εμπειρία χρήστη.Συνεχίζοντας την περιήγηση της ιστοσελίδας, συμφωνώ με τη χρήση των cookie από τον ιδιοκτήτη της ιστοσελίδας σύμφωνα με  <a target="_blank" href="https://en.wikipedia.org/wiki/HTTP_cookie">Πολιτική cookie</a>
                                <br>
								<span>&copy;
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
</span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-12">
								<div class="footer-widget">
									<h3 class="footer-title">Άρθρο</h3>
									<ul class="footer-links">
                                        <li><a href="/">Αρχική σελίδα</a></li>
                                        <?php foreach($catalog['texts'] as $key => $texts){
                                            if ($key == 3) break;
                                            preg_match('#\<strong\>(.*?)\<\/strong\>#', $catalog['texts'][$key], $matches);
                                            if (isset($matches[1])) {
                                                $matches[1] = preg_replace('#^(.*?)\:#', " ", $matches[1]);
                                                $matches[1] = preg_replace('#("|"|«|»)#', " ", $matches[1]);
                                                if (mb_strlen($matches[1]) > 42) {
                                                    $matches[1] = mb_strcut($matches[1], 0, 42) . '...';
                                                }

                                                ?>
                                                <li><a href="./?article=<?=$key?>&a=3"><span><?=$matches[1]?></span></a></li>
                                            <?php } else if (!isset($matches[1])) {?>
                                                <li><a href="./?article=<?=$key?>&a=3"><span>%!langText(articles)!%-<?=$key?></span></a></li>
                                            <?php } } ?>
                                        <li><a href="./?a=2">Επαφές</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="footer-widget">
							<h3 class="footer-title">Μοιραστείτε το στο κοινωνικό. δίκτυα</h3>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
        <div class='cookie-banner'>
            <p>
                Η ιστοσελίδα χρησιμοποιεί cookies. Επιτρέπουν την αναγνώριση σας και να λάβετε πληροφορίες σχετικά με την εμπειρία χρήστη.Συνεχίζοντας την περιήγηση της ιστοσελίδας, συμφωνώ με τη χρήση των cookie από τον ιδιοκτήτη της ιστοσελίδας σύμφωνα με  <a target="_blank" href="https://en.wikipedia.org/wiki/HTTP_cookie">Πολιτική cookie</a>
            </p>
            <button class='close-cookie'>&times;</button>
        </div>
        <script>
            window.onload = function() {
                $('.close-cookie').click(function () {
                    $('.cookie-banner').fadeOut();
                })
            }
        </script>
	</body>
</html>
