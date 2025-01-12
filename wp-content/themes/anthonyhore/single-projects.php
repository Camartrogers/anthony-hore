<?php
/*
Single Project CPT
*/

get_header();
?>
<main class="container mx-auto">
    <section class="grid sm:grid-cols-2 mt-[245px]">
        <h1 class='sm:text-[2.5rem] mb-5 scroll-reveal'><?= get_the_title(); ?></h1>
        <p class='text-[2.5rem] mb-[200px] sm:mb-[210px] scroll-reveal'><?= get_field('role')?></p>
        <p class="hidden sm:block scroll-reveal"><?php echo get_field('city').", ". get_field('country')  ?></p>
        <p class="hidden sm:block sm:mb-14 scroll-reveal"><?= get_field('credits')?></p>
        <?php if (get_field('banner_media_video')) :
            // VIDEO ?>
            <div class='sm:col-span-2 video-container scroll-reveal'>
                <?php if (get_field('banner_media_video_play_options') == 'controls') :?>

                    <iframe class='iframe scroll-reveal' src="https://player.vimeo.com/video/<?= get_field('banner_media_vimeo_id')?>" width="100%" height="100%" frameborder="0" allow="autoplay;" allowfullscreen muted ></iframe>

                <?php elseif (get_field('banner_media_video_play_options') == 'hover') :?>

                    <iframe class='hover-play iframe scroll-reveal' src="https://player.vimeo.com/video/<?= get_field('banner_media_vimeo_id')?>?controls=0"  frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen muted ></iframe>

                <?php elseif (get_field('banner_media_video_play_options') == 'autoplay') :?>

                    <iframe class='iframe scroll-reveal' src="https://player.vimeo.com/video/<?= get_field('banner_media_vimeo_id')?>?autoplay=1&loop=1&autopause=0&muted=1&controls=0" class="sm:col-span-2 w-full" width="100%" height="100%" frameborder="0" allow="autoplay;fullscreen;muted;" allowfullscreen></iframe>
                        
                <?php endif;?>
            </div>
        <?php else :
            // STATIC IMAGE
            $image_id = get_field('banner_media_image'); 
            if( $image_id ) {
                echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'sm:col-span-2 w-full scroll-reveal' ) );
            }
        endif;?>
    </div>
    <section class="grid sm:grid-cols-2 container gap-4 mt-4">
        <?php 
        if (have_rows('project_showcase')):
            while (have_rows('project_showcase')): 
                the_row();
                if (get_row_layout() == 'copy'):?>
                    <?php if (!get_sub_field('left_aligned')) :?>
                        <div></div>
                        <?php
                    endif;?>
                    <div class="my-[100px] scroll-reveal">
                        <h2 class='text-[2.5rem] mb-6 sm:mb-8 '><?= get_sub_field('heading'); ?></h2>
                        <div>
                            <?= get_sub_field('copy');?>
                        </div>
                    </div>
                    <?php
                elseif (get_row_layout() == 'image_gallery'):
                    if (have_rows('row')):
                        $count=0;
                        while (have_rows('row')): 
                            the_row();
                            $count++;
                        endwhile;
                        ?>
                        <div class="grid gap-4 sm:col-span-2 sm:grid-cols-<?php echo $count;?>">
                                <?php
                            while (have_rows('row')): 
                                the_row();
                                if (get_sub_field('row_media_video')) :
                                    // VIDEO ?>
                                    <div class='scroll-reveal video-container'>
                                        
                                        <?php if (get_sub_field('row_media_video_play_options') == 'controls') :?>

                                            <iframe src="https://player.vimeo.com/video/<?= get_sub_field('row_media_vimeo_id');?>" width="100%" height="100%" frameborder="0" allow="autoplay;" allowfullscreen muted ></iframe>

                                        <?php elseif (get_sub_field('row_media_video_play_options') == 'hover') :?>

                                            <iframe class='hover-play' src="https://player.vimeo.com/video/<?= get_sub_field('row_media_vimeo_id');?>?controls=0" width="100%" height="100%" frameborder="0" allow="autoplay;" allowfullscreen muted ></iframe>

                                        <?php elseif (get_sub_field('row_media_video_play_options') == 'autoplay') :?>

                                            <iframe src="https://player.vimeo.com/video/<?= get_sub_field('row_media_vimeo_id');?>?autoplay=1&loop=1&autopause=0&muted=1&controls=0" width="100%" height="100%" frameborder="0" allow="autoplay;fullscreen;muted;" allowfullscreen></iframe>

                                        <?php endif;?>
                                    </div>
                                <?php else :
                                    // STATIC IMAGE
                                    $image_id = get_sub_field('row_media_image'); 
                                    if( $image_id ) : ?>
                                        <?php echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'w-full scroll-reveal' ) );
                                    else : 
                                        echo '<div></div>';
                                    endif;
                                endif;
            
                            endwhile;
                            ?>
                        </div>
                        <?php
                    endif;

                endif;
            endwhile;
        endif;
        ?>
    </section>
    <section class="container mt-[362px] sm:mt-[205px]">
        <h3 class='text-[2.5rem] mb-24'>Continue exploring my work:</h3>
        <?php
        $current_id = get_the_ID();

        // Get all projects in ascending order
        $args_all = array(
            'post_type'      => 'projects',   // Your custom post type
            'posts_per_page' => -1,           // Get all projects
            'orderby'        => 'menu_order', // Order by custom order if needed
            'order'          => 'ASC',        // Ascending or Descending
        );

        $all_projects = get_posts($args_all);

        // Find the current project index
        $current_index = -1;
        foreach ($all_projects as $index => $project) {
            if ($project->ID == $current_id) {
                $current_index = $index;
                break;
            }
        }

        // Set up an empty array for the next projects
        $next_projects = array();

        $total_projects = count($all_projects);

        // Calculate the indices of the next two projects
        $next_index_1 = ($current_index + 1) % $total_projects; // Wrap around using modulus
        $next_index_2 = ($current_index + 2) % $total_projects; // Wrap around using modulus

        // Add the next two projects to the array
        $next_projects[] = $all_projects[$next_index_1];
        $next_projects[] = $all_projects[$next_index_2];

        // Now we can output the next two projects
        if ($next_projects) : ?>
            <ul class='grid sm:grid-cols-2 gap-4'>
            <?php 
            foreach ($next_projects as $post) {
                setup_postdata($post);
                ?>
                <li class='scroll-reveal'>
                    <a class='group' href="<?= get_permalink(); ?>">
                        <?php if (get_field('thumbnail_video', $featured_post->ID)) : ?>
                            <div class='scroll-reveal video-container'>
                                <iframe class='hover-play' src="https://player.vimeo.com/video/<?= get_field('vimeo_id', $featured_post->ID);?>?controls=0" width="100%" height="100%" frameborder="0" allow="autoplay;" allowfullscreen muted ></iframe>
                            </div>
                        <?php else : 
                            $image_id = get_field('thumbnail_image', $featured_post->ID); 
                            if( $image_id ) {
                                echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'w-full' ) );
                            }
                        endif; ?>
                        <div class='grid lg:grid-cols-3 gap-4 mt-4'>
                            <h3 class='mb-6 relative line-clamp-1 overflow-hidden'>
                                <span class='absolute transition-all -top-12 duration-500 group-hover:top-0'><?= get_the_title();?></span>
                                <span class='relative top-0 group-hover:top-14 transition-all duration-500'><?= get_the_title();?></span>
                            </h3>
                            <p class='col-span-2'><?= get_field('role'); ?></p>
                        </div>
                    </a>
                </li>
                <?php
            } ?>
            </ul>
            <?php wp_reset_postdata();
        endif;
        ?>


    </section>
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer class="mt-[188px] mb-[200px]">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto grid sm:grid-cols-2">
        <h2 class='text-[2.5rem] mb-10'><?= get_field('single_project_footer_heading','options') ?></h2>
        <div class=" [&_a]:underline">
            <?= get_field('single_project_footer_copy','options') ?>
        </div>
	</div>
</footer>

</div>
<?php
get_footer();