<?php


return array_merge(

    /*Begin::Dashboard*/
    include('admin/dashboard.php'),
    /*End::Dashboard*/

    /*Begin::Business Clients*/
    include('admin/business-clients.php'),
    /*End::Business Clients*/

    /*Begin::Plans*/
    include('admin/plans.php'),
    /*End::Plans*/

    /*Begin::Settings*/
    include('admin/settings.php'),
    /*End::Settings*/

    /*Begin::Notifications*/
    include('admin/notifications.php'),
    /*End::Notifications*/

    /*Begin::Buttons*/
    include('admin/buttons.php'),
    /*End::Buttons*/
);
