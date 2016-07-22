<?php

function connect($config){
    try {
        $conn = new \PDO(
                    $config['db_connect_str'],
                    $config['username'],
                    $config['password']
                );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        
    } catch (Exception $ex) {
        return false;
    }
}

function get_registrants($conn){
    try {
        $result = $conn->query("SELECT ID as post_id FROM wp_posts
            WHERE post_type='bef_registrant'
            AND post_status='publish'"
        );
      
        return ( $result->rowCount() > 0 )
                ? $result 
                : false;
        
    } catch (Exception $ex) {
        return false;
    }
}

function get_record($conn, $record_id){
    try {
        $statement = $conn->prepare("SELECT * FROM wp_postmeta
                                       WHERE post_id = :id");
        $statement->bindParam(':id', $record_id, PDO::PARAM_INT);
        $statement->execute();
    
        $result = $statement->fetchAll();
        
        return ( $statement->rowCount() > 0 )
                   ? $result 
                   : false;
    } catch (Exception $ex) {
         return false;
    }  
}