<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #d6d8d7);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard-card {
            width: 400px;
            border-radius: 15px;
            padding: 30px;
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        .dashboard-card h3 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .btn-custom {
            width: 100%;
            border-radius: 25px;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="dashboard-card">
    <h3>Welcome, <?php echo $this->session->userdata('user_name'); ?> 👋</h3>

    <p class="text-muted">You are successfully logged in.</p>

    <a href="<?php echo base_url('chat'); ?>"
       class="btn btn-primary btn-custom">
         Go to Chat Page
    </a>
</div>

</body>
</html>