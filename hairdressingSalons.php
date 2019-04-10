
<?php
	session_start();
	if(!isset($_GET['submitSearch']))
	{

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/hairdressingSalons.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title></title>
</head>
<body id="body">
	<div id="menu" class="menu">
		<img class="logoImage" src="img/logoImage.gif">
		
		<?php
		if (!empty($_SESSION['loggedIn'])){

			echo '<button class="button buttonLogout buttonColor" onclick="window.location.href='."'logout.php'".'"> Изход </button>';
			echo '<button class="button buttonProfile buttonColor" onclick="location.href='."'viewProfile.php'".'"> Здравей,'.$_SESSION['username'].'! </button>';

		} else{

			echo '<button class="button buttonReg buttonColor" onclick="window.location.href='."'registration.php'".'"> Регистрация </button>';
			echo '<button class="button buttonLogin buttonColor"onclick="window.location.href='."'login.php'".'"> Вход </button>';
			
		}
		

		?>

		<nav>
			<ul>
				<li><a class="navButtons navColor" href="homePage.php"> Начало </a></li>
				<li><a class="navButtons navColor" href="atelierPage.php">Ателиета</a></li>
				<li><a class="navButtons navColor" href="restaurants.php"> Ресторанти </a></li>
				<li><a class="navButtons navColor" href="hairdressingSalons.php">Фризьорски салони</a></li>
				<li><a class="navButtons navColor" href="guestList.php"> Планировчик </a></li>				
			</ul>
		</nav>
	</div>
	<div>
		<h2 id="hairdressingSalonsTitle">Фризьорски салони</h2> 
		<form class="hairdressingSalonsSearch" id="hairdressingSalonsSearchForm" method="get" action="">
			<input type="text" name="hairdressingSalonsSearchBar" class="hairdressingSalonsSearch" placeholder="Търси..." id="searchRestaurant">
			<button name="submitSearch" class="searchButton" type="submit"> <i class="fa fa-search"></i> </button>
		</form>
	</div>
	<div id = "hairdressingSalonsDiv"></div>
	<script type="text/javascript" src="js/displayHairdressingSalons.js"></script>

</body>
</html>
<?php
} else
{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/hairdressingSalons.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title></title>
</head>
<body id="body">
	<div id="menu" class="menu" >
		<img class="logoImage" src="img/logoImage.gif">
		
		<?php
		if (!empty($_SESSION['loggedIn'])){

			echo '<button class="button buttonLogout buttonColor" onclick="window.location.href='."'logout.php'".'"> Изход </button>';
			echo '<button class="button buttonProfile buttonColor" onclick="location.href="> Здравей,'.$_SESSION['username'].'! </button>';

		} else{

			echo '<button class="button buttonReg buttonColor" onclick="window.location.href='."'registration.php'".'"> Регистрация </button>';
			echo '<button class="button buttonLogin buttonColor"onclick="window.location.href='."'login.php'".'"> Вход </button>';
			
		}
		

		?>

		<nav>
			<ul>
				<li><a class="navButtons navColor" href="homePage.php"> Начало </a></li>
				<li><a class="navButtons navColor" href="atelierPage.php">Ателиета</a></li>
				<li><a class="navButtons navColor" href="restaurants.php"> Ресторанти </a></li>
				<li><a class="navButtons navColor" href="hairdressingSalons.php">Фризьорски салони</a></li>
				<li><a class="navButtons navColor" href="guestList.php"> Планировчик </a></li>				
			</ul>
		</nav>
	</div>
	<div>
		<h2 id="hairdressingSalonsTitle">Фризьорски салони</h2>
		<form class="hairdressingSalonsSearch" id="hairdressingSalonsSearchForm" method="get" action="">
			<input type="text" name="hairdressingSalonsSearchBar" class="hairdressingSalonsSearch" placeholder="Търси..." id="searchRestaurant">
			<button name="submitSearch" class="searchButton" type="submit"> <i class="fa fa-search"></i> </button>
		</form>
	</div>
	<?php
		$_SESSION['searchedItem'] = $_GET['hairdressingSalonsSearchBar'];
	?>
	<div id = "hairdressingSalonsDiv"></div>
	<script type="text/javascript" src="js/searchHairdressingSalonByName.js"></script>

</body>
</html>
<?php
}
?>
