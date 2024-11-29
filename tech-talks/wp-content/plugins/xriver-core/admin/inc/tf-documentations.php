
<div class="wrap about-wrap muskan-wrap">
<h1><?php ta_theme_name(); ?> Documentations</h1>
    <div class="muskan-system-stats">

        <?php if(XRIVER_CORE_PLUGIN_ACTIVED ) : ?>
            <h3 class="text-center">All Required Plugins Already Installed</h3>
        <?php else : ?>
            <h3 class="text-center">Install Required Plugins First To Import Demo</h3>
            <a class="active-btn button-primary" href="themes.php?page=tgmpa-install-plugins">Install Now!</a>
        <?php endif; ?>

        <p class="about-description">You can skip the plugins that you don't need. You must need <strong>Theme Xriver Core</strong>, Elementor, Demo Importer, and in some cases you need contact form 7 if you chose any demo which contains forms</p>
    </div>
    <div class="muskan-system-stats">
        <h3> <a target="_blank" href="themexriver.com/wp/<?php echo strtolower(ta_theme_name()); ?>-doc">Our Documentations</a></h3>
    </div>
</div>
