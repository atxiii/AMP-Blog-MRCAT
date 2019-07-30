<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       mrcatdev.com/about-me
 * @since      1.0.0
 *
 * @package    Amp_Mrcat
 * @subpackage  Amp_Mrcat/admin
 */
global $data;
$data = (get_option('amp_mrcat_form') !== null) ? get_option('amp_mrcat_form') : '';
?>
<div class="mrcat_amp">
    <header>
        <img src="<?php echo plugin_dir_url(__DIR__) ?>images/logo.png" alt="logo" class="logo">
        <h1>MRCat Blog AMP</h1>
    </header>
    <form method="post" action="options.php">
        <?php settings_fields('amp_mrcat_options'); ?>
        <?php do_settings_sections('amp_mrcat_options'); ?>
        <div class="wrap mt-3">
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1" class="tab-label" id="for1"><?php _e('General Option', TEXT_DOMAIN) ?></label>
            <input id="tab2" type="radio" name="tabs">
            <label for="tab2" class="tab-label" id="for2"><?php _e('Appearance', TEXT_DOMAIN) ?></label>
            <input id="tab3" type="radio" name="tabs">
            <label for="tab3" class="tab-label" id="for3"><?php _e('Custom Template', TEXT_DOMAIN) ?></label>
            <input id="tab4" type="radio" name="tabs">
            <label for="tab4" class="tab-label" id="for4"><?php _e('Add Component', TEXT_DOMAIN) ?></label>
            <input id="tab5" type="radio" name="tabs">
            <label for="tab5" class="tab-label" id="for5"><?php _e('Scripts', TEXT_DOMAIN) ?></label>
            <input id="tab6" type="radio" name="tabs">
            <label for="tab6" class="tab-label" id="for6"><?php _e('Schema', TEXT_DOMAIN) ?></label>
            <input id="tab7" type="radio" name="tabs">
            <label for="tab7" class="tab-label" id="for7"><?php _e('Feedback', TEXT_DOMAIN) ?></label>
            <section id="content1">
                <div class="mt-3 d-block">
                </div>
                <table class="form-table">
                    <tbody>
                    <tr>
                        <th rowspan="2">
                            <h2><?php _e('General Option', TEXT_DOMAIN) ?></h2>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="enable_amp"><?php _e('Enable AMP', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="amp_mrcat_form[enable_amp]" id="enable_amp"
                                   value="true" <?php if (isset($data['enable_amp']) && $data['enable_amp'] == true) echo "checked"; ?>>
                            <label for="enable_amp"><?php _e('Enable AMP', TEXT_DOMAIN) ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="enable_amp"><?php _e('Enable for post type ', TEXT_DOMAIN) ?></label>
                            <p class="description">Separated custom post type by ","</p>
                        </th>
                        <td>
                            <input type="text" name="amp_mrcat_form[enable_amp_for]" id="enable_amp_for" class="regular-text"
                                   value="<?php if (isset($data['enable_amp_for'])) echo $data['enable_amp_for'];?>">
                        </td>

                    </tr>
                    <tr>
                        <th>
                            <label for="amp_menu"><?php _e('Select a menu for sidebar', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <select id="amp_menu" name="amp_mrcat_form[amp_menu]" class="regular-text">
                                <?php
                                $menus = get_terms('nav_menu');
                                foreach ($menus as $menu) {
                                    $set_select = isset($data['amp_menu']) && $data['amp_menu'] == true && $data['amp_menu'] == $menu->name;
                                    if ($set_select) {
                                        $selected = "selected";
                                    } else {
                                        $selected = '';
                                    }
                                    echo '<option value="' . $menu->name . '"' . $selected . '>' . $menu->name . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="blog_name"><?php _e('Show blog name in sidebar', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="amp_mrcat_form[blog_name]" id="enable_amp"
                                   value="true" <?php if (isset($data['blog_name']) && $data['blog_name'] == true) echo "checked"; ?>>
                            <label for="blog_name"><?php _e('Enable blog name', TEXT_DOMAIN) ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="breadcrumb"><?php _e('Enable breadcrumb', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <label for="breadcrumb"><?php _e('Header', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[breadcrumb]" id="breadcrumb"
                                   value="Header" <?php if (isset($data['breadcrumb']) && $data['breadcrumb'] == 'Header') echo "checked"; ?>>

                            <label for="breadcrumb"><?php _e('Footer', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[breadcrumb]" id="breadcrumb"
                                   value="Footer" <?php if (isset($data['breadcrumb']) && $data['breadcrumb'] == 'Footer') echo "checked"; ?>>

                            <label for="breadcrumb"><?php _e('Disable', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[breadcrumb]" id="breadcrumb"
                                   value="Disable" <?php if (isset($data['breadcrumb']) && $data['breadcrumb'] == 'Disable') echo "checked"; ?>>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="pagination_title"><?php _e('Enable pagination', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <label for="pagination_title"><?php _e('Just show title', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[pagination_mrcat_amp]" id="pagination_title"
                                   value="pagination_title" <?php if (isset($data['pagination_mrcat_amp']) && $data['pagination_mrcat_amp'] == 'pagination_title') echo "checked"; ?>>

                            <label for="pagination_np"><?php _e('Just show next/previous', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[pagination_mrcat_amp]" id="pagination_np"
                                   value="pagination_np" <?php if (isset($data['pagination_mrcat_amp']) && $data['pagination_mrcat_amp'] == 'pagination_np') echo "checked"; ?>>

                            <label for="pagination_both"><?php _e('Both', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[pagination_mrcat_amp]" id="pagination_both"
                                   value="pagination_both" <?php if (isset($data['pagination_mrcat_amp']) && $data['pagination_mrcat_amp'] == 'pagination_both') echo "checked"; ?>>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="copyright_footer"><?php _e('Show category', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="amp_mrcat_form[category_mrcat_amp]" id="category_mrcat_amp"
                                   value="true" <?php if (isset($data['category_mrcat_amp']) && $data['category_mrcat_amp'] == true) echo "checked"; ?>>
                            <label for="category_mrcat_amp"><?php _e('Show category', TEXT_DOMAIN) ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="copyright_footer"><?php _e('Show tags', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="amp_mrcat_form[tags]" id="tags"
                            <input type="checkbox" name="amp_mrcat_form[tags]" id="tags"
                                   value="true" <?php if (isset($data['tags']) && $data['tags'] == true) echo "checked"; ?>>
                            <label for="tags"><?php _e('Show tags', TEXT_DOMAIN) ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="copyright_footer"><?php _e('Copyright', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="amp_mrcat_form[copyright_footer]" id="copyright_footer"
                                   value="true" <?php if (isset($data['copyright_footer']) && $data['copyright_footer'] == true) echo "checked"; ?>>
                            <label for="copyright_footer"><?php _e('Enable copyright in footer', TEXT_DOMAIN) ?></label>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label for="pwr_by"><?php _e('Powered by', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" name="amp_mrcat_form[pwr_by]" id="pwr_by" class="regular-text"
                                   value="<?php if (isset($data['pwr_by'])) echo $data['pwr_by'] ?>">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </section>
            <section id="content2">
                <table class="form-table">
                    <tbody>
                    <tr>
                        <th rowspan="2">
                            <h2><?php _e('Upload Media', TEXT_DOMAIN) ?></h2>
                            <hr>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="fav_url"><?php _e('Upload favicon', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" name="amp_mrcat_form[fav_url]" id="fav_url" class="regular-text"
                                   value="<?php if (isset($data['fav_url'])) echo $data['fav_url'] ?>">
                            <input type="button" name="fav_url" id="upload-fav" class="btn-media"
                                   value="Upload favicon">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="logo_url"><?php _e('Upload logo', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" name="amp_mrcat_form[logo_url]" id="logo_url" class="regular-text"
                                   value="<?php if (isset($data['logo_url'])) echo $data['logo_url'] ?>">
                            <input type="button" name="logo_url" id="upload-logo" class="btn-media" value="Upload Logo">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="logo_width"><?php _e('Dimensions of logo', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" name="amp_mrcat_form[logo_width]" id="logo_width" class="regular-text"
                                   placeholder="Width must be px (80px)"
                                   value="<?php if (isset($data['logo_width'])) echo $data['logo_width'] ?>">
                            <input type="text" name="amp_mrcat_form[logo_height]" class="regular-text"
                                   placeholder="Height must be px (80px)"
                                   value="<?php if (isset($data['logo_height'])) echo $data['logo_height'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th rowspan="2">
                            <h2><?php _e('Base Colors', TEXT_DOMAIN) ?></h2>
                            <hr>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div id="pColor_pallet"></div>
                            <label for="primary_color"><?php _e('Primary color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('primary_color','pColor_pallet')"
                                   name="amp_mrcat_form[primary-color]"
                                   class="regular-text" id="primary_color" placeholder="Primary Color"
                                   value="<?php if (isset($data['primary-color'])) echo $data['primary-color'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div id="sColor_pallet"></div>

                            <label for="secondary_color"><?php _e('Secondary color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('secondary_color','sColor_pallet')"
                                   name="amp_mrcat_form[secondary-color]"
                                   class="regular-text" id="secondary_color" placeholder="Secondary Color"
                                   value="<?php if (isset($data['secondary-color'])) echo $data['secondary-color'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div id="aColor_pallet"></div>

                            <label for="a_color"><?php _e('Links color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('a_color','aColor_pallet')"
                                   name="amp_mrcat_form[a_color]"
                                   class="regular-text" id="a_color" placeholder="Links Color"
                                   value="<?php if (isset($data['a_color'])) echo $data['a_color'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th rowspan="2">
                            <h2><?php _e('Header and Footer', TEXT_DOMAIN) ?></h2>
                            <hr>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="sticky_top"><?php _e('Sticky menu', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="amp_mrcat_form[sticky_top]" id="sticky_top"
                                   value="true" <?php if (isset($data['sticky_top']) && $data['sticky_top'] == true) echo "checked"; ?>>
                            <label for="sticky_top"><?php _e('Enable sticky menu', TEXT_DOMAIN) ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div id="hfColor_pallet"></div>

                            <label for="hf_bg_color"><?php _e('background color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('hf_bg_color','hfColor_pallet')"
                                   name="amp_mrcat_form[hf_bg_color]"
                                   class="regular-text" id="hf_bg_color" placeholder="Background Color"
                                   value="<?php if (isset($data['hf_bg_color'])) echo $data['hf_bg_color'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div id="fColor_pallet"></div>
                            <label for="hf_font_color"><?php _e('Font color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('hf_font_color','fColor_pallet')"
                                   name="amp_mrcat_form[hf_font_color]"
                                   class="regular-text" id="hf_font_color" placeholder="Color"
                                   value="<?php if (isset($data['hf_font_color'])) echo $data['hf_font_color'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th rowspan="2">
                            <h2><?php _e('Sidebar', TEXT_DOMAIN) ?></h2>
                            <hr>
                        </th>
                    </tr>

                    <tr>
                        <th>
                            <div id="hColor_pallet"></div>
                            <label for="hamburger_color"><?php _e('Hamburger Color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('hamburger_color','hColor_pallet')"
                                   name="amp_mrcat_form[hamburger_color]"
                                   class="regular-text" id="hamburger_color" placeholder="Color"
                                   value="<?php if (isset($data['hamburger_color'])) echo $data['hamburger_color'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="p_hamburger"><?php _e('Position Hamburger', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <label for="p_hamburger_left"><?php _e('left', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[p_hamburger]" id="p_hamburger_left"
                                   value="left" <?php if (isset($data['p_hamburger']) && $data['p_hamburger'] == 'left') echo "checked"; ?>>


                            <label for="p_hamburger_right"><?php _e('right', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[p_hamburger]" id="p_hamburger_right"
                                   value="right" <?php if (isset($data['p_hamburger']) && $data['p_hamburger'] == 'right') echo "checked"; ?>>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="p_sidebar"><?php _e('Position Sidebar', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <label for="p_sidebar_left"><?php _e('left', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[p_sidebar]" id="p_sidebar_left"
                                   value="left" <?php if (isset($data['p_sidebar']) && $data['p_sidebar'] == 'left') echo "checked"; ?>>


                            <label for="p_sidebar_right"><?php _e('right', TEXT_DOMAIN) ?></label>
                            <input type="radio" name="amp_mrcat_form[p_sidebar]" id="p_sidebar_right"
                                   value="right" <?php if (isset($data['p_sidebar']) && $data['p_sidebar'] == 'right') echo "checked"; ?>>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div id="sbcColor_pallet"></div>
                            <label for="body_color_sidebar"><?php _e('Sidebar body color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('body_color_sidebar','sbcColor_pallet')"
                                   name="amp_mrcat_form[body_color_sidebar]"
                                   class="regular-text" id="body_color_sidebar" placeholder="Sidebar font color"
                                   value="<?php if (isset($data['body_color_sidebar'])) echo $data['body_color_sidebar'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div id="sidebarColor_pallet"></div>
                            <label for="bg_color_top_sidebar"><?php _e('Top background Color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('bg_color_top_sidebar','sidebarColor_pallet')"
                                   name="amp_mrcat_form[bg_color_top_sidebar]"
                                   class="regular-text" id="bg_color_top_sidebar" placeholder="Sidebar background color"
                                   value="<?php if (isset($data['bg_color_top_sidebar'])) echo $data['bg_color_top_sidebar'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div id="sfColor_pallet"></div>
                            <label for="font_color_sidebar"><?php _e('Font color', TEXT_DOMAIN) ?></label>
                        </th>
                        <td>
                            <input type="text" onclick="setColor('font_color_sidebar','sfColor_pallet')"
                                   name="amp_mrcat_form[font_color_sidebar]"
                                   class="regular-text" id="font_color_sidebar" placeholder="Sidebar font color"
                                   value="<?php if (isset($data['font_color_sidebar'])) echo $data['font_color_sidebar'] ?>">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </section>
            <section id="content3">
                <div class="d-block my-3">
                    <input type="checkbox" name="amp_mrcat_form[enable_custom_css]" id="enable_custom_css"
                           value="true" <?php if (isset($data['enable_custom_css']) && $data['enable_custom_css'] == true) echo "checked"; ?>>
                    <label for="enable_custom_css"><?php _e('ADD CSS', TEXT_DOMAIN) ?></label>
                </div>
                <div class="warning">
                    <?php _e('You may never use any of the following properties:', TEXT_DOMAIN) ?>
                    <code>behavior:</code>
                    <code>overflow: scroll</code>
                    <code>overflow: auto</code>
                    <code>transition:</code>
                    <code>filter</code>
                    <code>animation</code>
                    <code>-moz-binding</code>
                    , Also usage of the <code>!important</code> qualifier is not allowed. This is a necessary
                    requirement to
                    enable
                    AMP to enforce its element sizing invariants.
                    <details>
                        <summary>More details before starting</summary>
                        <a href="https://github.com/ampproject/amphtml/blob/master/spec/amp-html-format.md#stylesheets"
                           target="_blank" title="styleSheet">Read More</a>
                    </details>
                </div>

                <br>
                <textarea rows="15" cols="90" width="100%" name="amp_mrcat_form[custom-css]"
                          placeholder="Custom CSS..."><?php if (isset($data['custom-css'])) echo $data['custom-css']; ?></textarea>
                <hr class="my-3">
                <div class="my-3 d-block">
                    <input type="checkbox" name="amp_mrcat_form[enable_new_css]" id="enable_new_css"
                           value="true" <?php if (isset($data['enable_new_css']) && $data['enable_new_css'] == true) echo "checked"; ?>>
                    <label for="enable_new_css"><?php _e('New CSS', TEXT_DOMAIN) ?></label>
                </div>
                <div class="warning">
                    <p><?php _e('When This section enabling all css default destroy and you must write css from zero for all elements', TEXT_DOMAIN) ?></p>
                </div>
                <textarea rows="15" cols="90" width="100%" name="amp_mrcat_form[new_css]"
                          placeholder="Write Your code..."><?php if (isset($data['new_css'])) echo $data['new_css']; ?></textarea>
            </section>
            <section id="content4">
                <div class="my-3 d-block">
                    <h2><?php _e('Components', TEXT_DOMAIN) ?></h2>
                    <input type="checkbox" name="amp_mrcat_form[components_status]" id="components_status"
                           value="true" <?php if (isset($data['components_status']) && $data['components_status'] == true) echo "checked"; ?>>
                    <label for="components_status"><?php _e('Enable custom component', TEXT_DOMAIN) ?></label>
                    <details>
                        <summary><?php _e('See all components of AMP', TEXT_DOMAIN) ?></summary>
                        <a href="https://amp.dev/documentation/components/?format=websites" target="_blank"
                           title="Components">Reference</a>
                    </details>
                </div>
                <textarea rows="15" cols="90" width="100%" name="amp_mrcat_form[component]"
                          placeholder="Components here..."><?php if (isset($data['component'])) echo $data['component']; ?></textarea>
            </section>
            <section id="content5">
                <div class="my-3 d-block">
                    <h2><?php _e('Call Tracking', TEXT_DOMAIN) ?></h2>
                     <table  class="form-table">
                         <tbody>
                         <tr>
                             <th>  <label for="enable_call_tracking"><?php _e('Enable call tracking', TEXT_DOMAIN) ?></label></th>
                             <td><input type="checkbox" name="amp_mrcat_form[enable_call_tracking]" id="enable_call_tracking"
                                        value="true" <?php if (isset($data['enable_call_tracking']) && $data['enable_call_tracking'] == true) echo "checked"; ?>>
                                 <label for="enable_call_tracking"><?php _e('Enable call tracking', TEXT_DOMAIN) ?></label></td>
                         </tr>
                         <tr>
                             <th>
                                 <label for="show_call_tracking_footer"><?php _e('Show phone number in footer', TEXT_DOMAIN) ?></label>
                             </th>
                             <td>
                                 <input type="checkbox" name="amp_mrcat_form[show_call_tracking_footer]"
                                        id="show_call_tracking_footer"
                                        value="true" <?php if (isset($data['show_call_tracking_footer']) && $data['show_call_tracking_footer'] == true) echo "checked"; ?>>
                                 <label for="show_call_tracking_footer"><?php _e('Show phone number in footer', TEXT_DOMAIN) ?></label>
                             </td>
                         </tr>
                         <tr>
                             <th>
                                 <label for="number_replace"><?php _e('Number tracking', TEXT_DOMAIN) ?></label>
                                 <p class="description"><?php _e('This number replace with below script of call tracking',TEXT_DOMAIN) ?></p>
                             </th>
                             <td>
                                 <input class="regular-text" type="text" name="amp_mrcat_form[number_replace]" id="number_replace"
                                        value="<?php if (isset($data['number_replace'])) echo $data['number_replace']?>" placeholder="+1-123-123-1234">
                             </td>
                         </tr>
                         </tbody>
                     </table>
                </div>
                <textarea rows="15" cols="90" width="100%" name="amp_mrcat_form[call_tracking]"
                          placeholder="Custom code for swap in your tracking number..."><?php if (isset($data['call_tracking'])) echo $data['call_tracking']; ?></textarea>
                <hr class="my-3">
                <div class="my-3 d-block">
                    <h2><?php _e('Google Analytics', TEXT_DOMAIN) ?></h2>
                    <input type="checkbox" name="amp_mrcat_form[enable_ga]" id="enable_ga"
                           value="true" <?php if (isset($data['enable_ga']) && $data['enable_ga'] == true) echo "checked"; ?>>
                    <label for="enable_ga"><?php _e('Enable google analytics', TEXT_DOMAIN) ?></label>
                </div>
                <div class="warning">
                    <details>
                        <summary><?php _e('More details about AMP google analytics', TEXT_DOMAIN) ?></summary>
                        <a href="https://amp.dev/documentation/components/amp-analytics?format=websites" target="_blank"
                           title="Google Analytic">Reference</a>
                        <br class="my-3">
                        Example:<br class="my-3"><code>&lt;script type=&quot;application/json&quot;&gt; { &quot;requests&quot;:
                            {
                            &quot;event&quot;: &quot;https://amp-publisher-samples-staging.herokuapp.com/amp-analytics/ping?user=[[.]]&amp;account=ampbyexample&amp;event=${eventId}&quot;
                            }, &quot;triggers&quot;: { &quot;trackPageview&quot;: { &quot;on&quot;: &quot;visible&quot;,
                            &quot;request&quot;:
                            &quot;event&quot;, &quot;visibilitySpec&quot;: { &quot;selector&quot;: &quot;#cat-image-id&quot;,
                            &quot;visiblePercentageMin&quot;:
                            20, &quot;totalTimeMin&quot;: 500, &quot;continuousTimeMin&quot;: 200 }, &quot;vars&quot;: {
                            &quot;eventId&quot;:
                            &quot;catview&quot; } } } } &lt;/script&gt;</code>
                    </details>
                </div>
                <textarea rows="15" cols="90" width="100%" name="amp_mrcat_form[ga]"
                          placeholder="analytics data..."><?php if (isset($data['ga'])) echo $data['ga']; ?></textarea>
            </section>
            <section id="content6">
                <h2><?php _e('Schema', TEXT_DOMAIN) ?></h2>

                <label for="schema_gen" style="display: inline-block;margin: 20px 0;"><?php _e('Auto Generate', TEXT_DOMAIN) ?></label>
                <input type="checkbox" name="amp_mrcat_form[schema_gen]" id="schema_status"
                       value="true" <?php if (isset($data['schema_gen']) && $data['schema_gen'] == true) echo "checked"; ?>>
                <br>
                <label for="schema_status" style="display: inline-block;margin: 20px 0;"><?php _e('Enable Schema', TEXT_DOMAIN) ?></label>
                <input type="checkbox" name="amp_mrcat_form[schema_status]" id="schema_status"
                       value="true" <?php if (isset($data['schema_status']) && $data['schema_status'] == true) echo "checked"; ?>>




                <details>
                    <summary><?php _e('See more schema for AMP', TEXT_DOMAIN) ?></summary>
                    <a href="https://developers.google.com/search/docs/data-types/article?hl=en&visit_id=636976337502375390-2681341447&rd=1#amp-sd"
                       target="_blank"
                       title="schema">Reference</a>
                </details>
                <textarea rows="15" cols="90" width="100%" name="amp_mrcat_form[schema]"
                          placeholder="Schema here..."><?php if (isset($data['schema'])) echo $data['schema']; ?></textarea>
            </section>

            <section id="content7">
                <h2>Send Feedback</h2>
                <p>Hi there,
                    My name is Hosein Shurabi and I'm developer MRCAT BLOG AMP. Thank you for the installation of this plugin.
                </p>
                <p>
                    The good product grows with customer feedback and resolving them cause happiness and increase customer confidence.
                </p>
                <p> <a href="https://forms.gle/ca6b6dD1hsaiAivY8" rel="nofollow" target="_blank">Send feedback!</a></p>
            </section>

        </div>
        <?php submit_button(); ?>
    </form>
</div>
<script>
    function setColor(id, pallet) {
        const color = Pickr.create({
            el: '#' + pallet,
            swatches: [
                'rgba(244, 67, 54, 1)',
                'rgba(233, 30, 99, 0.95)',
                'rgba(156, 39, 176, 0.9)',
                'rgba(103, 58, 183, 0.85)',
                'rgba(63, 81, 181, 0.8)',
                'rgba(33, 150, 243, 0.75)',
                'rgba(3, 169, 244, 0.7)',
                'rgba(0, 188, 212, 0.7)',
                'rgba(0, 150, 136, 0.75)',
                'rgba(76, 175, 80, 0.8)',
                'rgba(139, 195, 74, 0.85)',
                'rgba(205, 220, 57, 0.9)',
                'rgba(255, 235, 59, 0.95)',
                'rgba(255, 193, 7, 1)'
            ],
            components: {
                // Main components
                preview: true,
                opacity: true,
                hue: true,
                // Input / output Options
                interaction: {
                    hex: true,
                    rgba: true,
                    hsla: false,
                    hsva: false,
                    cmyk: false,
                    input: true,
                    clear: true,
                    save: true
                }
            }
        });
        color.show();
        color.on('save', (...args) => {
            document.getElementById(id).value = args[0].toHEXA().toString();
        });
    }
</script>