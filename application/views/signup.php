<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #f3f5f4, #4e73df);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .signup-card .card-body {
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

        .login-link {
            margin-top: 15px;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="card signup-card">
    <div class="card-body">

        <h3 class="text-center mb-4"> Create Your Chat Room Account ✨</h3>

        <form id="signupForm">

            <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>

            <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button type="submit" class="btn btn-primary btn-block btn-custom">
                Register
            </button>

        </form>

        <div id="message" class="mt-3 text-center"></div>

        <a href="<?= base_url('auth/signin'); ?>" 
           class="login-link text-primary">
            Already have an account? Login
        </a>

    </div>
</div>

<script>
$(document).ready(function(){

    $("#signupForm").on("submit", function(e){
        e.preventDefault();

        $.ajax({
            url: "<?= base_url('auth/register'); ?>",
            type: "POST",
            data: $(this).serialize(),
            success: function(response){

                response = response.trim();

                if(response === "success"){
                    $("#message").html("<span class='text-success'>Registered Successfully! 🎉</span>");
                    $("#signupForm")[0].reset();
                } else {
                    $("#message").html("<span class='text-danger'>" + response + "</span>");
                }
            },
            error: function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

});
</script>

</body>
</html>