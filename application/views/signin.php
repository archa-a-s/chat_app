<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #f3f5f4);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .login-card .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 25px;
            padding: 10px 15px;
        }

        .btn-custom {
            border-radius: 25px;
            padding: 10px;
        }

        .signup-link {
            margin-top: 15px;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="card login-card">
    <div class="card-body">

        <h3 class="text-center mb-4">Welcome Back 👋</h3>

        <form id="loginForm">

            <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button class="btn btn-success btn-block btn-custom">
                Login
            </button>

        </form>

        <div id="message" class="mt-3 text-center"></div>

        <a href="<?= base_url('auth/signup'); ?>" 
           class="signup-link text-primary">
            Don't have an account? Sign Up
        </a>

    </div>
</div>

<script>
$("#loginForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: "<?= base_url('auth/login'); ?>",
        type: "POST",
        data: $(this).serialize(),
        success: function(response){

            if(response.trim() === "success"){
                window.location.href = "<?= base_url('auth/landing'); ?>";
            } else {
                $("#message").html("<span class='text-danger'>" + response + "</span>");
            }
        }
    });
});
</script>

</body>
</html>