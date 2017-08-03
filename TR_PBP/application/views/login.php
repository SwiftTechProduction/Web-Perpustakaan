<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      body {
  background: #333;
}

.login-form {
  width: 300px;
  margin: 40px auto;
}

.login-form .field {
  background: linear-gradient(#fa7f2d, #ff6600, #fa7f2d);
  padding: 5px;
  box-shadow: inset 0 1px #fab587, 0 3px 3px #222;
  border-radius: 3px;
  margin-bottom: 9px;
}

.login-form .field input {
  border: 1px solid #96450f;
  display: block;
  width: 277px;
  padding: 5px;
  font-size: 19px;
  font-family: Helvetica Neue;
  font-weight: 600;
  box-shadow: 0 1px #fcb483, inset 0 3px 5px #aaa;
  border-radius: 3px;
  color: #666564;
}

.login-form .field input:focus {
  outline: none;
  color: #333;
}

.login-form .field.with-btn {
  width: 200px;
  float: left;
}

.login-form .field.with-btn input {
  width: 188px;
}

.login-form button {
  border: none;
  display: block;
  width: 81px;
  height: 46px;
  margin-left: 9px;
  float: left;
  border-radius: 3px;
  background: linear-gradient(#70787e, #4b545b);
  text-transform: uppercase;
  font-family: Helvetica, Neue;
  font-size: 13px;
  font-weight: bold;
  cursor: pointer;
  color: #11161a;
  text-shadow: 0 1px 0 #727980;
  box-shadow: 0 3px 3px #222, inset 0 1px 0 #a8a8a8;
}

.login-form button:hover {
  background: linear-gradient(#70787e, #545a5e);
}

.login-form button:active {
  background: linear-gradient(#545c61, #545a5e);
}

.message {
  clear: both;
  font-family: Helvetica Neue;
  color: #bbb;
  font-size: 13px;
  text-align: center;
  margin-top: 80px;
}

.message a {
  color: #bbb;
  text-decoration: none;
  border-bottom: 1px dotted #bbb;
}

.message a:hover {
  color: #ddd;
  border-bottom-color: #ddd;
}
    </style>


</head>

<body>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<font color="F19B22"><h1 align="center">PERPUSTAKAAN</h1></font>
   <form class="login-form" action="<?php echo site_url('LoginController/ceklogin') ?>" method="POST">
  <div class="login-form">
  
  <div class="field">
    <input type="text" name="txt_username" value="" placeholder="username">
  </div>
  
  <div class="field with-btn">
    <input type="password" name="txt_password" value="" placeholder="password">
  </div>
  
  <button>Login</button>
</div>
</form>
  
</body>
</html>
