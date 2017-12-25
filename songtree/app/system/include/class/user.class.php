<?php

# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');

/**
 * 前台会员类
  error_data
  error_username_blank
  error_username_cha
  error_username_exist
  error_password
 */
load::sys_func('power'); //兼容以前函数用，新版中不要调用里面函数

class user {

    public $lang;
    public $errorno;
    public $paraclass;
    //密码
    public $password = '';

    public function __construct() {
        global $_M;
        $this->lang = $_M['lang'];
        $this->paraclass = load::sys_class('para', 'new');
    }

    //会员注册
    public function register($username, $password, $email, $tel, $info, $valid, $groupid, $source) {
        global $_M;
        $userid = $this->insert_uesr($username, $password, $email, $tel, $valid, $groupid, $source);
        if ($userid) {
            $this->paraclass->insert_para($userid, $info, 10);
            return true;
        } else {
            return false;
        }
    }

    public function insert_uesr($username, $password, $email, $tel, $valid, $groupid, $source) {
        if (!$this->check_password($password)) {
            return false;
        }
      
        $this->password = $password;
        $password = md5($password);
        return $this->insert_uesr_sql($username, $password, $email, $tel, $valid, $groupid, $source);
    }

    public function insert_uesr_sql($username, $password, $email, $tel, $valid, $groupid = '', $source = '', $register_time = '', $register_ip = '', $login_time = '', $login_ip = '', $login_count = '') {
        global $_M;

        if (!$this->check_username($username)) {
            return false;
        }
        if (!$password) {
            return false;
        }
             #判断插件是否存在
       
         $isplugin = load::is_plugin_exist('doregister');


         if($isplugin){
             # 系统账号注册接口
             $registerres = load::plugin('doregister', 1, array($username,$this->password,$email));
         }else{
              $registerres=NULL;
         }
        
        
        # $registerres = NULL    说明插件不存在
        # $registerres = false   说明注册失败
        # $registerres = ture    说明注册成功
        if($registerres === false) return false;
        
        # 系统账号注册

        if (!$groupid) {
            $group = $this->get_default_group();
            $groupid = $group[id];
        }
        if (!$login_time) $login_time = time();
        if (!$register_time) $register_time = time();
        if (!$register_ip) $register_ip = get_userip();

        $query = "INSERT INTO {$_M['table']['user']} SET 
                        username = '{$username}',
                        password = '{$password}',
                        email    = '{$email}',
                        tel      = '{$tel}',
                        groupid  = '{$groupid}',
                        register_time = '{$register_time}',
                        register_ip = '{$register_ip}',
                        login_time  = '{$login_time}',
                        valid       = '{$valid}',
                        source      = '{$source}',
                        lang        = '{$this->lang}'
        ";
        if (DB::query($query)) {
            $id= DB::insert_id();
            load::plugin('doregistert', 0, array($id,$username,$this->password,$email));
            return $id;
        } else {
             load::plugin('doregisterf', 0, array($username,$this->password,$email));
            $this->errorno = "error_data";
            return false;
        }
    }

    /* 编辑信息 */
    public function editor_uesr($userid, $email, $tel, $valid, $groupid) {
        global $_M;
        if (!$userid) {
            return false;
        }
         $isplugin = load::is_plugin_exist('douseremail');
         if($isplugin){
            $useremail=load::plugin('douseremail', 1, array($userid,$email));
         }else{
            $useremail=NULL;
         }
        
        # $useremail = NULL      说明插件不存在
        # $useremail = false     说明修改失败
        # $useremail = ture      说明修改成功
         if($useremail === false) return false;

         if($useremail !=NULL) $valid=1;
        $query = "UPDATE {$_M['table']['user']} SET
            email    = '{$email}',
            tel      = '{$tel}',
            groupid  = '{$groupid}',
            valid       = '{$valid}'
            WHERE id = '{$userid}'
        ";
        DB::query($query);
        return true;
    }

