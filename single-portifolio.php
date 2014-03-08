<?php
/**
/** Template para single específico de Custom Post Type

* @package Quebrando a Cabeça
* @subpackage custom-post-type
* @Author Quebrando a Cabeça
* @Author URL http://quebrandoacabeca.com
* @Post URL http://quebrandoacabeca.com/criar-custom-post-type
*/
get_header(); //CHAMA O HEADER/CABEÇALHO ?>
<div id="primary" class="site-content">
   <div id="content" role="main">
    <?php while ( have_posts() ) : the_post(); //INÍCIO DO LOOP ?>
      <h2><?php the_title(); //EXIBE O TÍTULO DO POST ?></h2>
      <div><?php $cliente = get_post_meta($post->ID, 'cliente', true); echo '<strong>Cliente: </strong>' . $cliente; ?></div>
      <div><?php $ano = get_post_meta($post->ID, 'ano', true); echo '<strong>Ano: </strong>' . $ano; ?></div>
      <div><?php $servico = get_post_meta($post->ID, 'servico', true); echo '<strong>Serviço: </strong>' . $servico; ?></div>
      <div><?php the_content(); // EXIBE O CONTEÚDO DO POST ?></div>
 
    <?php endwhile; //FINAL DO LOOP ?>
 
   </div><!-- #content -->
 </div><!-- #primary -->
 
<?php get_sidebar(); // EXIBE A BARRA LATERAL ?>
<?php get_footer(); // EXIBE O FOOTER/RODAPE ?>
