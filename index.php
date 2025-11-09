<?php
/*
 * Plugin Name: Sarah's Bellis plugin
 * Plugin URI: https://github.com/Heltborg/Sarahs-Bellis-plugin.git
 * Description: Plugin lavet som en pop-up med animationer, overlay og CTA-knap.
 * Version: 0.7
 * Author: Sarah Heltborg Nielsen
 * Author URI: https://portfolio.shstudio.dk
 * License: GPL2
 */

// Sikkerhed
 if (!defined('ABSPATH')) {
    exit; // Forhindrer direkte adgang
}

// Tilføjer CSS
function bellis_enqueue_styles() {
    wp_enqueue_style('bellis-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action('wp_enqueue_scripts', 'bellis_enqueue_styles'); // Sætter i gang

// Tilføjer JS
function bellis_enqueue_scripts() {
    wp_enqueue_script('bellis-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'bellis_enqueue_scripts'); // Sætter i gang

function bellis_popup_box() {
    // Mørkt overlay
    $content  = '<div id="popup-overlay"></div>';

    // Container til min popup
    $content .= '<div id="bellis-container">';

    // Selve popup boksen
    $content .= '<div class="bellis-box slide-top" id="bellis-box">';

    // Luk-knap
    $content .= '<div class="bellis-close-button" id="bellis-close">&#10006;</div>';

    // Overskrift
    $content .= '<h2>CONNECT • CREATE • CELEBRATE</h2>'; 

    // Animationen bliver sat ind som en video
    $content .= '<video id="plugin-video" autoplay muted loop> <source src="' . plugin_dir_url(__FILE__) . 'mov/plugin-animation.mp4" alt="Bellis animation"> </video>'; 

    // Brødteksten
    $content .= '<p>Hos Kulturbodega Bellis går nærvær og kreativitet hånd i hånd. <br> Vi fejrer livets øjeblikke, store som små, og tror på, at magien opstår, når vi connecter, creater og celebrater sammen.</p>';

    // Min CTA-knap
    $content .= '<div class="button-holder"><button id="bellis-button">Bliv en del af fællesskabet</button></div>';

    // Lukker popup-div
    $content .= '</div>';

    // Lukker container-div
    $content .= '</div>';

    return $content;
}
// Shortcode: [sarah_bellis_popup] skal indsættes i WP
add_shortcode('sarah_bellis_popup', 'bellis_popup_box');