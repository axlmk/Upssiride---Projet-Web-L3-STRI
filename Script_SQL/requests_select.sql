-- Display id attribute for the account which have wanted to participate to a ride

    $IdAccount = driver id account
    
    SELECT recquire.idaccount FROM recquire,ride,account WHERE account.idaccount=$IdAccount AND ride.idaccount=$IdAccount AND recquire.idride=ride.idride;