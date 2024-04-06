<?php

/* ********************************************************
 * ********************************************************
 * ********************************************************/
class TodoBo {

	protected $dao;

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	public function __construct() {
		$this->dao = (new DaoFactory)->get(DaoFactory::TODO);
	}
  
	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	public function create(TodoDo $do) {
		return ($this->dao)->create(
			[
				$do->deadline_at,
				$do->description,
				$do->location,
                $do->status,
			]
		);
	}

    /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	public function getLastRecord() {
        return (new DoFactory())->get(
            DoFactory::TODO,
            ($this->dao)->getLastRecord()
        );
	}

    /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
    public function getList() {
        $do_factory = new DoFactory();
        $do_list = [];
        
        $records = $this->dao->getList();
        
        if (empty($records)) {
            print_r("No records available...");
        }
        else {
            foreach ($records as $record) {
                $do_list[] = $do_factory->get(DoFactory::TODO, $record);
            }
        }
        
        return $do_list;
    }
  
}
?>
