<div class="container">
    <!--clients start-->
    <div class="clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="list-unstyled">
                        <?php foreach ($data as $partner): ?>
                        <li>
                            <a href="<?php echo $partner['media_link'] ?>">
                                <img src="<?php echo $partner['thumbnail'] ?>" alt="">
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--clients end-->
</div>