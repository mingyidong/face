<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
</head>  

</html>  
<?php
/**********************
一个简单的目录递归函数
第一种实现办法：用dir返回对象
***********************/
function tree($directory) 
{ 
	$mydir = dir($directory); 
	echo "<ul>\n"; 
	while($file = $mydir->read())
	{ 
		if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")) 
		{
			echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n"; 
			tree("$directory/$file"); 
		} 
		else 
		echo "<li>$file</li>\n"; 
	} 
	echo "</ul>\n"; 
	$mydir->close(); 
} 
//开始运行

//echo "<h2>目录为粉红色</h2><br>\n"; 
//tree("D:\\AR"); 

/***********************
第二种实现办法：用readdir()函数
************************/
function listDir($dir, &$names, &$img_urls)
{
	if(is_dir($dir))
   	{
     	if ($dh = opendir($dir)) 
		{
        	while (($file = readdir($dh)) !== false)
			{
				
     			if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
				{
     				//echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
     				listDir($dir."/".$file."/");
     			}
				else
				{
					$file = iconv("gb2312","UTF-8",$file);
         			if($file!="." && $file!="..")
					{
         				//echo $file."<br>";
						//var_dump($file);
						$file_name = strstr($file, '.', true);
						//echo $file_name."<br>";
						array_push($names, $file_name);
						array_push($img_urls, $dir."/".$file);
      				}
					
     			}
        	}
        	closedir($dh);
     	}
   	}
}
//开始运行
//$file_names = array();
//listDir("E:\\test", $file_names);
//var_dump($file_names);
//$name = array("叶子", "朱镇模");
//echo $name[0];
?>

