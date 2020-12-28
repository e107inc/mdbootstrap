<?php
/*
* Copyright (c) 2012 e107 Inc e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
* $Id: e_shortcode.php 12438 2011-12-05 15:12:56Z secretr $
*
* Navigation Template 
*/

/* it should be templated this way:
- main........horizontal with dropdown   	and ul/li/a version, ul.navbar-nav + li.nav-item + a.nav-link
- main-alt....horizontal with dropdown   	and div/a version, div.navbar-nav + a.nav-link
- side........vertical   with list-group 	and ul/li/a version, ul.list-group + li.list-group-item + a
- side-alt....vertical   with list-group 	and div/a version, 	 div.list-group + a.list-group-item.list-group-item-action 
- footer......horizontal with dropdown   	and ul/li/a version, ul.nav + li.nav-item + a.nav-link.
- footer-alt..horizontal with dropdown   	and nav/a version, nav.nav + a.nav-link 
- alt.........vertical   with flex-column   and nav/li/a version, nav.nav.flex-column + li.nav-item + a.nav-link
- alt5........horizontal with dropdown   	and nav/a version, nav.nav  + a.nav-item.nav-link
*/
 
// TEMPLATE FOR {NAVIGATION=main}
$element_class           = ' class="navbar-nav {NAV_CLASS}" ';
$item_class              = ' class="nav-item" ';
$item_class_active       = ' class="nav-item active" ';
$item_class_submenu      = ' class="nav-item dropdown {NAV_IDENTIFIER}" ';

$NAVIGATION_TEMPLATE['main']['start'] = "<ul {$element_class} >";    

// Main Link
$NAVIGATION_TEMPLATE['main']['item'] = "<li {$item_class}><a  class='nav-link'  role='button' href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a></li>";

// Main Link - active state
$NAVIGATION_TEMPLATE['main']['item_active'] = "<li {$item_class_active}><a  class='nav-link'  role='button' href='{NAV_URL}' title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a></li>";

$NAVIGATION_TEMPLATE['main']['end'] = '</ul>';

// Main Link which has a sub menu. 
$NAVIGATION_TEMPLATE['main']['item_submenu'] = "
	<li {$item_class_active}>
		<a class='nav-link dropdown-toggle'  role='button' data-toggle='dropdown' id='navbarDropdownMenuLink-{NAV_ID}' data-target='#' aria-haspopup='true' aria-expanded='false' href='{NAV_URL}' title='{NAV_DESCRIPTION}'>
		 {NAV_ICON}{NAV_NAME} 
		</a> 
		{NAV_SUB}
	</li>
	";

// Main Link which has a sub menu - active state.
$NAVIGATION_TEMPLATE['main']['item_submenu_active'] = '
	<li class="nav-item dropdown active {NAV_IDENTIFIER}">
		<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" id="navbarDropdownMenuLink-{NAV_ID}" aria-haspopup="true" aria-expanded="true" data-target="#" href="{NAV_URL}">
		 {NAV_ICON}{NAV_NAME}
		</a>
		{NAV_SUB}
	</li>
';	

// Sub menu BUG:  aria-labelledby= - it should be the same as navbarDropdownMenuLink-{NAV_ID} from submenu parent but LINK_PARENT returns 0  
$NAVIGATION_TEMPLATE['main']['submenu_start'] = '<div class="dropdown-menu submenu-start submenu-level-{NAV_DEPTH}" aria-labelledby="navbarDropdownMenuLink-{NAV_PARENT}">';
$NAVIGATION_TEMPLATE['main']['submenu_item'] = '<a class="dropdown-item" href="{NAV_URL}"{NAV_OPEN}>{NAV_ICON}{NAV_NAME}</a>';
$NAVIGATION_TEMPLATE['main']['submenu_item_active'] = '<a class="dropdown-item active" href="{NAV_URL}"{NAV_OPEN}>{NAV_ICON}{NAV_NAME}</a> ';
$NAVIGATION_TEMPLATE['main']['submenu_end'] = '</div>';

