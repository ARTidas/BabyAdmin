<?php
	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	#[\AllowDynamicProperties]
	class TodoDo extends AbstractDo {
		public $deadline_at;
		public $description;
		public $location;
		public $status;
		
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
				'deadline_at'   => $this->deadline_at,
				'description'   => $this->description,
				'location'      => $this->location,
				'status'      	=> $this->status,
				'is_active'     => $this->is_active,
				'created_at'    => $this->created_at,
				'updated_at'    => $this->updated_at,
			);
			
			return $return_array;
		}

	}
?>