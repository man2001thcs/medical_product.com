<?php
require_once(dirname(__FILE__).DS. "../base/AppModel.php");
require_once(dirname(__FILE__).DS. "../base/Helper.php");
require_once(dirname(__FILE__).DS. "../base/Session.php");

class Medicine_type_s extends AppModel {
	protected $table = 'wp_medicine_type_s';
	protected $alias = 'WpMedicineTypeS';
	
	private $session = null;
	
	protected $rules = array(
		"id" => array(
			"form" => array(
				"type" => "hidden"
			)
		),
		"name" => array(
			"form" => array(
				"type" => "text"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		),
		"support" => array(
			"form" => array(
				"type" => "text"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		)
	);
	
	public function __construct() {
		parent::__construct();
		
		$this->session = new Session();
	}
	
}