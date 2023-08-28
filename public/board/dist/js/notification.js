var notifications;
var notifications_box = document.getElementById('notifications_box');
var badgeElement = document.querySelector('.navbar-badge');

function loadNotifications() {
    var notifications_elements = '';
    var notificationCount = 0;
    badgeElement.textContent = notificationCount;
    notifications_box.innerHTML = notifications_elements;
    notifications.forEach(notification => {
        notificationCount++;
        notifications_elements += `
       <div class="dropdown-divider"></div>
       <div class="notification-item">
           <a href="${notification.data.url}" class="dropdown-item">
               <i class="fa-solid fa-plus"></i> ${notification.data.message}
           </a>
           <a href="${mark_read_url + '/' + notification.id}" class="dropdown-item mark_read_notification">
                mark seen
           </a>
       </div>`
    });
    if (notificationCount > 0) {

        notifications_elements += ` <div class="dropdown-divider"></div>
        <a href="${mark_read_url}" class="dropdown-item dropdown-footer mark_read_notification">Mark all as seen</a>`
    } else {
        notifications_elements += ` <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer mark_read_notification">You have no notification yet</a>`
    }
    notifications_box.innerHTML = notifications_elements;
    badgeElement.textContent = notificationCount;


    // console.log(notifications);
    markNotifications()

}

function getNotifications(url = all_notifications_url) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.send();
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            notifications = JSON.parse(xhr.responseText).data;
            loadNotifications()
        }
    };
}

function markNotifications() {
    var markReadLinks = document.querySelectorAll('.mark_read_notification');
    markReadLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            getNotifications(link.getAttribute('href'));
        });
    });
}

window.onload = function () {
    getNotifications()

}


