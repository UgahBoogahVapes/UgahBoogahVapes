<?php 
    function getPage() {
        echo isset($_GET['page']) ? ucwords($_GET['page']) : "Dashboard";
    }

    $notifications = $crud->read_all("notifications") ? $crud->read_all("notifications") : [];
    $product_order = $crud->read_all("product_order") ? $crud->read_all("product_order") : [];
    usort($product_order, function($a, $b) {
        return strtotime($b['datetime']) - strtotime($a['datetime']);
    });
    usort($notifications, function($a, $b) {
        return strtotime($b['created_at']) - strtotime($a['created_at']);
    });
?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3 d-flex justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?php getPage(); ?></li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0"><?php getPage(); ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
            <div class="pe-md-3 d-flex align-items-center">
                <!-- NOTIF -->
                <ul class="position-relative me-3 mb-0">
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="notificationButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell" style="font-size: 1.5em; color: white;"></i> 
                            <span id="notification-badge" class="position-absolute top-0 start-100 translate-middle rounded-full bg-red-500" style="width: 0.8em; height: 0.8em; display: none;"></span>
                        </a>
                        <script>
                            if (<?php echo $user['type'] == "supplier" ? "true" : "false" ?>) {
                                if (localStorage.getItem("<?php echo $user['id'] ?>notification_id") != "<?php echo count($product_order) > 0 ? $product_order[0]['id'] : "" ?>" && <?php echo count($product_order) > 0 ?>) {
                                    document.getElementById('notification-badge').style.display = "block";
                                }
                                document.getElementById("notificationButton").addEventListener("click", () => {
                                    document.getElementById('notification-badge').style.display = "none";
                                    <?php
                                        if (count($product_order) > 0) {
                                            echo '
                                                localStorage.setItem("'.$user['id'].'notification_id", '.$product_order[0]["id"].');
                                            ';
                                        }
                                    ?>
                                });
                            } else {
                                if (localStorage.getItem("<?php echo $user['id'] ?>notification_id") != "<?php echo count($notifications) > 0 ? $notifications[0]['id'] : "0" ?>") {
                                    document.getElementById('notification-badge').style.display = "block";
                                    document.getElementById('notification-badge').style.background = "red";
                                    document.getElementById('notification-badge').style.borderRadius = "50px";
                                }
                                document.getElementById("notificationButton").addEventListener("click", () => {
                                    document.getElementById('notification-badge').style.display = "none";
                                    <?php
                                        if (count($notifications) > 0) {
                                            echo '
                                                localStorage.setItem("'.$user['id'].'notification_id", '.$notifications[0]["id"].')
                                            ';
                                        }
                                    ?>
                                });
                            }
                        </script>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-2 pt-3 me-sm-n4 mt-0" style="margin-top: 1.5em !important;" aria-labelledby="dropdownMenuButton">
                            <?php
                                
                                if ($user['type'] != "supplier") {
                                    if ($notifications) {
                                        $index = 0;
                                        foreach($notifications as $notification) {
                                            echo '
                                                <button onclick="document.getElementById(`blue-badge0`).style.display = `none`;" class="dropdown-item border-radius-md" style="width: 30em; margin-bottom: 5px; display: flex; align-items: center; justify-content: space-between;">
                                                    <div>
                                                        <div style="font-weight: 600;">'.$notification['header'].'</div>
                                                        <div style="font-size: small;">'.$notification['body'].'</div>
                                                    </div>
                                                    <div id="blue-badge'.$index.'" style="background: #3385ff; border-radius: 50px; width: 10px; height: 10px; display: '.($index == 0 ? "block" : "none").'"></div>
                                                </button>
                                            ';
                                            if ($index == 0) {
                                                echo '
                                                    <script>
                                                        if (localStorage.getItem("'.$user['id'].'notifItem") != "'.$notification['id'].'") {
                                                            document.getElementById("blue-badge0").style.display = "block";
                                                        } else {
                                                            document.getElementById("blue-badge0").style.display = "none";
                                                        }
                                                    </script>
                                                ';
                                            }
                                            $index++;
                                        }
                                        if ($index == 0) {
                                            echo '<div style="text-align: center; padding: 1em; width: 20em;">No notifications.</div>';
                                        }
                                    }
                                } else {
                                    if ($product_order) {
                                        $index = 0;
                                        foreach($product_order as $order) {
                                            if ($order['status'] == "pending") {
                                                echo '
                                                    <button data-toggle="modal" data-target="#orderViewModal'.$order['id'].'" onclick="'.($index == 0 ? 'localStorage.setItem(`'.$user['id'].'notifItem`,`'.$order['id'].'`); localStorage.setItem(`'.$user['id'].'order_status`, `'.$order["status"].'`);' : "").'; document.getElementById(`blue-badge'.$index.'`).style.display = `none`;" class="dropdown-item border-radius-md" style="width: 30em; margin-bottom: 5px; display: flex; align-items: center; justify-content: space-between;">
                                                        <div>
                                                            <div style="font-weight: 600;">New Order Alert</div>
                                                            <div style="font-size: small;">'.$order['user'].' placed an order. Check it out!</div>
                                                        </div>
                                                        <div id="blue-badge'.$index.'" style="background: #3385ff; border-radius: 50px; width: 10px; height: 10px; display: '.($index == 0 ? "block" : "none").'"></div>
                                                    </button>
                                                ';
                                            } else {
                                                echo '
                                                    <button data-toggle="modal" data-target="#orderViewModal'.$order['id'].'" onclick="'.($index == 0 ? 'localStorage.setItem(`'.$user['id'].'notifItem`,`'.$order['id'].'`); localStorage.setItem(`'.$user['id'].'order_status`, `'.$order["status"].'`);' : "").'; document.getElementById(`blue-badge'.$index.'`).style.display = `none`;" class="dropdown-item border-radius-md" style="width: 30em; margin-bottom: 5px; display: flex; align-items: center; justify-content: space-between;">
                                                        <div>
                                                            <div style="font-weight: 600;">Order Delivered</div>
                                                            <div style="font-size: small;">'.$order['user'].' order has been delivered.</div>
                                                        </div>
                                                        <div id="blue-badge'.$index.'" style="background: #3385ff; border-radius: 50px; width: 10px; height: 10px; display: '.($index == 0 ? "block" : "none").'"></div>
                                                    </button>
                                                    <button data-toggle="modal" data-target="#orderViewModal'.$order['id'].'" onclick="'.($index == 0 ? 'localStorage.setItem(`'.$user['id'].'notifItem`,`'.$order['id'].'`); localStorage.setItem(`'.$user['id'].'order_status`, `'.$order["status"].'`);' : "").'; document.getElementById(`blue-badge'.$index.'`).style.display = `none`;" class="dropdown-item border-radius-md" style="width: 30em; margin-bottom: 5px; display: flex; align-items: center; justify-content: space-between;">
                                                        <div>
                                                            <div style="font-weight: 600;">New Order Alert</div>
                                                            <div style="font-size: small;">'.$order['user'].' placed an order. Check it out!</div>
                                                        </div>
                                                    </button>
                                                ';
                                            }
                                            if ($index == 0) {
                                                echo '
                                                    <script>
                                                        if (localStorage.getItem("'.$user['id'].'notifItem") != "'.$order['id'].'" || localStorage.getItem("'.$user['id'].'order_status") != "'.$order['status'].'") {
                                                            document.getElementById("blue-badge0").style.display = "block";
                                                        } else {
                                                            document.getElementById("blue-badge0").style.display = "none";
                                                        }
                                                    </script>
                                                ';
                                            }
                                            $index++;
                                        }
                                        if ($index == 0) {
                                            echo '<div style="text-align: center; padding: 1em; width: 20em;">No notifications.</div>';
                                        }
                                    }
                                }
                            ?>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img style="height: 2em; border-radius: 50px; aspect-ratio: 1/1; object-fit: cover;" src="./assets/img/default_avatar.png" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-2 me-sm-n4 mt-0" style="margin-top: 1.5em !important;" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item border-radius-md" href="./modules/logout.php">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php
    include "./components/modals/view_ordered_product.php";
    if ($product_order) {
        foreach (array_slice($product_order, 0, 10) as $orders) {
            viewOrder($orders, $crud);
        }
    }
?>
