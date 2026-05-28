

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    
    <div class="wholepage">
        <div class="container">
            <div class="signup">
                <p class="sign-up-text">Sign Up</p>
            </div>

           <div class="error-box">
            @foreach($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
            </div>
            
            <form id="form" action="/signup" method="POST">
                @csrf
                <div class="emaildiv">
                    <p class="text">Email:</p>
                    <input type="text" id="email" name="email">
                   
                </div>
                <div class="passworddiv">
                    <p class="text">Password:</p>
                    <input type="password" id="password" name="password" >
                </div>
                 <div class="userdiv">
                    <p class="text">Username:</p>
                    <input type="username" id="username" name="username">
                </div>
                <div class="buttondiv">
                    <button type="submit" class="button" name="register">Sign Up</button>
                </div>
            </form>

            <div class="logindiv">
                <p class="login-text">Already have an account? <a class="link-color" href="/login">Login</a></p>
            </div>
                

        </div>
    </div>
</body>
</html>


