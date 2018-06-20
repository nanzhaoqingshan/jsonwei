<?php
namespace Common\ext;
class page extends \Think\Controller{
	public  $count;
	public	$page;
	public	$size;
	public	$PageCount;
	public	$result;
	public	$first;
	public	$end;
	public	$PageInfo;
	public function __construct($count=1,$size = 10){
		parent::__construct();
		$this->count= $count;
		if (I('get.page')) {
			$this->page = intval(I('get.page'));
		}else{
			$this->page = 1;
		}
		$this->size = $size;
		$this->getResult();
	}
	public function getResult(){
		//总页数
		$this->PageCount = ceil($this->count / $this->size);
		//开始
		$this->first      = ($this->page-1)*$this->size;
		//结束
		$this->end        = $this->size;
		$result['page']  = $this->page;
		$result['count'] = $this->PageCount;
		$result['size']  = $this->size;
		$this->PageInfo  = $result;
	}
}
?>
