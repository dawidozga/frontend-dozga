<?php

/**
 * frontend-dozga functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package frontend-dozga
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Include BFI Thumb Library
 */
require_once('libraries/BFI_Thumb.php');

/**
 * Include Sripts & Styles
 */
function frontend_dozga_scripts()
{
    // Enqueue Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('index', get_template_directory_uri() . '/dist/js/index.js', array(), _S_VERSION, true);

    // Enqueue Styles
    wp_enqueue_style('index', get_template_directory_uri() . '/dist/css/index.css', array(), _S_VERSION);
}
add_action('wp_enqueue_scripts', 'frontend_dozga_scripts');


/**
 * Register a new block
 */
function my_acf_init_block_types()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'case_studies',
            'title'             => __('Case studies'),
            'description'       => __('A custom case studies block.'),
            'render_template'   => 'template-parts/blocks/case-studies/case-studies.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('case studies', 'quote'),
        ));
    }
}
add_action('acf/init', 'my_acf_init_block_types');
