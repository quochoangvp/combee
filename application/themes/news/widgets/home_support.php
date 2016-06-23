<div class="about-testimonial boxed-style about-flexslider ">
    <section class="slider">
        <div class="flexslider">
            <ul class="slides about-flex-slides">
                <?php foreach ($data as $supporter): ?>
                <li>
                    <div class="about-testimonial-image ">
                        <img alt="" src="<?php echo site_url($supporter['avatar']) ?>">
                    </div>
                    <a class="about-testimonial-author" href="javascript:;"><?php echo $supporter['full_name'] ?></a>
                    <span class="about-testimonial-company"><?php echo $supporter['user_email'] ?></span>
                    <div class="about-testimonial-content">
                        <p class="about-testimonial-quote">
                            <?php echo limit_to_numwords($supporter['bio'], 120) ?>
                        </p>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
    </section>
</div>