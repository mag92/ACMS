 
            <!-- Projects Row -->
            <form class="col-lg-12 text-center" style="margin-bottom: 5px" method="post">
                <div class="col-lg-12">

                    <div class=" col-lg-12 dropdown text-center" style="z-index:10">
                        <!--<input class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="true" value="Select a Prof/TA" />-->

                        <select class="btn btn-default dropdown-toggle" name = "professor">
                            <?php
                            foreach ($professors as $professor)
                                echo '<option value = "' . $professor->id . '">' . $professor->name . '</option>';
                            ?>
                        </select>

                        <!--<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a id="male" role="menuitem" tabindex="-1" href="#" onclick="incX('Male')">Hassan</a></li>
                            <li role="presentation"><a id="female" role="menuitem" tabindex="-1" href="#" onclick="incX('Female')">Ali</a></li>
                        </ul>-->
                    </div>
                    <div class="col-lg-12" style="z-index:0">

                        <textarea name="message" style="min-height:50px; width:80%; margin-top:5px;" rows="8"></textarea> <br />
                        <input class="btn btn-primary" type="submit" value="Send!" />

                    </div>
                </div> 
            </form>
            <hr />
            <h4 class="col-md-6 text-center">Previous Messages</h4>
            <div class="col-md-6 portfolio-item" style="width:100%">
                <?php
                foreach ($messages as $message)
                {
                ?>
                <div class="box box-primary">
                    <div class="announcement" style="width:100%">
                        <p style="display:inline;"><small>to: </small> <?=$message->name?>   </p>
                        <p style="float:right; font-size:15px; margin-right:10px;"><?php echo $message->timestamp; ?></p><br />
                        <p style="font-size:20px; display:inline"><?=$message->body?></p> 
                        <a href="#" style="position:absolute; right:5px; font-size:12px">Response</a>
                    </div>
                </div><!-- /.box -->
                <?php
                
                }
                ?>
<!--                <div class="box box-primary">
                    <div class="announcement">
                        <p style="display:inline;"><small>to: </small> TA Ibrahimovic</p>
                        <p style="float:right; font-size:15px; margin-right:10px;">2 Days Ago</p><br />
                        <p style="font-size:20px;">How are you?</p>
                    </div>
                </div> /.box -->
            </div>

            <!-- Footer -->


        </div>
        <!--<footer>
            <div class="text-center" style="position: absolute;height:30px; bottom:0px; z-index: -2; background-color:white">
                <div class="col-lg-12">
                    <p>Copyright &copy; ACMS 2016</p>
                </div>
            </div>
        </footer>-->
        <!-- /.container -->

        <script type="text/javascript" src="<?php echo "/acms/assets/js/jquery-2.2.0.js"; ?>"></script>
        <script type="text/javascript" src="<?php echo "/acms/assets/js/bootstrap.js"; ?>"></script>
        <script src="<?php echo "/acms/assets/js/custom.js"; ?>"></script>

    </body>

</html>
