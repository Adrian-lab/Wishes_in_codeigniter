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
		$products_names = array();

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
				
				//Wishlist
			$sql = "SELECT Items FROM wishlist WHERE UserMail = ?";
			$query = $db->query($sql, $_SESSION['email']);

			foreach ($query->getResult('array') as $row)
			{	
				$items = $row['Items'];
			}

			$array_items = str_split($items);

			foreach ($array_items as $char) {
				//echo "CHAAAAR: ". $char;
				if($char != ','){
					//echo "CHAAAR:".$char;
					$sql = "SELECT Name FROM product WHERE Img = ?";
					$query = $db->query($sql, $char);
					//var_dump($query);
					foreach ($query->getResult('array') as $row)
					{	
						array_push($products_names, $row['Name']);
						//echo "NAME: ".$row['Name'];
					}
					//$data['name'] = $name;
				}
			}
			
			//var_dump($products_names);
			$data['products_names'] = $products_names;

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
			
			$_SESSION['name'] = $uname;
			$_SESSION['email'] = $mail;
			


			//Registro
			$query = $db->query("INSERT INTO user (Name, Surname, Age, Email, Password) VALUES ('$uname', '$sname', '$age', '$mail', '$psw')");

			//Create de wishlist
			$query = $db->query("INSERT INTO wishlist (UserMail) VALUES ('$mail')");
			
			echo view('/inc/header');
			echo view('home');
		}else{
			echo view('/inc/header');
			echo view('singin');
		}

	}

	//llamar pag products
	public function products(){

		$products = array();

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
				
			array_push($products, $row['Img']);

		}

		$data['products'] = $products;
		
		echo view('/inc/header');
		echo view('products', $data);

	}

	//llamar pag product
	public function product(){

		$product_info = array();
	
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$img_id = substr($actual_link, -1);

		try
		{
			$db = \Config\Database::connect();
	
		}
			catch (\Exception $e)
		{
			die($e->getMessage());
		}

		$sql = "SELECT * FROM product WHERE Img = ?";
		$query = $db->query($sql, $img_id);

		foreach ($query->getResult('array') as $row)
		{
			
			array_push($product_info, $row['Name'] );
			array_push($product_info, $row['Price'] );
			array_push($product_info, $row['Description'] );
			array_push($product_info, $row['Link'] );

			/*$data['product_name'] = $row['Name'];
			$data['product_price'] = $row['Price'];
			$data['product_description'] = $row['Description'];*/
	
		}
		$img_url = "../../public/assets/img/".$img_id.".jpg";
		array_push($product_info,$img_url );
		$data['product_info'] = $product_info;

		echo view('/inc/header');
		echo view('product', $data);
		//$something = $_POST['wish'];
		//echo ($something);

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
		$products_names = array();
		$items;
		$img_id;

		try
		{
			$db = \Config\Database::connect();
	
		}
			catch (\Exception $e)
		{
			die($e->getMessage());
		}

		//Data Username
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

			//Wishlist
			$sql = "SELECT Items FROM wishlist WHERE UserMail = ?";
			$query = $db->query($sql, $_SESSION['email']);

			foreach ($query->getResult('array') as $row)
			{	
				$items = $row['Items'];
			}

			$array_items = str_split($items);

			foreach ($array_items as $char) {
				//echo "CHAAAAR: ". $char;
				if($char != ','){
					//echo "CHAAAR:".$char;
					$sql = "SELECT Name FROM product WHERE Img = ?";
					$query = $db->query($sql, $char);
					//var_dump($query);
					foreach ($query->getResult('array') as $row)
					{	
						array_push($products_names, $row['Name']);
						//echo "NAME: ".$row['Name'];
					}
					//$data['name'] = $name;
				}
			}
			
			//var_dump($products_names);
			$data['products_names'] = $products_names;
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

	//Function add product
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
			echo view('home');
		}

	}

	//Function remove Product
	public function removeProduct(){
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

			$data['info'] = "noexist";
			echo view('/inc/header');
			echo view('admin', $data);

		}else{
			//Registro
			$query = $db->query("DELETE FROM product WHERE Img = $imgnumber");
			

			$data['info'] = "ok";
			echo view('/inc/header');
			echo view('admin', $data);
		}
		
	}

	//Delete user
	public function removeUser(){
		$mail = $_POST['mail'];
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

			if (empty($mail)){
				$data['info'] = "noexist";	
			}
			$data['info'] = "nodata";
			echo view('/inc/header');
			echo view('admin', $data);
			

		}else{
			//Registro
			
			$sql = "DELETE FROM user WHERE Email = ?";
			$query = $db->query($sql, $mail);
			//$query = $db->query("DELETE FROM user WHERE Email = $mail");
			
			$data['info'] = "ok";

			echo view('/inc/header');
			echo view('admin', $data);
		}
	}

	public function wish(){

		$items;

		$products = array();
	
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$img_id = substr($actual_link, -1);

		$exists = 0;

		try
		{
			$db = \Config\Database::connect();
	
		}
			catch (\Exception $e)
		{
			die($e->getMessage());
		}

		$sql = "SELECT Items FROM wishlist WHERE UserMail = ?"; 

		//echo "USER -------->:".$_SESSION['email'];
		$query = $db->query($sql, $_SESSION['email']);

		foreach ($query->getResult('array') as $row)
		{	
			
			$items = $row['Items'];
		}

		$array_items = str_split($items);

		foreach ($array_items as $char) {
			echo "CHAAAAR: ". $char;
			if ($char == $img_id){
				$exists = 1;
			}
		}

		if ($exists == 1){

			$products = array();

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
					
				array_push($products, $row['Img']);

			}

			$data['products'] = $products;
			$data['info'] = "exists";
			echo view('/inc/header');
			echo view('products', $data);

		}else{
			$items = $items.",".$img_id;

			$products = array();

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
					
				array_push($products, $row['Img']);

			}

			echo "Items:". $items;
			$sql = ("UPDATE wishlist SET Items='$items' WHERE UserMail=?"); 
			//echo "USER -------->:".$_SESSION['email'];
			$query = $db->query($sql, $_SESSION['email']);

			$data['products'] = $products;
			$data['info'] = "ok";
			echo view('/inc/header');
			echo view('products', $data);
		}

		//$product_id = 



		//$items = $items.",". $img_id;

		//echo $items;

		

		
		

		

		
	}

	//--------------------------------------------------------------------

}
