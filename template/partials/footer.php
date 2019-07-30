<?php
// footer
?>
<section class="wrap">
    <div class="col-12 p-page d-block line-sep my-5 position-relative"><span class="my-5"></span></div>
</section>
<footer>
    <section class="wrap">
        <?php if (is_active_sidebar('amp-footer')) : ?>
            <div class="col-12 m-page ">
                <ul id="footer-widget">
                    <?php
                    ob_start();
                    dynamic_sidebar('amp-footer');
                    $footer_amp = ob_get_contents();

                    $a_tel_pattern ='/<a href="tel:.*?a>/';
                    if(preg_match($a_tel_pattern,$footer_amp,$tel_number)){
                        $data = (get_option('amp_mrcat_form') !== null) ? get_option('amp_mrcat_form') : '';

                        if (isset($data['enable_call_tracking']) && $data['enable_call_tracking']==true){
                            if(strpos($tel_number[0],$data['number_replace']) !== false){
                                if (isset($data['call_tracking'])) $script_call_tracking = $data['call_tracking'];
                                $footer_amp = preg_replace('/<a href="tel:.*?a>/', $script_call_tracking , $footer_amp);
                            }
                        }

                    }
                    ob_end_clean();
                    echo $footer_amp;
                    ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if (isset($data['enable_call_tracking']) && $data['enable_call_tracking'] == true && isset($data['show_call_tracking_footer']) && $data['show_call_tracking_footer'] == true) : ?>
            <div class="d-flex align-items-center justify-content-center footer-details">
                <?php if (isset($data['call_tracking'])) echo $data['call_tracking']; ?>
            </div>
        <?php endif; ?>
    </section>
    <?php if (isset($data['copyright_footer']) && $data['copyright_footer'] == true): ?>
    <div class="footer-bottom">
        <?php echo '<span>Copyright  ©'.date('Y')." ".get_bloginfo( 'name' ).'. </span><br><span>All Rights Reserved.</span>' ?>
        <?php if (isset($data['pwr_by'])) echo '<span> |'.$data['pwr_by'].'</span>'; ?>
    </div>
    <?php endif; ?>
</footer>
</body>