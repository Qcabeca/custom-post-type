<?php
/**
 * Template Desenvolvido para busca com Custom Post Type especifico (portifolio)
 *
 * @Author Quebrando a Cabeça
 * @Author URL http://quebrandoacabeca.com
 * @Post URL http://quebrandoacabeca.com/busca-para-post-type-especifico
 
 INCLUA A LINHA ABAIXO NO ARQUIVO DO TEMPLATE QUE VAI EXIBIR O CAMPO DE BUSCA
 <?php include (TEMPLATEPATH . '/searchform-portifolio.php'); ?>
 */
?>
<form id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<!-- CAMPO DE TEXTO DA BUSCA -->
        <input class="inlineSearch" type="text" name="s" value="Digite o que procura" onblur="if (this.value == '') {this.value = 'Digite o que procura';}" onfocus="if (this.value == 'Digite o que procura') {this.value = '';}" />
        <!-- ALTERE O VALUE DA LINHA ABAIXO PARA O NOME DO SEU CUSTOM POST TYPE -->
        <input type="hidden" name="post_type" value="portifolio" />
        <!-- BOTÃO ENVIAR -->
        <input class="inlineSubmit" id="searchsubmit" type="submit" alt="Busque um Job" value="Busque um Job" />
</form>
