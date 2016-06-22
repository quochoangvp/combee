<section class="panel tab">
    <header class="panel-heading tab-bg-dark-navy-blue">
        <ul class="nav nav-tabs nav-justified ">
            <?php foreach ($data as $index => $list): ?>
            <li <?php echo ($index==0)?'class="active"':'' ?>>
                <a data-toggle="tab" href="#list_<?php echo $index?>">
                    <?php echo $list['title'] ?>
                </a>
            </li>
            <?php endforeach ?>
        </ul>
    </header>
    <div class="panel-body">
        <div class="tab-content tasi-tab">
            <?php foreach ($data as $index => $list): ?>
                <?php if ($index < 6): ?>
                    <div id="list_<?php echo $index ?>" class="tab-pane <?php echo ($index==0)?'active':'' ?>">
                        <?php foreach ($list['article'] as $i => $article): ?>
                        <article class="media">
                            <a class="pull-left thumb p-thumb">
                                <img src="<?php echo site_url($article['thumbnail']) ?>" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class=" p-head"><?php echo $article['article_title'] ?></a>
                                <p><?php echo limit_to_numwords(strip_tags($article['summary']), 12) ?></p>
                            </div>
                        </article>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
</section>