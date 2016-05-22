<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fob
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
        <div class="container">
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img  src="/img/burger.png"/> </a>
          <ul class="dropdown-menu">
            <li><a href="/">Наши продукты</a></li>
            <li><a href="/order.php">Заказать полис</a></li>
            <li><a href="/">О компании</a></li>
          </ul>
        </li>
        <li class="active"><a href="#intro">Главная</a></li>
        <li><a href="#service">О сервисе</a></li>
		<li><a href="#why">Почему мы</a></li>
        <li><a href="#corp">Корп. клиентам</a></li>
        <li><a href="#reply">Отзывы</a></li>
		<li><a href="#contact">Контакты</a></li>
        
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>