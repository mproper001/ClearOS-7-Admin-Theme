<?php

/**
 * Header handler for the theme.
 *
 * @category  Theme
 * @package   ClearOS
 * @author    ClearFoundation <developer@clearfoundation.com>
 * @copyright 2014 ClearFoundation
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link      http://www.clearfoundation.com/docs/developer/theming/
 */

//////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////
// P A G E  L A Y O U T
//////////////////////////////////////////////////////////////////////////////

function theme_page($page)
{
    if ($page['type'] == MY_Page::TYPE_CONFIGURATION)
        return _configuration_page($page);
    else if ($page['type'] == MY_Page::TYPE_WIDE_CONFIGURATION)
        return _wide_configuration_page($page);
    else if ($page['type'] == MY_Page::TYPE_REPORTS)
        return _report_page($page);
    else if ($page['type'] == MY_Page::TYPE_REPORT_OVERVIEW)
        return _report_overview_page($page);
    else if ($page['type'] == MY_Page::TYPE_SPOTLIGHT)
        return _spotlight_page($page);
    else if ($page['type'] == MY_Page::TYPE_DASHBOARD)
        return _dashboard_page($page);
    else if (($page['type'] == MY_Page::TYPE_SPLASH) || ($page['type'] == MY_Page::TYPE_SPLASH_ORGANIZATION))
        return _splash_page($page);
    else if ($page['type'] == MY_Page::TYPE_LOGIN)
        return _login_page($page);
    else if ($page['type'] == MY_Page::TYPE_WIZARD)
        return _wizard_page($page);
    else if ($page['type'] == MY_Page::TYPE_CONSOLE)
        return _console_page($page);
}

/**
 * Returns the configuration type page.
 *
 * @param array $page page data
 *
 * @return string HTML output
 */

function _configuration_page($page)
{
    $layout = 
        _get_header($page) .
        "<div class='wrapper row-offcanvas row-offcanvas-left'>" .
        _get_left_menu($page) .
        _get_main_content($page) .
        "</div>"
    ;

    return $layout;
}

/**
 * Returns the wide configuration page.
 *
 * @param array $page page data   
 *
 * @return string HTML output
 */   

function _wide_configuration_page($page)
{
    $layout = 
        _get_header($page) .
        "<div class='wrapper row-offcanvas row-offcanvas-left'>" .
        _get_left_menu($page) .
        _get_main_content($page) .
        "</div>"
    ;

    return $layout;
}

/**
 * Returns the report page.
 *
 * @param array $page page data   
 *
 * @return string HTML output
 */   

function _report_page($page)
{
    echo "todo - report";
}

/**
 * Returns the configuration type page.
 *
 * @param array $page page data
 *
 * @return string HTML output
 */

function _report_overview_page($page)
{
    echo "todo - report overview";
}

/**
 * Returns the dashboard page.
 *
 * @param array $page page data   
 *
 * @return string HTML output
 */   

function _dashboard_page($page)
{
    $layout = 
        _get_header($page) .
        "<div class='wrapper row-offcanvas row-offcanvas-left'>" .
        _get_left_menu($page) .
        _get_main_content($page) .
        "</div>"
    ;

    return $layout;
}

/**
 * Returns the spotlight page.
 *
 * @param array $page page data   
 *
 * @return string HTML output
 */   

function _spotlight_page($page)
{
    $layout = 
        _get_header($page) .
        "<div class='wrapper row-offcanvas row-offcanvas-left'>" .
        _get_left_menu($page) .
        _get_main_content($page) .
        "</div>"
    ;

    return $layout;
}

/**
 * Returns the login type page.
 *
 * @param array $page page data   
 *
 * @return string HTML output
 */   

function _login_page($page)
{
    echo "todo - login";
}

/**
 * Returns the splash page.
 *
 * @param array $page page data   
 *
 * @return string HTML output
 */   

function _splash_page($page)
{
    echo "todo - splash";
}

/**
 * Returns the wizard page.
 *
 * @param array $page page data   
 *
 * @return string HTML output
 */   

function _wizard_page($page)
{
    echo "todo - wizard";
}

/**
 * Returns the console page.
 *
 * @param array $page page data   
 *
 * @return string HTML output
 */   

function _console_page($page)
{
    echo "todo - console";
}

//////////////////////////////////////////////////////////////////////////////
// L A Y O U T  H E L P E R S
//////////////////////////////////////////////////////////////////////////////

/**
 * Returns main content.
 * 
 * @param array $page page data
 *
 * @return string menu HTML output
 */

