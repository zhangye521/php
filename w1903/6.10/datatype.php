<?php
//8种
//标量4种
echo "<pre>";
$num=1;
var_dump($num);//整型
$num=1.0;
var_dump($num);//浮点型
$s="hello,world{$num}"; //双引号可以引入变量，用{}分隔开
$s1='hello{$num}'; //单引号不可以引入变量
var_dump($s);
var_dump($s1);//字符串型
$b=true;
var_dump($b);//布尔型
//复合2种
$arr=[1,2,3,4,5];
var_dump($arr);//数组
class Human{}; //创建一个类
$obj=new Human();//对象
var_dump($obj);
//特殊2种
var_dump($name);//null
$imgage=imagecreatetruecolor(200,300);
var_dump($imgage); //资源resource
$int=0;
$r=is_integer($int); //判断变量是否整型
var_dump( $r);
if(is_integer($int)){
echo "该数字是整型";
}else{
    echo "该数字不是整型";
}
echo "<br>";//是的话返回1，否则不返回
$str="100";
$r=is_string($str);//判断变量是否为字符串型
var_dump($r) ;
echo "<br>";
$boo=true;
$r=is_bool($boo);//判断变量是否为布尔型
var_dump($r);
echo "<br>";
$f=0.1;
$r=is_float($f); //判断变量是否为浮点型
echo $r;
echo "<br>";
$r=is_array($arr); //判断变量是否为数组
echo $r;
echo "<br>";
$r=is_object($obj); //判断变量是否为对象
echo $r;
echo "<br>";
$is=100;
$r=is_numeric($is); //判断变量是否为数字或由数字组成的字符串
echo $r;
$wo=null;  //若变量不存在则返回 FALSE 若变量存在且其值为NULL，也返回 FALSE 若变量存在且值不为NULL，则返回 TURE 同时检查多个变量时，每个单项都符合上一条要求时才返回
$bool=isset($wo);//判断变量是否设置值设置值返回flase，否则不返回
echo "<br>";
var_dump($bool);
$n=empty($a); //判断变量是否为空
var_dump($n) ;
$r=gettype($obj);
echo "<br>";
echo $r;
//类型转换
var_dump((string)$int);
var_dump((int)$int);
var_dump((bool)$int);
var_dump((array)$int);
var_dump((object)$int);
var_dump((float)$int);
//settype
var_dump($int);
$r=settype($int,"bool");
echo $r;
var_dump($int);

