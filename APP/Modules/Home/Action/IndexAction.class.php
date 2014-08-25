<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	public function test(){
	}
	
    public function index(){
    	echo "This is Home";
    	
		/*
		 * 查
		 */
		$Wish = M ( 'wish' );
		//输出变量到模板
		$this->assign('wish',$Wish->select());
		$this->display();
    }
    
    public function handle(){
    	if (!IS_AJAX)halt('页面不存在');
    	

    	/*
    	$phiz = array(
    			'zhuakuang.gif' => '抓狂',
    			'baobao.gif' => '抱抱',
    			'haixiu.gif' => "害羞",
    			"ku.gif" => "酷",
    			"xixi.gif" => "嘻嘻",
    			"taikaixin.gif" => "太开心",
    			"touxiao.gif" => "偷笑",
    			"qian.gif" => "钱",
    			"huaxin.gif" => "花心",
    			"jiyan.gif" => "挤眼"
    	);
    	
    	//输出数组到文件，方法一
    	$str = "<?php return ".var_export($phiz,true).';?>';
    	var_dump($str);
    	file_put_contents('./Data/phiz.php', $str);
    	//输出数组到文件，方法二
    	F('phiz',$phiz,'./Data/');
    	*/
    	//读取文件中的数组：方法一
    	/*
    	$phiz = include './Data/phiz.php';
    	var_dump($phiz);
    	*/
    	//读取文件中的数组：方法二
    	$phiz = F('phiz','','./Data/');
    	
    	
    	//准备数据写入数据库
    	$data = array(
    			'username' => I('username'),
    			'content' => I('content'),
    			'time' => time()
    	);
    	
    	/*
    	 * 增
    	*/
    	if (M('wish')->data($data)->add()){
    		//$this->success('发布成功','');//Bug:直接跳转回'index',表单无法正常提交。
    		$data['content'] = replace_phiz($data['content']);
    		$data['time'] = date('y-m-d H:i',$data['time']);
    		$data['status'] = 1;
    		$this->ajaxReturn($data,'json');
    	} else {
    		$this->error('发布失败，请重试...');
    	}
    }
    
    public function del(){
    	if (IS_GET){
    		$id = I('id');
    		$result = M('wish')->where(array('id'=> $id))->delete();
    		if ($result) {
    			//$this->success('删除成功','');
    			$data = array(
    				del_status => true
    			);
    			$this->ajaxReturn($data);
    		}
    		else{
    			//$this->error('删除失败');
    			$data = array(
    				del_status => false
    			);
    			$this->ajaxReturn($data);
    		}
    	}
    	/*
    	 * 清空
    	$result = M('wish')->where(array('id'=>array('gt',0)))->delete();
    	var_dump($result);
    	*/
    
    }
}