<!DOCTYPE html>
<html lang="en">
<head>
    <title>BXEadLogin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1');?>">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?=base_url('images/icons/favicon.ico');?>"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/fonts/iconic/css/material-design-iconic-font.min.css');?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/animate/animate.css');?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/animsition/css/animsition.min.css');?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/daterangepicker/daterangepicker.css');?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/util.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/main.css');?>">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 pt-5 p-b-20">
                <form action="<?=base_url('login/login');?>" method="POST" class="login100-form validate-form">
                    <span class="login100-form-title pb-5">
                        BXEad
                    </span>
                    

                    <div class="wrap-input100 validate-input mt-1 mb-3" data-validate = "Enter Email">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input mb-3" data-validate="Enter password">
                        <input class="input100" type="password" name="senha">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <ul class="login-more pt-4">
                        <li class="mb-2">
                            <span class="txt1">
                                Forgot
                            </span>

                            <a href="#" class="txt2">
                                email / Password?
                            </a>
                        </li>

                        <li>
                            <span class="txt1">
                                Don’t have an account?
                            </span>

                            <a href="<?=base_url('login/cadastro');?>" class="txt2">
                                Sign up
                            </a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="<?=base_url('assets/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
    <script src="<?=base_url('assets/vendor/animsition/js/animsition.min.js');?>"></script>
<!--===============================================================================================-->
    <script src="<?=base_url('assets/vendor/bootstrap/js/popper.js');?>"></script>
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
    <script src="<?=base_url('assets/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
    <script src="<?=base_url('assets/vendor/daterangepicker/moment.min.js');?>"></script>
    <script src="<?=base_url('assets/vendor/daterangepicker/daterangepicker.js');?>"></script>
<!--===============================================================================================-->
    <script src="<?=base_url('assets/vendor/countdowntime/countdowntime.js');?>"></script>
<!--===============================================================================================-->
    <script src="<?=base_url('assets/js/main.js');?>"></script>

</body>
</html>
