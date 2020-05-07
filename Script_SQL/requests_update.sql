-- Modify 'idstate' attribut for change state ride in the entity 'ride'

    UPDATE ride SET idstate=$IdState WHERE idride=$IdRide;

    -- Example
    
    UPDATE ride
    SET idstate=3
    WHERE idride=3;