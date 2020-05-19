-- Search and display id attribute for the account which have wanted to participate to a ride

    -- $IdAccount = driver id account
    
    SELECT recquire.idaccount FROM recquire,ride,account WHERE account.idaccount=$IdAccount AND ride.idaccount=$IdAccount AND recquire.idride=ride.idride;

-- Search and display idaccount and idride for state is 'accepted' (state_request)

    SELECT * FROM require WHERE state_request='accepted';

-- Search and display idaccount in the 'account' entity for the specific 'email' and 'password' attributs

    SELECT idaccount FROM account WHERE email=$Email AND password=$Password;

    -- Example

    SELECT idaccount FROM account WHERE email='bonnet@upssiride.net' AND password='password';

-- Search and display line where 'Adminrights' attribut is ON (=1) in the account entity

    SELECT count(*) FROM account WHERE idaccount=$Idaccount AND adminrights=1

    -- Example

    SELECT count(*) FROM account WHERE idaccount=1 AND adminrights=1

-- Search and display line(s) for a specify account with email in the 'account' entity

    SELECT * FROM account WHERE email=$Email;

    -- Example

    SELECT * FROM account WHERE email='bonnet@upssiride.net';

-- Search and display name, first name, email, description, phone and pictureprofil with the specific 'idaccount' attribut in the 'account' entity

    SELECT name, firstname,email,description,phone,pictureprofil FROM account WHERE idaccount=$Idaccount;

    -- Example

    SELECT name, firstname,email,description,phone,pictureprofil FROM account WHERE idaccount=1;

-- Search and display email with the specific 'idaccount' attribut in the 'account' entity

    SELECT email FROM account WHERE idaccount=$Idaccount;

    -- Example

    SELECT email FROM account WHERE idaccount=$Idaccount;

-- Search and display line(s) for a specific account with 'idaccount' and 'password' attribut in the 'account' entity

    SELECT count(*) FROM account WHERE idaccount=$Idaccount AND password=$Password;

    -- Example

    SELECT count(*) FROM account WHERE idaccount=1 AND password='password';

-- Search and display name and firstname for a specific account with 'idaccount' attribut and in the 'account' entity

    SELECT name,firstname FROM account WHERE idaccount=$Idaccount;

    -- Example

    SELECT name,firstname FROM account WHERE idaccount=1;

-- Search and display picture profilfor a specific account with 'idaccount' attribut and in the 'account' entity

    SELECT pictureprofil FROM account WHERE idaccount=$Idaccount;

    -- Example

    SELECT pictureprofil FROM account WHERE idaccount=1;

-- Search and display name, first name, description and pictureprofil with the specific 'idaccount' attribut in the 'account' entity

    SELECT name, firstname, pictureprofil, description FROM account WHERE idaccount=$Idaccount;

    -- Example

    SELECT name, firstname, pictureprofil, description FROM account WHERE idaccount=1;

-- Search and display name, first name, description and pictureprofil with the specific 'idaccount' attribut in the 'account' entity

    SELECT name, firstname, description, pictureprofil, registrationdate FROM account WHERE idaccount=$Idaccount;

    -- Example

    SELECT name, firstname, description, pictureprofil, registrationdate FROM account WHERE idaccount=1;

-- Search and display the city with a specific 'idplace' attribut in the 'place' entity

    SELECT city FROM place WHERE idplace=?;

    -- Example 

    SELECT city FROM place WHERE idplace=?;

-- Search and display list ride for a specific account with the 'idaccount' attribut

    SELECT DISTINCT ride.idride, ride.departuredate, ride.departuretime, ride.idplace_departure, ride.idplace_arrived, ride.idaccount FROM ride, participate 
    WHERE (participate.idaccount= $Participate.Idaccount and participate.idride = ride.idride or ride.idaccount = $Ride.Idaccount ) and ride.idstate=1
    ORDER BY ride.departuredate ASC;

    -- Example

    SELECT DISTINCT ride.idride, ride.departuredate, ride.departuretime, ride.idplace_departure, ride.idplace_arrived, ride.idaccount FROM ride, participate 
    WHERE (participate.idaccount= '2020-04-30' and participate.idride = ride.idride or ride.idaccount = 1 ) and ride.idstate=1
    ORDER BY ride.departuredate ASC;

