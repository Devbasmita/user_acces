<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style2.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css') ?>">
</head>

<body>
    <div class="employee-login-main d-flex align-items-center justify-content-center">
        
        <div class="login-form-wrap form-style">
            <form method="post" action="<?= base_url('user_access/admin_view_work') ?>">
                <?php if ($this->session->flashdata('message')) { ?>
                    <div><?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
                <div class="mb-3">
                    <label for="phon" class="form-label">User Phone no</label>
                    <input type="text" name="phon" class="form-control" id="phon" placeholder="Enter phone number">
                    <!-- <div class="form-text text-danger">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>