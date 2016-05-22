<?php
/**
 * The template for displaying main page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Главная страница
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes
 */

get_header();


	while ( have_posts() ) : the_post();

				the_content();

				

			endwhile; // End of the loop.
 ?>

	<!-- /Section: about -->

<?php

get_footer();
