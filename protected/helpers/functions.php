<?php
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

function app() {
    return Yii::app();
}

function cs() {
    return Yii::app()->getClientScript();
}

function user() {
    return Yii::app()->getUser();
}

function url($route, $params = array(), $ampersand = '&') {
    return Yii::app()->createUrl($route, $params, $ampersand);
}

function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, Yii::app()->charset);
}

function l($text, $url = '#', $htmlOptions = array()) {
    return CHtml::link($text, $url, $htmlOptions);
}

function t($message, $category = 'stay', $params = array(), $source = null, $language = null) {
    return Yii::t($category, $message, $params, $source, $language);
}

function req() {
    return Yii::app()->getRequest();
}

function bu($url = null) {
    static $baseUrl;
    if ($baseUrl === null) {
        $baseUrl = Yii::app()->getRequest()->getBaseUrl();
    }
    return $url === null ? $baseUrl : $baseUrl . '/' . ltrim($url, '/');
}

function param($name) {
    return Yii::app()->params[$name];
}

function dump($data) {
    return CVarDumper::dump($data, 10, true);
}

function autoLink($text) {
    $text = preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $text);
    $text = preg_replace("/href=\"www/i", "href=\"http://www", $text);
    return $text;
}

function mb_trim($str) {
    return trim(mb_convert_kana($str, 's', Yii::app()->charset));
}

function f($name, $value) {
    return Yii::app()->format->{$name}($value);
}

