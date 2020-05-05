-- Addition of a new account in the BdD under the entity 'account'

    INSERT INTO account VALUES($IdAccount,$Name,$FirstName,$Gender,$password,$PictureProfilPath,$Email,$Phone,$Birthdate,$AdmindRights,$Registration_Date,$Description);
    
    -- Example

    INSERT INTO account VALUES(default,'acila','vincent','M','passwordtest','','acila@upssiride.net','0607080910','2020/1/1',1,'2020/04/23','compte test');
    INSERT INTO account VALUES(default,'bonnet','hugo','M','password','','bonnet@upssiride.net','0607080911','2020/1/1',1,'2020/05/1','compte test');


-- Addition of a new vehicule in the BdD under the entity 'vehicule' with the IDAccount of the user

    INSERT INTO vehicule VALUES($Registration,$Brand,$Model,$Color);

    -- Example
    
    INSERT INTO vehicule VALUES('TS08 PBS','Citroën','C3','blue',0);


-- Addition of a new sponsor in the BdD under the entity 'sponsors'

    INSERT INTO sponsors VALUES($IdSponsors,$Name,$Description,$PictureProfile);

    -- Example 

    INSERT INTO sponsors VALUES(default,'my_sponsors','description_sponsors','path/pictures/sponsors');

-- Addition of a new state permanent in the BdD under the entity 'state'

    INSERT INTO state VALUES($IdState,$label);

    -- Example

    INSERT INTO state VALUES(1,'coming');
    INSERT INTO state VALUES(2,'processing');
    INSERT INTO state VALUES(3,'completed');
    INSERT INTO state VALUES(4,'canceled');

-- Addition of new place in the BdD under the entity 'place'

    INSERT INTO place VALUES ($IdPlace,$address,$postcode,$city,$country);

    -- Example

    INSERT INTO place VALUES (default, '137 New Street','SW82 6PG','London', 'England');
    INSERT INTO place VALUES (default, '998 Park Lane','EC26 3BT','London', 'England');

-- Addition of new ride in the BdD under the entity 'ride'

    INSERT INTO ride VALUES ($IdRide,$departuredate,$departuretime,$comment,$maxpassengersnb,$music,$pets,$smoker,$idstate,$idplace,$idplace_1,$idaccount);

    -- Example

    INSERT INTO ride VALUES (default, '2020-05-05','20:00:00-00','This is comment for my ride', 2,1,0,0,1,1,2,29);