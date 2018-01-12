<section class="sections section footer-section">
    
</section>
</div><!-- END fullpage -->
<script type="application/ld+json">
<?php if ( is_home() ){ ?>
    {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "<?php echo bloginfo('name'); ?>",
        "alternateName": "<?php echo bloginfo('name'); ?> - <?php echo bloginfo('description'); ?>",
        "url": "<?php echo bloginfo('url'); ?>"
    }
<?php }else{ ?>
    {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "<?php wp_title('&raquo;', TRUE, 'left'); ?>",
        "alternateName": "<?php echo the_title(); ?> - Go Galapagos",
        "image": "<?php echo get_the_post_thumbnail_url(); ?>",
        "url": "<?php echo get_permalink(); ?>"
    }
<?php } ?>
</script>
<?php wp_footer(); ?>
<!--<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fullPage.js"></script>-->
<!--script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fullPage.extensions.min.js"></script-->
<script type="text/javascript">
    $(document).ready( function (){
<?php  if ( is_singular( 'gganimal' ) ){ ?>
        $('#the_content').niceScroll({
            autohidemode: false,
            cursorwidth: 8,
            cursorborder:'none',
            background:"rgba(255, 255, 255, 0.3)",
            cursorcolor:"rgba(255, 255, 255, 0.6)"
        });
<?php } ?>
    })
</script>
</body>
</html>