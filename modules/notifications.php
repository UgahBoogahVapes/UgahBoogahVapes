<?php
// notifications.php

function renderNotifications($notifications) {
    echo '<div class="position-relative me-3">';
    echo '<a href="javascript:;" class="text-white" id="notificationButton" data-bs-toggle="dropdown" aria-expanded="false">';
    echo '<i class="fas fa-bell" style="font-size: 1.5em; color: white;"></i>';
    
    // Count the number of notifications
    $notificationCount = count($notifications);
    echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">' . $notificationCount . '</span>';
    
    echo '</a>';
    echo '<ul class="dropdown-menu dropdown-menu-end px-2 py-2" aria-labelledby="notificationButton">';
    
    // Display each notification
    foreach ($notifications as $notification) {
        echo '<li>';
        echo '<a class="dropdown-item border-radius-md" href="#">' . htmlspecialchars($notification) . '</a>';
        echo '</li>';
    }

    echo '</ul>';
    echo '</div>';
}
?>
