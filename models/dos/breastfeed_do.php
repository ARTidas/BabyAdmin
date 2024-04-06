<?php
	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	#[\AllowDynamicProperties]
	class BreastfeedDo extends AbstractDo {
		public $breast;
		public $feeding_start;
		public $feeding_end;
		public $weight_start;
		public $weight_end;
		
		function __construct($attributes = null, $class_actor = null) {
			$this->class_actor = $class_actor;
			
			if ($attributes != null) {
				foreach ($attributes as $key => $value) {
					$this->$key = $value;
				}
			}
		}
		
		public function getAttributeArray() {
			$return_array = array(
				'id'            => $this->id,
				'breast'        => $this->breast,
				'feeding_start' => $this->feeding_start,
				'feeding_end'   => $this->feeding_end,
				'weight_start'  => $this->weight_start,
				'weight_end'    => $this->weight_end,
				'is_active'     => $this->is_active,
				'created_at'    => $this->created_at,
				'updated_at'    => $this->updated_at,
			);
			
			return $return_array;
		}

	}
?>