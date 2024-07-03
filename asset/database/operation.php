<?php 
    //select section
    function selectLocations ($database) { 
        $sql = "select * from restaurant_location;";
        $locations = $database->query($sql);
    
        return $locations;
    }

    function selectLocationById ($database, $id) {
        $sql = "select * from restaurant_location where id = '$id';";
        $location = $database->query($sql)->fetch_assoc();

        return $location;
    }

    function selectUserRoleByEmail ($database, $email) { 
        $sql = "select * from page_user where email='$email';";
        $user_role = $database->query($sql)->fetch_assoc();
    
        return $user_role;
    }

    function selectCustomerByEmail ($database, $email) {
        $sql = "select * from customer where email='$email';";
        $customer = $database->query($sql)->fetch_assoc();

        return $customer;
    }

    function selectRestaurantByEmail ($database, $email) {
        $sql = "select * from restaurant where email='$email';";
        $restaurant = $database->query($sql)->fetch_assoc();

        return $restaurant;
    }

    function selectRestaurantById ($database, $id) {
        $sql = "select * from restaurant where id='$id';";
        $restaurant = $database->query($sql)->fetch_assoc();

        return $restaurant;
    }

    function selectRestaurantByLocation ($database, $area) {
        $sql = "select * from restaurant where location = '$area';";
        $restaurants = $database->query($sql);

        return $restaurants;
    }

    function selectMenuByType ($database, $type) {
        $sql = "select * from restaurant_menu where type = '$type' order by rand() limit 7;";
        $menu = $database->query($sql);

        return $menu;
    }

    function selectMenuByRestaurant ($database, $type, $rid) {
        $sql = "select * from restaurant_menu where type = '$type' and rid='$rid';";
        $menu = $database->query($sql);

        return $menu;
    }

    function selectMenuById ($database, $mid) {
        $sql = "select * from restaurant_menu where mid = '$mid';";
        $menu = $database->query($sql)->fetch_assoc();

        return $menu;
    }

    function selectTable ($database, $rid) {
        $sql = "select * from restaurant_table where rid='$rid';";
        $table = $database->query($sql);

        return $table;
    }

    function selectTableById ($database, $tid) {
        $sql = "select * from restaurant_table where tid='$tid';";
        $table = $database->query($sql)->fetch_assoc();

        return $table;
    }

    function selectChair ($database, $tid) {
        $sql = "select * from restaurant_chair where tid='$tid';";
        $chair = $database->query($sql);

        return $chair;
    }

    function selectChairById ($database, $cid) {
        $sql = "select * from restaurant_chair where cid='$cid';";
        $chair = $database->query($sql)->fetch_assoc();

        return $chair;
    }

    // end select

    //insert section
    
    function insertCustomer ($database, $name, $email, $phone, $address, $password, $img){
        $sql = "insert into customer(name,email,phone,address, password, img) values('$name','$email','$phone','$address','$password','$img');";
        $success = $database->query($sql);

        return $success;
    }

    function insertPageUser ($database, $email, $role) {
        $sql = "insert into page_user values('$email', '$role');";
        $success = $database->query($sql);
        
        return $success;
    }

    function insertLocation ($database, $name) {
        $sql = "insert into restaurant_location (name) values ('$name');";
        $success = $database->query($sql);
        
        return $success;
    }

    function insertRestaurant ($database, $name, $email, $phone, $address, $area, $qr, $password, $img){
        $sql = "insert into restaurant(name,email,phone,address, location, imageqr, password, logo) values('$name','$email','$phone','$address', '$area', '$qr', '$password','$img');";
        $success = $database->query($sql);

        return $success;
    }

    function insertMenu ($database, $rid, $mname, $madeby, $type, $price, $photo) {
        $sql = "insert into restaurant_menu(rid,mname,madeby,type,price,photo) values('$rid','$mname','$madeby','$type','$price','$photo');";
        $success = $database->query($sql);

        return $success;
    }

    function insertTable ($database, $rid, $tname) {
        $sql = "insert into restaurant_table(rid,tname) values('$rid','$tname');";
        $success = $database->query($sql);

        return $success;
    }

    function insertChair ($database, $tid, $cno) {
        $sql = "insert into restaurant_chair(tid,cno) values('$tid','$cno');";
        $success = $database->query($sql);

        return $success;
    }

    function insertBooking ($database, $bid, $rid, $uid, $makedate, $maketime, $name, $phone, $bdate, $btime, $bill, $transaction) {
        $sql = "insert into booking(bid,rid,cid,makedate, maketime, name, phone, bdate, btime, bill,transaction) values ('$bid','$rid','$uid','$makedate','$maketime','$name','$phone','$bdate','$btime','$bill','$transaction');";
        $success = $database->query($sql);

        return $success;
    }

    function insertBookingChair ($database, $bid, $cid, $cno) {
        $sql = "insert into booking_chair(bid, cid, cno) values ('$bid','$cid','$cno');";
        $success = $database->query($sql);

        return $success;
    }

    function insertBookingMenu ($database, $bid, $mid, $qty) {
        $sql = "insert into booking_menu(bid, mid, qty) values ('$bid','$mid','$qty');";
        $success = $database->query($sql);

        return $success;
    }

    //insert end