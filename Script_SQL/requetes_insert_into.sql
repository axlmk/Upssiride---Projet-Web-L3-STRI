-- Addition of a new account in the BdD under the entity 'account'

    INSERT INTO account VALUES($IdAccount,$Name,$FirstName,$Gender,$password,$PictureProfilPath,$Email,$Phone,$Birthdate,$AdmindRights,$Registration_Date,$Description);
    
    -- Example

    INSERT INTO account VALUES(default,'acila','vincent','M','passwordtest','','acila@upssiride.net','0607080910','2020/1/1',1,'2020/04/23','compte test');
    INSERT INTO account VALUES(default,'bonnet','hugo','M','password','','bonnet@upssiride.net','0607080911','2020/1/1',1,'2020/05/1','compte test');


-- Addition of a new vehicle in the BdD under the entity 'vehicule' with the IDAccount of the user

    INSERT INTO vehicule VALUES($Registration,$Brand,$Model,$Color);

    -- Example
    
    INSERT INTO vehicule VALUES('TS08 PBS','Citroën','C3','blue',0);

