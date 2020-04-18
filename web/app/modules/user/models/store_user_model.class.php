<?php

namespace app\user;

use \yangzie\YZE_Model;
use \yangzie\YZE_SQL;
use \yangzie\YZE_DBAException;
use \yangzie\YZE_DBAImpl;

/**
 *
 *
 * @version $Id$
 * @package user
 */
class Store_User_Model extends YZE_Model
{

    const TABLE = "store_user";
    const VERSION = 'modified_on';
    const MODULE_NAME = "user";
    const KEY_NAME = "id";
    const CLASS_NAME = 'app\user\Store_User_Model';

    /**
     *
     * @var integer
     */
    const F_ID = "id";
    /**
     *
     * @var string
     */
    const F_UUID = "uuid";
    /**
     *
     * @var string
     */
    const F_STORE_NAME = "store_name";
    /**
     *
     * @var string
     */
    const F_PASSWORD = "password";
    /**
     *
     * @var string
     */
    const F_WX_AAPID = "wx_aapid";
    /**
     *
     * @var string
     */
    const F_TYPE = "type";
    public static $columns = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => '11', 'default' => '',),
        'uuid' => array('type' => 'string', 'null' => true, 'length' => '45', 'default' => '',),
        'store_name' => array('type' => 'string', 'null' => true, 'length' => '90', 'default' => '',),
        'password' => array('type' => 'string', 'null' => true, 'length' => '45', 'default' => '',),
        'wx_aapid' => array('type' => 'string', 'null' => true, 'length' => '90', 'default' => '',),
        'type' => array('type' => 'string', 'null' => true, 'length' => '45', 'default' => '',),

    );
    //array('attr'=>array('from'=>'id','to'=>'id','class'=>'','type'=>'one-one||one-many') )
    //$this->attr
    protected $objects = array();
    /**
     * @see YZE_Model::$unique_key
     */
    protected $unique_key = array(
        'id' => 'PRIMARY',
    );

    /**
     * @param $store_name
     * @param $password
     * @author weiqianlai 2020-04-18
     */
    public function login($store_name, $password)
    {
        return Store_User_Model::from()
            ->where("store_name=:store_name AND password=:password")
            ->getSingle([":store_name" => $store_name, ":password" => $password]);
    }


}

?>