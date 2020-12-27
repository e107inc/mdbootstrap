<?php
/*
* Copyright (c) 2012 e107 Inc e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
* $Id: e_shortcode.php 12438 2011-12-05 15:12:56Z secretr $
*
* Navigation Template 
*/

/* it should be templated this way:
- main........horizontal with dropdown   	and ul/li/a version, ul.navbar-nav + li.nav-item + a.nav-link
- side........vertical   with list-group 	and ul/li/a version, ul.list-group + li.list-group-item + a
- side-alt....vertical   with list-group 	and div/a version, 	 div.list-group + a.list-group-item.list-group-item-action 
- footer......horizontal with dropdown   	and ul/li/a version, ul.nav + li.nav-item + a.nav-link.
- footer-alt..horizontal without dropdown   and nav/a version, nav.nav + a.nav-link 
- alt.........vertical   with flex-column   and nav/li/a version, nav.nav.flex-column + li.nav-item + a.nav-link
- alt5........horizontal with dropdown   	and nav/a version, nav.nav  + a.nav-item.nav-link
*/
 
// TEMPLATE FOR {NAVIGATION=main}
$NAVIGATION_TEMPLATE['main']['start'] = '<ul class="navbar-nav">';    

// Main Link
$NAVIGATION_TEMPLATE['main']['item'] = '<li class="nav-item"><a  class="nav-link"  role="button" href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">{LINK_ICON}{LINK_NAME}</a></li>';

// Main Link - active state
$NAVIGATION_TEMPLATE['main']['item_active'] = '<li class="nav-item active"><a class="nav-link e-tip" role="button" data-target="#" href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">{LINK_ICON} {LINK_NAME}</a></li>';

$NAVIGATION_TEMPLATE['main']['end'] = '</ul>';

// Main Link which has a sub menu. 
$NAVIGATION_TEMPLATE['main']['item_submenu'] = '
	<li class="nav-item dropdown {LINK_IDENTIFIER}">
		<a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" id="navbarDropdownMenuLink-{LINK_ID}" data-target="#" aria-haspopup="true" aria-expanded="false" href="{LINK_URL}" title="{LINK_DESCRIPTION}">
		 {LINK_ICON}{LINK_NAME} 
		</a> 
		{LINK_SUB}
	</li>
';

// Main Link which has a sub menu - active state.
$NAVIGATION_TEMPLATE['main']['item_submenu_active'] = '
	<li class="nav-item dropdown active {LINK_IDENTIFIER}">
		<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" id="navbarDropdownMenuLink-{LINK_ID}" aria-haspopup="true" aria-expanded="true" data-target="#" href="{LINK_URL}">
		 {LINK_ICON}{LINK_NAME}
		</a>
		{LINK_SUB}
	</li>
';	

// Sub menu BUG:  aria-labelledby= - it should be the same as navbarDropdownMenuLink-{LINK_ID} from submenu parent but LINK_PARENT returns 0  
$NAVIGATION_TEMPLATE['main']['submenu_start'] = '<div class="dropdown-menu submenu-start submenu-level-{LINK_DEPTH}" aria-labelledby="navbarDropdownMenuLink-{LINK_PARENT}">';
$NAVIGATION_TEMPLATE['main']['submenu_item'] = '<a class="dropdown-item" href="{LINK_URL}"{LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a>';
$NAVIGATION_TEMPLATE['main']['submenu_item_active'] = '<a class="dropdown-item active" href="{LINK_URL}"{LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a> ';
$NAVIGATION_TEMPLATE['main']['submenu_end'] = '</div>';

// 3rd Sub menu
$NAVIGATION_TEMPLATE['main']['submenu_lowerstart'] = '';
$NAVIGATION_TEMPLATE['main']['submenu_loweritem'] = '';
$NAVIGATION_TEMPLATE['main']['submenu_loweritem_active'] = '';
$NAVIGATION_TEMPLATE['main']['submenu_lowerend'] = '';

/* 
 DEFAULT LIST-GROUP SIDE TEMPLATE FOR:
 {NAVIGATION: layout=side&type=any} 
 {NAVIGATION=side}; 
 ul/liv version with  list-group, 2 levels
 see https://getbootstrap.com/docs/4.1/components/list-group/#basic-example
*/ 
 
