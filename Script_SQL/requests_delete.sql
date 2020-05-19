-- Delete existing sponsor in the BdD under the entity 'sponsors'

    DELETE FROM sponsors WHERE name = $Name

    -- Example
    
    DELETE FROM sponsors WHERE name = 'my_sponsors';

-- Delete an account in the BdD under the entity 'vehicule', 'ride', 'require', 'participate' and 'account'

    DELETE FROM vehicule WHERE idaccount=(  SELECT idaccount FROM account WHERE name = $Name AND firstname = $Firstname);
    DELETE FROM ride WHERE idaccount=(  SELECT idaccount FROM account WHERE name = $Name AND firstname = $Firstname);
    DELETE FROM require WHERE idaccount=(  SELECT idaccount FROM account WHERE name = $Name AND firstname = $Firstname);
    DELETE FROM participate WHERE idaccount=(  SELECT idaccount FROM account WHERE name = $Name AND firstname = $Firstname);
    DELETE FROM account WHERE idaccount=(  SELECT idaccount FROM account WHERE name = $Name AND firstname = $Firstname);

    -- Example
    
    DELETE FROM vehicule WHERE idaccount=(  SELECT idaccount FROM account WHERE name = 'rr' AND firstname = 'rr');
    DELETE FROM ride WHERE idaccount=(  SELECT idaccount FROM account WHERE name = 'rr' AND firstname = 'rr');
    DELETE FROM require WHERE idaccount=(  SELECT idaccount FROM account WHERE name = 'rr' AND firstname = 'rr');
    DELETE FROM participate WHERE idaccount=(  SELECT idaccount FROM account WHERE name = 'rr' AND firstname = 'rr');
    DELETE FROM account WHERE idaccount=(  SELECT idaccount FROM account WHERE name = 'rr' AND firstname = 'rr');

-- Delete a request if this last is accepted

    DELETE FROM require WHERE idaccount=$Idaccount AND idride=$Idride;

    -- Example

    DELETE FROM require WHERE idaccount=1 AND idride=3;

-- Delete a specific sponsors

    DELETE FROM sponsors WHERE idsponsors=$Idsponsors;

    -- Example

    DELETE FROM sponsors WHERE idsponsors=$Idsponsors;