    /* 修改密码 */
    public function editor_uesr_password($userid, $password,$type=1) {
        global $_M;
        if (!$userid) {
            return false;
        }
        if (!$this->check_password($password)) {
            return false;
        }
        
       
        $isplugin = load::is_plugin_exist('douserpass');
        if($isplugin){
             # 系统密码修改接口
             $userpass = load::plugin('douserpass', 1, array($type,$userid,$_M['form']['oldpassword'],$password));
        }else{
             $userpass =NULL;
        }
      
        # $userpass = NULL      说明插件不存在
        # $userpass = false     说明修改失败
        # $userpass = ture      说明修改成功
        if($userpass || $userpass === NULL ){
            $password = md5($password);
            $query = "UPDATE {$_M['table']['user']} SET password = '{$password}' WHERE id = '{$userid}' ";
            DB::query($query);
        }
        return true;
    }

    /* 修改邮箱 */
    public function editor_uesr_email($userid, $email) {
        global $_M;
        if (!$userid) {
            return false;
        }
        if ($this->get_user_by_email($email)) {
            return false;
        }
        
        $isplugin = load::is_plugin_exist('douseremail');
        if($isplugin){
           #系统邮件修改接口
           $useremail = load::plugin('douseremail', 1, array($userid,$email));
        }else{
           $useremail=NULL;
        }
       
        # $useremail = NULL   说明插件不存在
        # $useremail = false  说明修改失败
        # $useremail = ture   说明修改成功
        if($useremail || $useremail === NULL ){
            $query = "UPDATE {$_M['table']['user']} SET email = '{$email}' WHERE id = '{$userid}' ";
            DB::query($query);
        }
        return true;
    }

    /* 修改手机 */
    public function editor_uesr_tel($userid, $tel) {
        global $_M;
        if (!$userid) {
            return false;
        }
        if ($this->get_user_by_tel($tel)) {
            return false;
        }
        $query = "UPDATE {$_M['table']['user']} SET tel = '{$tel}' WHERE id = '{$userid}'";
        DB::query($query);
        return true;
    }

