<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="<?php echo U('upload'),'','';?>" method="post"
enctype="multipart/form-data">
	<label for="file">Filename:</label>	
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>