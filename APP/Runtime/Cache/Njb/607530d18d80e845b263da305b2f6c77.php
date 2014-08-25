<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>日报（旧统计模板）</h3>
<form action="<?php echo U('tongji','','');?>" method="get">
选择区域:<br> 
<input type="checkbox" name="checkbox[]" value="24521">怀远县  
<input type="checkbox" name="checkbox[]" value="24543">五河县   
<input type="checkbox" name="checkbox[]" value="24561">固镇县 
<input type="checkbox" name="checkbox[]" value="28422">泰和县<br>
输入时间:<br>
开始时间：<input type="text" name="date_begin">
结束时间：<input type="text" name="date_end">(不包含)<br>
<input type="submit" value="提交">
</form>
<h3>周报、月报（PPT运营分析模板）</h3>
<form action="<?php echo U('zhoubao','','');?>" method="get">
选择区域:<br> 
<input type="checkbox" name="checkbox[]" value="24521">怀远县  
<input type="checkbox" name="checkbox[]" value="24543">五河县   
<input type="checkbox" name="checkbox[]" value="24561">固镇县 
<input type="checkbox" name="checkbox[]" value="28422">泰和县<br>
输入时间:<br>
开始时间：<input type="text" name="date_begin">
结束时间：<input type="text" name="date_end">(不包含)<br>
<input type="submit" value="提交">
</form>

</body>
</html>