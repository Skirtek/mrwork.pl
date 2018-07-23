<?php 
require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
mysql_query("SET NAMES utf8");
$sql = "SELECT * FROM adv ORDER BY ID desc";
$res = mysql_query($sql);
while($row = mysql_fetch_array($res)){
  $title[] = array($row['kto'], $row['title'], $row['catOption'], $row['cat1Option'], $row['cityOption'], $row['typ'], $row['wym'], $row['jezyk'], $row['opis'], $row['data']);
}
$title = array_map(function($title) {
    return array(
        'user' => $title['0'],
        'name' => $title['1'],
		'category' => $title['2'],
		'form' => $title['3'],
		'city' => $title['4'],
		'type' => $title['5'],
		'requirements' => $title['6'],
		'language' => $title['7'],
		'work' => $title['8'],
		'date' => $title['9']
    );
}, $title);
echo json_encode($title);

?>

