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
    <div class="mt-5 d-flex align-items-center justify-content-center">
       
        <!-- <h1 class="company-name">Web Idea Solution LLP</h1> -->
        <div class="login-form-wrap form-style">
            <form method="post" action="<?= base_url('user_access/signup') ?>">
                <?php if ($this->session->flashdata('message')) { ?>
                    <div><?php echo $this->session->flashdata('message') ?></div>
                <?php } ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="phon_no" class="form-label">Phone no</label>
                    <input type="phon" name="phon" class="form-control" id="phon" placeholder="Type your phone no">
                    <?php echo form_error('phon', '<div class="error">', '</div>') ?>

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