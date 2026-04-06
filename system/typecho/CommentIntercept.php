<?php

namespace joe\typecho;

class CommentIntercept
{
    /* 判断敏感词是否在字符串内 */
    private static function sensitiveWords($pregs_string, $string)
    {
        $preg_list = explode("||", $pregs_string);
        if (empty($preg_list)) return false;
        foreach ($preg_list as $preg) {
            $preg = trim($preg);
            if (str_starts_with($preg, '/')) return preg_match($preg, $string);
            if (strpos($string, $preg) !== false) return true;
        }
        return false;
    }
    public static function waiting($text)
    {
        // 判断用户输入是否大于字符
        if (\Helper::options()->JTextLimit && mb_strlen($text) > \Helper::options()->JTextLimit) {
            \Typecho\Cookie::set('__typecho_remember_text', $text);
            throw new \Typecho\Widget\Exception(_t('评论的内容超出 ' . \Helper::options()->JTextLimit . ' 字符限制！'));
        }

        // 判断评论是否至少包含一个中文
        if (\Helper::options()->JLimitOneChinese == "on" && preg_match("/[\x{4e00}-\x{9fa5}]/u", $text) == 0) {
            \Typecho\Cookie::set('__typecho_remember_text', $text);
            throw new \Typecho\Widget\Exception(_t('评论至少包含一个中文！'));
        }

        // 判断评论内容是否包含敏感词
        if (\Helper::options()->JSensitiveWords && self::sensitiveWords(\Helper::options()->JSensitiveWords, $text)) return true;

        // 评论敏感词API检测
        if (\Helper::options()->JSensitiveWordApi) {
            $sensitive_word_api = joe_option_multi(\Helper::options()->JSensitiveWordApi);
            $sensitive_word_api_info = joe_option_multi($sensitive_word_api[0], ['keys'=>['api', 'content', 'is', 'message']]);
            $sensitive_word_api_header = empty($sensitive_word_api[1]) ? null : $sensitive_word_api[1];

            if (empty($sensitive_word_api_info['api'])) throw new \Typecho\Widget\Exception(_t('评论敏感词检测API地址设置错误'));
            if (empty($sensitive_word_api_info['content'])) throw new \Typecho\Widget\Exception(_t('评论敏感词检测API请求内容字段设置错误'));
            if (empty($sensitive_word_api_info['is'])) throw new \Typecho\Widget\Exception(_t('评论敏感词检测API响应违规字段设置错误'));

            $client = new \network\http\Client(['timeout' => 5]);
            $IP = joe_request()->getIp();
            if (!empty($IP)) $client->header([
                'client-ip' => $IP,
                'x-real-ip' => $IP,
                'x-forwarded-for' => $IP,
            ]);
            if (is_array($sensitive_word_api_header)) $client->header($sensitive_word_api_header);
            $response = $client->post($sensitive_word_api_info['api'], [
                $sensitive_word_api_info['content'] => $text,
                'userIp' => $IP,
            ]);
            $data = $response->toArray();

            if (is_array($data) && !empty($data)) {
                if (isset($data[$sensitive_word_api_info['is']])) {
                    return $data[$sensitive_word_api_info['is']] ? true : false;
                } else {
                    return false;
                }
            } else {
                $error = empty($response->error()) ? $response->body() : $response->error();
                throw new \Typecho\Widget\Exception(_t('评论敏感词检测接口响应失败：' . $error));
            }
        }

        return false;
    }
    public static function message($comment)
    {
        if (\Helper::options()->JCommentStatus == 'off') {
            throw new \Typecho\Widget\Exception(_t('叼毛 不要想着强制评论！'));
            return false;
        }
        if (\Helper::options()->JcommentLogin == 'on' && !is_numeric(JOE_USER_ID)) {
            throw new \Typecho\Widget\Exception(_t('叼毛 老老实实登录评论！'));
            return false;
        }

        if (joe_user_alloc()->group !== 'administrator' && self::waiting($comment['text'])) {
            $comment['status'] = 'waiting';
        }

        // Typecho\Cookie::delete('__typecho_remember_text');
        return $comment;
    }
}
