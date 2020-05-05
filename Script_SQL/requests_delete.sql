-- Delete existing sponsor in the BdD under the entity 'sponsors'

    DELETE FROM sponsors WHERE name = $Name

    -- Example
    
    DELETE FROM sponsors WHERE name = 'my_sponsors';