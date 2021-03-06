<!-- revolution slider start -->
<div class="fullwidthbanner-container main-slider">
    <div class="fullwidthabnner">
        <ul id="revolutionul" style="display:none;">
            <!-- 1st slide -->
            <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="">
                <div class="caption lfl slide_item_left"
                    data-x="10"
                    data-y="70"
                    data-speed="400"
                    data-start="1500"
                    data-easing="easeOutBack">
                    <img src="<?php echo site_url($data[0]['thumbnail']) ?>" alt="Image 1">
                </div>
                <div class="caption lfr slide_title"
                    data-x="670"
                    data-y="120"
                    data-speed="400"
                    data-start="1000"
                    data-easing="easeOutExpo">
                    <?php echo $data[0]['media_title'] ?>
                </div>

                <div class="caption lfr slide_subtitle dark-text"
                    data-x="670"
                    data-y="190"
                    data-speed="400"
                    data-start="2000"
                    data-easing="easeOutExpo">
                    <?php echo $data[0]['media_config']['slide_subtitle'] ?>
                </div>
                <div class="caption lfr slide_desc"
                    data-x="670"
                    data-y="260"
                    data-speed="400"
                    data-start="2500"
                    data-easing="easeOutExpo">
                    <?php echo html_entity_decode($data[0]['description']) ?>
                </div>
                <a class="caption lfr btn yellow slide_btn" href="<?php echo $data[0]['media_link'] ?>" target="_blank"
                    data-x="670"
                    data-y="400"
                    data-speed="400"
                    data-start="3500"
                    data-easing="easeOutExpo">
                    <?php echo $data[0]['media_config']['slide_btn'] ?>
                </a>

            </li>

            <!-- 2nd slide  -->
            <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="">
                <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                <img src="<?php echo site_url($data[1]['thumbnail']) ?>" alt="">
                <div class="caption lft slide_title"
                    data-x="10"
                    data-y="125"
                    data-speed="400"
                    data-start="1500"
                    data-easing="easeOutExpo">
                    <?php echo $data[1]['media_title'] ?>
                </div>
                <div class="caption lft slide_subtitle dark-text"
                    data-x="10"
                    data-y="180"
                    data-speed="400"
                    data-start="2000"
                    data-easing="easeOutExpo">
                    <?php echo $data[1]['media_config']['slide_subtitle'] ?>
                </div>
                <div class="caption lft slide_desc dark-text"
                    data-x="10"
                    data-y="240"
                    data-speed="400"
                    data-start="2500"
                    data-easing="easeOutExpo">
                    <?php echo html_entity_decode($data[1]['description']) ?>
                </div>
                <a class="caption lft slide_btn btn red slide_item_left" href="<?php echo $data[1]['media_link'] ?>" target="_blank"
                    data-x="10"
                    data-y="360"
                    data-speed="400"
                    data-start="3000"
                    data-easing="easeOutExpo">
                    <?php echo $data[1]['media_config']['slide_btn'] ?>
                </a>
                <div class="caption lft start"
                    data-x="640"
                    data-y="55"
                    data-speed="400"
                    data-start="2000"
                    data-easing="easeOutBack">
                    <img src="<?php echo $data[1]['media_config']['caption_lft_start'] ?>" alt="man">
                </div>
                <div class="caption lft slide_item_right"
                    data-x="330"
                    data-y="20"
                    data-speed="500"
                    data-start="5000"
                    data-easing="easeOutBack">
                    <img src="<?php echo $data[1]['media_config']['slide_item_right'] ?>" id="rev-hint2" alt="txt img">
                </div>

            </li>

            <!-- 3rd slide  -->
            <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-delay="9400" data-thumb="">
                <img src="<?php echo $data[2]['thumbnail'] ?>" alt="">
                <div class="caption lfl slide_item_right"
                    data-x="10"
                    data-y="105"
                    data-speed="1200"
                    data-start="1500"
                    data-easing="easeOutBack">
                    <img src="<?php echo $data[2]['media_config']['image_1'] ?>" alt="Image 1">
                </div>
                <div class="caption lfl slide_item_right"
                    data-x="25"
                    data-y="345"
                    data-speed="1200"
                    data-start="2000"
                    data-easing="easeOutBack">
                    <img src="<?php echo $data[2]['media_config']['image_2'] ?>" alt="Image 1">
                </div>
                <div class="caption lfl slide_item_right"
                    data-x="200"
                    data-y="330"
                    data-speed="1200"
                    data-start="2500"
                    data-easing="easeOutBack">
                    <img src="<?php echo $data[2]['media_config']['image_3'] ?>" alt="Image 1">
                </div>
                <div class="caption lfl slide_item_right"
                    data-x="250"
                    data-y="230"
                    data-speed="1200"
                    data-start="3000"
                    data-easing="easeOutBack">
                    <img src="<?php echo $data[2]['media_config']['image_4'] ?>" alt="Image 1">
                </div>
                <div class="caption lfl slide_item_right"
                    data-x="165"
                    data-y="30"
                    data-speed="500"
                    data-start="5000"
                    data-easing="easeOutBack">
                    <img src="<?php echo $data[2]['media_config']['image_5'] ?>" id="rev-hint1" alt="Image 1">
                </div>

                <div class="caption lfr slide_title slide_item_left yellow-txt"
                    data-x="670"
                    data-y="145"
                    data-speed="400"
                    data-start="3500"
                    data-easing="easeOutExpo">
                    <?php echo $data[2]['media_title'] ?>
                </div>
                <div class="caption lfr slide_subtitle slide_item_left"
                    data-x="670"
                    data-y="200"
                    data-speed="400"
                    data-start="4000"
                    data-easing="easeOutExpo">
                    <?php echo $data[2]['media_config']['slide_subtitle'] ?>
                </div>
                <div class="caption lfr slide_desc slide_item_left"
                    data-x="670"
                    data-y="280"
                    data-speed="400"
                    data-start="4500"
                    data-easing="easeOutExpo">
                    <?php echo html_entity_decode($data[2]['description']) ?>
                </div>
            </li>
        </ul>
        <div class="tp-bannertimer tp-top"></div>
    </div>
</div>
<!-- revolution slider end -->