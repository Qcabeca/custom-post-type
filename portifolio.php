<?php // Criando tipo de Post - Portifólio
add_action('init', 'portifolio_register');
function portifolio_register() {
$labels = array(
'name' => _x('Portifolio', 'post type general name'), // define o nome geral
'singular_name' => _x('Portifolio', 'post type singular name'), // define o rótulo do post no singular
'add_new' => _x('Add Nova Imagem', 'portifolio item'), // define o rótulo ao adicionar novo item
'add_new_item' => __('Nova Imagem'), // define o rótulo da nova item
'edit_item' => __('Editar imagem'), //define o rótulo ao editar item
'new_item' => __('Nova Imagem'), // define o rótulo do novo item
'view_item' => __('Ver Imagem'), // define o rótulo para visualizar item
'search_items' => __('Buscar Imagem'), // define o rótulo para buscar item
'not_found' =>  __('Sem resultado'), //define o no rótulo para quano não houver item
'not_found_in_trash' => __('sem resultados na lixeira'), //define o rótulo quando não houver item na lixeira
'parent_item_colon' => ''
);
$args = array(
'labels' => $labels, // define os rótulos como variáveis
'public' => true, // define se é o post é exibido no admin
'publicly_queryable' => true, //define se o post é exibido no frontend
'exclude_from_search' => false, // define se o post é buscável  
'menu_icon' => get_stylesheet_directory_uri() . '/img/Icon/iconPortifolio.png', // define o icone no Menu
'rewrite' => true, // define se o post deve ter a sua URL
'capability_type' => 'post', //define se é post ou page
'show_in_menu' => true, //define se é exibido no Menu
'has_archive' => true, // define se vai ter um archive do tipo de post
'hierarchical' => false, // define se vai ter hierarquia de páginas
'menu_position' => null, // define a posição no menu
'supports' => array('title','editor','thumbnail') // define que será exibido o título do post, o editor de conteúdo e a imagem destacada
);
register_post_type( 'portifolio' , $args );
}

// PASSO 3 - CRIANDO BOX PARA CAMPOS PERSONALIZADOS

function portifolio_meta_box(){
add_meta_box(
'box_portifolio', // define o nome do metabox
 __('Informações do Job'),  // define o título da Caixa de campos personalizados
 'portifolio_campos', // define a função que sera chamada para exibir o conteúdo
 'portifolio',  // define que tipo de post vai ter esses campos personalizados
 'side', // define o local da página de edição que será exibido a caixa
 'high' // define a prioridade de onde vai aparecer a caixa - high, normal ou low
 );
}

function portifolio_campos() {
 
  global $post;
  $custom = get_post_custom($post->ID);
  $cliente = $custom["cliente"][0]; // define o campo cliente
  $ano = $custom["ano"][0]; // define o campo ano
  $servico = $custom["servico"][0]; // define o campo servico
  ?>
   
  <p><label>Cliente:</label><br />
  <input type="text" name="cliente" id="cliente" value="<?php echo $cliente; ?>" />
  </p>
   
  <p><label>Ano:</label><br />
  <input type="text" name="ano" id="ano" value="<?php echo $ano; ?>" />
  </p>
 
 <p><label>Tipo de Serviço:</label><br />
  <select name="servico">
  <option <?php if($servico == "") echo ' selected = "selected" ' ?> checked value="">Escolha uma opção</option>
  <option <?php if($servico == "Design") echo ' selected = "selected" ' ?> checked value="Design">Design</option>
  <option <?php if($servico == "Desenvolvimento") echo ' selected = "selected" ' ?> value="Desenvolvimento">Desenvolvimento</option>
  <option <?php if($servico == "SEO") echo ' selected = "selected" ' ?> value="SEO">SEO</option>
  </select>
  </p>
 <?php
}

PASSO 4 - CRIANDO CATEGORIAS

register_taxonomy(
"categorias_portifolio", //nome da taxonomia
"portifolio", // nome do tipo de conteúdo criado
array(
"hierarchical" => true, // define se vai ter hierarquia de páginas
"label" => "Categorias", // define o rótulo da categoria
"singular_label" => "Categoria", // define o rótulo da categoria no singular
"rewrite" => true // define se a categoria deve ter a sua URL
)
);

PASSO 5 - CRIANDO TAGS

register_taxonomy
(
'tags_portifolio', // define o nome da taxonomia
array('portifolio'), // define o nome do tipo de conteúdo criado
array(
'hierarchical' => false, // define se vai ter hierarquia de páginas
'labels' => array(
'name' => _x( 'Tags do Portifolio', 'tags_portifolio' ), // define o rótulo das Tags
'singular_name' => _x( 'Tag do Portifolio', 'tags_portifolio' ), //define o rótulo da tag no singular
'search_items' =>  __( 'Buscar Tags' ), // define o rótulo ao buscar tags
'all_items' => __( 'Todas as Tags' ), // define o rótulo para todas as tags
'edit_item' => __( 'Editar Tags' ),  // define o rótulo ao editar tags
'update_item' => __( 'Atualizar Tag' ), //define o rótulo para atualizar tags
'add_new_item' => __( 'Adicionar nova Tag' ), // define o rótulo para adicionar nova tag
'new_item_name' => __( 'Nova Tag' ), // define o rótulo da Nova Tag
'menu_name' => __( 'Tags de Feiras' ), // define o rótulo no Menu do admin
),
'rewrite' => array('slug' => 'tags_portifolio', 'with_front' => true), // define se o post deve ter a sua URL
)
);

// PASSO 6 - SALVANDO O POST

add_action('save_post', 'save_details_portifolio');
function save_details_portifolio(){
  global $post;
// salva os campos personalizados
update_post_meta($post->ID, "cliente", $_POST["cliente"]);
update_post_meta($post->ID, "ano", $_POST["ano"]);
update_post_meta($post->ID, "servico", $_POST["servico"]);
// fim dos campos personalizados
};
