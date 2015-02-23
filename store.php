
<div id="top">
    <div id="topcont">
        <div id="logo"><a href="/" title="Go Back Home"><img src="/graphics/space-museums-logo.png" alt="SPACE Museums" /></a></div>
        <?php include("includes/menu.php"); ?>
        <div id="rightTop"><p class="iStars" title="Background Showed"><?=$themeName?></p><p class="nasatvlink iSprites isOnline"><a href="/nasaTV/" title="<?=$NasaTVName?>"><?=$NasaTVName?></a></p>
            <?php if ($ENABLE_STATE == 1) { ?>
                <div class="dd">
                    <select name="state_id" id="state_id" tabindex="1">
                        <option value="">-- Select State --</option>
                        <?php include("../bin/fetch/us-locations.php"); ?>
                    </select>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include("includes/topBanner.php"); ?>
<div id="all">
    <?php include("includes/secondaryMenu.php"); ?>

    <div class="row">
        <div class="col lnews">
            <h1 class="htitles">News from Museums and Space Blogs <span><a href="/news/">View all</a></span></h1>
            <div class="lnewslines">
                <?php include("bin/fetch/news-hp.php"); ?>
            </div>
        </div>
        <div class="col tweet">
            <h2 class="htitles">Tweets about Space</h2>
            <div class="tweetlines">
                <?php include("includes/hp-tweet.php"); ?>
            </div>
        </div>
    </div>
    <div class="row padrow">
        <div class="col topic">
            <h3 class="htitles">Exhibits by Topic</h3>
            <div class="eTopic">
                <?php include("bin/fetch/topics.php"); ?>
            </div>
        </div>
        <div class="col exotab">
            <h3 class="htitles">Exhibitions</h3>
            <div class="lstexhibits">
                <?php include("bin/fetch/exhibitsTab.php"); ?>
            </div>
        </div>
    </div>
    <div class="row padrow">
        <h3 class="htitles">Featured Museums</h3>
        <div class="lstmuseums">
            <?php include("bin/fetch/featuredmuseums.php"); ?>
        </div>
    </div>
    <?php if ($ENABLE_STORE == 1) { ?>
        <div class="row padrow">
            <h3 class="htitles">Store</h3>
            <div class="lststore">
                <?php include("bin/fetch/rai-hp.php"); ?>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <h3 class="htitles">Sponsors Events you might want to see:</h3>
        <div id="bottomads">
            <div class="ads astronomy"><div>
                    <a href="http://www.amazon.com/gp/product/B000PUAI3E/ref=as_li_tf_il?ie=UTF8&camp=1789&creative=9325&creativeASIN=B000PUAI3E&linkCode=as2&tag=spacmuse-20"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B000PUAI3E&Format=_SL160_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=spacmuse-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=spacmuse-20&l=as2&o=1&a=B000PUAI3E" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                </div></div>
            <div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="ads empty"><div><h4>Advertise Here</h4><a href="/advertise/">Click to see how.</a></div></div>
            <div class="social empty last">
                <div class="fb"><fb:like send="false" layout="box_count" width="450" show_faces="false" font="arial"></fb:like></div>
                <div class="gp"><div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div></div>
            </div>
        </div>
    </div>
</div>