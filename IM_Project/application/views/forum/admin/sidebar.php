<div class="span2">    
    <style>.nav-list > li > a { font-size: 11px; }</style>
    <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
            <li class="nav-header">USERS</li>
            <li><a href="<?php echo site_url('forumAdmin/user_edit/'.$this->session->userdata('cibb_user_id')); ?>">My Profile</a></li>
            <li><a href="<?php echo site_url('forumAdmin/user_view'); ?>">View All</a></li>
            <li class="divider"></li>
            <li class="nav-header">ROLES</li>
            <li><a href="<?php echo site_url('forumAdmin/role_create'); ?>">Crete New Role</a></li>
            <li><a href="<?php echo site_url('forumAdmin/role_view'); ?>">View All</a></li>
            <li class="nav-header">THREAD</li>
            <li><a href="<?php echo site_url('forumAdmin/category_create'); ?>">New Category</a></li>
            <li><a href="<?php echo site_url('forumAdmin/category_view'); ?>">All Categories</a></li>
            <li><a href="<?php echo site_url('forumAdmin/thread_view'); ?>">All Threads</a></li>
        </ul>
    </div>
</div>
