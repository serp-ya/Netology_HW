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


//Создаем 2 массива с 1 и 2 словом названия животного

$first = [];
$second = [];

foreach ($Earth as $continent => $animalNames) {
	foreach ($animalNames as $animalName) {
		$animals = [];
		$str = explode(' ', $animalName);
		if (count($str)==2) {
			$animals[] = $str;
			$first[$continent][] = $str[0];
	        $second[] = $str[1];
		}
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


