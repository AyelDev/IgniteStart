<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Caesar+Dressing&display=swap');
    body{
        margin: 0;
        padding: 0;
        font-family: "Caesar Dressing", system-ui;
    }

    .container{
        width: 100%;
        display:flex;
        justify-content: center;
        align-items: center;
    }

    .login-form{
        padding: 20px;
        width: 20%;
    }


.form-group{
    background: white;
}


input {
  display: block;
  width: 100%;
  line-height: 40px;
  margin-bottom: 20px;
}
label {
  line-height: 40px;
}
header {
  display: flex;
  justify-content: center;
}
.submit-btn {
background: #B9D4AA;
  font-size: 17px;
  border-style: none;
  width: 40%;
  border-radius: 15px;
  margin: auto;
  text-transform: uppercase;
}
</style>
<body>

    <header>
        <h1>Ignite Start</h1>
    </header>
    <div class="container">

    <div class="login-form">
        <form action="">
            <div class="form-group">
            <label for="">Username</label>
            <input type="text">
            <label for="">Password</label>
            <input type="password">
            <input type="submit" value="login" class="submit-btn">
            </div>
        </form>
    </div>
    </div>

</body>
</html>