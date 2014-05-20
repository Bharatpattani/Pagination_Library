Pagination_Library
==================

Pagination Library for PHP

USAGE
==================
<?php

//import library

require_once('pagination.php');


//data for pagination

$data_student=Array();

$data_student[0]=Array('id'=>1,'name'=>'Amit');
$data_student[1]=Array('id'=>2,'name'=>'Suresh');
$data_student[2]=Array('id'=>3,'name'=>'Ramesh');
$data_student[3]=Array('id'=>4,'name'=>'Shayam');
$data_student[4]=Array('id'=>5,'name'=>'Raj');
$data_student[5]=Array('id'=>6,'name'=>'Rajesh');


//create instance of pagination passing adapter type

$pagination_obj = new Pagination('array');

//set max records per page

$pagination_obj->setMaxPerPage(2);

//set data in pagination 

$pagination_obj->setPages($data_student);

//moving pages forward using while

while($pagination_obj->hasNextPage())
{

	echo "<br/>-----------------------------------------------------------------------</br>";

	$tmp_students=$pagination_obj->getNextPage();
	echo "Page No:".$pagination_obj->tell();
	echo "<br/>";

	foreach($tmp_students as $tmp_student)
	{
		foreach ($tmp_student as $key => $value) {
		echo $key." :".$value." ";

		}
		echo "<br/>";
	}
}
?>
