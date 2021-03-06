<?php
/**
 * @package     redMIGRATOR.Backend
 * @subpackage  Controller
 *
 * @copyright   Copyright (C) 2012 - 2015 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * 
 *  redMIGRATOR is based on JUpgradePRO made by Matias Aguirre
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * redMigratorTableBannersClients
 *
 * @package 	redMigrator
 * @subpackage	Table
 * @since		1.5
 */
class redMigratorTableBanners_Clients extends redMigratorTable {
	/** @var int(11) */
	var $id = null;
	/** @var varchar(255) */
	var $name = null;
	/** @var varchar(255) */
	var $contact = null;
	/** @var varchar(255) */
	var $email = null;
	/** @var text */
	var $extrainfo = null;
	/** @var tinyint(1) */
	var $state = null;
	/** @var tinyint(1) */
	var $checked_out = null;
	/** @var time */
	var $checked_out_time = null;
	/** @var varchar(50) */
	var $editor = null;

	/**
	 * Table type
	 *
	 * @var string
	 */	
	var $_type = 'banners_clients';	

	function __construct(&$db) {
		parent::__construct('#__bannerclient', 'cid', $db);
	}

	/**
	 * Setting the conditions hook
	 *
	 * @return	void
	 * @since	3.0.0
	 * @throws	Exception
	 */
	public function getConditionsHook()
	{
		$conditions = array();
		
		$conditions['select'] = '`cid` AS id, `name`, 1 AS `state`, `contact`, `email`, `extrainfo`, `checked_out`, `checked_out_time`';
		
		$conditions['where'] = array();
		
		return $conditions;
	}	

	/**
	 * 
	 *
	 * @access	public
	 * @param		Array	Result to migrate
	 * @return	Array	Migrated result
	 */
	function migrate( )
	{	
		unset($this->cid);
	}	
}
