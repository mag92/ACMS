 
        <!-- Projects Row -->
        <!-- /.row -->
      <div class=" col-lg-12 text-center" id="app-btn" style="width:100%; text-align:center">
            <div class="row" style="margin-bottom: 20px">
                <button class="btn btn-primary"> Download App <span class="glyphicon glyphicon-download-alt"></span></button>
            </div>
        </div>
      

        <!-- Pagination -->
       <div class="col-md-6 portfolio-item" style="width:100%">
            <?php 
            foreach ($announcements as $announcement)
            {
                ?>
            
            <div class="box box-danger">
                <div class="announcement">
                    <p style="display:inline;"><small>Sent to: </small> <?php echo $announcement->coursename; ?></p>
                    <p style="float:right; font-size:15px; margin-right:10px;"><?php echo $announcement->datetime; ?></p><br />
                    <p style="font-size:20px;"><?php echo $announcement->body; ?></p>
                </div>
            </div><!-- /.box -->
           <?php
            }?>

        </div>

        <!-- Footer -->
        

    </div>


    <!-- jQuery -->
    <script src="<?php echo "/acms/assets/js/jquery.js";?>"</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo "/acms/assets/js/bootstrap.min.js";?>"></script>
    <script src="<?php echo "/acms/assets/js/custom.js";?>"></script>
    <script src="<?php echo "/acms/assets/js/Chart.min.js";?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo "/acms/assets/js/bootstrap.min.js";?>"></script>


</body>

</html>
