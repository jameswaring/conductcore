<?php
    $client = new MongoDB\Client('mongodb+srv://james:conductcore123!@primarycluster.hgyaj.mongodb.net/<dbname>?retryWrites=true&w=majority');
    return($client);
?>