$element_class       = ' class="list-group" ';
$item_class          = ' class="list-group-item" ';
$item_class_active   = ' class="list-group-item active" ';
$item_class_submenu  = ' class="list-group-item disabled" ';

$NAVIGATION_TEMPLATE['side']['start'] 				= "<ul {$element_class}>";
$NAVIGATION_TEMPLATE['side']['item'] 				= "<li {$item_class}><a href='{LINK_URL}'{LINK_OPEN} title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a></li>";
$NAVIGATION_TEMPLATE['side']['item_active'] 		= "<li {$item_class_active}><a href='{LINK_URL}' title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a></li>";
$NAVIGATION_TEMPLATE['side']['end'] 				= '</ul>';

// 2rd Sub menu
$NAVIGATION_TEMPLATE['side']['item_submenu'] 		= "<li {$item_class_submenu}>{LINK_ICON}{LINK_NAME}{LINK_SUB}</li>";
$NAVIGATION_TEMPLATE['side']['item_submenu_active'] = "<li {$item_class_submenu_active}>{LINK_ICON}{LINK_NAME}{LINK_SUB}</li>"; 				
$NAVIGATION_TEMPLATE['side']['submenu_start'] 		= "";
$NAVIGATION_TEMPLATE['side']['submenu_item']		= "<li {$item_class}><a href='{LINK_URL}' {LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a></li>";
$NAVIGATION_TEMPLATE['side']['submenu_item_active']	= "<li {$item_class_active}><a href='{LINK_URL}'>{LINK_ICON}{LINK_NAME}</a></li>"; 
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

$element_class           = ' class="list-group" ';
$item_class              = ' class="list-group-item list-group-item-action" ';
$item_class_active       = ' class="list-group-item list-group-item-action active" ';
$item_class_submenu      = ' class="list-group-item list-group-item-action disabled" ';
 
$NAVIGATION_TEMPLATE['side-alt']['start'] 				= "<div {$element_class}>";
$NAVIGATION_TEMPLATE['side-alt']['item'] 				= "<a {$item_class} href='{LINK_URL}'{LINK_OPEN} title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a>";

$NAVIGATION_TEMPLATE['side-alt']['item_active'] 		= "<a {$item_class_active} href='{LINK_URL}' title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a>";
$NAVIGATION_TEMPLATE['side-alt']['end'] 				= '</div>';

$NAVIGATION_TEMPLATE['side-alt']['item_submenu'] 		= "<a {$item_class_submenu}> {LINK_ICON}{LINK_NAME}</a>{LINK_SUB}";
$NAVIGATION_TEMPLATE['side-alt']['submenu_item']		= "<a {$item_class} href='{LINK_URL}' {LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a>";
$NAVIGATION_TEMPLATE['side-alt']['submenu_item_active']	= "<a {$item_class_active} href='{LINK_URL}' {LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a>"; 

/* 
 DEFAULT HORIZONTAL FOOTER TEMPLATE FOR:
 {NAVIGATION: layout=footer&type=any} 
 {NAVIGATION=footer}; 
 ul/li/a version - only 1-level
 see https://getbootstrap.com/docs/4.1/components/navs/#base-nav
*/ 

$element_class       		= ' class="nav" ';
$item_class          		= ' class="nav-item" ';
$item_class_active   		= ' class="nav-item active" ';
$item_class_submenu  		= ' class="nav-item dropdown" ';
$item_class_submenu_active  = ' class="nav-item dropdown active" '; 

$NAVIGATION_TEMPLATE['footer']['start'] 				= "<ul {$element_class}>";
$NAVIGATION_TEMPLATE['footer']['item'] 					= "<li {$item_class}>
    <a class='nav-link' href='{LINK_URL}'{LINK_OPEN} title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a></li>";
$NAVIGATION_TEMPLATE['footer']['item_active'] 			= "<li {$item_class_active} {LINK_OPEN}>
	<a class='nav-link' href='{LINK_URL}' title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a></li>";
$NAVIGATION_TEMPLATE['footer']['end'] 					= '</ul>';

// 2rd Sub menu   data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
$NAVIGATION_TEMPLATE['footer']['item_submenu'] 			= "
<li {$item_class_submenu}>
	<a class='nav-link dropdown-toggle'  role='button' data-toggle='dropdown' data-target='#' aria-haspopup='true' 
	       aria-expanded='false' href='#' title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a> 
	{LINK_SUB}
