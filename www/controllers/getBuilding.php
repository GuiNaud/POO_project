<?php

$building = new Save();
$query = $building->select('SELECT * FROM buildings');
$result["building"] = $query->fetchAll(PDO::FETCH_ASSOC);