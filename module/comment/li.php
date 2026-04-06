<li class="comment byuser comment-author-<?= $comment->authorId ?> <?= $bypostauthor ?> <?php $comment->alt('odd alt thread-odd thread-alt', 'even thread-even'); ?> depth-1" id="comment-<?= $comment->coid ?>">
    <ul class="list-inline">
        <li class="comt-main" id="div-comment-<?= $comment->coid ?>">
            <div class="comment-header mb10">
                <div class="author-box flex ac">
                    <?php
                    echo '<a href="' . $comment->url . '"><span class="avatar-img comt-avatar"><img alt="' . $comment->author . '的头像-' . Helper::options()->title . '" src="' . joe_avatar_lazyload_url() . '" data-src="' . joe_avatar_url_by_mail($comment->mail) . '" class="lazyload avatar avatar-id-' . $comment->authorId . '"></span></a>';
                    echo '<name class="flex ac flex1"><a class="text-ellipsis font-bold" href="' . $comment->url . '">' . $comment->author . '</a>' . $comment_author_badg . '</name>';
                    echo '<a href="javascript:;" data-action="comment_like" class="action action-comment-like muted-2-color flex0 ml10" data-pid="' . $comment->coid . '"><svg class="icon mr3" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><text></text><count>'.$comment->agree.'</count></a>';
                    ?>
                </div>
            </div>
            <div class="comment-footer">
                <div class="mb10 comment-content" id="comment-content-<?= $comment->coid ?>"><?= $comment_text ?></div>
                <div class="comt-meta muted-2-color">
                    <span class="comt-author" title="<?php $comment->date() ?>"><?= joe_date_word($comment->dateWord) ?></span>
                    <?php
                    echo $parent_author;
                    if ($comment->status == 'waiting') {
                        echo '<span class="badge-approve"><span class="badg c-red badg-sm">待审核</span></span>';
                    } else {
                        echo '<span class="reply-link">';
                        if (joe_user_alloc()->hasLogin()) {
                            echo '<a rel="nofollow" class="comment-reply-link" href="#respond" data-commentid="' . $comment->coid . '" data-postid="' . $comment->cid . '" data-belowelement="div-comment-' . $comment->coid . '" data-respondelement="respond" data-replyto="回复给 ' . $comment->author . '" data-toggle="tooltip" title="回复给 ' . $comment->author . '">回复</a>';
                        } else {
                            echo '<a rel="nofollow" class="signin-loader" href="javascript:;">回复</a>';
                        }
                        echo '</span>';
                    }
                    echo $comment_dropdown;
                    ?>
                </div>
            </div>
        </li>
    </ul>
    <?php
    if ($comment->children) {
        echo '<ul class="children">';
        $comment->threadedComments($options);
        echo '</ul>';
    }
    ?>
</li>