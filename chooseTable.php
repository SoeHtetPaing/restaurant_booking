<!-- choose-table.php -->
<?php
if (isset($_POST['reservation'])) {
  $rid = $_POST['rid'];
  $reservation_name = $_POST['reservation_name'];
  $reservation_phone = $_POST['reservation_phone'];
  $reservation_date = $_POST['reservation_date'];
  $reservation_time = $_POST['reservation_time'];

?>

<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/creation.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
  
<?php require_once("./asset/layout/header.php"); ?>

          <div class="my-5 py-5 text-center">
            <h5><span class="text-light">Home/</span><span class="active-link">Tables</span></h5>
            <h1 style="font-family: 'Dancing Script'; color: #fff;">Choose Tables</h1>
          </div>
      </div>
</div>
         



    <section class="bg-light ftco-section py-5"  >
      <div class="container">
        <div class="text-center">
          <h6 class="text-muted">Our Tables</h6>
          <h2>Choose Your Table</h2>
        </div>

        <form action="chooseMenu.php" method="POST" class="my-5">
          <div class="row">
            <div class="col-md-12 dish-menu">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="row">
                      <?php
                        $result = selectTable($database, $rid);
                        $i = 0;

                        foreach ($result as $r) {
                          $tid = $r['tid'];
                      ?>
                      <div class="col-lg-3 position-relative" style="min-height: 190px">
                        <p style="font-weight: bold; padding: ">Table <?php echo @$i += 1 ?></p>
                        <nav class="menu2">
                          <input type="checkbox" id="restTable<?php echo $tid; ?>" name="table[]" value="<?php echo $tid; ?>" class="menu-toggler2 restTable"  data-id="<?php echo $tid; ?>">
                          <label for="menu-toggler2"></label>
                          <ul>
                            <?php
                              $result2 = selectChair($database, $tid);
                              foreach ($result2 as $r2) {
                                $cid = $r2['cid'];
                                $booked = false;
                                $cbbook = "select bc.id,bc.bid,bc.cid,bc.cno,b.bid,b.rid,b.bdate,b.btime
                                  from booking_chair as bc, booking as b
                                  where bc.bid = b.bid
                                  AND b.rid = '$rid'
                                  AND b.bdate = '$reservation_date'
                                  AND b.btime ='$reservation_time'
                                  AND bc.cid = '$cid';";
                                $cbbookresult = $database->query($cbbook);
                                if ($cbbookresult->num_rows > 0) {
                                  $booked = true;
                                }
                                if ($booked == true) {
                                ?>
                            <li class="menu-item2">
                              <input type="checkbox"  disabled="">
                            </li>
                                <?php } else{ ?>
                            <li class="menu-item2">
                              <input type="checkbox" name="chair[]" id="chair" value="<?php echo $r2['cid']; ?>">
                            </li>
                                <?php } ?>
                            <?php } ?>
                          </ul>
                        </nav>
                      </div>
                      <?php } ?>
                      <div class="col-lg-12 mt-3" style="text-align: center;">
                        <div class="form-group">
                          <input type="hidden" name="res_id" value="<?php echo $rid; ?>">
                          <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
                          <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
                          <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
                          <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
                          <p style="display:none;text-align: center;"  id="viewMenu">
                          <input type="submit" value="Confrirm" name="selectChair" class="btn btn-warning py-2 px-5" >
                        </p>
                        </div>
                      </div>
                </div><!-- END -->
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

<?php require_once("./asset/layout/footer.php"); ?>
<?php }else{

}
?>

<script type="text/javascript">
  // $(".restTable").click(function() {
  //   // body...
  //   var id = $(this).data("id");
  //   var tbl = document.getElementById("restTable"+id);
  //    var btnmenu = document.getElementById("viewMenu");

  //   // alert(tbl.checked);

  //    if (tbl.checked == true){
  //        btnmenu.style.display = "block";
  //     } else {
  //        btnmenu.style.display = "none";
  //     }

  // });

  $(document).ready(function(){
  $('input[type="checkbox"]').click(function(){
      // alert($('.menu:checked').length);

     var btnmenu = document.getElementById("viewMenu");
     var maxchecked = $('#chair:checked').length;
     // alert(maxchecked)
      if (maxchecked > 0 ) {
         btnmenu.style.display = "block";
      } else {
         btnmenu.style.display = "none";
      }


  });
});
</script>
