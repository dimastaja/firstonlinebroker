<?php
/**
 * The template for displaying products.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Продукты
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fob
 */

//get_header(); ?>


<?

	the_post();

            $rows = get_field('product' );
            
				

   
// loop through the rows of data
    
    ?>
	<!-- Section: intro -->
    <section id="intro" class="intro" style="display: block;">
       <div class="section-heading text-center">
       	<h2>Online страхование юридических лиц.</h2>
        <p>Сюда нужна картинка в фон красивая</p>
					
					<i class="fa fa-2x fa-angle-down"></i>

		</div>
        <div class="prod_wrapper">
        <?
        foreach($rows as $item)
            {
                ?>
                <a href="#<?=$item['code']?>" class="intro-block" style="background: transparent url('<?=$item['pic']['url']?>') repeat scroll 0% 0% / cover ;" title='<?=$item['name']?>'>
                    <span class="intro-block-label"><?=$item['name']?></span>
                </a>
                <?
            }
        
        ?>
            
            
            <div class="clear"></div>
        </div>
    </section>


<?php

//get_footer();
