
         

        <!-- Pagination -->
        <div>
                  <div class="dropdown text-center">
                        <input class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="true" value="Where Are You?" />
                          
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <?php
                            foreach ($stations as $station)
                            {?>
                            <li role="presentation"><a id="xx<?php echo $station->id; ?>" role="menuitem" tabindex="-1" href="#" onclick="show_buses('<?php echo $station->id; ?>')"><?php echo $station->station; ?></a></li>
                            <?php }
                            
                            ?>
                        </ul>
  
                    </div>
        </div>
        <br />
        <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4 text-center" id="buses_table" style="z-index:-1; display:none">
            
        </div>



       

        <!-- Footer -->
        
    </div>

    <!-- /.container -->

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
