<?php

$comments = $this->comments->get_comment($this->input->get('id'));
$user_id = $this->session->userdata('username');

if ($comments) {
    foreach ($comments as $comment):
        ?>
    <div style = "margin-bottom: 15px; border: 3px solid green;">
        <article class="row" id="article_<?= $comment->comments_id ?>">
            <?php if (strtolower($user_id) != strtolower($comment->user_id)) { ?>
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <figure class="thumbnail">
                        <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                        <figcaption class="text-center"><?= $comment->username ?></figcaption>
                    </figure>
                </div>
            <?php } ?>
            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="panel panel-default arrow <?php
                if (strtolower($user_id) == strtolower($comment->user_id)) {
                    echo 'right';
                } else {
                    echo 'left';
                }
                ?>">

                <?php //echo $comment->comments_id;?>

                    <div class="panel-body"   style = "<?php if($comment->comments_id == $this->input->get('comment_id')) echo 'border: 3px solid #52D017'; ?>" >
                        <header class="<?php
                        if (strtolower($user_id) == strtolower($comment->user_id)) {
                            echo 'text-right';
                        } else {
                            echo 'text-left';
                        }
                        ?> ">
                            <div class="comment-user"><i class="fa fa-user"></i> <?= $comment->Fname . ' ' . $comment->Lname ?></div>
                            <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>&nbsp;<?= date('l d, Y', strtotime($comment->timstamp)) ?></time>
                        </header>
                        <div class="comment-post">
                            <p>
                                <?= $comment->comments ?>
                            </p>
                        </div>

                        <p class="text-right">
                            <?php
                            if (strtolower($user_id) == strtolower($comment->user_id)) {
                                ?>
                                <a href="javascript:void(0)" data-id="<?= $comment->comments_id ?>" data-comment="<?= $comment->comments_id ?>" class="edit_comment_btn">
                                    Edit
                                </a>
                                <a href="javascript:void(0)" data-id="<?= $comment->comments_id ?>" data-case="comments" class="delete_comment_btn">
                                    Delete
                                </a>
                            <?php } ?>
                            <a href="javascript:void(0)" data-id="<?= $comment->comments_id ?>" class="btn btn-sm btn-success btn-outline-rounded green reply_comment_btn">
                                <i class="fa fa-reply"></i> reply
                            </a>

                        </p>  
                        <div class="col-md-12 col-sm-12 reply_comment_form" style="display:none" id="edit<?= $comment->comments_id ?>">
                            <form action="sds" id="form<?= $comment->comments_id ?>">
                                <input type="hidden" name="comments_id" value="<?= $comment->comments_id ?>" id="comment_id">
                                <textarea class="discussion_comment col-sm-12" name="discussion_comment" id="discussion_comment" style="height:100px;"></textarea>
                                <p class="text-center insert_comment" id="insert_reply_comment<?= $comment->comments_id ?>" data-id="<?= $comment->comments_id ?>" >
                                    <a href="javascript:void(0)"  style="margin-top:15px;" class="btn btn-success btn-outline-rounded green"> Send<span style="margin-left:10px; margin-top:" class="glyphicon glyphicon-send"></span></a>
                                </p>
                            </form>
                        </div>
                        <div class="col-md-12 col-sm-12 reply_comment_form" style="display:none" id="reply<?= $comment->comments_id ?>">
                            <form action="sds" id="form<?= $comment->comments_id ?>">
                                <input type="hidden" name="comments_id" value="<?= $comment->comments_id ?>" id="comment_id">
                                <textarea class="col-sm-12" name="reply_discussion_comment" id="reply_discussion_comment" style="height:100px;"></textarea>
                                <p class="text-center insert_reply_comment" id="insert_reply_comment" data-id="<?= $comment->comments_id ?>" >
                                    <a href="javascript:void(0)"  style="margin-top:15px;" class="btn btn-success btn-outline-rounded green"> Send<span style="margin-left:10px; margin-top:" class="glyphicon glyphicon-send"></span></a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (strtolower($user_id) == strtolower($comment->user_id)) {
                ?>
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <figure class="thumbnail">
                        <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                        <figcaption class="text-center"><?= $comment->username ?></figcaption>
                    </figure>
                </div>
            <?php } ?>
        </article>
        <?php
        $comments_replys = $this->comments->get_reply_comment($comment->comments_id);

        if ($comments_replys) {
            foreach ($comments_replys as $comments_reply):
                ?>
                <article class="row reply_article_<?= $comment->comments_id ?>">
                    <?php
                    if (strtolower($user_id) != strtolower($comments_reply->reply_user_id)) {
                        ?>
                        <div class="col-md-2 col-sm-2 <?php if (strtolower($user_id) == strtolower($comments_reply->reply_user_id)) { ?> col-md-offset-1 col-md-pull-1 col-sm-offset-0 <?php } ?> hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center"><?= $comments_reply->Fname ?></figcaption>
                            </figure>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-md-9 col-sm-9 ">
                        <div class="panel panel-default arrow 
                        <?php
                        if (strtolower($user_id) == strtolower($comments_reply->reply_user_id)) {
                            echo 'right';
                        } else {
                            echo 'left';
                        }
                        ?>">
                            <div class="panel-heading">Reply</div>
                            <div class="panel-body">
                                <header class=" 
                                <?php
                                if (strtolower($user_id) == strtolower($comments_reply->reply_user_id)) {
                                    echo 'text-right';
                                } else {
                                    echo 'text-left';
                                }
                                ?> ">
                                    <div class="comment-user"><i class="fa fa-user"></i> <?= $comments_reply->Fname . ' ' . $comments_reply->Lname ?></div>
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> &nbsp;<?= date('l d, Y', strtotime($comments_reply->timstamp)) ?></time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                        <?= $comments_reply->reply_commants ?>
                                    </p>
                                </div>
                                <p class="text-right">
                                    <?php
                                    if (strtolower($user_id) == strtolower($comments_reply->reply_user_id)) {
                                        ?>
                                        <a href="javascript:void(0)" data-id="<?= $comment->comments_id ?>" data-reply="<?= $comments_reply->reply_com_id ?>" class="edit_comment_reply_btn">
                                            Edit
                                        </a>
                                        <a href="javascript:void(0)" data-id="<?= $comments_reply->reply_com_id ?>" data-case="reply_comments" class="delete_comment_btn">
                                            Delete
                                        </a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" data-id="<?= $comment->comments_id ?>" class="btn btn-sm btn-success btn-outline-rounded green reply_comment_btn">
                                        <i class="fa fa-reply"></i> reply
                                    </a>

                                </p>                                                                                                    
                                <div class="col-md-12 col-sm-12 reply_comment_form" style="display:none" id="reply<?= $comment->comments_id ?>">
                                    <form action="sds" id="form<?= $comment->comments_id ?>">
                                        <input type="hidden" name="comments_id" value="<?= $comment->comments_id ?>" id="comment_id">
                                        <input type="hidden" name="reply_com_id" value="<?= $comments_reply->reply_com_id ?>" id="reply_com_id">
                                        <textarea class="col-sm-12" name="reply_discussion_comment" id="reply_discussion_comment" style="height:100px;"></textarea>
                                        <p class="text-center insert_reply_comment" id="insert_reply_comment" data-id="<?= $comment->comments_id ?>" >
                                            <a href="javascript:void(0)"  style="margin-top:15px;" class="btn btn-success btn-outline-rounded green"> Send<span style="margin-left:10px; margin-top:" class="glyphicon glyphicon-send"></span></a>
                                        </p>
                                    </form>
                                </div>
                                       <!-- <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>-->
                            </div>
                        </div>
                    </div>
                    <?php
                    if (strtolower($user_id) == strtolower($comments_reply->reply_user_id)) {
                        ?>
                        <div class="col-md-2 col-sm-2  hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center"><?= $comments_reply->Fname ?></figcaption>
                            </figure>
                        </div>
                        <?php
                    }
                    ?>
                </article>
                <!-- Reply Reply Comments -->
                <?php
                $comments_reply_replys = $this->comments->get_reply_reply_comment($comments_reply->reply_com_id, $comment->comments_id);

                if ($comments_reply_replys) {
                    foreach ($comments_reply_replys as $comments_reply_reply):
                        ?>
                        <article class="row reply_article_<?= $comment->comments_id ?>" >
                            <?php
                            if (strtolower($user_id) != strtolower($comments_reply_reply->reply_user_id)) {
                                ?>
                                <div class="col-md-2 col-sm-2 <?php if (strtolower($user_id) == strtolower($comments_reply_reply->reply_user_id)) { ?> col-md-offset-2 col-md-pull-2 col-sm-offset-1 <?php } ?> hidden-xs">
                                    <figure class="thumbnail">
                                        <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                        <figcaption class="text-center"><?= $comments_reply_reply->Fname ?></figcaption>
                                    </figure>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="panel panel-default arrow 
                                <?php
                                if (strtolower($user_id) == strtolower($comments_reply_reply->reply_user_id)) {
                                    echo 'right';
                                } else {
                                    echo 'left';
                                }
                                ?>">
                                    <div class="panel-heading">Reply</div>
                                    <div class="panel-body">
                                        <header class=" 
                                        <?php
                                        if (strtolower($user_id) == strtolower($comments_reply_reply->reply_user_id)) {
                                            echo 'text-right';
                                        } else {
                                            echo 'text-left';
                                        }
                                        ?> ">
                                            <div class="comment-user"><i class="fa fa-user"></i> <?= $comments_reply_reply->Fname . ' ' . $comments_reply_reply->Lname ?></div>
                                            <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> &nbsp;<?= date('l d, Y', strtotime($comments_reply_reply->timstamp)) ?></time>
                                        </header>
                                        <div class="comment-post">
                                            <p>
                                                <?= $comments_reply_reply->reply_commants ?>
                                            </p>
                                        </div>
                                        <p class="text-right">
                                            <?php
                                            if (strtolower($user_id) == strtolower($comments_reply_reply->reply_user_id)) {
                                                ?>
                                                <a href="javascript:void(0)" data-id="<?= $comment->comments_id ?>" data-reply="<?= $comments_reply_reply->reply_com_id ?>" class="edit_comment_reply_btn">
                                                    Edit
                                                </a>
                                                <a href="javascript:void(0)" data-id="<?= $comments_reply_reply->reply_com_id ?>" data-case="reply_comments" class="delete_comment_btn">
                                                    Delete
                                                </a>
                                            <?php } ?>
                                            <a href="javascript:void(0)" data-id="<?= $comment->comments_id ?>" class="btn btn-sm btn-success btn-outline-rounded green reply_comment_btn">
                                                <i class="fa fa-reply"></i> reply
                                            </a>

                                        </p>                                                                                                    
                                        <div class="col-md-12 col-sm-12 reply_comment_form" style="display:none" id="reply<?= $comment->comments_id ?>">
                                            <form action="sds" id="form<?= $comment->comments_id ?>">
                                                <input type="hidden" name="comments_id" value="<?= $comment->comments_id ?>" id="comment_id">
                                                <input type="hidden" name="reply_com_id" value="<?= $comments_reply->reply_com_id ?>" id="reply_com_id">
                                                <textarea class="col-sm-12" name="reply_discussion_comment" id="reply_discussion_comment" style="height:100px;"></textarea>
                                                <p class="text-center insert_reply_comment" id="insert_reply_comment" data-id="<?= $comment->comments_id ?>" >
                                                    <a href="javascript:void(0)"  style="margin-top:15px;" class="btn btn-success btn-outline-rounded green"> Send<span style="margin-left:10px; margin-top:" class="glyphicon glyphicon-send"></span></a>
                                                </p>
                                            </form>
                                        </div>
                                               <!-- <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>-->
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (strtolower($user_id) == strtolower($comments_reply_reply->reply_user_id)) {
                                ?>
                                <div class="col-md-2 col-sm-2  hidden-xs">
                                    <figure class="thumbnail">
                                        <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                        <figcaption class="text-center"><?= $comments_reply_reply->Fname ?></figcaption>
                                    </figure>
                                </div>
                                <?php
                            }
                            ?>
                        </article>
                        <?php
                    endforeach;
                }


            endforeach;
        }

        ?>
</div>
        <?php
    endforeach;
}else{
    echo 'No More Comments';
}
?>
<!-- End Comment -->   