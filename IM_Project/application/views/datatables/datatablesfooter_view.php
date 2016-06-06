
   <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.min.datatables.js"></script>

 
  <script src="<?= base_url(); ?>assets/js/jquery.sparkline.js"></script>
  	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    
  <!--common script for all pages-->
    <script src="<?= base_url(); ?>assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/gritter-conf.js"></script>

    <!--script for this page-->

    <script src="<?= base_url(); ?>assets/js/sparkline-chart.js"></script>    
    <script src="<?= base_url(); ?>assets/js/zabuto_calendar.js"></script>  

    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
<footer class="site-footer" >
          <div class="text-center" >
              Copyright © Integrated Maritime 2015
              <a href="#" class="go-top" >
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
</footer>