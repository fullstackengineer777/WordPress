<?php
/**
 * Metabox file.
 *
 * This is the template that shows the metaboxes.
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

/**
 * Class to Renders and save metabox options
 *
 * @since 1.0.0
 */
class ecommerce_wp_MetaBox {
    private $meta_box;

    private $fields;

    /**
    * Constructor
    *
    * @since 1.0.0
    *
    * @access public
    *
    */
    public function __construct( $meta_box_id, $meta_box_title, $post_type ) {
        
        $this->meta_box = array (
                            'id'        => $meta_box_id,
                            'title'     => $meta_box_title,
                            'post_type' => $post_type,
                            );

        $this->fields = array(
                            'ecommerce-wp-header-layout',
                            'ecommerce-wp-header-style',
                            );


        // Add metaboxes
        add_action( 'add_meta_boxes', array( $this, 'add' ) );
        
        add_action( 'save_post', array( $this, 'save' ) );  
    }

    /**
    * Add Meta Box for multiple post types.
    *
    * @since 1.0.0
    *
    * @access public
    */
    public function add($postType) {
        if( in_array( $postType, $this->meta_box['post_type'] ) ) {
            add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $postType, 'side' );
        }
    }

    /**
    * Renders metabox
    *
    * @since 1.0.0
    *
    * @access public
    */
    public function show() {
        global $post;

        $layout_options      = ecommerce_wp_header_layout();
        $style_options       = ecommerce_wp_header_type();
        
        
        // Use nonce for verification  
        wp_nonce_field( basename( __FILE__ ), 'ecommerce_wp_custom_meta_box_nonce' );

        // Begin the field table and loop  ?>  
        <div id="ecommerce-wp-ui-tabs" class="ui-tabs">
            <ul class="ecommerce-wp-ui-tabs-nav" id="ecommerce-wp-ui-tabs-nav">
                <li><a href="#frag1"><?php esc_html_e( 'Header Layout', 'ecommerce-wp' ); ?></a></li>
                <li><a href="#frag2"><?php esc_html_e( 'Header Style', 'ecommerce-wp' ); ?></a></li>
            </ul> 

            <div id="frag1" class="tabhead">
                <table id="layout-options" class="form-table" width="100%">
                    <tbody>
                        <tr>
                            <?php  
                                $metalayout = get_post_meta( $post->ID, 'ecommerce-wp-header-layout', true );
                                if( empty( $metalayout ) ){
                                    $metalayout = 'storefront';
                                }

                                foreach ( $layout_options as $value => $url ) :
                                    echo '<label>';
                                    echo '<input type="radio" name="ecommerce-wp-header-layout" value="' . esc_attr( $value ) . '" ' . checked( $metalayout, $value, false ) . ' />';
                                    echo '<img src="' . esc_url( $url ) . '"/>';
                                    echo '</label>';
                                endforeach;
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="frag2" class="tabhead">
                <table id="sidebar-metabox" class="form-table" width="100%">
                    <tbody> 
                        <tr>
                            <?php
                            $style = get_post_meta( $post->ID, 'ecommerce-wp-header-style', true );
                            if ( empty( $style ) ){
                                $style = 'shadow';
                            } 
                            foreach ( $style_options as $field => $value ) {  
                            ?>
                                <td style="vertical-align:top;">
                                    <label class="description">
                                        <input type="radio" name="ecommerce-wp-header-style" value="<?php echo esc_attr( $field ); ?>" <?php checked( $style, $field ); ?>/>&nbsp;&nbsp;<?php echo esc_html( $value ); ?>
                                    </label>
                                </td>
                                
                            <?php
                            } // end foreach 
                            ?>
                        </tr>
                    </tbody>
                </table>        
            </div>

        </div>
    <?php 
    }

    /**
     * Save custom metabox data
     * 
     * @action save_post
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function save( $post_id ) { 
    
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'ecommerce_wp_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'ecommerce_wp_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }
      
        foreach ( $this->fields as $field ) {      
            // Checks for input and sanitizes/saves if needed
            if( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
            }
        } // end foreach         
    }
}
$ecommerce_wp_post_types = array( 'page', 'post' );

$ecommerce_wp_metabox = new ecommerce_wp_MetaBox( 
                                    'ecommerce-wp-options',     //metabox id
                                    esc_html__( 'Page Options', 'ecommerce-wp' ), //metabox title
                                    $ecommerce_wp_post_types            //metabox post types
                                    );

/**
 * Enqueue scripts and styles for Metaboxes
 * @uses wp_enqueue_script, and  wp_enqueue_style
 *
 * @since 1.0.0
 */
function ecommerce_wp_enqueue_metabox_scripts( $hook ) {

    if( $hook == 'post.php' || $hook == 'post-new.php'  ){
        //Scripts
        wp_enqueue_script( 'ecommerce-wp-metabox', get_template_directory_uri() . '/js/metabox.js', array( 'jquery', 'jquery-ui-tabs' ), '20201201' );
        //CSS Styles
        wp_enqueue_style( 'ecommerce-wp-metabox-tabs', get_template_directory_uri() . '/css/metabox-tabs.css' );
    }
    return;
}
add_action( 'admin_enqueue_scripts', 'ecommerce_wp_enqueue_metabox_scripts', 11 );
