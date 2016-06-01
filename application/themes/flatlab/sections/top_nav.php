<?php
    $auth = $this->session->userdata('auth');
?>
<div class="top-nav ">
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder="Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo base_url(); ?>assets/themes/flatlab/img/avatar1_small.jpg">
                <span class="username"><?php echo $auth['full_name'] ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li><a href="<?php echo site_url('account/profile') ?>"><i class=" icon-suitcase"></i>Profile</a></li>
                <li><a href="<?php echo site_url('account/settings') ?>"><i class="icon-cog"></i> Settings</a></li>
                <li><a href="<?php echo site_url('account/notification') ?>"><i class="icon-bell-alt"></i> Notification</a></li>
                <li><a href="<?php echo site_url('account/logout') ?>"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
</div>