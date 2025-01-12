<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
	<script src="https://player.vimeo.com/api/player.js"></script>

	<?php wp_head(); ?>
</head>

<body x-data="{ mobileNav: false}" 
:class="mobileNav == false ? '' : 'h-screen overflow-hidden'">

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header id='main-header' class='fixed top-0 left-0 right-0 z-10 transition-all duration-500'>
		<div class="mx-auto container pt-4">
				<div class="flex justify-between md:grid md:grid-cols-6">
					
					<div class="sm:col-span-3 md:col-span-2 lg:col-span-3">
						<a href="<?= home_url();?>" class="text-base rounded-full px-3 py-1  <?php if (is_front_page()) { echo 'scroll-bg-yellow transition-colors';} else { echo 'bg-white';} ?>">
							Anthony Hore
						</a>
					</div>

					<div class="hidden md:flex sm:col-span-3 md:col-span-4 lg:col-span-3  md:justify-between">
						<p class='whitespace-nowrap rounded-full px-3 py-1 <?php if (is_front_page()) { echo 'scroll-bg-yellow transition-colors';} else { echo 'bg-white';} ?>'>Design + Art Direction</p>
						<div class='flex items-start'>
							<button id='work-button' class='mr-8 rounded-full px-3 py-1 <?php if (is_front_page()) { echo 'scroll-bg-yellow transition-colors';} else { echo 'bg-white';} ?>'>Work</button>
							<?php
						$li_class = is_front_page() 
							? 'scroll-bg-yellow transition-colors md:mx-4 rounded-full px-3 py-1 flex items-center' 
							: 'md:mx-4 rounded-full px-3 py-1 flex items-center bg-white';

						wp_nav_menu(
							array(
								'container_id'    => 'primary-menu',
								'container_class' => 'hidden md:block',
								'menu_class'      => 'md:flex md:-mx-4',
								'theme_location'  => 'primary',
								'li_class'        => $li_class,
								'fallback_cb'     => false,
							)
						);
							?>
						</div>
					</div>
<!-- BEGIN MOBILE NAV -->
					<button
					@click="mobileNav == true ? mobileNav = false : mobileNav = true" 
					class='h-[25px] w-5 flex flex-col flex-shrink-0 justify-center items-center relative z-10 md:hidden'>
						<span class='w-full border-b border-b-black transition-all' :class="mobileNav == false ? '' : 'rotate-45'"></span>
						<span class='w-full border-b border-b-black mt-1 transition-all' :class="mobileNav == false ? '' : 'hidden'"></span>
						<span class='w-full border-b border-b-black mt-1 transition-all relative' :class="mobileNav == false ? '' : '-rotate-45 bottom-[5px]'"></span>
					</button>

					<div class="absolute md:hidden transition-all duration-500 top-0 flex flex-col justify-end pl-5 h-screen" 
					:class="mobileNav == false ? '-right-[105vw] w-0' : 'w-screen overflow-hidden right-0 bg-white'">
						<nav>
							<a href="<?php echo home_url()?>?work=true" class='md:mx-4 text-[2.5rem]'>Work</a>
							<?php
							wp_nav_menu(
								array(
									'container_id'    => '',
									'container_class' => '',
									'menu_class'      => '',
									'theme_location'  => 'mobile',
									'li_class'        => 'md:mx-4 text-[2.5rem]',
									'fallback_cb'     => false,
								)
							);
							?>
						</nav>
						<ul class='pb-6 pt-[100px]'>
							<li><a href="mailto:anthonyhore@gmail.com" target='_blank' class="underline">anthonyhore@gmail.com</a></li>
							<?php if (get_field('linkedin_link','options')) :?>
								<li><a href="<?= get_field('linkedin_link','options'); ?>" target='_blank' class="underline">LinkedIn</a></li>
							<?php endif;?>
							<?php if (get_field('instagram_link','options')) :?>
								<li><a href="<?= get_field('instagram_link','options'); ?>" target='_blank' class="underline">Instagram</a></li>
							<?php endif;?>
						</ul>
					</div>
				</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">
		<?php do_action( 'tailpress_content_start' ); ?>


