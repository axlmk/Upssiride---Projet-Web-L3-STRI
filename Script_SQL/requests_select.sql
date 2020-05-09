-- Display id attribute for the account which have wanted to participate to a ride

    $IdAccount = driver id account
    
    SELECT require.idaccount FROM require,ride,account WHERE account.idaccount=$IdAccount AND ride.idaccount=$IdAccount AND require.idride=ride.idride;