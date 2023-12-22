<?php

namespace app\controller;

include __DIR__ . '/../../vendor/autoload.php';

use app\model\Reservation;



class ReservationController
{

    public function addReservation($description,$reservation_date, $return_date, $user_id, $book_id)
    {
        $checkUser = new Reservation($description, $reservation_date,$return_date, $user_id, $book_id);
        $checkUser->createReservation();

    }
    public function AllReservation()
    {

        $allUsers = new Reservation(null, null,null,null, null);
        return   $allUsers->getAllReservation();
        // var_dump($allUsers->getAllUsers());
    }

    public function userReservation($user_id)
    {
        $allUsers = new Reservation(null, null,null,$user_id, null);
        return   $allUsers->getUserReservation();
        // var_dump($allUsers->getAllUsers());
    }

    public function returnBook($reservation_id,$book_id)
    {
        $allUsers = new Reservation(null, null,null,$book_id, $reservation_id);
        $allUsers->returnReservation();

    }
}





if (isset($_POST['reserve'])) {
    extract($_POST);
    $reservation_date=date('Y-m-d');
    $registerController = new ReservationController();
    $registerController->addReservation($description,$reservation_date, $return_date, $user_id, $book_id);
    // echo 'hello';
    header("location:../../views/client/home/index.php");
}

if (isset($_POST['returned'])) {
    extract($_POST);
    $registerController = new ReservationController();
    $registerController->returnBook( $book_id, $reservation_id);
    header("location:../../views/admin/reservation/index.php");
}

