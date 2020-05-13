<?php
$catalog = file_get_contents('./catalog/content.json');
$catalog = json_decode($catalog, 1);
?>
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php
            foreach ($catalog['texts'] as $key => $text) {
                if ($key == 2) break;
                preg_match('#\<strong\>(.*?)\<\/strong\>#', $text, $matches);
                if (!isset($matches[1])) $matches[1] = '';
                ?>
                <!-- post -->
                <div class="col-md-6">
                    <div class="post post-thumb">
                        <a class="post-img" href="./?article=<?=$key?>&a=3"><img style="height: 333px" src="./img/<?=$catalog['images'][$key]?>" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <span class="post-date"><?=date('d-m-Y', time()-rand(13324, 1622211))?></span>
                            </div>
                            <h3 class="post-title"><a href="./?article=<?=$key?>&a=3"><?=$matches[1]?></a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->
            <?php
            }
            ?>

        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Άρθρο</h2>
                </div>
            </div>

            <?php
            $i = 0;
            foreach ($catalog['texts'] as $key => $text) {
                if ($key == 0 || $key == 1) { continue; }
                preg_match('#\<strong\>(.*?)\<\/strong\>#', $text, $matches);
                if (!isset($matches[1])) $matches[1] = '';
                ?>
                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="./?article=<?=$key?>&a=3"><img style="height: 216px" src="./img/<?=$catalog['images'][$key]?>" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <span class="post-date"><?=date('d-m-Y', time()-rand(13324, 1622211))?></span>
                            </div>
                            <h3 class="post-title"><a href="./?article=<?=$key?>&a=3"><?=$matches[1]?></a></h3>
                        </div>
                    </div>
                </div>
            <?php
                if (($i+1) % 3 == 0) echo '<div class="clearfix visible-md visible-lg"></div>';
                $i++;
            }
            ?>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->
</div>
<!-- /section -->
