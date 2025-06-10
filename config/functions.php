<?php

use BcMath\Number;

session_start();

include_once 'config.php';


function connect()
{
    try {
        $conn = mysqli_connect(HOST, USER, PASSWORD, DB);
        return $conn;
    } catch (Exception $e) {
        header("Location: error.php");
        die();
    }
}

function adduser($name, $email, $password, $address)
{
    $conn = connect();
    if (!$conn) {
        return false;
    }
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $address = mysqli_real_escape_string($conn, $address);

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password, address) VALUES ('$name', '$email', '$password_hash', '$address')";

    try {
        mysqli_query($conn, $query);
    } catch (Exception $e) {
        return false;
    }

    mysqli_close($conn);
    return true;
}
function getUsers()
{
    $conn = connect();

    $query = "SELECT * FROM users ORDER BY userID ASC";

    $result = mysqli_query($conn, $query);

    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $array;
}

function login($email, $password)
{
    $conn = connect();

    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['logged'] = true;
            $_SESSION['role'] = $row['role'];
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['name'] = $row['name'];


            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function logout()
{
    unset($_SESSION['logged']);
    unset($_SESSION['role']);
    unset($_SESSION['userID']);
    unset($_SESSION['name']);
    unset($_SESSION['cart']);
}

function isLogged()
{
    return $_SESSION['logged'] ?? false;
}
function getUserName()
{
    if (isLogged()) {
        return ($_SESSION['name'] ?? false);
    }
}

function isAdmin()
{
    if (isLogged()) {
        return ($_SESSION['role'] == 'admin');
    } else {
        return false;
    }
}

function addProduct($name, $description, $price, $image)
{
    $conn = connect();

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO products (name, description, price) VALUES (?,?,?)"
    );

    mysqli_stmt_bind_param($stmt, "ssd", $name, $description, $price);
    mysqli_stmt_execute($stmt);

    $id = mysqli_insert_id($conn);


    //Now I will save the image
    if (getimagesize($image['tmp_name'])) {
        move_uploaded_file($image['tmp_name'], "../images/products/$id.png");
    } else {
        mysqli_query($conn, "DELETE FROM products WHERE productID=$id");
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function getProducts($page, $withDeleted = false)
{
    $conn = connect();
    $offset = $page * PAGE_SIZE;
    $limit = PAGE_SIZE;

    $limitAdmin = PAGE_SIZE * 2;
    $offsetAdmin = $page * $limitAdmin;

    $page = mysqli_real_escape_string($conn, $page);

    if ($withDeleted) {
        $query = "SELECT * FROM products ORDER BY name ASC LIMIT $offsetAdmin, $limitAdmin";
    } else {
        $query = "SELECT * FROM products WHERE deleted=0 ORDER BY name ASC LIMIT $offset, $limit";
    }


    $result = mysqli_query($conn, $query);

    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $array;
}

function getOneProduct($id)
{
    $conn = connect();
    $id = mysqli_escape_string($conn, $id);
    if (!is_numeric($id)) {
        header("Location: error.php");
    }

    $query = "SELECT * FROM products WHERE productID = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
    } else {
        $row = null;
    }

    mysqli_close($conn);

    return $row;
}

function addToCart($id)
{
    $cart = $_SESSION['cart'] ?? [];

    if (isset($cart[$id])) {
        $cart[$id]++;
    } else {
        $cart[$id] = 1;
    }

    $_SESSION['cart'] = $cart;
}

function getCart()
{
    return $_SESSION['cart'] ?? [];
}
function getCartSize()
{

    $cart = $_SESSION['cart'] ?? [];

    $size = 0;
    foreach ($cart as $value) {
        $size = $size + $value;
    }
    return $size;
}
function deleteCart()
{
    unset($_SESSION['cart']);
}

function editProduct($id, $name, $description, $price, $image)
{
    $conn = connect();

    $query = "UPDATE products SET name=?, description=?, price=?, date=NOW() WHERE productID=?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "ssdi", $name, $description, $price, $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if ($image and getimagesize($image['tmp_name'])) {
        move_uploaded_file($image['tmp_name'], "../images/products/$id.png");
    }
}

