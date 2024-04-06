<?php

/* ********************************************************
 * ********************************************************
 * ********************************************************/
class BreastfeedBo {

	protected $dao;

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	public function __construct() {
		$this->dao = (new DaoFactory)->get(DaoFactory::BREASTFEED);
	}
  
	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	public function create(BreastfeedDo $do) {
		return ($this->dao)->create(
			[
				$do->breast,
				$do->feeding_start,
				$do->feeding_end,
                $do->weight_start,
                $do->weight_end
			]
		);
	}

    /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	public function getLastRecord() {
        return (new DoFactory())->get(
            DoFactory::BREASTFEED,
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
                $do_list[] = $do_factory->get(DoFactory::BREASTFEED, $record);
            }
        }
        
        return $do_list;
    }

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	public function get(BreastfeedDo $do) {
        return (new DoFactory())->get(
            DoFactory::BREASTFEED,
            ($this->dao)->get(
				[
					$do->id
				]
			)
        );
	}

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	public function modify(BreastfeedDo $do) {
        return ($this->dao)->modify(
			[
				$do->breast,
				$do->feeding_start,
				$do->feeding_end,
				$do->weight_start,
				$do->weight_end,
				$do->is_active,
				$do->id
			]
		);
	}
  
}
?>