</li>";
$NAVIGATION_TEMPLATE['footer']['item_submenu_active'] 	= "
<li {$item_class_submenu_active}>
	<a class='nav-link dropdown-toggle'  role='button' data-toggle='dropdown'data-target='#' aria-haspopup='true' aria-expanded='false' href='{LINK_URL}' title='{LINK_DESCRIPTION}'>
	 {LINK_ICON}{LINK_NAME} 
	</a> 
	{LINK_SUB}
</li>";
$NAVIGATION_TEMPLATE['footer']['submenu_start'] 		= "<div class='dropdown-menu'>";
$NAVIGATION_TEMPLATE['footer']['submenu_item']			= "<a class='dropdown-item' href='{LINK_URL}'{LINK_OPEN} title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a>";
$NAVIGATION_TEMPLATE['footer']['submenu_item_active'] 	= "<a class='dropdown-item active' href='{LINK_URL}'{LINK_OPEN} title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a>"; 
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

$element_class           = ' class="nav" ';
$item_class              = ' class="nav-link" ';
$item_class_active       = ' class="nav-link active" ';
$item_class_submenu      = ' class="nav-link disabled" ';

$NAVIGATION_TEMPLATE["footer-alt"]["start"] 				= "<nav {$element_class}>";
$NAVIGATION_TEMPLATE["footer-alt"]["item"] 					= "<a {$item_class} href='{LINK_URL}'{LINK_OPEN} title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a>";
$NAVIGATION_TEMPLATE["footer-alt"]["item_active"] 			= "<a {$item_class_active} href='{LINK_URL}' title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a>";
$NAVIGATION_TEMPLATE["footer-alt"]["end"] 					= "</nav>";
 
 
/* 
 DEFAULT VERTICAL TEMPLATE FOR:
 {NAVIGATION: layout=alt&type=any} 
 nav/li/a version with nav-link and flex-column - only 1-level
 see https://getbootstrap.com/docs/4.1/components/navs/#vertical
*/ 

$NAVIGATION_TEMPLATE['alt'] 	 = $NAVIGATION_TEMPLATE['footer'];

$element_class           = ' class="nav flex-column" ';
$item_class              = ' class="nav-item" ';
$item_class_active       = ' class="nav-item active" ';
$item_class_submenu      = ' class="nav-item disabled" ';

$NAVIGATION_TEMPLATE['alt']['start'] 		 = "<nav {$element_class}>";
$NAVIGATION_TEMPLATE['alt']['item'] 		 = "<li {$item_class}>
		<a class='nav-link' href='{LINK_URL}'{LINK_OPEN} title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a></li>";
$NAVIGATION_TEMPLATE['alt']['item_active'] 	 = "<li {$item_class_active} {LINK_OPEN}>
		<a class='nav-link' href='{LINK_URL}' title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a></li>";
$NAVIGATION_TEMPLATE['alt']['end'] 					= '</nav>';
 
 
/* 
 HORIZONTAL NAV WITH DROPDOWN TEMPLATE FOR:
 {NAVIGATION: layout=alt5&type=any} 
 {NAVIGATION=alt5}
 ul/li/a version with nav-link - 2-levels
 see https://getbootstrap.com/docs/4.1/components/navs/#pills-with-dropdowns
*/

$NAVIGATION_TEMPLATE['alt5'] 	 = $NAVIGATION_TEMPLATE['footer'];

$element_class           = ' class="nav" ';
$item_class              = ' class="nav-item nav-link" ';
$item_class_active       = ' class="nav-item nav-link active" ';
$item_class_submenu      = ' class="nav-link dropdown-toggle" ';

$NAVIGATION_TEMPLATE["alt5"]["start"] 				= "<nav {$element_class}>";
$NAVIGATION_TEMPLATE["alt5"]["item"] 					= "<a {$item_class} href='{LINK_URL}'{LINK_OPEN} title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a>";
$NAVIGATION_TEMPLATE["alt5"]["item_active"] 			= "<a {$item_class_active} href='{LINK_URL}' title='{LINK_DESCRIPTION}'>{LINK_ICON}{LINK_NAME}</a>";
$NAVIGATION_TEMPLATE["alt5"]["end"] 					= "</nav>";



$NAVIGATION_TEMPLATE['alt6'] 	 = $NAVIGATION_TEMPLATE['alt5'];

 

 