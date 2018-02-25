<?php  
$Earth = [
	'Africa'=>[
		'Mammuthus columbi', 
		'Naja laurenti',
		'Hyaenidae gray',
		'Troglodytes gorilla',
		'Struthio camelus',
		'Crocodilia',
		'Elephantidae',
		'Rhinocerotidae',
		'Hippotigris',
		'Antilopinae'
	],
	
	'North America'=>[
		'Tyrannosaurus',
		'Nasua narica',
		'Lynx rufus',
		'Antilocapra americana',
		'Pecari tajacu',
		'Lepus californicus',
		'Bison',
		'Ovis nivicola',
		'Castor canadensis',
		'Ovibos moschatus',
	]
];


//Массив из животных содержащих 2 слова в имени

$two_words_name = [];

foreach ($Earth as $continent => $animalNames) {
	foreach ($animalNames as $animalName) {
		$animals = [];
		$str = explode(' ', $animalName);
		$animals[] = $str;
		if (count($str)==2) {
			$glue = implode(',', $str);
			$replace = str_replace(',', ' ', $glue);
			$two_words_name[$continent][] = $replace;

		}
    }
}
        

// Разбиваем массив с 2-мя словами на 2 массива

$first = [];
$second = [];

foreach ($two_words_name as $continent =>$animalNames){
    foreach ($animalNames as $animalName) {
	    $parts = explode(' ', $animalName);
	    $first[$continent][] = $parts[0];
	    $second[] = $parts[1];
    }
}


shuffle($second);


// Создаем новый массив и мешаем 1 и 2 слово

$mixedAnimals = [];
$i = 0;
foreach ($first as $continent => $animalNames) {
	foreach ($animalNames as $animalName) {
		$mixedAnimals[$continent][] = $animalName . ' ' . $second[$i++];
	}
}
 

// Вывод форматированного массива

foreach ($mixedAnimals as $continent => $animalNames) {
	echo "<h2>$continent</h2>";
	echo (implode(", ", $animalNames)) . ".";
}


/*
echo "<pre>";
print_r($Earth);
echo "</pre>";

echo "<pre>";
print_r($two_words_name);
echo "</pre>";

echo "<pre>";
print_r($first);
print_r($second);
echo "</pre>";

echo "<pre>";
print_r($first);
print_r($second);
echo "</pre>";

echo "<pre>";
print_r($mixedAnimals);
echo "</pre>";
*/