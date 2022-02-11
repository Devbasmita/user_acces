<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style2.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css') ?>">
</head>

<body>
    <div class="work-time-main d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="bg-work-time">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">User Details</button>
                    </li>
                  
                </ul>
                <div class="tab-content py-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="form-style">
                            <form action="<?= base_url('user_access/view_userdata') ?>" method = "POST">
                                <div class="mb-3">
                                    <label for="start_date"  class="form-label">Start Date</label>
                                    <input type="date" name = "start_date" class="form-control" id="start_date" >
                                    <!-- <div class="form-text text-danger">We'll never share your email with anyone else.</div> -->
                                </div>
                                <div class="mb-3">
                                    <label for="end_date"  class="form-label">End Date</label>
                                    <input type="date" name = "end_date" class="form-control" id="end_date" >
                                </div>
                                <div>
                                    <button type = "submit" class="btn btn-secondary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table caption-top ">
                            <thead>
                                <tr>

                                    <th scope="centre">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Sign up date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($users_list != NULL) { ?>
                                    <?php foreach ($users_list as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->phon ?></td>
                                            <td><?= $value->created_at ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="6">No Records</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?> "></script>

</body>

</html>