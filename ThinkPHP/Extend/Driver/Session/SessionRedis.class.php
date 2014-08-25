<?php
/**
 * Redis机制的Session机制实现
 * 2014-07-31 可在现实项目中或者性能测试中再做
 * Enter description here ...
 * @author Administrator
 *
 */
Class SessionRedis{
	Public function execute(){
		session_set_save_handler
		($open, $close, $read, $write, $destroy, $gc);
	}
	
	Public function open($path,$name){
		
	}
	Public function close(){
		
	}
	Public function read($id){
		
	}
	Public function write($id,$data){
		
	}
	Public function destroy($id){
	}
	
}
?>