function deleteProduct($id)
{
    $conn = connect();

    $query = "UPDATE products SET deleted=1 WHERE productID=$id";

    mysqli_query($conn, $query);
    mysqli_close($conn);
}
function unDeleteProduct($id)
{
    $conn = connect();

    $query = "UPDATE products SET deleted=0 WHERE productID=$id";

    mysqli_query($conn, $query);
    mysqli_close($conn);
}
function goAwayIsNotAdmin($where)
{
    if (!isAdmin()) {
        $where = urldecode($where);
        header("Location: ../login.php?redirect=$where");
        die();
    }
}
// shut store the info with shut be presented later
function addInfo($info)
{

    $old_info =  $_SESSION['info'] ?? [];
    $old_info[] = $info;
    $_SESSION['info'] = $old_info;
}
//add to the pay addinfo("the product was added to the cart")
function getInfo()
{
    $old_info =  $_SESSION['info'] ?? [];
    $out = "";
    foreach ($old_info as $item) {
        $out = $out . "<div>$item</div>";
    }
    unset($_SESSION['info']);
    return $out;
}
// add to the index.php getInfo();

function setUserAdmin($id)
{
    $conn = connect();
    $query = "UPDATE users SET role='admin' WHERE userID=$id";

    mysqli_query($conn, $query);
    mysqli_close($conn);
}
function setAsUser($id)
{

    $conn = connect();
    $query = "UPDATE users SET role='user' WHERE userID=$id";

    mysqli_query($conn, $query);
    mysqli_close($conn);
}
function getUserId()
{
    if (isLogged()) {
        return ($_SESSION['userID'] ?? false);
    }
}
function saveOrder()
{
    $conn = connect();
    $cart = getCart();
    $userID = getUserId();

    $query = "INSERT INTO orders (userID) VALUES ($userID)";
    mysqli_query($conn, $query);

    //var_dump($query);
    // die();

    $orderID = mysqli_insert_id($conn);
    foreach ($cart as $productID => $amount) {
        $query = "INSERT INTO order_details
         (orderID, productID, amount) VALUES ($orderID, $productID, $amount )";
        mysqli_query($conn, $query);
    }

    mysqli_close($conn);

    deleteCart();
}
function getOrders($userID = false)
{
    $userID = $userID ? $userID : $_SESSION['userID']; // if the user id is true give it if not set it
    $conn = connect();

    $query = "SELECT orders.*, order_details.*, products.price, products.name FROM orders 
              LEFT JOIN order_details ON orders.orderID = order_details.orderID
              lEFT JOIN products ON order_details.productID = products.productID
              WHERE userID = '$userID'
             ORDER BY orders.orderID";

    $result = mysqli_query($conn, $query);
    $allRows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $out = [];

    foreach ($allRows as $row) {
        if (!isset($out[$row['orderID']])) {
            $out[$row['orderID']] = [];
        }

        $out[$row['orderID']]['orders'] = [
            'date' => $row['date'],
            'status' => $row['status'],
        ];

        $out[$row['orderID']]['order_details'][] = [
            'name' => $row['name'],
            'price' => $row['price'],
            'amount' => $row['amount'],
        ];
    }
    mysqli_close($conn);
    return $out;
}

function getOrdersForAdmin()
{
    $conn = connect();

    $query = "SELECT users.*, orders.*, order_details.*, products.price, products.name FROM orders 
              LEFT JOIN order_details ON orders.orderID = order_details.orderID
              lEFT JOIN products ON order_details.productID = products.productID  
              LEFT JOIN users ON orders.userID = users.userID            
             ORDER BY orders.orderID";

    $result = mysqli_query($conn, $query);
    $allRows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $out = [];

    foreach ($allRows as $row) {
        if (!isset($out[$row['orderID']])) {
            $out[$row['orderID']] = [];
        }

        $out[$row['orderID']]['orders'] = [
            'date' => $row['date'],
            'status' => $row['status'],
            'orderID' => $row['orderID'],
        ];

        $out[$row['orderID']]['order_details'][] = [
            'name' => $row['name'],
            'price' => $row['price'],
            'amount' => $row['amount'],
        ];
        $out[$row['orderID']]['users'] = [
            'email' => $row['email'],
        ];
    }
    mysqli_close($conn);
    return $out;
}

function saveStatus($id, $status)
{
    $conn = connect();

    //$query = "UPDATE orders SET status=$status WHERE orderID=$id";
    $query = " UPDATE `orders` SET `status`='$status' WHERE orderID=$id";
   // var_dump($query);
    //die();
    mysqli_query($conn, $query);
    mysqli_close($conn);
}