-- Search and display requested rides for a specific account with the 'idaccount' attribut

    SELECT ride.idride, departuredate, departuretime, idplace_departure, idplace_arrived, ride.idaccount FROM ride, require
    WHERE require.idaccount = $Recquire.Idaccount AND ride.idride=require.idride
    ORDER BY ride.departuredate ASC;

    -- Example

    SELECT ride.idride, departuredate, departuretime, idplace_departure, idplace_arrived, ride.idaccount FROM ride, require
    WHERE require.idaccount = 1 AND ride.idride=require.idride
    ORDER BY ride.departuredate ASC;

-- Search and display accepted rides for a specific account with the 'idaccount' attribut

    SELECT DISTINCT ride.idride, ride.departuredate, ride.departuretime, ride.idplace_departure, ride.idplace_arrived, ride.idaccount FROM ride, participate
    WHERE (participate.idaccount= $Participate.Idaccount and participate.idride = ride.idride or ride.idaccount = $Ride.Idaccount) and ride.idstate = 3
    ORDER BY ride.departuredate ASC;

    -- Example

    SELECT DISTINCT ride.idride, ride.departuredate, ride.departuretime, ride.idplace_departure, ride.idplace_arrived, ride.idaccount FROM ride, participate
    WHERE (participate.idaccount= 1 and participate.idride = ride.idride or ride.idaccount = 3) and ride.idstate = 3
    ORDER BY ride.departuredate ASC;

-- Search and display request(s) not accepted for a specific ride with the 'state_request' attribut ine the 'require' entity

    SELECT idaccount FROM require WHERE idride=$id_ride AND state_request='processing';

    -- Example 

    SELECT idaccount FROM require WHERE idride=2 AND state_request='processing';

-- Search and display all sponsors

    SELECT * FROM sponsors order by idsponsors ASC;

-- Search and display picture profil for a specific sponsors with 'pictureprofil' attribut in the entity 'sponsors'

    SELECT pictureprofil FROM sponsors WHERE idsponsors=$Idsponsors;

    -- Example

    SELECT pictureprofil FROM sponsors WHERE idsponsors=1;

-- Search and display vehicule for a specific account with 'idaccount' attribut

    SELECT * FROM vehicule WHERE idaccount=$Idaccount;

    -- Example

<<<<<<< HEAD
    UPDATE sponsors SET pictureprofile='Pictures_sites/sponsors/stri.png' WHERE idsponsors=1
=======
    SELECT * FROM vehicule WHERE idaccount=1;

-- Search and display specific idride by filtering with 'departuredate','departuretime' and 'idaccount' attribut in the entity 'ride'

    SELECT idride FROM ride WHERE departuredate=$Departuredate AND departuretime>=$Departuretime1 AND departuretime<=$Departuretime2 AND idaccount=$Idaccount;

    -- Example

    SELECT idride FROM ride WHERE departuredate='2020-05-15' AND departuretime>='15:00:00' AND departuretime<='15:30:00' AND idaccount=1;

-- Search and display specific idride by filtering with 'departuredate','departuretime', 'comment', maxpassengersnb', 'idstate', idplace_departure', 'idplace_arrived' and 'idaccount' attribut in the entity 'ride'

    SELECT idride FROM ride
    WHERE departuredate=$Departuredate      AND departuretime=$Departuretime AND comment=$Comment
                                            AND maxpassengersnb=$Maxpassengersnb AND idstate=$Idstate
                                            AND idplace_departure=$Idplace_departure AND idplace_arrived=$Idplace_arrived
                                            AND idaccount=$Idaccount;

    -- Example

    SELECT idride FROM ride
    WHERE departuredate='2020-05-15'    AND departuretime=2 AND comment='This is my comment'
                                        AND maxpassengersnb=3 AND idstate=1
                                        AND idplace_departure=40 AND idplace_arrived=50
                                        AND idaccount=1;

-- Search and display specific idplace by filtering with 'address', 'postcode', 'city' and 'country' attribut in the entity 'place'

    SELECT idplace FROM place WHERE address=$Address AND postcode=$Postcode AND city=$City AND country=$Country;

    -- Example

    SELECT idplace FROM place WHERE address='My_address' AND postcode='123456' AND city='London' AND country='United Kingdom';
>>>>>>> 6f8549aca6cc8208f3994183044b24234b7f6dc3
