<?php
/**
/** Template para single específico de Custom Post Type

* @package Quebrando a Cabeça
* @subpackage custom-post-type
* @Author Quebrando a Cabeça
* @Author URL http://quebrandoacabeca.com
* @Post URL http://quebrandoacabeca.com/loop-para-post-type-especifico
*/
get_header(); //CHAMA O HEADER/CABEÇALHO ?>

<style type="text/css">
/* EXEMPLO LOOP PARA POST TYPE ESPECÍFICO */
 
.imgDestacada {
 
    float:left;
    width:620px;
    height:200px;
    margin-bottom:20px;
}
 
.tituloPost {
    font-size:18px;
    color:#000;
    text-decoration:none;
}
 
.conteudoPost {
    width:580px;
    padding:0 20px;
    font-size:15px;
    text-align:justify;
    margin-top:10px;
}

</style>

<div class="site-content" id="primary">
<div id="content" role="main">
<!-- CHAMA A BUSCA PARA POST TYPE ESPECÍFICO -->
<?php include (TEMPLATEPATH . '/searchform-portifolio.php'); ?>
<h2>Galeria do Portifólio</h2>
<!-- AQUI VAI O CONTEÚDO DO LOOP PARA POST TYPE ESPECÍFICO -->
<!-- VERIFICA SE TEM CUSTOM POST TYPE PORTIFOLIO -->
<?php $args=array('posts_per_page'=>12, 'post_type'=>'portifolio', 'order' => 'DESC'); ?>
<?php query_posts($args);
	while (have_posts()) : the_post(); ?>
 
 
<!-- ADICIONA A IMAGEM DESTACADA DO POST -->
<div class="imgDestacada">
 <?php the_post_thumbnail( ); ?>
</div>
 
<!-- ADICIONA O TITULO DO POST -->
<h1><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>">
 <?php the_title(); ?>
 </a></h1>
  
 
<div class="conteudoPost">
<!-- ADICIONA OS CAMPOS PERSONALIZADOS -->
<div><?php $cliente = get_post_meta($post->ID, 'cliente', true); echo '<strong>Cliente: </strong>' . $cliente; ?></div>
<div><?php $ano = get_post_meta($post->ID, 'ano', true); echo '<strong>Ano: </strong>' . $ano; ?></div>
<div><?php $servico = get_post_meta($post->ID, 'servico', true); echo '<strong>Serviço: </strong>' . $servico; ?></div>
<!-- ADICIONA O BLOCO DO CONTEÚDO -->
<?php the_content(); ?><br /><br />
</div>
<?php endwhile;?>
</div><!-- #content -->
</div><!-- #primary -->

<!-- ADICIONA A COLUNA LATERAL (SIDEBAR) -->
<?php get_sidebar(); ?>
<!-- ADICIONA O BLOCO FOOTER -->
<?php get_footer(); ?>