    /* 修改字段 */ //返回会员信息 $type 等于md5时，是进行加密后的验证
    public function login_by_password($username, $password, $type = 'pass') {
        global $_M;
        if ($this->check_str($username)) {
            //获取会员信息
            # 插件登陆
            load::plugin('douserlogin', 1, array($type,$username,$password));
            # 插件登陆
            $user = $this->get_user_by_username($username);
            $password = md5($password);
            if ($user && ($user['password'] == $password || (md5(md5($user['password'])) == $password && $type = 'md5'))) {
                # 系统登陆接口
                //将帐号和密码的加密字符串以及加密密钥写入cookie
                $this->setauth($user['username'], $user['password']);
                //完善会员信息的头像地址
                if (file_exists(PATH_WEB . str_replace('../', $user['head'])) && $user['head']) {
                    $user['head'] = $_M['url']['site'] . str_replace('../', '', $user['head']);
                } else {
                    $user['head'] = $_M['url']['static'] . 'img/user.jpg';
                }
                //将会员信息传递给$_M['user']参数
                $this->set_m($user);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function set_login_record($user) {
        global $_M;
        $login_time = time();
        $login_count = $user['login_count'] ? $user['login_count'] + 1 : 1;
        $login_ip = get_userip();
        $query = "UPDATE {$_M['table']['user']} SET 
            login_time  = '{$login_time}', 
            login_count = '{$login_count}', 
            login_ip    = '{$login_ip}' 
            WHERE id    = '{$user[id]}' ";
        DB::query($query);
    }

    public function login_by_auth($auth, $key) {
        global $_M;
        if ($auth && $key) {
            //解码，获取帐号和密码
            $user = $this->getauth($auth, $key);
            
            //重新登陆
            return $this->login_by_password($user['username'], $user['password'], 'md5');
        } else {
            return false;
        }
    }

    public function login_out() {
        global $_M;
        $_M['user'] = array();
        met_setcookie("met_auth", '', -3600);
        met_setcookie("met_key", '', -3600);
    }

    //返回所有的会员信息
    public function get_user_by_username($username) {
        global $_M;
        $user = self::get_user_by_nameid($username);
        //查询有值
        if (!$user) {
            load::sys_func('str');
            # 返回的实体信息，根据邮件获取方法要更换掉
            if (is_email($username)) $user = $this->get_user_by_emailid($username);
            if (is_phone($username)) $user = $this->get_user_by_tel($username);
            //if($user)$this->get_user_by_username($user['username']);
        }
        //
        return $this->analyze($user);
    }

    //会员账号有效性检测 返回值false 
    public function get_user_by_username_sql($username) {
        global $_M;
     
        $isplugin = load::is_plugin_exist('douserok');
        if($isplugin){
             # 系统账号检测接口
            $userokres = load::plugin('douserok', 1, $username);
        }else{
            $userokres =NULL;
        }
       
        # $userokres = NULL  说明插件不存在，需要进行本站检测
        # $userokres = false 说明在插件表内重复，不再进行检测，
        # $userokres = ture  说明账号可用
        # 需注意采用全等比较 === 
        if ($userokres || $userokres === NULL) {
            $user = self::get_user_by_nameid($username);
        }
        #返回 false 表示可注册。
        return $user;
    }

    public function get_admin_by_username_sql($username) {
        global $_M;
        $query = "SELECT id FROM {$_M['table']['admin_table']} WHERE admin_id='{$username}'";
        $user = DB::get_one($query);
        return $user;
    }

    public function get_user_by_id($id) {
        $user = $this->get_user_by_id_sql($id);
        return $this->analyze($user);
    }

    public function get_user_by_id_sql($id) {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['user']} WHERE id='{$id}'";
        $user = DB::get_one($query);
        return $user;
    }

    public function get_user_para($id) {
        global $_M;
        $para = $this->get_user_para_info();

        $query = "SELECT * FROM {$_M['table']['user_list']} WHERE userid='{$id}'";
        $result = DB::query($query);

        while ($list = DB::fetch_array($result)) {
            $para_info[$list['paraid']] = $list;
        }

        foreach ($para as $key => $val) {
            $l['name'] = $val['name'];
            $l['info'] = $para_info[$val['id']]['info'];
            $paralist[] = $l;
        }
        return $paralist;
    }

    // $user 会员信息，增加会员的会员组权限以及会员组名
    public function analyze($user) {
        if ($user) {
            $user['access'] = $this->get_group_access($user['groupid']);
            $user['group_name'] = $this->get_group_name($user['groupid']);
            //$user['para'] = $this->get_user_para($user['id']);
        }
        return $user;
    }

    // 会员组权限
    public function get_group_access($groupid) {
        global $_M;
        $mgroup = load::sys_class('group', 'new');
        $mgroup->set_lang($this->lang);
        $group = $mgroup->get_group($groupid);
        return $group['access'];
    }

    //会员组名
    public function get_group_name($groupid) {
        global $_M;
        $mgroup = load::sys_class('group', 'new');
        $mgroup->set_lang($this->lang);
        $group = $mgroup->get_group($groupid);
        return $group['name'];
    }

    public function get_default_group() {
        $mgroup = load::sys_class('group', 'new');
        $mgroup->set_lang($this->lang);
        $group = $mgroup->get_default_group();
        return $group;
    }

    public function get_user_para_info() {
        $para = load::sys_class('para', 'new');
        //$para->set_lang($this->lang);
        $paralist = $para->get_para_list(10);
        return $paralist;
    }

    public function modify_head($id, $head) {
        global $_M;
        if($head!=""){
        $query = "UPDATE {$_M['table']['user']} SET head = '{$head}' WHERE id = '{$id}' ";
        DB::query($query);
        }
    }

    //将帐号和密码 以及加密字符串写入cookie
    public function setauth($username, $password) {
        global $_M;
        $private_key = random(7);
        $password = md5($password);
         //  \t 是跳格符号
        $private_auth = load::sys_class('auth', 'new')->encode("{$username}\t{$password}", $private_key, 31536000);
        //$private_auth 帐号和密码的字符字符串
        //$private_key 加密密钥字符串
        met_setcookie("acc_auth", $private_auth, 0);
        met_setcookie("acc_key", $private_key, 0);
    }

    public function getauth($auth, $key) {
        global $_M;
        $private_auth = $auth;
        $private_key = $key;
        list($return['username'], $return['password']) = explode("\t", load::sys_class('auth', 'new')->decode($private_auth, $private_key));
        return $return;
    }

    //用户名的有效性
    public function check_username($username) {
        global $_M;
        if (!$username) {
            $this->errorno = 'error_username_blank';
            return false;
        }
        if (!$this->check_str($username)) {
            $this->errorno = 'error_username_cha';
            return false;
        }

        $user = $this->get_user_by_username_sql($username);
        if ($user) {
            $this->errorno = 'error_username_exist';
            return false;
        }
        $user = $this->get_admin_by_username_sql($username);
        if ($user) {
            $this->errorno = 'error_username_exist';
            return false;
        }
        return true;
    }

    //密码的有效性
    public function check_password($password) {
        global $_M;
        if (!$password) {
            $this->errorno = 'error_password_blank';
            return false;
        }
        $len = str_length($password, 1);
        if ($len < 6 || $len > 30) {
            $this->errorno = 'error_password_cha';
            return false;
        }
        return true;
    }

    //长度
    public function check_str($username) {
        $len = str_length($username, 1);
        if ($len < 2 || $len > 30) {
            $this->errorno = 'error_username_cha';
            return false;
        }
        $guestexp = '\xA1\xA1|\xAC\xA3|^Guest|^\xD3\xCE\xBF\xCD|\xB9\x43\xAB\xC8';
        if ($len > 30 || $len < 2 || preg_match("/\s+|^c:\\con\\con|[%,\*\"\s\<\>\&]|$guestexp/is", $username)) {
            $this->errorcode = "含有非法字符";
            $this->errorno = 'error_username_cha';
            return false;
        }
        return true;
    }

    protected function set_m($user) {
        global $_M;
        $_M['user'] = array();
        $_M['user'] = $user;
    }

    protected function get_m() {
        global $_M;
        $re = $_M['user'];
        //$re['cookie'] = array();
        return $re;
    }

    public function get_login_user_info() {
        return $this->get_m();
    }

    public function get_user_valid($username) {
        global $_M;
        $user = $this->get_user_by_username($username);
        if ($user) {
            if ($user['valid'] == 0) {
                $query = "UPDATE {$_M['table']['user']} SET valid = '1' WHERE id = '{$user[id]}' ";
                DB::query($query);
            }
            return true;
        } else {
            return false;
        }
    }

    //通过用户名查询
    public function get_user_by_nameid($username) 
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['user']} WHERE username='{$username}'";
        $user = DB::get_one($query);
        return $user;
    }
    
