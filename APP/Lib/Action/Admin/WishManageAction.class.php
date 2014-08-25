<?php
class WishManageAction extends Action{
	public function index(){
		import('ORG.Util.Page');
		
		$count = M('wish')->count();
		$page = new Page($count,2);
		$limit = $page->firstRow.','.$page->listRows;
		
		$wish = M('wish')->order('time DESC')->limit($limit)->select();
		$this->wish = $wish;
		$this->page = $page->show();
		
		$this->display();
	}
};
?>