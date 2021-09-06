
--below is mostly user input, cropEstHarvest  & cropEstSell would be auto based on cropName
CREATE TABLE IF NOT EXISTS cropsInventory (
	cropId INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        cropName VARCHAR(50) DEFAULT NULL, --name chosen on dropdown
        cropPlanted DATE, --date planted
        cropEstHarvest DATE, --estimated harvest date
        cropQty INT, --how many of said plant
        
        
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;


