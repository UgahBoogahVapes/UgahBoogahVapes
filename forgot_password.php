<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>
        Forgot Password
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="./assets/js/tailwind.js"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="./assets/css/dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_GET['status'])) {
            if($_GET['status'] == "error") {
                echo '
                <div id="error" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
                padding: 1em;
                border-radius: 1em;
                display: flex;
                align-items: center;
                gap: 0.6em;
                color: #360e0e; background: #ff7373">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>User doesn'."'".'t exist.</span>
                </div>
                <style>
                    #error {
                        opacity: 0;
                        transition: all;
                        animation-name: error;
                        animation-duration: 4s;
                    }
            
                    @keyframes error {
                        0%, 80% {
                            opacity: 1;
                        }
                        100% {
                            opacity: 0;
                        }
                    }
                </style>
                ';
            } else if ($_GET['status'] == "incorrect") {
                echo '
                <div id="error" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
                padding: 1em;
                border-radius: 1em;
                display: flex;
                align-items: center;
                gap: 0.6em;
                color: #360e0e; background: #ff7373">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>Incorrect verification code.</span>
                </div>
                <style>
                    #error {
                        opacity: 0;
                        transition: all;
                        animation-name: error;
                        animation-duration: 4s;
                    }
            
                    @keyframes error {
                        0%, 80% {
                            opacity: 1;
                        }
                        100% {
                            opacity: 0;
                        }
                    }
                </style>
                ';
            }
        }

        if (isset($_SESSION['email_verification']) && (!isset($_GET['status']) || ($_GET['status'] != "error" && $_GET['status'] != "incorrect"))) {
            echo '
            <div id="sent" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
            padding: 1em;
            border-radius: 1em;
            display: flex;
            align-items: center;
            gap: 0.6em;
            color: #0e1a36; background: #739fff">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="width: 1.2em; height: 1.2em; stroke: currentColor;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Verification code is sent to your email.</span>
            </div>
            <style>
                #sent {
                    opacity: 0;
                    transition: all;
                    animation-name: sent;
                    animation-duration: 4s;
                }
        
                @keyframes sent {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        }
    ?>
    <main class="main-content">
        <div class="container">
            <div class="row justify-content-center " style="height: 100vh; display: flex; justify-content: center; align-items: center;">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <?php
                        if (!isset($_SESSION['email_verification'])) {
                            echo '
                            <div class="card z-index-0 shadow-lg">
                                <div class="text-center pt-4">
                                    <h5>Forgot Password</h5>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="./modules/forgotPassword.php" method="post">
                                        <div class="mb-3">
                                            <label for="email">Enter your email:</label>
                                            <input required type="email" name="email" id="email" class="form-control" aria-label="Email">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Send Verification
                                                Code</button>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="./login.php">Go back to Log In</a>
                                        </div>
                                    </form>
                                </div>
                            </div>';
                        } else {
                            echo '
                            <div class="card z-index-0 shadow-lg">
                                <div class="text-center pt-4">
                                    <h5>Forgot Password</h5>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="./modules/forgotPassword.php" method="post">
                                        <div class="mb-3">
                                            <label for="password">New Password:</label>
                                            <input required type="password" name="password" id="password" class="form-control" aria-label="Password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="verification_code">Verification Code:</label>
                                            <input required type="text" name="verification_code" id="verification_code" class="form-control" aria-label="Verification Code">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Send Verification
                                                Code</button>
                                        </div>
                                    </form>
                                </div>
                            </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <script src="./assets/js/dashboard.min.js?v=2.0.4"></script>
</body>

</html>