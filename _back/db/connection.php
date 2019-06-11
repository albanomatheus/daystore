<?php

function connect($ip, $user, $password, $db) {
    $conn = new mysqli($ip, $user, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function insert($conn, $table, $json) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $arr = json_decode($json, true);
    $n = count($arr);
    $result = false;
    for ($i = 0; $i < $n; $i++) {
        $sql = "INSERT INTO {$table} (" . implode(",", array_keys($arr[$i])) . ") values ('" . implode("','", $arr[$i]) . "')";
        if ($conn->query($sql) === TRUE) {
            $result = true;
        } else {
            $result = false;
        }
    }

    return $result;
}

function delete($conn, $table, $who) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = false;

    if (is_array($who)) {
        foreach ($who as $key => $value) {
            $result = ($conn->query("DELETE FROM {$table} WHERE id={$value}")) ? true : false;
        }
    } else {
        $result = ($conn->query("DELETE FROM {$table} WHERE id={$who}")) ? true : false;
    }

    return $result;
}

function select($conn, $table, $condition) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM {$table} WHERE {$condition}";
    $res = $conn->query($sql);
    $arr = array();

    if ($res) {
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            array_push($arr, $row);
        }
    }

    return $arr;
}

$conn = connect("localhost", "matheus", "matheus123", "daystore");