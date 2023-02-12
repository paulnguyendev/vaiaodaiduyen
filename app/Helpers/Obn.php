<?php

namespace App\Helpers;

use App\Models\SettingModel;
use App\Models\UserModel;
use Jenssegers\Agent\Agent;
use Gloudemans\Shoppingcart\Facades\Cart;

class Obn
{
    public static function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (UserModel::where("code", "=", $code)->first());
        return $code;
    }
    public static function get_logo()
    {
        return asset('obn-dashboard/img/logo.png');
    }
    public static function showStatus($status)
    {
        $xhtml_status = null;
        $status = $status ? $status : 'default';
        $tpl_status = config('obn.status.template');
        $current_status = isset($tpl_status[$status]) ? $tpl_status[$status] : $tpl_status['default'];
        $xhtml_status = sprintf('<span class = "badge %s">%s</span>', $current_status['class'], $current_status['name']);
        return $xhtml_status;
    }
    public static function showTicketStatus($status)
    {
        $xhtml_status = null;
        $status = $status ? $status : 'default';
        $tpl_status = config('obn.ticket.status');
        $current_status = isset($tpl_status[$status]) ? $tpl_status[$status] : $tpl_status['default'];
        $xhtml_status = sprintf('<span class = "badge %s">%s</span>', $current_status['class'], $current_status['name']);
        return $xhtml_status;
    }
    public static function showPrice($price)
    {
        $result = number_format($price) . " đ";
        return $result;
    }
    public static function showThumbnail($thumb)
    {
        $result = $thumb ? $thumb : asset('obn-dashboard/img/no-image.png');
        return $result;
    }
    public static function checkDevice()
    {
        $agent = new Agent();
        if ($agent->isMobile()) {
            $result = 'mobile';
        } elseif ($agent->isDesktop()) {
            $result = 'isTablet';
        } else {
            $result = 'desktop';
        }
        return $result;
    }
    public static function showTime($time)
    {
        $timeFormat = config('obn.format.short_time');
        $xhtml = ($time) ? date($timeFormat, strtotime($time)) : "Chưa xác định";
        return $xhtml;
    }
    public static function searchCartById($id)
    {
        $cart = Cart::instance('frontend')->content()->toArray();
        $result = array_filter($cart, function ($item) use ($id) {
            if ($item['id'] == $id) {
                return $item;
            }
        });
        $result = array_shift($result);
        return $result;
    }
    public static function getSetting($meta_key, $sub_key = '')
    {
        $result = null;
        $model = new SettingModel();
        $item = $model->getItem(['meta_key' => $meta_key], ['task' => 'meta_key']);
        $result = $item ? $item['meta_value'] : "";
        // $result = self::json_validate($result);

        return $result;
    }
    public static function json_validate($string)
    {

        // decode the JSON data

        // switch and check possible JSON errors
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $error = ''; // JSON is valid // No error has occurred
                break;
            case JSON_ERROR_DEPTH:
                $error = 'The maximum stack depth has been exceeded.';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'Invalid or malformed JSON.';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'Control character error, possibly incorrectly encoded.';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON.';
                break;
                // PHP >= 5.3.3
            case JSON_ERROR_UTF8:
                $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
                break;
                // PHP >= 5.5.0
            case JSON_ERROR_RECURSION:
                $error = 'One or more recursive references in the value to be encoded.';
                break;
                // PHP >= 5.5.0
            case JSON_ERROR_INF_OR_NAN:
                $error = 'One or more NAN or INF values in the value to be encoded.';
                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                $error = 'A value of a type that cannot be encoded was given.';
                break;
            default:
                $error = 'Unknown JSON error occured.';
                break;
        }
        if ($error !== '') {
            // throw the Exception or exit // or whatever :)
            $result = json_decode($string, true);
        } else {

            $result = $string;
        }
        return $result;

        // everything is OK

    }
    public static function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }
}
