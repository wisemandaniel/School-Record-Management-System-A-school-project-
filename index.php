<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
<title>
Model :: Students Records Management System
</title>
<style>
    *{
        margin: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: #112d80;
    }
    nav{
        display: flex;
        height: 12vh;
        background-color: #112d80;
        justify-content: space-between;
    }
    .logo{
        display: flex;
        color: white;
        margin: 0 20px;
        font-size: x-large;
        align-items: center;
        float: left;
    }
    .admin-divs{
        display: flex;
        float: right;
        flex-direction: row;
        align-items: center;
    }
    .admin-div{
        display: flex;
        flex-direction: row;
        align-items: center;
        margin: 0 10px;
    }
    .admin-div > img, p, a{
        margin: 0 10px 0 0;
        color: white;
        text-decoration: none;
    }
    .container{
        display: grid;
        box-shadow: 4px 6px 20px grey;
        place-items: center;
        width: min-content; 
        padding: 40px 80px 20px 80px;
        text-align: center;
        border-radius: 5px;
    }
    .big-container{
        display: grid;
        place-items: center;
        height: 78vh;
        margin-top: 40px;
    }
    .container>h2{
        margin: 20px 0;
        color: #112d80;
    }
    input{
        padding: 10px;
        margin: 10px 10px;
        border: 0.1px solid #112d80;
        border-radius: 3px;
        width: 230px;
    }
    input:focus{
        border: solid 1px #112d80;
        border-radius: 5px;
        outline: none;
    }
    button{
        border: none;
        background-color: #112d80;
        border-radius: 3px;
        padding: 15px 40px;
        color: white;
        width: 230px;
        margin: 20px 0;
    }
    p{
        margin: 10px 0;
        font-size: 14px;
    }

</style>
</head>

<body>
<nav>
        <div class="logo">
            <span id="menu-open" onclick="openNav()">&#9776;</span>
            <span style="display: none;" id="menu-close" onclick="closeNav()">&times;</span>
            DAC-J</div>
        <div class="admin-divs">
             <b>
			     <div class="admin-div">
                    <p>Admin</p>
                 </div>
			 </b>
        </div>
    </nav>

<div class="big-container">
    <div class="container">
    <?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
        <h2>Admin Login</h2>
        <form action="login.php" method="post">
		<input style="height:40px;" id="username" type="text" name="username" Placeholder="Username" required/><br>
	    <input type="password" style="height:40px;" name="password" Placeholder="Password" required/><br>
		<button  style="cursor: pointer;"  type="submit">Login</button>
		</form>
	</div>
</div>
<script>
a = document.getElementById("username");
function err(){
    if(a.innerText != "admin"){
        alert("Username or password incorrect");
    }
    
}
</script>
</body>
</html>