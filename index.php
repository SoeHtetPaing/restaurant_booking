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

?>

<?php require_once("./asset/layout/header.php"); ?>

        <div class="my-5 py-5 text-center"><h1 style="font-family: 'Dancing Script'; color: #fff;">Tasty &amp; Delicious Food</h1></div>
        <div class="row p-3">
        <div class="col-sm col-lg-6 offset-lg-3 p-3 rounded" style="background-color: rgba(112, 112, 112, 0.5);">
        <form action="./asset/php/search.php" method="POST">
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

<?php require_once('./asset/layout/footer.php');
