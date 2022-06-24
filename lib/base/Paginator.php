<?php
 if (!class_exists("MysqlDriver")) require_once(dirname(__FILE__).DS. "MysqlDriver.php");
class Paginator {
        private $_limit;
        private $_page;
        private $_total;

		protected $_db = null;
		protected $_alias = null;
		protected $_table = '';
	
		public function __construct($alias, $table, $total) {
     
			$this->_db = MysqlDriver::getInstance();
			$this->_alias = $alias;
			$this->_table = $table;
			//$rs= $this->_conn->query( $this->_query );
			$this->_total = $total;
			 
		}

		public function getData( $limit = 6, $page = 1) {
     
			$this->_limit  = $limit;
			$this->_page  = $page;
		 
			if ( $this->_limit == 'all' ) {
				$results = $this->_db->select($this->_table);
			} else {
				$results = $this->_db->select($this->_table, array(		    
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

		public function createLinks( $links, $list_class ) {
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