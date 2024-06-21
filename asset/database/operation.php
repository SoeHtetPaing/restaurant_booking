<?php 
    //select section
    function selectLocations ($database) { 
        $sql = "select * from restaurant_location;";
        $locations = $database->query($sql);
    
        return $locations;
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

    function insertRestaurant ($database, $name, $email, $phone, $address, $area, $password, $img){
        $sql = "insert into restaurant(name,email,phone,address, location, password, logo) values('$name','$email','$phone','$address', '$area', '$password','$img');";
        $success = $database->query($sql);

        return $success;
    }

    //insert end