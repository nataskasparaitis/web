
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    
    <div class="wholepage">
        <div class="container">
            <div class="login">
                <p class="log-in-text">Log in</p>
            </div>

            @foreach($errors->all() as $error)
                <p  class="error">{{ $error }}</p>
            @endforeach

            <form id="form" action="/login" method="POST">
              @csrf
                <div class="emaildiv">
                    <p class="text">Email:</p>
                    <input  type="email" name="email" id="email" placeholder="example@gmail.com">
                </div>
                <div class="passworddiv">
                    <p class="text">Password:</p>
                    <input  type="password" name="password" id="password" placeholder="********">
                </div>
                <div class="buttondiv">
                    <button type="submit" name="login">Log in</button>
                </div>
            </form>

            <div class="signupdiv">
                <p class="signup-text">Don't have an account? <a class="link-color" href="/signup">Sign up</a></p>
            </div>
        </div>
    </div>

</body>
</html>
