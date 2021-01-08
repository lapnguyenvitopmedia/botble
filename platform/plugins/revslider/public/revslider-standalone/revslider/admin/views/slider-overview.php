<?php

if (!defined('ABSPATH')) exit();

$orders = false;
//order=asc&ot=name&type=reg
if (isset($_GET['ot']) && isset($_GET['order']) && isset($_GET['type'])) {
    $order = array();
    switch ($_GET['ot']) {
        case 'alias':
            $order['alias'] = ($_GET['order'] == 'asc') ? 'ASC' : 'DESC';
            break;
        case 'favorite':
            $order['favorite'] = ($_GET['order'] == 'asc') ? 'ASC' : 'DESC';
            break;
        case 'name':
        default:
            $order['title'] = ($_GET['order'] == 'asc') ? 'ASC' : 'DESC';
            break;
    }

    $orders = $order;
}


$slider = new RevSlider();
$operations = new RevSliderOperations();
$arrSliders = $slider->getArrSliders($orders);
$glob_vals = $operations->getGeneralSettingsValues();

$addNewLink = self::getViewUrl(RevSliderAdmin::VIEW_SLIDER);


$fav = get_option('rev_fav_slider', array());
if ($orders == false) { //sort the favs to top
    if (!empty($fav) && !empty($arrSliders)) {
        $fav_sort = array();
        foreach ($arrSliders as $skey => $sort_slider) {
            if (in_array($sort_slider->getID(), $fav)) {
                $fav_sort[] = $arrSliders[$skey];
                unset($arrSliders[$skey]);
            }
        }
        if (!empty($fav_sort)) {
            //revert order of favs
            krsort($fav_sort);
            foreach ($fav_sort as $fav_arr) {
                array_unshift($arrSliders, $fav_arr);
            }
        }
    }
}

global $revSliderAsTheme;

$exampleID = '"slider1"';
if (!empty($arrSliders))
    $exampleID = '"' . $arrSliders[0]->getAlias() . '"';

$latest_version = get_option('revslider-latest-version', RevSliderGlobals::SLIDER_REVISION);
$stable_version = get_option('revslider-stable-version', '4.1');

$cur_js = get_option('revslider-latest-version-jquery', '-');
$latest_js = get_option('revslider-latest-version-jquery', '-');


