
<style>
   th{
        color: maroon;
    }
    table{
       align-content: center;
        margin-left: 300px;
    }
  

</style>
<table class="table table-striped" >

<thead>
    <tr>
        <th>Crop Name</th>
        <th>Planted On</th>
        <th>Quantity</th>
        <th>Estimated Harvest</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($crops as $row): ?>
        <tr>
            <td><?php echo $row['cropName']; ?></td> 
            <td><?php echo $row['cropPlanted']; ?></td> 
            <td><?php echo $row['cropQty']; ?></td> 
            <td><?php echo $row['cropEstHarvest']; ?></td> 
        </tr>
    <?php endforeach; ?>
</tbody>
</table>