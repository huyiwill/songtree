<?php
defined('InShopNC') or exit('Access Invalid!');

class cancel_memberControl extends mobileHomeControl{

    public function __construct(){
        header("Content-type: text/html; charset=utf-8");
        parent::__construct();
    }

    public function cancel_memOp(){
        $model_member = Model('member');
        $mem_name     = $_GET['member_name'];
        if(empty($mem_name)){
            output_error('请输入会员名称');
        }
        $update = $model_member->editMember(array(
            'member_name' => $mem_name
        ), array(
            'member_truename' => '',
            'member_idnumber' => ''
        ));
        if($update){
            output_data('取消实名制成功');
        }else{
            output_data('取消实名制失败');
        }
    }
}