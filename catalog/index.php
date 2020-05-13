<?php
$a = 1;
if (isset($_GET['article']))
    $a = $_GET['article'];

$catalog = file_get_contents('./catalog/content.json');
$catalog = json_decode($catalog, 1);

preg_match('#\<strong\>(.*?)\<\/strong\>#', $catalog['texts'][$a], $matches);
if (!isset($matches[1])) $matches[1] = '';
?>
			<!-- Page Header -->
			<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('./img/<?=$catalog['images'][$a]?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<span class="post-date"><?=date('d-m-Y', time()-rand(13324, 1622211))?> </span>
							</div>
							<h1><?=$matches[1]?></h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post">
                                <?=$catalog['texts'][$a]?>
							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
						</div>



						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>Τα σχόλια</h2>
							</div>

							<div class="post-comments">

							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Αφήστε ένα σχόλιο</h2>
							</div>
							<form class="post-reply" onclick="return false">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span>Όνομα*</span>
											<input class="input" type="text" id="name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span>Email *</span>
											<input class="input" type="email" id="email">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" id="message" placeholder="Το κείμενο του σχολίου"></textarea>
										</div>
										<button id="send-comment" class="primary-button">Αποστολή</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
					<div class="col-md-4">



						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Άρθρο</h2>
							</div>
                            <?php
                            foreach ($catalog['texts'] as $key => $text) {
                                if ($key == 2) break;
                                preg_match('#\<strong\>(.*?)\<\/strong\>#', $text, $matches);
                                if (!isset($matches[1])) $matches[1] = '';
                                ?>
                                <div class="post post-thumb">
                                    <a class="post-img" href="./?article=<?=$key?>&a=3"><img style="height: 215px" src="./img/<?=$catalog['images'][$key]?>" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-meta">

                                            <span class="post-date"><?=date('d-m-Y', time()-rand(13324, 1622211))?></span>
                                        </div>
                                        <h3 class="post-title"><a href="./?article=<?=$key?>&a=3"><?=$matches[1]?></a></h3>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
						</div>
						<!-- /post widget -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
<script>
    let date = Date.now();
    $('#send-comment').on('click', function () {
        $('.post-comments').attr('style', 'display: block');
        $('.post-comments').append('' +
        '<div class="media"> ' +
            '<div class="media-left"> ' +
            '<img class="media-object" src="./images/avatar.png" alt=""> ' +
            '</div> ' +
            '<div class="media-body"> ' +
            '<div class="media-heading"> ' +
            '<h4>'+ $('#name').val() +'</h4> ' +
            '<span class="time">' + new Date(Date.now()).toLocaleString() + '</span> ' +
            '</div> ' +
            '<p>' + $('#message').val() + '</p>' +
            '</div>' +
        '</div>')
    })
</script>