?>

    <div class='wrap'>
        <div class="clear_both"></div>
        <div class="title_line" style="margin-bottom:10px">
            <?php
            $icon_general = '<div class="icon32" id="icon-options-general"></div>';
            echo apply_filters('rev_icon_general_filter', $icon_general);
            ?>
            <a href="<?php echo RevSliderGlobals::LINK_HELP_SLIDERS; ?>" class="button-secondary float_right mtop_10 mleft_10" target="_blank"><?php _e("Help", 'revslider'); ?></a>
        </div>

        <div class="clear_both"></div>

        <div class="title_line nobgnopd" style="height:auto; min-height:50px">
            <div class="view_title">
                <?php _e("Revolution Sliders", 'revslider'); ?>
            </div>
            <div class="slider-sortandfilter">
                <span class="slider-listviews slider-lg-views" data-type="rs-listview"><i class="eg-icon-align-justify"></i></span>
                <span class="slider-gridviews slider-lg-views active" data-type="rs-gridview"><i class="eg-icon-th"></i></span>
                <span class="slider-sort-drop"><?php _e("Sort By:", 'revslider'); ?></span>
                <select id="sort-sliders" name="sort-sliders" style="max-width: 105px;" class="withlabel">
                    <option value="id" selected="selected"><?php _e("By ID", 'revslider'); ?></option>
                    <option value="name"><?php _e("By Name", 'revslider'); ?></option>
                    <option value="type"><?php _e("By Type", 'revslider'); ?></option>
                    <option value="favorit"><?php _e("By Favorit", 'revslider'); ?></option>
                </select>

                <span class="slider-filter-drop"><?php _e("Filter By:", 'revslider'); ?></span>

                <select id="filter-sliders" name="filter-sliders" style="max-width: 105px;" class="withlabel">
                    <option value="all" selected="selected"><?php _e("All", 'revslider'); ?></option>
                    <option value="gallery"><?php _e("Gallery", 'revslider'); ?></option>
                    <option value="vimeo"><?php _e("Vimeo", 'revslider'); ?></option>
                    <option value="youtube"><?php _e("YouTube", 'revslider'); ?></option>
                    <option value="twitter"><?php _e("Twitter", 'revslider'); ?></option>
                    <option value="facebook"><?php _e("Facebook", 'revslider'); ?></option>
                    <option value="instagram"><?php _e("Instagram", 'revslider'); ?></option>
                    <option value="flickr"><?php _e("Flickr", 'revslider'); ?></option>
                </select>
            </div>
            <div style="width:100%;height:1px;float:none;clear:both"></div>
        </div>


        <!--
	THE INFO ABOUT EMBEDING OF THE SLIDER
	-->
        <div class="rs-dialog-embed-slider" title="<?php _e("Embed Slider", 'revslider'); ?>" style="display: none;">
            <div class="revyellow" style="background: none repeat scroll 0% 0% #F1C40F; left:0px;top:55px;position:absolute;height:205px;padding:20px 10px;"><i style="color:#fff;font-size:25px" class="revicon-arrows-ccw"></i></div>
            <div style="margin:5px 0px; padding-left: 55px;">
                <div style="font-size:14px;margin-bottom:10px;"><strong><?php _e("Standard Embeding", 'revslider'); ?></strong></div>
                <?php _e("To", 'revslider'); ?> <b><?php _e("include slider embed library", 'revslider'); ?></b> <?php _e("use this code", 'revslider'); ?>:<br />
                <code><?php echo htmlentities("<?php include 'embed.php'; ?>"); ?></code>
                <div style="width:100%;height:10px"></div>
                <?php _e("To", 'revslider'); ?> <b><?php _e("add CSS and JS libraries to html header", 'revslider'); ?></b> <?php _e("use this code", 'revslider'); ?>:<br />
                <code><?php echo htmlentities("<?php RevSliderEmbedder::headIncludes(); ?>"); ?></code>
                <div style="width:100%;height:10px"></div>
                <?php _e("To", 'revslider'); ?> <b><?php _e("insert slider to your page", 'revslider'); ?></b> <?php _e("use this code", 'revslider'); ?>:<br />
                <code><?php echo htmlentities("<?php RevSliderEmbedder::putRevSlider('"); ?><span class="rs-example-alias">alias</span><?php echo htmlentities("'); ?>"); ?></code>
            </div>
        </div>

        <?php
        if (check_for_jquery_addon()) {
            $no_sliders = false;
            if (empty($arrSliders)) {
                ?>
                <span style="display:block;margin-top:15px;margin-bottom:15px;">
                    <?php _e("No Sliders Found", 'revslider'); ?>
                </span>
        <?php
                $no_sliders = true;
            }

            require self::getPathTemplate('sliders-list');

            $cur_js = get_option('revslider-js-version', '1');
        } else {
            $cur_js = '-';
        }

        ?>
        <div style="width:100%;height:40px;display:block"></div>

        <?php
        $isShowDashboard = true;
        $isShowDashboard = apply_filters('revslider_overview_show_dashboard', $isShowDashboard);
        if ($isShowDashboard) :
            ?>
            <!-- DASHBOARD -->
            <div class="rs-dashboard">
                <?php
                    $validated = get_option('revslider-valid', 'false');
                    $temp_active = get_option('revslider-temp-active', 'false');
                    $code = get_option('revslider-code', '');
                    //$email = get_option('revslider-email', '');
                    $latest_version = get_option('revslider-latest-version', RevSliderGlobals::SLIDER_REVISION);

                    $activewidgetclass = $validated === 'true' ? "rs-status-green-wrap" : "rs-status-red-wrap";
                    $activewidgetclass = $temp_active === 'true' ? "rs-status-orange-wrap" : $activewidgetclass;

                    // get_instance()->load->view('admin/welcome_page');

                    $js_validated = get_option('jquery-plugin-code-activated', 'false');

                    ?>

                <!--
		THE CURRENT AND NEXT VERSION
		-->
                <?php

                    $latest_js = get_option('revslider-latest-version-jquery', '1.1');

                    if (version_compare(RevSliderGlobals::SLIDER_REVISION, $latest_version, '<') || version_compare($cur_js, $latest_js, '<')) {
                        $updateclass = 'rs-status-orange-wrap';
                    } else {
                        $updateclass = 'rs-status-green-wrap';
                    }
                    ?>

                <div class="tp-clearfix"></div>
            </div>
            <!-- END OF RS DASHBOARD -->
        <?php endif; ?>

    </div>

    <!-- Import slider dialog -->
    <div id="dialog_import_slider" title="<?php _e("Import Slider", 'revslider'); ?>" class="dialog_import_slider" style="display:none">
        <form action="<?php echo RevSliderBase::$url_ajax; ?>" enctype="multipart/form-data" method="post" id="form-import-slider-local">
            <br>
            <input type="hidden" name="action" value="revslider_ajax_action">
            <input type="hidden" name="client_action" value="import_slider_slidersview">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("revslider_actions"); ?>">
            <?php _e("Choose the import file", 'revslider'); ?>:
            <br>
            <input type="file" size="60" name="import_file" class="input_import_slider">
            <br><br>
            <span style="font-weight: 700;"><?php _e("Note: styles templates will be updated if they exist!", 'revslider'); ?></span><br><br>
            <table>
                <tr>
                    <td><?php _e("Custom Animations:", 'revslider'); ?></td>
                    <td><input type="radio" name="update_animations" value="true" checked="checked"> <?php _e("Overwrite", 'revslider'); ?></td>
                    <td><input type="radio" name="update_animations" value="false"> <?php _e("Append", 'revslider'); ?></td>
                </tr>
                <tr>
                    <td><?php _e("Custom Navigations:", 'revslider'); ?></td>
                    <td><input type="radio" name="update_navigations" value="true" checked="checked"> <?php _e("Overwrite", 'revslider'); ?></td>
                    <td><input type="radio" name="update_navigations" value="false"> <?php _e("Append", 'revslider'); ?></td>
                </tr>
                <?php
                $single_page_creation = RevSliderFunctions::getVal($glob_vals, "single_page_creation", "off");
                ?>
                <tr style="<?php echo ($single_page_creation == 'on') ? '' : 'display: none;'; ?>">
                    <td><?php _e('Create Blank Page:', 'revslider'); ?></td>
                    <td><input type="radio" name="page-creation" value="true"> <?php _e('Yes', 'revslider'); ?></td>
                    <td><input type="radio" name="page-creation" value="false" checked="checked"> <?php _e('No', 'revslider'); ?></td>
                </tr>
            </table>
            <br>
            <input type="submit" class="button-primary revblue tp-be-button rev-import-slider-button" style="display: none;" value="<?php _e("Import Slider", 'revslider'); ?>">
        </form>
    </div>

    <div id="dialog_duplicate_slider" class="dialog_duplicate_layer" title="<?php _e('Duplicate', 'revslider'); ?>" style="display:none;">
        <div style="margin-top:14px">
            <span style="margin-right:15px"><?php _e('Title:', 'revslider'); ?></span><input id="rs-duplicate-animation" type="text" name="rs-duplicate-animation" value="" />
        </div>
    </div>

    <div id="dialog_duplicate_slider_package" class="dialog_duplicate_layer" title="<?php _e('Duplicate', 'revslider'); ?>" style="display:none;">
        <div style="margin-top:14px">
            <span style="margin-right:15px"><?php _e('Prefix:', 'revslider'); ?></span><input id="rs-duplicate-prefix" type="text" name="rs-duplicate-prefix" value="" />
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            RevSliderAdmin.initSlidersListView();
            RevSliderAdmin.initNewsletterRoutine();

            jQuery('#benefitsbutton').hover(function() {
                jQuery('#benefitscontent').slideDown(200);
            }, function() {
                jQuery('#benefitscontent').slideUp(200);
            });

            jQuery('#why-subscribe').hover(function() {
                jQuery('#why-subscribe-wrapper').slideDown(200);
            }, function() {
                jQuery('#why-subscribe-wrapper').slideUp(200);
            });

            jQuery('#tp-validation-box').click(function() {
                jQuery(this).css({
                    cursor: "default"
                });
                if (jQuery('#rs-validation-wrapper').css('display') == "none") {
                    jQuery('#tp-before-validation').hide();
                    jQuery('#rs-validation-wrapper').slideDown(200);
                }
            });
        });

        jQuery('body').on('click', '.rs-dash-more-info', function() {
            var btn = jQuery(this),
                p = btn.closest('.rs-dash-widget-inner'),
                tmb = btn.data('takemeback'),
                btxt = '';

            btxt = btxt + '<div class="rs-dash-widget-warning-panel">';
            btxt = btxt + '	<i class="eg-icon-cancel rs-dash-widget-wp-cancel"></i>';
            btxt = btxt + '	<div class="rs-dash-strong-content">' + btn.data("title") + '</div>';
            btxt = btxt + '	<div class="rs-dash-content-space"></div>';
            btxt = btxt + '	<div>' + btn.data("content") + '</div>';

            if (tmb !== "false" && tmb !== false) {
                btxt = btxt + '	<div class="rs-dash-content-space"></div>';
                btxt = btxt + '	<span class="rs-dash-invers-button-gray rs-dash-close-panel">Thanks! Take me back</span>';
            }
            btxt = btxt + '</div>';

            p.append(btxt);
            var panel = p.find('.rs-dash-widget-warning-panel');

            punchgs.TweenLite.fromTo(panel, 0.3, {
                y: -10,
                autoAlpha: 0
            }, {
                autoAlpha: 1,
                y: 0,
                ease: punchgs.Power3.easeInOut
            });
            panel.find('.rs-dash-widget-wp-cancel, .rs-dash-close-panel').click(function() {
                punchgs.TweenLite.to(panel, 0.3, {
                    y: -10,
                    autoAlpha: 0,
                    ease: punchgs.Power3.easeInOut
                });
                setTimeout(function() {
                    panel.remove();
                }, 300)
            })
        });
    </script>
    <?php
    require self::getPathTemplate('template-slider-selector');
    ?>
    <div style="visibility: none;" id="register-wrong-purchase-code"></div>
