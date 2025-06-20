<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
    $system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Language" content="fr">
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />
    <title><?php echo ('Reset Password'); ?> | <?php echo $system_title; ?></title>
    <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/neon-core.css">
    <link rel="stylesheet" href="assets/css/neon-theme.css">
    <link rel="stylesheet" href="assets/css/neon-forms.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <link rel="shortcut icon" href="assets/images/favicon.png">
</head>

<body class="page-body login-page login-form-fall" data-url="http://neon.dev">
    <!-- This is needed when you send requests via Ajax -->
    <script type="text/javascript">
        var baseurl = '<?php echo base_url(); ?>';
    </script>
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content" style="width:100%; height: fit-content;">
                <A href="<?php echo base_url(); ?>" class="logo">
                    <img src="uploads/logo.png" height="120" alt="" />
                </A>
                <p class="description">
                <h1 style="color:#ffa800; font-family: system-ui;">
                    <?php echo $system_name; ?>
                </h1>
                <h5 style="color:#00b376; font-family: monospace; margin-bottom: 24px;">
                    Developed by Binary Brains
                </h5>
                </p>
                <p class="description">Enter Your Email for Resetting Password.</p>
            </div>
        </div>
        <div class="login-form" style="background-color: #001811;">
            <div class="login-content">
                <div class="form-login-error">
                    <h3>Invalid Email</h3>
                    <p>Please Enter Correct Email!</p>
                </div>
                <form method="post" role="form" id="form_forgot_password">
                    <div class="form-forgotpassword-success">
                        <i class="entypo-check"></i>
                        <h3>Reset Email has been Sent.</h3>
                        <p>Please Check your Email Inbox, Password Reset Instruction is Sent!</p>
                    </div>
                    <div class="form-steps">
                        <div class="step current" id="step-1">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-mail"></i>
                                    </div>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Email" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block btn-login">
                                    <?php echo ('Reset Password'); ?>
                                    <i class="entypo-right-open-mini"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="login-bottom-links">
                    <a href="<?php echo base_url(); ?>login" class="link">
                        <i class="entypo-lock"></i>
                        <?php echo ('Return to Login Page'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Scripts -->
    <script src="assets/js/gsap/main-gsap.js"></script>
    <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/joinable.js"></script>
    <script src="assets/js/resizeable.js"></script>
    <script src="assets/js/neon-api.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/neon-login.js"></script>
    <script src="assets/js/neon-custom.js"></script>
    <script src="assets/js/neon-demo.js"></script>
</body>

</html>
