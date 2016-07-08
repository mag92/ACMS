﻿            

        <!-- Projects Row -->
      
      

        <!-- Pagination -->
       <div class="col-lg-12 portfolio-item" style="width:100%">
           <?php
           foreach ($messages as $message)
           {
               ?>
           <div class="box">
               <div class="announcement" style="width:100%">
                   <p style="display:inline;"><?=$message->name?></p>
                   <p style="float:right; font-size:15px; margin-right:10px;"><?php echo $message->timestamp; ?></p><br />
                   <p style="font-size:20px; display:inline"><?=$message->body?></p>
                   <a href="#" style="position:absolute; right:5px; font-size:12px">Original Message</a>
               </div>
           </div>
           <?php
           }
           ?>
<!--           <div class="box">
               <div class="announcement">
                   <p style="display:inline;">TA Ibrahimovic</p>
                   <p style="float:right; font-size:15px; margin-right:10px;"> 2 Days Ago</p><br />
                   <p style="font-size:20px; display:inline"> The next lecture is canceled!</p>
                   <a href="#" style="position:absolute; right:5px; font-size:12px">Original Message</a>
               </div>
           </div> /.box -->


        </div>

        <!-- Footer -->
        

    </div>
    <!-- /.container -->

	<script type="text/javascript" src="<?php echo "/acms/assets/js/jquery-2.2.0.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo "/acms/assets/js/bootstrap.js"; ?>"></script>
    <script src="<?php echo "/acms/assets/js/custom.js"; ?>"></script>

</body>

</html>
