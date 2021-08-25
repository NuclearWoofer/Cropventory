<?php
    include (__DIR__ . '/model/db.php');

    
    function addCrops ($n, $d, $q) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO cropsInventory SET cropName = :cropName, cropPlanted = :cropPlanted, cropQty = :cropQty");

        $binds = array(
            ":cropName" => $n,
            ":cropPlanted" => $d,
            ":cropQty" => $q
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Crop Added!';
        }
        
        return ($results);
    }


    function getCrops () {
        global $db;
        
        $results = [];

        $stmt = $db->prepare("SELECT cropId, cropName, cropPlanted, cropQty, cropEstHarvest FROM cropsInventory ORDER BY cropId"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }

    
    function getCrop ($cropId) {
        global $db;
       
       $results = [];
       
       $stmt = $db->prepare("SELECT cropId, cropName, cropPlanted, cropQty, cropEstHarvest FROM cropsInventory WHERE cropId=:cropId");
       $stmt->bindValue(':cropId', $cropId);
      
       if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
                       
        }
        
        return ($results);
   }

           

    
    function updateCrop ($cropId, $cropName, $cropQty, $cropPlanted) {
        global $db;

        $results = "";
        
        $stmt = $db->prepare("UPDATE cropsInventory SET cropName = :cropName, cropQty = :cropQty, cropPlanted = :cropPlanted WHERE cropId =:cropId");
        
        $stmt->bindValue(':cropId', $cropId);
        $stmt->bindValue(':cropName', $cropName);
        $stmt->bindValue(':cropQty', $cropQty);
        $stmt->bindValue(':cropPlanted', $cropPlanted);
        
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Crop Updated!';
        }
        
        return ($results);
    }

        
    function deleteCrop ($cropId) {
        global $db;
        
        $results = "Data was not deleted";
    
        $stmt = $db->prepare("DELETE FROM cropsInventory WHERE cropId=:cropId");
        
        $stmt->bindValue(':cropId', $cropId);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Crop Deleted';
        }
        
        return ($results);
    }

 
   function searchCrops ($column, $searchValue) {
    global $db;
      
     $results = [];
      $stmt = $db->prepare("SELECT cropId, cropName, cropPlanted, cropQty, cropEstHarvest FROM cropsInventory WHERE $column LIKE :search");
      $search = '%'.$searchValue.'%';
      
      $stmt->bindValue(':search', $search);
     
      
      if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

       }

       return ($results);
}

function sortCrops ($column, $order) {
      
    global $db;
     
     $results = [];
     
    
     $stmt = $db->prepare("SELECT cropId, cropName, cropPlanted, cropQty, cropEstHarvest FROM cropsInventory ORDER BY $column $order");
     
     
     if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                     
      }
      
      return ($results);
}


function getFieldNames () {
    $fieldNames = ['cropName', 'cropPlanted' ,'cropQty', 'cropEstHarvest'];
    
    return ($fieldNames);
    
}



function checkLogin ($userName, $password) {
    global $db;
    $stmt = $db->prepare("SELECT id FROM users WHERE userName =:userName AND userPassword = :password");

    $stmt->bindValue(':userName', $userName);
    $stmt->bindValue(':password', sha1($password));
    
    $stmt->execute ();
   
    return( $stmt->rowCount() > 0);
    
}