<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>
        Ugah Boogah Vapes
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="./assets/js/html2canvas.js"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="./assets/css/dashboard.css?v=2.0.4" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@3"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 position-absolute w-100">
        <div class="bg-primary position-absolute w-100 h-100" style="opacity: 70%; z-index: 0;"></div>
        <img src="./assets/img/bg_2.jpg" class="height-300 w-100" style="object-fit: cover;" alt="">
    </div>

    <?php

    include './helpers/crud.php';
    if (!isset($_SESSION['user_id'])) {
        header("Location: ./login.php");
    }
    $user = $crud->read("users", $_SESSION["user_id"]);
    include './components/sidebar.php';
    ?>

    <main class="main-content position-relative border-radius-lg ">

        <?php

        include './components/nav.php';
        switch ($user['type']) {
            case "admin":
                if (isset($_GET['page'])) {
                    switch ($_GET['page']) {
                        case "dashboard":
                            include './pages/dashboard.php';
                            break;
                        case "manage":
                            include './pages/manage.php';
                            break;
                        case "audit_log":
                            include './pages/audit_log.php';
                            break;
                        case "inventory":
                            include './pages/inventory.php';
                            break;
                        case "chat":
                            include './pages/chat.php';
                            break;
                    }
                } else {
                    include './pages/dashboard.php';
                }
                break;
            case "employee":
                if (isset($_GET['page'])) {
                    switch ($_GET['page']) {
                        case "dashboard":
                            include './pages/dashboard.php';
                            break;
                        case "audit_log":
                            include './pages/audit_log.php';
                            break;
                        case "chat":
                            include './pages/chat.php';
                            break;
                    }
                } else {
                    include './pages/dashboard.php';
                }
                break;
            case "supplier":
                if (isset($_GET['page'])) {
                    switch ($_GET['page']) {
                        case "chat":
                            include './pages/chat.php';
                            break;
                    }
                } else {
                    include './pages/chat.php';
                }
                break;
        }

        ?>



    </main>

    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

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