function _get_main_content($page)
{
    if ($page['type']== MY_Page::TYPE_DASHBOARD)
        return "
            <aside class='right-side'>
                <section class='content-header'>
                    <h1>" . $page['title'] . "</h1>
                </section>
                <section class='content'>
                    <div class='col-lg-12'>
                " . $page['app_view'] . "
                    </div>
                </section>
            </aside>
        ";
    else 
        return "
            <aside class='right-side'>
                <section class='content-header'>
                    <h1>" . $page['title'] . "</h1>
                </section>
                <section class='content'>
                    <div class='col-lg-8'>
                " . $page['app_view'] . "
                    </div>
                    <div class='col-lg-4'>
                        <div id='theme-sidebar-container'>
                            <div class='theme-sidebar-top box'>
                            " . $page['page_summary'] . "
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        ";
}

/**
 * Returns the header.
 *
 * @param array $page page data
 *
 * @return string banner HTML
 */

function _get_header($page, $menus = array())
{
    $theme_url = clearos_theme_url('AdminLTE');

    return "
            <header class='header'>
                <a class='logo' href='/app/dashboard'>
                    ClearOS7 (Admin LTE)
                </a>
                <nav class='navbar navbar-static-top' role='navigation'>
                    <a href='#' class='navbar-btn sidebar-toggle' data-toggle='offcanvas' role='button'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </a>
                    <div class='navbar-right'>
                        <ul class='nav navbar-nav'>
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class='dropdown messages-menu'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                    <i class='fa fa-envelope'></i>
                                    <span class='label label-success'>4</span>
                                </a>
                                <ul class='dropdown-menu'>
                                    <li class='header'>You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <div class='slimScrollDiv' style='position: relative; overflow: hidden; width: auto; height: 200px;'><ul class='menu' style='overflow: hidden; width: 100%; height: 200px;'>
                                            <li><!-- start message -->
                                                <a href='#'>
                                                    <div class='pull-left'>
                                                        <img src='/approot/base/htdocs/photo.jpg' class='img-circle' alt='User Image'>
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class='fa fa-clock-o'></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li><!-- end message -->
                                            <li>
                                                <a href='#'>
                                                    <div class='pull-left'>
                                                        <img src='/approot/base/htdocs/photo.jpg' class='img-circle' alt='user image'>
                                                    </div>
                                                    <h4>
                                                        AdminLTE Design Team
                                                        <small><i class='fa fa-clock-o'></i> 2 hours</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href='#'>
                                                    <div class='pull-left'>
                                                        <img src='/approot/base/htdocs/photo.jpg' class='img-circle' alt='user image'>
                                                    </div>
                                                    <h4>
                                                        Developers
                                                        <small><i class='fa fa-clock-o'></i> Today</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href='#'>
                                                    <div class='pull-left'>
                                                        <img src='/approot/base/htdocs/photo.jpg' class='img-circle' alt='user image'>
                                                    </div>
                                                    <h4>
                                                        Sales Department
                                                        <small><i class='fa fa-clock-o'></i> Yesterday</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href='#'>
                                                    <div class='pull-left'>
                                                        <img src='/approot/base/htdocs/photo.jpg' class='img-circle' alt='user image'>
                                                    </div>
                                                    <h4>
                                                        Reviewers
                                                        <small><i class='fa fa-clock-o'></i> 2 days</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                        </ul><div class='slimScrollBar' style='background-color: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; z-index: 99; right: 1px; background-position: initial initial; background-repeat: initial initial;'></div><div class='slimScrollRail' style='width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-color: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;'></div></div>
                                    </li>
                                    <li class='footer'><a href='#'>See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class='dropdown notifications-menu'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                    <i class='fa fa-warning'></i>
                                    <span class='label label-warning'>10</span>
                                </a>
                                <ul class='dropdown-menu'>
                                    <li class='header'>You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <div class='slimScrollDiv' style='position: relative; overflow: hidden; width: auto; height: 200px;'><ul class='menu' style='overflow: hidden; width: 100%; height: 200px;'>
                                            <li>
                                                <a href='#'>
                                                    <i class='ion ion-ios7-people info'></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href='#'>
                                                    <i class='fa fa-warning danger'></i> Very long description here that may not fit into the page and may cause design problems
                                                </a>
                                            </li>
                                            <li>
                                                <a href='#'>
                                                    <i class='fa fa-users warning'></i> 5 new members joined
                                                </a>
                                            </li>

                                            <li>
                                                <a href='#'>
                                                    <i class='ion ion-ios7-cart success'></i> 25 sales made
                                                </a>
                                            </li>
                                            <li>
                                                <a href='#'>
                                                    <i class='ion ion-ios7-person danger'></i> You changed your username
                                                </a>
                                            </li>
                                        </ul><div class='slimScrollBar' style='background-color: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; z-index: 99; right: 1px; background-position: initial initial; background-repeat: initial initial;'></div><div class='slimScrollRail' style='width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-color: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;'></div></div>
                                    </li>
                                    <li class='footer'><a href='#'>View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class='dropdown tasks-menu'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                    <i class='fa fa-tasks'></i>
                                    <span class='label label-danger'>9</span>
                                </a>
                                <ul class='dropdown-menu'>
                                    <li class='header'>You have 9 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <div class='slimScrollDiv' style='position: relative; overflow: hidden; width: auto; height: 200px;'><ul class='menu' style='overflow: hidden; width: 100%; height: 200px;'>
                                            <li><!-- Task item -->
                                                <a href='#'>
                                                    <h3>
                                                        Design some buttons
                                                        <small class='pull-right'>20%</small>
                                                    </h3>
                                                    <div class='progress xs'>
                                                        <div class='progress-bar progress-bar-aqua' style='width: 20%' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'>
                                                            <span class='sr-only'>20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href='#'>
                                                    <h3>
                                                        Create a nice theme
                                                        <small class='pull-right'>40%</small>
                                                    </h3>
                                                    <div class='progress xs'>
                                                        <div class='progress-bar progress-bar-green' style='width: 40%' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'>
                                                            <span class='sr-only'>40% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href='#'>
                                                    <h3>
                                                        Some task I need to do
                                                        <small class='pull-right'>60%</small>
                                                    </h3>
                                                    <div class='progress xs'>
                                                        <div class='progress-bar progress-bar-red' style='width: 60%' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'>
                                                            <span class='sr-only'>60% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href='#'>
                                                    <h3>
                                                        Make beautiful transitions
                                                        <small class='pull-right'>80%</small>
                                                    </h3>
                                                    <div class='progress xs'>
                                                        <div class='progress-bar progress-bar-yellow' style='width: 80%' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'>
                                                            <span class='sr-only'>80% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                        </ul><div class='slimScrollBar' style='background-color: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; z-index: 99; right: 1px; background-position: initial initial; background-repeat: initial initial;'></div><div class='slimScrollRail' style='width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-color: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;'></div></div>
                                    </li>
                                    <li class='footer'>
                                        <a href='#'>View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class='dropdown user user-menu'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                    <i class='glyphicon glyphicon-user'></i>
                                    <span>Jane Doe <i class='caret'></i></span>
                                </a>
                                <ul class='dropdown-menu'>
                                    <!-- User image -->
                                    <li class='user-header bg-light-blue'>
                                        <img src='/approot/base/htdocs/photo.jpg' class='img-circle' alt='User Image'>
                                        <p>
                                            Jane Doe - Web Developer
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class='user-body'>
                                        <div class='col-xs-4 text-center'>
                                            <a href='#'>Followers</a>
                                        </div>
                                        <div class='col-xs-4 text-center'>
                                            <a href='#'>Sales</a>
                                        </div>
                                        <div class='col-xs-4 text-center'>
                                            <a href='#'>Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class='user-footer'>
                                        <div class='pull-left'>
                                            <a href='#' class='btn btn-default btn-flat'>Profile</a>
                                        </div>
                                        <div class='pull-right'>
                                            <a href='#' class='btn btn-default btn-flat'>Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
";
}