// 3rd Sub menu
$NAVIGATION_TEMPLATE['main']['submenu_lowerstart'] = '';
$NAVIGATION_TEMPLATE['main']['submenu_loweritem'] = '';
$NAVIGATION_TEMPLATE['main']['submenu_loweritem_active'] = '';
$NAVIGATION_TEMPLATE['main']['submenu_lowerend'] = '';


/* 
 ALTERNATIVE MARKUP for main navigation:
 {NAVIGATION: layout=main-alt&type=any} 
 div/a version with dropdown, 2 levels
 see https://getbootstrap.com/docs/4.5/components/navbar/#nav
*/

$NAVIGATION_TEMPLATE['main_alt'] = $NAVIGATION_TEMPLATE['main'];
$element_class           = ' class="navbar-nav {NAV_CLASS}" ';
$item_class              = ' class="nav-link" ';
$item_class_active       = ' class="nav-link active" ';

$NAVIGATION_TEMPLATE['main-alt']['start'] = "<div {$element_class}>";   
$NAVIGATION_TEMPLATE['main-alt']['item'] = "<a {$item_class} href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>";
$NAVIGATION_TEMPLATE['main-alt']['item_active'] = "<a {$item_class_active} href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>"; 
$NAVIGATION_TEMPLATE['main-alt']['end'] = '</div>';

/* 
 DEFAULT LIST-GROUP SIDE TEMPLATE FOR:
 {NAVIGATION: layout=side&type=any} 
 {NAVIGATION=side}; 
 ul/liv version with  list-group, 2 levels
 see https://getbootstrap.com/docs/4.1/components/list-group/#basic-example
*/ 
 
$element_class       = ' class="list-group {NAV_CLASS}" ';
$item_class          = ' class="list-group-item" ';
$item_class_active   = ' class="list-group-item active" ';
$item_class_submenu  = ' class="list-group-item disabled" ';

$NAVIGATION_TEMPLATE['side']['start'] 				= "<ul {$element_class}>";
$NAVIGATION_TEMPLATE['side']['item'] 				= "<li {$item_class}><a href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a></li>";
$NAVIGATION_TEMPLATE['side']['item_active'] 		= "<li {$item_class_active}><a href='{NAV_URL}' title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a></li>";
$NAVIGATION_TEMPLATE['side']['end'] 				= '</ul>';

// 2rd Sub menu
$NAVIGATION_TEMPLATE['side']['item_submenu'] 		= "<li {$item_class_submenu}>{NAV_ICON}{NAV_NAME}{NAV_SUB}</li>";
$NAVIGATION_TEMPLATE['side']['item_submenu_active'] = "<li {$item_class_submenu_active}>{NAV_ICON}{NAV_NAME}{NAV_SUB}</li>"; 				
$NAVIGATION_TEMPLATE['side']['submenu_start'] 		= "";
$NAVIGATION_TEMPLATE['side']['submenu_item']		= "<li {$item_class}><a href='{NAV_URL}' {NAV_OPEN}>{NAV_ICON}{NAV_NAME}</a></li>";
$NAVIGATION_TEMPLATE['side']['submenu_item_active']	= "<li {$item_class_active}><a href='{NAV_URL}'>{NAV_ICON}{NAV_NAME}</a></li>"; 
// 3rd Sub menu
$NAVIGATION_TEMPLATE['side']['submenu_lowerstart'] 	     = "";
$NAVIGATION_TEMPLATE['side']['submenu_loweritem'] 		 = "";
$NAVIGATION_TEMPLATE['side']['submenu_loweritem_active'] = "";
$NAVIGATION_TEMPLATE['side']['submenu_lowerend'] 		 = "";

/* 
 ALTERNATIVE LIST-GROUP SIDE TEMPLATE FOR:
 {NAVIGATION: layout=side-alt&type=any} 
 div/a version with  list-group, 2 levels
 see https://getbootstrap.com/docs/4.1/components/list-group/#links-and-buttons
*/ 

$NAVIGATION_TEMPLATE['side-alt'] = $NAVIGATION_TEMPLATE['side'];

