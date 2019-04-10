<?php
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO HAIRDRESSINGSALONS (name, address, telephone, email, workingHours, manicure, pedicure, makeup, description, img)
    	VALUES ('Стилисиммо София', 'гр. София, жк. Младост 2, ул. Свети Киприян, бл. 256-В, вх.1 ', ' + 359 88 298 84 44', 'stilisimmo@abv.bg', 'Работно време: Понеделник - Събота от 10.00ч. до 20.00ч. Неделя от 10.00ч. до 20.00ч.', 'да','да','не', 'Стилисиммо са модерно и уютно обурудвани фризьорски салони, където ще Ви предложим фризьорски и козметични услуги, грим, маникюр, педикюр, Shellac - Шилак. Салоните Стилисиммо работят с продукти на Matrix, Alfaparf, Jalid, Kyana, маникюр на OPI, ORLY, CND, SNB и козметика на Alcina, Dermharmonie, Querte.Стремим се винаги да сме в крак с най-новите технологии и излезнали нововъведения с цел предоставяне на една по-добра и на достъпна цена на услугата.', 'img/stilissimo.png')";
    	$conn->exec($sql);
    	$sql = "INSERT INTO HAIRDRESSINGSALONS (name, address, telephone, email, workingHours, manicure, pedicure, makeup, description, img)
    	VALUES ('Murphy', 'ул. Граф Игнатиев 3, ет. 1 София', '+359 (0) 887 427 192, +359 (2) 981 27 48', 'grafa@murphystyle.com', 'Работно време: Понеделник - Петък от 9.00ч. до 20.00ч. Събота от 9.00ч. до 18.00ч. Неделя - Почивен ден','да','да','да', 'Търсиш повече от фризьори, които да разбират косата ти и място, на което да се погрижат за твоя маникюр, педикюр, лице или тяло? Място, което ти даде повече от стил? Салони за Красота MURPHY ще ти помогнат да изглеждаш страхотно всеки ден, през всеки сезон и за всякакъв повод.', 'img/murphy.png')";
    	$conn->exec($sql);
		$sql = "INSERT INTO HAIRDRESSINGSALONS (name, address, telephone, email, workingHours, manicure, pedicure, makeup, description, img)
    	VALUES ('A&D beauty studio', 'гр. Пловдив, ул. Свети Свети Кирил и Методий 15', '032 634 962', 'aidstudio@abv.bg', 'Работно време: понеделник - петък 10:00 - 19:30 часа; Събота 10:00 - 17:00 часа','не','не','не', 'Стилът предхожда личността!', 'img/ad.jpg')";
    	$conn->exec($sql);
    } catch(PRDOException $e)
    {
    	die("Connection error:".$e->getMessage());
    }
?>