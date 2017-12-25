<?php
class MessageAction extends CommAction {
    public function index(){	
			
		if($this->ispost()){			
				
				if(session('code') != md5(htmlspecialchars(addslashes($_POST['code']),ENT_QUOTES))){
					$this->error('验证码错误');
				}	
				if($_POST['title']==false ){
				$this->error('标题不能为空');
				}	
				if($_POST['username']==false ){
				$this->error('姓名不能为空');
				}	
				if($_POST['mail']==false ){
				$this->error('邮箱不能为空');
				}	
				if($_POST['content']==false ){
				$this->error('内容不能为空');
				}	
				$data=$_POST;
				$data['time']=time();
				if(M('message')->data($data)->add()){
				$this->success('留言成功');
				}else{
				$this->error('留言失败');
			}
			
		}else{
			$this->display();
		}
	}		

}