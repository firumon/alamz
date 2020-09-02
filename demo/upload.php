<?php
    $name = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],$name);
    echo $name;


