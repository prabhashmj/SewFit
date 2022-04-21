<?php
include '../includes/connect.php';
	foreach ($_POST as $key => $value) {
        if (preg_match("/[0-9]+_name/", $key)) {
            if ($value != '') {
                $key = strtok($key, '_');
                $value = htmlspecialchars($value);
                $sql = "UPDATE items SET name = '$value' WHERE id = $key;";
                $con->query($sql);
            }
        }
        if (preg_match("/[0-9]+_price/", $key)) {
            $key = strtok($key, '_');
            $sql = "UPDATE items SET price = $value WHERE id = $key;";
            $con->query($sql);
        }
        if (preg_match("/[0-9]+_hide/", $key)) {
            if ($_POST[$key] == 1) {
                $key = strtok($key, '_');
                $sql = "UPDATE items SET deleted = 0 WHERE id = $key;";
                $con->query($sql);
            } else {
                $key = strtok($key, '_');
                $sql = "UPDATE items SET deleted = 1 WHERE id = $key;";
                $con->query($sql);
            }
        }
        if (preg_match("/[0-9]+_measurements/", $key)) {
//            echo '<pre>'.print_r($value,1);die();
            if ($value != '') {
                $key = strtok($key, '_');
                $value=implode(",",$value);
                $value = htmlspecialchars($value);

//                echo '<pre>'.print_r($value,1);die();

                $sql = "UPDATE items SET measurements = '$value' WHERE id = $key;";
                $con->query($sql);
            }
        }
    }
header("location: ../admin-page.php");
