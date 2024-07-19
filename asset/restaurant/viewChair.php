<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>

<?php include '../layout/restaurant.header.php'; 
    if (!isset($_SESSION['isLoggedIn'])) {
    	echo '<script>window.location="../../login.php"</script>';
    }

	if (isset($_POST['addChair'])) {
		$cno = $_POST['cno'];
		$tid = $_GET['tid'];
        $tname = $_GET['tname'];

        $is_exit = selectChairByCno($database, $cno);
        // var_dump($is_exit);

        if($is_exit == null) {
            $success = insertChair($database, $tid, $cno);

            if ($success) {
                // echo '<script>alert("Chair added successfully")</script>';
				echo '<script>window.location.href ="viewChair.php?tid='.$tid.'&tname='.$tname.'";</script>';
            }

	    } else {
			echo '<script>alert("Chair number already exist in this name!")</script>';
		}

    }
?>
		<section class="body">

			<!-- start: header -->
			<?php include '../layout/restaurant.navbar.php'; ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include '../layout/restaurant.sidebar.left.php'; ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header" style="background-color: #374151;">
						<h2 style="font-family: 'Dancing Script'; font-size: 20px;">Chair List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./index.php">
										<i class="fa-solid fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Chairs</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa-solid fa-chevron-left" style="position: absolute; top: 18px; font-size: 12px;"></i></a>
						</div>
					</header>

                        <!-- start: page -->

                        <section class="panel">
                            <a href="./tableList.php" style="text-decoration: none; color: #0088CC;"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a><br><br>

							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa-solid fa-caret-down"></a>
									<a href="#" class="fa-solid fa-times"></a>
								</div>
								<h2 class="panel-title">All Chairs
							        &emsp;<a href="#exampleModal" class="btn btn-success"  data-toggle="modal"><i class="fa-solid fa-plus"></i>&emsp;Add</a>
                                </h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>No</th>
											<th>Chair No</th>
											<th class="hidden-phone">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$count = 1;
										$tid = $_GET['tid'];
                                        $tname = $_GET['tname'];

										$result = selectChair($database, $tid);

										foreach ($result as $r) {
										?>
										<tr class="gradeX">
											<td class="center hidden-phone"><?php echo $count; ?></td>
											<td><?php echo $r['cno']; ?></td>
											<td class="center hidden-phone">
												<a href="deleteChair.php?cid=<?php echo $r['cid'];?>&tid=<?php echo $tid;?>&tname=<?php echo $tname;?>" class="btn btn-danger"  onclick="if (!Done()) return false; ">Delete Chair</a>
											</td>
										</tr>
										<?php $count++; } ?>
									</tbody>
								</table>
							</div>
						</section>
						
						
					<!-- end: page -->

                    </section>
			</div>

			<?php include '../layout/restaurant.sidebar.right.php'; ?>
		</section>
		<script type="text/javascript">
	       function Done(){
	         return confirm("Are you sure?");
	       }
   		</script>

<?php include '../layout/restaurant.footer.php'; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        <h5 class="modal-title" id="exampleModalLabel">Add Chair</h5>
		      </div>
		      <form action="" method="POST">
		      <div class="modal-body">
		        <div class="form-group">
		        	<label>Enter chair no. (<span class="text-danger">Eg. <?php echo $_GET['tname']; ?>-1</span>)</label>
		        	<input type="text" name="cno" required="" class="form-control" value="<?php echo $_GET['tname']; ?>-">
		    	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <input type="submit" name="addChair" class="btn btn-primary" value="Add Chair">
		      </div>
		  	  </form>
		    </div>
		  </div>
</div>