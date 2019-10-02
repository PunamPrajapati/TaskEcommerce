$('document').ready(function() {
    Pusher.logToConsole = true;
    var notificationsWrapper = $('.notification');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('#notification-count[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('ul#notification');
    var pusher = new Pusher('df9e6b4df6bbef901a05', {
        cluster: 'ap2',
        forceTLS: true
    });


    var channel = pusher.subscribe('notification-channel');
    channel.bind('App\\Events\\NotificationEvent', function(data) {
        // alert(JSON.stringify(data));
        var existingNotifications = notifications.html();

        var newNotificationHtml = `
        <li class="notification active">
            <a href="` + APP_URL + `/` + data.id + `">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                  </div>
                <div class="media-body bg-info">
                  <p class="notification-desc">` + data.name + `has made an order</p>
                  <div class="notification-meta">
                    <small class="timestamp">` + data.created_at + `</small>
                  </div>
                </div>
              </div>
              </div>
              </a>
          </li>
        `;

        notifications.html(newNotificationHtml + existingNotifications);
        console.log(notifications.html(newNotificationHtml + existingNotifications));
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
    });
})