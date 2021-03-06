<?php
/**
 * @package     RedMIGRATOR.Backend
 * @subpackage  Controller
 *
 * @copyright   Copyright (C) 2012 - 2015 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * 
 *  redMIGRATOR is based on JUpgradePRO made by Matias Aguirre
 */

class RedMigratorVirtuemartCountry extends RedMigrator
{
    public function dataHook($rows)
    {
        // Keep fields in new table (2.5.x or 3.x) which have values in old table (1.5.x)
        $arrFields = array('virtuemart_country_id',
                            'virtuemart_worldzone_id',
                            'country_name',
                            'country_3_code',
                            'country_2_code'
                        );

        // Do some custom post processing on the list.
        foreach ($rows as &$row)
        {
            $row = (array) $row;

            // Change fields' name
            if (isset($row['country_id']))
            {
                $row['virtuemart_country_id'] = $row['country_id'];
            }
            
            if (isset($row['zone_id']))
            {
                $row['virtuemart_worldzone_id'] = $row['zone_id'];
            }

            // Remove fields in old table which are not in new talbe
            foreach ($row as $key => $value)
            {
                if (!in_array($key, $arrFields))
                {
                    unset($row[$key]);
                }
            }
        }

        return $rows;
    }
}
?>