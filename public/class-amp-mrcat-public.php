<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       mrcatdev.com/about-me
 * @since      1.0.0
 *
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Amp_Mrcat
 * @subpackage Amp_Mrcat/public
 * @author     hosein shurabi <hoseinshurabi@gmail.com>
 */
class Amp_Mrcat_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;


    public $tree;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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

        //	wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/amp-mrcat-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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

        //	wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/amp-mrcat-public.js', array('jquery'), $this->version, false);
    }

    /*
     *
     *
     * Action for Menu
     *
     *
     */
    public function func_wp_amp_menu($name_menu)
    {
        $menu = wp_get_nav_menu_items($name_menu);
        echo $this->print_menu($this->rebuild($menu));
        // print_r($this->rebuild($menu));
    }

    public function rebuild($nav_items, $tree = null)
    {
        $this->nav_items = $nav_items;
        if (!isset($tree)) {
            $tree = (object)['children' => []];
        } else if (!isset($tree->children)) {
            $tree->children = [];
        }

        if (is_array($this->nav_items) || is_object($this->nav_items)) {
            foreach ($this->nav_items as $index => $item) {
                if (
                    isset($tree->ID) == false && $item->menu_item_parent == 0 || (isset($tree->ID) && $item->menu_item_parent == $tree->ID)
                ) {
                    array_splice($this->nav_items, $index, 1);
                    $this->rebuild($this->nav_items, $item);
                    array_push($tree->children, $item);
                }
            }
        }

        return $tree;
    }

    public function print_menu($tree)
    {
        if (isset($tree->children) && count($tree->children) > 0) {
            $arr_tree_children = $tree->children;
            foreach ($arr_tree_children as $child) {
                if ($child->menu_item_parent == 0) {
                    return '<ul class="tree">' . $this->print_menu_nodes($tree->children) . '</ul>';
                } else {
                    return '<amp-accordion layout="container" disable-session-states="" class="ampstart-dropdown border-0 ">
				<section>
					<header class="title-accordion menu-color">' . $tree->title . '</header>
					<ul class="ampstart-dropdown-items list-reset m0 p0 bg-f8 ' . join(' ', $tree->classes) . '">
					' . $this->print_menu_nodes($tree->children) . '
					</ul>
				</section>
				</amp-accordion>
				';
                }
            }
        }
    }

    public function print_menu_node($item)
    {
        $rel = !empty($item->xfn) ? "rel=" . $item->xfn . " " : '';
        $classes = !empty($item->classes) ? 'class="' . join(' ', $item->classes) . '"' : null;
        if (count($item->children) > 0) {
            $link_a =
                '<a  style="display:none"' . 'id="p_' . $item->ID . "_" . $item->menu_item_parent . '"' . 'href="' . $item->url . '"' . $classes . $rel . 'title="' . $item->title . '">' .
                $item->title .
                '</a>';
        } else {
            $link_a =
                '<a ' . 'id="p_' . $item->ID . "_" . $item->menu_item_parent . '"' . 'href="' . $item->url . '"' . 'class="title-accordion ' . join(' ', $item->classes) . '" ' . $rel . 'title="' . $item->title . '">' .
                $item->title .
                '</a>';
        }
        return '<li>' . $link_a . $this->print_menu($item) . '</li>';
    }

    public function print_menu_nodes($items)
    {
        return join(array_map(array($this, 'print_menu_node'), $items), '');
    }

    /*
     *
     *
     * Action for Breadcrumb
     *
     *
     */
    public function func_wp_amp_breadcrumb($list_item)
    {
        ob_start();


        $k = 1;
        $total = count($list_item);
        ob_start();
        $breadcrumb = '<ol id="breadcrumbs">';
        foreach ($list_item as $key => $value) {
            if ($total > $k) {
                $breadcrumb .= '<li><a href="' . $value . '">' . $key .'» </a></li>';
            } else {
                $breadcrumb .= '<li>' . $key . '</li>';
            }
            $k++;
        }
        $breadcrumb .= '</ol>';
        ob_end_flush();
        echo $breadcrumb;
    }

}
