<?php namespace App\Controllers;

class Home extends BaseController
{
	//pag home
	public function index()
	{

		echo view('/inc/header');
		echo view('home');

	}

	//pag login
	public function login()
	{
		echo view('/inc/header');
		echo view('login');
	}

	//datos usuario
	public function user(){
		$okmail = 0;
		$okpass = 0;
		$username = $_POST['uname'];
		$pass = $_POST['psw'];
		//echo view('login');

		//validation
		// BD connection
		try
		{
			$db = \Config\Database::connect();

		}
			catch (\Exception $e)
		{
    		die($e->getMessage());
		}

		//Take information form table
		try
		{
			$query = $db->query('SELECT Email FROM user');
		}
			catch (\Exception $e)
		{
    		die($e->getMessage());
		}

		//Validation mail
		foreach ($query->getResult('array') as $row)
		{
			if (strcmp($row['Email'],$username)==0){
				$okmail =1;
			}
			//echo ($row['Email']);
		}

		$query = $db->query('SELECT Password FROM user');

		//validation password
		foreach ($query->getResult('array') as $row)
		{
			if (strcmp($row['Password'], $pass)==0){
				$okpass =1;
			}
			//echo ($row['Contraseña']);

		}

		
		//start session
		if (($okmail==1) && ($okpass == 1)){

			$session = session();
			$sql = "SELECT Name FROM user WHERE Email = ?";
			$query = $db->query($sql, $username);

			//$query = $db->query("SELECT Nom FROM user WHERE	Email = '.$username.'");
			foreach ($query->getResult('array') as $row)
			{
				
				$nom = $row['Name'];

			}

			//$_SESSION['name'] = $nom;
			$session->set('name', $nom);
			$session->set('email', $username);

			echo view('/inc/header');
			echo view('products');
		}else{
			//echo view('/inc/header');
			echo view('login');
		}

	}

	//nuevo usuario
	public function signin(){
		echo view('/inc/header');
		echo view('singin');

	}

	//pasar datos
	public function newuser(){
		echo view('/inc/header');
		$uname = $_POST['uname'];
		$sname = $_POST['sname'];
		$age = $_POST['age'];
		$mail = $_POST['mail'];
		$psw = $_POST['psw'];
		echo view('singin');

		$unameOk = 0;
		$snameOk = 0;
		$ageOk = 0;
		$mailOk = 0;
		$pswOk = 0;

		echo ($uname);
		echo ($sname);
		echo ($age);
		echo ($mail);
		echo ($psw);

		if($uname!=NULL){
			$unameOk = 1;
		}
		if($sname!=NULL){
			$snameOk = 1;
		}
		if($age!=NULL){
			$ageOk = 1;
		}
		if($mail!=NULL){
			$mailOk = 1;
		}
		if($psw!=NULL){
			$pswOk = 1;
		}


		//validation
		try
		{
			$db = \Config\Database::connect();
		
		}
			catch (\Exception $e)
		{
			die($e->getMessage());
		}
		/*
		try
		{
			if($unameOk == 1 && $snameOk == 1 && $ageOk == 1 && $mailOk == 1 && $pswOk == 1){
				$query = $db->query('INSERT Name FROM user');
				$query = $db->query('INSERT Surname FROM user');
				$query = $db->query('INSERT Age FROM user');
				$query = $db->query('INSERT Email FROM user');
				$query = $db->query('INSERT Password FROM user');

				echo view('/inc/header');
				echo view('home');
			}
		}
			catch (\Exception $e)
		{
			die($e->getMessage());
		}*/
		
	}

	//llamar pag products
	public function products(){
		echo view('/inc/header');
		echo view('products');

	}

	//llamar pag product
	public function product(){
		echo view('/inc/header');
		echo view('product');
		$something = $_POST['wish'];
		echo ($something);

	}

	//datos deseo
	public function wish(){
		echo view('/inc/header');
		$something = $_POST['wish'];
		echo view('singin');



		echo ($something);

	}

	//--------------------------------------------------------------------

}
