<?php


class MessageAction extends CommAction {
	
	public function index(){
		import("Class.Page",LIB_PATH);
			$count=M('message')->count();
			$Page= new Page($count,25);										
		
		$key=M('message')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$show= $Page->show();			

			$this->assign('page',$show);
		$this->key=$key;
		$this->display();
	}
	public function edit(){
		
	
		if($_POST['del']==1){
		$i=0;
		while($i<=count($_POST['id'])){
					M('message')->where(array('id'=>$_POST['id'][$i]))->delete();					
					$i++;
		}
		$this->success('删除成功');
		
		}
	}
}
?>