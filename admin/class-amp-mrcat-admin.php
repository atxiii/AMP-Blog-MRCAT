<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       mrcatdev.com/about-me
 * @since      1.0.0
 *
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/admin
 * @author     Hosein Shurabi <hoseinshurabi@gmail.com>
 */
class Amp_Mrcat_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Amp_Mrcat_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Amp_Mrcat_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/amp-mrcat-admin.css', array(), $this->version, 'all');
        wp_enqueue_style($this->plugin_name . 'color-picker-style', 'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/default.min.css', array(), $this->version, 'all');
    }
    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Amp_Mrcat_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Amp_Mrcat_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        if (is_admin()) {
            wp_enqueue_script($this->plugin_name . 'color-picker-script', 'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js', array('jquery'), $this->version, false);
            wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/amp-mrcat-admin.js', array('jquery'), $this->version, false);
        }
    }
    /*
     *
     *
     *
     * Menu admin panel
     *
     *
     *
     */
    public function add_menu_amp_mrcat()
    {
        add_menu_page('AMP', 'AMP', 'manage_options', 'amp_mrcat_admin_panel', array($this, 'amp_mrcat_admin_panel_func'), plugin_dir_url(__FILE__) . 'images/icon-logo.ico');
        add_submenu_page('amp_mrcat_admin_panel', 'General', 'General Option', 'manage_options', 'amp_mrcat_admin_panel');
    }
    /*
     *
     *
     * register setting admin panel
     *
     *
     *
     */
    public function register_fields_amp_mrcat()
    {
        register_setting('amp_mrcat_options', 'amp_mrcat_form');
        update_option('amp_mrcat_form[enable_amp]',true);

    }

    /*
     *
     *
     *
     * page general
     *
     *
     *
     */
    public function amp_mrcat_admin_panel_func()
    {
        include plugin_dir_path(__FILE__) . 'partials/amp-mrcat-admin-panel-page.php';
    }
    /*
     *
     *
     *
     *
     *
     * Add Query Var for AMP
     *
     *
     *
     *
     */
    public function add_query_vars($vars)
    {
        $vars[] = "amp";
        return $vars;
    }
    /*
     *
     *
     *
     *
     * Add endPoint AMP	[Posts]
     *
     *
     *
     *
     */
    public function add_endpoint()
    {
        add_rewrite_endpoint('amp', EP_PERMALINK, true);
        flush_rewrite_rules();
    }
    /*
     *
     *
     *
     *
     *add rel amp template to canonical post
     *
     *
     *
     *
     */
    public function custom_amp_add_amptml_meta()
    {
        global $data;
        $data = get_option('amp_mrcat_form');
        if(isset($data['enable_amp_for'])){
            $arr_amp_for = trim($data['enable_amp_for']);
            $arr_amp_for = explode(',' , $arr_amp_for);
            array_push($arr_amp_for,'post');
        }else{
            $arr_amp_for = 'post';
        }
        if (is_singular($arr_amp_for) && isset($data['enable_amp']) && $data['enable_amp'] == true) {
            $current_url = get_permalink();
            $amp_current_url = $current_url . 'amp/';
            echo '<link rel="amphtml" href="' . $amp_current_url . '">';
        }
    }
    /*
     *
     *
     *
     *
     *
     *template default for amp
     *
     *
     *
     *
     */
    public function amp_template($template)
    {
        if (get_query_var('amp', false) !== false) {
            if (is_single()) {
                $template = plugin_dir_path(__DIR__) . 'template/amp-single.php';
            }
        }
        return $template;
    }
    /*
     *
     *
     *
     *
     * remove all filters & convert tag html to amp
     * TODO: add other tag to convert
     *
     *
     *
     *
     */
    public function remove_plugin_filter()
    {
        global $wp_query;
        if (isset($wp_query->query_vars['amp'])) {
            remove_all_filters('the_content', 'plugin_filters');
        }
    }
    public function regex_content($content)
    {
        global $wp_query;
        if (isset($wp_query->query_vars['amp'])) {

            $content = preg_replace('/figure/', 'section', $content);
            $content = preg_replace('/!important/', '', $content);
            $content = preg_replace('/style=".*?"/', '', $content);
            $content = preg_replace('/align=".*?"/', '', $content);
            $content = preg_replace('/class=".*?"/', '', $content);

            if (preg_match('/<col(.*?)\/?>/', $content)) {
                $content = preg_replace('/width=".*?"/', '', $content);
            }
            if (preg_match('/<td(.*?)\/?>/', $content)) {
                $content = preg_replace('/nowrap=".*?"/', '', $content);
                $content = preg_replace('/width=".*?"/', '', $content);
                $content = preg_replace('/height=".*?"/', '', $content);
            }

            if (preg_match('/<table(.*?)\/?>/', $content)) {
                $content = preg_replace('/width=".*?"/', '', $content);
                $content = preg_replace('/height=".*?"/', '', $content);
            }
            if (preg_match('/<iframe(.*?)\/?>/', $content)) {
                $pattern_iframe = '/src="https:\/\/www.youtube.com\/embed\/([^"]+)?\?feature=oembed/';
                preg_match($pattern_iframe, $content, $pt_ifrm_output);
                $content = preg_replace('/<iframe(.*?)\/?>/', '<amp-youtube width="480"
				height="270"
				layout="responsive"
				data-videoid="' . $pt_ifrm_output[1] . '">
			    </amp-youtube>', $content);
            }
            if (preg_match('/<img(.*?)\/? height=[^>]*>/', $content)) {
                $content = preg_replace('/<img(.*?)\/?>/', '<div class="w-img my-3 position-relative"><amp-img$1  tabindex="0" on="tap:imgLightBox" role="button"  layout="intrinsic"> </amp-img></div>', $content);
            } else {
                $content = preg_replace('/style=[^>]*/', '', $content);
                $content = preg_replace('/style=".*?"/', '', $content);
                $content = preg_replace('/sizes=[^>]*/', '', $content);
                $content = preg_replace('/<img(.*?)\/?>/', '<div class="w-img my-3 position-relative"><amp-img$1 sizes="(max-width: 1023px) 100vw, 600px" height="683px" width="1024px"  tabindex="0" on="tap:imgLightBox" role="button"  layout="intrinsic"> </amp-img></div>', $content);
            }
            if (preg_match('/<video(.*?)\/?>/', $content)) {
                $content = preg_replace('/<video(.*?)\/?>/', '<amp-video$1  height="400px" width="200px" 
				layout="responsive">
			    </amp-video>', $content);
            }
            if (preg_match('/<audio(.*?)\/?>/', $content)) {
                $content = preg_replace('/<audio(.*?)\/?>/', '<amp-audio$1  height="50px" width="auto">
			    </amp-audio>', $content);
            }
            $a_tel_pattern ='/<a href="tel:.*?a>/';
            if(preg_match($a_tel_pattern,$content,$tel_number)){
                $data = (get_option('amp_mrcat_form') !== null) ? get_option('amp_mrcat_form') : '';

                     if (isset($data['enable_call_tracking']) && $data['enable_call_tracking']==true){
                         if(strpos($tel_number[0],$data['number_replace']) !== false){
                            if (isset($data['call_tracking'])) $script_call_tracking = $data['call_tracking'];
                            $content = preg_replace('/<a href="tel:.*?a>/', $script_call_tracking , $content);
                        }
                    }

            }
            return $content;
        } else {
            return $content;
        }
    }
    /*
     *
     *
     *
     *
     * add special widget
     *
     *
     *
     */
    public function widgets_init_amp_mrcat()
    {
        register_sidebar(array(
            'id'          => 'amp-footer',
            'name'        => __('AMP Footer', TEXT_DOMAIN),
            'description' => __('This sidebar is located on amp page.Must use amp tags.', TEXT_DOMAIN),
        ));
    }
    /*
     *
     *
     *
     * add upload media
     *
     *
     *
     */
    public function load_amp_mrcat_media_files()
    {
        wp_enqueue_media();
    }

    /*
     *
     *
     *
     * update cache
     *
     *
     *
     *
     */
    public function amp_mrcat_update_cache(){
        require_once plugin_dir_path(__FILE__)."admin/partials/lib/ivsAMPCacheUpdate.php";
        header("Content-Type: text/plain; charset=utf-8");
        $domain = get_site_url();
        //echo $domain;
        $urls = [];
        $urls=[
            'http://mrcat.mastergoogle.com/test/amp/' ,
            'http://mrcat.mastergoogle.com/hello-world/amp/'
        ];
        // $args = array('post_type' => 'post', 'posts_per_page' => -1 );
        // $loop = new WP_Query($args);
        // if( $loop->have_posts() ):
        // 	while( $loop->have_posts() ):
        // 		$loop->the_post();
        // 		global $post;
        // 		$urls .= get_permalink($post->ID)."/amp/";
        // 	endwhile;
        // endif;
        // wp_reset_query();
        //var_dump($urls);
        $pemFileName ="key";
        $cache = new Lib\IVS_AMP_CACHE_UPDATE(
            $domain,
            $urls,
            $pemFileName);
        $cache->update();
    }

}

