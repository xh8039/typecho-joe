<?php

namespace joe\typecho;

use think\facade\Db;

class CommentEmail
{
	private static function commentLink($text, $link, $type)
	{
		$text = $text . '<br><a style="display:block;color: #12addb;text-decoration: none;text-align:right;" href="' . $link . '" target="_blank">查看' . $type . '</a>';
		return $text;
	}

	private static function parseCommentReply($text)
	{
		$text = nl2br($text);
		if (strpos($text, '[') === false || strpos($text, ']') === false) return $text;
		// 表情
		$text = preg_replace('/\[g=(.*?)\]/i', '<img style="height:20px;" src="' . \Helper::options()->themeUrl . '/assets/img/smilies/$1.gif" alt="表情[$1]-' . \Helper::options()->title . '">', $text);
		// 代码
		$text = preg_replace('/\[code\](.*?)\[\/code\]/is',  '<pre><code>$1</code></pre>', $text);
		// 图片
		$text = preg_replace('/\[img=(.*?)\]/i', '<img style="max-width:260px;max-height:350px;display:block;width:auto;height:auto;vertical-align:middle;" src="$1" alt="评论图片-' . \Helper::options()->title . '" referrerpolicy="no-referrer" rel="noreferrer">', $text);
		return $text;
	}

	private static function articleUrl($comment_url)
	{
		$pos = strrpos($comment_url, '#');
		return $pos === false ? $comment_url : substr($comment_url, 0, $pos);
	}

	public static function send($comment)
	{
		$text = self::parseCommentReply($comment->text);
		/* 如果是博主发的评论 */
		if ($comment->authorId == $comment->ownerId) {
			/* 发表的评论是回复别人 */
			if ($comment->parent == 0) return;
			$parent_comment = Db::name('comments')->where('coid', $comment->parent)->find();
			/* 被回复的人不是自己时，发送邮件 */
			if (empty($parent_comment['mail']) || $parent_comment['mail'] == $comment->mail) return;
			$text = self::commentLink($text, $comment->permalink, '回复');
			joe_send_mail('您在 [' . $comment->parentContent->title . '] 的评论有了新的回复', '博主 [ ' . $comment->author . ' ] 在《 <a style="color: #12addb;text-decoration: none;" href="' . self::articleUrl($comment->permalink) . '" target="_blank">' . $comment->parentContent->title . '</a> 》上回复了您：', ['评论' => $parent_comment['text'], '回复' => $text], $parent_comment['mail'], 60);
			return;
			/* 如果是游客发的评论 */
		}
		/* 如果是直接发表的评论，不是回复别人，那么发送邮件给博主 */
		if ($comment->parent == 0) {
			$authorMail = Db::name('users')->where('uid', $comment->ownerId)->value('mail');
			if (!$authorMail) return;
			$text = self::commentLink($text, $comment->permalink, '评论');
			joe_send_mail('您的文章 [' . $comment->parentContent->title . '] 收到一条新的评论', $comment->author . ' [' . $comment->ip . '] 在您的《 <a style="color: #12addb;text-decoration: none;" href="' . self::articleUrl($comment->permalink) . '" target="_blank">' . $comment->parentContent->title . '</a> 》上发表评论：', $text, $authorMail, 60);
			/* 如果发表的评论是回复别人 */
		} else {
			$parent_comment = Db::name('comments')->where('coid', $comment->parent)->find();
			/* 被回复的人不是自己时，发送邮件 */
			if (empty($parent_comment['mail']) || $parent_comment['mail'] == $comment->mail) return;
			$text = self::commentLink($text, $comment->permalink, '回复');
			joe_send_mail('您在 [' . $comment->parentContent->title . '] 的评论有了新的回复', $comment->author . ' 在《 <a style="color: #12addb;text-decoration: none;" href="' . self::articleUrl($comment->permalink) . '" target="_blank">' . $comment->parentContent->title . '</a> 》上回复了您：', ['评论' => $parent_comment['text'], '回复' => $text], $parent_comment['mail'], 60);
		}
	}
}
