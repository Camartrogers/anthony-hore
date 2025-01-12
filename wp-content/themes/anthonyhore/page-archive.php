<?php
/*
Template Name: Archive
*/

get_header();
?>
<main class="container mx-auto">
    <div class='hidden lg:grid gap-y-[200px] my-[200px]'>
        <section class="grid sm:grid-cols-2 ">
            <h1 class='text-[2.5rem]'><?= get_the_title();?></h1>
            <div class='[&_a]:underline'>
                <p><?= get_field('heading'); ?></p>
            </div>
        </section>
        <section>
            <ul class='ml-0'>
            <?php if (have_rows('projects_archive')):
            $total_rows = count(get_field('projects_archive'));
            while (have_rows('projects_archive')): 
                the_row();
                $current_row = get_row_index();?>
                <li class="relative grid md:grid-cols-3 py-5 border-t border-t-black items-center group  <?php if ($current_row == $total_rows){ echo 'border-b border-b-black';}?>">
                    <p class='text-[2.5rem] mb-0 scroll-reveal'><?= get_sub_field('project_title'); ?></p>
                    <p class='mb-0 scroll-reveal'><?= get_sub_field('location'); ?></p>
                    <p class='mb-0 scroll-reveal'><?= get_sub_field('your_expertise'); ?></p>
                    <div class='absolute right-0 transition-all duration-500 -top-4 group-hover:-top-20 opacity-0 group-hover:opacity-100 max-w-[50%] z-50'>
                        <?php $image_id = get_sub_field('hover_image'); 
                        if( $image_id ) {
                            echo wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'w-full hidden md:block' ) );
                        };
                        ?>
                    </div>
                </li>

            <?php endwhile;
            endif;?>
            </ul>
        </section>
    </div>
    <div class="my-[200px] lg:hidden">
        <div class="text-[2.5rem]">
            <?= get_field('mobile_messaging');?>
        </div>
    </div>
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>
<footer class="mb-[200px]">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto grid sm:grid-cols-2">
        <h2 class='text-[2.5rem] mb-10'><a href="<?= get_field('link'); ?>">Contact</a></h2>
        <div class=" [&_a]:underline">
            <?= get_field('copy'); ?>
        </div>
	</div>
</footer>
<?php
get_footer();