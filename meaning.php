<?

$meaning = $_GET['meaning'];

if($meaning<11) { $lesson = 'lesson 1'; }
elseif($meaning<21) { $lesson = 'lesson 2'; }
elseif($meaning<31) { $lesson = 'lesson 3'; }
elseif($meaning<41) { $lesson = 'lesson 4'; }
elseif($meaning<50) { $lesson = 'lesson 5'; }
elseif($meaning<62) { $lesson = 'lesson 6'; }
elseif($meaning<72) { $lesson = 'lesson 7'; }
elseif($meaning<86) { $lesson = 'lesson 8'; }
elseif($meaning<95) { $lesson = 'lesson 9'; }
elseif($meaning<104) { $lesson = 'lesson 10'; }
elseif($meaning<114) { $lesson = 'lesson 11'; }
elseif($meaning<120) { $lesson = 'lesson 12'; }


$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");
for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
	if(strpos($_SERVER['HTTP_USER_AGENT'], $arr_browser[$indexi]) == true) {
	$j++;
	}
}

if(!$j) { $sizew = "width = 500"; $sizeh = "height = 600"; }

print "<br><br><br><center><font size=5>index num : $meaning ($lesson)<br>";
print "<font size=3 color=blue>Click the image to return to previous page.<br>";
print "<a href='javascript:history.back()'><img src=img/".$meaning."-.jpg $sizew $sizeh></a>";



?>
