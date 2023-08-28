// import Echo from 'laravel-echo';
import './bootstrap';


var channel = Echo.private('notifications.' + user_id);

channel.listen('.new-notification', function (data) {
    // console.log(data[0]);
    notifications.unshift(data[0]);
    loadNotifications();
});
