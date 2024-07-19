<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/creation.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php
    //run once time
    // insertLocation($database, "Yangon");
    // insertLocation($database, "Mandalay");
    // insertLocation($database, "Bagan");
    // insertLocation($database, "Pyay");
    // insertLocation($database, "Pyin Oo Lwin");

    // insertRestaurant($database, "ဟုန်စိန်", "hongsein.pyay@gmail.com", "09790910282", "ဆေးရုံကြီးနောက်ကျောလမ်း, အောင်ဆန်းပြည်သာယာတိုးချဲ့(၁)လမ်းအနီး, ပြည်မြို့", 4, "default-qr.jpg", '$2y$10$kF6xAFkIpJjUGVs9taRP2OmqUr4JnBGtb5CJXR8ej0b7GWywnIPvi', "hongseinpyay.jpg");
    // insertRestaurant($database, "ဟုန်စိန်", "hongsein.mdy@gmail.com", "09953471445", "၅၈လမ်း, ၁၁၈×၁၁၉ကြား, မန္တလေးမြို့", 2, "default-qr.jpg", '$2y$10$kF6xAFkIpJjUGVs9taRP2OmqUr4JnBGtb5CJXR8ej0b7GWywnIPvi', "hongseinmdy.jpg");
    // insertRestaurant($database, "ပေါက်ကြီး", "poukgyi.pyay@gmail.com", "09423664342", "ဗိုလ်ချုပ်လမ်း, KBZ bank 2 အနား, စည်တော်မင်္ဂလာပေါက်အနီး, ပြည်မြို့", 4, "default-qr.jpg", '$2y$10$kF6xAFkIpJjUGVs9taRP2OmqUr4JnBGtb5CJXR8ej0b7GWywnIPvi', "poukgyi.jpg");

    // insertPageUser($database, "hongsein.pyay@gmail.com", 'r');
    // insertPageUser($database, "hongsein.mdy@gmail.com", 'r');
    // insertPageUser($database, "poukgyi.pyay@gmail.com", 'r');

    // insertMenu($database, 1, "ပင်လယ်စာ ဗန်းကြီး", "ဗမာ", "Main", 25000, "m1.jpg");
    // insertMenu($database, 1, "ပင်လယ်စာဗန်း", "ဗမာ", "Main", 20000, "m2.jpg");
    // insertMenu($database, 1, "မာလာငါးပေါင်း", "ဗမာ", "Main", 12000, "m3.jpg");
    // insertMenu($database, 1, "သုံးထပ်သားစတူးထမင်းပေါင်း", "ဗမာ", "Main", 2500, "m4.jpg");
    // insertMenu($database, 1, "ပင်လယ်စာသုတ်", "ဗမာ", "Main", 7000, "m5.jpg");

    // insertMenu($database, 2, "အသားလုံးပြောင်းဖူးထောင်း", "ဗမာ", "Main", 3000, "m6.jpg");
    // insertMenu($database, 2, "မောက်ချိုက်", "တရုတ်", "Main", 3000, "m7.jpg");
    // insertMenu($database, 2, "ဝက်နားရွက်သုပ်", "ဗမာ", "Main", 4000, "m8.jpg");
    // insertMenu($database, 2, "Seafood မာလာရှမ်းကော", "တရုတ်", "Main",7000, "m9.jpg");
    // insertMenu($database, 2, "ဝက်စပ်ကြွပ်ကြော်", "ဗမာ", "Main", 5000, "m10.jpg");

    // insertMenu($database, 1, "နံရိုးမီးတောက်", "ဗမာ", "Main", 10000, "m11.jpg");
    // insertMenu($database, 2, "အာလူးချောင်းကြော်", "ဗမာ", "Main", 2500, "m12.jpg");

    // insertMenu($database, 3, "Icecream ဘူးသေး", "ဗမာ", "Dessert", 1000, "m13.jpg");
    // insertMenu($database, 3, "Icecream အလတ်", "ဗမာ", "Dessert", 2600, "m14.jpg");
    // insertMenu($database, 3, "Icecream ၃လုံးဘူး", "ဗမာ", "Dessert", 1200, "m15.jpg");
    // insertMenu($database, 3, "Icecream အရော", "ဗမာ", "Dessert", 1200, "m16.jpg");
    // insertMenu($database, 3, "ပေါင်မုန့်ရေခဲညှပ်", "ဗမာ", "Dessert", 2200, "m17.jpg");

    // insertMenu($database, 3, "၂ဆင့်ရေခဲမုန့်", "ဗမာ", "Dessert", 1200, "m18.jpg");
    // insertMenu($database, 3, "၃ကိတ်တွဲ set-1", "ဗမာ", "Main", 2400, "m19.jpg");
    // insertMenu($database, 3, "၄ကိတ်တွဲ", "ဗမာ", "Main", 3000, "m20.jpg");
    // insertMenu($database, 3, "၃ကိတ်တွဲ set-2", "ဗမာ", "Main", 2500, "m21.jpg");
    // insertMenu($database, 3, "Roll ကိတ်", "ဗမာ", "Main", 1500, "m22.jpg");
    
    // insertMenu($database, 3, "မနီလာပူတင်း", "ဗမာ", "Main", 1300, "m23.jpg");
    // insertMenu($database, 3, "ချိစ်ကိတ်", "ဗမာ", "Main", 1500, "m24.jpg");
    // insertMenu($database, 3, "ကျောက်ကျောကိတ်", "ဗမာ", "Dessert", 2000, "m25.jpg");


    // insertCustomer($database, "Lwin Lwin Phyo Ei", "lwinlwinphyoei@gmail.com", "09123456789", "Pyay", '$2y$10$kF6xAFkIpJjUGVs9taRP2OmqUr4JnBGtb5CJXR8ej0b7GWywnIPvi', "llpe.jpg");
    // insertPageUser($database, "lwinlwinphyoei@gmail.com", 'c');

    // insertTable($database, 1, "T1C3");
    // insertTable($database, 1, "T2C3");
    // insertTable($database, 1, "T3C2");
    // insertTable($database, 1, "T4C5");
    // insertTable($database, 2, "T1C5");
    // insertTable($database, 2, "T2C5");
    // insertTable($database, 3, "T1C1");
    // insertTable($database, 3, "T2C2");
    // insertTable($database, 3, "T3C4");

    // insertChair($database, 1, "T1C3-1");
    // insertChair($database, 1, "T1C3-2");
    // insertChair($database, 1, "T1C3-3");

    // insertChair($database, 2, "T2C3-1");
    // insertChair($database, 2, "T2C3-2");
    // insertChair($database, 2, "T2C3-3");

    // insertChair($database, 3, "T3C2-1");
    // insertChair($database, 3, "T3C2-2");

    // insertChair($database, 4, "T4C5-1");
    // insertChair($database, 4, "T4C5-2");
    // insertChair($database, 4, "T4C5-3");
    // insertChair($database, 4, "T4C5-4");
    // insertChair($database, 4, "T4C5-5");

    // insertChair($database, 5, "T1C5-1");
    // insertChair($database, 5, "T1C5-2");
    // insertChair($database, 5, "T1C5-3");
    // insertChair($database, 5, "T1C5-4");
    // insertChair($database, 5, "T1C5-5");

    // insertChair($database, 6, "T2C5-1");
    // insertChair($database, 6, "T2C5-2");
    // insertChair($database, 6, "T2C5-3");
    // insertChair($database, 6, "T2C5-4");
    // insertChair($database, 6, "T2C5-5");

    // insertChair($database, 7, "T1C1-1");

    // insertChair($database, 8, "T2C2-1");
    // insertChair($database, 8, "T2C2-2");

    // insertChair($database, 9, "T3C4-1");
    // insertChair($database, 9, "T3C4-2");
    // insertChair($database, 9, "T3C4-3");
    // insertChair($database, 9, "T3C4-4");

