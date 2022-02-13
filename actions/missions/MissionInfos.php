<?php

require('actions/database.php');



$getAllMissions = $bdd->query('SELECT * FROM mission



ORDER BY mission.id ASC ');

