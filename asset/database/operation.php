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

    function selectCustomerById ($database, $id) {
        $sql = "select * from customer where id='$id';";
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

    function checkMenu ($database, $rid, $mname, $price) {
        $sql =  "select * from restaurant_menu where rid = '$rid' and mname='$mname' and price='$price';";
        $check = $database->query($sql)->fetch_assoc();

        return $check;
    }

    function selectMenu ($database, $rid) {
        $sql = "select * from restaurant_menu where rid='$rid';";
        $menu = $database->query($sql);

        return $menu;
    }

    function selectTable ($database, $rid) {
        $sql = "select * from restaurant_table where rid='$rid';";
        $table = $database->query($sql);

        return $table;
    }

    function getTableId ($database) {
        $sql = "select count(tid) as tid from restaurant_table;";
        $tid = $database->query($sql)->fetch_assoc();

        return $tid;
    }

    function selectLastInsertTable ($database, $rid) {
        $sql = "select * from restaurant_table where rid='$rid' order by tname desc limit 1;";
        $table = $database->query($sql)->fetch_assoc();

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

    function selectChairByCno ($database, $cno) {
        $sql = "select * from restaurant_chair where cno='$cno';";
        $chair = $database->query($sql)->fetch_assoc();

        return $chair;
    }

    function selectBookingByRestaurantId ($database, $rid) {
        $sql = "select * from booking where rid='$rid' order by makedate desc;";
        $booking = $database->query($sql);

        return $booking;
    }

    function selectBookingByCustomerId ($database, $cid) {
        $sql = "select * from booking where cid='$cid' order by makedate desc;";
        $booking = $database->query($sql);

        return $booking;
    }

    function selectBookingById ($database, $bid) {
        $sql = "select * from booking where bid='$bid';";
        $booking = $database->query($sql)->fetch_assoc();

        return $booking;
    }

    function selectBookingChair ($database, $bid) {
        $sql = "select bc.bid,bc.cno,rt.tname from booking_chair as bc, restaurant_chair as rc,restaurant_table as rt where bc.cid = rc.cid and rc.tid = rt.tid and bc.bid ='$bid';";
        $chair = $database->query($sql);

        return $chair;
    }

    function selectBookingMenu ($database, $bid) {
        $sql = "select bm.bid,bm.qty,rm.mname,rm.price from booking_menu as bm, restaurant_menu as rm where bm.mid = rm.mid and bm.bid ='$bid';";
        $menu = $database->query($sql);

        return $menu;
    }

    function filterData ($database, $sql) {
        $filter = $database->query($sql);

        return $filter;
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

    function insertBooking ($database, $bid, $rid, $uid, $makedate, $maketime, $name, $phone, $bdate, $btime, $bill, $transaction, $status, $reject) {
        $sql = "insert into booking(bid,rid,cid,makedate, maketime, name, phone, bdate, btime, bill,transaction,status,reject_reason) values ('$bid','$rid','$uid','$makedate','$maketime','$name','$phone','$bdate','$btime','$bill','$transaction', '$status','$reject');";
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

    //update start

    function updateRestaurant ($database, $sql) {
        $success = $database->query($sql);

        return $success;
    }

    function updateBooking ($database, $sql) {
        $success = $database->query($sql);

        return $success;
    }

    //update end

    //delete strat

    function deleteChair ($database, $cid) {
        $sql = "delete from restaurant_chair where cid ='$cid';";
        $success = $database->query($sql);

        return $success;
    }

    function deleteChairByTable ($database, $tid) {
        $sql = "delete from restaurant_chair where tid ='$tid';";
        $success = $database->query($sql);

        return $success;
    }

    function deleteTable ($database, $tid) {
        $sql = "delete from restaurant_table where tid ='$tid';";
        $success = $database->query($sql);

        return $success;
    }

    function deleteMenu ($database, $mid) {
        $sql = "delete from restaurant_menu where mid ='$mid';";
        $success = $database->query($sql);

        return $success;
    }

    //delete end