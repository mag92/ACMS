
        <!-- Projects Row -->
      
      

        <!-- Pagination -->
       <div>
                  <div class="dropdown text-center">
                        <input class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="true" value="Select a Course" />
                          
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <?php
                            foreach($courses as $course)
                            {
                                ?>
                            
                            <li role="presentation"><a id="" role="menuitem" tabindex="-1" href="#" onclick="select('<?=$course->name?>')"><?=$course->name?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <span id="genderValid"></span>
                    </div>
        </div>
        <br />

        <div class="col-lg-12 text-center" id="results" style="display:none" >
            <span class="text-center">Total: </span> <span id="classes">10 classes</span> <br />
            <span class="text-center">Attended: </span> <span id="attended">7(70%)</span> <br />
            <span class="text-center">Missed: </span> <span id="missed">3</span>
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
