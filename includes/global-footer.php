<div class="clearfix"></div>
<div class="footer">
    <div class="container">
        <div class="one_fourth">
            <div class="footer_logo"><img src="images/footer_logo.png" alt=""/></div>
            <span class="address">Address: No.28 - 63739 street lorem ipsum City, Country</span> <span class="address">Phone: + 1 (234) 567 8901</span> <span class="address">Fax: + 1 (234) 567 8901</span> <span class="address">Email: support@yoursite.com </span> </div>
        <!--end item-->

        <div class="one_fourth">
            <h4 class="white uppercase">Quick links</h4>
            <div class="title_line"></div>
            <ul class="quicklinks">
                <li><a href="#"><i class="fa fa-angle-right"></i> Praesent eget elit id lacus accumsan.</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Aenean id lectus eu tellus rhoncus.</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Aenean imperdiet mauris blandit.</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Duis a sem ultricies, fermentum.</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Proin vestibulum tortor malesuada.</a></li>
            </ul>
        </div>
        <!--end item-->
        <!--end item-->

        <div class="one_fourth">
            <h4 class="white uppercase">Tags</h4>
            <div class="title_line"></div>
            <ul class="tags">
                <li><a href="#">Awesome</a></li>
                <li><a href="#" class="active">Photography</a></li>
                <li><a href="#">UI DEsign</a></li>
                <li><a href="#">Branding</a></li>
                <li><a href="#">All</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Wireframe</a></li>
                <li><a href="#">Art</a></li>
                <li><a href="#">Media</a></li>
                <li><a href="#">Icons</a></li>
            </ul>
        </div>
        <!--end item-->

        <div class="one_fourth last">
            <h4 class="white uppercase">Usefull LInks</h4>
            <div class="title_line"></div>
            <ul class="quicklinks">
                <li><a href="#"><i class="fa fa-angle-right"></i> Praesent eget elit id lacus accumsan.</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Aenean id lectus eu tellus rhoncus.</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Aenean imperdiet mauris blandit.</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Duis a sem ultricies, fermentum.</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Proin vestibulum tortor malesuada.</a></li>
            </ul>
        </div>
        <!--end item-->

    </div>
</div>
<!--end footer-->

<div class="copyrights">
    <div class="container">
        <div class="one_half"><span>Copyright © <?php echo date("Y"); ?> - All Rights Reserved - Project Created by <a href="http://nebulastudio.net/" target="_blank">Nebula Studio, LLC</a></span></div>
        <div class="one_half last">
            <ul class="social_icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-wordpress"></i></a></li>
                <li><a href="#"><i class="fa fa-android"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!--end copyrights-->
<a href="#" class="scrollup"></a><!-- end scroll to top of the page-->

</div>
<!--end sitewraper-->



<!-- ######### JS FILES ######### -->
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="js/universal/jquery.js"></script>

<!-- scroll up -->
<script src="js/scrolltotop/totop.js" type="text/javascript"></script>

<!-- style switcher -->
<script src="js/style-switcher/jquery-1.js"></script>
<script src="js/style-switcher/styleselector.js"></script>

<!-- scroll to fixied sticky -->
<script src="js/mainmenu/jquery-scrolltofixed.js" type="text/javascript"></script>
<script src="js/mainmenu/ScrollToFixed_custom.js" type="text/javascript"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="js/revolutionslider/rs-plugin/js/jquery.themepunch.revolution.js"></script>
<script type="text/javascript" src="js/revolutionslider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/revolutionslider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/revolutionslider/custom1.js"></script>

<!-- mega menu -->
<script src="js/mainmenu/bootstrap.min.js"></script>
<script src="js/mainmenu/customeUI.js"></script>
<script type="text/javascript">
    var a = $(".scrollto_sticky").offset().top;

    <!-- background color for sticky -->
    $(document).scroll(function(){
        if($(this).scrollTop() > a)
        {
            $('.scrollto_sticky').css({"background":"#161616"});
        } else {
            $('.scrollto_sticky').css({"background":"transparent"});
        }
    });
</script>
</body>
</html>