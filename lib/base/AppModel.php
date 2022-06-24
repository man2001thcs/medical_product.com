<?php
if (!class_exists("MysqlDriver")) require_once(dirname(__FILE__).DS. "MysqlDriver.php");
if (!class_exists("Form")) require_once(dirname(__FILE__).DS. "Form.php");

/**
 * Base class for all model
 * @author TrungBQ
 *
 */
class AppModel {
	/**
	 * Database connection
	 */
	protected $db = null;
	
	/**
	 * Alias to return the data
	 */
	protected $alias = null;
	
	/**
	 * Name of the table in database
	 */
	protected $table = '';

	//for get data, pagination
	private $_limit;
    private $_page;
    private $_total;

	/**
	 * Current data this record is holding
	 */
	protected $data = null;
	
	/**
	 * Validation errors
	 */
	protected $errors = null;
	
	/**
	 * Form helper
	 */
	public $form = null;
	
	/**
	 * Rules to validate
	 */
	protected $rules = null;
	
	public function __construct() {
		// Create db instance
		$this->db = MysqlDriver::getInstance();
		
		// Set log query file path
		$this->db->setLogFile(dirname(__FILE__) . '/../logs/queries.log');
		
		// Form object
		$this->form = new Form();
		$this->form->setModel($this->alias);
		$this->form->setRules($this->rules);
	}
	
	public function save($data) {
		$this->data = $data;
		$this->form->data = $data;
		
		if (!$this->form->validate($this->data[$this->alias])) {
			return false;
		}
		
		if (isset($this->data[$this->alias]['id']) && !empty($this->data[$this->alias]['id'])) {
			$id = $this->data[$this->alias]['id'];
			return $this->db->update($this->table, $this->data[$this->alias], array('id' => $id));
		} else {
			unset($this->data[$this->alias]['id']);
			$saved = $this->db->insert($this->table, $this->data[$this->alias]);
			if ($saved) {
				$this->data[$this->alias]['id'] = $this->db->lastInsertId();
				return $saved;
			}
		}
	}

	public function find($conditions, $first = 'all') {
		$results = $this->db->select($this->table, $conditions);
		//echo json_encode($conditions);
		
		if (!empty($results) && $first == 'first') {
			return $results[0];			
		}
		//echo json_encode($results);
		
		return $results;
	}


	public function findById($id) {
		$data = $this->find(array(		    
			'conditions' => array($this->alias.'.id' => $id)
		), 'first');
		$this->form->data = $data;
		return $data;
	}

	public function findByNamePart($name) {
		$temp = "LIKE '%";
		$temp .= $name . "%'";
		$data = $this->find(array(		    
			'conditions' => array($this->alias.'.name' => $temp)
		), 'all');
		$this->form->data = $data;
		return $data;
	}

	//find user by id
	public function findById_User($id) {
		$data = $this->find(array(
			'fields' => array($this->alias.'.email', $this->alias.'.fullname'),
			'conditions' => array($this->alias.'.id' => $id)
		), 'first');
		
		$this->form->data = $data;
		return $data;
	}
	//get number of row
	public function number_all() {
		$data = $this->find(array(
			'fields' => array($this->alias.'.id')
		), 'all');
		
		$size = sizeof($data);
		$this->_total = $size;
		return $size;
	}
	//delete by id
	public function deleteById($id) {
		$this->db->delete($this->table, array(
			$this->table.'.id' => $id
		));
	}
	//delete by condition
	public function delete($conditions) {
		$this->db->delete($this->table, $conditions);
	}
	//get all for test
	public function findAll() {
		return $this->db->select($this->table);
	}

	//get data
	public function getData( $limit = 6, $page = 1) {
     
		$this->_limit  = $limit;
		$this->_page  = $page;
	 
		if ( $this->_limit == 'all' ) {
			$results = $this->db->select($this->_table);
		} else {
			$results = $this->db->select($this->table, array(		    
				'offset' => ($this->_limit * ($this->_page - 1 )),
				'limit' => $this->_limit
			));

		}	 
		
	 
		$result         = new stdClass();
		$result->page   = $this->_page;
		$result->limit  = $this->_limit;
		$result->total  = $this->_total;
		$result->data   = $results;
	 
		return $result;
	}