?>

<?php require_once("./asset/layout/header.php"); ?>

        <div class="my-5 py-5 text-center"><h1 style="font-family: 'Dancing Script'; color: #fff;">Tasty &amp; Delicious Food</h1></div>
        <div class="row p-3">
        <div class="col-sm col-lg-6 offset-lg-3 p-3 rounded" style="background-color: rgba(112, 112, 112, 0.5);">
        <form action="./searchRestaurant.php" method="POST">
                <div class="text-center">
                    <span style="font-size: 20px; color: #000">Location</span>
                    <select name="area" name="area" required=""  style="cursor: pointer;" class="form-control-sm">
                        <option value="" class="text-muted">Select :</option>
                        <?php 
                            $locations = selectLocations($database);
                            foreach ($locations as $location) { ?>
                        <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                        <?php    }?>
                    </select>
                    <button class="btn btn-sm btn-dark" type="submit"><i class="fa-solid fa-search"></i></button>
                </div>  
              </form>
        </div>
        </div>
    </div>
</div>


<div class="row" style="background-image: url('./asset/img/restaurant_icons.png')">
    <div class="col-sm col-lg-6 offset-lg-3 my-5">
        <ul class="nav nav-pills nav-fill w-75 mx-auto">
            <li class="nav-item me-1">
              <a class="nav-link fs-6 py-3 active" id="fill-tab-0" data-bs-toggle="pill" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"><i class="fa-solid fa-pizza-slice fa-lg me-3" style="color: #fbe183;"></i>Main</a>
            </li>
            <li class="nav-item me-1">
              <a class="nav-link fs-6 py-3" id="fill-tab-0" data-bs-toggle="pill" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="true"><i class="fa-solid fa-ice-cream fa-lg me-3" style="color: #adf5df;"></i>Dessert</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-6 py-3" id="fill-tab-0" data-bs-toggle="pill" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="true"><i class="fa-solid fa-champagne-glasses fa-lg me-3" style="color: #e6e4ec;"></i>Drink</a>
            </li>
        </ul>
        <div class="tab-content my-3" id="tab-content">
          <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
            <?php 
                $menus = selectMenuByType($database, "Main");

                foreach ($menus as $menu) {
                    $restaurant = selectRestaurantById($database, $menu["rid"]);
                    echo '
                                
                    <div class="menu-list rounded p-2 px-3 d-flex justify-content-between mb-3">
                        <div class="d-flex">
                            <div class="rounded-circle" style="width: 80px; height: 80px; background-image: url(./asset/upload/'.$menu["photo"].'); background-size: cover; background-position: center;"></div>
                            <div class="ms-3 pt-2">
                                <h5>'.$menu["mname"].'</h5>
                                <p class="text-black-50">'.$restaurant["address"].'</p>
                            </div>
                        </div>
                        <div class="pt-2">
                            <h5>'.$menu["price"].' Ks</h5>
                        </div>
                    </div>
                ';
                }
            
            ?>
          </div>
          <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
          <?php 
                $menus = selectMenuByType($database, "Dessert");

                foreach ($menus as $menu) {
                    $restaurant = selectRestaurantById($database, $menu["rid"]);
                    echo '
                                
                    <div class="menu-list rounded p-2 px-3 d-flex justify-content-between mb-3">
                        <div class="d-flex">
                            <div class="rounded-circle" style="width: 80px; height: 80px; background-image: url(./asset/upload/'.$menu["photo"].'); background-size: cover; background-position: center;"></div>
                            <div class="ms-3 pt-2">
                                <h5>'.$menu["mname"].'</h5>
                                <p class="text-black-50">'.$restaurant["address"].'</p>
                            </div>
                        </div>
                        <div class="pt-2">
                            <h5>'.$menu["price"].' Ks</h5>
                        </div>
                    </div>
                ';
                }
            
            ?>
          </div>
          <div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
          <?php 
                $menus = selectMenuByType($database, "Drink");

                foreach ($menus as $menu) {
                    $restaurant = selectRestaurantById($database, $menu["rid"]);
                    echo '
                                
                    <div class="menu-list rounded p-2 px-3 d-flex justify-content-between mb-3">
                        <div class="d-flex">
                            <div class="rounded-circle" style="width: 80px; height: 80px; background-image: url(./asset/upload/'.$menu["photo"].'); background-size: cover; background-position: center;"></div>
                            <div class="ms-3 pt-2">
                                <h5>'.$menu["mname"].'</h5>
                                <p class="text-black-50">'.$restaurant["address"].'</p>
                            </div>
                        </div>
                        <div class="pt-2">
                            <h5>'.$menu["price"].' Ks</h5>
                        </div>
                    </div>
                ';
                }
            
            ?>
          </div>
        </div>
    </div>

    <div class="col-sm col-lg-8 offset-lg-2 mb-5 text-justify"> 
           
            <h3 class="text-center text-food">Our Specialties</h3> 
            Usually, we're all about getting out more. But these are unprecedented times. <br/>

            We intend to do everything we can to support our restaurant partners in what is an extremely challenging time for the industry. Please remember that supporting restaurants does not necessarily mean dining out right now, and we would encourage our users to look out for any opportunity to do this - whether that is through buying vouchers to use at a later date, or ordering delivery. If you choose to spread the word on social media around how you’re supporting restaurants, please do let us know and we’ll continue to amplify these messages wherever we’re able.<br/>

            You can access the most up to date information surrounding COVID-19 via the World Health Organization, as well as the government's website. We’d urge our entire dining community to keep themselves informed at this time.
    </div>

</div>

<?php require_once('./asset/layout/footer.php'); ?>
