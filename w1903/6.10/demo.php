<?php
//行注释
/* 块注释  */
# 行注释
echo  "<pre>";//预定义格式
$name="zhangsan";
echo $name;
print $name;
$r=print($name);
echo $r;
printf("%d,%f",12,12.5);
$arr=[1,2,3,4,5];
print_r($arr);
var_dump($arr);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><?php echo "hello,world!" ?></h1>
<?php
$boo=true;
$data=[1,2,3,4,5,6];
?>
<?php if($boo) { ?>
<h1>hello,world!</h1>
<?php }  ?>
<?php foreach ($data as $v) { ?>
<h1><?php echo $v  ?></h1>
<?php } ?>
</body>
</html>


