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

-- Modify picture profile for a specific spondsors in the entity 'sponsors'

    UPDATE sponsors SET pictureprofile=$Pictureprofile WHERE idsponsors=$Idsponsors

    -- Example

    UPDATE sponsors SET pictureprofile='Pictures_sites/sponsors/stri.png' WHERE idsponsors=1
