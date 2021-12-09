<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="terms">
                        Terms of Service
                    </a>
                </li>
                <? if(isset($_SESSION['username']) && $exists) { ?>
                <li>
                    <a href="https://discord.gg/26y6dnH">
                      Receive X-Phish Support
                    </a>
                </li>
                <?}?>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy;&nbsp;Copyright 2017 <b><?php echo $siteLink;?></b>
        </p>
    </div>
</footer>
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="http://<? echo $siteLink;?>/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="http://<? echo $siteLink;?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://<? echo $siteLink;?>/assets/js/boostrap-datepicker.js"></script>
<script src="http://<? echo $siteLink;?>/assets/js/material.min.js"></script>
<script src="http://<? echo $siteLink;?>/assets/js/material-kit.js"></script>
<script src="http://<? echo $siteLink;?>/assets/js/nouislider.min.js"></script>
<script src="http://<? echo $siteLink;?>/assets/js/moment.min.js"></script>
<script src="http://<? echo $siteLink;?>/assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="http://<? echo $siteLink;?>/assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>
<script src="http://<? echo $siteLink;?>/assets/js/bootstrap-tagsinput.js"></script>

</html>
