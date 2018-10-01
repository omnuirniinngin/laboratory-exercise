<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "Registration";
    $conn = mysqli_connect($servername, $username, $password, $database);

$fname="";
$lname="";
$email="";
$psw="";
/*
if(mysqli_connect_error()){
        die("Connection failed: " .mysqli_connect_error());
    }
    $sql = "CREATE DATABASE Registration";
    if(mysqli_query($conn, $sql)){
        echo "Datebase was successfully created";
    }else{
        echo "ERROR: Could not be able to execute $sql." .mysqli_error($conn);
    }
$conn -> close();

$sql = "CREATE TABLE tbl_members (memberId int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        date_of_birth TIMESTAMP)";
        
if (mysqli_query($conn, $sql)){
    echo "The table was successfully created!";
}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
*/
if(isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['psw']) and $_POST['username']!=''){
    //We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$_POST['fname'] = stripslashes($_POST['fname']);
		$_POST['lname'] = stripslashes($_POST['lname']);
		$_POST['email'] = stripslashes($_POST['email']);
		$_POST['psw'] = stripslashes($_POST['psw']);
	}
	//We check if the two passwords are identical
	if($_POST['password']==$_POST['passverif'])
	{
		//We check if the password has 6 or more characters
		if(strlen($_POST['password'])>=6)
		{
			//We check if the email form is valid
			if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
			{
				//We protect the variables
				$fname = mysql_real_escape_string($_POST['$fname']);
				$lname = mysql_real_escape_string($_POST['lname']);
				$email = mysql_real_escape_string($_POST['email']);
				//We check if there is no other user using the same username
				$dn = mysql_num_rows(mysql_query('select id from users where username="'.$username.'"'));
				if($dn==0)
				{
					//We count the number of users to give an ID to this one
					$dn2 = mysql_num_rows(mysql_query('select id from users'));
					$id = $dn2+1;
					//We save the informations to the databse
					if(mysql_query('insert into users(id, username, password, email, avatar, signup_date) values ('.$id.', "'.$username.'", "'.$password.'", "'.$email.'", "'.$avatar.'", "'.time().'")'))
					{
						//We dont display the form
						$form = false;
?>
<div class="message">You have successfuly been signed up. You can log in.<br />
<a href="connexion.php">Log in</a></div>
<?php
					}
					else
					{
						//Otherwise, we say that an error occured
						$form = true;
						$message = 'An error occurred while signing up.';
					}
				}
				else
				{
					//Otherwise, we say the username is not available
					$form = true;
					$message = 'The username you want to use is not available, please choose another one.';
				}
			}
			else
			{
				//Otherwise, we say the email is not valid
				$form = true;
				$message = 'The email you entered is not valid.';
			}
		}
		else
		{
			//Otherwise, we say the password is too short
			$form = true;
			$message = 'Your password must contain at least 6 characters.';
		}
	}
	else
	{
		//Otherwise, we say the passwords are not identical
		$form = true;
		$message = 'The passwords you entered are not identical.';
	}
}
?>


<!DOCTYPE html>
<html>
<head><title>Registration Form</title></head>
    <body>
    <h2>Sign Up</h2>
        <h3>It's free and anyone can join.</h3>
        <div class="modal">
            <form method="POST">
                <label for="firstname"><b>First Name:</b></label><br>
                <input type="text" placeholder="First Name" name="fname" value='<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>' required><br>
                <label for="lastname"><b>Last Name:</b></label><br>
                <input type="text" placeholder="Last Name" name="lname" required><br>
                <label for="email"><b>Email:</b></label><br>
                <input type="text" placeholder="Email" name="email" required><br>
                
                <label for="psw"><b>Password:</b></label><br>
                <input type="password" placeholder="Enter Password" name="psw" required><br>
                
                <label>I am:</label>
                <select name="Gender">
                    <option value="Male" selected="selected">Male</option>
                    <option value="Female">Female</option>
                </select><br>
                
                <label>Birthday:</label>
                <select name="month">
                    <option value="Month" selected="selected">Month</option>
                    <option value="1">January</option>
                    <option value="2">Febuary</option>
                    <option value="3">FebMarchuary</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="day">
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                    <option value='11'>11</option>
                    <option value='12'>12</option>
                    <option value='13'>13</option>
                    <option value='14'>14</option>
                    <option value='15'>15</option>
                    <option value='16'>16</option>
                    <option value='17'>17</option>
                    <option value='18'>18</option>
                    <option value='19'>19</option>
                    <option value='20'>20</option>
                    <option value='21'>21</option>
                    <option value='22'>22</option>
                    <option value='23'>23</option>
                    <option value='24'>24</option>
                    <option value='25'>25</option>
                    <option value='26'>26</option>
                    <option value='27'>27</option>
                    <option value='28'>28</option>
                    <option value='29'>29</option>
                    <option value='30'>30</option>
                    <option value='31'>31</option>
                </select>
                <select name="year">
                    <option value='1947'>1947</option>
                    <option value='1948'>1948</option>
                    <option value='1949'>1949</option>
                    <option value='1950'>1950</option>
                    <option value='1951'>1951</option>
                    <option value='1952'>1952</option>
                    <option value='1953'>1953</option>
                    <option value='1954'>1954</option>
                    <option value='1955'>1955</option>
                    <option value='1956'>1956</option>
                    <option value='1957'>1957</option>
                    <option value='1958'>1958</option>
                    <option value='1959'>1959</option>
                    <option value='1960'>1960</option>
                    <option value='1961'>1961</option>
                    <option value='1962'>1962</option>
                    <option value='1963'>1963</option>
                    <option value='1964'>1964</option>
                    <option value='1965'>1965</option>
                    <option value='1966'>1966</option>
                    <option value='1967'>1967</option>
                    <option value='1968'>1968</option>
                    <option value='1969'>1969</option>
                    <option value='1970'>1970</option>
                    <option value='1971'>1971</option>
                    <option value='1972'>1972</option>
                    <option value='1973'>1973</option>
                    <option value='1974'>1974</option>
                    <option value='1975'>1975</option>
                    <option value='1976'>1976</option>
                    <option value='1977'>1977</option>
                    <option value='1978'>1978</option>
                    <option value='1979'>1979</option>
                    <option value='1980'>1980</option>
                    <option value='1981'>1981</option>
                    <option value='1982'>1982</option>
                    <option value='1983'>1983</option>
                    <option value='1984'>1984</option>
                    <option value='1985'>1985</option>
                    <option value='1986'>1986</option>
                    <option value='1987'>1987</option>
                    <option value='1988'>1988</option>
                    <option value='1989'>1989</option>
                    <option value='1990'>1990</option>
                    <option value='1991'>1991</option>
                    <option value='1992'>1992</option>
                    <option value='1993'>1993</option>
                </select>
                
                <br><input type="submit" value="Sign up">
            </form>
        </div>
    </body>
</html>