/**
 * Returns left panel menu
 * 
 * @param array $page page data
 *
 * @return string menu HTML output
 */

function _get_left_menu($page)
{
    $menu_data = $page['menus'];
    $spotlights = '';

    foreach ($menu_data as $url => $page_meta) {

        // Spotlight pages (read: Dashboard and Marketplace)
        //--------------------------------------------------

        if (lang('base_category_cloud') == $page_meta['category'])
            $category_id = 'cloud';
        else if (lang('base_category_network') == $page_meta['category'])
            $category_id = 'network';
        else if (lang('base_category_gateway') == $page_meta['category'])
            $category_id = 'gateway';
        else if (lang('base_category_server') == $page_meta['category'])
            $category_id = 'server';
        else if (lang('base_category_system') == $page_meta['category'])
            $category_id = 'system';
        else if (lang('base_category_reports') == $page_meta['category'])
            $category_id = 'report';
        else
            $category_id = 'unknown';

        if ($page_meta['category'] === lang('base_category_spotlight')) {
            $spotlights .= "\t\t<li"  . ($url == $current_basename ? " class='active'" : "") . ">\n";
            $spotlights .= "\t\t\t<a href='" . $url . "' title='" . $page_meta['title'] . "'><i class='fa fa-laptop'></i>\n";
            $spotlights .= "\t\t\t<span class='title'> " . $page_meta['title'] . " </span>" . ($url == $current_base ? "<span class='selected'></span>" : "") . "\n";
            $spotlights .= "\t\t\t</a>\n";
            $spotlights .= "\t\t</li>\n";
            continue;
        }
        if ($page_meta['category'] === lang('base_category_my_account')) {
            continue;
        }

        // Close out menus on transitions
        //-------------------------------

        $new_category = ($page_meta['category'] == $current_category) ? FALSE : TRUE;
        $new_subcategory = ($page_meta['subcategory'] == $current_subcategory) ? FALSE : TRUE;

        if (empty($main_apps)) {
            // do nothing
        } else if ($new_category && $new_subcategory) {
            // Close out subcategory and category
            $main_apps .= "\t\t\t\t\t</ul>\n";
            $main_apps .= "\t\t\t\t</li>\n";
   //         $main_apps .= "\t\t\t</ul>\n";
//            $main_apps .= "\t\t</div>\n";
        } else if ($new_subcategory) {
            $main_apps .= "\t\t\t\t\t</ul>\n";
            $main_apps .= "\t\t\t\t</li>\n";
        }

        if ($page_meta['category'] != $current_category) {
            $current_category = $page_meta['category'];
            //$main_apps .= "\t\t<li class='treeview"  . ($current_category == $page['current_category'] ? " active" : "") . "'>\n";
//            $main_apps .= "\t\t\t<a href='#'><i class='fa fa-laptop'></i>\n";
//            $main_apps .= "\t\t\t\t<span class='title'> " . $page_meta['category'] . " </span>" . ($page_meta['category'] == $current_category ? "<span class='selected'></span>" : "") . "<i class='icon-arrow'></i>\n";
 //           $main_apps .= "\t\t\t</a>\n";
//            $main_apps .= "\t\t\t<ul class='treeview-menu'>\n";
        }
        
        // Subcategory transition
        //-----------------------

        if ($current_subcategory != $page_meta['subcategory']) {
            $current_subcategory = $page_meta['subcategory'];

            $main_apps .= "\t\t\t\t<li class='theme-hidden category-" . $category_id . " treeview" . ($page['current_subcategory'] == $page_meta['subcategory'] ? " active" : "") . "'>\n";
            $main_apps .= "\t\t\t\t\t<a href='#'><i class='fa fa-angle-double-right'></i>" . $page_meta['subcategory'] . "</a>\n";
            $main_apps .= "\t\t\t\t\t<ul class='treeview-menu'>\n";
        }

        // App page
        //---------

        $main_apps .= "\t\t\t\t\t\t<li" . (basename($url) == $page['current_basename'] ? " class='active'" : "") . "><a href='" . $url . "'>" . $page_meta['title'] . "</a></li>\n";
    }

    // Close out open HTML tags
    //-------------------------

    $main_apps .= "\t\t\t\t\t\t</ul>\n";
    $main_apps .= "\t\t\t\t\t</li>\n";
    $main_apps .= "\t\t\t\t</ul>\n";
    $main_apps .= "\t\t\t</li>\n";

    return "
<aside class='left-side sidebar-offcanvas'>
    <section class='sidebar'>
<!--        <form action='#' method='get' class='sidebar-form'>
            <div class='input-group'>
                <input type='text' name='q' class='form-control' placeholder='Search...'>
                <span class='input-group-btn'>
                    <button type='submit' name='seach' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i></button>
                </span>
            </div>
        </form>
-->
        <form action='#' method='get' id='category-select'>
            <div class='btn-toolbar' style='margin: 9px 8px;'> <!-- TODO move to css -->
                <div class='btn-group' data-toggle='buttons'>
                    <label class='btn btn-default'>
                        <input type='radio' name='options' id='category-cloud'><i class='fa fa-cloud theme-navbar-category'></i>
                    </label>
                    <label class='btn btn-default'>
                        <input type='radio' name='options' id='category-network'><i class='fa fa-fire theme-navbar-category'></i>
                    </label>
                    <label class='btn btn-default'>
                        <input type='radio' name='options' id='category-gateway'><i class='fa fa-shield theme-navbar-category'></i>
                    </label>
                    <label class='btn btn-default'>
                        <input type='radio' name='options' id='category-server'><i class='fa fa-hdd-o theme-navbar-category'></i>
                    </label>
                    <label class='btn btn-default'>
                        <input type='radio' name='options' id='category-system'><i class='fa fa-wrench theme-navbar-category'></i>
                    </label>
                    <label class='btn btn-default'>
                        <input type='radio' name='options' id='category-report'><i class='fa fa-bar-chart-o theme-navbar-category'></i>
                    </label>
                </div>
            </div>
        </form>
        <ul class='sidebar-menu'>
$main_apps
        </ul>
    </section>
</aside>
";
}
