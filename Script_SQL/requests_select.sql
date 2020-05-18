-- Display id attribute for the account which have wanted to participate to a ride

    -- $IdAccount = driver id account
    
    SELECT recquire.idaccount FROM recquire,ride,account WHERE account.idaccount=$IdAccount AND ride.idaccount=$IdAccount AND recquire.idride=ride.idride;

-- Display idaccount and idride for state is 'accepted' (state_request)

    SELECT * FROM require WHERE state_request='accepted';
