<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
</div>
<!-- #main -->

<footer id="colophon" role="contentinfo">
<?php
/* A sidebar in the footer? Yep. You can can customize
 * your footer with three columns of widgets.
 */
if ( ! is_404() )
get_sidebar( 'footer' );
?>
</footer>
<!-- #colophon -->
</div>
<!-- #page -->

<?php wp_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="jquery.backgroundPosition.js" type="text/javascript"></script>
<script type="text/javascript">
    for (i = 0; i < 3; i++) {
        $(function(){

            $('#bird01').animate({
                backgroundPosition:"(72% 25%)"
            }, 5000, 'swing');
            $('#bird01').animate({
                backgroundPosition:"(81% 31%)"
            }, 4000, 'swing');
	$('#bird01').animate({
                backgroundPosition:"(80% 32%)"
            }, 1000, 'swing');
            $('#bird01').animate({
                backgroundPosition:"(69% 29%)"
            }, 4000, 'swing');
            $('#bird01').animate({
                backgroundPosition:"(77% 40%)"
            }, 5000, 'swing');
            $('#bird01').animate({
                backgroundPosition:"(70% 29%)"
            }, 6000, 'swing');
            $('#bird01').animate({
                backgroundPosition:"(65% 33%)"
            }, 5000, 'swing');
            $('#bird02').animate({
                backgroundPosition:"(70% 28%)"
            }, 7000, 'swing');
            $('#bird02').animate({
                backgroundPosition:"(60% 37%)"
            }, 7000, 'swing');
	$('#bird02').animate({
                backgroundPosition:"(61% 36%)"
            }, 1000, 'swing');
$('#bird02').animate({
                backgroundPosition:"(59% 38%)"
            }, 1000, 'swing');
            $('#bird02').animate({
                backgroundPosition:"(55% 30%)"
            }, 4000, 'swing');
            $('#bird02').animate({
                backgroundPosition:"(63% 38%)"
            }, 5000, 'swing');
            $('#bird02').animate({
                backgroundPosition:"(71% 32%)"
            }, 5000, 'swing');
            $('#bird03').animate({
                backgroundPosition:"(24% 42%)"
            }, 6000, 'swing');
            $('#bird03').animate({
                backgroundPosition:"(29% 33%)"
            }, 4000, 'swing');
            $('#bird03').animate({
                backgroundPosition:"(21% 27%)"
            }, 6000, 'swing');
            $('#bird03').animate({
                backgroundPosition:"(17% 39%)"
            }, 7000, 'swing');
            $('#bird03').animate({
                backgroundPosition:"(24% 33%)"
            }, 5000, 'swing');
$('#bird03').animate({
                backgroundPosition:"(22% 34%)"
            }, 1000, 'swing');
$('#bird03').animate({
                backgroundPosition:"(23% 32%)"
            }, 1000, 'swing');
        });
    }
    $(function(){
        $('#clouds').animate({
            backgroundPosition:"(-3500px 100%)"
        }, 90000, 'linear');
        $('#clouds02').animate({
            backgroundPosition:"(4500px 0%)"
        }, 90000, 'linear');

        $('#sun').animate({
            backgroundPosition:"(50% 65%)"
        }, 45000, 'linear');
	$('#sun').animate({
            backgroundPosition:"(50% 15%)"
        }, 30000, 'linear');
        $('#sun2').animate({
            backgroundPosition:"(49% -50)"
        }, 55000, 'swing');
	$('#sun2').animate({
            backgroundPosition:"(49% -100)"
        }, 20000, 'swing');
    });

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-2573833-5']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();


    $( ".mainNavLink" ).click(function() {
        var headerht = $('#access').height() + parseInt($('#access').css('top'));
        $('html, body').animate({
            scrollTop: ($( $.attr(this, 'href') ).offset().top - headerht + 5)
        }, 'slow');
    });
</script>
</body>
</html>