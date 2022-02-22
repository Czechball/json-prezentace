<?php

include "pdo_connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 0);

function get_all($dbHandle, $dbTable) {
    $sql = "SELECT * FROM $dbTable where id = 1";
    $stmt = $dbHandle->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['db_table']) AND !empty($_POST['db_table'])) {
    try {
        $db_table = htmlspecialchars(strip_tags($_POST['db_table']));

        $data = get_all($dbHandle, $db_table);

        echo json_encode($data, JSON_FORCE_OBJECT);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    } catch (\Error $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
    
} else {
    echo json_encode(["error" => "POST variable db_table is empty"]);
}