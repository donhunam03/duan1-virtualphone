<?php
function insert_bill($bill_code, $id_user, $user_name, $full_name, $address, $phone, $email, $payment, $order_date, $total_amount)
{
    $sql = "INSERT INTO bill(bill_code,id_user, user_name, full_name, address, phone, email, payment, order_date, total_amount) values ('$bill_code','$id_user','$user_name', '$full_name', '$address', '$phone', '$email', '$payment', '$order_date',' $total_amount')";
    return pdo_execute_return_lastInsertId($sql);

}
function loadone_bill($id_bill)
{
    $sql = "SELECT * FROM bill WHERE id_bill=" . $id_bill;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_bill($id_user)
{
    $sql = "SELECT * FROM bill WHERE id_user =" . $id_user;
    $listbill = pdo_query($sql);
    return $listbill;
}
function load_cart_all($idbill) {
    $sql = "SELECT * FROM `cart` WHERE id_bill=".$idbill;
    $ab = pdo_query($sql);
    return $ab;
}

/// check

function history_bill($id_user){
    $sql = "SELECT * FROM `bill` WHERE id_user = $id_user ORDER BY order_date DESC";
    return pdo_query($sql);
}

function detail_bill($id){
    $sql = "SELECT * FROM `bill` WHERE id_bill = $id";
    return pdo_query_one($sql);
}

function detail_cart($id){
    $sql = "SELECT * FROM `cart` WHERE id_bill = $id";
    return pdo_query($sql);
}

function update_deleted($id){
    $sql = "UPDATE `bill` SET `status`= 0 WHERE id_bill = $id";
    return pdo_execute($sql);
}
function create_new($id){
    $sql = "UPDATE `bill` SET `status`= 1 WHERE id_bill = $id";
    return pdo_execute($sql);
}
function success_bill($id){

    $sql = "UPDATE `bill` SET `status`= 5 WHERE id_bill = $id";

    return pdo_execute($sql);
}

function get_stt($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lí";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao hàng";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
?>