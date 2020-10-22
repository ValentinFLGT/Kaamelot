<?php
/*
 * Plugin Name: Kaamelot Quote
 * Plugin URI: https://hotentic.com/
 * Description: This is not a simple plugin. It is THE plugin ! Displays a random quote from the famous tv-show Kaamelot in the right corner of your Wordpress admin panel!
 * Author: Valentin Folliguet
 * Author URI: https://www.linkedin.com/in/valentin-folliguet-2245a21a1/
 * Version: 1.0
 */

function kaamelotQuote()
{
    $kaamelotQuote = file_get_contents("https://kaamelott.hotentic.com/api/random");
    $data = json_decode($kaamelotQuote);
    echo "<div id=\"kaamelotQuote\">{$data->citation->citation}</div>";
}

add_action('admin_notices', 'kaamelotQuote');

function kaamelotQuoteCss()
{
    $plugin_url = plugin_dir_url(__FILE__);
    wp_enqueue_style('kaamelot-quote-style', $plugin_url . 'style.css');
}

add_action('admin_enqueue_scripts', 'kaamelotQuoteCss');