$element_class           = ' class="list-group {NAV_CLASS}" ';
$item_class              = ' class="list-group-item list-group-item-action" ';
$item_class_active       = ' class="list-group-item list-group-item-action active" ';
$item_class_submenu      = ' class="list-group-item list-group-item-action disabled" ';
 
$NAVIGATION_TEMPLATE['side-alt']['start'] 				= "<div {$element_class}>";
$NAVIGATION_TEMPLATE['side-alt']['item'] 				= "<a {$item_class} href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>";

$NAVIGATION_TEMPLATE['side-alt']['item_active'] 		= "<a {$item_class_active} href='{NAV_URL}' title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>";
$NAVIGATION_TEMPLATE['side-alt']['end'] 				= '</div>';

$NAVIGATION_TEMPLATE['side-alt']['item_submenu'] 		= "<a {$item_class_submenu}> {NAV_ICON}{NAV_NAME}</a>{NAV_SUB}";
$NAVIGATION_TEMPLATE['side-alt']['submenu_item']		= "<a {$item_class} href='{NAV_URL}' {NAV_OPEN}>{NAV_ICON}{NAV_NAME}</a>";
$NAVIGATION_TEMPLATE['side-alt']['submenu_item_active']	= "<a {$item_class_active} href='{NAV_URL}' {NAV_OPEN}>{NAV_ICON}{NAV_NAME}</a>"; 

/* 
 DEFAULT HORIZONTAL FOOTER TEMPLATE FOR:
 {NAVIGATION: layout=footer&type=any} 
 {NAVIGATION=footer}; 
 ul/li/a version - only 1-level
 see https://getbootstrap.com/docs/4.1/components/navs/#base-nav
*/ 

$element_class       		= ' class="nav {NAV_CLASS}" ';
$item_class          		= ' class="nav-item" ';
$item_class_active   		= ' class="nav-item active" ';
$item_class_submenu  		= ' class="nav-item dropdown" ';
$item_class_submenu_active  = ' class="nav-item dropdown active" '; 

$NAVIGATION_TEMPLATE['footer']['start'] 				= "<ul {$element_class}>";
$NAVIGATION_TEMPLATE['footer']['item'] 					= "<li {$item_class}>
    <a class='nav-link' href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a></li>";
$NAVIGATION_TEMPLATE['footer']['item_active'] 			= "<li {$item_class_active} {NAV_OPEN}>
	<a class='nav-link' href='{NAV_URL}' title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a></li>";
$NAVIGATION_TEMPLATE['footer']['end'] 					= '</ul>';

// 2rd Sub menu   data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
$NAVIGATION_TEMPLATE['footer']['item_submenu'] 			= "
<li {$item_class_submenu}>
	<a class='nav-link dropdown-toggle'  role='button' data-toggle='dropdown' data-target='#' aria-haspopup='true' 
	       aria-expanded='false' href='#' title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a> 
	{NAV_SUB}
</li>";
$NAVIGATION_TEMPLATE['footer']['item_submenu_active'] 	= "
<li {$item_class_submenu_active}>
	<a class='nav-link dropdown-toggle'  role='button' data-toggle='dropdown'data-target='#' aria-haspopup='true' aria-expanded='false' href='{NAV_URL}' title='{NAV_DESCRIPTION}'>
	 {NAV_ICON}{NAV_NAME} 
	</a> 
	{NAV_SUB}
</li>";
$NAVIGATION_TEMPLATE['footer']['submenu_start'] 		= "<div class='dropdown-menu'>";
$NAVIGATION_TEMPLATE['footer']['submenu_item']			= "<a class='dropdown-item' href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>";
$NAVIGATION_TEMPLATE['footer']['submenu_item_active'] 	= "<a class='dropdown-item active' href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>"; 
$NAVIGATION_TEMPLATE['footer']['submenu_end'] 			= "</div>";

