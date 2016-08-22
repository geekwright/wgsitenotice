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
 * @version         $Id: 1.0 contents.php 1 Fri 2015/02/20 12:43:29Z Goffy / wedega.com / XOOPS Development Team $
 */
defined('XOOPS_ROOT_PATH') or die("Restricted access");
/*
 * Class Object WgsitenoticeContents
 */
class WgsitenoticeContents extends XoopsObject
{ 
	/*
	* @var mixed
	*/
	private $wgsitenotice = null;
	/*
	 * Constructor
	 *
	 * @param null
	 */
	public function __construct()
	{
		$this->wgsitenotice = WgsitenoticeHelper::getInstance();
		$this->initVar('cont_id', XOBJ_DTYPE_INT);
		$this->initVar('cont_version_id', XOBJ_DTYPE_INT);
		$this->initVar('cont_header', XOBJ_DTYPE_TXTBOX);
		$this->initVar('cont_text', XOBJ_DTYPE_TXTAREA);
		$this->initVar('cont_weight', XOBJ_DTYPE_INT);
		$this->initVar('cont_date', XOBJ_DTYPE_INT);
	}
	/*
	*  @static function &getInstance
	*  @param null
	*/
	public static function &getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }
	/*
	 * Get form
	 *
	 * @param mixed $action
	 */
	public function getForm($action = false)
	{	
		if ($action === false) {
			$action = $_SERVER['REQUEST_URI'];
		}
		// Title
		$title = $this->isNew() ? sprintf(_AM_WGSITENOTICE_CONTENT_ADD) : sprintf(_AM_WGSITENOTICE_CONTENT_EDIT);
		// Get Theme Form
		xoops_load('XoopsFormLoader');
		$form = new XoopsThemeForm($title, 'form', $action, 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		// Contents handler
		//$contentsHandler = $this->wgsitenotice->getHandler('contents');
		// Form Topic Contents
		$Handler = $this->wgsitenotice->getHandler('versions');				
		$_select = new XoopsFormSelect(_AM_WGSITENOTICE_CONT_VERSION_ID, 'cont_version_id', $this->getVar('cont_version_id'));
		$_select->addOptionArray($Handler->getList());
		$form->addElement( $_select );
		// Form cont_header
    $form->addElement( new XoopsFormText(_AM_WGSITENOTICE_CONT_HEADER, 'cont_header', 50, 255, $this->getVar('cont_header')), true );
		// Form cont_text
		$editor_configs = array();
		$editor_configs['name'] = 'cont_text';
		$editor_configs['value'] = $this->getVar('cont_text', 'e');
		$editor_configs['rows'] = 5;
		$editor_configs['cols'] = 40;
		$editor_configs['width'] = '100%';
		$editor_configs['height'] = '400px';
		$editor_configs['editor'] = $this->wgsitenotice->getConfig('wgsitenotice_editor');			
		$form->addElement( new XoopsFormEditor(_AM_WGSITENOTICE_CONT_TEXT, 'cont_text', $editor_configs) );
		// Form Text cont_weight
        $cont_weight = $this->isNew() ? 1 : $this->getVar('cont_weight');
		$form->addElement( new XoopsFormText(_AM_WGSITENOTICE_CONT_WEIGHT, 'cont_weight', 50, 255, $cont_weight), true );
		// Form Text Date Select
		//$form->addElement( new XoopsFormTextDateSelect(_AM_WGSITENOTICE_CONT_DATE, 'cont_date', '', $this->getVar('cont_date')), true );
		// Send
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		return $form;
	}
}

/*
 * Class Object Handler WgsitenoticeContents
 */
class WgsitenoticeContentsHandler extends XoopsPersistableObjectHandler 
{
	/*
	 * Constructor
	 *
	 * @param string $db
	 */
	public function __construct(&$db) 
	{
		parent::__construct($db, 'mod_wgsitenotice_contents', 'wgsitenoticecontents', 'cont_id', 'cont_header');
	}
}