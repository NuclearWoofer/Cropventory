<?php
        
        include __DIR__ . '/model_crop.php';
        include __DIR__ . '/functions.php';
       if (isPostRequest()) {
        $cropName = filter_input(INPUT_POST, 'cropName');
        $cropPlanted = filter_input(INPUT_POST, 'cropPlanted');
        $cropQty = filter_input(INPUT_POST, 'cropQty');
        
           $result = addCrops ($cropName, $cropPlanted, $cropQty);
           
       }
    
    ?>
    

<html lang="en">
<head>
  <title>Cropventory Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>


</style>
<body>

    

<!--------------------------------------------------ADDING CROPS---------------------------------------------------------------------------------------------------->
<?php
        
        include __DIR__ . '/model_crop.php';
        include __DIR__ . '/functions.php';
       if (isPostRequest()) {
        $cropName = filter_input(INPUT_POST, 'cropName');
        $cropPlanted = filter_input(INPUT_POST, 'cropPlanted');
        $cropQty = filter_input(INPUT_POST, 'cropQty');
        
           $result = addCrops ($cropName, $cropPlanted, $cropQty);   
       }
?>
<h2>Add Crops</h2>
<h3>Here we can add more crops / plants to your inventory.</h3>
      
  <form class="form-horizontal" action="addCrop.php" method="post">
<!--Date the crop was planted-->
    <div class="form-group">
      <label class="control-label col-sm-2" for="cropPlanted">Date Crop Planted</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="cropPlanted" placeholder="11/22/1963" name="cropPlanted">
      </div>
    </div>
    <!--Quantity of crops-->
    <div class="form-group">
      <label class="control-label col-sm-2" for="cropQty">Quantity:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="cropQty" placeholder="Enter crop quantity" name="cropQty">
      </div>
    </div>
    <!--dropdown of cropName-->
    <div class="form-group">
       <label class="control-label col-sm-2" for="cropName">Crop List</label>
       <div class="col-sm-10">
        <select name="cropName" id="cropName">
            <option value="Tomato">Tomato</option>
            <option value="Potato">Potato</option>
            <option value="Peas">Peas</option>
            <option value="Watermelon">Watermelon</option>
            <option value="Pumpkin">Pumpkin</option>
            <option value="Sunflower">Sunflower</option>
            <option value="Cucumber">Cucumber</option>
            <option value="Squash">Squash</option>
        </select>
       </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Plant this Plant!</button>
        <?php
            if (isPostRequest()) {
                echo "Plant successfully Planted!";
            }
        ?>
      </div>
    </div>
  </form>
  </div>
  <!--------------------------------------------------END ADDING CROPS----------------------------------------------------------------------------------------------------->

<!-------------------------------------------------SEARCH AND SORT--------------------------------------------------------------------------------------------------------->

<?php 
    include __DIR__ . '/model_crop.php';
    $action = filter_input(INPUT_POST, 'action');
    $fieldName = filter_input(INPUT_POST, 'fieldName');
    $fieldValue = filter_input(INPUT_POST, 'fieldValue');
    if ( $action === 'sort' && $fieldName != '' ) {
            $crops = sortCrops ($fieldName, $fieldValue);   
    }
    else if ( $action === 'search' && $fieldName != '' ) {
            $crops = searchCrops ($fieldName, $fieldValue);
    } else {
        $crops = getcrops ();  
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login.php');
    }
?>

 
<?php
    include __DIR__ . '/includes/searchFrom.php';
    include __DIR__ . '/includes/sortForm.php';
    include __DIR__ . '/includes/view.php';
?>
    
<!--------------------------------------------------END SEARCH AND SORT---------------------------------------------------------------------------------------------------->

<!-------------------------------------------------------INVENTORY--------------------------------------------------------------------------------------------------------->

<?php
    
    include __DIR__ . '/model_crop.php';
    include __DIR__ . '/functions.php';
    if (isPostRequest()) {
        $cropId = filter_input(INPUT_POST, 'cropId');
        deleteCrop ($cropId);

    }
    $crops = getCrops ();
    
?>
<div class="container">
        <div class="col-sm-offset-2 col-sm-10">
            <h1>Inventory</h1>
        <table class="table table-striped">
                <thead>
                    <tr>
    
                        
                        <th>Crop ID</th>
                        <th>Crop/Plant Name</th>
                        <th>Date Planted</th>
                        <th>Quantity</th>
                        
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
               
                
                <?php foreach ($crops as $row): ?>
                    <tr>
                        <td>
                            <form action="cropView.php" method="post">
                                    <input type="hidden" name="cropId" value="<?= $row['cropId']; ?>" />
                                    <button class="btn glyphicon glyphicon-trash" type="submit"></button>
                                    <?php echo $row['cropId']; ?>
                                </form>
                                
                                
                       </td>
                        
                        <td><?php echo $row['cropName']; ?></td> 
                        <td><?php echo $row['cropPlanted']; ?></td> 
                        <td><?php echo $row['cropQty'] ?></td> 
                        
                        <td><a href="editCrop.php?action=update&cropId=<?= $row['cropId'] ?>">Edit Crop Info</a></td> 
                        
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
<!-------------------------------------------------------END INVENTORY---------------------------------------------------------------------------------------------------->

</body>
</html>