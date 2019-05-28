<?php

/*
 * member table:
 *
    CREATE TABLE member (
        member_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name varchar(20) NOT NULL,
        species varchar(20),
        age int(3) NOT NULL,
        gender varchar(7),
        number varchar(10) NOT NULL,
        email varchar(255) NOT NULL,
        region varchar(10),
        seeking varchar(7),
        bio varchar(255),
        premium tinyint(1),
        image varchar(100)
    );
 */

/*
 * interest table:
 *
    CREATE TABLE interest (
        interest_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
        interest varchar(20),
        type varchar(7)
    );
 */

/*
 * memberinterest table:
 *
    CREATE TABLE memberinterest (
        member_id int,
        interest_id int,
        FOREIGN KEY (member_id) REFERENCES member(member_id),
        FOREIGN KEY (interest_id) REFERENCES interest(interest_id)
    );
 */

require '/home/zlindgre/config-dating.php';
class Database
{
    private $_dbh;
    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {
            //Instantiate a db object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

            return $this->_dbh;
        } catch(PDOException $e) {

            echo $e->getMessage();
        }
    }

    function insertMember($newmember)
    {
        //1. Define the query
        $sql = "INSERT INTO member(name, species, age, gender, number, email, region, seeking, bio, premium)
                VALUES (':name', ':species', ':age', ':gender', ':number', ':email', ':region', ':seeking', 
                ':bio', ':premium');";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':name', $newmember->getName(), PDO::PARAM_STR);
        $statement->bindParam(':species', $newmember->getSpecies(), PDO::PARAM_STR);
        $statement->bindParam(':age', $newmember->getAge(), PDO::PARAM_INT);
        $statement->bindParam(':gender', $newmember->getGender(), PDO::PARAM_STR);
        $statement->bindParam(':number', $newmember->getNumber(), PDO::PARAM_STR);
        $statement->bindParam(':email', $newmember->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':region', $newmember->getRegion(), PDO::PARAM_STR);
        $statement->bindParam(':seeking', $newmember->getSeeking(), PDO::PARAM_STR);
        $statement->bindParam(':bio', $newmember->getBio(), PDO::PARAM_STR);

        // check if the member is premium or not
        $premium = 0;
        if ($_SESSION['isPremium'])
        {
            $premium = 1;
        }

        $statement->bindParam(':premium', $premium, PDO::PARAM_INT);

        //4. Execute the statement
        $statement->execute();
    }

    function getMembers()
    {
        //1. Define the query
        $sql = "SELECT * FROM member
                ORDER BY name";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        //4. Execute the statement
        $statement->execute();

        //5. Return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getMember($member_id)
    {
        //1. Define the query
        $sql = "SELECT * FROM member
                WHERE member_id = :id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $member_id, PDO::PARAM_INT);

        //4. Execute the statement
        $statement->execute();

        //5. Return the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getInterests($member_id)
    {
        //1. Define the query
        $sql = "SELECT interest, type FROM memberinterest
                INNER JOIN memberinterest ON member.member_id = memberinterest.member_id
                WHERE member_id = :id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $member_id, PDO::PARAM_INT);

        //4. Execute the statement
        $statement->execute();

        //5. Return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}