    //通过邮件查询
    public function get_user_by_email($email) 
    {
        global $_M;
     
        $isplugin = load::is_plugin_exist('doemail');
        if($isplugin){
            # 系统email检测接口
            $emailres = load::plugin('doemail', 1, $email);
        }else{
            $emailres =NULL;
        }
        
        # $emailres = NULL  说明插件不存在，需要进行本站检测
        # $emailres = false 说明在插件表内重复，不再进行检测，
        # $emailres = ture  说明邮箱可用
        if ($emailres ||  $emailres === NULL) {
            $user = self::get_user_by_emailid($email);
        }
        #返回 false 表示可注册。
        return $user;
    }
    //通过邮件查询
    public function get_user_by_emailid($email) 
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['user']} WHERE email='{$email}'";
        $user = DB::get_one($query);
        return $user;
    }
    
    //通过电话查询
    public function get_user_by_tel($tel) {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['user']} WHERE tel='{$tel}'";
        $user = DB::get_one($query);
        return $user;
    }

    //cookie
    public function logout() {
        global $_M;
        met_cooike_unset('metinfo_member_name');
        met_setcookie("acc_auth", '');
        met_setcookie("acc_key", '');
        $this->set_m('');
        # 系统登陆退出接口
        load::plugin('dologout');
       
    }

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>