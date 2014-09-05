<?php
class IndexAction extends Action{
	public function _initialize(){
	}
	
	public function index(){
		$this->display();
	}
	
	public function zhoubao(){
		$this->display();
	}
	
	public function tongji(){
		$district_num_array = I("checkbox");
		$date_begin = I("date_begin");
		$date_end = I("date_end");
		$district_num = null;
		
		$district_nums = $district_num_array[0];
		for ($i=1;$i<sizeof($district_num_array);$i++){ 
			$district_nums = $district_nums.",".$district_num_array[$i];
		}
		$time_begin = $date_begin." 00:00:00";
		$time_end = $date_end." 00:00:00";
		
		
		
		$sqlist = array(
				1 => "SELECT l.name,COALESCE(a.ucount,0) as yhs,COALESCE(c.ulcount,0) as dlyhs,COALESCE(c.logCount,0) as dlcs FROM location l LEFT JOIN (SELECT ud.locid locid,COUNT(ud.id) ucount FROM   (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")    UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud     GROUP BY ud.locid  ) a ON l.id=a.locid  LEFT JOIN (SELECT ud.locid locid,COUNT(DISTINCT ud.id) ulcount,COUNT(ud.id) logCount FROM login_log lo,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE lo.user_id=ud.id   AND lo.login_time>=\"".$time_begin."\" AND lo.login_time<\"".$time_end."\"   GROUP BY ud.locid) c ON l.id=c.locid WHERE l.id IN(".$district_nums.")",
				2 => "SELECT l.name,COALESCE(a.noticeCount,0) noticeCount,COALESCE(a.userCount,0) userCount FROM location l LEFT JOIN  (SELECT ud.locid locid,COUNT(n.id) noticeCount,COUNT(DISTINCT ud.id) userCount FROM notice n,   (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")    UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud   WHERE n.owner_id=ud.id AND n.publish_time>=\"".$time_begin."\"    AND n.publish_time<\"".$time_end."\" GROUP BY ud.locid) a  ON l.id=a.locid WHERE l.id IN(".$district_nums.")",
				3 => "SELECT l.name,COALESCE(a.asCount,0) a,COALESCE(b.adminCount,0) b,COALESCE(c.noAdminCount,0) c FROM location l LEFT JOIN  (SELECT ud.locid locid,COUNT(t.id) asCount FROM assignment t,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE t.creator_id=ud.id AND t.create_time>=\"".$time_begin."\" AND  t.create_time<\"".$time_end."\"  GROUP BY ud.locid) a ON l.id=a.locid  LEFT JOIN (SELECT ud.locid locid,COUNT(DISTINCT ud.id) adminCount FROM assignment t,app_user_role r,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud   WHERE t.creator_id=ud.id AND ud.id=r.user_id AND r.role='TechAdmin'   AND t.create_time>=\"".$time_begin."\" AND  t.create_time<\"".$time_end."\"  GROUP BY ud.locid ) b ON l.id=b.locid LEFT JOIN (SELECT ud.locid locid,COUNT(DISTINCT ud.id) noAdminCount FROM assignment t,app_user_role r,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE t.creator_id=ud.id AND ud.id=r.user_id AND r.role='Technician'   AND t.create_time>=\"".$time_begin."\" AND  t.create_time<\"".$time_end."\"  GROUP BY ud.locid ) c ON l.id=c.locid  WHERE l.id IN(".$district_nums.")",
				4 => "SELECT l.name,COALESCE(a.worklogCount,0) a,COALESCE(a.uCount,0) b,COALESCE(b.docCount,0) c,COALESCE(c.phoCount,0) d,COALESCE(d.audioCount,0) e FROM location l LEFT JOIN  (SELECT ud.locid locid,COUNT(DISTINCT w.id) worklogCount,COUNT(DISTINCT w.owner_id) uCount FROM work_log w,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE w.owner_id=ud.id    AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\"  GROUP BY ud.locid) a ON l.id=a.locid LEFT JOIN  (SELECT ud.locid locid,i.media_type,COUNT(i.id) docCount FROM work_log w,work_log_item i,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE w.owner_id=ud.id AND w.id=i.work_log_id   AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\"  AND i.media_type=1   GROUP BY ud.locid ) b ON l.id=b.locid LEFT JOIN  (SELECT ud.locid locid,i.media_type,COUNT(i.id) phoCount FROM work_log w,work_log_item i,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE w.owner_id=ud.id AND w.id=i.work_log_id   AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\"  AND i.media_type=2   GROUP BY ud.locid ) c ON l.id=c.locid LEFT JOIN  (SELECT ud.locid locid,i.media_type,COUNT(i.id) audioCount FROM work_log w,work_log_item i,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE w.owner_id=ud.id AND w.id=i.work_log_id   AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\"  AND i.media_type=3   GROUP BY ud.locid ) d ON l.id=d.locid   WHERE l.id IN(".$district_nums.")",
				5 => "SELECT l.name,COALESCE(a.photoCount,0) a,COALESCE(a.ucount,0) b,COALESCE(b.priseCount,0) c,COALESCE(c.comCount,0) d FROM location l LEFT JOIN (SELECT ud.locid locid,COUNT(i.id) photoCount,COUNT(DISTINCT ud.id) ucount FROM album m,album_item i,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")  UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE m.owner_id=ud.id AND i.album_id=m.id   AND i.create_time>=\"".$time_begin."\" AND i.create_time<\"".$time_end."\"  GROUP BY ud.locid) a ON l.id=a.locid LEFT JOIN  (SELECT ud.locid locid,COUNT(uc.id) priseCount FROM user_comment uc,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")  UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE ud.id=uc.creator_id AND uc.obj_type='AlbumItem'   AND uc.create_time>\"".$time_begin."\" AND uc.create_time<\"".$time_end."\"   GROUP BY ud.locid ) b ON l.id=b.locid LEFT JOIN (SELECT ud.locid locid,COUNT(uc.id) comCount FROM user_comment uc,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")  UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE ud.id=uc.creator_id AND uc.obj_type='SystemComment'   AND uc.create_time>=\"".$time_begin."\" AND uc.create_time<\"".$time_end."\"  GROUP BY ud.locid) c ON l.id=c.locid  WHERE l.id IN(".$district_nums.")",
				6 => "SELECT a.rname a,l.name b,d.name c,a.age d FROM (SELECT u.id uid,u.real_name rname,u.location_id locid,u.dept_id depId,(2014-(SELECT SUBSTR(u.identify_value,7,4))+0) age FROM app_user u WHERE NOT EXISTS ( SELECT lo.user_id FROM login_log lo WHERE u.id=lo.user_id  ) AND u.id IN( SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id FROM app_user u WHERE u.location_id IN(".$district_nums.") )) a,location l,department d WHERE a.depId=d.id AND a.locid=l.id",
				//七、活跃用户排行
				7 => "SELECT u.id,u.real_name,COALESCE(a.worklogCount,0) worklogCount,COALESCE(b.logCount,0) logCount FROM app_user u LEFT JOIN (SELECT w.owner_id uid,COALESCE(COUNT(w.id)) worklogCount FROM work_log w WHERE w.owner_id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24561 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24561 ) AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\" GROUP BY w.owner_id) a ON u.id=a.uid LEFT JOIN (SELECT lo.user_id uid,COUNT(lo.user_id) logCount FROM login_log lo WHERE lo.user_id IN( SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24561 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24561 ) AND lo.login_time>=\"".$time_begin."\" AND lo.login_time<\"".$time_end."\" GROUP BY lo.user_id ) b ON u.id=b.uid WHERE u.id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24561 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24561 ) ORDER BY a.worklogCount DESC,b.logCount DESC LIMIT 10",
				8 => "SELECT u.id,u.real_name,COALESCE(a.worklogCount,0) worklogCount,COALESCE(b.logCount,0) logCount FROM app_user u LEFT JOIN (SELECT w.owner_id uid,COALESCE(COUNT(w.id)) worklogCount FROM work_log w WHERE w.owner_id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24521 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24521 ) AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\" GROUP BY w.owner_id) a ON u.id=a.uid LEFT JOIN (SELECT lo.user_id uid,COUNT(lo.user_id) logCount FROM login_log lo WHERE lo.user_id IN( SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24521 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24521 ) AND lo.login_time>=\"".$time_begin."\" AND lo.login_time<\"".$time_end."\" GROUP BY lo.user_id ) b ON u.id=b.uid WHERE u.id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24521 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24521 ) ORDER BY a.worklogCount DESC,b.logCount DESC LIMIT 10",
				9 => "SELECT u.id,u.real_name,COALESCE(a.worklogCount,0) worklogCount,COALESCE(b.logCount,0) logCount FROM app_user u LEFT JOIN (SELECT w.owner_id uid,COALESCE(COUNT(w.id)) worklogCount FROM work_log w WHERE w.owner_id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24543 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24543 ) AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\" GROUP BY w.owner_id) a ON u.id=a.uid LEFT JOIN (SELECT lo.user_id uid,COUNT(lo.user_id) logCount FROM login_log lo WHERE lo.user_id IN( SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24543 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24543 ) AND lo.login_time>=\"".$time_begin."\" AND lo.login_time<\"".$time_end."\" GROUP BY lo.user_id ) b ON u.id=b.uid WHERE u.id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =24543 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24543 ) ORDER BY a.worklogCount DESC,b.logCount DESC LIMIT 10",
				10 => "SELECT u.id,u.real_name,COALESCE(a.worklogCount,0) worklogCount,COALESCE(b.logCount,0) logCount FROM app_user u LEFT JOIN (SELECT w.owner_id uid,COALESCE(COUNT(w.id)) worklogCount FROM work_log w WHERE w.owner_id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =28422 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =28422 ) AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\" GROUP BY w.owner_id) a ON u.id=a.uid LEFT JOIN (SELECT lo.user_id uid,COUNT(lo.user_id) logCount FROM login_log lo WHERE lo.user_id IN( SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =28422 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =28422 ) AND lo.login_time>=\"".$time_begin."\" AND lo.login_time<\"".$time_end."\" GROUP BY lo.user_id ) b ON u.id=b.uid WHERE u.id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =28422 UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =28422 ) ORDER BY a.worklogCount DESC,b.logCount DESC LIMIT 10",
				//八、分数段汇总日志数
				12 => "
				CALL count_worklog_all(\"".$time_begin."\",\"".$time_end."\",(\"".$district_nums."\"))
				",
				//九、本周累计已登录的用户数量
				11 => "SELECT l.name,COALESCE(a.ulcount,0) b FROM  location l LEFT JOIN (SELECT ud.locid locid,COUNT(DISTINCT ud.id) ulcount,COUNT(ud.id) logCount FROM login_log lo,  (SELECT u.id,f.ancestor_id locid FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id IN(".$district_nums.")   UNION ALL SELECT u.id,u.location_id locid FROM app_user u WHERE u.location_id IN(".$district_nums.")) ud  WHERE lo.user_id=ud.id   AND lo.login_time>=\"".$time_begin."\"   GROUP BY ud.locid) a ON a.locid=l.id WHERE l.id IN (".$district_nums.")",
				
				
	);
		//导出SQL数组
    	//F('njb_sql',$sqlist,'./Data/');
    	//读取文件中的数组：方法二
    	//$sqlist= F('njb_sql','','./Data/');
		
		$model1 = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result1 = $model1->query($sqlist[1]);
		//输出变量到模板
		$this->assign('data1',$result1);
		
		$model2 = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result2 = $model2->query($sqlist[2]);
		//输出变量到模板
		$this->assign('data2',$result2);
		
		$model3 = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result3 = $model3->query($sqlist[3]);
		//输出变量到模板
		$this->assign('data3',$result3);
		
		
		$model4 = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result4 = $model4->query($sqlist[4]);
		//输出变量到模板
		$this->assign('data4',$result4);
		
		$model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $model->query($sqlist[5]);
		//输出变量到模板
		$this->assign('data5',$result);
		
		$model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $model->query($sqlist[6]);
		//输出变量到模板
		$this->assign('data6',$result);

		
		
		//七、用户活跃度排名
		$district_num_table = array(
			"24521" => "安徽蚌埠市怀远县",
			"24543" => "安徽蚌埠市五河县",
			"24561" => "安徽蚌埠市固镇县",
			"24484" => "安徽蚌埠市龙子湖区",
			"24484" => "安徽蚌埠市龙子湖区",
			"24493" => "安徽蚌埠市蚌山区",
			"24505" => "安徽蚌埠市禹会区",
			"24514" => "安徽蚌埠市淮上区",
			"28422" => "江西吉安泰和县",
		);
        $results = array();
		foreach ($district_num_array as $i){
			$model = new Model();
			$district_num = $i;
			$sql = "SELECT u.id,u.real_name,COALESCE(a.worklogCount,0) worklogCount,COALESCE(b.logCount,0) logCount FROM app_user u LEFT JOIN (SELECT w.owner_id uid,COALESCE(COUNT(w.id)) worklogCount FROM work_log w WHERE w.owner_id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =".$district_num." UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =".$district_num." ) AND w.create_time>=\"".$time_begin."\" AND w.create_time<\"".$time_end."\" GROUP BY w.owner_id) a ON u.id=a.uid LEFT JOIN (SELECT lo.user_id uid,COUNT(lo.user_id) logCount FROM login_log lo WHERE lo.user_id IN( SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =".$district_num." UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =".$district_num." ) AND lo.login_time>=\"".$time_begin."\" AND lo.login_time<\"".$time_end."\" GROUP BY lo.user_id ) b ON u.id=b.uid WHERE u.id IN(SELECT u.id FROM app_user u,location_flat f WHERE u.location_id=f.location_id AND f.ancestor_id =".$district_num." UNION ALL SELECT u.id FROM app_user u WHERE u.location_id =24561 ) ORDER BY a.worklogCount DESC,b.logCount DESC LIMIT 10";
			$results[$district_num_table[$i]] =  $model->query($sql);
		}
		$this->assign('data73',$results);
		
		
		
		
		$model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $model->query($sqlist[7]);
		//输出变量到模板
		$this->assign('data7',$result);
		
		
		$model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $model->query($sqlist[8]);
		//输出变量到模板
		$this->assign('data8',$result);
		
		
		$model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $model->query($sqlist[9]);
		//输出变量到模板
		$this->assign('data9',$result);
		
		
		$model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $model->query($sqlist[10]);
		//输出变量到模板
		$this->assign('data10',$result);
		
		
		$model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $model->query($sqlist[11]);
		//输出变量到模板
		$this->assign('data11',$result);
		
		
		$model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$result = $model->query($sqlist[12]);
		//输出变量到模板
		$this->assign('data12',$result);
		
		
		/*
		 * i
		for ($i=1;$i<4;$i++){
			$model = new Model();
			$result = $model->query($sqlist[i]);
			//输出变量到模板
			echo 'data'.$i;
			$this->assign('data'.$i,$result);
			var_dump($this);
		}
		 */
		
		
		/*
		 * 输出
		 */
		$this->display();
	}
	
}