	//getdata but with condition for bill

	public function getDataWithConM( $limit = 6, $page = 1, $user_id) {
     
		$this->_limit  = $limit;
		$this->_page  = $page;
	 
		if ( $this->_limit == 'all' ) {
			$results = $this->db->select($this->_table);
		} else {
			if ($user_id == 0){
				$results = $this->db->select($this->table, array(		    
					'offset' => ($this->_limit * ($this->_page - 1 )),
					'limit' => $this->_limit,
					'conditions' => array($this->alias.'.user_id' => $user_id, $this->alias.'.tool_id' => 0)
				));
			} else {
				$results = $this->db->select($this->table, array(		    
					'offset' => ($this->_limit * ($this->_page - 1 )),
					'limit' => $this->_limit,
					'conditions' => array($this->alias.'.tool_id' => 0)
				));
			}
			

		}	 
		
	 
		$result         = new stdClass();
		$result->page   = $this->_page;
		$result->limit  = $this->_limit;
		$result->total  = $this->_total;
		$result->data   = $results;
	 
		return $result;
	}

	public function getDataWithConT( $limit = 6, $page = 1, $user_id = null) {
     
		$this->_limit  = $limit;
		$this->_page  = $page;
	 
		if ( $this->_limit == 'all' ) {
			$results = $this->db->select($this->_table);
		} else {
			if ($user_id == 0){
				$results = $this->db->select($this->table, array(		    
					'offset' => ($this->_limit * ($this->_page - 1 )),
					'limit' => $this->_limit,
					'conditions' => array($this->alias.'.user_id' => $user_id, $this->alias.'.medicine_id' => 0)
				));
			} else {
				$results = $this->db->select($this->table, array(		    
					'offset' => ($this->_limit * ($this->_page - 1 )),
					'limit' => $this->_limit,
					'conditions' => array($this->alias.'.medicine_id' => 0)
				));
			}

		}	 
		
		$result         = new stdClass();
		$result->page   = $this->_page;
		$result->limit  = $this->_limit;
		$result->total  = $this->_total;
		$result->data   = $results;
	 
		return $result;
	}

	public function number_all_billM() {
		$data = $this->find(array(
			'fields' => array($this->alias.'.id'),
			'condition' => array($this->alias.'.tool_id' => 0)
		), 'all');
		
		$size = sizeof($data);
		$this->_total = $size;
		return $size;
	}

	public function number_all_billT() {
		$data = $this->find(array(
			'fields' => array($this->alias.'.id'),
			'condition' => array($this->alias.'.medicine_id' => 0)
		), 'all');
		
		$size = sizeof($data);
		$this->_total = $size;
		return $size;
	}

	//pagination for page
	public function createLinks( $links, $list_class = 'pagination' ) {

		if ( $this->_limit == 'all' ) {
			return '';
		}
	 
		$last       = ceil( $this->_total / $this->_limit );
	 
		$start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
		$end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
	 
		$html       = '<nav class="' . $list_class . '">';
		$html       = '<ul class="' . $list_class . '">';
	 
		$class      = ( $this->_page == 1 ) ? "disabled" : "";
		$html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
	 
		if ( $start > 1 ) {
			$html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
			$html   .= '<li class="disabled"><span>...</span></li>';
		}
	 
		for ( $i = $start ; $i <= $end; $i++ ) {
			$class  = ( $this->_page == $i ) ? "active" : "";
			$html   .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
		}
	 
		if ( $end < $last ) {
			$html   .= '<li class="disabled"><span>...</span></li>';
			$html   .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
		}
	 
		$class      = ( $this->_page == $last ) ? "disabled" : "";
		$html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';
	 
		$html       .= '</ul>';
	 
		return $html;
	}
}
