<?php
/*
Template Name: Contact
*/

get_header();
?>
<main class="container mx-auto">
    <div class='grid gap-y-[200px] container my-[250px] bg-white'>
        <?php if (have_rows('heading_and_copy_block')):
            while (have_rows('heading_and_copy_block')): 
                the_row();?>
                <section class="grid sm:grid-cols-2 scroll-reveal">
                    <h2 class='text-[2.5rem] mb-4'><?= get_sub_field('heading')?></h2>
                    <div  class='[&_a]:underline [&_p]:mb-4'>
                        <?=  get_sub_field('copy')?>
                    </div>
                </section>

            <?php endwhile;
        endif;?>
    </div>
</main>
<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>
<?php
get_footer();