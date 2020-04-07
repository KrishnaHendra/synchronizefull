
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Synchronize Management</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="<?= base_url('assets/'); ?>css/style_admin.css" rel="stylesheet">
    <style>
    body{
        background: url('https://www.rebirth-festival.nl/app/uploads/2019/06/20190413_Rebirth__MNO-Photo_0102_-1920x1080.jpg');
        background-size: cover;
    }
    </style>
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 text-center">
                                
                                <a class="text-center" href="index.html"> <img class="mb-2" src="<?= base_url('assets/images/synchronize.jpg') ?>" alt="images" width="150px"></a>
                                <?= $this->session->flashdata('notif'); ?>
                                <form class="mt-3 mb-2 login-input" action="<?= base_url('log/login'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                        <?= form_error('email','<h6 class="label label-danger text-left">','</h6>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <?= form_error('password','<h6 class="label label-danger text-left">','</h6>') ?>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" style="background-color: #ce5bc0;">Sign In</button>
                                <b><a href="<?= base_url('log/login/registration') ?>" class="badge badge-secondary mt-4">Don't have an account? Register here!</a></b>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url('assets/'); ?>plugins/common/common.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/settings.js"></script>
    <script src="<?= base_url('assets/'); ?>js/gleek.js"></script>
    <script src="<?= base_url('assets/'); ?>js/styleSwitcher.js"></script>
</body>
</html>





