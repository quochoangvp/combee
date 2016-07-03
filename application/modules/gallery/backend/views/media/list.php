<section class="x_panel no-touch">
  <header class="x_title">
    <h2>
      Image Galley: <strong><?php echo $gallery['gallery_title'] ?></strong>
      <span class="pull-right">
        <a class="btn btn-sm btn-primary" href="<?php echo admin_url('gallery/media/'.'create/'.$gallery['gallery_id']) ?>">Add new</a>
      </span>
    </h2>
    <div class="clearfix"></div>
  </header>
  <div class="x_content">
    <?php if (isset($media_list) && count($media_list)>0): ?>
    <ul class="grid cs-style-3">
      <?php foreach ($media_list as $media): ?>
      <li>
        <figure>
          <img src="<?php echo $media['media_url'] ?>" alt="img04">
          <figcaption>
            <h3><?php echo $media['media_title'] ?></h3>
            <a href="javascript:;" onclick="delete_media(<?php echo $media['media_id'] ?>)">
              <i class="fa fa-trash"></i>
            </a>
            <a class="blue" href="<?php echo admin_url('gallery/media/edit/'.$gallery['gallery_id'].'/'.$media['media_id']) ?>">
              <i class="fa fa-edit"></i>
            </a>
            <a class="green fancybox" rel="group" href="<?php echo $media['media_url'] ?>">
              <?php if ($media['is_active'] == 'y'): ?>
                <i class="fa fa-eye-open"></i>
              <?php else: ?>
                <i class="fa fa-eye-close"></i>
              <?php endif ?>
            </a>
          </figcaption>
        </figure>
      </li>
      <?php endforeach ?>
    </ul>
    <div class="row">
        <div class="col-lg-6">
            <div class="dataTables_info" id="editable-sample_info">Showing <?php echo $offset + 1 ?> to <?php echo ($offset + $limit < $total_rows)?($offset + $limit):$total_rows ?> of <?php echo $total_rows ?> entries</div>
        </div>
        <div class="col-lg-6">
            <div class="dataTables_paginate paging_bootstrap pagination">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
    <?php else: ?>
      <p>No data</p>
    <?php endif ?>
  </div>
</section>