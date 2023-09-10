<?php  
    session_start(); 
    /* REGISTRO TAXONOMIAS 
    * taxonomies hoteis, aptos e regime
    */
        /* REGISTRO TAXONOMIA HOTEIS */
            function tarifarios_create_hoteis_taxonomies(){ 
                $labels = array(

                    'name'              => _x('Hotéis', 'taxonomy general name', 'booking'),

                    'singular_name'     => _x('Hotéis', 'taxonomy singular name', 'booking'),

                    'search_items'      => __('Buscar hotel', 'booking'),

                    'all_items'         => __('Todos os hotéis', 'booking'),

                    'parent_item'       => __('Hotel Pai', 'booking'),

                    'parent_item_colon' => __('Hotel Pai', 'booking'),

                    'edit_item'         => __('Editar Hotel', 'booking'),

                    'update_item'       => __('Editar Hotel', 'booking'),

                    'add_new_item'      => __('Novo Hotel', 'booking'),

                    'new_item_name'     => __('Nome novo Hotel', 'booking'),

                    'menu_name'         => __('Hotel', 'booking'),

                );



                $args = array(

                    'hierarchical'      => null,

                    'labels'            => $labels,

                    'show_ui'           => true,

                    'show_in_rest'       => false,

                    'show_admin_column' => true,

                    'rewrite'           => array('slug' => 'hoteis', 'hierarchical' => true),

                );



                register_taxonomy('hoteis', array('roteirostec'), $args);

            } 
            add_action('init', 'tarifarios_create_hoteis_taxonomies'); 
        /* FIM REGISTRO TAXONOMIA HOTEIS */

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
                plugin_dir_url( __FILE__ ) . 'assets/js/scripts_admin.js',
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
            unset( $columns['date'] );
            $columns['shortcode'] = __( 'Shortcode', 'your_text_domain' );
            $columns['data'] = __( 'Data', 'your_text_domain' );

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

            if(!is_page(get_option( 'woocommerce_checkout_page_id' )) || !is_page(get_option( 'woocommerce_thankyou_page_id' ))){  

                wp_enqueue_style( 
                    'font_awesome_site', 
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'
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
            }


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

                wp_enqueue_script( 
                    'scripts_tarifario',
                    plugin_dir_url( __FILE__ ) . 'assets/js/scripts_tarifario.js',
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
                $txt_hotel[] = array($term->name, $term->term_id); 
            } 

            $retorno .= '<option value="0">Selecione...</option>';

            for ($i=0; $i < count($txt_hotel); $i++) {  
                $retorno .= '<option value="'.$txt_hotel[$i][1].'">'.$txt_hotel[$i][0].'</option>';
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
                $txt_hotel[] = array($term->name, $term->term_id); 
            } 

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
                $txt_hotel[] = array($term->name, get_term_meta($term->term_id, 'term_hotel', true), $term->term_id); 
            } 

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
                $nome_tarifario[] = array("tarifario" => array("tarifario_roteiro" => $tarifas[$i]["tarifario"]["tarifario_roteiro"], "hotel_roteiro" => $tarifas[$i]["tarifario"]["hotel_roteiro"], "apto_roteiro" => $tarifas[$i]["tarifario"]["apto_roteiro"], "regime_roteiro" => $tarifas[$i]["tarifario"]["regime_roteiro"], "valor_single" => $tarifas[$i]["tarifario"]["valor_single"], "valor_duplo" => $tarifas[$i]["tarifario"]["valor_duplo"], "valor_triplo" => $tarifas[$i]["tarifario"]["valor_triplo"], "valor_crianca1" => $tarifas[$i]["tarifario"]["valor_crianca1"], "valor_crianca2" => $tarifas[$i]["tarifario"]["valor_crianca2"], "valor_bebe" => $tarifas[$i]["tarifario"]["valor_bebe"], "valor_single_extra" => $tarifas[$i]["tarifario"]["valor_single_extra"], "valor_duplo_extra" => $tarifas[$i]["tarifario"]["valor_duplo_extra"], "valor_triplo_extra" => $tarifas[$i]["tarifario"]["valor_triplo_extra"], "valor_crianca1_extra" => $tarifas[$i]["tarifario"]["valor_crianca1_extra"], "valor_crianca2_extra" => $tarifas[$i]["tarifario"]["valor_crianca2_extra"], "valor_bebe_extra" => $tarifas[$i]["tarifario"]["valor_bebe_extra"]));
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
            $cat_terms_apto = get_terms(
                array('aptos'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 
            $cat_terms_regime = get_terms(
                array('regime'),
                array(
                    'hide_empty'    => false,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'number'        => 400 //specify yours
                )
            ); 

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

                    $contador = $contador+1;
     
                    $id_hotel = $nome_tarifario[$i]["tarifario"]["hotel_roteiro"];
                    
                    $content = '';
                    $nome_hotel = '';
                    foreach( $cat_terms as $term ) { 
                        $txt_hotel[] = array($term->name, $term->term_id); 
                        $terms_hoteis[] = $id_hotel.' == '.$term->term_id.' == '.$term->term_name;
                        if ($id_hotel == $term->term_id) {
                            $nome_hotel = $term->name;
                        } 
                    } 
                    for ($htl=0; $htl < count($txt_hotel); $htl++) {  
                        $options_hotel .= '<option value="'.$txt_hotel[$htl][1].'" '.($id_hotel == $txt_hotel[$htl][1] ? 'selected' : '').'>'.$txt_hotel[$htl][0].'</option>';
                    }

                    $id_apto = $nome_tarifario[$i]["tarifario"]["apto_roteiro"];
                    
                    $contentapto = '';
                    foreach( $cat_terms_apto as $termapto ) { 
                        $txt_apto[] = array($termapto->name, get_term_meta($termapto->term_id, 'term_hotel', true), $termapto->term_id); 
                        if ($id_apto == $termapto->term_id) {
                            $nome_apto = $termapto->name;
                        } 
                    } 
                    for ($apt=0; $apt < count($txt_apto); $apt++) {  
                        if ($id_hotel == $txt_apto[$apt][1]) { 
                            $options_apto .= '<option value="'.$txt_apto[$apt][2].'" '.($id_apto == $txt_apto[$apt][2] ? 'selected' : '').'>'.$txt_apto[$apt][0].'</option>';
                        }
                    }

                    $id_regime = $nome_tarifario[$i]["tarifario"]["regime_roteiro"];
                    
                    $contentapto = '';
                    foreach( $cat_terms_regime as $termregime ) { 
                        $txt_regime[] = array($termregime->name, $termregime->term_id); 
                        if ($id_regime == $termregime->term_id) {
                            $nome_regime = $termregime->name;
                        } 
                    } 
                    for ($rgm=0; $rgm < count($txt_regime); $rgm++) {  
                        $options_regime .= '<option value="'.$txt_regime[$rgm][1].'" '.($id_regime == $txt_regime[$rgm][1] ? 'selected' : '').'>'.$txt_regime[$rgm][0].'</option>';
                    }  

                    $desc_int_tarifario = '';
                    for ($optt=0; $optt < count($options_tarifario); $optt++) { 
                        if ($options_tarifario[$optt][0] == str_replace("+", "-", $nome_tarifario[$i]["tarifario"]["tarifario_roteiro"])) {
                            $desc_int_tarifario .= '<option value="'.$options_tarifario[$optt][0].'" selected>'.$options_tarifario[$optt][1].'</option>';
                        }else{
                            $desc_int_tarifario .= '<option value="'.$options_tarifario[$optt][0].'">'.$options_tarifario[$optt][1].'</option>';
                        }
                    }

                    $retorno .= '<div class="container repeater_tarifa" id="hold_remove_tarifa'.$contador.'"> <div class="row" style="padding-top: 10px"> <div class="col-12" style="padding: 0px 10px;"> <h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;"><a onclick="exibe_div_tarifario(\''.$contador.'\')" style="cursor:pointer;">'.ucfirst((str_replace("+", " ", str_replace("-", " ", $nome_tarifario[$i]["tarifario"]["tarifario_roteiro"])))).' - '.$nome_hotel.' - '.$nome_apto.' - '.$nome_regime.'</a> <a onclick="remove_div_tarifario(\''.$contador.'\')" style="cursor: pointer;"><i class="fas fa-trash-alt" style="float: right;color: #e01717;"></i></a></h4> </div></div> <div class="row tabela_tarifa_cadastro'.$contador.'" style="padding-top: 10px;display:none"> <div class="col-2" style="padding: 10px"> <label><span style="color:#555">Tarifário</span></label> </div><div class="col-4"> <select name="tarifario_option'.$contador.'" id="tarifario_option'.$contador.'" class="form-control"> <option value="">Selecione...... </option> '.$desc_int_tarifario.'</select> </div> <div class="col-2" style="padding: 10px"> <label><span style="color:#555">Regime</span></label> </div><div class="col-4"> <select name="regime_roteiro'.$contador.'" id="regime_roteiro'.$contador.'" class="form-control"> <option value="">Selecione......</option> '.$options_regime.'</select> </div></div> <div class="row tabela_tarifa_cadastro'.$contador.'" style="padding-top: 10px;display:none"> <div class="col-2" style="padding: 10px"> <label><span style="color:#555">Hotel</span></label> </div><div class="col-4"> <select name="hotel_roteiro'.$contador.'" id="hotel_roteiro'.$contador.'" class="form-control" onchange="alter_apto_hotel(\''.$contador.'\')"> <option value="" selected>Selecione...</option>  '.$options_hotel.'</select> </div><div class="col-2" style="padding: 10px"> <label><span style="color:#555">Apartamento</span></label> </div><div class="col-4"> <select name="apto_roteiro'.$contador.'" id="apto_roteiro'.$contador.'" class="form-control"> <option value="">Selecione um apartamento...</option> '.$options_apto.'</select> <div class="" id="loading'.$contador.'" style="display: none;padding: 10px 0px;"> <span><small><img src="https://media.tenor.com/images/a742721ea2075bc3956a2ff62c9bfeef/tenor.gif" style="height:10px;margin-right:3px;"> Aguarde...</small></span> </div></div></div> <div class="row tabela_tarifa_cadastro'.$contador.'" style="padding-top: 10px;display:none"> <div class="col-12" style="padding: 0px"> <table style="border: 1px solid #b9b9b9;margin: 12px;border-spacing: 15px 10px;border-collapse: collapse;"> <thead> <th style="padding: 16px 10px;"></th> <th style=";text-align: left">Single</th> <th style="text-align: left;">Duplo</th> <th style="text-align: left;">Triplo</th> <th style=";text-align: left">Criança 1</th> <th style="text-align: left;">Criança 2</th> <th style="text-align: left;">Bebê</th> </thead> <tbody> <tr style="border: 1px solid #bdbdbd;"> <td style="padding: 8px 12px;width: 19%">Valor da diária </td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_single'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_single"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_duplo'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_duplo"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_triplo'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_triplo"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca1'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_crianca1"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca2'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_crianca2"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_bebe'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_bebe"].'" onclick="this.value=\'0,00\'"></td></tr><tr style="border: 1px solid #bdbdbd;"> <td style="padding: 8px 12px;">Noite extra </td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_single_extra'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_single_extra"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_duplo_extra'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_duplo_extra"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_triplo_extra'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_triplo_extra"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca1_extra'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_crianca1_extra"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_crianca2_extra'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_crianca2_extra"].'" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="valor_bebe_extra'.$contador.'" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="'.$nome_tarifario[$i]["tarifario"]["valor_bebe_extra"].'" onclick="this.value=\'0,00\'"></td></tr><tr style="display: none;border: 1px solid #bdbdbd;background-color: #f1f1f1;" class="linha_taxa"> <td style="padding: 8px 12px;">Tx. de embarque </td><td style="padding: 8px 8px 8px 0px;"><input type="text" name="taxa_embarque_roteiro{{(data.key)}}" placeholder="" class="form-control money" style="font-size: 13px" autocomplete="off" value="0,00" onclick="this.value=\'0,00\'"></td><td style="padding: 8px 8px 8px 0px;"></td><td style="padding: 8px 8px 8px 0px;"></td><td style="padding: 8px 8px 8px 0px;"></td><td style="padding: 8px 8px 8px 0px;"></td><td style="padding: 8px 8px 8px 0px;"></td></tr></tbody> </table> </div></div></div>';
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

        function sort_by_name($a, $b) {
            return $a["nome"] > $b["nome"];
        }  

        function list_tarifas_loop() {
            $id = $_POST['id'];  
            $tarifas = unserialize(get_post_meta( $id, 'dados_tarifas', true));

            for ($i=0; $i < count($tarifas); $i++) { 
                $nome_tarifario[] = array("nome" => $tarifas[$i]["nome"], "tipo" => $tarifas[$i]["tipo"], "moeda" => $tarifas[$i]["moeda"], "data_inicial" => date("d/m/Y", strtotime(implode("-", array_reverse(explode("/", $tarifas[$i]["data_inicial"]))))), "data_final" => date("d/m/Y", strtotime(implode("-", array_reverse(explode("/", $tarifas[$i]["data_final"]))))));
            }
            usort($nome_tarifario, "sort_tarifas"); 

            $retorno = '';
            if (count($nome_tarifario) > 0) { 
                $contador = 0;
                for ($i=0; $i < count($nome_tarifario); $i++) { 

                    $contador = $contador+1;

                    $retorno .= '<div class="row repeater_tarifario" id="holder_remover_tarifario'.$contador.'" style="padding: 11px 10px;"><a onclick="show_dados_tarif(\''.$contador.'\')" style="cursor:pointer;"><h4 style="color: #888;border-bottom: ridge;padding-bottom: 6px;width: 100%;margin-bottom: 12px;">'.$nome_tarifario[$i]["nome"].' - '.$nome_tarifario[$i]["data_inicial"].' a '.$nome_tarifario[$i]["data_final"].' - '.($nome_tarifario[$i]["tipo"] == 0 ? 'Cotação' : 'Reserva').'</a> <a onclick="remove_div_tarifario_tarifa(\''.$contador.'\')" style="cursor: pointer;"><i class="fas fa-trash-alt" style="float: right;color: #e01717;"></i></a></h4> <div class="div_dados_tarifario_nome'.$contador.'" data-control-name="nome_tarifario" style="width: 46%;margin-right: 4%;display: none;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Nome</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="nome_tarifario" class="widefat cx-ui-text" name="nome_tarifario'.$contador.'" value="'.$nome_tarifario[$i]["nome"].'" placeholder="" autocomplete="on"></div></div></div><div class="div_dados_tarifariotipo'.$contador.'" style="width: 50%;display: none;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner" style="padding: 15px 0px;">Tipo</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container " style="padding-top:6px"><div class="cx-radio-group"><div class="cx-radio-item"><input type="radio" class="cx-radio-input" name="tipo_tarifario'.$contador.'}" value="0" '.($nome_tarifario[$i]["tipo"] == 0 ? 'checked' : '').'><label style="margin-right:4%"><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Cotação</span></label> <input type="radio" class="cx-radio-input" name="tipo_tarifario'.$contador.'" value="1" '.($nome_tarifario[$i]["tipo"] == 1 ? 'checked' : '').'><label><span class="cx-lable-content"><span class="cx-radio-item"><i></i></span>Reserva</span></label> </div><div class="clear"></div></div></div></div></div><div class="div_dados_tarifariomoeda'.$contador.'" data-control-name="moeda" style="width: 25%;margin-right: 4%;display:none"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Moeda</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><div class="cx-ui-select-wrapper"><select id="moeda" class="cx-ui-select" name="moeda'.$contador.'" size="1" data-filter="false" data-placeholder="" style="width: 100%"> <option value="" '.($nome_tarifario[$i]["moeda"] == '' ? 'selected' : '').'>Selecione...</option> <option value="R$" '.($nome_tarifario[$i]["moeda"] == 'R$' ? 'selected' : '').'>R$ - Real</option><option value="AU$" '.($nome_tarifario[$i]["moeda"] == 'AU$' ? 'selected' : '').'>AU$ - Dólar australiano</option><option value="GBP" '.($nome_tarifario[$i]["moeda"] == 'GBP' ? 'selected' : '').'>GBP - Libra esterlina</option><option value="$" '.($nome_tarifario[$i]["moeda"] == '$' ? 'selected' : '').'>$ - Dólar canadense</option><option value="USD" '.($nome_tarifario[$i]["moeda"] == 'USD' ? 'selected' : '').'>USD - Dólar americano</option><option value="EUR" '.($nome_tarifario[$i]["moeda"] == 'EUR' ? 'selected' : '').'>EUR - Euro</option></select></div></div></div></div><div class="div_dados_tarifario_dataini'.$contador.'" data-control-name="data_inicial" style="margin-right: 4%;width: 30%;display:none"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Data Inicial</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="data_inicial'.$contador.'" class="widefat cx-ui-text" name="data_inicial'.$contador.'" value="'.$nome_tarifario[$i]["data_inicial"].'" placeholder="" autocomplete="on"></div></div></div><div class="div_dados_tarifario_datafim'.$contador.'" data-control-name="data_final" style="width: 30%;display:none;"><div class="cx-control__info"><div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Data final</div></div><div class="cx-ui-kit__content cx-control__content" role="group"><div class="cx-ui-container "><input type="text" id="data_final'.$contador.'}" class="widefat cx-ui-text" name="data_final'.$contador.'" value="'.$nome_tarifario[$i]["data_final"].'" placeholder="" autocomplete="on"></div></div></div></div>';

                }
            }
            
            echo $retorno;
        }

        add_action( 'wp_ajax_list_dados_roteiro', 'list_dados_roteiro' );
        add_action( 'wp_ajax_nopriv_list_dados_roteiro', 'list_dados_roteiro' ); 

        function list_dados_roteiro() {
            $id = $_POST['id'];   

            $retorno = '<div class="cx-ui-kit cx-control cx-control-radio" data-control-name="tipo_roteiro" style="max-width: 49% !important;flex: 0 0 46% !important;">
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
                <div class="cx-ui-container "><input type="text" id="valor_taxa" class="widefat cx-ui-text money" name="valor_taxa" value="'.get_post_meta( $id, 'valor_taxa', true).'" placeholder="" autocomplete="on" maxlength="13"></div></div>
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
                <div class="cx-ui-container "><input type="text" id="nome" class="widefat cx-ui-text" name="nome" value="'.get_post_meta( $id, 'nome', true).'" placeholder="" autocomplete="on"></div></div>
                </div>
                <div class="cx-ui-kit cx-control cx-control-text" data-control-name="destino">
                <div class="cx-control__info">
                <div class="h4-style cx-ui-kit__title cx-control__title" role="banner">Destino</div>
                <div class="cx-ui-kit__description cx-control__description" role="note" style="display:none">Name: destino</div>
                </div>
                <div class="cx-ui-kit__content cx-control__content" role="group">
                <div class="cx-ui-container "><input type="text" id="destino" class="widefat cx-ui-text" name="destino" value="'.get_post_meta( $id, 'destino', true).'" placeholder="" autocomplete="on"></div></div>
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
            $array_dados_tarifas_ptt[] = array("nome_tarifario" => $_POST['nome_tarifario2500'], "tipo_tarifario" => $_POST['tipo_tarifario2500'], "moeda_tarifario" => $_POST['moeda2500'], "data_inicial_tarifario" => $_POST['data_inicial2500'], "data_final_tarifario" => $_POST['data_final2500']);
        }
        for ($i=1; $i < 21; $i++) { 
            if(!empty($_POST['nome_tarifario'.$i])){
                $array_dados_tarifas[] = array("nome" => $_POST['nome_tarifario'.$i], "tipo" => $_POST['tipo_tarifario'.$i], "moeda" => $_POST['moeda'.$i], "data_inicial" => $_POST['data_inicial'.$i], "data_final" => $_POST['data_final'.$i]);
                $array_dados_tarifas_ptt[] = array("nome_tarifario" => $_POST['nome_tarifario'.$i], "tipo_tarifario" => $_POST['tipo_tarifario'.$i], "moeda_tarifario" => $_POST['moeda'.$i], "data_inicial_tarifario" => $_POST['data_inicial'.$i], "data_final_tarifario" => $_POST['data_final'.$i]);
            }
        } 
        update_post_meta( $post_id, 'dados_tarifas', serialize($array_dados_tarifas) ); 
        update_post_meta( $post_id, 'nome_tarifario_ptt', serialize($array_dados_tarifas_ptt) ); 

        $array_dados_tarifario = [];
        if(!empty($_POST['regime_roteiro2500'])){
            $array_dados_tarifario[] = array("tarifario" => array("tarifario_roteiro" => $_POST['tarifario_option2500'], "hotel_roteiro" => $_POST['hotel_roteiro2500'], "apto_roteiro" => $_POST['apto_roteiro2500'], "regime_roteiro" => $_POST['regime_roteiro2500'], "valor_single" => $_POST['valor_single2500'], "valor_duplo" => $_POST['valor_duplo2500'], "valor_triplo" => $_POST['valor_triplo2500'], "valor_crianca1" => $_POST['valor_crianca12500'], "valor_crianca2" => $_POST['valor_crianca22500'], "valor_bebe" => $_POST['valor_bebe2500'], "valor_single_extra" => $_POST['valor_single_extra2500'], "valor_duplo_extra" => $_POST['valor_duplo_extra2500'], "valor_triplo_extra" => $_POST['valor_triplo_extra2500'], "valor_crianca1_extra" => $_POST['valor_crianca1_extra2500'], "valor_crianca2_extra" => $_POST['valor_crianca2_extra2500'], "valor_bebe_extra" => $_POST['valor_bebe_extra2500'])); 
        }
        for ($i=1; $i < 21; $i++) { 
            if(!empty($_POST['regime_roteiro'.$i])){
                $array_dados_tarifario[] = array("tarifario" => array("tarifario_roteiro" => $_POST['tarifario_option'.$i], "hotel_roteiro" => $_POST['hotel_roteiro'.$i], "apto_roteiro" => $_POST['apto_roteiro'.$i], "regime_roteiro" => $_POST['regime_roteiro'.$i], "valor_single" => $_POST['valor_single'.$i], "valor_duplo" => $_POST['valor_duplo'.$i], "valor_triplo" => $_POST['valor_triplo'.$i], "valor_crianca1" => $_POST['valor_crianca1'.$i], "valor_crianca2" => $_POST['valor_crianca2'.$i], "valor_bebe" => $_POST['valor_bebe'.$i], "valor_single_extra" => $_POST['valor_single_extra'.$i], "valor_duplo_extra" => $_POST['valor_duplo_extra'.$i], "valor_triplo_extra" => $_POST['valor_triplo_extra'.$i], "valor_crianca1_extra" => $_POST['valor_crianca1_extra'.$i], "valor_crianca2_extra" => $_POST['valor_crianca2_extra'.$i], "valor_bebe_extra" => $_POST['valor_bebe_extra'.$i]));
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

        $post_id = $atts['pacote'];  

        $thumb_id = get_post_thumbnail_id($post_id);
        $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
        $url = $thumb_url[0];   

        $data = $wpdb->get_results( "SELECT * FROM wp_posts WHERE ID = '$post_id' AND post_status = 'publish'"); 

        if (!empty($data[0]->post_title)) { 

            $nome_roteiro = $data[0]->post_title;
            $slug_roteiro = $data[0]->post_name;

            $data = $wpdb->get_results( "SELECT * FROM wp_postmeta WHERE post_id = '$post_id' AND meta_key = 'dados_tarifas'"); 

            $tarifario = unserialize(unserialize($data[0]->meta_value));

            if (!empty($tarifario)) { 

                $data_tarifario = $wpdb->get_results( "SELECT * FROM wp_postmeta WHERE post_id = '$post_id' AND meta_key = 'dados_tarifario'");

                $tarifario_valores  = unserialize(unserialize($data_tarifario[0]->meta_value));  

                for ($i=0; $i < count($tarifario); $i++) { 
                    $data_inicial = $tarifario[$i]["data_inicial"];
                    $data_final = $tarifario[$i]["data_final"];
                    $periodo = $tarifario[$i]["nome"];
                    $tipo = $tarifario[$i]["tipo"];
                    $moeda = $tarifario[$i]["moeda"]; 
                    $referencia_roteiro = $tarifario[$i]["referencia_roteiro"];
                    $passeios_roteiro = $tarifario[$i]["passeios_roteiro"];
                    $transporte_roteiro = $tarifario[$i]["transporte_roteiro"]; 
                    $milhagem = $tarifario[$i]["milhagem"]; 
                    $tipo_pacote = $tarifario[$i]["tipo_pacote"]; 
                    $informacoes_pacote = $tarifario[$i]["informacoes_pacote"]; 
                    $observacoes_pacote = $tarifario[$i]["observacoes_pacote"]; 
                    $promocoes_pacote = $tarifario[$i]["promocoes_pacote"]; 
                    $informacoes_uteis_pacote = $tarifario[$i]["informacoes_uteis_pacote"]; 
                    $tempo_viagem = $tarifario[$i]["tempo_viagem"]; 

                    $dias = get_post_meta( $id, 'dias', true);
                    $noites = get_post_meta( $id, 'noites', true);

                    $dados[$data_inicial] = array("data" => date("Y-m-d", strtotime(implode("-", array_reverse(explode("/", $data_inicial))))), "dias" => $dias.' dias '.$noites.' noites', "periodo" => $periodo, "datas" => $data_inicial.' a '.$data_final, "moeda" => $moeda, "nome_roteiro" => $nome_roteiro,  "referencia_roteiro" => $referencia_roteiro,  "passeios_roteiro" => $passeios_roteiro,  "transporte_roteiro" => $transporte_roteiro, "valor" => $tarifario[$i]["tarifario"]["valor_duplo"], "tarifario" => $tarifario[$i]["tarifario"]);

                    for ($x=0; $x < count($tarifario_valores); $x++) {  
                        $observacao = $tarifario_valores[$x]["tarifario"]["observacao"];
                        $promocao = $tarifario_valores[$x]["tarifario"]["promocao"]; 

                        $valor_original_single = explode(",", $tarifario_valores[$x]["tarifario"]["valor_single"]);
                        $valor_original_duplo = explode(",", $tarifario_valores[$x]["tarifario"]["valor_duplo"]);
                        $valor_original_triplo = explode(",", $tarifario_valores[$x]["tarifario"]["valor_triplo"]);

                        $valor_original_single_extra = explode(",", $tarifario_valores[$x]["tarifario"]["valor_single_extra"]);
                        $valor_original_duplo_extra = explode(",", $tarifario_valores[$x]["tarifario"]["valor_duplo_extra"]);
                        $valor_original_triplo_extra = explode(",", $tarifario_valores[$x]["tarifario"]["valor_triplo_extra"]);

                        $valor_original_crianca1 = explode(",", $tarifario_valores[$x]["tarifario"]["valor_crianca1"]);
                        $valor_original_crianca2 = explode(",", $tarifario_valores[$x]["tarifario"]["valor_crianca2"]);
                        $valor_original_bebe = explode(",", $tarifario_valores[$x]["tarifario"]["valor_bebe"]); 

                        $valor_original_crianca1_extra = explode(",", $tarifario_valores[$x]["tarifario"]["valor_crianca1_extra"]);
                        $valor_original_crianca2_extra = explode(",", $tarifario_valores[$x]["tarifario"]["valor_crianca2_extra"]);
                        $valor_original_bebe_extra = explode(",", $tarifario_valores[$x]["tarifario"]["valor_bebe_extra"]);  

                        $idadeinf = explode(",", $tarifario_valores[$x]["tarifario"]["idadeinf"]);
                        $idadechd = explode(",", $tarifario_valores[$x]["tarifario"]["idadechd"]);
                        $idadechl = explode(",", $tarifario_valores[$x]["tarifario"]["idadechl"]);  
                        if (strcmp(strtolower(str_replace("-", "+", str_replace("---", "-", str_replace(" ", "-", str_replace("+", "-", trim($periodo)))))), strtolower(str_replace(" ", "-", str_replace("-", "+", str_replace("---", "-", str_replace("+", "-", trim($tarifario_valores[$x]["tarifario"]["tarifario_roteiro"]))))))) === 0) {
                            $bloco_tarifario[date("d-m-Y", strtotime(implode("-", array_reverse(explode("/", $data_inicial)))))][] = array(
                                "data_inicial" => $data_inicial, 
                                "data_final" => $data_final,  
                                "tipo_tarifario" => $tipo, 
                                "nome_tarifario" => $periodo, 
                                "dias" => $dias, 
                                "noites" => $noites, 
                                "moeda" => $moeda,  
                                "passeios_roteiro" => $passeios_roteiro, 
                                "referencia_roteiro" => $referencia_roteiro, 
                                "transporte_roteiro" => $transporte_roteiro,  
                                "milhagem" => $milhagem,  
                                "tipo_pacote" => $tipo_pacote,  
                                "informacoes_pacote" => $informacoes_pacote,  
                                "observacoes_pacote" => $observacoes_pacote,  
                                "promocoes_pacote" => $promocoes_pacote,  
                                "informacoes_uteis_pacote" => $informacoes_uteis_pacote,  
                                "tempo_viagem" => $tempo_viagem,
                                "observacao" => $observacao,  
                                "promocao" => $promocao,  
                                "idadeinf" => $idadeinf, 
                                "idadechd" => $idadechd, 
                                "idadechl" => $idadechl, 
                                "hotel_roteiro" => $tarifario_valores[$x]["tarifario"]["hotel_roteiro"], 
                                "apto_roteiro" => $tarifario_valores[$x]["tarifario"]["apto_roteiro"], 
                                "regime_roteiro" => $tarifario_valores[$x]["tarifario"]["regime_roteiro"],  
                                "taxa_embarque_roteiro" => get_post_meta( $post_id, 'valor_taxas', true),  
                                "valor_formatado_single" => $tarifario_valores[$x]["tarifario"]["valor_single"], 
                                "valor_original_single" => $valor_original_single[0], 
                                "valor_formatado_duplo" => $tarifario_valores[$x]["tarifario"]["valor_duplo"], 
                                "valor_original_duplo" => $valor_original_duplo[0], 
                                "valor_formatado_triplo" => $tarifario_valores[$x]["tarifario"]["valor_triplo"], 
                                "valor_original_triplo" => $valor_original_triplo[0], 
                                "valor_formatado_single_extra" => $tarifario_valores[$x]["tarifario"]["valor_single_extra"], 
                                "valor_original_single_extra" => $valor_original_single_extra[0], 
                                "valor_formatado_duplo_extra" => $tarifario_valores[$x]["tarifario"]["valor_duplo_extra"], 
                                "valor_original_duplo_extra" => $valor_original_duplo_extra[0], 
                                "valor_formatado_triplo_extra" => $tarifario_valores[$x]["tarifario"]["valor_triplo_extra"], 
                                "valor_original_triplo_extra" => $valor_original_triplo_extra[0], 
                                "valor_formatado_crianca1" => $tarifario_valores[$x]["tarifario"]["valor_crianca1"], 
                                "valor_original_crianca1" => $valor_original_crianca1[0], 
                                "valor_formatado_crianca2" => $tarifario_valores[$x]["tarifario"]["valor_crianca2"], 
                                "valor_original_crianca2" => $valor_original_crianca2[0], 
                                "valor_formatado_bebe" => $tarifario_valores[$x]["tarifario"]["valor_bebe"], 
                                "valor_original_bebe" => $valor_original_bebe[0], 
                                "valor_formatado_crianca1_extra" => $tarifario_valores[$x]["tarifario"]["valor_crianca1_extra"], 
                                "valor_original_crianca1_extra" => $valor_original_crianca1_extra[0], 
                                "valor_formatado_crianca2_extra" => $tarifario_valores[$x]["tarifario"]["valor_crianca2_extra"], 
                                "valor_original_crianca2_extra" => $valor_original_crianca2_extra[0], 
                                "valor_formatado_bebe_extra" => $tarifario_valores[$x]["tarifario"]["valor_bebe_extra"], 
                                "valor_original_bebe_extra" => $valor_original_bebe_extra[0], 
                                "idade_crianca1" => $tarifario_valores[$x]["tarifario"]["idade_crianca1"], 
                                "idade_crianca2" => $tarifario_valores[$x]["tarifario"]["idade_crianca2"], 
                                "idade_bebe" => $tarifario_valores[$x]["tarifario"]["idade_bebe"], 
                                "tarifario" => $tarifario[$i]["tarifario"]
                            );

                        }
                    }
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
                        background-color:#149348 !important;
                        color:#fff !important;
                    }
                    .btn-tarifa-visualizar:hover{
                        background-color:#BFE76A !important;
                        color:#fff !important;
                    }
                    .btn-visualizar-tarifa{
                        background-color:#BFE76A !important;
                        color:#fff !important;
                    }
                    .btn-visualizar-tarifa:hover{
                        background-color:#149348 !important;
                        color:#fff !important;
                    }
                </style>';
                $retorno .= '<link rel="stylesheet" href="'.plugin_dir_url( __FILE__ ) . 'assets/css/shortcode.css">';
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
                                        <h2 class="elementor-heading-title elementor-size-default"><strong> '.$nome_roteiro.'</strong> </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-10 elementor-top-column elementor-element elementor-element-0973bc7" data-id="0973bc7" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated" style="background-color: #f9f9f9;">
                                <div class="elementor-element elementor-element-8d6b5de elementor-widget elementor-widget-heading" data-id="8d6b5de" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title elementor-size-default"><a onclick="see_tarifas(\''.$post_id.'\', \''.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'\')"><button class="elementor-button elementor-size-sm '.$post_id.'_bloco_tarifas_button button_blocos_tarifas" style="float: right;background-color: var(--e-global-color-primary);color: #fff;font-size: 14px;padding: 6px 18px;"><p style="margin-bottom: 0;display: flex;">$ <i class="fa fa-arrow-down" style="margin-left: 7px;"></i></p></button></a></h2>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="elementor-section elementor-top-section elementor-element elementor-element-217f2bb elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default bloco_tarifas '.$post_id.'_bloco_tarifas"
                data-id="217f2bb"
                data-element_type="section" style="display:none">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-34d8d38" data-id="34d8d38" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-058b8d6 elementor-view-default elementor-widget elementor-widget-icon" data-id="058b8d6" data-element_type="widget" data-widget_type="icon.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-wrapper">
                                            <div class="elementor-icon">
                                                <i aria-hidden="true" class="far fa-calendar-check"></i>
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
                                        <h2 class="elementor-heading-title elementor-size-default h2line">Tarifas disponíveis para o(s) período(s) abaixo</h2>
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

                    $data_inicial_bloco[] = $datas[0];
                    $data_final_bloco[] = $datas[1];

                    $retorno .= '<section class="elementor-section elementor-top-section elementor-element elementor-element-af3560b elementor-section-boxed elementor-section-height-default elementor-section-height-default '.$post_id.'_bloco_tarifas bloco_tarifas"
                        data-id="af3560b"
                        data-element_type="section"
                        data-settings=\'{"background_background":"classic"}\' style="display:none">
                        <div class="elementor-container elementor-column-gap-default"> 
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-3dc8ae1 displaycelular" data-id="3dc8ae1" data-element_type="column" data-settings=\'{"background_background":"classic"}\'>
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
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-0377e14 displaycelular" data-id="0377e14" data-element_type="column" data-settings=\'{"background_background":"classic"}\'>
                                <div class="elementor-widget-wrap elementor-element-populated" style="display:flex;">
                                    <div class="elementor-element elementor-element-82cda83 elementor-widget elementor-widget-heading" data-id="82cda83" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default h2line">a partir de '.$valor.',</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-c950fd6 elementor-section-boxed elementor-section-height-default elementor-section-height-default '.$post_id.'_bloco_tarifas bloco_tarifas" data-id="c950fd6" data-element_type="section" style="display:none">
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
                }

                $retorno .= '<input type="hidden" class="contador_blocos" id="contador_blocos" value=\''.count($blocos).'\'>';
                $retorno .= '<input type="hidden" id="datas_inicial_'.$post_id.'" value=\''.json_encode($data_inicial_bloco).'\'>';
                $retorno .= '<input type="hidden" id="datas_final_'.$post_id.'" value=\''.json_encode($data_final_bloco).'\'>';

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

                
                

                $retorno_tarifario = '';

                $tipo_roteiro = get_post_meta( $post_id, 'tipo_roteiro', true);
                if ($tipo_roteiro == 0) {
                    $pacote = 'Pacote'; 
                    $desc_taxas = '0';
                }else{
                    $pacote = 'Pacote'; 
                    $desc_taxas = intval($dados_gerais[0]["taxa_embarque_roteiro"]);
                }

                $retorno_tarifario .= '<input type="hidden" id="data_selecionada" value="'.$dados_gerais[0]["data_inicial"].' - '.date('d/m/Y', strtotime(date('Y-d-m', strtotime($dados_gerais[0]["data_inicial"])) . " +".intval(get_post_meta( $id, 'dias', true))." days")).'">';
                $retorno_tarifario .= '<input type="hidden" id="data_inicial_periodo_selecionado" value="'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'">';
                $retorno_tarifario .= '<input type="hidden" id="data_final_periodo_selecionado" value="'.date('d-m-Y', strtotime(date('Y-d-m', strtotime($dados_gerais[0]["data_inicial"])) . " +".intval(get_post_meta( $id, 'dias', true))." days")).'">';
                $retorno_tarifario .= '<input type="hidden" id="contador_rooms" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="nome_hotel_selecionado" value="">';
                $retorno_tarifario .= '<input type="hidden" id="nome_apto_selecionado" value="">';
                $retorno_tarifario .= '<input type="hidden" id="nome_regime_selecionado" value="">';
                $retorno_tarifario .= '<input type="hidden" id="nome_roteiro_selecionado" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="desc_nome_roteiro_selecionado" value="'.$nome_roteiro.'">';
                $retorno_tarifario .= '<input type="hidden" id="desc_pax" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="periodo" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="text_quartos" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="subtotal" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="moeda" value="'.get_post_meta( $id, 'moeda', true).'">';
                $retorno_tarifario .= '<input type="hidden" id="valor_noites_extras" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="taxas" value="0,00">';
                $retorno_tarifario .= '<input type="hidden" id="total" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="total_formatado" value="1">';
                $retorno_tarifario .= '<input type="hidden" id="pacote" value="'.$pacote.'">';
                $retorno_tarifario .= '<input type="hidden" id="text1_email" value="'.$pacote.'">';
                $retorno_tarifario .= '<input type="hidden" id="text2_email" value="'.$pacote.'">'; 

                $retorno_tarifario .= '<input type="hidden" id="idade_crianca1" value="02/04">';
                $retorno_tarifario .= '<input type="hidden" id="idade_crianca2" value="05/08">';
                $retorno_tarifario .= '<input type="hidden" id="idade_bebe" value="00/01">'; 

                


                $contador_form = 0;

                foreach ($bloco_tarifario as $key => $value) {
                    $dados_gerais = $bloco_tarifario[$key]; 

                    $contador_form = $contador_form+1;

                    $retorno_tarifario .= '<div class="container div_tarifario_data" id="text_div_tarifario_data_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'" style="display:none">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <div style="">
                                    <input type="hidden" class="data_inicial_selecionada_'.$post_id.'" value="'.$dados_gerais[0]["data_inicial"].'">
                                    <input type="hidden" class="data_inic_selecionada_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'" value="'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'">
                                    <input type="hidden" class="data_final_selecionada_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'" value="'.str_replace("/", "-", $dados_gerais[0]["data_final"]).'">
                                    <input type="hidden" class="noites_pacote'.$post_id.'" value="'.get_post_meta( $id, 'noites', true).'"> 
                                </div>
                            </div> 
                        </div>
                    </div>'; 

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

                    
                    

                    $retorno_tarifario .= '<section class="elementor-section elementor-top-section elementor-element elementor-element-ed5e45d elementor-section-boxed elementor-section-height-default elementor-section-height-default div_tarifario_data" data-id="ed5e45d" data-element_type="section" id="div_tarifario_bloco_data_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'" style="display:none">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-51b2202" data-id="51b2202" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-60f694b elementor-widget elementor-widget-heading" data-id="60f694b" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">'.$dados_gerais[0]["data_inicial"].' a '.$dados_gerais[0]["data_final"].' - '.$dados_gerais[0]["nome_tarifario"].'</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>'; 
                } 

                $contador = 10;
                $cnt = 0; 
                
         
                foreach ($bloco_tarifario as $key => $value) {
                    $cnt = $cnt+1;

                    $dados_gerais = $bloco_tarifario[$key];  

                    if ($cnt == 1) {   


                        if (strtotime(implode("-", array_reverse(explode("/", $data_inicial_bloco[0])))) < strtotime(implode("-", array_reverse(explode("/", date("d/m/Y")))))) {
                            $retorno_tarifario .= '<input type="hidden" class="1" id="data_form_inicial_'.$post_id.'" value="'.date("d/m/Y").'">';
                            $retorno_tarifario .= '<input type="hidden" class="1" id="data_form_'.$post_id.'" value="'.date('d/m/Y', strtotime('+'.intval($dados_gerais[0]["noites"]).' days')).'">';

                            $retorno_tarifario .= '<input type="hidden" class="1 data_form_inicial" value="'.date("d/m/Y").'">';
                            $retorno_tarifario .= '<input type="hidden" class="1 data_form" value="'.date('d/m/Y', strtotime('+'.intval($dados_gerais[0]["noites"]).' days')).'">';
                        }else{
                            $retorno_tarifario .= '<input type="hidden" class="2" id="data_form_inicial_'.$post_id.'" value="'.$data_inicial_bloco[0].'">';

                            $data = $data_inicial_bloco[0]; 
                            $data = DateTime::createFromFormat('d/m/Y', $data);
                            $data->add(new DateInterval('P'.$dados_gerais[0]["noites"].'D')); // 2 dias 

                            $retorno_tarifario .= '<input type="hidden" class="2" id="data_form_'.$post_id.'" value="'.$data->format('d/m/Y').'">';

                            $retorno_tarifario .= '<input type="hidden" class="1 data_form_inicial" value="'.$data_inicial_bloco[0].'">';
                            $retorno_tarifario .= '<input type="hidden" class="1 data_form" value="'.$data->format('d/m/Y').'">';
                        }
                        $retorno_tarifario .= '<input type="hidden" class="1 numero_do_post " value="'.$post_id.'">';

                        $retorno_tarifario .= '<script>jQuery(document).ready(function(){  see_tarifas_inicial(\''.$post_id.'\', \''.date("d/m/Y").'\'); });</script>';

                        $retorno_tarifario .= '<div class="div_tarifario_data bloco_tarifas" id="div_bloco_form_geral" style="">
                        <br>
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-2c4879da elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="2c4879da"
                                data-element_type="section" id="bloco_form_data" style="background-color:#fff"
                            >
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1fcfae48" data-id="1fcfae48" data-element_type="column" data-settings=\'{"background_background":"classic"}\'>
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-339119e2 elementor-widget elementor-widget-jet-engine-booking-form" data-id="339119e2" data-element_type="widget" data-widget_type="jet-engine-booking-form.default">
                                                <div class="elementor-widget-container">
                                                    <form class="jet-form layout-column submit-type-ajax" action="https://site02.traveltec.com.br/?jet_engine_action=book" method="POST" data-form-id="350">
                                                        <input class="jet-form__field hidden-field" type="hidden" name="_jet_engine_booking_form_id" value="350" data-field-name="_jet_engine_booking_form_id" />
                                                        <input class="jet-form__field hidden-field" type="hidden" name="_jet_engine_refer" value="https://site02.traveltec.com.br/exibicao-do-shortcode-roteiros" data-field-name="_jet_engine_refer" />
                                                        <div class="jet-form-row jet-form-row--submit jet-form-row--first-visible">
                                                            <div class="jet-form-col jet-form-col-2 field-type-date jet-form-field-container" data-field="field_checkin" data-conditional="false">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text">Data Inicial<span class="jet-form__required">*</span></span>
                                                                </div> 
                                                                <input class="jet-form__field date-field date-field-checkin" required="required" name="field_checkin" type="text" data-field-name="field_checkin" id="field_checkin_'.$post_id.'" readonly value="'.date("d/m/Y").'">
                                                            </div>

                                                            <div class="jet-form-col jet-form-col-2 field-type-date jet-form-field-container" data-field="field_checkout" data-conditional="false">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text">Data final<span class="jet-form__required">*</span></span>
                                                                </div> 
                                                                <input class="jet-form__field date-field date-field-checkout" required="required" name="field_checkout" type="text" data-field-name="field_checkout" id="field_checkout_'.$post_id.'" value="'.date('d/m/Y', strtotime('+'.intval($dados_gerais[0]["noites"]).' days')).'" onchange="set_value(\''.$post_id.'\')" readonly>
                                                            </div>

                                                            <div class="jet-form-col jet-form-col-1 field-type-number jet-form-field-container" data-field="field_adt" data-conditional="false">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text">Adulto<span class="jet-form__required">*</span></span>
                                                                </div>
                                                                <input type="number" class="jet-form__field text-field" value="2" required="required" min="1" max="3" step="1" name="field_adt" data-field-name="field_adt" id="field_adt_'.$post_id.'" onkeyup="check_value_adt(\''.$post_id.'\')">
                                                            </div>

                                                            <div class="jet-form-col jet-form-col-1 field-type-number jet-form-field-container" data-field="field_chd" data-conditional="false">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text">Criança<span class="jet-form__required">*</span></span>
                                                                </div>
                                                                <input type="number" class="jet-form__field text-field" value="0" required="required" min="0" max="1" step="1" name="field_chd" data-field-name="field_chd" id="field_chd_'.$post_id.'" onchange="check_value_chd(\''.$post_id.'\')">
                                                            </div>

                                                            <div class="jet-form-col jet-form-col-2 field-type-select jet-form-field-container" data-field="field_idade" data-conditional="false">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text">Idade da Criança</span>
                                                                </div>
                                                                <select class="jet-form__field select-field" name="field_idade" data-field-name="field_idade" id="field_idade_'.$post_id.'" disabled>
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
                                                            </div>
                                                            <div class="jet-form-col jet-form-col-1 field-type-number jet-form-field-container" data-field="field_quartos" data-conditional="false">
                                                                <div class="jet-form__label">
                                                                    <span class="jet-form__label-text">Quartos<span class="jet-form__required">*</span></span>
                                                                </div>
                                                                <input type="hidden" id="qtd_quartos_'.$post_id.'" value="1">
                                                                <input type="number" class="jet-form__field text-field" value="1" required="required" min="1" max="3" step="1" name="field_quartos_'.$post_id.'" data-field-name="field_quartos" id="field_quartos_'.$post_id.'" onchange="check_value_qts(\''.$post_id.'\')">
                                                            </div>

                                                            <div class="jet-form-col jet-form-col-3 field-type-submit jet-form-field-container" data-field="Submit" data-conditional="false">
                                                                <div class="jet-form__submit-wrap">
                                                                    
                                                                    <button class="jet-form__submit submit-type-ajax  btn-visualizar-tarifa" type="button" onclick="show_div_count_atualizar(\''.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'\', \''.$post_id.'\')">Buscar tarifas</button>
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
                                    </div>
                                </div>
                            </section>
                        </div>';
                    }

                    $transporte_roteiro = explode(" - ", $dados_gerais[0]["transporte_roteiro"]);
                    $transporte = $dados_gerais[0]["transporte_roteiro"];

                    $retorno_tarifario .= '<div class="div_tarifario_data_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.' '.$post_id.'_bloco_tarifas_tarifario bloco_tarifas" style="display:none">';
                            $retorno_tarifario .= '<section class="elementor-section elementor-top-section elementor-element elementor-element-739dedd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="739dedd" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a56b981" data-id="a56b981" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated" style="padding:10px 4px;">
                                            <div class="elementor-element elementor-element-fda57c5 elementor-widget elementor-widget-image" data-id="fda57c5" data-element_type="widget" data-widget_type="image.default">
                                                <div class="elementor-widget-container" style="text-align:justify">
                                                    <h2 class="elementor-heading-title elementor-size-default" style="font-size: 22px;color: #029546;">'.$nome_roteiro.'</h2>
                                                    <h2 class="elementor-heading-title elementor-size-default" style="font-size: 14px;font-weight: 400;margin-top: 6px;">Duração: '.intval(get_post_meta( $id, 'dias', true)).' dias e '.intval(get_post_meta( $id, 'noites', true)).' noites</h2><br>
                                                    <h2 class="elementor-heading-title elementor-size-default" style="font-size: 13px;font-weight: 400;"><i>Valor do Pacote inclui:</i></h2>
                                                    <h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400; margin-top: 6px;"><strong>Transporte:</strong> '.str_replace("u00ed", "í", str_replace("u00e3", "ã", str_replace("u00e0", "à", str_replace("u00e1", "á", str_replace("u00fa", "ú",  str_replace("u00f4", "ô",  str_replace("u00e7", "ç",  str_replace("u00e9", "é", str_replace("u00a0", " ", $transporte))))))))).'</h2>
                                                    <h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;margin-top: 6px;"><strong>Hotel:</strong> '.intval(get_post_meta( $id, 'noites', true)).' noites de hospedagem conforme hotel escolhido.</h2>';
                                                    if (!empty($dados_gerais[0]["passeios_roteiro"])) { 
                                                        $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;margin-top: 6px; "><strong>Passeios e Serviços:</strong> '.str_replace(" | ", " + ", $dados_gerais[0]["passeios_roteiro"]).'</h2>';
                                                    }
                                                    if (!empty($dados_gerais[0]["informacoes_pacote"])) { 
                                                        $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;margin-top: 6px; ">Informações: '.str_replace(" | ", " + ", $dados_gerais[0]["informacoes_pacote"]).'</h2>';
                                                    }
                                                    if (!empty($dados_gerais[0]["observacoes_pacote"])) { 
                                                        $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;margin-top: 6px; "><strong>Observações:</strong> '.str_replace("u00ed", "í", str_replace("u00e3", "ã", str_replace("u00e0", "à", str_replace("u00e1", "á", str_replace("u00fa", "ú",  str_replace("u00f4", "ô",  str_replace("u00e7", "ç",  str_replace("u00e9", "é", str_replace("u00a0", " ", $dados_gerais[0]["observacoes_pacote"]))))))))).'</h2>';
                                                    }
                                                    if (!empty($dados_gerais[0]["promocoes_pacote"])) { 
                                                        $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 15px;font-weight: 400;margin-top: 6px; "><strong>Promoções:</strong> '.str_replace(" | ", " + ", $dados_gerais[0]["promocoes_pacote"]).'</h2>';
                                                    }
                                                    if ($dados_gerais[0]["tempo_viagem"] == "0") { }else{ 
                                                        $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 13px;font-weight: 400;margin-top: 20px;"><small>Viagem: '.str_replace("u00ed", "í", str_replace("u00e3", "ã", str_replace("u00e0", "à", str_replace("u00e1", "á", str_replace("u00fa", "ú",  str_replace("u00f4", "ô",  str_replace("u00e7", "ç",  str_replace("u00e9", "é", str_replace("u00a0", " ", $dados_gerais[0]["tempo_viagem"]))))))))).'</small></h2>';
                                                    }
                                                    if (!empty($dados_gerais[0]["informacoes_uteis_pacote"])) { 
                                                        $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 13px;font-weight: 400;margin-top: '.($dados_gerais[0]["tempo_viagem"] != 0 ? '4px;' : '20px;').';"><small>Informações úteis: '.$dados_gerais[0]["informacoes_uteis_pacote"].'</small></h2>';
                                                    }
                                                    if (!empty($dados_gerais[0]["referencia_roteiro"])) { 
                                                        $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 13px;font-weight: 400;margin-top: '.($dados_gerais[0]["tempo_viagem"] != "0" || !empty($dados_gerais[0]["informacoes_uteis_pacote"]) ? '4px;' : '20px;').'"><small>Referência: Pacote '.$dados_gerais[0]["referencia_roteiro"].'</small></h2>';
                                                    }
                                                    if ($dados_gerais[0]["milhagem"] != 0) { 
                                                        $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="font-size: 13px;font-weight: 400;margin-top: 4px;"><small>Valor de aéreo/milhagem: '.$dados_gerais[0]["milhagem"].'</small></h2>';
                                                    }
                                                $retorno_tarifario .= '</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>';


                                    $tipo_roteiro = get_post_meta( $post_id, 'tipo_roteiro', true);
                                    $pacote = str_replace("u00ed", "í", str_replace("u00e3", "ã", str_replace("u00e0", "à", str_replace("u00e1", "á", str_replace("u00fa", "ú",  str_replace("u00f4", "ô",  str_replace("u00e7", "ç",  str_replace("u00e9", "é", str_replace("u00a0", " ", $dados_gerais[0]["tipo_pacote"])))))))));

                                    usort($dados_gerais, "sort_array_tarifario");

                                    for ($x=0; $x < count($dados_gerais); $x++) { 
                                        $dados_div_tarifario = $dados_gerais[$x];   
                                        $contador += 125;

                                        $id_hotel = $dados_div_tarifario["hotel_roteiro"]; 
                                        $id_apto = $dados_div_tarifario["apto_roteiro"];
                                        $id_regime = $dados_div_tarifario["regime_roteiro"];

                                        $imagem_hotel[$x] = get_term_meta($id_hotel, 'term_image', true);
                                        $style_imagem_hotel[$x] = '';
                                        if (empty($imagem_hotel[$x])) {
                                            $imagem_hotel[$x] = 'https://pompturprovisori1.websiteseguro.com/wp-content/uploads/2021/07/sem-imagem-hotel.png';
                                            $style_imagem_hotel[$x] = 'height:110px;';
                                        }

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

                                        $retorno_tarifario .= '<input type="hidden" class="'.$x.'_nome_hotel_orcamento_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'" value="'.$nome_hotel.'">
                                        <input type="hidden" class="'.$x.'_nome_regime_orcamento_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'" value="'.$nome_regime.'">
                                        <input type="hidden" class="'.$x.'_nome_apto_orcamento_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'" value="Apartamento '.$nome_apto.'">
                                        <input type="hidden" class="'.$x.'_nome_roteiro_orcamento_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'" value="'.$nome_roteiro.'">
                                        <input type="hidden" class="'.$x.'_nome_pacote_orcamento_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'" value="'.$pacote.'">
                                        <input type="hidden" class="desc_pacote '.$x.'_nome_descritivo_orcamento_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'" value="'.$dados_gerais[0]["noites"].' noites, 2 adultos e 0 criança">
                                        <input type="hidden" class="'.$x.'_nome_datas_orcamento_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'" value="'.$dados_gerais[0]["data_inicial"].' - '.date('d/m/Y', strtotime(date('Y-d-m', strtotime($dados_gerais[0]["data_inicial"])) . " +".intval($dados_gerais[0]["dias"])." days")).'">
                                        <input type="hidden" class="'.$x.'_nome_diarias_orcamento_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'" value="'.(intval($dados_gerais[0]["noites"])+1).' diárias">';
                                        /*********************************************************************************************/

                                        $retorno_tarifario .= '<input type="hidden" id="hotel'.$contador.'" value="'.$nome_hotel.'">
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

                                        $retorno_tarifario .= ' 
                                        <section class="elementor-section elementor-top-section elementor-element elementor-element-739dedd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="739dedd" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-a56b981" data-id="a56b981" data-element_type="column">
                                                    <div class="elementor-widget-wrap elementor-element-populated" style="padding:10px 4px;">
                                                        <div class="elementor-element elementor-element-fda57c5 elementor-widget elementor-widget-image" data-id="fda57c5" data-element_type="widget" data-widget_type="image.default">
                                                            <div class="elementor-widget-container">
                                                                <img
                                                                    width="800"
                                                                    height="533"
                                                                    src="'.$imagem_hotel[$x].'" style="'.$style_imagem_hotel[$x].'"
                                                                />'; 
                                                            $retorno_tarifario .= '</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-94b74d9" data-id="94b74d9" data-element_type="column">
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
                                                                                $retorno_tarifario .= '<h2 class="elementor-heading-title elementor-size-default" style="margin-top: 6px;font-size:13px;"> '.(!empty($localizacao_hotel) ? $localizacao_hotel : '').' '.(!empty($categoria_hotel) ? ' <br> '.$categoria_hotel : '').'</h2>';
                                                                            }
                                                                            $retorno_tarifario .= '</div>
                                                                        </div>'; 
                                                                        $retorno_tarifario .= '<div class="elementor-element elementor-element-63c9731 elementor-widget elementor-widget-heading" data-id="63c9731" data-element_type="widget" data-widget_type="heading.default">
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
                                                                                <h2 class="elementor-heading-title elementor-size-default" id="roteiro_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'">'.$pacote.'</h2>
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
                                                                                <h2 class="elementor-heading-title elementor-size-default desc_datas">'.$dados_gerais[0]["data_inicial"].' até '.date('d/m/Y', strtotime(date('Y-d-m', strtotime($dados_gerais[0]["data_inicial"])) . " +".(get_post_meta( $id, 'noites', true))." days")).'</h2>
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
                                                                                <h2 class="elementor-heading-title elementor-size-default desc_diarias_valor"  id="'.$x.'_desc_diarias_valor_'.str_replace("/", "-", $dados_gerais[0]["data_inicial"]).'_'.$post_id.'">'.(get_post_meta( $id, 'noites', true)).'  noites</h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor