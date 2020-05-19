-- Addition of a new account in the BdD under the entity 'account'

    INSERT INTO account VALUES($IdAccount,$Name,$FirstName,$Gender,$password,$PictureProfilPath,$Email,$Phone,$Birthdate,$AdmindRights,$Registration_Date,$Description,$Music,$Chatting,$Smoke,$Pets);
    
    -- Example

    INSERT INTO account VALUES(default,'acila','vincent','M','passwordtest','','acila@upssiride.net','0607080910','2020/1/1',1,'2020/04/23','compte test',1,1,1,1);
    INSERT INTO account VALUES(default,'bonnet','hugo','M','password','','bonnet@upssiride.net','0607080911','2020/1/1',1,'2020/05/1','compte test'1,1,0,1);


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

    INSERT INTO place VALUES (default,$address,$postcode,$city,$country);

    -- Example

    INSERT INTO place VALUES (default, '137 New Street','SW82 6PG','London', 'England');
    INSERT INTO place VALUES (default, '998 Park Lane','EC26 3BT','London', 'England');

-- Addition of new ride in the BdD under the entity 'ride'

    INSERT INTO ride VALUES (default,$departuredate,$departuretime,$comment,$maxpassengersnb,$idstate,$idplace_departure,$idplace_arrived,$idaccount);

    -- Example

    INSERT INTO ride VALUES (default, '2020-05-05','20:00:00-00','This is comment for my ride', 2,1,1,2,29);

-- Addition of new request (with its state) for specified ride under the entity 'require'

    INSERT INTO require VALUES($IdAccount,$IdRide, $state_request);

    -- Example

    INSERT INTO recquire VALUES(1,4,'processing');

-- Addition of new partipation for specify ride under the entity 'participate'

    INSERT INTO participate VALUES($Idaccount,$Idride);

    -- Example

    INSERT INTO participate VALUES(1,3);

-- Addition of new sponsors under in entity 'sponsors'

    INSERT INTO sponsors values(default, $Name, $Description, $Pictureprofile);

    -- Example

    INSERT INTO sponsors values(default, 'stri', 'I follow this beautiful project', 'Pictures_sites/sponsors/stri.png');
<<<<<<< HEAD
=======

-- Addition of new place under in entity 'place'

    INSERT INTO place VALUES(default, $address, $zip, $city, $country, $lat, $lng);

    -- Example

    INSERT INTO place VALUES(default, 'This is address', 'this is zip', 'Test city', 'Test country', 'latitude', 'longitude');
>>>>>>> 6f8549aca6cc8208f3994183044b24234b7f6dc3
