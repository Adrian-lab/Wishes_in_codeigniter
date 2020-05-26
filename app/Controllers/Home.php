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
		$okmailAdmin = 0;
		$okpassAdmin = 0;

		$username = $_POST['uname'];
		$pass = $_POST['psw'];
		//echo view('login');
		session_start();
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
		
		if (($okmail==1) && ($okpass == 1)){

			if(strcmp($username, "admin@gmail.com") == 0){

				$sql = "SELECT Name FROM user WHERE Email = ?";
				$query = $db->query($sql, $username);

				//$query = $db->query("SELECT Nom FROM user WHERE	Email = '.$username.'");
				foreach ($query->getResult('array') as $row)
				{
					
					$nom = $row['Name'];

				}

				$_SESSION['name'] = $nom;
				$_SESSION['email'] = $username;

				echo view("/inc/header");
				echo view("admin");
			}else{

			


				//$session = session();

				$sql = "SELECT Name FROM user WHERE Email = ?";
				$query = $db->query($sql, $username);

				//$query = $db->query("SELECT Nom FROM user WHERE	Email = '.$username.'");
				foreach ($query->getResult('array') as $row)
				{
					
					$nom = $row['Name'];

				}
				
				$_SESSION['name'] = $nom;
				$_SESSION['email'] = $username;
				//$session->set('name', $nom);
				//$session->set('email', $username);


				//GET USER DATA 
				$sql = "SELECT * FROM user WHERE Email = ?";
				$query = $db->query($sql, $username);

				//validation password
				foreach ($query->getResult('array') as $row)
				{
					$age = $row['Age'];
					$surname = $row['Surname'];
				}
				
				$data['age'] = $age;
				$data['surname'] = $surname;			

				echo view('/inc/header');
				echo view('profile', $data);
			}
		}else{
			echo view('/inc/header');
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
		$uname = $_POST['uname'];
		$sname = $_POST['sname'];
		$age = $_POST['age'];
		$mail = $_POST['mail'];
		$psw = $_POST['psw'];
		$exists = 0;


		//validation
		try
		{
			$db = \Config\Database::connect();
	
		}
			catch (\Exception $e)
		{
			die($e->getMessage());
		}


		$query = $db->query("SELECT Email FROM user");

		foreach ($query->getResult('array') as $row)
		{
				
			if (strcmp($row['Email'], $mail) == 0){
				$exists = 1;
			}

		}

		if ($exists != 1){

			//SESSION

			$session = session();
			$session->set('name', $nom);
			$session->set('email', $username);
			


			//Registro
			$query = $db->query("INSERT INTO user (Name, Surname, Age, Email, Password) VALUES ('$uname', '$sname', '$age', '$mail', '$psw')");
			
			echo view('/inc/header');
			echo view('home');
		}else{
			echo view('/inc/header');
			echo view('singin');
		}

	}

	//llamar pag products
	public function products(){

		var_dump($_SESSION);
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

	//logout
	public function logout(){
		session_destroy();
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		echo view('/inc/header');
		echo view('home');
	}

	//profile
	public function profile(){

		try
		{
			$db = \Config\Database::connect();
	
		}
			catch (\Exception $e)
		{
			die($e->getMessage());
		}

	
		$sql = "SELECT * FROM user WHERE Email = ?";
		$query = $db->query($sql, $_SESSION['email']);

		if($_SESSION['email'] == "admin@gmail.com"){
			echo view('/inc/header');
			echo view('admin');
		}else{
			foreach ($query->getResult('array') as $row)
			{
				$age = $row['Age'];
				$surname = $row['Surname'];
			}
			
			$data['age'] = $age;
			$data['surname'] = $surname;
			echo view('/inc/header');
			echo view('profile', $data);
		}

	}

	public function admin(){
		echo view('/inc/header');
		echo view('admin');
	}

	public function addProduct (){
		$pname = $_POST['pname'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$link = $_POST['link'];
		$imgnumber = $_POST['imgnumber'];
		$exists = 0;

		//validation
		try
		{
			$db = \Config\Database::connect();
			
		}
			catch (\Exception $e)
		{
			die($e->getMessage());
		}

		$query = $db->query("SELECT Img FROM product");
		
		foreach ($query->getResult('array') as $row)
		{			
			if (strcmp($row['Img'], $imgnumber) == 0){
				$exists = 1;
			}

		}

		if ($exists != 1){

			//Registro
			$query = $db->query("INSERT INTO product (Name, Price, Description, Link, Img) VALUES ('$pname', '$price', '$description', '$link', '$imgnumber')");
			
			echo view('/inc/header');
			echo view('admin');
		}else{
			echo view('/inc/header');
			echo view('admin');
		}

	}

	//--------------------------------------------------------------------

}
