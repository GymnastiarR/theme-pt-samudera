<?php

function template_features()
{
    register_nav_menus([
        'header-menu' => 'Header Menu'
    ]);
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    // function name($item)
    // {
    //     echo $item;
    // }
    // add_settings_field('description-site', 'Description Site', 'name', 'general');
}

function register_fields()
{

    // register_setting();
    add_settings_field('description-site', 'Description Site', 'textbox_callback', 'general');

    function textbox_callback($args)
    {
        $options = get_option('description-site');
        echo ($options);
        echo "<input id='desc-site' name='description-site'>";
    }

    add_settings_field(
        'blog_display_count',
        'Blog Display Count',
        'ch_essentials_textbox_callback',
        'general',
        'default',
        array(
            'blog_display_count'  // $args for callback
        )
    );

    // My Shared Callback
    function ch_essentials_textbox_callback($args)
    {


        print_r($args);
        // print_r($val);

        // echo '<input type="text" id="'  . $args[0] . '" name="ch_essentials_front_page_option['  . $args[0] . ']" value="' . $options[''  . $args[0] . ''] . '">';
    }
}

// add_filter('admin_init', 'register_fields');

function register_template_post_type()
{
    register_post_type('about-card', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => 'About Cards',
            'singular_name' => 'About Card',
            'add_new_item' => 'Add About Card',
            'edit_item' => 'Edit About Card',
            'all_items' => 'All About Cards'
        ],
        'supports' => ['title', 'thumbnail', 'excerpt'],
        'rewrite' => ['slug' => 'about-card']
    ]);
}

add_action('init', 'template_features');
add_action('init', 'register_template_post_type');

function template_styles()
{
    wp_enqueue_style('main_style', get_stylesheet_uri());
    wp_enqueue_style('fonts', 'https://fonts.gstatic.com', false);
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap', false);
}

add_action('wp_enqueue_scripts', 'template_styles');


add_action('admin_init', 'my_general_section');
function my_general_section()
{
    add_settings_section(
        'banner_settings', // Section ID 
        'Banner Settings', // Section Title
        'banner_section_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 2
        'title_banner', // Option ID
        'Title For Banner', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'banner_settings', // Name of our section (General Settings)
        array( // The $args
            'title_banner' // Should match Option ID
        )
    );

    add_settings_field( // Option 1
        'description_banner', // Option ID
        'Description', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'banner_settings', // Name of our section
        array( // The $args
            'description_banner' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'text_button', // Option ID
        'Text For Button', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'banner_settings', // Name of our section (General Settings)
        array( // The $args
            'text_button' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'text_color', // Option ID
        'Color For Text', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'banner_settings', // Name of our section (General Settings)
        array( // The $args
            'text_color', '#F5F5F5' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'button_color', // Option ID
        'Color For Button', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'banner_settings', // Name of our section (General Settings)
        array( // The $args
            'button_color' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'link_button', // Option ID
        'Link For Button', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'banner_settings', // Name of our section (General Settings)
        array( // The $args
            'link_button' // Should match Option ID
        )
    );
    register_setting('general', 'title_banner', 'esc_attr');
    register_setting('general', 'description_banner', 'esc_attr');
    register_setting('general', 'text_button', 'esc_attr');
    register_setting('general', 'text_color', 'esc_attr');
    register_setting('general', 'button_color', 'esc_attr');
    register_setting('general', 'link_button', 'esc_attr');
}

function banner_section_callback()
{ // Section Callback
    echo '<p>Little Information to display in banner</p>';
}

function my_textbox_callback($args)
{  // Textbox Callback
    $option = get_option($args[0]);
    $placeholder = '';
    if (isset($args[1])) {
        $placeholder = $args[1];
    }
    echo '<input style="width : 50%;" type="text" id="' . $args[0] . '" name="' . $args[0] . '" value="' . $option . '" placeholder="' . $placeholder . '" />';
}

function themename_customize_register($wp_customize)
{
    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[text_test]', array(
        'default'        => 'value_xyz',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('themename_text_test', array(
        'label'      => __('Text Test', 'themename'),
        'section'    => 'themename_color_scheme',
        'settings'   => 'themename_theme_options[text_test]',
    ));
}

add_action('customize_register', 'themename_customize_register');
