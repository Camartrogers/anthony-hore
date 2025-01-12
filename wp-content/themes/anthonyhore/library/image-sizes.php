<?php
// Change the maximum srcset width for image, default is 1600px
function change_max_srcset_image_width($max_width)
{
    return 2500;
}
add_filter('max_srcset_image_width', 'change_max_srcset_image_width');

// disable generated image sizes
function disable_image_sizes($sizes)
{
    unset($sizes['thumbnail']);    // disable thumbnail size
    unset($sizes['medium']);       // disable medium size
    unset($sizes['large']);        // disable large size
    unset($sizes['medium_large']); // disable medium-large size
    unset($sizes['1536x1536']);    // disable 2x medium-large size
    unset($sizes['2048x2048']);    // disable 2x large size
    return $sizes;
}
add_action('intermediate_image_sizes_advanced', 'disable_image_sizes');
// disable scaled image size

add_filter('big_image_size_threshold', '__return_false');

// disable other image sizes
function disable_other_image_sizes()
{
    remove_image_size('post-thumbnail');
}
add_action('init', 'disable_other_image_sizes');

// ----- Add additional image sizes -----

add_image_size('logo', 200);
add_image_size('xsmall', 320);
add_image_size('small', 640);
add_image_size('medium', 1024);
add_image_size('large', 1400);
add_image_size('xlarge', 1920);
add_image_size('max', 2500);


// ----- Register the new image sizes for use in the add media modal in wp-admin -----

function custom_sizes($sizes)
{
    return array_merge(
        $sizes,
        array(
            'xsmall' => __('Extra Small (320)'),
            'small'  => __('Small (640)'),
            'medium' => __('Medium (1050)'),
            'large'  => __('Large (1220)'),
            'xlarge' => __('Extra Large (1920)'),
            'max' => __('Maximum Size (3000)'),
        )
    );
}
add_filter('image_size_names_choose', 'custom_sizes');

// ------ Define breakpoints constant ------
define('MEDIUM_UP', '782px');
define('LARGE_UP', '1024px');
define('XLARGE_UP', '1280px');
define('XXLARGE_UP', '1536px');
define('BREAKPOINT_MAX', '1600px');
