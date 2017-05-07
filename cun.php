<? include "header.htm"; ?>

<?
// 브라우저 구별 (모바일 인식)
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");
for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
	if(strpos($_SERVER['HTTP_USER_AGENT'], $arr_browser[$indexi]) == true) {
	$j++;
	}
}

if(!$j) { $sizew = "width = 40%"; $sizeh = "height = 40%"; }
else { $sizew = "width = 80%"; $sizeh = "height = 80%"; }


if(!$_GET['num1']&&$_POST['num1']) { $num1 = $_POST['num1']; }
else { $num1 = $_GET['num1']; }

if(!$_GET['num2']) { $num2 = $_POST['num2']; }
else { $num2 = $_GET['num2']; }

if(!$_GET['rand']) { $rand = $_POST['rand']; }
else { $rand = $_GET['rand']; }

if(!$num1) { $num1 = 1; }
if(!$num2) { $num2 = 119; }

if(!$_GET['sum']) { $sum = $num2-$num1+1; } else { $sum = $_GET['sum']; }

if(!$_GET['p']) { $p = 0; } else { $p = $_GET['p']; }

	print "<center><font size=100><a class='btn btn-primary' href=index.php>Home</a><br>";

if(!$rand) { 

	$next = $num1+1;
	$prev = $num1-1;

	$nextp = $p+1;
	$prevp = $p-1;

	if($num1==1){ print "<a class='btn btn-success' href=cun.php?num1=".$next."&sum=$sum&p=$nextp&num2=".$num2.">>></a><br>"; 	}
	elseif($num1==$num2){ print "<a class='btn btn-success' href=cun.php?num1=".$prev."&sum=$sum&p=$prevp&num2=".$num2."><<</a><br>"; }
	else { 
		print "<a class='btn btn-success' href=cun.php?num1=".$prev."&sum=$sum&p=$prevp&num2=".$num2."><<</a>&nbsp &nbsp &nbsp";
		print "<a class='btn btn-success' href=cun.php?num1=".$next."&sum=$sum&p=$nextp&num2=".$num2.">>></a><br>";
	}
	print "<a href=meaning.php?meaning=".$num1."><img src=img/".$num1.".jpg $sizew $sizeh></a><br>";

	$avr=round((($p+1)/$sum)*100);
	print ($p+1)."/".$sum."&nbsp ($avr %)";
}

else {

	$flash_str = $_GET['flash_str'];

	if(!$flash_str) { 
		$flash = range($num1,$num2); 
		shuffle($flash); 
		$flash_str = $flash[0];
		for ($i=1; $i<sizeof($flash); $i++) { $flash_str = $flash_str.",".$flash[$i]; }
	}

	$next = $p+1;
	$prev = $p-1;

	$flash = split(",",$flash_str);

	if($p==0){ print "<a class='btn btn-success' href=cun.php?sum=$sum&p=".$next."&rand=1&flash_str=".$flash_str.">>></a><br>"; 	}
	elseif($p==sizeof($flash)-1){ print "<a href=cun.php?sum=$sum&p=".$prev."&rand=1&flash_str=".$flash_str."><<</a><br>"; }
	else { 
		print "<a class='btn btn-success' href=cun.php?sum=$sum&p=".$prev."&rand=1&flash_str=".$flash_str."><<</a>&nbsp &nbsp &nbsp";
		print "<a class='btn btn-success' href=cun.php?sum=$sum&p=".$next."&rand=1&flash_str=".$flash_str.">>></a><br>";
	}
	print "<a href=meaning.php?meaning=".$flash[$p]."><img src=".$flash[$p].".jpg $sizew $sizeh></a><br>";

	$avr=round((($p+1)/$sum)*100);
	print ($p+1)."/".$sum."&nbsp ($avr %)";

}


?>

<? include "footer.htm"; ?>
