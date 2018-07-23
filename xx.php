<?php 
require_once 'b48f672b04939cc32ecfe1ae29bc1d01.php';
require_once 'array2xml.php';
mysql_query("SET NAMES utf8");
$sql = "SELECT * FROM adv ORDER BY ID desc";
$res = mysql_query($sql);
while($row = mysql_fetch_array($res)){
  $title[] = array($row['kto'], $row['title'], $row['catOption'], $row['cat1Option'], $row['cityOption'], $row['typ'], $row['wym'], $row['jezyk'], $row['opis'], $row['data']);
}
$title = array_map(function($title) {
    return array(
        'kto' => $title['0'],
        'title' => $title['1'],
		'kategoria' => $title['2'],
		'forma' => $title['3'],
		'miasto' => $title['4'],
		'typ' => $title['5'],
		'wymagania' => $title['6'],
		'jezyk' => $title['7'],
		'opis' => $title['8'],
		'data' => $title['9']
    );
}, $title);
	function array2XML($obj, $array)
{
    foreach ($array as $key => $value)
    {
        if(is_numeric($key))
            $key = 'item' . $key;

        if (is_array($value))
        {
            $node = $obj->addChild($key);
            array2XML($node, $value);
        }
        else
        {
            $obj->addChild($key, htmlspecialchars($value));
        }
    }
}

// create new instance of simplexml
$xml = new SimpleXMLElement('<adv/>');

// function callback
array2XML($xml, $title);
header("Content-type: text/xml");
// save as xml file
echo $xml->asXML();
?>

