<?php   
    session_start();  
    ini_set("display_errors", 0);
    /* REGISTRO TAXONOMIAS 
    * taxonomies hoteis, aptos e regime
    */ 

        /* REGISTRO TAXONOMIA APARTAMENTOS */ 
            function tarifarios_create_aptos_taxonomies(){ 
                $labels = array(

                    'name'              => _x('Apartamentos', 'taxonomy general name', 'booking'),

                    'singular_name'     => _x('Apartamentos', 'taxonomy singular name', 'booking'),

                    'search_items'      => __('Buscar Apartamentos', 'booking'),

                    'all_items'         => __('Todos os Apartamentos', 'booking'),

                    'parent_item'       => __('Apartamento Pai', 'booking'),

                    'parent_item_colon' => __('Apartamento Pai', 'booking'),

                    'edit_item'         => __('Editar Apartamento', 'booking'),

                    'update_item'       => __('Editar Apartamento', 'booking'),

                    'add_new_item'      => __('Novo Apartamento', 'booking'),

                    'new_item_name'     => __('Nome novo Apartamento', 'booking'),

                    'menu_name'         => __('Apartamento', 'booking'),

                );



                $args = array(

                    'hierarchical'      => null,

                    'labels'            => $labels,

                    'show_ui'           => true,

                    'show_in_rest'       => false,

                    'show_admin_column' => true,

                    'rewrite'           => array('slug' => 'aptos', 'hierarchical' => true),

                );



                register_taxonomy('aptos', array('roteirostec'), $args);

            }
            add_action('init', 'tarifarios_create_aptos_taxonomies'); 
        /* FIM REGISTRO TAXONOMIA APARTAMENTOS */

        /* REGISTRO TAXONOMIA REGIME */
            function tarifarios_create_regime_taxonomies(){ 
                $labels = array(

                    'name'              => _x('Regime', 'taxonomy general name', 'booking'),

                    'singular_name'     => _x('Regime', 'taxonomy singular name', 'booking'),

                    'search_items'      => __('Buscar Regime', 'booking'),

                    'all_items'         => __('Todos os regimes', 'booking'),

                    'parent_item'       => __('Regime Pai', 'booking'),

                    'parent_item_colon' => __('Regime Pai', 'booking'),

                    'edit_item'         => __('Editar Regime', 'booking'),

                    'update_item'       => __('Editar Regime', 'booking'),

                    'add_new_item'      => __('Novo Regime', 'booking'),

                    'new_item_name'     => __('Nome novo Regime', 'booking'),

                    'menu_name'         => __('Regime', 'booking'),

                );



                $args = array(

                    'hierarchical'      => null,

                    'labels'            => $labels,

                    'show_ui'           => true,

                    'show_in_rest'       => false,

                    'show_admin_column' => true,

                    'rewrite'           => array('slug' => 'regime', 'hierarchical' => true),

                );



                register_taxonomy('regime', array('roteirostec'), $args);

            }
            add_action('init', 'tarifarios_create_regime_taxonomies');  
        /* FIM REGISTRO TAXONOMIA REGIME */

        /* REGISTRO TAXONOMIA REGRAS POR CRIANÇA */
            function tarifarios_create_regra_child_taxonomies(){ 
                $labels = array(

                    'name'              => _x('Regras por criança', 'taxonomy general name', 'booking'),

                    'singular_name'     => _x('Regras por criança', 'taxonomy singular name', 'booking'),

                    'search_items'      => __('Buscar Regra', 'booking'),

                    'all_items'         => __('Todos as regras', 'booking'),

                    'parent_item'       => __('Regra Pai', 'booking'),

                    'parent_item_colon' => __('Regra Pai', 'booking'),

                    'edit_item'         => __('Editar Regra', 'booking'),

                    'update_item'       => __('Editar Regra', 'booking'),

                    'add_new_item'      => __('Nova Regra', 'booking'),

                    'new_item_name'     => __('Nome nova regra', 'booking'),

                    'menu_name'         => __('Regras por criança', 'booking'),

                );



                $args = array(

                    'hierarchical'      => null,

                    'labels'            => $labels,

                    'show_ui'           => true,

                    'show_in_rest'       => false,

                    'show_admin_column' => true,

                    'rewrite'           => array('slug' => 'regra', 'hierarchical' => true),

                );



                register_taxonomy('regra', array('roteirostec'), $args);

            }
            add_action('init', 'tarifarios_create_regra_child_taxonomies'); 

            function pippin_taxonomy_add_new_meta_field() { 
                ?>
                <div class="form-field">
                    <label for="idade_minima"><?php _e( 'Idade mínima', 'pippin' ); ?></label>
                    <input type="number" name="idade_minima" id="idade_minima" value=""> 
                </div>
                <div class="form-field">
                    <label for="idade_maxima"><?php _e( 'Idade máxima', 'pippin' ); ?></label>
                    <input type="number" name="idade_maxima" id="idade_maxima" value=""> 
                </div>
            <?php
            }
            add_action( 'regra_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 ); 

            function pippin_taxonomy_edit_meta_field($term) { 
                $t_id = $term->term_id;
             
                // retrieve the existing value(s) for this meta field. This returns an array
                $term_idade_minima = get_term_meta($term->term_id, 'term_idade_minima', true);
                $term_idade_maxima = get_term_meta($term->term_id, 'term_idade_maxima', true); ?>
                <tr class="form-field">
                <th scope="row" valign="top"><label for="idade_minima"><?php _e( 'Idade mínima', 'pippin' ); ?></label></th>
                    <td>
                        <input type="text" name="idade_minima" id="idade_minima" value="<?php echo esc_attr( $term_idade_minima ) ? esc_attr( $term_idade_minima ) : ''; ?>"> 
                    </td>
                </tr>
                <tr class="form-field">
                <th scope="row" valign="top"><label for="idade_maxima"><?php _e( 'Idade máxima', 'pippin' ); ?></label></th>
                    <td>
                        <input type="text" name="idade_maxima" id="idade_maxima" value="<?php echo esc_attr( $term_idade_maxima ) ? esc_attr( $term_idade_maxima ) : ''; ?>"> 
                    </td>
                </tr>
            <?php
            }
            add_action( 'regra_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2 );

            function save_taxonomy_custom_meta( $term_id ) {
                if (isset($_POST['idade_minima']) && '' !== $_POST['idade_minima']){
                    $group = $_POST['idade_minima'];
                    update_term_meta($term_id, 'term_idade_minima', $group);
                }
                if (isset($_POST['idade_maxima']) && '' !== $_POST['idade_maxima']){
                    $group = $_POST['idade_maxima'];
                    update_term_meta($term_id, 'term_idade_maxima', $group);
                }
            }  
            add_action( 'edited_regra', 'save_taxonomy_custom_meta', 10, 2 );  

            function create_taxonomy_custom_meta( $term_id ) {
                if (isset($_POST['idade_minima']) && '' !== $_POST['idade_minima']){
                    $group = $_POST['idade_minima'];
                    add_term_meta($term_id, 'term_idade_minima', $group, true);
                }
                if (isset($_POST['idade_maxima']) && '' !== $_POST['idade_maxima']){
                    $group = $_POST['idade_maxima'];
                    add_term_meta($term_id, 'term_idade_maxima', $group, true);
                }
            }  
            add_action( 'create_regra', 'create_taxonomy_custom_meta', 10, 2 );

            function create_date_column_for_issues($issue_columns) {
                unset( $issue_columns['posts'] );
                unset( $issue_columns['slug'] );
                $issue_columns['minima'] = 'Idade mínima';
                $issue_columns['maxima'] = 'Idade máxima';
                return $issue_columns;
            }
            add_filter('manage_edit-regra_columns', 'create_date_column_for_issues');

            function populate_date_column_for_issues($value, $column_name, $term_id) {
              $issue = get_term($term_id, 'regra'); 
              switch($column_name) {
                case 'minima': 
                  $content = get_term_meta($term_id, 'term_idade_minima', true);
                break;
                case 'maxima': 
                  $content = get_term_meta($term_id, 'term_idade_maxima', true);
                break;
                default:
                break;
              }
              return $content;    
            }
            add_filter('manage_regra_custom_column', 'populate_date_column_for_issues', 10, 3);


        /* FIM REGISTRO TAXONOMIA REGIME */ 

        /* REGISTRO TAXONOMIA TERMOS GERAIS */
            function tarifarios_create_termos_taxonomies(){ 
                $labels = array(

                    'name'              => _x('Termos gerais', 'taxonomy general name', 'booking'),

                    'singular_name'     => _x('Termos gerais', 'taxonomy singular name', 'booking'),

                    'search_items'      => __('Buscar termo', 'booking'),

                    'all_items'         => __('Todos os termos', 'booking'),

                    'parent_item'       => __('Termo Pai', 'booking'),

                    'parent_item_colon' => __('Termo Pai', 'booking'),

                    'edit_item'         => __('Editar termo', 'booking'),

                    'update_item'       => __('Editar termo', 'booking'),

                    'add_new_item'      => __('Novo termo', 'booking'),

                    'new_item_name'     => __('Nome novo termo', 'booking'),

                    'menu_name'         => __('Termos gerais', 'booking'),

                );



                $args = array(

                    'hierarchical'      => null,

                    'labels'            => $labels,

                    'show_ui'           => true,

                    'show_in_rest'       => false,

                    'show_admin_column' => true,

                    'rewrite'           => array('slug' => 'termos', 'hierarchical' => true),

                );



                register_taxonomy('termos', array('roteirostec'), $args);

            }
            add_action('init', 'tarifarios_create_termos_taxonomies');  
        /* FIM REGISTRO TAXONOMIA REGIME */
    /* FIM REGISTRO TAXONOMIAS */

    /* REGISTRO DO SCRIPT PARA UPLOAD DE IMAGEM E JS DO ADMIN */
        function image_uploader_enqueue() {
            global $typenow; 
            wp_enqueue_media();

            wp_register_script( 'meta-image', plugin_dir_url( __FILE__ ) . 'assets/js/upload_image_taxonomy.js', array( 'jquery' ) );
            wp_localize_script( 'meta-image', 'meta_image',
                array(
                    'title' => 'Upload an Image',
                    'button' => 'Use this Image',
                )
            );
            wp_enqueue_script( 'meta-image' ); 

            wp_enqueue_style( 
                'css-jquery-tarifario', 
                'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
            );

            wp_enqueue_style( 
                'bootstrap', 
                'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
            );

            wp_enqueue_script( 'sweetalert-tarifario', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');

            wp_enqueue_style( 
                'style_admin', 
                plugin_dir_url( __FILE__ ) . 'assets/css/style_admin.css'
            );

            wp_enqueue_style( 
                'font_awesome_admin', 
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'
            ); 
 
            wp_enqueue_script( 'jquery-tarifario', "https://code.jquery.com/ui/1.12.1/jquery-ui.js");
            wp_enqueue_script( 'moment-tarifario', plugin_dir_url( __FILE__ ) . 'assets/js/moment.js');
            wp_enqueue_script( 'mask-tarifario', plugin_dir_url( __FILE__ ) . 'assets/js/mask.js'); 

            wp_enqueue_script( 'sweetalert-tarifario', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');

            wp_enqueue_script( 
                'scripts_admin',
                plugin_dir_url( __FILE__ ) . 'assets/js/scripts_admin.js?v='.date("dmYHis"),
                array( 'jquery' )
            ); 

            wp_enqueue_script( 
                'bootstrap-script',
                'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
                array( 'jquery' )
            ); 

            wp_localize_script( 
                'scripts_admin',
                'wp_ajax',
                array( 
                    'ajaxurl' => admin_url( 'admin-ajax.php' ) 
                )                 
            );
        }
        add_action( 'admin_enqueue_scripts', 'image_uploader_enqueue' );
    /* **************************************** */
function filter_featured_image_admin_text( $content, $post_id, $thumbnail_id ){
    $help_text = '<p>' . __( 'Please use an image that is 1170 pixels wide x 658
    pixels tall.', 'my_textdomain' ) . '</p>';
    return $help_text . $content;
}
add_filter( 'admin_post_thumbnail_html', 'filter_featured_image_admin_text', 10, 3 );

    /* CODES PARA INSERÇÃO DE IMAGEM NAS TAXONOMIAS */
        $taxonomies = array("hoteis", "aptos");

        for ($i=0; $i < count($taxonomies); $i++) { 
            $taxonomia = $taxonomies[$i];

            if ($taxonomia == "aptos") {
                add_action($taxonomia.'_add_form_fields', 'add_term_hoteis_disponiveis', 1, 2);
                add_action('created_'.$taxonomia, 'save_term_hoteis', 10, 2);
            }
            add_action($taxonomia.'_add_form_fields', 'add_term_image', 10, 2);
            add_action('created_'.$taxonomia, 'save_term_image', 10, 2);
            add_action($taxonomia.'_edit_form_fields', 'edit_image_upload', 10, 2);
            add_action('edited_'.$taxonomia, 'update_image_upload', 10, 2);
        }
        /* HOTEL TAXONOMIA APTOS */
            function add_term_hoteis_disponiveis($taxonomy){ 
                $cat_terms = get_terms(
                    array('hoteis'),
                    array(
                        'hide_empty'    => false,
                        'orderby'       => 'name',
                        'order'         => 'ASC',
                        'number'        => 400 //specify yours
                    )
                ); 

            ?> 
                <div class="form-field term-hotel-wrap">
                    <label for="hotel">Hotel</label>
                    <select name="Hotel" id="Hotel" class="postform" style="width: 100%">
                        <option value="">Selecione...</option> 
                        <?php foreach( $cat_terms as $term ) {   ?>
                            <option value="<?=$term->term_id?>"><?=$term->name?></option>
                        <?php } ?>
                    </select> 
                    <p>Selecione o hotel que esse apartamento pertence.</p>
                </div>
            <?php }
 
            function save_term_hoteis($term_id, $tt_id) {
                if (isset($_POST['Hotel']) && '' !== $_POST['Hotel']){
                    $group = $_POST['Hotel'];
                    add_term_meta($term_id, 'term_hotel', $group, true);
                } 
            }

            add_action('hoteis_add_form_fields', 'add_term_localizao_hotel', 1, 1);
            add_action('created_hoteis', 'save_term_localizao_hotel', 10, 2);

            add_action('hoteis_edit_form_fields', 'edit_localizao_hotel', 1, 2);
            add_action('edited_hoteis', 'update_localizao_hotel', 10, 2);

            function add_term_localizao_hotel($taxonomy){  

            ?> 
                <div class="form-field term-localizacao-wrap">
                    <label for="tag-localizacao">Localização</label>
                    <input name="localizacao" id="tag-localizacao" type="text" value="" class="">
                    <p>Informe a localização do hotel</p>
                </div>
            <?php }
 
            function save_term_localizao_hotel($term_id, $tt_id) {
                if (isset($_POST['localizacao']) && '' !== $_POST['localizacao']){
                    $group = $_POST['localizacao'];
                    add_term_meta($term_id, 'term_hotel_localizacao', $group, true);
                } 
            }
 
            function edit_localizao_hotel($term, $taxonomy) {
                // get current group
                $term_hotel_localizacao = get_term_meta($term->term_id, 'term_hotel_localizacao', true); ?> 
                <tr class="form-field term-slug-wrap">
                    <th scope="row">
                        <label for="slug">Localização</label>
                    </th>
                    <td>
                        <input name="localizacao" id="tag-localizacao" type="text" value="<?php echo $term_hotel_localizacao ?>" class="">
                    </td>
                </tr>
            <?php }
 
            function update_localizao_hotel($term_id, $tt_id) {
                if (isset($_POST['localizacao']) && '' !== $_POST['localizacao']){
                    $group = $_POST['localizacao'];
                    update_term_meta($term_id, 'term_hotel_localizacao', $group);
                } 
            }

            add_action('hoteis_add_form_fields', 'add_term_categoria_hotel', 1, 1);
            add_action('created_hoteis', 'save_term_categoria_hotel', 10, 2);

            add_action('hoteis_edit_form_fields', 'edit_categoria_hotel', 1, 2);
            add_action('edited_hoteis', 'update_categoria_hotel', 10, 2);

            function add_term_categoria_hotel($taxonomy){  

            ?> 
                <div class="form-field term-categoria-wrap">
                    <label for="tag-categoria">Categoria</label>
                    <input name="categoria" id="tag-categoria" type="text" value="" class="">
                    <p>Informe a categoria do hotel</p>
                </div>
            <?php }
 
            function save_term_categoria_hotel($term_id, $tt_id) {
                if (isset($_POST['categoria']) && '' !== $_POST['categoria']){
                    $group = $_POST['categoria'];
                    add_term_meta($term_id, 'term_hotel_categoria', $group, true);
                } 
            }
 
            function edit_categoria_hotel($term, $taxonomy) {
                // get current group
                $term_hotel_categoria = get_term_meta($term->term_id, 'term_hotel_categoria', true); ?> 
                <tr class="form-field term-slug-wrap">
                    <th scope="row">
                        <label for="slug">Categoria</label>
                    </th>
                    <td>
                        <input name="categoria" id="tag-categoria" type="text" value="<?php echo $term_hotel_categoria ?>" class="">
                    </td>
                </tr>
            <?php }
 
            function update_categoria_hotel($term_id, $tt_id) {
                if (isset($_POST['categoria']) && '' !== $_POST['categoria']){
                    $group = $_POST['categoria'];
                    update_term_meta($term_id, 'term_hotel_categoria', $group);
                } 
            }
        /* FIM HOTEL TAXONOMIA APTOS */

        /* IMAGEM TAXONOMIA */ 
            function add_term_image($taxonomy){ ?>
                <div class="form-field term-group">
                    <label for="">Imagem</label>
                    <input type="hidden" name="txt_upload_image_<?=$taxonomy?>" id="txt_upload_image_<?=$taxonomy?>" value="" style="width: 77%">
                    <div class="div_imagem_<?=$taxonomy?>" style="display: none">
                        <img src="" class="img-fluid img-responsive" id="imagem_<?=$taxonomy?>" style="max-height: 100px">
                    </div>
                    <input type="button" id="upload_image_btn_<?=$taxonomy?>" class="button" value="Adicionar uma imagem" />
                </div>
            <?php }
 
            function save_term_image($term_id, $tt_id) {
                if (isset($_POST['txt_upload_image_hoteis']) && '' !== $_POST['txt_upload_image_hoteis']){
                    $group = $_POST['txt_upload_image_hoteis'];
                    add_term_meta($term_id, 'term_image', $group, true);
                }
                if (isset($_POST['txt_upload_image_aptos']) && '' !== $_POST['txt_upload_image_aptos']){
                    $group = $_POST['txt_upload_image_aptos'];
                    add_term_meta($term_id, 'term_image', $group, true);
                }
            }
 
            function edit_image_upload($term, $taxonomy) {
                // get current group
                $txt_upload_image = get_term_meta($term->term_id, 'term_image', true); ?> 
                <tr class="form-field term-slug-wrap">
                    <th scope="row">
                        <label for="slug">Imagem</label>
                    </th>
                    <td>
                        <input type="hidden" name="txt_upload_image_<?=$taxonomy?>" id="txt_upload_image_<?=$taxonomy?>" value="<?php echo $txt_upload_image ?>" style="width: 77%">
                        <div class="div_imagem_<?=$taxonomy?>" style="<?=(empty($txt_upload_image) ? 'display: none' : '')?>">
                            <img src="<?php echo $txt_upload_image ?>" class="img-fluid img-responsive" id="imagem_<?=$taxonomy?>" style="max-height: 100px">
                        </div>
                        <input type="button" id="upload_image_btn_<?=$taxonomy?>" class="button" value="Editar imagem" />
                    </td>
                </tr>
            <?php }
 
            function update_image_upload($term_id, $tt_id) {
                if (isset($_POST['txt_upload_image_hoteis']) && '' !== $_POST['txt_upload_image_hoteis']){
                    $group = $_POST['txt_upload_image_hoteis'];
                    update_term_meta($term_id, 'term_image', $group);
                }
                if (isset($_POST['txt_upload_image_aptos']) && '' !== $_POST['txt_upload_image_aptos']){
                    $group = $_POST['txt_upload_image_aptos'];
                    update_term_meta($term_id, 'term_image', $group, true);
                }
            }
        /* FIM IMAGEM TAXONOMIA */ 

    /* FIM CODES INSERÇÃO DE IMAGEM NAS TAXONOMIAS */

    /* CODES PARA INSERÇÃO DAS ABAS SHORTCODE E DATA NA LISTAGEM DE ROTEIROS */ 
        add_filter('manage_roteirostec_posts_columns' , 'custom_post_type_columns');

        function custom_post_type_columns($columns){ 
            unset( $columns['taxonomy-hoteis'] );
            unset( $columns['taxonomy-aptos'] );
            unset( $columns['taxonomy-regime'] );
            unset( $columns['taxonomy-regra'] );
            unset( $columns['taxonomy-forma-de-pagamento'] );
            unset( $columns['taxonomy-termos'] ); 
            $columns['shortcode'] = __( 'Shortcode', 'your_text_domain' ); 

            return $columns;
        } 

        add_action( 'manage_roteirostec_posts_custom_column' , 'fill_custom_post_type_columns', 10, 2 );

        function fill_custom_post_type_columns( $column, $post_id ) {
            // Fill in the columns with meta box info associated with each post
            switch ( $column ) { 
                case 'shortcode' :
                    $content_post = get_post($my_postid);
                    $pacote = $content_post->ID; 
                    $tipo_roteiro = strtolower(str_replace(" ", "-", get_post_meta( $pacote, 'destino', true)));
                    echo '<input class="elementor-shortcode-input" type="text" readonly="" onfocus="this.select()" value="[vouchertec-destino pacote='.$pacote.']" style="width:80%">'; 
                break; 
                case 'data' :
                    $content_post = get_post($my_postid);
                    $content = $content_post->post_content;
                    echo date("d/m/Y", strtotime($content_post->post_date)).' '.date("H:i:s", strtotime($content_post->post_date));
                break;
            }
        }
    /* FIM CODE ABAS DE ROTEIRO */

    /* CODE PARA INSERÇÃO DE METABOX NA PÁGINA DE NOVO ROTEIRO */ 

        add_filter( 'rwmb_meta_boxes', 'prefix_edit_meta_boxes', 20 );
        function prefix_edit_meta_boxes( $meta_boxes ) {
            // Loop throught all meta boxes to find the ones we need
            foreach ( $meta_boxes as $k => $meta_box ) {
                // Remove "Personal Information" meta box
                if ( isset( $meta_box['id'] ) && 'personal' == $meta_box['id'] ) {
                    unset( $meta_boxes[$k] );
                }

                // Edit "Address Info" meta box
                if ( $meta_boxes[$k]['title'] == 'Config.' ) {
                    // Change title to "Address"
                    $meta_boxes[$k]['title'] = 'Settings';

                    // Loop through all fields
                    foreach ( $meta_box['fields'] as $j => $field ) {
                        // Add description for "Street" field
                        if ( 'street' == $field['id'] ) {
                            $meta_boxes[$k][$j]['desc'] = 'Enter street address';
                        }
                    }

                    // Add field "zip_code" to this meta box
                    $meta_boxes[$k]['fields'][] = array(
                        'name' => 'Zip code',
                        'id'   => 'zip_code',
                        'type' => 'text',
                    );
                }
            }

            // Return edited meta boxes
            return $meta_boxes;
        }

        /* Fire our meta box setup function on the post editor screen. */
        //add_action( 'load-post.php', 'smashing_post_meta_boxes_setup' );
        //add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setup' );

        /* Meta box setup function. */
        function smashing_post_meta_boxes_setup() { 
            /* Add meta boxes on the 'add_meta_boxes' hook. */
            //add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxes' );
        } 

        function smashing_add_post_meta_boxes() {
            add_meta_box(
                'smashing-post-class',      // Unique ID
                esc_html__( 'Tarifário', 'example' ),    // Title
                'smashing_post_class_meta_box',   // Callback function
                'roteirostec',         // Admin page (or post type)
                'advanced',         // Context
                'high'         // Priority
            );
        }

        /* Display the post meta box. */
        function smashing_post_class_meta_box( $post ) { ?> 
            <?php $id = $_GET['post']; ?>
            <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?> 
            <div class="row" style="margin-top: -6px">
                <div class="col-2" style="padding: 0px 0px 0px 3px;border-right: 1px solid #eee;">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical"> 
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false" style=" "><i class="fa fa-map" style="margin-right: 5px"></i> Roteiro</a> 
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" style=" "><i class="fa fa-credit-card" style="margin-right: 5px"></i> Tarifário</a>  
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> 

                            <div class="" style="padding-bottom: 10px;margin-bottom: 10px;">  
                                <div class="row" style="padding-top: 10px"> 
                                    
                                    <div class="col-2" style="padding: 10px">
                                        Tipo
                                    </div>
                                    <div class="col-10" style="padding: 10px 13px">
                                        <?php $tipo_roteiro = get_post_meta( $id, 'tipo_roteiro', true); ?>
                                        <input type="radio" name="tipo_roteiro" id="tipo_roteiro" value="0" onclick="div_linha_taxa(0)" <?=($tipo_roteiro == 0 ? 'checked' : '')?>> Aéreo - Terrestre com transporte <input type="radio" name="tipo_roteiro" id="tipo_roteiro" value="1" style="margin-left: 17px" onclick="div_linha_taxa(1)" <?=($tipo_roteiro == 1 ? 'checked' : '')?>> Terrestre sem transporte
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade holder_div_tarifario" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                            <div class="row" style="">
                                <div class="" style=" border-bottom: 3px solid #eee;padding: 12px;width: 100%;">
                                     <button type="button" class="button add_attribute" style="float: right;" onclick="adicionar_novo_tarifario()">Adicionar acomodação</button>
                                </div>
                            </div>

                            <div class="row" style="padding-top: 10px;margin-bottom: 15px;">
                                
                                <div class="col-12" style="">
                                    <table style="border: 1px solid #b9b9b9;border-spacing: 15px 10px;border-collapse: collapse;width: 100%;">
                                        <thead>
                                            <th style="padding: 16px 10px;"></th>
                                            <th style=";text-align: left">Período</th>  
                                            <th style="text-align: left;">Datas</th>  
                                            <th style=";text-align: left">A partir de</th>   
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $dados_tarifario = unserialize(get_post_meta( $id, 'dados_tarifario', true));  
                                                $qtd_tarifario = count($dados_tarifario);
                                            ?> 
                                            <?php 
                                                for ($x=0; $x < $qtd_tarifario; $x++) { 

                                                    if (!empty($dados_tarifario[$x]["pacote"]["dias_roteiro"])) { 

                                                        $i = $x+1; 
                                                    
                                                        $date1 = implode("-", array_reverse(explode("/", $dados_tarifario[$x]["pacote"]["data_inicial_roteiro"]))); 
                                                        $date2 = implode("-", array_reverse(explode("/", $dados_tarifario[$x]["pacote"]["data_final_roteiro"]))); 

                                                        $dados_tabela[] = array("contador" => $i, "periodo" => $dados_tarifario[$x]["pacote"]["periodo_roteiro"], "data_inicial" => date("d/m/Y", strtotime($date1)), "data_final" => date("d/m/Y", strtotime($date2)), "valor" => $dados_tarifario[$x]["tarifario"]["moeda_roteiro"].' '.$dados_tarifario[$x]["tarifario"]["valor_duplo"]);  

                                                    } 

                                                } 
 
                                                function cmp($a, $b) {
                                                    return $a["data_inicial"] > $b["data_inicial"];
                                                } 
                                                usort($dados_tabela, "cmp");  
                                            ?> 
                                                
                                            <?php for ($i=0; $i < count($dados_tabela); $i++) {  ?>
                                                <?php $x = $i+1;  ?>
                                                <tr style="border: 1px solid #bdbdbd;">
                                                    <td style="padding: 8px 12px;"> <a onclick="exibe_div_tarifario('<?=$dados_tabela[$i]["contador"]?>')" style="cursor: pointer;"><i class="fas fa-pencil-alt" style="color: #fff;border: 1px solid #2ab12a;padding: 4px;border-radius: 5px;background-color: #2ab12a;margin-right: 4px;"></i></a>  <a onclick="remove_div_tarifario('<?=$dados_tabela[$i]["contador"]?>')" style="cursor: pointer;"><i class="fas fa-trash" style="color: #fff;border: 1px solid #e01717;padding: 4px 5px;border-radius: 5px;background-color: #e01717;"></i></a> </td>
                                                    <td style="padding: 8px 8px 8px 0px;"><?=$dados_tabela[$i]["periodo"]?></td>
                                                    <td style="padding: 8px 8px 8px 0px;"><?=$dados_tabela[$i]["data_inicial"]?> a <?=$dados_tabela[$i]["data_final"]?></td>
                                                    <td style="padding: 8px 8px 8px 0px;"><?=$dados_tabela[$i]["valor"]?></td> 
                                                </tr> 
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>   

                            </div>

                            <div id="repeater_div_tarifario" style="padding-bottom: 10px;margin-bottom: 10px;">

                                <?php 
                                    $dados_tarifario = unserialize(get_post_meta( $id, 'dados_tarifario', true)); 
                                    $qtd_tarifario = count($dados_tarifario);
                                ?> 
                                <input type="hidden" id="qtd_tarifario" value="<?=$qtd_tarifario?>" name="">
                                <?php for ($x=0; $x < $qtd_tarifario; $x++) {  ?>

                                    <?php if (!empty($dados_tarifario[$x]["pacote"]["dias_roteiro"])) { ?>  

                                        <?php $i = $x+1; ?>
                                        <div class="repeater_tarifa" id="hold_remove_tarifa<?=$i?>">

                                            <div class="row" style="padding-top: 10px">
                                                
                                                <div class="col-12" style="padding: 0px 10px;">
                                                    <h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;"><a onclick="exibe_div_tarifario('<?=$i?>')" style="cursor: pointer;">Tarifário <?=$i?></a> <a onclick="remove_div_tarifario('<?=$i?>')" style="cursor: pointer;"><i class="fas fa-trash-alt" style="float: right;color: #e01717;"></i></a></h4>
                                                </div>

                                            </div> 

                                            <div class="tabela_tarifa_cadastro<?=$i?>" style="display: none">

                                                <div class="row" style="padding-top: 10px">
                                                    
                                                    <div class="col-2" style="padding: 10px">
                                                        <label><span style="color:#555">Tipo</span></label>
                                                    </div>
                                                    <div class="col-4"> 

                                                        <select name="tipo_tarifario<?=$i?>" id="tipo_tarifario<?=$i?>" class="form-control">
                                                            <option value="" selected>Selecione...</option> 
                                                            <option value="0" <?=($dados_tarifario[$i]["pacote"]["tipo_tarifario"] == 0 ? 'selected' : '')?>>Cotação</option> 
                                                            <option value="1" <?=($dados_tarifario[$i]["pacote"]["tipo_tarifario"] == 1 ? 'selected' : '')?>>Reserva</option> 
                                                        </select>
                                                    </div> 

                                                </div>

                                                <div class="row" style="padding-top: 10px">
                                                    
                                                    <div class="col-2" style="padding: 10px">
                                                        <label><span style="color:#555">Período</span></label>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="text" name="periodo_roteiro<?=$i?>" class="form-control" placeholder="Nome do período" style="font-size: 14px;" autocomplete="off" value="<?=$dados_tarifario[$x]["pacote"]["periodo_roteiro"]?>">
                                                    </div>   
                                                    <div class="col-1" style="padding: 10px">
                                                        <label><span style="color:#555">Dias</span></label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="number" name="dias_roteiro<?=$i?>" class="form-control dias" placeholder="Dias" style="font-size: 14px;" value="<?=$dados_tarifario[$x]["pacote"]["dias_roteiro"]?>">
                                                    </div>   
                                                    <div class="col-1" style="padding: 10px">
                                                        <label><span style="color:#555">Noites</span></label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="number" name="noites_roteiro<?=$i?>" class="form-control dias" placeholder="Noites" style="font-size: 14px;" value="<?=$dados_tarifario[$x]["pacote"]["noites_roteiro"]?>">
                                                    </div>  
                                                </div>

                                                <div class="row" style="padding-top: 10px"> 
                                                    <div class="col-2" style="padding: 10px">
                                                        <label><span style="color:#555">Datas</span></label>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="text" name="data_inicial_roteiro<?=$i?>" id="date_inicio<?=$i?>" placeholder="Data inicial" class="form-control date_inicio" style="font-size: 14px;" autocomplete="off" value="<?=$dados_tarifario[$x]["pacote"]["data_inicial_roteiro"]?>">
                                                    </div>   
                                                    <div class="col-4">
                                                        <input type="text" name="data_final_roteiro<?=$i?>" id="date_fim<?=$i?>" placeholder="Data final" class="form-control date_fim" style="font-size: 14px;" autocomplete="off" value="<?=$dados_tarifario[$x]["pacote"]["data_final_roteiro"]?>">
                                                    </div>  

                                                </div>  

                                                <div class="row" style="padding-top: 10px">
                                                    
                                                    <div class="col-2" style="padding: 10px">
                                                        <label><span style="color:#555">Hotel</span></label>
                                                    </div>
                                                    <div class="col-4">
                                                        <select name="hotel_roteiro<?=$i?>" id="hotel_roteiro<?=$i?>" class="form-control" onchange="alter_apto_hotel('<?=$i?>')">
                                                            <option value="" selected>Selecione...</option>
                                                            <?php  
                                                                $cat_terms = get_terms(
                                                                    array('hoteis'),
                                                                    array(
                                                                        'hide_empty'    => false,
                                                                        'orderby'       => 'name',
                                                                        'order'         => 'ASC',
                                                                        'number'        => 400 //specify yours
                                                                    )
                                                                ); 
                                                            ?>
                                                            <?php foreach( $cat_terms as $term ) {   ?>
                                                                <option value="<?=$term->term_id?>" <?=($dados_tarifario[$x]["tarifario"]["hotel_roteiro"] == $term->term_id ? 'selected' : '')?>><?=$term->name?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div> 
                                                    
                                                    <div class="col-2" style="padding: 10px">
                                                        <label><span style="color:#555">Apartamento</span></label>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="hidden" name="id_apto_roteiro<?=$i?>" id="id_apto_roteiro<?=$i?>" value="<?=$dados_tarifario[$x]["tarifario"]["apto_roteiro"]?>" name="">
                                                        <?php  
                                                            $id_hotel = $dados_tarifario[$x]["tarifario"]["hotel_roteiro"];

                                                            $cat_terms = get_terms(
                                                                array('aptos'),
                                                                array(
                                                                    'hide_empty'    => false,
                                                                    'orderby'       => 'name',
                                                                    'order'         => 'ASC',
                                                                    'number'        => 400 //specify yours
                                                                )
                                                            ); 
                                                            
                                                            $content = '';
                                                            foreach( $cat_terms as $term ) { 
                                                                $txt_hotel[] = array($term->name, get_term_meta($term->term_id, 'term_hotel', true), $term->term_id); 
                                                            } 

                                                            $retorno .= '<option value="0" selected>Selecione um apartamento</option>';

                                                            for ($y=0; $y < count($txt_hotel); $y++) { 
                                                                if ($txt_hotel[$y][1] == $id_hotel) {
                                                                    $retorno .= '<option value="'.$txt_hotel[$y][2].'" '.($dados_tarifario[$x]["tarifario"]["apto_roteiro"] == $txt_hotel[$y][2] ? 'selected' : '').'>'.$txt_hotel[$y][0].'</option>';
                                                                }
                                                            }
                                                        ?>
                                                        <select name="apto_roteiro<?=$i?>" id="apto_roteiro<?=$i?>" class="form-control">
                                                            <?=$retorno?>
                                                        </select> 
                                                        <div class="" id="loading<?=$i?>" style="display: none;padding: 10px 0px;">
                                                            <span><small><img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Aguarde...</small></span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" style="padding-top: 10px">
                                                    
                                                    <div class="col-2" style="padding: 10px">
                                                        <label><span style="color:#555">Regime</span></label>
                                                    </div>
                                                    <div class="col-4">
                                                        <select name="regime_roteiro<?=$i?>" id="regime_roteiro<?=$i?>" class="form-control"> 
                                                            <option value="" selected>Selecione...</option>
                                                            <?php  
                                                                $cat_terms = get_terms(
                                                                    array('regime'),
                                                                    array(
                                                                        'hide_empty'    => false,
                                                                        'orderby'       => 'name',
                                                                        'order'         => 'ASC',
                                                                        'number'        => 400 //specify yours
                                                                    )
                                                                ); 
                                                            ?>
                                                            <?php foreach( $cat_terms as $term ) {   ?>
                                                                <option value="<?=$term->term_id?>" <?=($dados_tarifario[$x]["tarifario"]["regime_roteiro"] == $term->term_id ? 'selected' : '')?>><?=$term->name?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>  
                                                    
                                                    <div class="col-2" style="padding: 10px;">
                                                        <label><span style="color:#555">Moeda</span></label>
                                                    </div>
                                                    <div class="col-4"> 
                                                        <select class="form-control" name="moeda_roteiro<?=$i?>">
                                                            <option value="0" <?=($dados_tarifario[$x]["tarifario"]["moeda_roteiro"] == "0" ? 'selected' : '')?>>Selecione...</option>
                                                            <option value="R$" <?=($dados_tarifario[$x]["tarifario"]["moeda_roteiro"] == "R$" ? 'selected' : '')?>>R$ - Real</option>
                                                            <option value="AU$" <?=($dados_tarifario[$x]["tarifario"]["moeda_roteiro"] == "AU$" ? 'selected' : '')?>>AU$ - Dólar australiano</option>
                                                            <option value="GBP" <?=($dados_tarifario[$x]["tarifario"]["moeda_roteiro"] == "GBP" ? 'selected' : '')?>>GBP - Libra esterlina</option>
                                                            <option value="$" <?=($dados_tarifario[$x]["tarifario"]["moeda_roteiro"] == "$" ? 'selected' : '')?>>$ - Dólar canadense</option>
                                                            <option value="USD" <?=($dados_tarifario[$x]["tarifario"]["moeda_roteiro"] == "USD" ? 'selected' : '')?>>USD - Dólar americano</option>
                                                            <option value="EUR" <?=($dados_tarifario[$x]["tarifario"]["moeda_roteiro"] == "EUR" ? 'selected' : '')?>>EUR - Euro</option>
                                                        </select>
                                                    </div>    

                                                </div> 

                                                <div class="row" style="padding-top: 10px">
                                                    
                                                    <div class="col-12" style="padding: 0px">
                                                        <table style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;">
                                                            <thead>
                                                                <th style="padding: 16px 10px;"></th>
                                                                <th style=";text-align: left">Single</th>  
                                                                <th style="text-align: left;">Duplo</th> 
                                                                <th style="text-align: left;">Triplo</th>
                                                                <th style=";text-align: left">Criança 1</th>  
                                                                <th style="text-align: left;">Criança 2</th> 
                                                                <th style="text-align: left;">Bebê</th>  
                                                            </thead>
                                                            <tbody>
                                                                <tr style="border: 1px solid #bdbdbd;">
                                                                    <td style="padding: 8px 12px;width: 19%">Valor da diária </td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_single<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_single"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_duplo<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_duplo"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_triplo<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_triplo"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca1<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_crianca1"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca2<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_crianca2"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_bebe<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_bebe"]?>"></td>
                                                                </tr>
                                                                <tr style="border: 1px solid #bdbdbd;">
                                                                    <td style="padding: 8px 12px;">Noite extra </td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_single_extra<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_single_extra"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_duplo_extra<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_duplo_extra"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_triplo_extra<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_triplo_extra"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca1_extra<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_crianca1_extra"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca2_extra<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_crianca2_extra"]?>"></td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_bebe_extra<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["valor_bebe_extra"]?>"></td>
                                                                </tr>
                                                                <tr style="display: none;border: 1px solid #bdbdbd;background-color: #f1f1f1;" class="linha_taxa">
                                                                    <td style="padding: 8px 12px;">Tx. de embarque </td>
                                                                    <td style="padding: 8px 8px 8px 0px;"><input type="text" name="taxa_embarque_roteiro<?=$i?>" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["taxa_embarque_roteiro"]?>"></td> 
                                                                    <td style="padding: 8px 8px 8px 0px;"></td> 
                                                                    <td style="padding: 8px 8px 8px 0px;"></td> 
                                                                    <td style="padding: 8px 8px 8px 0px;"></td> 
                                                                    <td style="padding: 8px 8px 8px 0px;"></td> 
                                                                    <td style="padding: 8px 8px 8px 0px;"></td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>   

                                                </div>

                                                <div class="row" style="padding-top: 10px;border-bottom: 1px solid #eee;padding-bottom: 9px;">
                                                    
                                                    <div class="col-2" style="padding: 20px 10px;">
                                                        <label><span style="color:#555">Idades</span></label>
                                                    </div>
                                                    <div class="col-2">
                                                        <label><strong><small style="font-weight: 700">Criança 1</small></strong></label>
                                                        <input type="text" name="idade_crianca1<?=$i?>" class="form-control idade" placeholder="CHD 1" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["idade_crianca1"]?>">
                                                    </div>   
                                                    <div class="col-2">
                                                        <label><strong><small style="font-weight: 700">Criança 2</small></strong></label>
                                                        <input type="text" name="idade_crianca2<?=$i?>" placeholder="CHD 2" class="form-control idade" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["idade_crianca2"]?>">
                                                    </div>   
                                                    <div class="col-2">
                                                        <label><strong><small style="font-weight: 700">Bebê</small></strong></label>
                                                        <input type="text" name="idade_bebe<?=$i?>" placeholder="BB" class="form-control idade" style="font-size: 13px" autocomplete="off" value="<?=$dados_tarifario[$x]["tarifario"]["idade_bebe"]?>">
                                                    </div>  

                                                </div> 

                                            </div>

                                        </div>

                                    <?php } ?>

                                <?php } ?>

                            </div>
                        </div> 

                    </div>
                </div>
            </div>

            <script type="text/html" id="tmpl-wc-add-tarifa-row" > 

                <div class="container repeater_tarifa" id="hold_remove_tarifa{{(data.key)}}">

                    <div class="row" style="padding-top: 10px">
                        
                        <div class="col-12" style="padding: 0px 10px;">
                            <h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;">Tarifário {{(data.key)}} <a onclick="remove_div_tarifario('{{(data.key)}}')" style="cursor: pointer;"><i class="fas fa-trash-alt" style="float: right;color: #e01717;"></i></a></h4>
                        </div>

                    </div>  

                    <div class="row" style="padding-top: 10px">
                        
                        <div class="col-2" style="padding: 10px">
                            <label><span style="color:#555">Hotel</span></label>
                        </div>
                        <div class="col-4">
                            <select name="hotel_roteiro{{(data.key)}}" id="hotel_roteiro{{(data.key)}}" class="form-control" onchange="alter_apto_hotel('{{(data.key)}}')">
                                <option value="" selected>Selecione...</option> 
                            </select>
                        </div> 
                        
                        <div class="col-2" style="padding: 10px">
                            <label><span style="color:#555">Apartamento</span></label>
                        </div>
                        <div class="col-4">
                            <select name="apto_roteiro{{(data.key)}}" id="apto_roteiro{{(data.key)}}" class="form-control" disabled>
                                <option value="" selected>Selecione um hotel</option> 
                            </select> 
                            <div class="" id="loading{{(data.key)}}" style="display: none;padding: 10px 0px;">
                                <span><small><img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Aguarde...</small></span>
                            </div>
                        </div>

                    </div>

                    <div class="row" style="padding-top: 10px">
                        
                        <div class="col-2" style="padding: 10px">
                            <label><span style="color:#555">Regime</span></label>
                        </div>
                        <div class="col-4">
                            <select name="regime_roteiro{{(data.key)}}" id="regime_roteiro{{(data.key)}}" class="form-control"> 
                                <option value="" selected>Selecione...</option> 
                            </select>
                        </div>   

                    </div> 

                    <div class="row" style="padding-top: 10px">
                        
                        <div class="col-12" style="padding: 0px">
                            <table style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;">
                                <thead>
                                    <th style="padding: 16px 10px;"></th>
                                    <th style=";text-align: left">Single</th>  
                                    <th style="text-align: left;">Duplo</th> 
                                    <th style="text-align: left;">Triplo</th>
                                    <th style=";text-align: left">Criança 1</th>  
                                    <th style="text-align: left;">Criança 2</th> 
                                    <th style="text-align: left;">Bebê</th>  
                                </thead>
                                <tbody>
                                    <tr style="border: 1px solid #bdbdbd;">
                                        <td style="padding: 8px 12px;width: 19%">Valor da diária </td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_single{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_duplo{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_triplo{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca1{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca2{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_bebe{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                    </tr>
                                    <tr style="border: 1px solid #bdbdbd;">
                                        <td style="padding: 8px 12px;">Noite extra </td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_single_extra{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_duplo_extra{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_triplo_extra{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca1_extra{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca2_extra{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_bebe_extra{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td>
                                    </tr>
                                    <tr style="display: none;border: 1px solid #bdbdbd;background-color: #f1f1f1;" class="linha_taxa">
                                        <td style="padding: 8px 12px;">Tx. de embarque </td>
                                        <td style="padding: 8px 8px 8px 0px;"><input type="text" name="taxa_embarque_roteiro{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value='0,00'"></td> 
                                        <td style="padding: 8px 8px 8px 0px;"></td> 
                                        <td style="padding: 8px 8px 8px 0px;"></td> 
                                        <td style="padding: 8px 8px 8px 0px;"></td> 
                                        <td style="padding: 8px 8px 8px 0px;"></td> 
                                        <td style="padding: 8px 8px 8px 0px;"></td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>   

                    </div> 

                </div>

            </script>
        <?php } 
    /* FIM CODE METABOX */

    /* CHAMADA DOS SCRIPTS */
        
        add_action( 'wp_enqueue_scripts', 'enqueue_scripts_roteiros' );  
        function enqueue_scripts_roteiros() {
 

                wp_enqueue_style( 
                    'font_awesome_site', 
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'
                );  

                wp_enqueue_style( 
                    'shortcode-tarifario', 
                    plugin_dir_url( __FILE__ ) . 'assets/css/shortcode.css?v='.date("YmdHis")
                );  

                wp_enqueue_style( 
                    'daterangepicker-tarifario', 
                    'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css'
                );  
                wp_enqueue_script( 
                    'bootstrap-script',
                    'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
                    array( 'jquery' )
                );  


                wp_enqueue_script( 'jquery-tarifario', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js');  
                wp_enqueue_script( 'moment-tarifario', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js');
                wp_enqueue_script( 'daterangepicker-tarifario', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js');

                wp_enqueue_style( 
                  'flatpickr-style-tarifario', 
                  'https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css'
                ); 
                wp_enqueue_style( 
                  'style-tarifario', 
                  plugin_dir_url( __FILE__ ) . 'assets/css/style_tarifario.css'
                ); 

                wp_enqueue_script( 
                    'flatpickr-script-tarifario',
                    'https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js',
                    array( 'jquery' )
                );

                wp_enqueue_script( 'mask-tarifario', plugin_dir_url( __FILE__ ) . 'assets/js/mask.js'); 

                wp_enqueue_script( 'sweetalert-tarifario', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js');

                wp_enqueue_script( 'bootbox-tarifario', 'https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js');

                wp_enqueue_script( 
                    'scripts_tarifario',
                    plugin_dir_url( __FILE__ ) . 'assets/js/scripts_tarifario.js?v='.date("dmYHis"),
                    array( 'jquery' )
                ); 
                wp_localize_script( 
                    'scripts_tarifario',
                    'wp_ajax',
                    array( 
                        'ajaxurl' => admin_url( 'admin-ajax.php' ) 
                    )                 
                );
        } 
    /* FIM CHAMADA DOS SCRIPTS */

    /* CODES PARA AJUSTES DAS ABAS NAS TAXONOMIAS */ 
        function add_aptos_columns( $columns ) {
            unset( $columns['slug'] );
            unset( $columns['posts'] );
            unset( $columns['description'] );
            $columns['imagem'] = 'Imagem';
            $columns['hotel'] = 'Hotel';
            return $columns;
        }
        add_filter( 'manage_edit-aptos_columns', 'add_aptos_columns' );

        function add_aptos_column_content( $content, $column_name, $term_id ) {
            $term = get_term($term_id, 'aptos');
            switch ($column_name) {
                case 'hotel':
                    $txt_hotel = get_term_meta($term->term_id, 'term_hotel', true);

                    $cat_terms = get_terms(
                        array('hoteis'),
                        array(
                            'hide_empty'    => false,
                            'orderby'       => 'name',
                            'order'         => 'ASC',
                            'number'        => 400 //specify yours
                        )
                    ); 
                    
                    $content = '';
                    foreach( $cat_terms as $term ) { 
                        if ($term->term_id == $txt_hotel) {
                            $content = $term->name;
                        }
                    }
                    break;
                case 'imagem':
                    $txt_upload_image = get_term_meta($term->term_id, 'term_image', true);
                    //do your stuff here with $term or $term_id
                    $content = '<img src="'.$txt_upload_image.'" style="height: 50px">';
                    break;
                default:
                    break;
            }
            return $content;
        }
        add_filter( 'manage_aptos_custom_column', 'add_aptos_column_content', 10, 3 );

        /*********************************************************************************/
        
        function add_regime_columns( $columns ) { 
            unset( $columns['posts'] ); 
            return $columns;
        }
        add_filter( 'manage_edit-regime_columns', 'add_regime_columns' );

        /*********************************************************************************/
        
        function add_hoteis_columns( $columns ) { 
            unset( $columns['posts'] ); 
            unset( $columns['slug'] ); 
            unset( $columns['description'] ); 
            $columns['imagem'] = 'Imagem';
            $columns['localizacao'] = 'Localização';
            $columns['categoria'] = 'Categoria'; 
            $columns['taxas'] = 'Taxas';
            $columns['pagamento'] = 'Pagamento';
            return $columns;
        }
        add_filter( 'manage_edit-hoteis_columns', 'add_hoteis_columns' );

        function add_hoteis_column_content( $content, $column_name, $term_id ) {
            $term = get_term($term_id, 'hoteis');
            switch ($column_name) { 
                case 'imagem':
                    $txt_upload_image = get_term_meta($term->term_id, 'term_image', true);
                    //do your stuff here with $term or $term_id
                    $content = '<img src="'.$txt_upload_image.'" style="height: 50px">';
                    break;
                case 'localizacao':
                    $txt_upload_image = get_term_meta($term->term_id, 'term_hotel_localizacao', true);
                    //do your stuff here with $term or $term_id
                    $content = $txt_upload_image;
                    break;
                case 'categoria':
                    $txt_upload_image = get_term_meta($term->term_id, 'term_hotel_categoria', true);
                    //do your stuff here with $term or $term_id
                    $content = $txt_upload_image;
                    break; 
                case 'taxas':
                    $iss = (empty(get_term_meta($term->term_id, 'iss', true)) ? 0 : get_term_meta($term->term_id, 'iss', true));
                    $taxas = (empty(get_term_meta($term->term_id, 'taxas', true)) ? 0 : get_term_meta($term->term_id, 'taxas', true));
                    $taxas_opcional = (empty(get_term_meta($term->term_id, 'tx-opcional', true)) ? 0 : get_term_meta($term->term_id, 'tx-opcional', true));
                    $txt_upload_image = '<strong>ISS:</strong> '.$iss.'%<br><strong>Taxas:</strong> '.$taxas.'%<br><strong>Opcional:</strong> '.$taxas_opcional.'%';
                    //do your stuff here with $term or $term_id
                    $content = $txt_upload_image;
                    break;
                case 'pagamento':
                    $payment_method = get_term_meta( $term->term_id, 'metodos-de-pagamento', true); 
     
                    if($payment_method[1] == "true"){
                        $txt_upload_image .= '<strong>Cartão online:</strong><br>';
                        $payment_selected = get_term_meta( $term->term_id, 'formas-de-pagamento-cartao', true); 
                        if(in_array(1, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei a 1ª diária + taxas<br>';
                        }
                        if(in_array(2, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei 2 diárias + taxas<br>';
                        }
                        if(in_array(3, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei 3 diárias + taxas <br>';
                        }
                        if(in_array(4, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas <br>';
                        }
                        if(in_array(5, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 2 parcelas <br>';
                        }
                        if(in_array(6, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 3 parcelas<br>';
                        }
                        if(in_array(7, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 4 parcelas <br>';
                        }
                        if(in_array(8, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 5 parcelas <br>';
                        } 
                    }
                    $txt_upload_image .= '<br>';
                    if($payment_method[2] == "true"){
                        $txt_upload_image .= '<strong>Boleto:</strong><br>';
                        $payment_selected = get_term_meta( $term->term_id, 'formas-de-pagamento-boleto', true); 
                        if(in_array(1, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei a 1ª diária + taxas<br>';
                        }
                        if(in_array(2, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei 2 diárias + taxas<br>';
                        }
                        if(in_array(3, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei 3 diárias + taxas <br>';
                        }
                        if(in_array(4, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas <br>';
                        }
                        if(in_array(5, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 2 parcelas <br>';
                        }
                        if(in_array(6, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 3 parcelas<br>';
                        }
                        if(in_array(7, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 4 parcelas <br>';
                        }
                        if(in_array(8, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 5 parcelas <br>';
                        } 
                    }
                    $txt_upload_image .= '<br>';
                    if($payment_method[3] == "true"){
                        $txt_upload_image .= '<strong>Pix:</strong><br>';
                        $payment_selected = get_term_meta( $term->term_id, 'formas-de-pagamento-pix', true); 
                        if(in_array(1, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei a 1ª diária + taxas<br>';
                        }
                        if(in_array(2, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei 2 diárias + taxas<br>';
                        }
                        if(in_array(3, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei 3 diárias + taxas <br>';
                        }
                        if(in_array(4, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas <br>';
                        }
                        if(in_array(5, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 2 parcelas <br>';
                        }
                        if(in_array(6, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 3 parcelas<br>';
                        }
                        if(in_array(7, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 4 parcelas <br>';
                        }
                        if(in_array(8, $payment_selected)){
                            $txt_upload_image .= '&#8227; Pagarei todas as diárias + taxas em 5 parcelas <br>';
                        } 
                    }
                    //do your stuff here with $term or $term_id
                    $content = $txt_upload_image;
                    break;
                default:
                    break;
            }
            return $content;
        }
        add_filter( 'manage_hoteis_custom_column', 'add_hoteis_column_content', 10, 3 );
    /* FIM CODES ABAS TAXONOMIAS */ 

    /* CODES SCRIPTS AJAX */  
        add_action( 'wp_ajax_list_regime', 'list_regime' );
        add_action( 'wp_ajax_nopriv_list_regime', 'list_regime' );

        function list_regime() {  

            $id = $_POST['id'];  

            $cat_terms = get_terms(
                array('regime'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 
            
            $content = '';
            foreach( $cat_terms as $term ) { 
                $txt_hotel[$term->term_id] = array($term->name, $term->term_id); 
            } 

            $txt_hotel = array_values($txt_hotel);

            $retorno .= '<option value="0">Selecione...</option>';

            for ($i=0; $i < count($txt_hotel); $i++) {  
                $retorno .= '<option value="'.$txt_hotel[$i][1].'">'.$txt_hotel[$i][0].'</option>';
            }

            echo $retorno;
            
        } 
        add_action( 'wp_ajax_list_termos_gerais', 'list_termos_gerais' );
        add_action( 'wp_ajax_nopriv_list_termos_gerais', 'list_termos_gerais' );

        function list_termos_gerais() {   

            $id = $_POST['id'];  
            $termo_select = get_post_meta( $id, 'termos-gerais', true);

            $cat_terms = get_terms(
                array('termos'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 
            
            $content = '';
            foreach( $cat_terms as $term ) { 
                $txt_hotel[$term->term_id] = array($term->name, $term->term_id); 
            } 

            $txt_hotel = array_values($txt_hotel);

            $retorno .= '<option value="0">Selecione...</option>';

            for ($i=0; $i < count($txt_hotel); $i++) {  
                $retorno .= '<option value="'.$txt_hotel[$i][1].'" '.($termo_select == $txt_hotel[$i][1] ? 'selected' : '').'>'.$txt_hotel[$i][0].'</option>';
            }

            echo $retorno;
            
        } 

        add_action( 'wp_ajax_list_tarifario', 'list_tarifario' );
        add_action( 'wp_ajax_nopriv_list_tarifario', 'list_tarifario' );

        function list_tarifario() {  

            $id = $_POST['id'];
            $nome_tarifario = unserialize(get_post_meta( $id, 'dados_tarifas', true));

            $retorno = '';

            $retorno .= '<option value="0">Selecione...</option>';
            if (count($nome_tarifario) > 0) { 
                $contador = 0;
                for ($i=0; $i < count($nome_tarifario); $i++) {  
                    $retorno .= '<option value="'.strtolower(str_replace(" ", "-", str_replace("-", "+", $nome_tarifario[$i]["nome"]))).'">'.$nome_tarifario[$i]["nome"].'</option>';
                }
            }  

            echo $retorno;
            
        } 
        add_action( 'wp_ajax_list_hotel', 'list_hotel' );
        add_action( 'wp_ajax_nopriv_list_hotel', 'list_hotel' );

        function list_hotel() { 

            $id = $_POST['id'];  

            $cat_terms = get_terms(
                array('hoteis'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 
            
            $content = '';
            foreach( $cat_terms as $term ) { 
                $txt_hotel[$term->term_id] = array($term->name, $term->term_id); 
            } 

            $txt_hotel = array_values($txt_hotel);

            $retorno .= '<option value="0">Selecione...</option>';

            for ($i=0; $i < count($txt_hotel); $i++) {  
                $retorno .= '<option value="'.$txt_hotel[$i][1].'">'.$txt_hotel[$i][0].'</option>';
            }

            echo $retorno;
            
        }  
        function get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {

            global $wpdb;

            if( empty( $key ) )
                return;

            $r = $wpdb->get_results( $wpdb->prepare( "
                SELECT pm.meta_value FROM {$wpdb->postmeta} pm
                LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
                WHERE pm.meta_key = %s 
                AND p.post_status = %s 
                AND p.post_type = %s
            ", $key, $status, $type ) );

            return $r;
        }  
        function get_meta_id_values( $key = '', $type = 'post', $status = 'publish', $value = ''  ) {

            global $wpdb;

            if( empty( $key ) )
                return; 

            $r = $wpdb->get_col( "SELECT pm.post_id FROM {$wpdb->postmeta} pm LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id WHERE pm.meta_key = '$key' AND p.post_status = '$status' AND p.post_type = '$type' AND pm.meta_value like '%$value%'" ); 

            return $r;
        } 

        add_action( 'wp_ajax_list_categories_posts', 'list_categories_posts' );
        add_action( 'wp_ajax_nopriv_list_categories_posts', 'list_categories_posts' );

        function list_categories_posts() { 

            $movie_ratings = get_meta_values( 'destino', 'roteirostec' ); 

            $id = $_POST['id'];   

            $retorno .= '<option value="0">Selecione um destino</option>';

            for ($i=0; $i < count($movie_ratings); $i++) {  
                $retorno .= '<option value="'.tirarAcentos(strtolower(str_replace(" ", "-", $movie_ratings[$i]))).';'.$movie_ratings[$i].'">'.$movie_ratings[$i].'</option>';
            }

            echo $retorno;
            
        }   
        function tirarAcentos($string){

            return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/"),explode(" ","a A e E i I o O u U n N c"),$string);

        }
        function get_posts_page_destin( $key = '' ) {

            global $wpdb;

            if( empty( $key ) )
                return;
 

            $r = $wpdb->get_results( "
                SELECT guid, ID, post_date, post_name, post_title, post_content, post_author FROM {$wpdb->posts} 
                WHERE post_name like '%$key%'
                AND post_status = 'publish'
                AND post_type = 'post'");

            return $r; 
        } 

        add_action( 'wp_ajax_list_posts_page_destin', 'list_posts_page_destin' );
        add_action( 'wp_ajax_nopriv_list_posts_page_destin', 'list_posts_page_destin' );

        function list_posts_page_destin() { 

            $dados_categoria = explode(";", $_POST['category']);

            $data_checkin = date("Y-m-d", strtotime($_POST['checkin']));
            $data_checkout = date("d/m/Y", strtotime($_POST['checkout']));

            $retorno = '';

            $slug_categoria = $dados_categoria[0];
            $slug_cat = explode("-", $slug_categoria);
            $nome_categoria = str_replace("%C3%A7", "ç", str_replace("%20", " ", $dados_categoria[1]));

            //listar bloco dos posts no geral
            $bloco_geral = get_posts_page_destin( $slug_categoria );   
            //listar id do destino
            $id_post_roteirostec = get_meta_id_values( 'destino', 'roteirostec', 'publish', $slug_cat[0] ); 

            $tarifas = unserialize(get_post_meta( $id_post_roteirostec[0], 'dados_tarifas', true)); 
            for ($i=0; $i < count($tarifas); $i++) { 
                $periodo_tarifario_inicial[] = date("Y-m-d", strtotime(implode("-", array_reverse(explode("/", $tarifas[$i]["data_inicial"])))));
            }  

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo'); 

            $retorno .= '<div class="posts-wrapper row">';
            for ($i=0; $i < count($bloco_geral); $i++) { 
                $thumb_id = get_post_thumbnail_id($bloco_geral[$i]->ID);
                $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                $url = $thumb_url[0];   

                $author_name = get_the_author_meta( 'display_name', $bloco_geral[$i]->post_author );
 
                $style = 'display:none';
                for ($x=0; $x < count($periodo_tarifario_inicial); $x++) { 
                    if(strtotime($data_checkin) >= strtotime($periodo_tarifario_inicial[$x])){
                        $style = '';
                    }
                }

                $retorno .= '<article id="post-'.$bloco_geral[$i]->ID.'" class="post-'.$bloco_geral[$i]->ID.' post type-post status-publish format-standard has-post-thumbnail hentry category-brasil layout-covers  col-md-12 col-sm-12 col-12" style="'.$style.'">
                    <div class="article-content-col">
                        <div class="content">
                            <div class="cover-post nv-post-thumbnail-wrap" style="background-image: url('.$url.'"><div class="inner"><h2 class="blog-entry-title entry-title"><a href="'.$bloco_geral[$i]->guid.'" rel="bookmark">'.$bloco_geral[$i]->post_title.'</a></h2><ul class="nv-meta-list"><li class="meta author vcard"><span class="author-name fn">por <a href="https://site02.traveltec.com.br/author/'.$author_name.'/" title="Posts by '.$author_name.'" rel="author">'.$author_name.'</a></span></li><li class="meta date posted-on"><time class="entry-date published" datetime="2021-07-02T15:09:37-03:00" content="2021-07-02">'.strftime("%d de %B de %Y", strtotime(implode("-",array_reverse(explode("-", date("d-m-Y", strtotime($bloco_geral[$i]->post_date))))))).'</time><time class="updated" datetime="2021-07-06T17:09:23-03:00">'.strftime("%d de %B de %Y", strtotime(implode("-",array_reverse(explode("-", date("d-m-Y", strtotime($bloco_geral[$i]->post_date))))))).'</time></li></ul><div class="excerpt-wrap entry-summary"><p>'.substr($bloco_geral[$i]->post_content, 0, 200).'<a href="'.$bloco_geral[$i]->guid.'" class="" rel="bookmark">Continue a ler »<span class="screen-reader-text">'.$bloco_geral[$i]->post_title.'</span></a></p>
                </div></div></div>      </div>
                    </div>
                </article> ';
            }
            $retorno .= '</div>';

            echo $retorno;
            
        }   

        add_action( 'wp_ajax_list_apto_hotel', 'list_apto_hotel' );
        add_action( 'wp_ajax_nopriv_list_apto_hotel', 'list_apto_hotel' );

        function list_apto_hotel() { 
            $id_hotel = $_POST['valor_hotel']; 

            $cat_terms = get_terms(
                array('aptos'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 
            
            $content = '';
            foreach( $cat_terms as $term ) { 
                $txt_hotel[$term->term_id] = array($term->name, get_term_meta($term->term_id, 'term_hotel', true), $term->term_id); 
            } 

            $txt_hotel = array_values($txt_hotel);

            $retorno .= '<option value="0">Selecione um apartamento</option>';

            for ($i=0; $i < count($txt_hotel); $i++) { 
                if ($txt_hotel[$i][1] == $id_hotel) {
                    $retorno .= '<option value="'.$txt_hotel[$i][2].'">'.$txt_hotel[$i][0].'</option>';
                }
            }

            echo $retorno;
            
        } 

        add_action( 'wp_ajax_set_value_nacionais', 'set_value_nacionais' );
        add_action( 'wp_ajax_nopriv_set_value_nacionais', 'set_value_nacionais' );

        function set_value_nacionais(){
            $cats = get_categories();

            $retorno = '';

            $retorno .= '<option value="0">Escolha o destino</option>';

            $args = array( 
                'category'         => 12,
                'orderby'          => 'name',
                'order'            => 'ASC',
                'post_type'        => 'post',
                'numberposts' => 500
            );

            $posts = get_posts($args);
 
              if ($posts ) : 

            foreach( $posts as $post ) : 
               $title = $post->post_title;
               $slug = $post->post_name;

               $retorno .= '<option value="/'.$slug.'">'.$title.'</option>';
            endforeach;
            endif;
 

            echo $retorno;
        }

        add_action( 'wp_ajax_set_value_internacionais', 'set_value_internacionais' );
        add_action( 'wp_ajax_nopriv_set_value_internacionais', 'set_value_internacionais' );

        function set_value_internacionais(){
            $cats = get_categories();

            $retorno = '';

            $retorno .= '<option value="0">Escolha o destino</option>';

            $args = array( 
                'category'         => 13,
                'orderby'          => 'name',
                'order'            => 'ASC',
                'post_type'        => 'post',
                'numberposts' => 500
            );

            $posts = get_posts($args);
 
              if ($posts ) : 

            foreach( $posts as $post ) : 
               $title = $post->post_title;
               $slug = $post->post_name;

               $retorno .= '<option value="/'.$slug.'">'.$title.'</option>';
            endforeach;
            endif;
 

            echo $retorno;
        }

        add_action( 'wp_ajax_set_value_hospedagem', 'set_value_hospedagem' );
        add_action( 'wp_ajax_nopriv_set_value_hospedagem', 'set_value_hospedagem' );

        function set_value_hospedagem(){ 

            $retorno = '';

            $retorno .= '<option value="0">Escolha a hospedagem</option>';

            $args = array(  
                'orderby'          => 'name',
                'order'            => 'ASC',
                'post_type'        => 'hospedagenstec',
                'numberposts' => 500
            );

            $posts = get_posts($args);
 
              if ($posts ) : 

            foreach( $posts as $post ) : 
               $title = $post->post_title;
               $slug = $post->post_name;

               $retorno .= '<option value="/hospedagenstec/'.$slug.'">'.$title.'</option>';
            endforeach;
            endif;
 

            echo $retorno;
        }

        add_action( 'wp_ajax_list_tarifarios_loop', 'list_tarifarios_loop' );
        add_action( 'wp_ajax_nopriv_list_tarifarios_loop', 'list_tarifarios_loop' );

        function list_tarifarios_loop() {
            $id = $_POST['id'];   

            $tarifas = unserialize(get_post_meta( $id, 'dados_tarifario', true)); 

            for ($i=0; $i < count($tarifas); $i++) { 

                if(!empty($tarifas[$i]["tarifario"]["tarifario_roteiro"])){

                    $nome_tarifario[] = array("tarifario" => array("tarifario_roteiro" => $tarifas[$i]["tarifario"]["tarifario_roteiro"], "hotel_roteiro" => $tarifas[$i]["tarifario"]["hotel_roteiro"], "lotado" => $tarifas[$i]["tarifario"]["lotado"], "consulta" => $tarifas[$i]["tarifario"]["consulta"],  "distancia" => $tarifas[$i]["tarifario"]["distancia"], "apto_roteiro" => $tarifas[$i]["tarifario"]["apto_roteiro"], "regime_roteiro" => $tarifas[$i]["tarifario"]["regime_roteiro"], "min_diarias" => $tarifas[$i]["tarifario"]["min_diarias"], "pax" => $tarifas[$i]["tarifario"]["pax"], "bloqueio" => $tarifas[$i]["tarifario"]["bloqueio"], "valor_dom" => $tarifas[$i]["tarifario"]["valor_dom"], "valor_seg" => $tarifas[$i]["tarifario"]["valor_seg"], "valor_ter" => $tarifas[$i]["tarifario"]["valor_ter"], "valor_qua" => $tarifas[$i]["tarifario"]["valor_qua"], "valor_qui" => $tarifas[$i]["tarifario"]["valor_qui"], "valor_sex" => $tarifas[$i]["tarifario"]["valor_sex"], "valor_sab" => $tarifas[$i]["tarifario"]["valor_sab"], "check_noite_extra" =>  $tarifas[$i]["tarifario"]["check_noite_extra"], "valor_extra_dom" => $tarifas[$i]["tarifario"]["valor_extra_dom"], "valor_extra_seg" => $tarifas[$i]["tarifario"]["valor_extra_seg"], "valor_extra_ter" => $tarifas[$i]["tarifario"]["valor_extra_ter"], "valor_extra_qua" => $tarifas[$i]["tarifario"]["valor_extra_qua"], "valor_extra_qui" => $tarifas[$i]["tarifario"]["valor_extra_qui"], "valor_extra_sex" => $tarifas[$i]["tarifario"]["valor_extra_sex"], "valor_extra_sab" => $tarifas[$i]["tarifario"]["valor_extra_sab"], "check_valor_pacote" => $tarifas[$i]["tarifario"]["check_valor_pacote"], "valor_pacote_single" => $tarifas[$i]["tarifario"]["valor_pacote_single"], "valor_pacote_double" => $tarifas[$i]["tarifario"]["valor_pacote_double"], "valor_pacote_triple" => $tarifas[$i]["tarifario"]["valor_pacote_triple"], "check_valor_padrao" => $tarifas[$i]["tarifario"]["check_valor_padrao"], "valor_padrao" => $tarifas[$i]["tarifario"]["valor_padrao"], "check_permite_crianca" => $tarifas[$i]["tarifario"]["check_permite_crianca"], "crianca1" => $tarifas[$i]["tarifario"]["crianca1"], "crianca2" => $tarifas[$i]["tarifario"]["crianca2"], "crianca3" => $tarifas[$i]["tarifario"]["crianca3"]));

                }

            }
            usort($nome_tarifario, "sort_tarifas_periodo");  

            $cat_terms = get_terms(
                array('hoteis'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 
            foreach( $cat_terms as $term ) { 
                $txt_hotel[$term->term_id] = array($term->name, $term->term_id);  
            } 
            $txt_hotel = array_values($txt_hotel);

            $cat_terms_apto = get_terms(
                array('aptos'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 
            foreach( $cat_terms_apto as $termapto ) { 
                $txt_apto[$termapto->term_id] = array($termapto->name, get_term_meta($termapto->term_id, 'term_hotel', true), $termapto->term_id); 
            } 
            $txt_apto = array_values($txt_apto);

            $cat_terms_regime = get_terms(
                array('regime'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 
            foreach( $cat_terms_regime as $termregime ) { 
                $txt_regime[$termregime->term_id] = array($termregime->name, $termregime->term_id); 
            } 
            $txt_regime = array_values($txt_regime);

            $nome_tarifa = unserialize(get_post_meta( $id, 'dados_tarifas', true)); 

            $desc_opts_tarifario = '';

            if (count($nome_tarifa) > 0) {  
                for ($y=0; $y < count($nome_tarifa); $y++) {  
                    $desc_opts_tarifario .= '<option value="'.strtolower(str_replace(" ", "-", str_replace("-", "+", $nome_tarifa[$y]["nome"]))).'">'.$nome_tarifa[$y]["nome"].'</option>';
                    $options_tarifario[] = array(strtolower(str_replace(" ", "-", str_replace("-", "+", $nome_tarifa[$y]["nome"]))), $nome_tarifa[$y]["nome"]);
                }
            } 


            $retorno = '';
            if (count($nome_tarifario) > 0) { 
                $contador = 0;
                for ($i=0; $i < count($nome_tarifario); $i++) { 
                    
                    $content = '';
                    $nome_hotel = '';
     
                    $id_hotel = $nome_tarifario[$i]["tarifario"]["hotel_roteiro"];
                    for ($htl=0; $htl < count($txt_hotel); $htl++) {  
                        if ($id_hotel == $txt_hotel[$htl][1]) {
                            $nome_hotel = $txt_hotel[$htl][0];
                        } 
                        $options_hotel[$i][] .= '<option value="'.$txt_hotel[$htl][1].'" '.($id_hotel == $txt_hotel[$htl][1] ? 'selected' : '').'>'.$txt_hotel[$htl][0].'</option>';
                    }

                    $id_apto = $nome_tarifario[$i]["tarifario"]["apto_roteiro"];
                    
                    $contentapto = '';
                    for ($apt=0; $apt < count($txt_apto); $apt++) {  
                        if ($id_apto == $txt_apto[$apt][2]) {
                            $nome_apto = $txt_apto[$apt][0];
                        } 
                        if ($id_hotel == $txt_apto[$apt][1]) { 
                            $options_apto[$i][] .= '<option value="'.$txt_apto[$apt][2].'" '.($id_apto == $txt_apto[$apt][2] ? 'selected' : '').'>'.$txt_apto[$apt][0].'</option>';
                        }
                    }

                    $id_regime = $nome_tarifario[$i]["tarifario"]["regime_roteiro"];
                    
                    $contentapto = '';
                    for ($rgm=0; $rgm < count($txt_regime); $rgm++) {  
                        if ($id_regime == $txt_regime[$rgm][1]) {
                            $nome_regime = $txt_regime[$rgm][0];
                        } 
                        $options_regime[$i][] .= '<option value="'.$txt_regime[$rgm][1].'" '.($id_regime == $txt_regime[$rgm][1] ? 'selected' : '').'>'.$txt_regime[$rgm][0].'</option>';
                    }  

                    $desc_int_tarifario = '';
                    for ($optt=0; $optt < count($options_tarifario); $optt++) { 
                        if ($options_tarifario[$optt][0] == str_replace("+", "-", $nome_tarifario[$i]["tarifario"]["tarifario_roteiro"])) {
                            $desc_int_tarifario .= '<option value="'.$options_tarifario[$optt][0].'" selected>'.$options_tarifario[$optt][1].'</option>';
                        }else{
                            $desc_int_tarifario .= '<option value="'.$options_tarifario[$optt][0].'">'.$options_tarifario[$optt][1].'</option>';
                        }
                    }

                    $contador = $contador+1;

                    $retorno .= '
                    <div class="container repeater_tarifa" id="hold_remove_tarifa'.$contador.'" style="margin-top: 18px;border-top: 1px dashed #eee;padding-top: 10px;"> 
                        <div class="row" style="padding-top: 10px"> 
                            <div class="col-12" style="padding: 0px 10px;"> 
                                <h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;">
                                    <a onclick="exibe_div_tarifario(\''.$contador.'\')" style="cursor:pointer;">'.ucfirst((str_replace("+", " ", str_replace("-", " ", $nome_tarifario[$i]["tarifario"]["tarifario_roteiro"])))).' - '.$nome_hotel.' - '.$nome_apto.' - '.$nome_regime.'</a> 
                                    <a onclick="remove_div_tarifario(\''.$contador.'\')" style="cursor: pointer;"><i class="fas fa-trash-alt" style="float: right;color: #e01717;"></i></a>
                                </h4> 
                            </div>
                        </div> 
                        <div class="tabela_tarifa_cadastro'.$contador.'" style="display:none">
                            <div class="row tabela_tarifa_cadastro'.$contador.'" style="padding-top: 10px;"> 
                                <div class="col-2" style="padding: 10px"> 
                                    <label>
                                        <span style="color:#555">Tarifário</span>
                                    </label> 
                                </div>
                                <div class="col-4"> 
                                    <select name="tarifario_option'.$contador.'" id="tarifario_option'.$contador.'" class="cx-ui-select"> 
                                        <option value="">Selecione...... </option> '.$desc_int_tarifario.'
                                    </select> 
                                </div> 
                                <div class="col-2" style="padding: 10px"> 
                                    <label>
                                        <span style="color:#555">Regime</span>
                                    </label> 
                                </div>
                                <div class="col-4"> 
                                    <select name="regime_roteiro'.$contador.'" id="regime_roteiro'.$contador.'" class="cx-ui-select"> 
                                        <option value="">Selecione......</option>';

                                        for ($countRegime=0; $countRegime < count($options_regime[$i]); $countRegime++) { 
                                            $retorno .= ''.$options_regime[$i][$countRegime];
                                        }
                                    $retorno .= '
                                    
                                    </select> 
                                </div>
                            </div> 
                            <div class="row tabela_tarifa_cadastro'.$contador.'" style="padding-top: 10px;"> 
                                <div class="col-2" style="padding: 10px"> 
                                    <label>
                                        <span style="color:#555">Hotel</span>
                                    </label> 
                                </div>
                                <div class="col-4"> 
                                    <select name="hotel_roteiro'.$contador.'" id="hotel_roteiro'.$contador.'" class="cx-ui-select" onchange="alter_apto_hotel(\''.$contador.'\')"> 
                                        <option value="" selected>Selecione...</option>';

                                        for ($countHotel=0; $countHotel < count($options_hotel[$i]); $countHotel++) { 
                                            $retorno .= ''.$options_hotel[$i][$countHotel];
                                        }
                                    $retorno .= '</select> 
                                </div>
                                <div class="col-2" style="padding: 10px"> 
                                    <label>
                                        <span style="color:#555">Apartamento</span>
                                    </label> 
                                </div>
                                <div class="col-4"> 
                                    <select name="apto_roteiro'.$contador.'" id="apto_roteiro'.$contador.'" class="cx-ui-select"> 
                                        <option value="">Selecione um apartamento...</option>';

                                        for ($countApto=0; $countApto < count($options_apto[$i]); $countApto++) { 
                                            $retorno .= ''.$options_apto[$i][$countApto];
                                        }
                                    $retorno .= '
                                    </select> 
                                    <div class="" id="loading'.$contador.'" style="display: none;padding: 10px 0px;"> 
                                        <span><small><img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Aguarde...</small></span> 
                                    </div>
                                </div>
                            </div> 
                            <div class="row divdiarias" style="padding: 10px 0px;">  
                                <div class="col-2" style="padding:10px">Distância</div>     
                                <div class="col-4"> 
                                    <input type="text" class="cx-ui-text" id="distancia'.$contador.'" name="distancia'.$contador.'" value="'.$nome_tarifario[$i]["tarifario"]["distancia"].'" style="font-size: 13px;width:100%;"> 
                                </div>     
                                <div class="col-2" style="padding:6px 10px">  
                                    <input type="checkbox" id="lotado'.$contador.'" name="lotado'.$contador.'" '.($nome_tarifario[$i]["tarifario"]
                                        ["lotado"] == 1 ? 'checked' : '').'> Lotado
                                </div>  
                                <div class="col-2" style="padding:6px 10px">  
                                    <input type="checkbox" id="consulta'.$contador.'" name="consulta'.$contador.'" '.($nome_tarifario[$i]["tarifario"]
                                        ["consulta"] == 1 ? 'checked' : '').'> Sob Consulta
                                </div>
                              </div> 
                            <div class="row divdiarias" style="padding-top: 10px;">  
                                <div class="col-2" style="padding:10px">Min. Diárias</div>     
                                <div class="col-2"> 
                                    <input type="number" class="cx-ui-text" id="min_diarias'.$contador.'" name="min_diarias'.$contador.'" value="'.$nome_tarifario[$i]["tarifario"]["min_diarias"].'" style="font-size: 13px;width:100%;"> 
                                </div>    
                                <div class="col-1 text-center" style="padding:10px">Pax</div>     
                                <div class="col-2"> 
                                    <input type="number" class="cx-ui-text" id="pax'.$contador.'" name="pax'.$contador.'" value="'.$nome_tarifario[$i]["tarifario"]["pax"].'" style="font-size: 13px;width:100%;"> 
                                </div>   
                                <div class="col-2 text-center" style="padding:10px">Bloqueio</div>     
                                <div class="col-2"> 
                                    <input type="number" class="cx-ui-text" id="bloqueio'.$contador.'" value="'.$nome_tarifario[$i]["tarifario"]["bloqueio"].'" name="bloqueio'.$contador.'"  style="font-size: 13px;width:100%;"> 
                                </div>   
                            </div>
                            <div class="row divpacote" style="padding-top: 20px;">    
                                <div class="col-12" style="padding:10px">
                                    Valores do pacote
                                </div>     
                                <div class="col-2" id="div_valor_pacote_single'.$contador.'" style="padding:10px"> 
                                    <input type="text" class="cx-ui-text money" id="valor_pacote_single'.$contador.'" name="valor_pacote_single'.$contador.'"  style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" value="'.($nome_tarifario[$i]["tarifario"]["valor_pacote_single"]).'"> 
                                </div>   
                                <div class="col-2" id="div_valor_pacote_double'.$contador.'" style="padding:10px"> 
                                    <input type="text" class="cx-ui-text money" id="valor_pacote_double'.$contador.'" name="valor_pacote_double'.$contador.'"  style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" value="'.($nome_tarifario[$i]["tarifario"]["valor_pacote_double"]).'"> 
                                </div>   
                                <div class="col-2" id="div_valor_pacote_triple'.$contador.'" style="padding:10px"> 
                                    <input type="text" class="cx-ui-text money" id="valor_pacote_triple'.$contador.'" name="valor_pacote_triple'.$contador.'"  style="font-size: 13px;width:100%" autocomplete="off" placeholder="0,00" value="'.($nome_tarifario[$i]["tarifario"]["valor_pacote_triple"]).'"> 
                                </div>  
                            </div>
                            <div class="row divdiarias" style="padding-top: 20px;"> 
                                <div class="col-2 col_valor_padrao'.$contador.'" style="padding:10px">
                                    <input type="checkbox" name="check_valor_padrao'.$contador.'" id="check_valor_padrao'.$contador.'" onchange="toggle_field_valor_padrao(\''.$contador.'\')" '.($nome_tarifario[$i]["tarifario"]
                                        ["check_valor_padrao"] == 1 ? 'checked' : '').'> Valor padrão
                                </div>     
                                <div class="col-2" id="div_valor_padrao'.$contador.'" style="'.($nome_tarifario[$i]["tarifario"]
                                        ["check_valor_padrao"] == 1 ? '' : 'display:none').'"> 
                                    <input type="text" class="cx-ui-text money" id="valor_padrao'.$contador.'" name="valor_padrao'.$contador.'"  style="font-size: 13px;width:100%" onchange="change_value_padrao_fields(\''.$contador.'\')" placeholder="0,00" value="'.$nome_tarifario[$i]["tarifario"]["valor_padrao"].'"> 
                                </div>  
                                <div class="col-12" style="padding: 0px"> 
                                    <table id="valor_diarias'.$contador.'" style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;"> 
                                        <thead> 
                                            <th style="padding: 16px 10px;text-align: left;">Dom</th> 
                                            <th style="text-align: left;">Seg</th> 
                                            <th style="text-align: left;">Ter</th> 
                                            <th style="text-align: left;">Qua</th> 
                                            <th style="text-align: left;">Qui</th> 
                                            <th style="text-align: left;">Sex</th> 
                                            <th style="text-align: left;">Sab</th> 
                                        </thead> 
                                        <tbody> 
                                            <tr style="border: 1px solid #bdbdbd;"> 
                                                <td style="padding: 8px 12px;">
                                                    <input type="text" name="valor_dom'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_dom"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_seg'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_seg"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_ter'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_ter"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_qua'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_qua"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_qui'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_qui"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_sex'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_sex"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_sab'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_sab"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                            </tr>
                                        </tbody> 
                                    </table> 
                                </div>  
                                <div class="col-2 col_noite_extra'.$contador.'" style="padding:10px">
                                    <input type="checkbox" name="check_noite_extra'.$contador.'" id="check_noite_extra'.$contador.'" onchange="toggle_field_noite_extra(\''.$contador.'\')" '.($nome_tarifario[$i]["tarifario"]["check_noite_extra"] == 1 ? 'checked' : 0).'> Noite extra
                                </div>
                                    <table style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;'.($nome_tarifario[$i]["tarifario"]["check_noite_extra"] == 1 ? '' : 'display:none').'" id="table_noite_extra'.$contador.'"> 
                                        <thead> 
                                            <th style="padding: 16px 10px;">Dom</th> 
                                            <th style="text-align: left;">Seg</th> 
                                            <th style="text-align: left;">Ter</th> 
                                            <th style="text-align: left;">Qua</th> 
                                            <th style="text-align: left;">Qui</th> 
                                            <th style="text-align: left;">Sex</th> 
                                            <th style="text-align: left;">Sab</th> 
                                        </thead> 
                                        <tbody>
                                            <tr style="border: 1px solid #bdbdbd;"> 
                                                <td style="padding: 8px 12px;">
                                                    <input type="text" name="valor_extra_dom'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_extra_dom"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_extra_seg'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_extra_seg"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_extra_ter'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_extra_ter"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_extra_qua'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_extra_qua"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_extra_qui'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_extra_qui"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_extra_sex'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_extra_sex"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                                <td style="padding: 8px 8px 8px 0px;">
                                                    <input type="text" name="valor_extra_sab'.$contador.'" placeholder="0,00" class="cx-ui-text money" style="font-size: 13px;width:100%" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_extra_sab"].'" onclick="this.value=\'0,00\'">
                                                </td>
                                            </tr>
                                        </tbody> 
                                    </table> 
                                    <div class="col-12 " style="padding: 10px;"><input type="checkbox" name="check_permite_crianca'.$contador.'" id="check_permite_crianca'.$contador.'" onchange="toggle_field_crianca(\''.$contador.'\')"  '.($nome_tarifario[$i]["tarifario"]["check_permite_crianca"] == 1 ? 'checked' : 0).'/> Permitir crianças</div>

                                    <div class="col-2" id="div_crianca1'.$contador.'" style="'.($nome_tarifario[$i]["tarifario"]["check_permite_crianca"] == 1 ? '' : 'display:none').'">
                                        <label>Criança 1</label><br>
                                        <input type="text" class="cx-ui-text money" id="crianca1'.$contador.'" name="crianca1'.$contador.'" style="font-size: 13px; width: 100%;" value="'.$nome_tarifario[$i]["tarifario"]["crianca1"].'" placeholder="0,00" />
                                    </div>

                                    <div class="col-2" id="div_crianca2'.$contador.'" style="'.($nome_tarifario[$i]["tarifario"]["check_permite_crianca"] == 1 ? '' : 'display:none').'">
                                        <label>Criança 2</label><br>
                                        <input type="text" class="cx-ui-text money" id="crianca2'.$contador.'" name="crianca2'.$contador.'" style="font-size: 13px; width: 100%;" value="'.$nome_tarifario[$i]["tarifario"]["crianca2"].'" placeholder="0,00" />
                                    </div>

                                    <div class="col-2" id="div_crianca3'.$contador.'" style="'.($nome_tarifario[$i]["tarifario"]["check_permite_crianca"] == 1 ? '' : 'display:none').'">
                                        <label>Bebê</label><br>
                                        <input type="text" class="cx-ui-text money" id="crianca3'.$contador.'" name="crianca3'.$contador.'" style="font-size: 13px; width: 100%;" value="'.$nome_tarifario[$i]["tarifario"]["crianca3"].'" placeholder="0,00" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }
            echo $retorno;
        }

        add_action( 'wp_ajax_list_tarifas_loop', 'list_tarifas_loop' );
        add_action( 'wp_ajax_nopriv_list_tarifas_loop', 'list_tarifas_loop' );

        function sort_tarifas($a, $b) {
            return $a["data_inicial"] > $b["data_inicial"];
        } 

        function sort_tarifas_periodo($a, $b) {
            return $a["tarifario"]["tarifario_roteiro"] > $b["tarifario"]["tarifario_roteiro"];
        } 

function invenDescSort($a, $b)
{
  $id_roteiro = $_SESSION['roteiro_id'];
  $tipo_ordenar = get_post_meta( $id_roteiro, 'ordenar', true);
    $pacote = get_post_meta($id_roteiro, 'pacote', true);
  //1 = ordem crescente
  //2 = ordem descrescente 
  //3 = menor valor
  //4 = maior valor
  if($tipo_ordenar == 1){
    return $a["nome_hotel"] > $b["nome_hotel"];
  }else if($tipo_ordenar == 2){
    return $a["nome_hotel"] < $b["nome_hotel"];
  }else if($tipo_ordenar == 3){
        if($pacote == 0){
      return $a["valor_pacote_single"] > $b["valor_pacote_single"];
        }else{
            return $a["valor_seg"] > $b["valor_seg"];
        }
  }else if($tipo_ordenar == 4){
    return $a["valor_pacote_single"] < $b["valor_pacote_single"];
        if($pacote == 0){
          return $a["valor_pacote_single"] > $b["valor_pacote_single"];
        }else{
            return $a["valor_seg"] > $b["valor_seg"];
        }
  }else{
        if($pacote == 0){
          return $a["valor_pacote_single"] > $b["valor_pacote_single"];
        }else{
            return $a["valor_seg"] > $b["valor_seg"];
        }
  }
    
} 

        function sort_by_name($a, $b) {
            return $a["nome"] > $b["nome"];
        }  

        function list_tarifas_loop() {
            $id = $_POST['id'];  
            $tarifas = unserialize(get_post_meta( $id, 'dados_tarifas', true));

            for ($i=0; $i < count($tarifas); $i++) { 
                if(!empty($tarifas[$i]["nome"])){
                    $nome_tarifario[] = array("nome" => $tarifas[$i]["nome"], "tipo" => $tarifas[$i]["tipo"], "moeda" => $tarifas[$i]["moeda"], "data_inicial" => date("d/m/Y", strtotime(implode("-", array_reverse(explode("/", $tarifas[$i]["data_inicial"]))))), "data_final" => date("d/m/Y", strtotime(implode("-", array_reverse(explode("/", $tarifas[$i]["data_final"]))))), "tipo_periodo" => $tarifas[$i]["tipo_periodo"]);
                }
            }
            usort($nome_tarifario, "sort_tarifas"); 

            $retorno = '';
            if (count($nome_tarifario) > 0) { 
                $contador = 0;
                for ($i=0; $i < count($nome_tarifario); $i++) { 

                    $contador = $contador+1;

                    $retorno .= '<div class="row repeater_tarifario" id="holder_remover_tarifario'.$contador.'" style="padding: 11px 10px;"><a onclick="show_dados_tarif(\''.$contador.'\')" style="cursor:pointer;"><h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;width: 100%;margin-bottom: 12px;">'.$nome_tarifario[$i]["nome"].' - '.$nome_tarifario[$i]["data_inicial"].' a '.$nome_tarifario[$i]["data_final"].' - '.($nome_tarifario[$i]["tipo"] == 0 ? 'Cotação' : 'Reserva').'</a> <a onclick="remove_div_tarifario_tarifa(\''.$contador.'\')" style="cursor: pointer;"><i class="fas fa-trash-alt" style="float: right;color: #e01717;"></i></a></h4> <div class="div_dados_tarifario_nome'.$contador.'" data-control-name="nome_tarifario" style="width: 46%;margin-right: 4%;display: none;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Nome</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="nome_tarifario" class="widefat cx-ui-text" name="nome_tarifario'.$contador.'" value="'.$nome_tarifario[$i]["nome"].'" placeholder="" autocomplete="off"></div></div></div><div class="div_dados_tarifariotipo'.$contador.'" style="width: 50%;display: none;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Tipo</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container " style="padding-top:6px"><div class="cx-radio-group"><div class="cx-radio-item"><input type="radio" class="cx-radio-input" id="tipo_tarifario-'.$contador.'a" name="tipo_tarifario'.$contador.'" value="0" '.($nome_tarifario[$i]["tipo"] == 0 ? 'checked' : '').'><label style="margin-right:4%" for="tipo_tarifario-'.$contador.'a"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Cotação</span></label> <input type="radio" class="cx-radio-input" id="tipo_tarifario-'.$contador.'b" name="tipo_tarifario'.$contador.'" value="1" '.($nome_tarifario[$i]["tipo"] == 1 ? 'checked' : '').'><label for="tipo_tarifario-'.$contador.'b"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Reserva</span></label> </div><div class="clear"></div></div></div></div></div><div class="div_dados_tarifariomoeda'.$contador.'" data-control-name="moeda" style="width: 25%;margin-right: 4%;display:none"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Moeda</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><div class="cx-ui-select-wrapper"><select id="moeda" class="cx-ui-select" name="moeda'.$contador.'" size="1" data-filter="false" data-placeholder="" style="width: 100%"> <option value="" '.($nome_tarifario[$i]["moeda"] == '' ? 'selected' : '').'>Selecione...</option> <option value="R$" '.($nome_tarifario[$i]["moeda"] == 'R$' ? 'selected' : '').'>R$ - Real</option><option value="AU$" '.($nome_tarifario[$i]["moeda"] == 'AU$' ? 'selected' : '').'>AU$ - Dólar australiano</option><option value="GBP" '.($nome_tarifario[$i]["moeda"] == 'GBP' ? 'selected' : '').'>GBP - Libra esterlina</option><option value="$" '.($nome_tarifario[$i]["moeda"] == '$' ? 'selected' : '').'>$ - Dólar canadense</option><option value="USD" '.($nome_tarifario[$i]["moeda"] == 'USD' ? 'selected' : '').'>USD - Dólar americano</option><option value="EUR" '.($nome_tarifario[$i]["moeda"] == 'EUR' ? 'selected' : '').'>EUR - Euro</option></select></div></div></div></div><div class="div_dados_tarifario_dataini'.$contador.'" data-control-name="data_inicial" style="margin-right: 4%;width: 30%;display:none"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Data Inicial</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="data_inicial'.$contador.'" class="widefat cx-ui-text" name="data_inicial'.$contador.'" value="'.$nome_tarifario[$i]["data_inicial"].'" placeholder="" autocomplete="off"></div></div></div><div class="div_dados_tarifario_datafim'.$contador.'" data-control-name="data_final" style="width: 30%;display:none;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Data final</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="data_final'.$contador.'}" class="widefat cx-ui-text" name="data_final'.$contador.'" value="'.$nome_tarifario[$i]["data_final"].'" placeholder="" autocomplete="off"></div></div></div> 

                        <div class="div_dados_tarifariotipo'.$contador.'" style="width: 50%;display: none;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Tipo do período</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container " style="padding-top:6px"><div class="cx-radio-group"><div class="cx-radio-item"><input type="radio" class="cx-radio-input" name="tipo_periodo'.$contador.'" id="tipo_periodo-'.$contador.'a" value="0" '.($nome_tarifario[$i]["tipo_periodo"] == 0 ? 'checked' : '').'><label for="tipo_periodo-'.$contador.'a" style="margin-right:4%"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Especial</span></label> <input type="radio" class="cx-radio-input" name="tipo_periodo'.$contador.'" value="1" id="tipo_periodo-'.$contador.'b" '.($nome_tarifario[$i]["tipo_periodo"] == 1 ? 'checked' : '').'><label for="tipo_periodo-'.$contador.'b"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Regular</span></label> </div><div class="clear"></div></div></div></div></div>

                         </div>';

                }
            }
            
            echo $retorno;
        }

        add_action( 'wp_ajax_list_dados_roteiro', 'list_dados_roteiro' );
        add_action( 'wp_ajax_nopriv_list_dados_roteiro', 'list_dados_roteiro' ); 

        function list_dados_roteiro() {
            $id = $_POST['id'];   

            $retorno = ' 
            <div class="cx-ui-kit cx-control cx-control-radio" data-control-name="tipo_roteiro" style="max-width: 49% !important;flex: 0 0 46% !important;">
                <div class="cx-control__info" style="margin-right:-37px">
                    <div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Tipo</div>
                    <div class="cx-ui-kit__description cx-control__description" role="note" style="display:none">Name: tipo_roteiro</div>
                </div>
                <div class="cx-ui-kit__content cx-control__content" role="group">
                    <div class="cx-ui-container "><div class="cx-radio-group" style="display:flex; margin-right: -65%;"><div class="cx-radio-item" style="margin-right: 10px;"><input type="radio" id="tipo_roteiro-0" class="cx-radio-input" name="tipo_roteiro" value="0"><label for="tipo_roteiro-0"><span class="cx-lable-content"><span class="cx-radio-item" style="margin-right: 10px;"><i></i></span>Aéreo e terrestre</span></label> </div><div class="cx-radio-item" style="margin-right: 10px;"><input type="radio" id="tipo_roteiro-1" class="cx-radio-input" name="tipo_roteiro" checked="checked" value="1"><label for="tipo_roteiro-1"><span class="cx-lable-content"><span class="cx-radio-item" style="margin-right: 10px;"><i></i></span>Somente terrestre</span></label> </div><div class="clear"></div></div></div></div>
                </div>
                <div class="cx-ui-kit cx-control cx-control-text cx-control-hidden" data-control-name="valor_taxa" style="max-width: 18% !important;flex: 0 0 24% !important;">
                <div class="cx-control__info">
                <div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Taxas</div>
                <div class="cx-ui-kit__description cx-control__description" role="note" style="display:none">Name: valor_taxa</div>
                </div>
                <div class="cx-ui-kit__content cx-control__content" role="group">
                <div class="cx-ui-container "><input type="text" id="valor_taxa" class="widefat cx-ui-text money" name="valor_taxa" value="'.get_post_meta( $id, 'valor_taxa', true).'" placeholder="" autocomplete="off" maxlength="13"></div></div>
                </div>
                <div class="cx-ui-kit cx-control cx-control-stepper" data-control-name="dias" style="max-width: 16% !important;flex: 0 0 17% !important;">
                <div class="cx-control__info">
                <div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Dias</div>
                <div class="cx-ui-kit__description cx-control__description" role="note" style="display:none">Name: dias</div>
                </div>
                <div class="cx-ui-kit__content cx-control__content" role="group">
                <div class="cx-ui-container "><div class="cx-ui-stepper"><input type="number" id="dias" class="cx-ui-stepper-input" pattern="[0-5]+([\.,][0-5]+)?" name="dias" value="'.get_post_meta( $id, 'dias', true).'" min="" max="" step="1" placeholder=""></div></div></div>
                </div>
                <div class="cx-ui-kit cx-control cx-control-stepper" data-control-name="noites" style="max-width: 16% !important;flex: 0 0 17% !important;">
                <div class="cx-control__info">
                <div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Noites</div>
                <div class="cx-ui-kit__description cx-control__description" role="note" style="display:none">Name: noites</div>
                </div>
                <div class="cx-ui-kit__content cx-control__content" role="group">
                <div class="cx-ui-container "><div class="cx-ui-stepper"><input type="number" id="noites" class="cx-ui-stepper-input" pattern="[0-5]+([\.,][0-5]+)?" name="noites" value="'.get_post_meta( $id, 'noites', true).'" min="" max="" step="1" placeholder=""></div></div></div>
                </div>
                <div class="cx-ui-kit cx-control cx-control-text" data-control-name="nome">
                    <div class="cx-control__info">
                        <div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Nome</div>
                        <div class="cx-ui-kit__description cx-control__description" role="note" style="display:none">Name: nome</div>
                    </div>
                    <div class="cx-ui-kit__content cx-control__content" role="group">
                        <div class="cx-ui-container "><input type="text" id="nome" class="widefat cx-ui-text" name="nome" value="'.get_post_meta( $id, 'nome', true).'" placeholder="" autocomplete="off"></div>
                    </div>
                </div>
                <div class="cx-ui-kit cx-control cx-control-text" data-control-name="destino">
                <div class="cx-control__info">
                <div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Destino</div>
                <div class="cx-ui-kit__description cx-control__description" role="note" style="display:none">Name: destino</div>
                </div>
                <div class="cx-ui-kit__content cx-control__content" role="group">
                <div class="cx-ui-container "><input type="text" id="destino" class="widefat cx-ui-text" name="destino" value="'.get_post_meta( $id, 'destino', true).'" placeholder="" autocomplete="off"></div></div>
                </div>
                <div class="cx-ui-kit cx-control cx-control-media" data-control-name="imagem">
                <div class="cx-control__info">
                <div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Imagem</div>
                <div class="cx-ui-kit__description cx-control__description" role="note" style="display:none">Name: imagem</div>
                </div>
                <div class="cx-ui-kit__content cx-control__content" role="group">
                <div class="cx-ui-container "><div class="cx-ui-media-wrap"><div class="cx-upload-preview"><div class="cx-all-images-wrap ui-sortable"><div class="cx-image-wrap cx-image-wrap--image ui-sortable-handle"><div class="inner"><div class="preview-holder" data-id-attr="860" data-url-attr="https://site02.traveltec.com.br/wp-content/uploads/2021/07/93ad5f42d80dda226adde1f24f2f7564.jpg"><div class="centered"><img src="https://site02.traveltec.com.br/wp-content/uploads/2021/07/93ad5f42d80dda226adde1f24f2f7564-150x150.jpg" alt=""></div></div><span class="title">93ad5f42d80dda226adde1f24f2f7564</span><a class="cx-remove-image" href="#" title=""><i class="dashicons dashicons-no"></i></a></div></div></div></div><div class="cx-element-wrap"><input type="hidden" id="imagem" class="cx-upload-input" name="imagem" value="860" data-ids-attr="860"><button type="button" class="upload-button cx-upload-button button-default_" value="Choose Media" data-title="Choose Media" data-multi-upload="" data-library-type="" data-value-format="id">Choose Media</button><div class="clear"></div></div></div></div></div>
                </div>';
            
            echo $retorno;
        }
    /* FIM CODES SCRIPTS AJAX */

    add_action('publish_roteirostec', 'test_publish_post', 10, 2);
    function test_publish_post($post_id, $post){  

        $array_dados_tarifas = [];
        $array_dados_tarifas_ptt = [];
        if(!empty($_POST['nome_tarifario2500'])){
            $array_dados_tarifas[] = array("nome" => $_POST['nome_tarifario2500'], "tipo" => $_POST['tipo_tarifario2500'], "moeda" => $_POST['moeda2500'], "data_inicial" => $_POST['data_inicial2500'], "data_final" => $_POST['data_final2500']);
            $array_dados_tarifas_ptt[] = array("nome_tarifario" => $_POST['nome_tarifario2500'], "tipo_tarifario" => $_POST['tipo_tarifario2500'], "moeda_tarifario" => $_POST['moeda2500'], "data_inicial_tarifario" => $_POST['data_inicial2500'], "data_final_tarifario" => $_POST['data_final2500'], "tipo_periodo" => $_POST['tipo_periodo2500']);
        }
        for ($i=1; $i < 50; $i++) { 
            if(!empty($_POST['nome_tarifario'.$i])){
                $array_dados_tarifas[] = array("nome" => $_POST['nome_tarifario'.$i], "tipo" => $_POST['tipo_tarifario'.$i], "moeda" => $_POST['moeda'.$i], "data_inicial" => $_POST['data_inicial'.$i], "data_final" => $_POST['data_final'.$i]);
                $array_dados_tarifas_ptt[] = array("nome_tarifario" => $_POST['nome_tarifario'.$i], "tipo_tarifario" => $_POST['tipo_tarifario'.$i], "moeda_tarifario" => $_POST['moeda'.$i], "data_inicial_tarifario" => $_POST['data_inicial'.$i], "data_final_tarifario" => $_POST['data_final'.$i], "tipo_periodo" => $_POST['tipo_periodo'.$i]);
            }
        } 
        update_post_meta( $post_id, 'dados_tarifas', serialize($array_dados_tarifas) ); 
        update_post_meta( $post_id, 'nome_tarifario_ptt', serialize($array_dados_tarifas_ptt) ); 

        $array_dados_tarifario = [];
        if(!empty($_POST['regime_roteiro2500'])){
            $array_dados_tarifario[] = array("tarifario" => array("tarifario_roteiro" => $_POST['tarifario_option2500'], "hotel_roteiro" => $_POST['hotel_roteiro2500'], "apto_roteiro" => $_POST['apto_roteiro2500'], "regime_roteiro" => $_POST['regime_roteiro2500'], "min_diarias" => $_POST['min_diarias2500'], "pax" => $_POST['pax2500'], "bloqueio" => $_POST['bloqueio2500'], "valor_dom" => $_POST['valor_dom2500'], "valor_seg" => $_POST['valor_seg2500'], "valor_ter" => $_POST['valor_ter2500'], "valor_qua" => $_POST['valor_qua2500'], "valor_qui" => $_POST['valor_qui2500'], "valor_sex" => $_POST['valor_sex2500'], "valor_sab" => $_POST['valor_sab2500'], "check_noite_extra" => $_POST['check_noite_extra2500'], "valor_extra_dom" => $_POST['valor_extra_dom2500'], "valor_extra_seg" => $_POST['valor_extra_seg2500'], "valor_extra_ter" => $_POST['valor_extra_ter2500'], "valor_extra_qua" => $_POST['valor_extra_qua2500'], "valor_extra_qui" => $_POST['valor_extra_qui2500'], "valor_extra_sex" => $_POST['valor_extra_sex2500'], "valor_extra_sab" => $_POST['valor_extra_sab2500'], "check_valor_pacote" => $_POST['check_valor_pacote2500'], "valor_pacote_single" => $_POST['valor_pacote_single2500'], "valor_pacote_double" => $_POST['valor_pacote_double2500'], "valor_pacote_triple" => $_POST['valor_pacote_triple2500'], "check_valor_padrao" => $_POST['check_valor_padrao2500'], "valor_padrao" => $_POST['valor_padrao2500'], "check_permite_crianca" => $_POST['check_permite_crianca2500'], "crianca1" => $_POST['crianca12500'], "crianca2" => $_POST['crianca22500'], "crianca3" => $_POST['crianca32500'])); 
        }
        for ($i=1; $i < 50; $i++) { 
            if(!empty($_POST['regime_roteiro'.$i])){
                $array_dados_tarifario[] = array("tarifario" => array("tarifario_roteiro" => $_POST['tarifario_option'.$i], "hotel_roteiro" => $_POST['hotel_roteiro'.$i], "apto_roteiro" => $_POST['apto_roteiro'.$i], "regime_roteiro" => $_POST['regime_roteiro'.$i], "min_diarias" => $_POST['min_diarias'.$i], "pax" => $_POST['pax'.$i], "bloqueio" => $_POST['bloqueio'.$i], "valor_dom" => $_POST['valor_dom'.$i], "valor_seg" => $_POST['valor_seg'.$i], "valor_ter" => $_POST['valor_ter'.$i], "valor_qua" => $_POST['valor_qua'.$i], "valor_qui" => $_POST['valor_qui'.$i], "valor_sex" => $_POST['valor_sex'.$i], "valor_sab" => $_POST['valor_sab'.$i], "check_noite_extra" => $_POST['check_noite_extra'.$i], "valor_extra_dom" => $_POST['valor_extra_dom'.$i], "valor_extra_seg" => $_POST['valor_extra_seg'.$i], "valor_extra_ter" => $_POST['valor_extra_ter'.$i], "valor_extra_qua" => $_POST['valor_extra_qua'.$i], "valor_extra_qui" => $_POST['valor_extra_qui'.$i], "valor_extra_sex" => $_POST['valor_extra_sex'.$i], "valor_extra_sab" => $_POST['valor_extra_sab'.$i], "check_valor_pacote" => $_POST['check_valor_pacote'.$i], "valor_pacote_single" => $_POST['valor_pacote_single'.$i], "valor_pacote_double" => $_POST['valor_pacote_double'.$i], "valor_pacote_triple" => $_POST['valor_pacote_triple'.$i], "check_valor_padrao" => $_POST['check_valor_padrao'.$i], "valor_padrao" => $_POST['valor_padrao'.$i], "check_permite_crianca" => $_POST['check_permite_crianca'.$i], "crianca1" => $_POST['crianca1'.$i], "crianca2" => $_POST['crianca2'.$i], "crianca3" => $_POST['crianca3'.$i]));
            }
        } 
        update_post_meta( $post_id, 'dados_tarifario', serialize($array_dados_tarifario) ); 
    } 

    function sort_array_tarifa($a, $b) {
        return $a["data"] > $b["data"];
    } 

    function sort_array_tarifario($a, $b) {
        return intval(str_replace(".", "", $a["valor_original_duplo"])) > intval(str_replace(".", "", $b["valor_original_duplo"]));
    }  

    function getUserEmail_func( $atts ) { 
        global $wpdb;  

        $id = $atts['pacote']; 
    $_SESSION['roteiro_id'] = $id;

        $post_id = $atts['pacote'];  

        $thumb_id = get_post_thumbnail_id($post_id);
        $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
        $url = $thumb_url[0];   

        $data = $wpdb->get_results( "SELECT * FROM wp_posts WHERE ID = '$post_id' AND post_status = 'publish'"); 

        if (!empty($data[0]->post_title)) { 
            $slug_roteiro = $data[0]->post_name;

            $data = $wpdb->get_results( "SELECT * FROM wp_postmeta WHERE post_id = '$post_id' AND meta_key = 'dados_tarifas'"); 

            $tarifario = unserialize(unserialize($data[0]->meta_value)); 

            if (!empty($tarifario)) { 

                $data_tarifario = $wpdb->get_results( "SELECT * FROM wp_postmeta WHERE post_id = '$post_id' AND meta_key = 'dados_tarifario'");

                $tarifario_valores  = unserialize(unserialize($data_tarifario[0]->meta_value));     

                $cat_terms_idade = get_terms(
                    array('regra'),
                    array(
                        'hide_empty'    => false,
                        'orderby'       => 'name',
                        'order'         => 'ASC',
                        'number'        => 400 //specify yours
                    )
                );

                $idade_min_inf = get_term_meta(39, 'term_idade_minima', true);
                $idade_max_inf = get_term_meta(39, 'term_idade_maxima', true);
                $idade_min_chd = get_term_meta(40, 'term_idade_minima', true);
                $idade_max_chd = get_term_meta(40, 'term_idade_maxima', true);
                $idade_min_chl = get_term_meta(41, 'term_idade_minima', true);
                $idade_max_chl = get_term_meta(41, 'term_idade_maxima', true); 

              $nome_roteiro = get_post_meta( $post_id, 'nome', true);
              $show_titulo = get_post_meta( $post_id, 'exibir-titulo', true);
                $termos = get_post_meta($post_id, 'termos-gerais', true);


                for ($i=0; $i < count($tarifario); $i++) { 
                    $data_inicial = $tarifario[$i]["data_inicial"];
                    $data_final = $tarifario[$i]["data_final"];
                    $periodo = $tarifario[$i]["nome"];
                    $tipo = $tarifario[$i]["tipo_periodo"];
                    $tipo_periodo = $tarifario[$i]["tipo_periodo"];
                    $moeda = $tarifario[$i]["moeda"];  
                    $passeios_roteiro = get_post_meta( $post_id, 'passeios-e-servicos', true);
                    $transporte_roteiro = get_post_meta( $post_id, 'transporte', true); 
                    $tipo_pacote = get_post_meta( $post_id, 'tipo_roteiro', true);
                    $observacoes_pacote = get_post_meta( $post_id, 'observacoes', true); 
                    $hotel_pacote = get_post_meta( $post_id, 'hotel', true); 

                    $dias = get_post_meta( $id, 'dias', true);
                    $noites = get_post_meta( $id, 'noites', true);

                    for ($x1=0; $x1 < count($tarifario_valores); $x1++) {  
                        $tipo_diarias = get_post_meta( $id, 'pacote', true);
                        if($tipo_diarias == 0){
                            if(!empty($tarifario_valores[$x1]["tarifario"]["valor_pacote_double"]) || $tarifario_valores[$x1]["tarifario"]["valor_pacote_double"] != 0){
                                $valor_double[] = intval(str_replace(",", ".", str_replace(".", "", $tarifario_valores[$x1]["tarifario"]["valor_pacote_double"])));
                            }
                        }else{ 

                            $valor_double[] = min(array(intval(str_replace(",", ".", str_replace(".", "", $tarifario_valores[$x1]["tarifario"]["valor_dom"]))), intval(str_replace(",", ".", str_replace(".", "", $tarifario_valores[$x1]["tarifario"]["valor_seg"]))), intval(str_replace(",", ".", str_replace(".", "", $tarifario_valores[$x1]["tarifario"]["valor_ter"]))), intval(str_replace(",", ".", str_replace(".", "", $tarifario_valores[$x1]["tarifario"]["valor_qua"]))), intval(str_replace(",", ".", str_replace(".", "", $tarifario_valores[$x1]["tarifario"]["valor_qui"]))), intval(str_replace(",", ".", str_replace(".", "", $tarifario_valores[$x1]["tarifario"]["valor_sex"]))), intval(str_replace(",", ".", str_replace(".", "", $tarifario_valores[$x1]["tarifario"]["valor_sex"])))));
                        }
                    }  

                    for ($x=0; $x < count($tarifario_valores); $x++) {  
                        if ((strcmp(strtolower(str_replace("-", "+", str_replace("---", "-", str_replace(" ", "-", str_replace("+", "-", trim($periodo)))))), strtolower(str_replace(" ", "-", str_replace("-", "+", str_replace("---", "-", str_replace("+", "-", trim($tarifario_valores[$x]["tarifario"]["tarifario_roteiro"]))))))) === 0)) {

                            $min_diarias = $tarifario_valores[$x]["tarifario"]["min_diarias"];
                            $pax = $tarifario_valores[$x]["tarifario"]["pax"];
                            $bloqueio = $tarifario_valores[$x]["tarifario"]["bloqueio"];

                            $valor_dom = $tarifario_valores[$x]["tarifario"]["valor_dom"];
                            $valor_seg = $tarifario_valores[$x]["tarifario"]["valor_seg"];
                            $valor_ter = $tarifario_valores[$x]["tarifario"]["valor_ter"];
                            $valor_qua = $tarifario_valores[$x]["tarifario"]["valor_qua"];
                            $valor_qui = $tarifario_valores[$x]["tarifario"]["valor_qui"];
                            $valor_sex = $tarifario_valores[$x]["tarifario"]["valor_sex"];
                            $valor_sab = $tarifario_valores[$x]["tarifario"]["valor_sex"];

                            //0 = pacote
                            //1 = diárias
                            $tipo_diarias = get_post_meta( $id, 'pacote', true);
                            if($tipo_diarias == 0){
                                $valor_pacote_single = $tarifario_valores[$x]["tarifario"]["valor_pacote_single"];
                                $valor_pacote_double = $tarifario_valores[$x]["tarifario"]["valor_pacote_double"];
                                $valor_pacote_triple = $tarifario_valores[$x]["tarifario"]["valor_pacote_triple"];  
                            }else{
                                $valor_pacote_single = 0;
                                $valor_pacote_double = 0;
                                $valor_pacote_triple = 0;
                            }

                            $check_noite_extra = $tarifario_valores[$x]["tarifario"]["check_noite_extra"];
                            if($check_noite_extra == 0){
                                $valor_extra_dom = 0;
                                $valor_extra_seg = 0;
                                $valor_extra_ter = 0;
                                $valor_extra_qua = 0;
                                $valor_extra_qui = 0;
                                $valor_extra_sex = 0;
                                $valor_extra_sab = 0;
                            }else{
                                $valor_extra_dom = explode(",", $tarifario_valores[$x]["tarifario"]["valor_extra_dom"]);
                                $valor_extra_seg = explode(",", $tarifario_valores[$x]["tarifario"]["valor_extra_seg"]);
                                $valor_extra_ter = explode(",", $tarifario_valores[$x]["tarifario"]["valor_extra_ter"]);
                                $valor_extra_qua = explode(",", $tarifario_valores[$x]["tarifario"]["valor_extra_qua"]);
                                $valor_extra_qui = explode(",", $tarifario_valores[$x]["tarifario"]["valor_extra_qui"]);
                                $valor_extra_sex = explode(",", $tarifario_valores[$x]["tarifario"]["valor_extra_sex"]);
                                $valor_extra_sab = explode(",", $tarifario_valores[$x]["tarifario"]["valor_extra_sab"]);
                            }

                            $check_valor_padrao = $tarifario_valores[$x]["tarifario"]["check_valor_padrao"];
                            $valor_padrao = $tarifario_valores[$x]["tarifario"]["valor_padrao"];

                            $valor = min($valor_double);

                            $check_permite_crianca = $tarifario_valores[$x]["tarifario"]["check_permite_crianca"];
                            $crianca1 = $tarifario_valores[$x]["tarifario"]["crianca1"];
                            $crianca2 = $tarifario_valores[$x]["tarifario"]["crianca2"];
                            $crianca3 = $tarifario_valores[$x]["tarifario"]["crianca3"]; 

                            $bloco_tarifario[date("d-m-Y", strtotime(implode("-", array_reverse(explode("/", $data_inicial)))))][] = array(
                                "data_inicial" => $data_inicial, 
                                "data_final" => $data_final,  
                                "tipo_periodo" => $tipo_periodo,  
                                "tipo_tarifario" => $tipo, 
                                "nome_tarifario" => $periodo, 
                                "termos" => $termos,
                                "dias" => $dias, 
                                "noites" => $noites, 
                                "moeda" => $moeda,  
                                "bloqueio" => $bloqueio,  
                                "pax" => $pax,  
                                "min_diarias" => $min_diarias,  
                                "passeios_roteiro" => $passeios_roteiro,  
                                "transporte_roteiro" => $transporte_roteiro,   
                                "tipo_pacote" => $tipo_pacote,   
                                "observacoes_pacote" => $observacoes_pacote, 
                                "hotel_pacote" => $hotel_pacote, 
                                "idademininf" => $idade_min_inf, 
                                "idademaxinf" => $idade_max_inf,  
                                "idademinchd" => $idade_min_chd, 
                                "idademaxchd" => $idade_max_chd,  
                                "idademinchl" => $idade_min_chl, 
                                "idademaxchl" => $idade_max_chl,  
                                "hotel_roteiro" => $tarifario_valores[$x]["tarifario"]["hotel_roteiro"], 
                                "distancia" => $tarifario_valores[$x]["tarifario"]["distancia"], 
                                "lotado" => $tarifario_valores[$x]["tarifario"]["lotado"], 
                                "consulta" => $tarifario_valores[$x]["tarifario"]["consulta"], 
                                "apto_roteiro" => $tarifario_valores[$x]["tarifario"]["apto_roteiro"], 
                                "regime_roteiro" => $tarifario_valores[$x]["tarifario"]["regime_roteiro"],  
                                "taxa_embarque_roteiro" => get_post_meta( $post_id, 'valor_taxas', true),  
                                "valor_dom" => $valor_dom, 
                                "valor_seg" => $valor_seg, 
                                "valor_ter" => $valor_ter, 
                                "valor_qua" => $valor_qua, 
                                "valor_qui" => $valor_qui, 
                                "valor_sex" => $valor_sex, 
                                "valor_sab" => $valor_sab,   
                                "valor_extra_dom" => $valor_extra_dom, 
                                "valor_extra_seg" => $valor_extra_seg, 
                                "valor_extra_ter" => $valor_extra_ter, 
                                "valor_extra_qua" => $valor_extra_qua, 
                                "valor_extra_qui" => $valor_extra_qui, 
                                "valor_extra_sex" => $valor_extra_sex, 
                                "valor_extra_sab" => $valor_extra_sab,  
                                "tipo_diarias" => $tipo_diarias,  
                                "valor_pacote_single" => $valor_pacote_single,  
                                "valor_pacote_double" => $valor_pacote_double,  
                                "valor_pacote_triple" => $valor_pacote_triple,  
                                "check_noite_extra" => $check_noite_extra,  
                                "check_valor_padrao" => $check_valor_padrao,  
                                "valor_padrao" => $valor_padrao,  
                                "check_permite_crianca" => $check_permite_crianca,  
                                "crianca1" => $crianca1,  
                                "crianca2" => $crianca2,  
                                "crianca3" => $crianca3,  
                                "tarifario" => $tarifario_valores[$x]["tarifario"]
                            );

                        }
                    } 

                    if (empty($bloco_tarifario[date("d-m-Y", strtotime(implode("-", array_reverse(explode("/", $data_inicial)))))])) {
                        $valor = 0;
                    }  

                    $dados[$data_inicial] = array("data" => date("Y-m-d", strtotime(implode("-", array_reverse(explode("/", $data_inicial))))), "dias" => $dias.' dias '.$noites.' noites', "noites" => $noites, "tipo_periodo" => $tipo_periodo, "periodo" => $periodo, "datas" => $data_inicial.' a '.$data_final, "moeda" => $moeda, "nome_roteiro" => $nome_roteiro, "show_titulo" => $show_titulo, "passeios_roteiro" => $passeios_roteiro,  "transporte_roteiro" => $transporte_roteiro, "valor" => $valor, "tarifario" => $bloco_tarifario[date("d-m-Y", strtotime(implode("-", array_reverse(explode("/", $data_inicial)))))]["tarifario"], "tarifario_exibicao" => $bloco_tarifario[date("d-m-Y", strtotime(implode("-", array_reverse(explode("/", $data_inicial)))))]);
				//print_r($dados);
                }

                $blocos = array_values($dados); 
                
                usort($blocos, "sort_array_tarifa"); 

                $retorno = '';      

                $retorno .= '<div class="elementor-section-wrap">';

                $retorno .= '<style> 
                    .input-group{
                        display: flex !important;
                    }
                    .input-group-prepend{
                            padding: 10px !important;
                    } 
                    @media (max-width: 750px) { 
                        .celular{
                            display: block!important;
                        }
                        .computador{
                            display: none!important;
                        }
                        .center{
                            padding: 0px !important;
                            text-align:center !important;
                        }
                        .center li{
                            list-style: none !important;
                        } 
                        .padding{
                            padding-left: 15px !important;
                        }
                        .btn-ver-tarifas{
                            float: right;
                        }
                        .h2nome{
                            font-size: 18px !important;
                            margin-top: 0px !important;
                        }
                        .no-padding{
                            padding: 0px !important;
                        }
                        .font-i{
                            font-size: 30px !important;
                        }
                        .h2periodo{
                            font-size: 16px !important;
                        }
                        .padding-r{
                            padding-right: 0px !important;
                        }
                        .bdr-top{
                            border-bottom: 1px solid #ececec !important;
                        }
                        .inibe_botao{
                            width: 100% !important;
                        }
                        .displaycelular{
                            display:none;
                        }
                        .displaypc{
                            display:none !important;
                        }
                    } 
                        .displaycelular{
                            display:flex;
                        }
                        .displaypc{
                            display:flex;
                        }
                    .celular{
                        display: none;
                    }
                    .computador{
                        display: block;
                    }
                    .padding{
                        padding-left: 0;
                    }
                    .center{
                        padding: 0px 0px 0px 20px;
                        text-align:left;
                    }
                    .btn-tarifa-visualizar{
                        background-color:#2ba936 !important;
                        color:#fff !important;
                    }
                    .btn-tarifa-visualizar:hover{
                        background-color:#137e18 !important;
                        color:#fff !important;
                    }
                    .btn-visualizar-tarifa{
                            background-color: #137e18!important;
                        color: #fff!important;
                        border: 1px solid #137e18;
                    }
                    .btn-visualizar-tarifa:hover{
                        background-color:#2ba936 !important;
                        color:#fff !important;
                        border: 1px solid #2ba936;
                    }
                    .swal-text{
                        text-align:center !important;
                    }
                    .swal-footer{
                        text-align:center !important;
                    }
                    .swal-button--confirm {
                        background-color: #137e18 !important;   
                        border-color: #137e18 !important;   
                    }
                    .swal-button--confirm:hover {
                        background-color: #137e18 !important;   
                        border-color: #137e18 !important;   
                    }

                    .qty .count, .qty .count1, .qty .count2, .qty .count3, .qty .count4, .qty .count5, .qty .count6, .qty .count7, .qty .count8, .qty .count9, .qty .count10, .qty .countQ, .qty .countC, .qty .countC1, .qty .countC2, .qty .countC3, .qty .countC4, .qty .countC5, .qty .countC6, .qty .countC7, .qty .countC8, .qty .countC9, .qty .countC10 {
                        color: #000;
                        display: inline-block;
                        vertical-align: top;
                        font-size: 21px;
                        font-weight: 700;
                        line-height: 22px;
                        padding: 0 2px;
                        min-width: 35px;
                        text-align: center;
                    }
                    .qty .plus, .qty .plus1, .qty .plus2, .qty .plus3, .qty .plus4, .qty .plus5, .qty .plus6, .qty .plus7, .qty .plus8, .qty .plus9, .qty .plus10, .qty .plusQ, .qty .plusC, .qty .plusC1, .qty .plusC2, .qty .plusC3, .qty .plusC4, .qty .plusC5, .qty .plusC6, .qty .plusC7, .qty .plusC8, .qty .plusC9, .qty .plusC10 {
                        cursor: pointer;
                        display: inline-block;
                        vertical-align: top;
                        color: white;
                        width: 20px;
                        height: 20px;
                        font: 19px/1 Arial,sans-serif;
                        text-align: center;
                        border-radius: 0;
                        }
                    .qty .minus, .qty .minus1, .qty .minus2, .qty .minus3, .qty .minus4, .qty .minus5, .qty .minus6, .qty .minus7, .qty .minus8, .qty .minus9, .qty .minus10, .qty .minusQ, .qty .minusC, .qty .minusC1, .qty .minusC2, .qty .minusC3, .qty .minusC4, .qty .minusC5, .qty .minusC6, .qty .minusC7, .qty .minusC8, .qty .minusC9, .qty .minusC10 {
                            cursor: pointer;
                        display: inline-block;
                        vertical-align: top;
                        color: white;
                        width: 20px;
                        height: 20px;
                        font: 19px/1 Arial,sans-serif;
                        text-align: center;
                        border-radius: 0;
                        background-clip: padding-box;
                    } 
                    .minus:hover{
                        background-color: #717fe0 !important;
                    }
                    .plus:hover{
                        background-color: #717fe0 !important;
                    }
                    /*Prevent text selection*/
                    span{
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                    }
                    input{  
                        border: 0;
                        width: 2%;
                    }
                    nput::-webkit-outer-spin-button,
                    input::-webkit-inner-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                    }
                    input:disabled{
                        background-color:white;
                    }
         
                </style>';
                $retorno .= '<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>'; 
 
                if($show_titulo === "true"){
                    $retorno .= '<section class="elementor-section elementor-top-section elementor-element elementor-element-4066ccd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4066ccd" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-10 elementor-top-column elementor-element elementor-element-0973bc7" data-id="0973bc7" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated" style="background-color: #f9f9f9;">
                                    <div class="elementor-element elementor-element-8d6b5de elementor-widget elementor-widget-heading" data-id="8d6b5de" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default" style="text-align:center;"><strong> <i class="fa fa-map"></i> </strong> </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-80 elementor-top-column elementor-element elementor-element-0973bc7" data-id="0973bc7" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated" style="background-color: #f9f9f9;">
                                    <div class="elementor-element elementor-element-8d6b5de elementor-widget elementor-widget-heading" data-id="8d6b5de" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default" style="    text-align: left;"><strong> '.$nome_roteiro.'</strong> </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-10 elementor-top-column elementor-element elementor-element-0973bc7" data-id="0973bc7" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated" style="background-color: #f9f9f9;">
                                    <div class="elementor-element elementor-element-8d6b5de elementor-widget elementor-widget-heading" data-id="8d6b5de" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default"><a onclick="see_tarifas(\''.$post_id.'\', \''.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'\')"><button class="elementor-button elementor-size-sm '.$post_id.'_bloco_tarifas_button button_blocos_tarifas" style="float: right;background-color: #137e18;color: #fff;font-size: 14px;padding: 6px 18px;"><p style="margin-bottom: 0;display: flex;border: 1px solid #137e18 !important">Reservar <i class="fa fa-arrow-down" style="margin-left: 7px;"></i></p></button></a></h2>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>';
                }
                $retorno .= '<section class="elementor-section elementor-top-section elementor-element elementor-element-217f2bb elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default bloco_tarifas '.$post_id.'_bloco_tarifas"
                data-id="217f2bb"
                data-element_type="section" style="'.($show_titulo === "true" ? 'display:none' : '').'">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-34d8d38" data-id="34d8d38" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-058b8d6 elementor-view-default elementor-widget elementor-widget-icon" data-id="058b8d6" data-element_type="widget" data-widget_type="icon.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-wrapper">
                                            <div class="elementor-icon">
                                                <i aria-hidden="true" class="fa fa-calendar-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-8186b4c" data-id="8186b4c" data-element_type="column" style="display:flex;" id="scroll">
                            <div class="elementor-widget-wrap elementor-element-populated" style="display:flex;">
                                <div class="elementor-element elementor-element-2bb2bc5 elementor-widget elementor-widget-heading" data-id="2bb2bc5" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title elementor-size-default h2line" style="    text-align: left;">Tarifas disponíveis para o(s) período(s) abaixo</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>';  

                for ($i=0; $i < count($blocos); $i++) {  
                    $datas = explode(" a ", $blocos[$i]["datas"]);
                    $data_inicial = implode("-", array_reverse(explode("-", $blocos[$i]["data"])));

                    for ($x=0; $x < count($bloco_tarifario[$data_inicial]); $x++) { 
                        $valor_adotado[$data_inicial][] = str_replace(".", "", $bloco_tarifario[$data_inicial][$x]["valor_original_duplo"]);
                    } 
                    
                } 

                for ($i=0; $i < count($blocos); $i++) {  
                    $datas = explode(" a ", $blocos[$i]["datas"]);
                    $data_inicial = implode("-", array_reverse(explode("-", $blocos[$i]["data"])));
                    $valor = min($valor_adotado[$data_inicial]);

                    $data_agrupamento[] = $datas[0]; 
                    $data_final_agrupamento[] = $datas[1]; 
                    $nome_periodo_agrupamento[] = $blocos[$i]["tipo_periodo"]; 
                    $periodo_agrupamento[] = $blocos[$i]["periodo"]; 
                }

                    $novasDatas = array();
                    for ($y=0; $y < count($data_agrupamento); $y++) { 
                        $mesAno = explode('/', $data_agrupamento[$y]);
                        $novasDatasIniciais[$mesAno[1]. '-' .$mesAno[2]][] = $data_agrupamento[$y];
                        $novasDatasFinais[$mesAno[1]. '-' .$mesAno[2]][] = $data_final_agrupamento[$y];
                        $novasDatasPeriodos[$mesAno[1]. '-' .$mesAno[2]][] = $nome_periodo_agrupamento[$y];

                        $DatasIniciaisTravarCalendario[] = $data_agrupamento[$y];
                        $DatasFinaisTravarCalendario[] = $data_final_agrupamento[$y];
                        $PeriodosTravarCalendario[] = $nome_periodo_agrupamento[$y];
                        $NomePeriodosTravarCalendario[] = $periodo_agrupamento[$y];
                    } 

                $cnt = 0;
                for ($i=0; $i < count($blocos); $i++) {  
                    $datas = explode(" a ", $blocos[$i]["datas"]);
                    $data_inicial = implode("-", array_reverse(explode("-", $blocos[$i]["data"])));
                    $valor = min($valor_adotado[$data_inicial]);

                    $data_inicial_bloco[] = $datas[0];
                    $data_final_bloco[] = $datas[1];

                    $agrupamento_datas_iniciais[date("m-Y", strtotime(implode("-", array_reverse(explode("/", $datas[0])))))] = $datas[0];

                    $retorno .= '<section class="elementor-section elementor-top-section elementor-element elementor-element-af3560b elementor-section-boxed elementor-section-height-default elementor-section-height-default '.$post_id.'_bloco_tarifas bloco_tarifas"
                        data-id="af3560b"
                        data-element_type="section"
                        data-settings=\'{"background_background":"classic"}\' style="'.($show_titulo === "true" ? 'display:none' : '').'">
                        <div class="elementor-container elementor-column-gap-default"> 
                            <div class="elementor-column elementor-col-40 elementor-top-column elementor-element elementor-element-3dc8ae1 displaycelular" data-id="3dc8ae1" data-element_type="column" data-settings=\'{"background_background":"classic"}\'>
                                <div class="elementor-widget-wrap elementor-element-populated" style="display:flex;">
                                    <div class="elementor-element elementor-element-1f0a873 elementor-widget elementor-widget-heading" data-id="1f0a873" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container" style="text-align:center">
                                            <h2 class="elementor-heading-title elementor-size-default h2line">'.$blocos[$i]["datas"].'</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-0377e14 displaycelular" data-id="0377e14" data-element_type="column" data-settings=\'{"background_background":"classic"}\' style="">
                                <div class="elementor-widget-wrap elementor-element-populated" style="display:flex;">
                                    <div class="elementor-element elementor-element-82cda83 elementor-widget elementor-widget-heading" data-id="82cda83" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default h2line">'.$blocos[$i]["periodo"].'</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-40 elementor-top-column elementor-element elementor-element-0377e14 displaycelular" data-id="0377e14" data-element_type="column" data-settings=\'{"background_background":"classic"}\'>
                                <div class="elementor-widget-wrap elementor-element-populated" style="display:flex;">
                                    <div class="elementor-element elementor-element-82cda83 elementor-widget elementor-widget-heading" data-id="82cda83" data-element_type="widget" data-widget_type="heading.default" style="padding-top:7px;">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default h2line"> '.($blocos[$i]["valor"] == 0 ? 'Sob consulta' : 'a partir de '.$blocos[$i]["valor"].',').' <a onclick="see_tarifa_periodo(\''.$post_id.'\', \''.str_replace("/", "-", $datas[0]).'\')"><button class="elementor-button elementor-size-sm '.$post_id.'_bloco_tarifas_button button_blocos_tarifas" style="float: right;background-color: #137e18;color: #fff;font-size: 14px;padding: 6px 7px;"><p style="margin-bottom: 0;display: flex;border:1px solid #137e18 !important">$ <i class="fa fa-arrow-down" style="margin-left: 7px;"></i></p></button></a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-c950fd6 elementor-section-boxed elementor-section-height-default elementor-section-height-default '.$post_id.'_bloco_tarifas bloco_tarifas" data-id="c950fd6" data-element_type="section" style="'.($show_titulo === "true" ? 'display:none' : '').'">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1d66ea6" data-id="1d66ea6" data-element_type="column" data-settings=\'{"background_background":"classic"}\'>
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-11ee55d elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="11ee55d" data-element_type="widget" data-widget_type="divider.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-divider">
                                                <span class="elementor-divider-separator"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>'; 

                    $nome_periodo = explode(" ", $blocos[$i]["periodo"]); 

                        $tipo_periodo = $blocos[$i]["tipo_periodo"];
                            $retorno .= '<input type="hidden" class="1" id="data_form_inicial_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value="'.$datas[0].'">'; 
                            $retorno .= '<input type="hidden" class="1" id="data_form_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value="'.$datas[1].'">';

                            $retorno .= '<input type="hidden" class="1 data_form_inicial" value="'.date("d/m/Y").'">';
                            $retorno .= '<input type="hidden" class="1 data_form" value="'.date('d/m/Y', strtotime('+'.intval($blocos[$i]["noites"]).' days')).'">';

                            $data_inicial_form = date("d/m/Y");
                            $data_final_form = date('d/m/Y', strtotime('+'.intval($blocos[$i]["noites"]).' days')); 

                            $retorno .= '<input type="hidden" class="1" id="data_form_today_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value="'.date("d/m/Y").'">';

                    $retorno .= '<input type="hidden" class="1 datas_iniciais_calendario_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($DatasIniciaisTravarCalendario).'\'>';
                    $retorno .= '<input type="hidden" class="1 datas_finais_calendario_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($DatasFinaisTravarCalendario).'\'>';
                    $retorno .= '<input type="hidden" class="1 datas_periodos_calendario_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($PeriodosTravarCalendario).'\'>';
                    $retorno .= '<input type="hidden" class="1 nomes_periodos_calendario_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($NomePeriodosTravarCalendario).'\'>';
                    $retorno .= '<input type="hidden" class="1 nome_periodo_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.$blocos[$i]["periodo"].'\'>';
                    $retorno .= '<input type="hidden" class="1 nome_roteiro_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.$nome_roteiro.'\'>';


                    $retorno .= '<input type="hidden" class="1 tipo_periodo_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value="'.$tipo_periodo.'">';
                    $retorno .= '<input type="hidden" class="1 agrupamento_datas_iniciais_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($novasDatasIniciais[date("m-Y", strtotime(implode("-", array_reverse(explode("/", $datas[0])))))]).'\'>';
                    $retorno .= '<input type="hidden" class="1 agrupamento_datas_finais_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($novasDatasFinais[date("m-Y", strtotime(implode("-", array_reverse(explode("/", $datas[0])))))]).'\'>';
                    $retorno .= '<input type="hidden" class="1 agrupamento_datas_periodos_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($novasDatasPeriodos[date("m-Y", strtotime(implode("-", array_reverse(explode("/", $datas[0])))))]).'\'>'; 
                        $retorno .= '<input type="hidden" class="1 numero_do_post " value="'.$post_id.'">';

                        $retorno .= '<script>jQuery(document).ready(function(){  see_tarifas_inicial(\''.$post_id.'\', \''.str_replace("/", "-", $datas[0]).'\'); });</script>';

                    $dados_gerais = $bloco_tarifario[str_replace("/", "-", $datas[0])];  

                                    usort($dados_gerais, "sort_array_tarifario");  

                    $retorno .= '<input type="hidden" id="tipo_diarias_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value="'.$dados_gerais[0]["tipo_diarias"].'">';

                    $retorno .= '<div class="div_tarifario_data bloco_tarifas search_tarifas_'.$i.' form_tarifario_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" id="div_bloco_form_geral" style="display:none;">
                        <br>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-2c4879da elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="2c4879da"
                                data-element_type="section" id="bloco_form_data" style="background-color:#fff;width: 100%;margin: 0 auto;">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1fcfae48" data-id="1fcfae48" data-element_type="column" data-settings=\'{"background_background":"classic"}\'>
                                        <div class="elementor-widget-wrap elementor-element-populated" style="background-color:#b5b5b5;z-index: 2;">
                                            <div class="elementor-element elementor-element-339119e2 elementor-widget elementor-widget-jet-engine-booking-form" data-id="339119e2" data-element_type="widget" data-widget_type="jet-engine-booking-form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="jet-form layout-column submit-type-ajax" action="https://site02.traveltec.com.br/?jet_engine_action=book" method="POST" data-form-id="350">
                                                        <input class="jet-form__field hidden-field" type="hidden" name="_jet_engine_booking_form_id" value="350" data-field-name="_jet_engine_booking_form_id" />
                                                        <input class="jet-form__field hidden-field" type="hidden" name="_jet_engine_refer" value="https://site02.traveltec.com.br/exibicao-do-shortcode-roteiros" data-field-name="_jet_engine_refer" />
                                                        <div class="jet-form-row jet-form-row--submit jet-form-row--first-visible">
                                                            <div class="jet-form-col '.($dados_gerais[0]["tipo_diarias"] == 1 ? 'jet-form-col-2' : 'jet-form-col-5').' field-type-date jet-form-field-container" data-field="field_checkin" data-conditional="false">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text" style="color:#3e3e3e">Data Inicial<span class="jet-form__required">*</span></span>
                                                                </div> 
                                                                <input class="jet-form__field date-field date-field-checkin" required="required" name="field_checkin" type="text" data-field-name="field_checkin" id="field_checkin_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" readonly value="'.$data_inicial_form.'">
                                                            </div>';
                                                            if($dados_gerais[0]["tipo_diarias"] == 1){
                                                                $retorno .= '<div class="jet-form-col jet-form-col-2 field-type-date jet-form-field-container" data-field="field_checkout" data-conditional="false">
                                                                    <div class="jet-form__label">
                                                                        <span class="jet-form__label-text" style="color:#3e3e3e">Data final<span class="jet-form__required">*</span></span>
                                                                    </div> 
                                                                    <input class="jet-form__field date-field date-field-checkout" required="required" name="field_checkout" type="text" data-field-name="field_checkout" id="field_checkout_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value="'.$data_final_form.'" onchange="set_value(\''.$post_id.'\')" readonly>
                                                                </div>'; 
                                                            }
                                                            $retorno .= '<div class="jet-form-col jet-form-col-1 field-type-number jet-form-field-container" data-field="field_adt" data-conditional="false" style="color:#3e3e3e">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text" style="color:#3e3e3e">Adulto<span class="jet-form__required">*</span></span>
                                                                </div>
                                                                <input type="number" class="jet-form__field text-field" value="2" required="required" min="1" max="3" step="1" name="field_adt" data-field-name="field_adt" id="field_adt_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" onkeyup="check_value_adt(\''.$post_id.'\', \''.str_replace("/", "-", $datas[0]).'\')">
                                                            </div>

                                                            <div class="jet-form-col jet-form-col-1 field-type-number jet-form-field-container" data-field="field_chd" data-conditional="false" style="color:#3e3e3e">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text" style="color:#3e3e3e">Criança<span class="jet-form__required">*</span></span>
                                                                </div>
                                                                <input type="number" class="jet-form__field text-field" value="0" required="required" min="0" max="1" step="1" name="field_chd" data-field-name="field_chd" id="field_chd_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" onchange="check_value_chd(\''.$post_id.'\', \''.str_replace("/", "-", $datas[0]).'\')">
                                                            </div>

                                                            <div class="jet-form-col jet-form-col-3 field-type-select jet-form-field-container" data-field="field_idade" data-conditional="false" style="color:#3e3e3e">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text" style="color:#3e3e3e">Idade da Criança</span>
                                                                </div>
                                                                <select class="jet-form__field select-field" name="field_idade" data-field-name="field_idade" id="field_idade_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" disabled>
                                                                    <option value="">Selecione a idade</option>
                                                                    <option value="00" selected="">Até 1 ano</option>
                                                                    <option value="01">1 ano</option>
                                                                    <option value="02">2 anos</option>
                                                                    <option value="03">3 anos</option>
                                                                    <option value="04">4 anos</option>
                                                                    <option value="05">5 anos</option>
                                                                    <option value="06">6 anos</option>
                                                                    <option value="07">7 anos</option>
                                                                    <option value="08">8 anos</option>
                                                                    <option value="09">9 anos</option>
                                                                    <option value="10">10 anos</option>
                                                                    <option value="11">11 anos</option>
                                                                    <option value="12">12 anos</option>
                                                                </select>
                                                            </div>'; 

                                                            $retorno .= '<div class="jet-form-col '.($dados_gerais[0]["tipo_diarias"] == 1 ? 'jet-form-col-3' : 'jet-form-col-7').' field-type-submit jet-form-field-container" data-field="Submit" data-conditional="false">
                                                                <div class="jet-form__submit-wrap">
                                                                    
                                                                    <button class="jet-form__submit submit-type-ajax  btn-visualizar-tarifa" type="button" onclick="show_div_count_atualizar(\''.str_replace("/", "-", $datas[0]).'\', \''.$post_id.'\')">PESQUISAR</button>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="jet-form-row jet-form-row--hidden jet-form-row--first-visible">
                                                            <div class="jet-form-col jet-form-col-12 field-type-hidden jet-form-field-container" data-field="post_id" data-conditional="false">
                                                                <input class="jet-form__field hidden-field" type="hidden" name="post_id" value="799" data-field-name="post_id" />
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                                                <div id="open_div_room'.$post_id.'" style="background-color: rgb(255, 255, 255); min-height: 50px; width: 252px; position: absolute; padding: 13px; z-index: 2;top: 66px;left:17em;display:none">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-5"><label><strong style="font-size: 14px;font-weight: 500;font-family: \'Montserrat\';">Quartos</strong></label></div>
                                                                            <div class="col-7">
                                                                                <div class="qty " style="padding: 2px 0px;">
                                                                                    <span class="minusQ bg-dark">-</span>
                                                                                    <input type="number" class="countQ" name="qty" value="1" style="font-size: 17px;font-weight: 600;font-family: \'Montserrat\';">
                                                                                    <span class="plusQ bg-dark">+</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                        <div class="add_qtd_pax">
                                                                            <div class="row">
                                                                                <div class="col-12"><label><strong style="font-size: 13px;font-weight: 700;font-family: \'Montserrat\';">Quarto 1</strong></label></div>
                                                                                <div class="col-5"><label><strong style="font-size: 13px;font-weight: 500;font-family: \'Montserrat\';">Adultos</strong></label></div>
                                                                                <div class="col-7">
                                                                                    <div class="qty " style="padding: 2px 0px;">
                                                                                        <span class="minus1 bg-dark" onclick="minus_room(1)">-</span>
                                                                                        <input type="number" class="count1" name="qty" value="2" style="font-size: 17px;font-weight: 600;font-family: \'Montserrat\';">
                                                                                        <span class="plus1 bg-dark" onclick="plus_room(1)">+</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-5"><label><strong style="font-size: 13px;font-weight: 500;font-family: \'Montserrat\';">Crianças</strong></label></div>
                                                                                <div class="col-7">
                                                                                    <div class="qty " style="padding: 2px 0px;">
                                                                                        <span class="minusC1 bg-dark" onclick="minus_room_chd(1)">-</span>
                                                                                        <input type="number" class="countC1" name="qty" value="0" style="font-size: 17px;font-weight: 600;font-family: \'Montserrat\';">
                                                                                        <span class="plusC1 bg-dark" onclick="plus_room_chd(1)">+</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <hr>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                    </div>
                                </div>
                            </section>
                        </div>';
                    

                    $retorno .= '<input type="hidden" id="datas_inicial_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($data_inicial_bloco).'\'>';
                    $retorno .= '<input type="hidden" id="datas_final_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" value=\''.json_encode($data_final_bloco).'\'>';  

                    $cnt = $cnt+1; 

                    $transporte_roteiro = explode(" - ", $dados_gerais[0]["transporte_roteiro"]);
                    $transporte = $dados_gerais[0]["transporte_roteiro"];

                    $retorno .= '<div class="div_tarifario_data_'.str_replace("/", "-", $datas[0]).'_'.$post_id.' '.$post_id.'_bloco_tarifas_tarifario bloco_tarifas div_bloco_hotelaria_'.$post_id.'_'.$cnt.'" style="display:none">';
                            $retorno .= '<section class="elementor-section elementor-top-section elementor-element elementor-element-739dedd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="739dedd" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a56b981" data-id="a56b981" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding:10px 4px;">
                                            <div class="elementor-element elementor-element-fda57c5 elementor-widget elementor-widget-image" data-id="fda57c5" data-element_type="widget" data-widget_type="image.default">
                                                <div class="elementor-widget-container" style="text-align:justify">
                                                    <h2 class="elementor-heading-title elementor-size-default" style="font-size: 22px;color: #137e18;">'.$nome_roteiro.'</h2><br>'; 
                                                    if(!empty($dados_gerais[0]["transporte_roteiro"]) || !empty($dados_gerais[0]["hotel_pacote"]) || !empty($dados_gerais[0]["passeios_roteiro"]) || !empty($dados_gerais[0]["informacoes_pacote"])){
                                                        $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 13px;font-weight: 400;"><i>Valor do Pacote inclui:</i></h2>';
                                                    }
                                                    if(!empty($dados_gerais[0]["transporte_roteiro"])){
                                                        $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;line-height: 1.5;"><strong>Transporte:</strong> '.str_replace("u00c3u0094", " Ô", $dados_gerais[0]["transporte_roteiro"]).'</h2>';
                                                    }
                                                    if(!empty($dados_gerais[0]["hotel_pacote"])){
                                                        $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;line-height: 1.5;"><strong>Hotel:</strong> '.$dados_gerais[0]["hotel_pacote"].'</h2>';
                                                    }
                                                    if (!empty($dados_gerais[0]["passeios_roteiro"])) { 
                                                        $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;line-height: 1.5;"><strong>Passeios e Serviços:</strong> '.str_replace(" | ", " + ", $dados_gerais[0]["passeios_roteiro"]).'</h2>';
                                                    }
                                                    if (!empty($dados_gerais[0]["informacoes_pacote"])) { 
                                                        $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;margin-top: 6px; ">Informações: '.str_replace(" | ", " + ", $dados_gerais[0]["informacoes_pacote"]).'</h2>';
                                                    }
                                                    if (!empty($dados_gerais[0]["observacoes_pacote"])) { 
                                                        $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;margin-top: 6px; "><strong>Observações:</strong> '.str_replace("u00ed", "í", str_replace("u00e3", "ã", str_replace("u00e0", "à", str_replace("u00e1", "á", str_replace("u00fa", "ú",  str_replace("u00f4", "ô",  str_replace("u00e7", "ç",  str_replace("u00e9", "é", str_replace("u00a0", " ", $dados_gerais[0]["observacoes_pacote"]))))))))).'</h2>';
                                                    } 
                                                $retorno .= '</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>';


                                    $tipo_roteiro = get_post_meta( $post_id, 'tipo_roteiro', true);
                                    $pacote = str_replace("u00ed", "í", str_replace("u00e3", "ã", str_replace("u00e0", "à", str_replace("u00e1", "á", str_replace("u00fa", "ú",  str_replace("u00f4", "ô",  str_replace("u00e7", "ç",  str_replace("u00e9", "é", str_replace("u00a0", " ", $dados_gerais[0]["tipo_pacote"])))))))));
                                    $retorno .= '<div class="div_interno_tarifario_data_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">';
                                        for ($x=0; $x < count($dados_gerais); $x++) { 
                                            $dados_div_tarifario = $dados_gerais[$x];    
                                            $contador += 125;

                                            $id_hotel = $dados_div_tarifario["hotel_roteiro"]; 
                                            $id_apto = $dados_div_tarifario["apto_roteiro"];
                                            $id_regime = $dados_div_tarifario["regime_roteiro"]; 

                                            $imagem_hotel[$x] = get_term_meta($id_hotel, 'term_image', true);
                                            $style_imagem_hotel[$x] = '';
                                            if (empty($imagem_hotel[$x])) {
                                                $imagem_hotel[$x] = 0;
                                                $style_imagem_hotel[$x] = 'height:110px;';
                                            }

                                            $iss_hotel[$x] = intval(get_term_meta($id_hotel, 'iss', true));
                                            $taxas_hotel[$x] = intval(get_term_meta($id_hotel, 'taxas', true));
                                            $taxas_opcional_hotel[$x] = intval(get_term_meta($id_hotel, 'tx-opcional', true)); 

                                            $taxas_total[$x] = ($iss_hotel[$x]+$taxas_hotel[$x]+$taxas_opcional_hotel[$x]);

                                            $data_hotel = $wpdb->get_results( "SELECT * FROM wp_terms WHERE term_id = $id_hotel"); 
                                            $nome_hotel = $data_hotel[0]->name; 

                                            $data_apto = $wpdb->get_results( "SELECT * FROM wp_terms WHERE term_id = $id_apto"); 
                                            $nome_apto = $data_apto[0]->name;

                                            $data_regime = $wpdb->get_results( "SELECT * FROM wp_terms WHERE term_id = $id_regime"); 
                                            $nome_regime = $data_regime[0]->name;

                                            $localizacao_hotel_sql = $wpdb->get_results( "SELECT meta_value FROM wp_termmeta WHERE term_id = $id_hotel AND meta_key = 'term_hotel_localizacao'");  
                                            $localizacao_hotel = $localizacao_hotel_sql[0]->meta_value;

                                            $categoria_hotel_sql = $wpdb->get_results( "SELECT meta_value FROM wp_termmeta WHERE term_id = $id_hotel AND meta_key = 'term_hotel_categoria'");  
                                            $categoria_hotel = $categoria_hotel_sql[0]->meta_value;

                                            if($x % 2 == 0){                
                                                $style="background-color:#f5f5f5";
                                            }else{
                                                $style="background-color:#f5f5f5";
                                            }   

                                            $retorno .= '<input type="hidden" class="'.$x.'_nome_hotel_orcamento_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$nome_hotel.'">
                                            <input type="hidden" class="'.$x.'_nome_regime_orcamento_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$nome_regime.'">
                                            <input type="hidden" class="'.$x.'_nome_apto_orcamento_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="Apartamento '.$nome_apto.'">
                                            <input type="hidden" class="'.$x.'_nome_roteiro_orcamento_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$nome_roteiro.'">
                                            <input type="hidden" class="'.$x.'_nome_pacote_orcamento_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$pacote.'">
                                            <input type="hidden" class="desc_pacote '.$x.'_nome_descritivo_orcamento_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$dados_gerais[0]["noites"].' noites, 2 adultos e 0 criança">
                                            <input type="hidden" class="'.$x.'_nome_datas_orcamento_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$datas[0].' - '.date('d/m/Y', strtotime(date('Y-d-m', strtotime($datas[0])) . " +".intval($dados_gerais[0]["dias"])." days")).'">
                                            <input type="hidden" class="'.$x.'_nome_diarias_orcamento_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.(intval($dados_gerais[0]["noites"])+1).' diárias">';
                                            /*********************************************************************************************/

                                            $retorno .= '<input type="hidden" id="hotel'.$contador.'" value="'.$nome_hotel.'">
                                            <input type="hidden" id="regime'.$contador.'" value="'.$nome_regime.'">
                                            <input type="hidden" id="apto'.$contador.'" value="Apartamento '.$nome_apto.'">
                                            <input type="hidden" id="roteiro'.$contador.'" value="'.$post_id.'">
                                            <input type="hidden" id="moeda'.$contador.'" value="'.$dados_gerais[$x]['moeda'].'">
                                            <input type="hidden" id="valor_original_single'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_single'])).'.00'.'">
                                            <input type="hidden" id="valor_original_duplo'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_duplo'])).'.00'.'">
                                            <input type="hidden" id="valor_original_triplo'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_triplo'])).'.00'.'">
                                            <input type="hidden" id="valor_original_single_extra'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_single_extra'])).'.00'.'">
                                            <input type="hidden" id="valor_original_duplo_extra'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_duplo_extra'])).'.00'.'">
                                            <input type="hidden" id="valor_original_triplo_extra'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_triplo_extra'])).'.00'.'">
                                            <input type="hidden" id="valor_original_crianca1'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_crianca1'])).'.00'.'">
                                            <input type="hidden" id="valor_original_crianca2'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_crianca2'])).'.00'.'">
                                            <input type="hidden" id="valor_original_bebe'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_bebe'])).'.00'.'">
                                            <input type="hidden" id="valor_original_crianca1_extra'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_crianca1_extra'])).'.00'.'">
                                            <input type="hidden" id="valor_original_crianca2_extra'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_crianca2_extra'])).'.00'.'">
                                            <input type="hidden" id="valor_original_bebe_extra'.$contador.'" value="'.str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]['valor_original_bebe_extra'])).'.00'.'">
                                            <input type="hidden" id="taxas_embarque'.$contador.'" value="0">
                                            <input type="hidden" id="idade_crianca1'.$contador.'" value="'.$dados_gerais[$x]['idade_crianca1'].'">
                                            <input type="hidden" id="idade_crianca2'.$contador.'" value="'.$dados_gerais[$x]['idade_crianca2'].'">
                                            <input type="hidden" id="idade_bebe'.$contador.'" value="'.$dados_gerais[$x]['idade_bebe'].'">';

                                            //foto
                                            //nome
                                            //localização
                                            //categoria do apartamento
                                            //regime
                                            //info do pacote
                                            //qtd de noites do pacote
                                            //valor single
                                            //valor duplo
                                            //valor triplo
                                            /* CONDICIONAL DA QUANTIDADE DE PAX:
                                            * se tem valor do triplo: valor pra single duplo e triplo
                                            * se só tem single e duplo: valor pra single e duplo
                                            * se só tem single: valor pra single
                                            */ 

                                            $qtd_pax_pacote = 2;
                                            if(!empty($dados_gerais[$x]["valor_pacote_triple"])){
                                                $qtd_pax_pacote = 3;
                                            }
                                            if(empty($dados_gerais[$x]["valor_pacote_triple"]) && !empty($dados_gerais[$x]["valor_pacote_double"])){ 
                                                $qtd_pax_pacote = 2;
                                            }
                                            if(empty($dados_gerais[$x]["valor_pacote_triple"]) && empty($dados_gerais[$x]["valor_pacote_double"])){ 
                                                $qtd_pax_pacote = 1;
                                            } 
                                            $quartos[str_replace("/", "-", $datas[0])][] = array("nome_roteiro" => $nome_roteiro, "tipo_periodo" => get_post_meta( $id, 'pacote', true), "taxas" => get_post_meta( $id, 'valor_taxas', true), "moeda" => $dados_gerais[0]["moeda"], "foto_hotel" => $imagem_hotel[$x], "nome_hotel" => $nome_hotel, "localizacao_hotel" => $localizacao_hotel, "categoria_hotel" => $categoria_hotel, "categoria_apto" => $nome_apto, "regime_apto" => $nome_regime, "tipo_pacote" => ($dados_gerais[0]["tipo_pacote"] == 0 ? 'Pacote aéreo' : 'Pacote terrestre'), "noites_pacote" => get_post_meta( $id, 'noites', true), "valor_pacote_single" => (empty($dados_gerais[$x]["valor_pacote_single"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_pacote_single"]))), "valor_pacote_double" => (empty($dados_gerais[$x]["valor_pacote_double"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_pacote_double"]))), "valor_pacote_triple" => (empty($dados_gerais[$x]["valor_pacote_triple"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_pacote_triple"]))), "qtd_pax" => $qtd_pax_pacote);  

                                            $quartos_diaria[str_replace("/", "-", $datas[0])][] = array("termos" => $termos, "nome_roteiro" => $nome_roteiro, "tipo_periodo" => get_post_meta( $id, 'pacote', true), "id_hotel" => $id_hotel, "taxas" => $taxas_total[$x], "iss" => $iss_hotel[$x], "taxas_hotel" => $taxas_hotel[$x], "taxas_opcional_hotel" => $taxas_opcional_hotel[$x], "moeda" => $dados_gerais[0]["moeda"], "foto_hotel" => $imagem_hotel[$x], "nome_hotel" => $nome_hotel, "distancia" => $dados_div_tarifario["distancia"], "lotado" => $dados_div_tarifario["lotado"], "consulta" => $dados_div_tarifario["consulta"], "localizacao_hotel" => $localizacao_hotel, "categoria_hotel" => $categoria_hotel, "categoria_apto" => $nome_apto, "regime_apto" => $nome_regime, "tipo_pacote" => ($dados_gerais[0]["tipo_pacote"] == 0 ? 'Pacote aéreo' : 'Pacote terrestre'), "noites_pacote" => ($dados_gerais[$x]["min_diarias"] > 0 ? $dados_gerais[$x]["min_diarias"] : get_post_meta( $id, 'noites', true)), "valor_dom" => (empty($dados_gerais[$x]["valor_dom"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_dom"]))), "valor_seg" => (empty($dados_gerais[$x]["valor_seg"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_seg"]))), "valor_ter" => (empty($dados_gerais[$x]["valor_ter"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_ter"]))), "valor_qua" => (empty($dados_gerais[$x]["valor_qua"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_qua"]))), "valor_qui" => (empty($dados_gerais[$x]["valor_qui"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_qui"]))), "valor_sex" => (empty($dados_gerais[$x]["valor_sex"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_sex"]))), "valor_sab" => (empty($dados_gerais[$x]["valor_sab"]) ? 0 : str_replace(",", ".", str_replace(".", "", $dados_gerais[$x]["valor_sab"]))), "qtd_pax" => $dados_gerais[$x]["pax"]);  

                                            $retorno .= ' 
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-739dedd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="739dedd" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">'; 
                      if ($imagem_hotel[$x] == 0) { }else{
                                                    $retorno .= '<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-a56b981" data-id="a56b981" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding:10px 4px;">
                                                            <div class="elementor-element elementor-element-fda57c5 elementor-widget elementor-widget-image" data-id="fda57c5" data-element_type="widget" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <img
                                                                        width="800"
                                                                        height="533"
                                                                        src="'.$imagem_hotel[$x].'" style="'.$style_imagem_hotel[$x].'"
                                                                    />
                                                                    <small style="font-size: 10px;font-weight: 700;">'.$dados_div_tarifario["distancia"].'</small>'; 
                                                                $retorno .= '</div>
                                                            </div>
                                                        </div>
                                                    </div>';
                      }
                                                    $retorno .= '<div class="elementor-column elementor-col-'.(!empty($imagem_hotel[$x]) ? '20' : '30').' elementor-top-column elementor-element elementor-element-94b74d9" data-id="94b74d9" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding:0px;">
                                                            <section
                                                                class="elementor-section elementor-inner-section elementor-element elementor-element-ed40d30 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                                data-id="ed40d30"
                                                                data-element_type="section"
                                                            >
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-8eb33fe" data-id="8eb33fe" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                                            <div class="elementor-element elementor-element-64b43e0 elementor-widget elementor-widget-heading" data-id="64b43e0" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default"><strong>'.$nome_hotel.'</strong></h2>';
                                                                                if (!empty($localizacao_hotel)) { 
                                                                                    $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="margin-top: 6px;font-size:13px;"> '.(!empty($localizacao_hotel) ? $localizacao_hotel : '').' '.(!empty($categoria_hotel) ? ' <br> '.$categoria_hotel : '').'</h2>';
                                                                                }
                                                                                $retorno .= '</div>
                                                                            </div>'; 
                                                                            $retorno .= '<div class="elementor-element elementor-element-63c9731 elementor-widget elementor-widget-heading" data-id="63c9731" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default"><strong>'.$nome_regime.'</strong></h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-6ec8aad elementor-widget elementor-widget-heading" data-id="6ec8aad" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">Apartamento '.$nome_apto.'</h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-30 elementor-top-column elementor-element elementor-element-b83a3f6" data-id="b83a3f6" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding:0px;">
                                                            <section
                                                                class="elementor-section elementor-inner-section elementor-element elementor-element-b62506c elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                                data-id="b62506c"
                                                                data-element_type="section"
                                                            >
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-102ba43" data-id="102ba43" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                                            <div class="elementor-element elementor-element-813ad84 elementor-widget elementor-widget-heading" data-id="813ad84" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default" id="roteiro_'.str_replace("/", "-", $datas[0]).'">'.($dados_gerais[0]["tipo_pacote"] == 0 ? 'Pacote aéreo' : 'Pacote terrestre').'</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-a0972a6 elementor-widget elementor-widget-heading" data-id="a0972a6" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default desc_pacote_pax">2 adultos e 0 criança</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-1cde447 elementor-widget elementor-widget-heading" data-id="1cde447" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default desc_pacotes_noites">1 quarto - '.get_post_meta( $id, 'noites', true).' noites</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-a61d8e3 elementor-widget elementor-widget-heading" data-id="a61d8e3" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default desc_datas">'.$datas[0].' até '.date('d/m/Y', strtotime(date('Y-d-m', strtotime($datas[0])) . " +".(get_post_meta( $id, 'noites', true))." days")).'</h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-40 elementor-top-column elementor-element elementor-element-490f7fe" data-id="490f7fe" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding: 10px 4px;">
                                                            <section
                                                                class="elementor-section elementor-inner-section elementor-element elementor-element-44c2ad5 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                                data-id="44c2ad5"
                                                                data-element_type="section"
                                                                 data-settings=\'{"background_background":"classic"}\'
                                                            >
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-column elementor-col-80 elementor-inner-column elementor-element elementor-element-f82213e" data-id="f82213e" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding: 10px 0px 0px 5px;">
                                                                            <div class="elementor-element elementor-element-e26c72b elementor-widget elementor-widget-heading" data-id="e26c72b" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default desc_diarias_valor"  id="'.$x.'_desc_diarias_valor_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">'.(get_post_meta( $id, 'noites', true)).'  noites</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-c9c925a elementor-widget elementor-widget-heading" data-id="c9c925a" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default desc_noites_valor"  id="'.$x.'_desc_noites_valor_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">0 noites extras</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-e26c72b elementor-widget elementor-widget-heading '.$x.'_exibe_div_chd_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" data-id="e26c72b" data-element_type="widget" data-widget_type="heading.default" style="display:none">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default desc_diarias_valor"  id="'.$x.'_desc_diarias_chd_valor_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">'.(get_post_meta( $id, 'noites', true)).'  noites - CHD</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-c9c925a elementor-widget elementor-widget-heading '.$x.'_exibe_div_chd_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" data-id="c9c925a" data-element_type="widget" data-widget_type="heading.default" style="display:none">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default desc_noites_valor"  id="'.$x.'_desc_noites_chd_valor_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">0 noites extras - CHD</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-849a035 elementor-widget elementor-widget-heading" data-id="849a035" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">Tx e impostos</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-5fe5142 elementor-widget elementor-widget-heading" data-id="5fe5142" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <h2 class="elementor-heading-title elementor-size-default">TOTAL</h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6252797" data-id="6252797" data-element_type="column">
                                                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding: 10px 6px 10px 0px;">
                                                                            <div class="elementor-element elementor-element-192b0e4 elementor-widget elementor-widget-heading" data-id="192b0e4" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <input type="hidden" id="'.$x.'_valor_subtotal_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$dados_gerais[0]["moeda"].' '.number_format((str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]["valor_original_duplo"]))*2), 2, ',', '.').'">
                                                                                    <h2 class="elementor-heading-title elementor-size-default" class="valor_total" id="'.$x.'_subtotal'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">'.$dados_gerais[0]["moeda"].' '.number_format((str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]["valor_original_duplo"]))*2), 2, ',', '.').'</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-d094355 elementor-widget elementor-widget-heading" data-id="d094355" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <input type="hidden" id="'.$x.'_valor_extra_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$dados_gerais[0]["moeda"].' 0,00"> 
                                                                                    <h2 class="elementor-heading-title elementor-size-default valor_total" id="'.$x.'_valor_noites_extras_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">'.(get_post_meta( $id, 'moeda', true)).'   0,00</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-192b0e4 elementor-widget elementor-widget-heading '.$x.'_exibe_div_chd_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" data-id="192b0e4" data-element_type="widget" data-widget_type="heading.default" style="display:none">
                                                                                <div class="elementor-widget-container">
                                                                                    <input type="hidden" id="'.$x.'_valor_subtotal_chd_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$dados_gerais[0]["moeda"].' 0,00">
                                                                                    <h2 class="elementor-heading-title elementor-size-default" class="valor_total" id="'.$x.'_subtotal_chd'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">'.$dados_gerais[0]["moeda"].' 0,00</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-d094355 elementor-widget elementor-widget-heading '.$x.'_exibe_div_chd_'.$post_id.'_'.str_replace("/", "-", $datas[0]).'" data-id="d094355" data-element_type="widget" data-widget_type="heading.default" style="display:none">
                                                                                <div class="elementor-widget-container">
                                                                                    <input type="hidden" id="'.$x.'_valor_extra_chd_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$dados_gerais[0]["moeda"].' 0,00"> 
                                                                                    <h2 class="elementor-heading-title elementor-size-default valor_total" id="'.$x.'_valor_noites_extras_chd_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">'.$dados_gerais[0]["moeda"].' 0,00</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-ced2e60 elementor-widget elementor-widget-heading" data-id="ced2e60" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <input type="hidden" id="'.$x.'_valor_taxas_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$dados_gerais[0]["moeda"].' '.get_post_meta( $id, 'valor_taxas', true).'">
                                                                                    <input type="hidden" id="'.$x.'_valor_taxas_formarternone_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.(get_post_meta( $id, 'tipo_roteiro', true) == 1 ? str_replace(",", ".", get_post_meta( $id, 'valor_taxas', true)) : '0' ).'">
                                                                                    <h2 class="elementor-heading-title elementor-size-default valor_total" id="'.$x.'_taxas_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">'.$dados_gerais[0]["moeda"].'  '.(empty(get_post_meta( $id, 'valor_taxas', true)) ? '0,00' : get_post_meta( $id, 'valor_taxas', true)).'</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-77d6d4d elementor-widget elementor-widget-heading" data-id="77d6d4d" data-element_type="widget" data-widget_type="heading.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <input type="hidden" id="'.$x.'_valor_total_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.$dados_gerais[0]["moeda"].' '.number_format((str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]["valor_original_duplo"]))*2), 2, ',', '.').'">  
                                                                                    <input type="hidden" id="'.$x.'_valor_total_nao_formatado_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.(str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]["valor_original_duplo"]))*2).'">  
                                                                                    <input type="hidden" id="'.$x.'_valor_diaria'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.(str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]["valor_original_duplo"]))).'">  
                                                                                    <input type="hidden" id="'.$x.'_total_pax_'.str_replace("/", "-", $datas[0]).'" value="2">  
                                                                                    <input type="hidden" class="'.$x.'_qtd_diarias_unit_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.intval($dados_gerais[0]["dias"]).' ">
                                                                                    <input type="hidden" id="'.$x.'_valores_diarias_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.(str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]["valor_original_duplo"]))*2).' ">
                                                                                    <h2 class="elementor-heading-title elementor-size-default" id="'.$x.'_total_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'">'.(get_post_meta( $id, 'moeda', true)).'   '.number_format((str_replace(".", "", str_replace(".00", "", $dados_gerais[$x]["valor_original_duplo"]))*2), 2, ',', '.').'</h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section> 
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-2a1e0c1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2a1e0c1" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-02ac004" data-id="02ac004" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding: 0;">
                                                            <div class="elementor-element elementor-element-64b43e0 elementor-widget elementor-widget-heading" data-id="64b43e0" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">';
                                                                    if (!empty($dados_div_tarifario["observacao"])) { 
                                                                        $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 14px;font-weight: 400;text-align: left;"><span>Observações: '.$dados_div_tarifario["observacao"].'</span></h2>';
                                                                    }
                                                                    if (!empty($dados_div_tarifario["promocao"])) { 
                                                                        $retorno .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 14px;font-weight: 400;margin-top: 6px;text-align: left;"><span>Promoção: '.$dados_div_tarifario["promocao"].'</span></h2>';
                                                                    }
                                                                $retorno .= '</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-2a1e0c1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2a1e0c1" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-02ac004" data-id="02ac004" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div
                                                                class="elementor-element elementor-element-6688f6d elementor-align-right elementor-mobile-align-center elementor-widget elementor-widget-button"
                                                                data-id="6688f6d"
                                                                data-element_type="widget"
                                                                data-widget_type="button.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-button-wrapper">
                                                                        <input type="hidden" id="'.$x.'_tipo_tarifario_'.str_replace("/", "-", $datas[0]).'_'.$post_id.'" value="'.($dados_gerais[0]["tipo_tarifario"] == 0 ? 0 : 1).'">
                                                                        <a onclick="send_orcamento(\''.$x.'\', \''.str_replace("/", "-", $datas[0]).'\', \''.$post_id.'\')" class="elementor-button-link elementor-button elementor-size-sm btn-tarifa-visualizar '.$x.'_button_send_orcamento_'.str_replace("/", "-", $datas[0]).'" role="button" style="color:#fff!important;text-decoration:none!important;">
                                                                            <span class="elementor-button-content-wrapper">
                                                                                <span class="elementor-button-icon elementor-align-icon-left"> <i aria-hidden="true" class="far fa-arrow-alt-circle-right"></i> </span>
                                                                                <span class="elementor-button-text">'.($dados_gerais[0]["tipo_tarifario"] == 0 ? 'Solicitar cotação' : 'Efetuar compra').'</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>'; 
                                        }
                                    $retorno .= '</div>'; 

                                $retorno .= '</div>'; 
                
                }

                $tipo_roteiro = get_post_meta( $post_id, 'tipo_roteiro', true);
                if ($tipo_roteiro == 0) {
                    $pacote = 'Pacote'; 
                    $desc_taxas = '0';
                }else{
                    $pacote = 'Pacote'; 
                    $desc_taxas = intval($dados_gerais[0]["taxa_embarque_roteiro"]);
                }

                $retorno .= '<input type="hidden" id="data_selecionada" value="'.$datas[0].' - '.date('d/m/Y', strtotime(date('Y-d-m', strtotime($datas[0])) . " +".intval(get_post_meta( $id, 'dias', true))." days")).'">';
                $retorno .= '<input type="hidden" id="data_inicial_periodo_selecionado" value="'.str_replace("/", "-", $datas[0]).'">';
                $retorno .= '<input type="hidden" id="data_final_periodo_selecionado" value="'.date('d-m-Y', strtotime(date('Y-d-m', strtotime($datas[0])) . " +".intval(get_post_meta( $id, 'dias', true))." days")).'">';
                $retorno .= '<input type="hidden" id="contador_rooms" value="1">';
                $retorno .= '<input type="hidden" id="nome_hotel_selecionado" value="">';
                $retorno .= '<input type="hidden" id="nome_apto_selecionado" value="">';
                $retorno .= '<input type="hidden" id="nome_regime_selecionado" value="">';
                $retorno .= '<input type="hidden" id="nome_roteiro_selecionado" value="1">';
                $retorno .= '<input type="hidden" id="desc_nome_roteiro_selecionado" value="'.$nome_roteiro.'">';
                $retorno .= '<input type="hidden" id="desc_pax" value="1">';
                $retorno .= '<input type="hidden" id="periodo" value="1">';
                $retorno .= '<input type="hidden" id="text_quartos" value="1">';
                $retorno .= '<input type="hidden" id="subtotal" value="1">';
                $retorno .= '<input type="hidden" id="moeda" value="'.get_post_meta( $id, 'moeda', true).'">';
                $retorno .= '<input type="hidden" id="valor_noites_extras" value="1">';
                $retorno .= '<input type="hidden" id="taxas" value="0,00">';
                $retorno .= '<input type="hidden" id="total" value="1">';
                $retorno .= '<input type="hidden" id="total_formatado" value="1">';
                $retorno .= '<input type="hidden" id="pacote" value="'.$pacote.'">';
                $retorno .= '<input type="hidden" id="text1_email" value="'.$pacote.'">';
                $retorno .= '<input type="hidden" id="text2_email" value="'.$pacote.'">'; 

                $retorno .= '<input type="hidden" id="idade_crianca1" value="02/04">';
                $retorno .= '<input type="hidden" id="idade_crianca2" value="05/08">';
                $retorno .= '<input type="hidden" id="idade_bebe" value="00/01">'; 

                


                $contador_form = 0;

                foreach ($bloco_tarifario as $key => $value) {
                    $dados_gerais = $bloco_tarifario[$key]; 

                    usort($dados_gerais, "sort_array_tarifario");   

                    $contador_form = $contador_form+1;

                    $retorno .= '<div class="container div_tarifario_data" id="text_div_tarifario_data_'.str_replace("/", "-", $key).'" style="display:none">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <div style="">
                                    <input type="hidden" class="data_inicial_selecionada_'.$post_id.'" value="'.$key.'">
                                    <input type="hidden" class="data_inic_selecionada_'.str_replace("/", "-", $key).'" value="'.str_replace("/", "-", $key).'">
                                    <input type="hidden" class="data_final_selecionada_'.str_replace("/", "-", $key).'" value="'.str_replace("/", "-", $dados_gerais[0]["data_final"]).'">
                                    <input type="hidden" class="noites_pacote'.$post_id.'" value="'.$dados_gerais[$x]["min_diarias"].'"> 
                                </div>
                            </div> 
                        </div>
                    </div>'; 

                    $retorno .= '<input type="hidden" id="tarifa_atualizar_valor_'.str_replace("/", "-", $key).'_'.$post_id.'" value=\''.json_encode($dados_gerais).'\'>';
  usort($quartos[str_replace("/", "-", $key)],'invenDescSort');
                    $retorno .= '<input type="hidden" id="tarifa_quartos_'.str_replace("/", "-", $key).'_'.$post_id.'" value=\''.json_encode($quartos[str_replace("/", "-", $key)]).'\'>';
    usort($quartos_diaria[str_replace("/", "-", $key)],'invenDescSort');  
                    $retorno .= '<input type="hidden" id="tarifa_quartos_diaria_'.str_replace("/", "-", $key).'_'.$post_id.'" value=\''.json_encode($quartos_diaria[str_replace("/", "-", $key)]).'\'>'; 
           

                    for ($x=0; $x < count($dados_gerais); $x++) { 
                        $dados_div_tarifario = $dados_gerais[$x];  

                        $contador += 125;

                        $id_hotel = $dados_div_tarifario["tarifario"]["hotel_roteiro"]; 
                        $id_apto = $dados_div_tarifario["tarifario"]["apto_roteiro"];
                        $id_regime = $dados_div_tarifario["tarifario"]["regime_roteiro"];

                        $imagem_hotel = get_term_meta($id_hotel, 'term_image', true);

                        if($x % 2 == 0){                
                            $style="background-color:#f5f5f5";
                        }else{
                            $style="background-color:#f5f5f5";
                        } 

                        $cat_terms = get_terms(
                            array('hoteis'),
                            array(
                                'hide_empty'    => false,
                                'orderby'       => 'name',
                                'order'         => 'ASC',
                                'number'        => 400 //specify yours
                            )
                        );  
                        foreach( $cat_terms as $term ) { 
                            if ($id_hotel == $term->term_id) {
                                $nome_hotel = $term->name;
                            }
                        }

                        $apto_terms = get_terms(
                            array('aptos'),
                            array(
                                'hide_empty'    => false,
                                'orderby'       => 'name',
                                'order'         => 'ASC',
                                'number'        => 400 //specify yours
                            )
                        );  
                        foreach( $apto_terms as $apto ) { 
                            if ($id_apto == $apto->term_id) {
                                $nome_apto = $apto->name;
                            }
                        }

                        $regime_terms = get_terms(
                            array('regime'),
                            array(
                                'hide_empty'    => false,
                                'orderby'       => 'name',
                                'order'         => 'ASC',
                                'number'        => 400 //specify yours
                            )
                        );  
                        foreach( $regime_terms as $regime ) { 
                            if ($id_regime == $regime->term_id) {
                                $nome_regime = $regime->name;
                            }
                        }
         
                    }

                    
                    

                    $retorno .= '<section class="elementor-section elementor-top-section elementor-element elementor-element-ed5e45d elementor-section-boxed elementor-section-height-default elementor-section-height-default div_tarifario_data" data-id="ed5e45d" data-element_type="section" id="div_tarifario_bloco_data_'.str_replace("/", "-", $key).'" style="display:none">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-51b2202" data-id="51b2202" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-60f694b elementor-widget elementor-widget-heading" data-id="60f694b" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">'.$key.' a '.$dados_gerais[0]["data_final"].' - '.$dados_gerais[0]["nome_tarifario"].'</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>'; 
                } 

                $contador = 10;
                $cnt = 0; 
                
         
                  

                $retorno .= '<div class="div_tarifario_data" id="div_bloco_form_geral" style="">
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-2ddf5da elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2ddf5da" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-cb9d21b" data-id="cb9d21b" data-element_type="column" data-settings=\'{"background_background":"classic"}\'>
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-c16fb24 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="c16fb24" data-element_type="widget" data-widget_type="divider.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-divider">
                                                <br> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>  
                </div>';

                    $retorno .= '<input type="hidden" class="contador_blocos" id="contador_blocos" value=\''.count($blocos).'\'>';

                $retorno .= '<input type="hidden" class="post_id" value=\''.$post_id.'\'>';
                $retorno .= '<input type="hidden" class="data" value=\''.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'\'>';

                if (strtotime(implode("-", array_reverse(explode("/", $dados_gerais[0]["data_inicial"])))) < strtotime(implode("-", array_reverse(explode("/", date("d/m/Y")))))) {
                    $retorno .= '<input type="hidden" class=" data_checkin" value="'.date("d/m/Y").'">
                    <input type="hidden" class="noites_pacote_add" value="'.get_post_meta( $id, 'noites', true).'"> ';
                    $retorno .= '<input type="hidden" class=" data_checkout" value="'.date('d/m/Y', strtotime('+'.intval($dados_gerais[0]["noites"]).' days')).'">';
                }else{
                    $retorno .= '<input type="hidden" class="data_checkin" value="'.$dados_gerais[0]["data_inicial"].'">
                    <input type="hidden" class="noites_pacote_add" value="'.get_post_meta( $id, 'noites', true).'"> ';
                    $retorno .= '<input type="hidden" class="data_checkout" value="'.date('d/m/Y', strtotime(date('Y-d-m', strtotime($dados_gerais[0]["data_inicial"])) . " +".intval($dados_gerais[0]["noites"])." days")).'">';
                }

                
                

                
                

                $retorno .= '</div>';

                return $retorno;
            }else{
                return '';
            }
        }else{
            return '';
        }
    }
    add_shortcode( 'vouchertec-destino', 'getUserEmail_func' ); 

     // add_action( 'admin_menu', 'mt_add_pages' );

     // function mt_add_pages() {
     //     add_submenu_page(
     //     'edit.php?post_type=roteirostec',
     //     __( 'Configuração', 'menu-test' ),
     //     __( 'Configuração', 'menu-test' ),
     //     'manage_options',
     //     'configmotor',
     //     'mt_settings_page'
     // );

     //     function mt_settings_page() {
     //         include_once( __DIR__ . '/config-motor.php' );
     //     }
     // }

    add_action('admin_print_footer_scripts','wpse57033_add_new_voucher_link');
    function wpse57033_add_new_voucher_link(){
        $screen = get_current_screen();
        if( $screen->id == 'edit-roteiros' ){
            ?>
                <script>
                jQuery('.wrap h1').after('<a onclick="importar_roteiros()" class="page-title-action">Importar roteiros</a>');
                </script>
            <?php
        }
    }

    function register_shipment_arrival_order_status() {
        register_post_status( 'wc-arrival-shipment', array(
            'label'                     => 'Cotação',
            'public'                    => true,
            'show_in_admin_status_list' => true,
            'show_in_admin_all_list'    => true,
            'exclude_from_search'       => false,
            'label_count'               => _n_noop( 'Cotação <span class="count">(%s)</span>', 'Cotação <span class="count">(%s)</span>' )
        ) );
    }
    add_action( 'init', 'register_shipment_arrival_order_status' );
    function add_awaiting_shipment_to_order_statuses( $order_statuses ) {
        $new_order_statuses = array();
        foreach ( $order_statuses as $key => $status ) {
            $new_order_statuses[ $key ] = $status;
            if ( 'wc-processing' === $key ) {
                $new_order_statuses['wc-arrival-shipment'] = 'Cotação';
            }
        }
        return $new_order_statuses;
    }
    add_filter( 'wc_order_statuses', 'add_awaiting_shipment_to_order_statuses' );

    function create_product_variation( $product_id, $variation_data ){
        // Get the Variable product object (parent)
        $product = wc_get_product($product_id);

        $variation_post = array(
            'post_title'  => $product->get_name(),
            'post_name'   => 'product-'.$product_id.'-variation',
            'post_status' => 'publish',
            'post_parent' => $product_id,
            'post_type'   => 'product_variation',
            'guid'        => $product->get_permalink()
        );

        // Creating the product variation
        $variation_id = wp_insert_post( $variation_post );

        // Get an instance of the WC_Product_Variation object
        $variation = new WC_Product_Variation( $variation_id );

        // Iterating through the variations attributes
        foreach ($variation_data['attributes'] as $attribute => $term_name )
        {
            $taxonomy = 'pa_'.$attribute; // The attribute taxonomy

            // If taxonomy doesn't exists we create it (Thanks to Carl F. Corneil)
            if( ! taxonomy_exists( $taxonomy ) ){
                register_taxonomy(
                    $taxonomy,
                   'product_variation',
                    array(
                        'hierarchical' => false,
                        'label' => ucfirst( $attribute ),
                        'query_var' => true,
                        'rewrite' => array( 'slug' => sanitize_title($attribute) ), // The base slug
                    ) 
                );
            }

            // Check if the Term name exist and if not we create it.
            if( ! term_exists( $term_name, $taxonomy ) )
                wp_insert_term( $term_name, $taxonomy ); // Create the term

            $term_slug = get_term_by('name', $term_name, $taxonomy )->slug; // Get the term slug

            // Get the post Terms names from the parent variable product.
            $post_term_names =  wp_get_post_terms( $product_id, $taxonomy, array('fields' => 'names') );

            // Check if the post term exist and if not we set it in the parent variable product.
            if( ! in_array( $term_name, $post_term_names ) )
                wp_set_post_terms( $product_id, $term_name, $taxonomy, true );

            // Set/save the attribute data in the product variation
            update_post_meta( $variation_id, 'attribute_'.$taxonomy, $term_slug );
        }

        ## Set/save all other data

        // SKU
        if( ! empty( $variation_data['sku'] ) )
            $variation->set_sku( $variation_data['sku'] );

        // Prices
        if( empty( $variation_data['sale_price'] ) ){
            $variation->set_price( $variation_data['regular_price'] );
        } else {
            $variation->set_price( $variation_data['sale_price'] );
            $variation->set_sale_price( $variation_data['sale_price'] );
        }
        $variation->set_regular_price( $variation_data['regular_price'] );

        // Stock
        if( ! empty($variation_data['stock_qty']) ){
            $variation->set_stock_quantity( $variation_data['stock_qty'] );
            $variation->set_manage_stock(true);
            $variation->set_stock_status('');
        } else {
            $variation->set_manage_stock(false);
        }
        
        $variation->set_weight(''); // weight (reseting)

        $variation->save(); // Save the data
    }

    add_action( 'wp_ajax_send_data_roteiros', 'send_data_roteiros' );
    add_action( 'wp_ajax_nopriv_send_data_roteiros', 'send_data_roteiros' );

    function send_data_roteiros() { 
        global $wpdb;

        $nome_hotel = $_POST['nome_roteiro'];
        
        $price_hotel = $_POST['valores_diarias'];  
        $descricao = '';

        $post = array( 
            'post_content' => "",
            'post_status' => "publish",
            'post_title' => $nome_hotel,
            'post_parent' => '',
            'post_type' => "product",
        );

        //Create post
        $post_id = wp_insert_post( $post, $wp_error ); 

        //wp_set_object_terms( $post_id, 'Integrado', 'product_cat' );
        wp_set_object_terms( $post_id, 'simple', 'product_type');

        //wp_set_object_terms($post_id, $tag, 'product_tag'); 
             
        update_post_meta( $post_id, '_visibility', 'visible' );
        update_post_meta( $post_id, '_stock_status', 'instock');
        update_post_meta( $post_id, 'total_sales', '0');
        update_post_meta( $post_id, '_downloadable', 'yes');
        update_post_meta( $post_id, '_virtual', 'yes');
        update_post_meta( $post_id, '_regular_price', $price_hotel );
        update_post_meta( $post_id, '_sale_price', '' );
        update_post_meta( $post_id, '_purchase_note', "" );
        update_post_meta( $post_id, '_featured', "no" );
        update_post_meta( $post_id, '_weight', "" );
        update_post_meta( $post_id, '_length', "" );
        update_post_meta( $post_id, '_width', "" );
        update_post_meta( $post_id, '_height', "" );
        update_post_meta( $post_id, '_sku', '');
        update_post_meta( $post_id, '_product_attributes', '');
        update_post_meta( $post_id, '_sale_price_dates_from', "" );
        update_post_meta( $post_id, '_sale_price_dates_to', "" );
        update_post_meta( $post_id, '_price', $price_hotel );
        update_post_meta( $post_id, '_sold_individually', "" );
        update_post_meta( $post_id, '_manage_stock', "no" );
        update_post_meta( $post_id, '_backorders', "no" );
        update_post_meta( $post_id, '_stock', "" );  

        echo $post_id; 
    }

    add_action( 'wp_ajax_send_cotacao_email', 'send_cotacao_email' );
    add_action( 'wp_ajax_nopriv_send_cotacao_email', 'send_cotacao_email' );

    function send_cotacao_email(){

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo'); 

        $idade = '';
        if ($_POST['idade'] == "00") {
            $idade = "até 1 ano";
        }else if ($_POST['idade'] == "01") {
            $idade = "1 ano";
        }else if ($_POST['idade'] == "02") {
            $idade = "2 anos";
        }else if ($_POST['idade'] == "03") {
            $idade = "3 anos";
        }else if ($_POST['idade'] == "04") {
            $idade = "4 anos";
        }else if ($_POST['idade'] == "05") {
            $idade = "5 anos";
        }else if ($_POST['idade'] == "06") {
            $idade = "6 anos";
        }else if ($_POST['idade'] == "07") {
            $idade = "7 anos";
        }else if ($_POST['idade'] == "08") {
            $idade = "8 anos";
        }else if ($_POST['idade'] == "09") {
            $idade = "9 anos";
        }else if ($_POST['idade'] == "10") {
            $idade = "10 anos";
        }else if ($_POST['idade'] == "11") {
            $idade = "11 anos";
        }else if ($_POST['idade'] == "12") {
            $idade = "12 anos";
        }

        $criancas = '';
        if ($_POST['criancas'] > 0) {
            if ($_POST['criancas'] == 1) {
                $criancas = $_POST['criancas'].' criança com idade de '.$idade;
            }else{
                $criancas = $_POST['criancas'].' crianças com idade de '.$idade;
            } 
        }else{
            $criancas = '';
        }

        global $phpmailer; // define the global variable 
        $phpmailer->ClearAttachments(); // clear all previous attachments if exist
        $phpmailer->ClearCustomHeaders(); // the same about mail headers
        $phpmailer->ClearReplyTos(); 
        $phpmailer->From = 'atendimento@pomptur.tur.br';
        $phpmailer->FromName = 'Pomptur Turismo';
        $phpmailer->Subject = 'Nova solicitação de orçamento'; // subject
        $phpmailer->SingleTo = true;
        $phpmailer->ContentType = 'text/html'; // Content Type
        $phpmailer->IsHTML( true );
        $phpmailer->CharSet = 'utf-8';
        $phpmailer->ClearAllRecipients();
        $phpmailer->AddAddress($_POST['email']); // the recipient's address  
        $phpmailer->Body = '<div marginwidth="0" marginheight="0" style="padding:0">
    <div id="m_8573170178080779969wrapper" dir="ltr" style="background-color:#f7f7f7;margin:0;padding:70px 0;width:100%">
        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <div id="m_8573170178080779969template_header_image">
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_8573170178080779969template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_8573170178080779969template_header" style="background-color:#17A250;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
                                            <tbody>
                                                <tr>
                                                    <td id="m_8573170178080779969header_wrapper" style="padding:36px 48px;display:block">
                                                        <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">Detalhes da sua solicitação</h1>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_8573170178080779969template_body">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" id="m_8573170178080779969body_content" style="background-color:#ffffff">
                                                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding:48px 48px 32px">
                                                                        <div id="m_8573170178080779969body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
                                                                            <span class="im">
                                                                                <p style="margin:0 0 16px">Olá, '.$_POST['nome'].'.</p>
                                                                                <p style="margin:0 0 16px">Sua solicitação foi recebida com sucesso. Abaixo detalhes do pedido: </p>
                                                                            </span>
                                                                            <h2 style="color:#17A250;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                                Solicitação feita em '.strftime('%d de %B de %Y', strtotime('today')).'
                                                                            </h2>
                                                                            <div style="margin-bottom:40px">
                                                                                <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:\'Helvetica Neue\',Helvetica,Roboto,Arial,sans-serif">
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Solicitação:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">
                                                                                                <strong>Destino:</strong> '.$_POST['destino'].'<br>
                                                                                                <strong>Roteiro:</strong> '.$_POST['roteiro'].'<br>
                                                                                                <strong>Período:</strong> '.$_POST['periodo'].'<br>
                                                                                                '.$_POST['datas'].'<br>
                                                                                                <strong>Pax:</strong> '.$_POST['adultos'].' '.($_POST['adultos'] > 1 ? 'adultos' : 'adulto').' '.$criancas.'<br>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Nome:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
                                                                                                '.$_POST['nome'].'
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">E-mail:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
                                                                                                '.$_POST['email'].'
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Telefone:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
                                                                                                '.$_POST['telefone'].'
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Observações:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
                                                                                                '.$_POST['mensagem'].'
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_8573170178080779969template_footer">
                            <tbody>
                                <tr>
                                    <td valign="top" style="padding:0;border-radius:6px">
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" valign="middle" id="m_8573170178080779969credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
                                                        <p style="margin:0 0 16px">Pomptur Turismo</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <img src="https://ci6.googleusercontent.com/proxy/MStYyDb_FIY4-oFQ0wASVHfVo10UFWCGK1lQkcPsXtigXV20gEtnhjx2yq0Ztj_R5lf8aHIPcsILTXpvxEhYlaE9cKq-MNz-UxSFTOZauwIuZE_10AKggModibBzXbI3shzGKj4cSUBcc8X7ZrEQLiT-K_ZCJFbR6uGSweX98U303zc1SQH9lxALZsmRLyux6Cr0_BdMFyWF7x5fiRa348Bt9cvHWfg6dgKF4zlblJj0qPCRzVS21v32J80piaYhOZJStRa6W5iWdHBVU-1Vi-TwgXx7OTIjvOKRO3E6CEBmbZ9TtC5eQBBF5pO-DsmKM_XSYEDhI3QcvYp9ysizBxFCFQ=s0-d-e1-ft#https://open-click.smtplw.com.br/openings/m/c1b7da356324e2199409e90156e39f68-1633121084.66/a/c1b7da356324e2199409e90156e39f68/r/NzI2MTYxNjI2NTQwNmQ2ZjZlNzQ2NTZlNjU2NzcyNmY2NTc2MmU2MzZmNmQyZTYyNzI=/v/2405e7d2d71429dad4b7847d6d1e2163d7dd47ac" alt="" width="0" height="0" style="border:0;width:0;height:0;overflow:hidden" class="CToWUd">
</div>'; 
        if ($phpmailer->Send()) {
            echo '1';
        }else{
            echo '2';
        }

    }

    // define the wp_mail_failed callback
    function action_wp_mail_failed($wp_error)
    {
        return error_log(print_r($wp_error, true));
    }

    function wpse27856_set_content_type(){
        return "text/html";
    }
    add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

    // add the action
    add_action('wp_mail_failed', 'action_wp_mail_failed', 10, 1);
    
    add_action( 'wp_ajax_send_mail', 'send_mail' );
    add_action( 'wp_ajax_nopriv_send_mail', 'send_mail' );
    function send_mail(){
        $mensagem = "";

        $mensagem .= "<div style='font-family:\"Montserrat\";font-size: 14px;line-height: 2;'>";
            $mensagem .= '<img src="https://mellofaro.com.br/wp-content/uploads/2022/07/imagem_2022-07-25_154245107.png" style="height: 55px"> <br><br>';
            $mensagem .= '<strong>Dados da solicitação</strong> <br> '.$_POST['html'].' <br><br>';
            $mensagem .= '<strong>Nome:</strong> '.$_POST['nome'].' <br>';
            $mensagem .= '<strong>E-mail:</strong> '.$_POST['email'].' <br>';
            $mensagem .= '<strong>Telefone:</strong> '.$_POST['telefone'].' <br>'; 
            if(!empty($_POST['mensagem'])){
                $mensagem .= '<strong>Mensagem:</strong> '.$_POST['mensagem'].'<br>';
            }
        $mensagem .= '</div>';

        $headers = "From: Mello Faro Turismo e Viagens <reservaonline@mellofaro.com.br>";
        if(wp_mail( "reservaonline@mellofaro.com.br", $_POST['roteiro']." - Nova solicitação de cotação!", $mensagem, $headers )){
            if(wp_mail( $_POST['email'], $_POST['roteiro']." - Solicitação de cotação efetuada!", $mensagem, $headers )){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            echo 2;
        }
    }

    add_action( 'wp_ajax_show_data_payment', 'show_data_payment' );
    add_action( 'wp_ajax_nopriv_show_data_payment', 'show_data_payment' );

    function show_data_payment(){
        /* 
            * 1. Pagarei a primeira diária + taxas
            * 2. Pagarei 2 diárias + taxas
            * 3. Pagarei 3 diárias + taxas
            * 4. Pagarei todas as diárias + taxas
            * 5. Pagarei todas as diárias + taxas em 2 parcelas
            * 6. Pagarei todas as diárias + taxas em 3 parcelas
            * 7. Pagarei todas as diárias + taxas em 4 parcelas
            * 8. Pagarei todas as diárias + taxas em 5 parcelas
        */ 
        if($_POST['tipo'] == 1){
            $formas = get_post_meta( $_POST['post_id'], 'formas-de-pagamento-cartao', true ); 
            $retorno = "";
            for ($i=0; $i < count($formas); $i++) {  
                $desc_forma = "";
                switch ($formas[$i]) {
                    case 1:
                        $desc_forma = "Pagarei a primeira diária + taxas";
                        break; 
                    case 2:
                        $desc_forma = "Pagarei 2 diárias + taxas";
                        break; 
                    case 3:
                        $desc_forma = "Pagarei 3 diárias + taxas";
                        break; 
                    case 4:
                        $desc_forma = "Pagarei todas as diárias + taxas";
                        break; 
                    case 5:
                        $desc_forma = "Pagarei todas as diárias + taxas em 2 parcelas";
                        break; 
                    case 6:
                        $desc_forma = "Pagarei todas as diárias + taxas em 3 parcelas";
                        break; 
                    case 7:
                        $desc_forma = "Pagarei todas as diárias + taxas em 4 parcelas";
                        break; 
                    case 8:
                        $desc_forma = "Pagarei todas as diárias + taxas em 5 parcelas";
                        break; 
                }
                $retorno .= '<input type="radio" name="check_forma_pagamento_cartao" id="check_forma_pagamento_cartao" value="'.$formas[$i].'" onclick="change_value_order('.$formas[$i].')"> '.$desc_forma.'<br>'; 
            }
        }else if($_POST['tipo'] == 2){

        }else if($_POST['tipo'] == 3){

        }

        echo $retorno;
    }

    add_action( 'wp_ajax_change_value_order', 'change_value_order' );
    add_action( 'wp_ajax_nopriv_change_value_order', 'change_value_order' );

    function change_value_order(){ 

        add_action( 'woocommerce_before_calculate_totals', 'custom_cart_items_prices_roteiros', 10, 1 );

    } 

    add_action( 'wp_ajax_ver_termos', 'ver_termos' );
    add_action( 'wp_ajax_nopriv_ver_termos', 'ver_termos' );

    function ver_termos(){ 

        global $wpdb;

        $code_termo = $_POST['code']; 

        $localizacao_hotel_sql = $wpdb->get_results( "SELECT * FROM wp_postmeta WHERE post_id = '$code_termo' AND meta_key = 'termos-gerais'");  
        $termo_id = $localizacao_hotel_sql[0]->meta_value;
        $data = get_term($termo_id)->description; 
        print_r($data);

    } 

    add_action( 'wp_ajax_show_options_conditional_payment', 'show_options_conditional_payment' );
    add_action( 'wp_ajax_nopriv_show_options_conditional_payment', 'show_options_conditional_payment' );

    function show_options_conditional_payment(){ 
        $metodos = get_post_meta( $_POST['post_id'], 'metodos-de-pagamento', true );
        $display_methods = [];
        //cartão de crédito
        if($metodos[1] === "true"){
            $display_methods[] = 1;
        }else{ 
            $display_methods[] = 0;
        }
        //boleto
        if($metodos[2] === "true"){
            $display_methods[] = 1;
        }else{ 
            $display_methods[] = 0;
        }
        //pix
        if($metodos[3] == "true"){
            $display_methods[] = 1;
        }else{ 
            $display_methods[] = 0;
        }
        echo json_encode($display_methods);
    }

    add_action( 'wp_ajax_send_data_produto', 'send_data_produto' );
    add_action( 'wp_ajax_nopriv_send_data_produto', 'send_data_produto' );

    function send_data_produto() { 
        global $wpdb;

        //$nome_hotel = $_POST['nome_hotel'].' - '.$_POST['nome_apto']; 
        $nome_hotel = $_POST['nome_produto'];
        $price_hotel = $_POST['valor_produto']; 

        $descricao = '';

        $post = array( 
            'post_content' => "",
            'post_status' => "publish",
            'post_title' => $nome_hotel,
            'post_parent' => '',
            'post_type' => "product",
        );

        //Create post
        $post_id = wp_insert_post( $post, $wp_error ); 

        //wp_set_object_terms( $post_id, 'Integrado', 'product_cat' );
        wp_set_object_terms( $post_id, 'simple', 'product_type');

        //wp_set_object_terms($post_id, $tag, 'product_tag'); 
             
        update_post_meta( $post_id, '_visibility', 'visible' );
        update_post_meta( $post_id, '_stock_status', 'instock');
        update_post_meta( $post_id, 'total_sales', '0');
        update_post_meta( $post_id, '_downloadable', 'yes');
        update_post_meta( $post_id, '_virtual', 'yes');
        update_post_meta( $post_id, '_regular_price', $price_hotel );
        update_post_meta( $post_id, '_sale_price', '' );
        update_post_meta( $post_id, '_purchase_note', "" );
        update_post_meta( $post_id, '_featured', "no" );
        update_post_meta( $post_id, '_weight', "" );
        update_post_meta( $post_id, '_length', "" );
        update_post_meta( $post_id, '_width', "" );
        update_post_meta( $post_id, '_height', "" );
        update_post_meta( $post_id, '_sku', '');
        update_post_meta( $post_id, '_product_attributes', '');
        update_post_meta( $post_id, '_sale_price_dates_from', "" );
        update_post_meta( $post_id, '_sale_price_dates_to', "" );
        update_post_meta( $post_id, '_price', $price_hotel );
        update_post_meta( $post_id, '_sold_individually', "" );
        update_post_meta( $post_id, '_manage_stock', "no" );
        update_post_meta( $post_id, '_backorders', "no" );
        update_post_meta( $post_id, '_stock', "" );  

        echo $post_id; 
    }

    add_filter( 'woocommerce_add_to_cart_validation', 'remove_cart_item_before_add_to_cart_roteiros', 20, 3 );
    function remove_cart_item_before_add_to_cart_roteiros( $passed, $product_id, $quantity ) {
        if( ! WC()->cart->is_empty() )
            WC()->cart->empty_cart();
        return $passed;
    }

    add_filter('woocommerce_checkout_get_value','__return_empty_string', 1, 1);

    add_filter( 'cartflows_allow_persistace', 'do_not_store_persistance_data_roteiros', 10, 1 );

    function do_not_store_persistance_data_roteiros( $allow ){
      $allow = 'no';
      return $allow;
    }

    add_action( 'woocommerce_before_calculate_totals', 'custom_cart_items_prices_roteiros', 10, 1 );
    function custom_cart_items_prices_roteiros( $cart ) {

        if(!empty($_SESSION['forma_pagamento'])){

            $valores_diarias = $_SESSION['valores_diarias'];
            $price = 0;
            if($_SESSION['forma_pagamento'] == 1){
                for($i = 0; $i < 11; $i++){
                    $price .= intval($valores_diarias[$i]);
                }
            }else if($_SESSION['forma_pagamento'] == 4){
                $noites = $_SESSION['noites'];
                for($i = 0; $i < 11; $i++){
                    $price .= (intval($valores_diarias[$i])*intval($noites));
                }
            }

            if ( is_admin() && ! defined( 'DOING_AJAX' ) )
                return;

            if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
                return;

            foreach ( $cart->get_cart() as $cart_item ) {
                // Get the product id (or the variation id)
                $product_id = $cart_item['data']->get_id();

                 // Get an instance of the WC_Product object
                $product = $cart_item['data']; 
                $quantity =  $cart_item['quantity']; 

                // Get the product name (Added Woocommerce 3+ compatibility)
                $original_name = method_exists( $product, 'get_name' ) ? $product->get_name() : $product->post->post_title;

                // SET THE NEW NAME
                $new_name = $product->post->post_title.' <br> '.$_SESSION['teste'];

                // Set the new name (WooCommerce versions 2.5.x to 3+)
                if( method_exists( $product, 'set_name' ) )
                    $product->set_name( $new_name );
                else
                    $product->post->post_title = $new_name;

                // GET THE NEW PRICE (code to be replace by yours)
                $new_price = $price; // <== Add your code HERE

                // Updated cart item price
                $cart_item['data']->set_price( $new_price ); 
            }

        }else{

            if ( is_admin() && ! defined( 'DOING_AJAX' ) )
                return;

            if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
                return;

            // Loop through cart items
            foreach ( $cart->get_cart() as $cart_item ) {

                // Get an instance of the WC_Product object
                $product = $cart_item['data']; 
                $quantity =  $cart_item['quantity']; 

                // Get the product name (Added Woocommerce 3+ compatibility)
                $original_name = method_exists( $product, 'get_name' ) ? $product->get_name() : $product->post->post_title;

                // SET THE NEW NAME
                $new_name = $product->post->post_title.' <br> '.$_SESSION['teste'];

                // Set the new name (WooCommerce versions 2.5.x to 3+)
                if( method_exists( $product, 'set_name' ) )
                    $product->set_name( $new_name );
                else
                    $product->post->post_title = $new_name;
            }

        }

    }

    add_action( 'woocommerce_thankyou', 'extended_thankyou_change_order_status' );
 
    function extended_thankyou_change_order_status( $order_id ){ 
		
		$order = wc_get_order($order_id);
       // Get a an instance of order object
        if ($_SESSION['tipo_tarifario'] == 0) {  
            $order->set_status('arrival-shipment');
            $order->save();
        } 
		
    }

    //  Disable gateway based on country
    function payment_gateway_disable_country( $available_gateways ) {
        //1 - cartão | 2 - boleto | 3 - pix
        if ($_SESSION['tipo_tarifario'] == 0) { 
            unset(  $available_gateways['itau-shopline'] );
            unset(  $available_gateways['checkout-cielo'] );
            return $available_gateways; 
        }else{
            if($_SESSION['methodo'] == 1){
                unset(  $available_gateways['itau-shopline'] );
                unset(  $available_gateways['cod'] );
                return $available_gateways;
            }else if($_SESSION['methodo'] == 2){
                unset(  $available_gateways['checkout-cielo'] );
                unset(  $available_gateways['cod'] );
                return $available_gateways;
            }else{
                unset(  $available_gateways['itau-shopline'] );
                unset(  $available_gateways['checkout-cielo'] );
                return $available_gateways;
            } 
        }
    }
    add_filter( 'woocommerce_available_payment_gateways', 'payment_gateway_disable_country' );

    add_filter( 'woocommerce_order_button_text', 'njengah_change_checkout_button_text' );
 
    function njengah_change_checkout_button_text( $button_text ) {

        if ($_SESSION['tipo_tarifario'] == 1) { 
        
            return 'Finalizar reserva'; // Replace this text in quotes with your respective custom button text

        }else{

            return 'Solicitar cotação';

        }
       
    }
    add_filter( 'wc_add_to_cart_message_html', '__return_false' ); 

    //Change the 'Billing details' checkout label to 'Contact Information'
    add_filter(  'gettext',  'change_conditionally_checkout_heading_text', 10, 3 );
    function change_conditionally_checkout_heading_text( $translated, $text, $domain  ) {
        if( $text === 'Billing details' && is_checkout() && ! is_wc_endpoint_url() ){
             return __( 'Seus dados', $domain );
        }
        if( $text === 'Payment' && is_checkout() && ! is_wc_endpoint_url() ){
             return __( 'Pagamento', $domain );
        }
        if( $text === 'Payment method' && is_checkout() && ! is_wc_endpoint_url() ){
             return __( 'Pagamento', $domain );
        }
        return $translated;
    }
        add_filter(  'gettext',  'change_conditionally_checkout_heading_text_shipping', 10, 3 );
    function change_conditionally_checkout_heading_text_shipping( $translated, $text, $domain  ) {
        if( $text === 'Your order' && is_checkout() && ! is_wc_endpoint_url() ){
            if ($_SESSION['tipo_tarifario'] == 1) { 
                return __( 'Efetuar reserva', $domain );
            }else{
                return __( 'Solicitar cotação', $domain );
            }
        }
        return $translated;
    }

    add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
    function custom_override_checkout_fields( $fields ) {
        if ($_SESSION['tipo_tarifario'] == 0) {  
            unset($fields['billing']['billing_company']);
            unset($fields['billing']['billing_address_1']);
            unset($fields['billing']['billing_address_2']);
            unset($fields['billing']['billing_city']);
            unset($fields['billing']['billing_postcode']);
            unset($fields['billing']['billing_country']);
            unset($fields['billing']['billing_state']); 
            unset($fields['order']['order_comments']); 
            unset($fields['account']['account_username']);
            unset($fields['account']['account_password']);
            unset($fields['account']['account_password-2']);
            
        }
        return $fields;
    }

    function hide_coupon_field_on_cart( $enabled ) {
    if ( is_checkout() ) {
        $enabled = false;
    }
    return $enabled;
    }
    add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_cart' );

    // Add term and conditions check box on registration form
add_action( 'woocommerce_register_form', 'add_terms_and_conditions_to_registration', 20 );
function add_terms_and_conditions_to_registration() {

    if ( wc_get_page_id( 'terms' ) > 0 ) {
        ?>
        <p class="form-row terms wc-terms-and-conditions">
                Os seus dados pessoais serão utilizados para processar a sua compra, apoiar a sua experiência em todo este site e para outros fins descritos na nossa <a href="/politica-de-privacidade">política de privacidade</a>.
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" /> <span><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank" class="woocommerce-terms-and-conditions-link">terms &amp; conditions</a>', 'woocommerce' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?></span> <span class="required">*</span>
            </label>
            <input type="hidden" name="terms-field" value="1" />
        </p>
    <?php
    }
}

// Validate required term and conditions check box
add_action( 'woocommerce_register_post', 'terms_and_conditions_validation', 20, 3 );
function terms_and_conditions_validation( $username, $email, $validation_errors ) {
    if ( ! isset( $_POST['terms'] ) )
        $validation_errors->add( 'terms_error', __( 'Terms and condition are not checked!', 'woocommerce' ) );

    return $validation_errors;
}

 

    // New order notification only for "Pending" Order status
    add_action( 'woocommerce_checkout_order_processed', 'pending_new_order_notification', 20, 1 );
    function pending_new_order_notification( $order_id ) {

        // Get an instance of the WC_Order object
        $order = wc_get_order( $order_id );

        // Only for "pending" order status
        if( ! $order->has_status( 'pending' ) ) return;

        // Send "New Email" notification (to admin)
        WC()->mailer()->get_emails()['WC_Email_New_Order']->trigger( $order_id );
    }

    function hide_quantity_using_css() { 

?>

<style type="text/css">.woocommerce-additional-fields{ display: none; visibility: hidden; } .product-quantity { width:0; height:0; display: none; visibility: hidden; }</style>

<?php

}
 

add_action( 'wp_head', 'hide_quantity_using_css' );   

add_filter( 'woocommerce_order_details_after_order_table', 'add_delivery_date_to_order_received_page', 10 , 1 );

function add_delivery_date_to_order_received_page ( $order ) {
    if( version_compare( get_option( 'woocommerce_version' ), '3.0.0', ">=" ) ) {            
        $order_id = $order->get_id();
    } else {
        $order_id = $order->id;
    }

    $campo_icc = get_post_meta( $order_id, 'campo_icc', true );  
    if ( '' != $campo_icc ) {
        echo '<strong>ICC:</strong><br>';
        echo '<p>'. $campo_icc.'</p>'; 
    } 
}
 
 add_filter('plugin_row_meta','fun_hide_view_details',10,4);
function fun_hide_view_details($plugin_meta, $plugin_file, $plugin_data, $status)
{
  if($plugin_data['slug'] == 'featured-image-caption')
    unset($plugin_meta[2]);
  return $plugin_meta;
}

add_action( 'wp_ajax_select_payment_method', 'select_payment_method' );
add_action( 'wp_ajax_nopriv_select_payment_method', 'select_payment_method' );
function select_payment_method(){

    $id = $_POST['id_hotel'];

    $payment_method = get_term_meta( $id, 'metodos-de-pagamento', true);
    
    $retorno = "";
    if($payment_method[1] == "true"){
        $retorno .= '<input type="radio" name="payment_method" value="cartao" onclick="set_payment_method(1, '.$id.')"> <label style="margin-right:8px">Cartão online</label>';
    }
    if($payment_method[2] == "true"){
        $retorno .= '<input type="radio" name="payment_method" value="boleto" onclick="set_payment_method(2, '.$id.')"> <label style="margin-right:8px">Boleto</label>';
    }
    if($payment_method[3] == "true"){
        $retorno .= '<input type="radio" name="payment_method" value="pix" onclick="set_payment_method(3, '.$id.')"> <label style="margin-right:8px">Pix</label>';
    }
    $retorno .= '<div class="show_payment_methods"><div id="show_payment_methods"></div></div>';
    echo $retorno;

}

add_action( 'wp_ajax_value_payment_method', 'value_payment_method' );
add_action( 'wp_ajax_nopriv_value_payment_method', 'value_payment_method' );
function value_payment_method(){

    $id = $_POST['id_hotel'];
    $tipo = $_POST['tipo'];

    $retorno = "";

    if($tipo == 1){
        $payment_method = get_term_meta( $id, 'formas-de-pagamento-cartao', true);
        $retorno .= '<div class="cartao">';
            if(in_array(1, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="1" onclick="get_payment_method(1, 1, '.$id.')"> <label style="margin-right:8px">Pagarei a 1ª diária + taxas</label><br>';
            }
            if(in_array(2, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="2" onclick="get_payment_method(2, 1, '.$id.')"> <label style="margin-right:8px">Pagarei 2 diárias + taxas</label><br>';
            }
            if(in_array(3, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="3" onclick="get_payment_method(3, 1, '.$id.')"> <label style="margin-right:8px">Pagarei 3 diárias + taxas</label><br>';
            }
            if(in_array(4, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="4" onclick="get_payment_method(4, 1, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas</label><br>';
            }
            if(in_array(5, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="5" onclick="get_payment_method(5, 1, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 2 parcelas</label><br>';
            }
            if(in_array(6, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="6" onclick="get_payment_method(6, 1, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 3 parcelas</label><br>';
            }
            if(in_array(7, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="7" onclick="get_payment_method(7, 1, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 4 parcelas</label><br>';
            }
            if(in_array(8, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="8" onclick="get_payment_method(8, 1, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 5 parcelas</label><br>';
            }
        $retorno .= '</div>';
    }else if($tipo == 2){
        $payment_method = get_term_meta( $id, 'formas-de-pagamento-boleto', true); 
        $retorno .= '<div class="boleto">';
            if(in_array(1, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="1" onclick="get_payment_method(1, 2, '.$id.')"> <label style="margin-right:8px">Pagarei a 1ª diária + taxas</label><br>';
            }
            if(in_array(2, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="2" onclick="get_payment_method(2, 2, '.$id.')"> <label style="margin-right:8px">Pagarei 2 diárias + taxas</label><br>';
            }
            if(in_array(3, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="3" onclick="get_payment_method(3, 2, '.$id.')"> <label style="margin-right:8px">Pagarei 3 diárias + taxas</label><br>';
            }
            if(in_array(4, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="4" onclick="get_payment_method(4, 2, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas</label><br>';
            }
            if(in_array(5, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="5" onclick="get_payment_method(5, 2, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 2 parcelas</label><br>';
            }
            if(in_array(6, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="6" onclick="get_payment_method(6, 2, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 3 parcelas</label><br>';
            }
            if(in_array(7, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="7" onclick="get_payment_method(7, 2, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 4 parcelas</label><br>';
            }
            if(in_array(8, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="8" onclick="get_payment_method(8, 2, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 5 parcelas</label><br>';
            }
        $retorno .= '</div>';
    }else if($tipo == 3){
        $payment_method = get_term_meta( $id, 'formas-de-pagamento-pix', true); 
        $retorno .= '<div class="pix">';
            if(in_array(1, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="1" onclick="get_payment_method(1, 3, '.$id.')"> <label style="margin-right:8px">Pagarei a 1ª diária + taxas</label><br>';
            }
            if(in_array(2, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="2" onclick="get_payment_method(2, 3, '.$id.')"> <label style="margin-right:8px">Pagarei 2 diárias + taxas</label><br>';
            }
            if(in_array(3, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="3" onclick="get_payment_method(3, 3, '.$id.')"> <label style="margin-right:8px">Pagarei 3 diárias + taxas</label><br>';
            }
            if(in_array(4, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="4" onclick="get_payment_method(4, 3, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas</label><br>';
            }
            if(in_array(5, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="5" onclick="get_payment_method(5, 3, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 2 parcelas</label><br>';
            }
            if(in_array(6, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="6" onclick="get_payment_method(6, 3, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 3 parcelas</label><br>';
            }
            if(in_array(7, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="7" onclick="get_payment_method(7, 3, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 4 parcelas</label><br>';
            }
            if(in_array(8, $payment_method)){
                $retorno .= '<input type="radio" name="set_payment_method" value="8" onclick="get_payment_method(8, 3, '.$id.')"> <label style="margin-right:8px">Pagarei todas as diárias + taxas em 5 parcelas</label><br>';
            }
        $retorno .= '</div>';
    }

    echo $retorno;

}

/* função que salva os dados do roteiro */
    add_action( 'wp_ajax_save_dados_roteiro', 'save_dados_roteiro' );
    add_action( 'wp_ajax_nopriv_save_dados_roteiro', 'save_dados_roteiro' );
    function save_dados_roteiro(){

        $post_ID      = $_POST['post_ID'];
 
        $tipo_roteiro = $_POST['tipo_roteiro'];
        $valor_taxa   = $_POST['valor_taxa'];
        $dias         = $_POST['dias'];
        $noites       = $_POST['noites'];
        $nome         = $_POST['nome'];
        $destino      = $_POST['destino'];

        update_post_meta( $post_ID, 'tipo_roteiro', $tipo_roteiro ); 
        update_post_meta( $post_ID, 'valor_taxa', $valor_taxa ); 
        update_post_meta( $post_ID, 'dias', $dias ); 
        update_post_meta( $post_ID, 'noites', $noites ); 
        update_post_meta( $post_ID, 'nome', $nome ); 
        update_post_meta( $post_ID, 'destino', $destino );  

        /* **************************************************************** */

        $json_nome = json_decode(stripslashes($_POST['json_nome']));
        $json_tipo = json_decode(stripslashes($_POST['json_tipo']));
        $json_moeda = json_decode(stripslashes($_POST['json_moeda']));
        $json_data_inicial = json_decode(stripslashes($_POST['json_data_inicial']));
        $json_data_final = json_decode(stripslashes($_POST['json_data_final']));
        $tipo_periodo = json_decode(stripslashes($_POST['json_tipo_periodo']));

        $array_dados_tarifas = [];
        $array_dados_tarifas_ptt = [];
        for ($i=0; $i < count($json_nome); $i++) { 
            $array_dados_tarifas[] = array("nome" => $json_nome[$i], "tipo" => $json_tipo[$i], "moeda" => "R$", "data_inicial" => $json_data_inicial[$i], "data_final" => $json_data_final[$i], "tipo_periodo" => $tipo_periodo[$i]);
            $array_dados_tarifas_ptt[] = array("nome_tarifario" => $json_nome[$i], "tipo_tarifario" => $json_tipo[$i], "moeda_tarifario" => "US$", "data_inicial_tarifario" => $json_data_inicial[$i], "data_final_tarifario" => $json_data_final[$i], "tipo_periodo" => $tipo_periodo[$i]);
        }

        update_post_meta( $post_ID, 'dados_tarifas', serialize($array_dados_tarifas) ); 
        update_post_meta( $post_ID, 'nome_tarifario_ptt', serialize($array_dados_tarifas_ptt) );  


        /* **************************************************************** */

        $json_tarifario_option = json_decode(stripslashes($_POST['json_tarifario_option']));
        $json_regime_roteiro = json_decode(stripslashes($_POST['json_regime_roteiro']));
        $json_hotel_roteiro = json_decode(stripslashes($_POST['json_hotel_roteiro']));
        $json_distancia = json_decode(stripslashes($_POST['json_distancia']));
        $json_lotado = json_decode(stripslashes($_POST['json_lotado']));
        $json_consulta = json_decode(stripslashes($_POST['json_consulta']));
        $json_apto_roteiro = json_decode(stripslashes($_POST['json_apto_roteiro']));

        $json_min_diarias = json_decode(stripslashes($_POST['json_min_diarias']));
        $json_pax = json_decode(stripslashes($_POST['json_pax']));
        $json_bloqueio = json_decode(stripslashes($_POST['json_bloqueio']));

        $json_check_valor_pacote = json_decode(stripslashes($_POST['json_check_valor_pacote']));
        $json_valor_pacote_single = json_decode(stripslashes($_POST['json_valor_pacote_single']));
        $json_valor_pacote_double = json_decode(stripslashes($_POST['json_valor_pacote_double']));
        $json_valor_pacote_triple = json_decode(stripslashes($_POST['json_valor_pacote_triple']));

        $json_check_valor_padrao = json_decode(stripslashes($_POST['json_check_valor_padrao']));
        $json_valor_padrao = json_decode(stripslashes($_POST['json_valor_padrao']));

        $json_valor_dom = json_decode(stripslashes($_POST['json_valor_dom']));
        $json_valor_seg = json_decode(stripslashes($_POST['json_valor_seg']));
        $json_valor_ter = json_decode(stripslashes($_POST['json_valor_ter']));
        $json_valor_qua = json_decode(stripslashes($_POST['json_valor_qua']));
        $json_valor_qui = json_decode(stripslashes($_POST['json_valor_qui']));
        $json_valor_sex = json_decode(stripslashes($_POST['json_valor_sex']));
        $json_valor_sab = json_decode(stripslashes($_POST['json_valor_sab']));

        $json_check_noite_extra = json_decode(stripslashes($_POST['json_check_noite_extra']));

        $json_valor_extra_dom = json_decode(stripslashes($_POST['json_valor_extra_dom']));
        $json_valor_extra_seg = json_decode(stripslashes($_POST['json_valor_extra_seg']));
        $json_valor_extra_ter = json_decode(stripslashes($_POST['json_valor_extra_ter']));
        $json_valor_extra_qua = json_decode(stripslashes($_POST['json_valor_extra_qua']));
        $json_valor_extra_qui = json_decode(stripslashes($_POST['json_valor_extra_qui']));
        $json_valor_extra_sex = json_decode(stripslashes($_POST['json_valor_extra_sex']));
        $json_valor_extra_sab = json_decode(stripslashes($_POST['json_valor_extra_sab']));

        $json_check_noite_extra = json_decode(stripslashes($_POST['json_check_permite_crianca']));

        $json_crianca1 = json_decode(stripslashes($_POST['json_crianca1']));
        $json_crianca2 = json_decode(stripslashes($_POST['json_crianca2']));
        $json_crianca3 = json_decode(stripslashes($_POST['json_crianca3']));

        for ($i=0; $i < count($json_regime_roteiro); $i++) { 
            if(!empty($json_tarifario_option[$i])){
                $array_dados_tarifario[] = array("tarifario" => array("tarifario_roteiro" => $json_tarifario_option[$i], "hotel_roteiro" => $json_hotel_roteiro[$i], "distancia" => $json_distancia[$i], "lotado" => $json_lotado[$i], "consulta" => $json_consulta[$i], "apto_roteiro" => $json_apto_roteiro[$i], "regime_roteiro" => $json_regime_roteiro[$i], "min_diarias" => $json_min_diarias[$i], "pax" => $json_pax[$i], "bloqueio" => $json_bloqueio[$i], "valor_dom" => $json_valor_dom[$i], "valor_seg" => $json_valor_seg[$i], "valor_ter" => $json_valor_ter[$i], "valor_qua" => $json_valor_qua[$i], "valor_qui" => $json_valor_qui[$i], "valor_sex" => $json_valor_sex[$i], "valor_sab" => $json_valor_sab[$i], "check_noite_extra" => $json_check_noite_extra[$i], "valor_extra_dom" => $json_valor_extra_dom[$i], "valor_extra_seg" => $json_valor_extra_seg[$i], "valor_extra_ter" => $json_valor_extra_ter[$i], "valor_extra_qua" => $json_valor_extra_qua[$i], "valor_extra_qui" => $json_valor_extra_qui[$i], "valor_extra_sex" => $json_valor_extra_sex[$i], "valor_extra_sab" => $json_valor_extra_sab[$i], "check_valor_pacote" => $json_check_valor_pacote[$i], "valor_pacote_single" => $json_valor_pacote_single[$i], "valor_pacote_double" => $json_valor_pacote_double[$i], "valor_pacote_triple" => $json_valor_pacote_triple[$i], "check_valor_padrao" => $json_check_valor_padrao[$i], "valor_padrao" => $json_valor_padrao[$i], "check_permite_crianca" => $json_check_noite_extra[$i], "crianca1" => $json_crianca1[$i], "crianca2" => $json_crianca2[$i], "crianca3" => $json_crianca3[$i]));
            }
        }  
        update_post_meta( $post_ID, 'dados_tarifario', serialize($array_dados_tarifario) ); 

        echo json_encode($array_dados_tarifario);
    }

    add_action( 'woocommerce_after_checkout_billing_form', 'display_extra_fields_after_billing_address' , 10, 1 );
function display_extra_fields_after_billing_address () { ?>
    <div class="woocommerce-billing-fields" style="margin: 0px 20px">
        <h4 style="font-family: 'Open Sans'">Dados dos hóspedes</h4> 
        <p class="form-row form-row-wide " id="billing_first_adt1_field" data-priority="10" style="margin-bottom: 0;padding-bottom: 0;">
            <strong><img src="/wp-content/uploads/2022/07/imagem_2022-07-27_164034135.png" style="height: 23px;font-family: 'Open Sans'"> Adulto 1</strong>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_nameadt1_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_nameadt1" class="" style="font-family: 'Open Sans'">Nome&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_nameadt1" id="billing_first_nameadt1" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_lastnameadt1_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_lastnameadt1_field" class="" style="font-family: 'Open Sans'">Sobrenome&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_lastnameadt1" id="billing_first_lastnameadt1_field" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_dateadt1_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_dateadt1_field" class="" style="font-family: 'Open Sans'">Data de Nascimento&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_dateadt1" id="billing_first_dateadt1_field_mask" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>

<?php 
    if ($_SESSION['qtd_adt'] == 2 || $_SESSION['qtd_adt'] == 3) { 
?> 
        <p class="form-row form-row-wide " id="billing_first_adt2_field" data-priority="10" style="margin-bottom: 0;padding-bottom: 0;">
            <strong><img src="/wp-content/uploads/2022/07/imagem_2022-07-27_164034135.png" style="height: 23px;font-family: 'Open Sans'"> Adulto 2</strong>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_nameadt2_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_nameadt2_field" class="" style="font-family: 'Open Sans'">Nome&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_nameadt2" id="billing_first_nameadt2_field" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_lastnameadt2_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_lastnameadt2_field" class="" style="font-family: 'Open Sans'">Sobrenome&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_lastnameadt2" id="billing_first_lastnameadt2_field" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_dateadt2_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_dateadt2_field" class="" style="font-family: 'Open Sans'">Data de Nascimento&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_dateadt2" id="billing_first_dateadt2_field_mask" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p> 
<?php 
    }
?> 
<?php 
    if ($_SESSION['qtd_adt'] == 3) { 
?>  
        <p class="form-row form-row-wide " id="billing_first_adt3_field" data-priority="10" style="margin-bottom: 0;padding-bottom: 0;">
            <strong><img src="/wp-content/uploads/2022/07/imagem_2022-07-27_164034135.png" style="height: 23px;font-family: 'Open Sans'"> Adulto 3</strong>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_nameadt3_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_nameadt3_field" class="" style="font-family: 'Open Sans'">Nome&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_nameadt3" id="billing_first_nameadt3_field" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_lastnameadt3_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_lastnameadt3_field" class="" style="font-family: 'Open Sans'">Sobrenome&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_lastnameadt3" id="billing_first_lastnameadt3_field" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_dateadt3_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_dateadt3_field" class="" style="font-family: 'Open Sans'">Data de Nascimento&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_dateadt3" id="billing_first_dateadt3_field_mask" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
<?php 
    }
?> 
<?php 
    if ($_SESSION['qtd_chd'] > 0) { 
?> 
        <p class="form-row form-row-wide " id="billing_first_chd1_field" data-priority="10" style="margin-bottom: 0;padding-bottom: 0;">
            <strong><img src="/wp-content/uploads/2022/07/imagem_2022-07-27_164034135.png" style="height: 23px;font-family: 'Open Sans'"> Criança 1</strong>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_namechd1_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_namechd1" class="" style="font-family: 'Open Sans'">Nome&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_namechd1" id="billing_first_namechd1" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_lastnamechd1_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_lastnamechd1_field" class="" style="font-family: 'Open Sans'">Sobrenome&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_lastnamechd1" id="billing_first_lastnamechd1_field" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p>
        <p class="form-row form-row-first validate-required" id="billing_first_datechd1_field" data-priority="10" style="width: 33.3%">
            <label for="billing_first_datechd1_field" class="" style="font-family: 'Open Sans'">Data de Nascimento&nbsp;<abbr class="required" title="obrigatório">*</abbr></label>
            <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text " name="billing_first_datechd1" id="billing_first_datechd1_field_mask" placeholder="" value="" autocomplete="given-name" style="font-family: 'Open Sans'">
            </span>
        </p> 
<?php 
    }
?>
    </div>
  <?php 
}

 
/**
 * Update value of field
 */
add_action( 'woocommerce_checkout_update_order_meta', 'customise_checkout_field_update_order_meta' );
function customise_checkout_field_update_order_meta( $order_id ) { 
    if ( ! empty( $_POST['billing_first_nameadt1'] ) ) {
        update_post_meta( $order_id, 'billing_first_nameadt1', sanitize_text_field( $_POST['billing_first_nameadt1'] ) );
    }  
    if ( ! empty( $_POST['billing_first_lastnameadt1'] ) ) {
        update_post_meta( $order_id, 'billing_first_lastnameadt1', sanitize_text_field( $_POST['billing_first_lastnameadt1'] ) );
    }  
    if ( ! empty( $_POST['billing_first_dateadt1'] ) ) {
        update_post_meta( $order_id, 'billing_first_dateadt1', sanitize_text_field( $_POST['billing_first_dateadt1'] ) );
    }  


    if ( ! empty( $_POST['billing_first_nameadt2'] ) ) {
        update_post_meta( $order_id, 'billing_first_nameadt2', sanitize_text_field( $_POST['billing_first_nameadt2'] ) );
    }  
    if ( ! empty( $_POST['billing_first_lastnameadt2'] ) ) {
        update_post_meta( $order_id, 'billing_first_lastnameadt2', sanitize_text_field( $_POST['billing_first_lastnameadt2'] ) );
    }  
    if ( ! empty( $_POST['billing_first_dateadt2'] ) ) {
        update_post_meta( $order_id, 'billing_first_dateadt2', sanitize_text_field( $_POST['billing_first_dateadt2'] ) );
    }  


    if ( ! empty( $_POST['billing_first_nameadt3'] ) ) {
        update_post_meta( $order_id, 'billing_first_nameadt3', sanitize_text_field( $_POST['billing_first_nameadt3'] ) );
    }  
    if ( ! empty( $_POST['billing_first_lastnameadt3'] ) ) {
        update_post_meta( $order_id, 'billing_first_lastnameadt3', sanitize_text_field( $_POST['billing_first_lastnameadt3'] ) );
    }  
    if ( ! empty( $_POST['billing_first_dateadt3'] ) ) {
        update_post_meta( $order_id, 'billing_first_dateadt3', sanitize_text_field( $_POST['billing_first_dateadt3'] ) );
    }  


    if ( ! empty( $_POST['billing_first_namechd1'] ) ) {
        update_post_meta( $order_id, 'billing_first_namechd1', sanitize_text_field( $_POST['billing_first_namechd1'] ) );
    }  
    if ( ! empty( $_POST['billing_first_lastnamechd1'] ) ) {
        update_post_meta( $order_id, 'billing_first_lastnamechd1', sanitize_text_field( $_POST['billing_first_lastnamechd1'] ) );
    }  
    if ( ! empty( $_POST['billing_first_datechd1'] ) ) {
        update_post_meta( $order_id, 'billing_first_datechd1', sanitize_text_field( $_POST['billing_first_datechd1'] ) );
    }  
 
    update_post_meta( $order_id, 'billing_address_1', sanitize_text_field( $_POST['shipping_address_1'] ) );
    update_post_meta( $order_id, 'billing_address_2', sanitize_text_field( $_POST['shipping_address_2'] ) );
    update_post_meta( $order_id, 'billing_city', sanitize_text_field( $_POST['shipping_city'] ) );
    update_post_meta( $order_id, 'billing_country', sanitize_text_field( $_POST['shipping_country'] ) );
    update_post_meta( $order_id, 'billing_state', sanitize_text_field( $_POST['shipping_state'] ) );
    update_post_meta( $order_id, 'billing_neighborhood', sanitize_text_field( $_POST['shipping_neighborhood'] ) );
    update_post_meta( $order_id, 'billing_postcode', sanitize_text_field( $_POST['shipping_postcode'] ) );
}
/**
 * Display field value on the order edit page
 */

add_action( 'woocommerce_email_after_order_table', 'add_field_to_mail', 10 , 1 );

function add_field_to_mail ( $order ) {
	if (!empty(get_post_meta( $order->get_id(), 'billing_first_nameadt1', true ))) { 
        echo '<h5 style="font-size: 15px;padding-bottom: 0 !important">Dados adulto 1</h5>';
        echo '<div id="adulto1" class="row"><div class="col-lg-12"><p style="margin-bottom: 0;"> ' . get_post_meta( $order->get_id(), 'billing_first_nameadt1', true ).' ' . get_post_meta( $order->get_id(), 'billing_first_lastnameadt1', true ).' | ' . (!empty(get_post_meta( $order->get_id(), 'billing_first_dateadt1', true )) ? get_post_meta( $order->get_id(), 'billing_first_dateadt1', true ) : "").'</p></div></div><br>';
    }   

    if (!empty(get_post_meta( $order->get_id(), 'billing_first_nameadt2', true ))) { 
        echo '<h5 style="font-size: 15px;padding-bottom: 0 !important">Dados adulto 2</h5>';
        echo '<div id="adulto2" class="row"><div class="col-lg-12"><p style="margin-bottom: 0;"> ' . get_post_meta( $order->get_id(), 'billing_first_nameadt2', true ).' ' . get_post_meta( $order->get_id(), 'billing_first_lastnameadt2', true ).' | ' . (!empty(get_post_meta( $order->get_id(), 'billing_first_dateadt2', true )) ? get_post_meta( $order->get_id(), 'billing_first_dateadt2', true ) : "").'</p></div></div><br>';
    }   

    if (!empty(get_post_meta( $order->get_id(), 'billing_first_nameadt3', true ))) { 
        echo '<h5 style="font-size: 15px;padding-bottom: 0 !important">Dados adulto 3</h5>';
        echo '<div id="adulto3" class="row"><div class="col-lg-12"><p style="margin-bottom: 0;"> ' . get_post_meta( $order->get_id(), 'billing_first_nameadt3', true ).' ' . get_post_meta( $order->get_id(), 'billing_first_lastnameadt3', true ).' | ' . (!empty(get_post_meta( $order->get_id(), 'billing_first_dateadt3', true )) ? get_post_meta( $order->get_id(), 'billing_first_dateadt3', true ) : "").'</p></div></div><br>';
    }  

    if (!empty(get_post_meta( $order->get_id(), 'billing_first_namechd1', true ))) { 
        echo '<h5 style="font-size: 15px;padding-bottom: 0 !important">Criança</h5>';
        echo '<div id="crianca1" class="row"><div class="col-lg-12"><p style="margin-bottom: 0;"> ' . get_post_meta( $order->get_id(), 'billing_first_namechd1', true ).' ' . get_post_meta( $order->get_id(), 'billing_first_lastnamechd1', true ).' | ' . (!empty(get_post_meta( $order->get_id(), 'billing_first_datechd1', true )) ? get_post_meta( $order->get_id(), 'billing_first_datechd1', true ) : "").'</p></div></div><br>';
    }  

    if (!empty(get_post_meta( $order->get_id(), 'TID Cielo', true ))) { 

        echo '<h5 style="font-size: 15px;">Informações de Pagamento</h5> 
        <div class="row"><div class="col-lg-5"> <p style="margin-bottom: 0;"><strong>Pagamento:</strong></p></div> 
        <div class="col-lg-7"> <p style="margin-bottom: 0;">' . get_post_meta( $order->get_id(), 'Tipo de pagamento', true ).'</p></div></div>';
        if (get_post_meta( $order->get_id(), 'Tipo de pagamento', true ) == 'Cartão de crédito') { 
            echo '<div class="row"><div class="col-lg-5"> <p style="margin-bottom: 0;"><strong>TID:</strong></p></div> 
            <div class="col-lg-7"> <p style="margin-bottom: 0;">' . get_post_meta( $order->get_id(), 'TID Cielo', true ).'</p></div></div>
            <div class="row"><div class="col-lg-5"> <p style="margin-bottom: 0;"><strong>Parcelas:</strong></p></div> 
            <div class="col-lg-7"> <p style="margin-bottom: 0;">' . (get_post_meta( $order->get_id(), 'Parcelas', true ) == 1 ? 'A vista' : 'Parcelado em '.get_post_meta( $order->get_id(), 'Parcelas', true ).'x').'</p></div></div> <hr> ';
        }else{
            echo '<hr>';
        }
    } 
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'greeting_card_checkout_field_display_admin_order_meta', 10, 1 );
function greeting_card_checkout_field_display_admin_order_meta($order){ 

    echo '<h5 style="font-size: 15px;">Informações da reserva</h5> ';

    if (!empty(get_post_meta( $order->get_id(), 'billing_first_nameadt1', true ))) { 
        echo '<h5 style="font-size: 15px;">Adulto 1</h5>';
        echo '<div id="adulto1" class="row"><div class="col-lg-7"><p style="margin-bottom: 0;"><strong>Nome:</strong> <br>' . get_post_meta( $order->get_id(), 'billing_first_nameadt1', true ).' ' . get_post_meta( $order->get_id(), 'billing_first_lastnameadt1', true ).'</p></div><div class="col-lg-5"><p style="margin-bottom: 0;"><strong>Nascimento:</strong> <br>' . (!empty(get_post_meta( $order->get_id(), 'billing_first_dateadt1', true )) ? get_post_meta( $order->get_id(), 'billing_first_dateadt1', true ) : "").'</p></div></div><hr>';
    }   

    if (!empty(get_post_meta( $order->get_id(), 'billing_first_nameadt2', true ))) { 
        echo '<h5 style="font-size: 15px;">Adulto 2</h5>';
        echo '<div id="adulto2" class="row"><div class="col-lg-7"><p style="margin-bottom: 0;"><strong>Nome:</strong> <br>' . get_post_meta( $order->get_id(), 'billing_first_nameadt2', true ).' ' . get_post_meta( $order->get_id(), 'billing_first_lastnameadt2', true ).'</p></div><div class="col-lg-5"><p style="margin-bottom: 0;"><strong>Nascimento:</strong> <br>' . (!empty(get_post_meta( $order->get_id(), 'billing_first_dateadt2', true )) ? get_post_meta( $order->get_id(), 'billing_first_dateadt2', true ) : "").'</p></div></div><hr>';
    }   

    if (!empty(get_post_meta( $order->get_id(), 'billing_first_nameadt3', true ))) { 
        echo '<h5 style="font-size: 15px;">Adulto 3</h5>';
        echo '<div id="adulto3" class="row"><div class="col-lg-7"><p style="margin-bottom: 0;"><strong>Nome:</strong> <br>' . get_post_meta( $order->get_id(), 'billing_first_nameadt3', true ).' ' . get_post_meta( $order->get_id(), 'billing_first_lastnameadt3', true ).'</p></div><div class="col-lg-5"><p style="margin-bottom: 0;"><strong>Nascimento:</strong> <br>' . (!empty(get_post_meta( $order->get_id(), 'billing_first_dateadt3', true )) ? get_post_meta( $order->get_id(), 'billing_first_dateadt3', true ) : "").'</p></div></div><hr>';
    }  

    if (!empty(get_post_meta( $order->get_id(), 'billing_first_namechd1', true ))) { 
        echo '<h5 style="font-size: 15px;">Criança</h5>';
        echo '<div id="crianca" class="row"><div class="col-lg-7"><p style="margin-bottom: 0;"><strong>Nome:</strong> <br>' . get_post_meta( $order->get_id(), 'billing_first_namechd1', true ).' ' . get_post_meta( $order->get_id(), 'billing_first_lastnamechd1', true ).'</p></div><div class="col-lg-5"><p style="margin-bottom: 0;"><strong>Nascimento:</strong> <br>' . (!empty(get_post_meta( $order->get_id(), 'billing_first_datechd1', true )) ? get_post_meta( $order->get_id(), 'billing_first_datechd1', true ) : "").'</p></div></div><hr>';
    }  

    if (!empty(get_post_meta( $order->get_id(), 'TID Cielo', true ))) { 

        echo '<h5 style="font-size: 15px;">Informações de Pagamento</h5> 
        <div class="row"><div class="col-lg-5"> <p style="margin-bottom: 0;"><strong>Pagamento:</strong></p></div> 
        <div class="col-lg-7"> <p style="margin-bottom: 0;">' . get_post_meta( $order->get_id(), 'Tipo de pagamento', true ).'</p></div></div>';
        if (get_post_meta( $order->get_id(), 'Tipo de pagamento', true ) == 'Cartão de crédito') { 
            echo '<div class="row"><div class="col-lg-5"> <p style="margin-bottom: 0;"><strong>TID:</strong></p></div> 
            <div class="col-lg-7"> <p style="margin-bottom: 0;">' . get_post_meta( $order->get_id(), 'TID Cielo', true ).'</p></div></div>
            <div class="row"><div class="col-lg-5"> <p style="margin-bottom: 0;"><strong>Parcelas:</strong></p></div> 
            <div class="col-lg-7"> <p style="margin-bottom: 0;">' . (get_post_meta( $order->get_id(), 'Parcelas', true ) == 1 ? 'A vista' : 'Parcelado em '.get_post_meta( $order->get_id(), 'Parcelas', true ).'x').'</p></div></div> <hr> ';
        }else{
            echo '<hr>';
        }
    } 
}

add_action( 'wp_ajax_change_bloqueio_order', 'change_bloqueio_order' ); 
add_action( 'wp_ajax_nopriv_change_bloqueio_order', 'change_bloqueio_order' );
function change_bloqueio_order(){
	
	$id_room_selected = $_POST['room_selected'];
	$data_room = $_POST['data_room_selected'];  
	$room_selected = $data_room[$id_room_selected];
	
	if($room_selected['bloqueio'] > 0){
		$data_room[$id_room_selected]['bloqueio'] = intval($data_room[$id_room_selected]['bloqueio'])-1; 
		$data_room[$id_room_selected]['tarifario']['bloqueio'] = intval($data_room[$id_room_selected]['tarifario']['bloqueio'])-1; 
		if((intval($data_room[$id_room_selected]['bloqueio'])-1) == 0){
			$data_room[$id_room_selected]['lotado'] = 1;
			$data_room[$id_room_selected]['tarifario']['lotado'] = 1;
		}
	}else{
		$data_room[$id_room_selected]['lotado'] = 1;
		$data_room[$id_room_selected]['tarifario']['lotado'] = 1;
	} 
	  
	 	$post_id = $_POST['post_id'];  
		//echo serialize($data_room);
		update_post_meta( $post_id, 'dados_tarifario', serialize($data_room) );
	
}
    session_write_close();