// 3rd Sub menu
$NAVIGATION_TEMPLATE['footer']['submenu_lowerstart'] 	    = "";
$NAVIGATION_TEMPLATE['footer']['submenu_loweritem'] 		= $NAVIGATION_TEMPLATE['footer']['submenu_item'];
$NAVIGATION_TEMPLATE['footer']['submenu_loweritem_active']  = $NAVIGATION_TEMPLATE['footer']['submenu_item_active'];
$NAVIGATION_TEMPLATE['footer']['submenu_lowerend'] 		 	= "";

/* 
 ALTERNATIVE HORIZONTAL FOOTER TEMPLATE FOR:
 {NAVIGATION: layout=footer-alt&type=any} 
 nav/a - only 1-level
 see https://getbootstrap.com/docs/4.1/components/navs/#base-nav
*/ 

$NAVIGATION_TEMPLATE['footer-alt'] = $NAVIGATION_TEMPLATE['footer'];

$element_class           = ' class="nav {NAV_CLASS}" ';
$item_class              = ' class="nav-link" ';
$item_class_active       = ' class="nav-link active" ';
$item_class_submenu      = ' class="nav-link disabled" ';

$NAVIGATION_TEMPLATE["footer-alt"]["start"] 				= "<nav {$element_class}>";
$NAVIGATION_TEMPLATE["footer-alt"]["item"] 					= "<a {$item_class} href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>";
$NAVIGATION_TEMPLATE["footer-alt"]["item_active"] 			= "<a {$item_class_active} href='{NAV_URL}' title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>";
$NAVIGATION_TEMPLATE["footer-alt"]["end"] 					= "</nav>";
 
 
/* 
 DEFAULT VERTICAL TEMPLATE FOR:
 {NAVIGATION: layout=alt&type=any} 
 nav/li/a version with nav-link and flex-column - only 1-level
 see https://getbootstrap.com/docs/4.1/components/navs/#vertical
*/ 

$NAVIGATION_TEMPLATE['alt'] 	 = $NAVIGATION_TEMPLATE['footer'];

$element_class           = ' class="nav flex-column {NAV_CLASS}" ';
$item_class              = ' class="nav-item" ';
$item_class_active       = ' class="nav-item active" ';


$NAVIGATION_TEMPLATE['alt']['start'] 		 = "<nav {$element_class}>";
$NAVIGATION_TEMPLATE['alt']['item'] 		 = "<li {$item_class}>
		<a class='nav-link' href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a></li>";
$NAVIGATION_TEMPLATE['alt']['item_active'] 	 = "<li {$item_class_active} {NAV_OPEN}>
		<a class='nav-link' href='{NAV_URL}' title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a></li>";
$NAVIGATION_TEMPLATE['alt']['end'] 					= '</nav>';
 
 
/* 
 HORIZONTAL NAV WITH DROPDOWN TEMPLATE FOR:
 {NAVIGATION: layout=alt5&type=any} 
 {NAVIGATION=alt5}
 ul/li/a version with nav-link - 2-levels
 see https://getbootstrap.com/docs/4.1/components/navs/#pills-with-dropdowns
*/

$NAVIGATION_TEMPLATE['alt5'] 	 = $NAVIGATION_TEMPLATE['footer'];

$element_class           = ' class="nav {NAV_CLASS}" ';
$item_class              = ' class="nav-item nav-link" ';
$item_class_active       = ' class="nav-item nav-link active" ';

$NAVIGATION_TEMPLATE["alt5"]["start"] 				= "<nav {$element_class}>";
$NAVIGATION_TEMPLATE["alt5"]["item"] 					= "<a {$item_class} href='{NAV_URL}'{NAV_OPEN} title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>";
$NAVIGATION_TEMPLATE["alt5"]["item_active"] 			= "<a {$item_class_active} href='{NAV_URL}' title='{NAV_DESCRIPTION}'>{NAV_ICON}{NAV_NAME}</a>";
$NAVIGATION_TEMPLATE["alt5"]["end"] 					= "</nav>";

$NAVIGATION_TEMPLATE['alt6'] 	 = $NAVIGATION_TEMPLATE['alt5'];

 

 