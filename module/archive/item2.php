<?php
if ($this->options->joe_post_list_mode === 'list') {
					?><posts class="posts-item list ajax-item flex">
						<div class="post-graphic"><div class="item-thumbnail"><a href="<?= joe_root_relative_link($this->permalink) ?>"><img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" data-thumb="default" src="<?= joe_lazyload_url(); ?>" data-src="<?= joe_thumbnails_url($this)[0] ?>" alt="<?php $this->title() ?>-<?php $this->options->title(); ?>" class="lazyload fit-cover radius8"></a></div></div>
						<div class="item-body flex xx flex1 jsb">
							<h2 class="item-heading"><a href="<?= joe_root_relative_link($this->permalink) ?>"><?php $this->title() ?></a></h2>
							<div class="item-excerpt muted-color text-ellipsis mb6"><?= joe_get_abstract($this) ?></div>
							<div>
								<div class="item-tags scroll-x no-scrollbar mb6"><?= joe_get_archive_tags($this) ?></div>
								<div class="item-meta muted-2-color flex jsb ac">
									<item class="meta-author flex ac"><a href="<?= joe_root_relative_link($this->author->permalink) ?>"><span class="avatar-mini"><img alt="<?= $this->author->screenName ?>的头像-<?php $this->options->title() ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->author->mail) ?>" class="lazyload avatar avatar-id-1"></span></a><span class="hide-sm ml6"><?= $this->author->screenName ?></span><span title="<?= $this->date('Y-m-d H:i:s') ?>" class="icon-circle"><?= joe_dateWord($this->dateWord) ?></span></item>
									<div class="meta-right">
										<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="<?= joe_root_relative_link($this->permalink) ?>#respond"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?php $this->commentsNum('%d') ?></a></item>
										<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg><?= number_format($this->views); ?></item>
										<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= number_format($this->agree) ?></item>
									</div>
								</div>
							</div>
						</div>
					</posts><?php
				}
				if ($this->options->joe_post_list_mode === 'card') {
					?><posts class="posts-item card ajax-item">
						<div class="item-thumbnail"><a href="<?= joe_root_relative_link($this->permalink) ?>"><img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" data-thumb="default" src="<?= joe_lazyload_url(); ?>" data-src="<?= joe_thumbnails_url($this)[0] ?>" alt="<?= $this->title ?>-<?= $this->options->title ?>" class="lazyload fit-cover radius8"></a></div>
						<div class="item-body">
							<h2 class="item-heading"><a href="<?= joe_root_relative_link($this->permalink) ?>"><?= $this->title ?></a></h2>
							<div class="item-tags scroll-x no-scrollbar mb6"><?= joe_get_archive_tags($this) ?></div>
							<div class="item-meta muted-2-color flex jsb ac">
								<item class="meta-author flex ac"><a href="<?= $this->author->permalink ?>"><span class="avatar-mini"><img alt="<?= $this->author->screenName ?>的头像-<?= $this->options->title ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->author->mail) ?>" class="lazyload avatar avatar-id-<?= $this->author->uid ?>"></span></a><span title="<?php $this->date('Y-m-d H:i:s') ?>" class="ml6"><?= joe_dateWord($this->dateWord) ?></span></item>
								<div class="meta-right">
									<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="<?= joe_root_relative_link($this->permalink) ?>#respond"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?php $this->commentsNum('%d') ?></a></item>
									<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg><?= number_format($this->views); ?></item>
									<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= number_format($this->agree) ?></item>
								</div>
							</div>
						</div>
					</posts><?php
				}