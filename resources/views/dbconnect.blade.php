<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurelio</title>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- <?php
        if(DB::connection()->getPdo()){
            echo "Connected to database successfully! ".DB::connection()->getDatabaseName();
        } else {
            echo "Could not connect to the database.";
        }
        
    ?> -->

    <!-- LOGIN FORM -->
    <div class="container" id="login">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="header">
                <p>Login</p>
                <p>Welcome back! Login to access the Aurelio</p>
            </div>
            <div class="user-input">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Login</button>
            </div>
            <p class="form-footer">Don't have an account? <a href="#register" onclick="showRegister()">Register</a></p>
        </form>
    </div>
    
    <!-- REGISTER FORM -->
    <div class="container" id="register">
        <form class="login-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="header">
                <p>Register</p>
                <p>Create a new account to access the Aurelio</p>
            </div>
            <div class="user-input">
                <div class="username">
                    <input type="text" name="fullname" placeholder="Full Name">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <input type="email" name="email" placeholder="Email">
                <!-- <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirmation" placeholder="Confirm Password"> -->
                <button type="submit">Register</button>
            </div>
            <p class="form-footer">Already have an account? <a href="#login" onclick="showLogin()">Login</a></p>
        </form>
    </div>
</body>
</html>

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

<script>
    function showRegister() {
        document.getElementById("login").style.display = "none";
        document.getElementById("register").style.display = "flex";
    }

    function showLogin() {
        document.getElementById("register").style.display = "none";
        document.getElementById("login").style.display = "flex";
    }
</script>