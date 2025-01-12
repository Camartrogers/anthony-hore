<?php
get_header();
?>
<main class="">
    <section id='banner' class='bg-[#FCDB52] h-screen relative overflow-hidden'>
        <div class='container grid md:grid-cols-6 pt-[250px] '>
            <div class='md:col-span-3 lg:grid lg:grid-cols-3 scroll-reveal'>
                <p class='lg:col-span-2 mb-5'><?= get_field('banner_intro'); ?></p>
            </div>
            <div class='md:col-span-2 md:col-start-5 lg:col-start-4 lg:col-span-3'>
                <a href='mailto:anthonyhore@gmail.com' target='_blank' class='group scroll-reveal inline-block border-b border-b-black pb-3 relative line-clamp-1 overflow-hidden'>
                    <span class='absolute transition-all -top-12 duration-500 group-hover:top-0'><?= get_field('heading'); ?></span>
                    <span class='relative top-0 group-hover:top-14 transition-all duration-500'><?= get_field('heading'); ?></span>
                </a>
            </div>
            <div class='absolute bottom-7 left-0 w-full '>
                <?php
                $image_id = get_field('banner_image'); 
                if( $image_id ) {
                    echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'scroll-reveal w-full hidden md:block' ) );
                };
                $image_id = get_field('mobile_banner_image'); 
                if( $image_id ) {
                    echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'scroll-reveal w-full md:hidden scale-110' ) );
                };
                ?>
            </div>
        </div>
    </section>
    <section id='work' class='container mt-[100px]'>
        <?php $featured_posts = get_field('feature_projects');
        if( $featured_posts ): ?>
            <ul class='grid md:grid-cols-2 gap-x-4 gap-y-16 auto-rows-fr	'>
                <?php foreach( $featured_posts as $featured_post ): 
                $permalink = get_permalink( $featured_post->ID );
                $title = get_the_title( $featured_post->ID );
                $role = get_field( 'role', $featured_post->ID );
                $video = get_field('thumbnail_video', $featured_post->ID);
                $vimeo = get_field('vimeo_id', $featured_post->ID);
                $thumbnail_image = get_field('thumbnail_image', $featured_post->ID);
                ?>

                    <li class='scroll-reveal'>
                        <a href="<?php echo esc_url( $permalink ); ?>" class='group'>
                            <div class='lg:grid lg:grid-cols-3'>
                                <?php
                                if ($video) : ?>
                                    <div class='scroll-reveal col-span-full video-container'>
                                        <iframe class='hover-play' src="https://player.vimeo.com/video/<?php echo $vimeo;?>?controls=0" width="100%" height="100%" frameborder="0" allow="autoplay;" allowfullscreen muted ></iframe>
                                    </div>
                                <?php else :
                                    echo wp_get_attachment_image( $thumbnail_image, 'full', false, array( 'class' => 'w-full col-span-full' ) );
                                endif; ?>
                                <h2 class='my-6 relative line-clamp-1 overflow-hidden'>
                                        <span class='absolute transition-all -top-12 duration-500 group-hover:top-0'><?php echo esc_html( $title ); ?></span>
                                        <span class='relative top-0 group-hover:top-14 transition-all duration-500'><?php echo esc_html( $title ); ?></span>
                                </h2>
                                <p class='lg:col-span-2 lg:my-6'><?php echo esc_html( $role ); ?></p>
                            </div>
                        </a>
                    </li>

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
</main>
<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>
<footer class="my-[200px]">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto grid md:grid-cols-2 gap-x-4 gap-y-[100px]">
        <div class='grid md:grid-cols-3'>
            <h2 class='text-[2.5rem] mb-10 col-span-full leading-none flex'>
                <a href="<?= get_field('column_1_link');?>" class='overflow-hidden group relative line-clamp-1'>
                    <span class='absolute transition-all -top-12 duration-500 group-hover:top-0'>Archive</span>
                    <span class='relative top-0 group-hover:top-14 transition-all duration-500'>Archive</span>
                </a>
            </h2>
            <p class='md:col-span-2 [&_a]:underline'><?= get_field('column_1_copy');?></p>
        </div>
        <div>
            <h2 class='text-[2.5rem] mb-10 flex leading-none'>
                <a href="<?= get_field('column_2_link');?>" class='overflow-hidden group relative line-clamp-1'>
                    <span class='absolute transition-all -top-12 duration-500 group-hover:top-0'>Contact</span>
                    <span class='relative top-0 group-hover:top-14 transition-all duration-500'>Contact</span>
                </a>
            </h2>
            <p class='[&_a]:underline'><?= get_field('column_2_copy');?></p>
        </div>
	</div>
</footer>
<?php
get_footer();