<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
    <div id="partners" class="partners">
        <div id="main-slick" class="main-slick">
            <?php $posts = get_posts ("category=913&numberposts=50"); ?>
            <?php if ($posts) : ?>
                <?php foreach ($posts as $post) : setup_postdata ($post); ?>

                    <div>
                    <?php echo $post->post_content ?>
                    </div>

                    <?php
                endforeach;
                wp_reset_postdata();
                ?>
            <?php endif; ?>
        </div>

    </div>
	<footer id="colophon" role="contentinfo">
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-column">
                    <a href="">
                        <img class="logoimg" alt="brand" src="http://olymp.local/wp-content/themes/twentytwelve/img/logo.png">
<!--                        <p>UKRAINIAN MATHS OLYMPIADS</p>-->
                    </a>
                </div>
                <div class="footer-column">
                    <div class="footer-column-2">
                        <a href="viber://add?number=380505613964">
                            <img src="http://olymp.local/wp-content/themes/twentytwelve/img/viber.png">
                            +38 (050) 561-39-64
                        </a>
                    </div>
                    <div class="footer-column-2">
                        <a href=""><img src="http://olymp.local/wp-content/themes/twentytwelve/img/call.png">
                            +38 (068) 389-21-07
                        </a>
                    </div>
                    <div class="footer-column-2">
                        <a href="skype:bog_1964_?call">
                            <img src="http://olymp.local/wp-content/themes/twentytwelve/img/skype.png">
                            Skype bog_1964_
                        </a>
                    </div>
                </div>

                <div class="footer-column">
                    <div class="footer-column-2">
                        <a href="https://ru-ru.facebook.com/people/Rublyov-Bogdan/100000638150556">
                            <img src="http://olymp.local/wp-content/themes/twentytwelve/img/facebook.png">
                            Рублев Богдан
                        </a>
                    </div>

                    <div class="footer-column-2">
                        <a href="mailto:rublyovbv@gmail.com">
                            <img src="http://olymp.local/wp-content/themes/twentytwelve/img/email.png">
                            rublyovbv@gmail.com
                        </a>
                    </div>
                    <div class="footer-column-2">
                        <a href="facebook.com/matholymp.com.ua">
                            <img src="http://olymp.local/wp-content/themes/twentytwelve/img/fb-group.png">
                            Наша страница Олимпиад
                        </a>
                    </div>
                </div>
            </div><!-- footer-row -->
            <div class="footer-row">
                <div class="footer-column">
                    <p>
                        <a  style="text-decoration:none;" href="http://matholymp.com.ua/2016/01/08/10275/">
                            <font style="color:red;font-weight:bold;">DONATE FOR COMPETITIONS</font><br/>Допомогти олімпіадам
                        </a>
                    </p>
                </div>
                <div class="footer-column">
                    <p>
                        <a  style="text-decoration:none;" href="http://matholymp.com.ua/donate-ukrainian/">
                            <font style="color:red;font-weight:bold;">DONATE IN HRYVNIA</font><br/>у гривнях
                        </a>
                    </p>
                </div>
                <div class="footer-column">
                    <p>
                        <a  style="text-decoration:none;" href="http://matholymp.com.ua/donate-foreign/">
                            <font style="color:red;font-weight:bold;">DONATE IN FOREIGN CURRENCY</font><br/>в іноземній валюті
                        </a>
                    </p>
                </div>
            </div>
        </div><!-- footer-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>