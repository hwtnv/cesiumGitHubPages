<?php

date_default_timezone_set('Asia/Tokyo');

$fileName = "animal";
$filePath = $fileName . ".kml";
$xml = simplexml_load_file($filePath);
$id = 1;

$bird = array(
    'https://lh3.googleusercontent.com/-XpZkHOwT7LA/VqffjeW2jlI/AAAAAAAHPGo/8Z_3W6kFM6k/s72-Ic42/bird.png',
    255,255,255,0.5
    );
$circle = array(
    'https://lh3.googleusercontent.com/-9q83Q-AWdN4/Vqfh7-tt6AI/AAAAAAAHPG8/crNqCVw-boQ/s72-Ic42/circle.png',
    255,255,255,0.2
    );
$itachi = array(
    'https://lh3.googleusercontent.com/-PWBgOhTXuOM/VqffjCy2PoI/AAAAAAAHPGo/UGKqjyUqsdc/s72-Ic42/itachi.png',
    255,255,255,0.6
    );
$kaeru = array(
    'https://lh3.googleusercontent.com/-grrd0gST7cc/VqffjBCVu4I/AAAAAAAHPGo/cijUECT3bjY/s72-Ic42/kaeru.png',
    255,255,255,0.3
    );
$neko = array(
    'https://lh3.googleusercontent.com/-oXBsJKHfFXc/VqffkPIDWiI/AAAAAAAHPGo/rMexMDDoAew/s72-Ic42/neko.png',
    255,255,255,0.6
    );
$risu = array('https://lh3.googleusercontent.com/-cEbQ82CjOvc/VqffkKxGwxI/AAAAAAAHPGo/En006FuIXYo/s72-Ic42/risu.png',
    255,255,255,0.4
    );
$saru = array(
    'https://lh3.googleusercontent.com/--qgGu2SouuI/VqffkNfjrmI/AAAAAAAHPGo/mjnD_pWveaA/s72-Ic42/saru.png',
    255,255,255,0.6
    );
$shika = array(
    'https://lh3.googleusercontent.com/-Bqs4xDPTdlQ/VqfflLcFzKI/AAAAAAAHPGo/_W8KMayP3DM/s72-Ic42/shika.png',
    255,255,255,0.8
    );
$tanuki = array(
    'https://lh3.googleusercontent.com/-T-HStXzCAMY/VqfflJd4dOI/AAAAAAAHPGo/FbzeCIoHDIE/s72-Ic42/tanuki.png',
    255,255,255,0.4
    );
$usagi = array(
    'https://lh3.googleusercontent.com/-hdtb5VH63wQ/Vqffk-Ux8UI/AAAAAAAHPGo/S7IIzk5mFE0/s72-Ic42/usagi.png',
    255,255,255,0.6
    );

$jsonArray = array();

$documentArray = array(
	"id"=>"document",
	"name"=>$fileName,
	"version"=>"1.0",
	);

array_push($jsonArray, $documentArray);

foreach ($xml->Document->Placemark as $placemark) {

/* KMLの構造参照用
<Placemark>
    <name>ハクビシン 2014.8.1</name>
    <description>12:29</description>
    <styleUrl>#itachi</styleUrl>
    <ExtendedData>
    </ExtendedData>
    <Point>
    <coordinates>138.7689903,35.4819329,0</coordinates>
    </Point>
</Placemark>
*/

$animal = ltrim($placemark->styleUrl,'#');
$billboradId = $animal . $id;

$name = (string)($placemark->name);
$nameArray = explode(' ', $name);
$date = explode('.',(string)$nameArray[1]);

$dateYear = (string)$date[0];
$dateMon = (string)(sprintf("%02d", (int)$date[1]));
$dateDay = (string)(sprintf("%02d", (int)$date[2]));

$billboardName = (string)($nameArray[0]);

$begin = $dateYear . '-' . $dateMon . '-' . $dateDay . 'T' . substr($placemark->description,0,5) . ':00+09:00';
$begin = date('c', strtotime($begin));

$end = '2015-12-31T23:59:59+09:00';
$availability = $begin . '/' . $end;

$description_balloon = '<p class="date">' . (string)$nameArray[1] . ' ' . $placemark->description . '</p>';

$point = explode(',',$placemark->Point->coordinates);

foreach ($point as &$value){
    $value = (float)$value;
}
unset($value);

$placemarkPoint = array(
    "cartographicDegrees" => array(
        $point[0],
        $point[1],
        1800
        )
    );

$polylinePoint = array(
    $point[0],
    $point[1],
    1800,
    $point[0],
    $point[1],
    0		
    );

$polylinePosition = array(
    "cartographicDegrees" => $polylinePoint,
    );

$rgbaTweet = array(
    150,219,242,218
    );

$animalArray = $$animal;

$billboardColor = array(
    "rgba" => array(
        $animalArray[1],$animalArray[2],$animalArray[3],255
        ),		
    );

$rgba = array(
    255,0,0,64
    );

$polylineColor = array(
    "rgba" => $rgba,
    );

$polylineSolidColor = array(
    "color" => $polylineColor,
    );

$polyLineMaterial = array(
    "solidColor" => $polylineSolidColor,
    );

$billboard = array(
    "horizontalOrigin" => "CENTER",
    "image" => $animalArray[0],
    "scale" => $animalArray[4],
    "color" => $billboardColor,
    "show" => "true",
    "verticalOrigin" => "BOTTOM",
    );

$label = array(
    "fillColor" => array(
        "rgba" => array(
            255, 255, 255, 255
            ),
        ),
    "pixelOffset" => array(
        "cartesian2" => array(
            0.0, 10.0
            ),
        ),
    "font" => "8pt Sans-Serif",
    "verticalOrigin" => "BOTTOM",
    "style" => "FILL",
    "text" => $billboardName,		
    );

$position = array(
    "cartographicDegrees" => $point,
    );

$polyline = array(
    "width" => 1,
    "positions" => $polylinePosition,
    "material" => $polyLineMaterial,
    "positions" => $polylinePosition,
    );

$placemarkArray = array(
    "id" => $id,
//    "availability" => $availability,
    "name" => $billboardName,
    "description" => $description_balloon,
    "billboard" => $billboard,
    "position" => $placemarkPoint,
    "label" => $label,
 //   "polyline" => $polyline,
    );

$polylineArray = array(
//    "id" => 'line' . $id,
//    "availability" => $availability,
//    "name" => $billboardName,
//    "description" => $description_balloon,
//    "billboard" => $billboard,
//    "position" => $placemarkPoint,
//    "label" => $label,
    "polyline" => $polyline,
    );

array_push($jsonArray, $placemarkArray, $polylineArray);
$id++;
}

$json = json_encode($jsonArray,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
var_dump ($json);

file_put_contents($fileName . '_2d.czml', $json);
?>