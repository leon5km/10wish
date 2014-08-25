<?php
class LoginAction extends Action{
	public function _initialize(){
		//echo "This the LoginAction's autorun function.";
		session_start();//session默认启动了
	}
	
	public function index(){
		$this->display('login');
		
	}
	/**
	 * 检验登录数据：登录成功跳转到后台首页。登录失败跳到登录页面。
	 * Enter description here ...
	 */
	public function login(){
		if (!IS_POST)halt('页面不存在');
		var_dump($_POST);
		
		var_dump(I('code','','md5'));
		var_dump($_SESSION['verify']);
		if (md5(I('code'))!=$_SESSION['verify']) {
			$this->error('验证码错误');
		}
		
		$username = I('username');
		$pwd = I('password','','md5');
		
		$user = M('user')->where(array('username'=>$username))->find();
		
		if (!user||$user['password']!=$pwd){
			$this->error('账号或密码错误！');
		}
		if ($user['lock'])$this->error('用户被锁定');
		
		//更新登录状态
		$data = array(
			'id' => $user['id'],
			'logintime' => time(),
			'loginip' => get_client_ip()
		);
		
		M('user')->save($data);
		
		//写入session TODO
		$_SESSION['id'] = $data['id'];
		$_SESSION['logintime'] = $data['logintime'];
		$_SESSION['loginip'] = $data['loginip'];
		
		
		$this->redirect('Admin/Index/index');
	}
	public function vertify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(1,5,'png',80,25);
	}

	public function logout(){
		session_unset();
		session_destroy();
		$this->redirect('Admin/Login/index');
		
	}
	
	
	/**
	 * 使用AJAX校检验证码
	 * Enter description here ...
	 */
	public function checkcode(){
		$code = md5(I('code'));
		if($code = $_SESSION.verify){
			$data = array(
				'codestat' => true
			);
        	$this->ajaxReturn($data,'json');
		}
	}
	
	/**
	 * 校检用户名是否存在 TODO
	 * Enter description here ...
	 */
	public function checkusername(){
		
	}
	
	
};

?>