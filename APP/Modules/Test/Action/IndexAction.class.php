<?php
class IndexAction extends Action{
	public function index(){
		$this->display();
	}
	
	public function upload(){
		//变量
		$upload_folder = "D:/tmp/";
		
		//文件属性要求
		$allowedExts = array('jpg','jpeg','png');
		$file_max_size = 10*1024*1024;
		
		//获取文件信息
		$temp = explode('.', $_FILES['file']['name']);
		$extension = end($temp);
		
		$filesize = $_FILES['file']['size'];
		
		
		//检查文件条件
		if (in_array($extension, $allowedExts)&&
			$filesize<$file_max_size){
			if ($_FILES['file']['error']>0){
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
	  		else{
            	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            	echo "Type: " . $_FILES["file"]["type"] . "<br>";
            	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            	echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

            	if (file_exists("upload/" . $_FILES["file"]["name"]))
            	{
      				echo $_FILES["file"]["name"] . " already exists. ";
      			}
    			else
      			{
      				$result = move_uploaded_file($_FILES["file"]["tmp_name"],
      				$upload_folder . $_FILES["file"]["name"]);
      				
      				var_dump($result);
      				
      				echo "Stored in: " . $upload_folder . $_FILES["file"]["name"];
      			}
    		}
		}
		else{
			echo 'Invalid file';
		}
	}
};
?>