<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * wgSitenotice module for xoops
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GPL 2.0 or later
 * @package         wgsitenotice
 * @since           1.0
 * @min_xoops       2.5.7
 * @author          Goffy (xoops.wedega.com) - Email:<webmaster@wedega.com> - Website:<http://xoops.wedega.com>
 * @version         $Id: 1.0 functions.php 1 Fri 2015/02/20 12:43:29Z Goffy / wedega.com / XOOPS Development Team $
 */

/***************Blocks***************/
function wgsitenotice_block_addCatSelect($cats) {
	if(is_array($cats)) 
	{
		$cat_sql = '('.current($cats);
		array_shift($cats);
		foreach($cats as $cat) 
		{
			$cat_sql .= ','.$cat;
		}
		$cat_sql .= ')';
	}
	return $cat_sql;
}

function wgsitenotice_CleanVars( &$global, $key, $default = '', $type = 'int' ) {
    switch ( $type ) {
        case 'string':
            $ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_MAGIC_QUOTES ) : $default;
            break;
        case 'int': default:
            $ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_NUMBER_INT ) : $default;
            break;
    }
    if ( $ret === false ) {
        return $default;
    }
    return $ret;
}

function wgsitenotice_meta_keywords($content)
{
	global $xoopsTpl, $xoTheme;
	$myts = MyTextSanitizer::getInstance();
	$content= $myts->undoHtmlSpecialChars($myts->displayTarea($content));
	if(isset($xoTheme) && is_object($xoTheme)) {
		$xoTheme->addMeta( 'meta', 'keywords', strip_tags($content));
	} else {	// Compatibility for old Xoops versions
		$xoopsTpl->assign('xoops_meta_keywords', strip_tags($content));
	}
}

function wgsitenotice_meta_description($content)
{
	global $xoopsTpl, $xoTheme;
	$myts = MyTextSanitizer::getInstance();
	$content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
	if(isset($xoTheme) && is_object($xoTheme)) {
		$xoTheme->addMeta( 'meta', 'description', strip_tags($content));
	} else {	// Compatibility for old Xoops versions
		$xoopsTpl->assign('xoops_meta_description', strip_tags($content));
	}
}