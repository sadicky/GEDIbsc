    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?= date('Y') ?> &copy; GED by <a href="#">IBSC</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- end Footer -->

    <!-- Vendor js -->
    <script src="Assets/js/vendor.min.js"></script>

    <!-- Chart JS -->
    <script src="Assets/libs/chart-js/Chart.bundle.min.js"></script>

    <script src="Assets/libs/custombox/custombox.min.js"></script>

    <!-- Sweetalert2 -->
    <script src="Assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="Assets/js/pages/sweetalerts.init.js"></script>

    <!-- Required datatable js -->
    <script src="Assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="Assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="Assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="Assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="Assets/libs/jszip/jszip.min.js"></script>
    <script src="Assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="Assets/libs/pdfmake/vfs_fonts.js"></script>
    <script src="Assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="Assets/libs/datatables/buttons.print.min.js"></script>

    <!-- Responsive examples -->
    <script src="Assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="Assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatables init -->
    <script src="Assets/js/pages/datatables.init.js"></script>

    <script src="Assets/libs/select2/select2.min.js"></script>
    <script src="Assets/libs/autocomplete/jquery.autocomplete.min.js"></script>
    <script src="Assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="Assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>


    <script src="Assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>


    <!--Dropzone js -->
    <script src="Assets/libs/dropzone/dropzone.min.js"></script>

    <!-- Tost-->
    <script src="Assets/libs/jquery-toast/jquery.toast.min.js"></script>

    <!-- toastr init js-->
    <script src="Assets/js/pages/toastr.init.js"></script>

    <script src="Assets/libs/moment/moment.min.js"></script>
    <script src="Assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Treeview Plugin JavaScript -->
    <!-- <script src="Assets/libs/treeview/jquery.min.js"></script> -->
    <script src="Assets/libs/treeview/bootstrap-treeview.min.js"></script>

    <script type="text/javascript" src="Assets/libs/jstree/dist/jstree.min.js"></script>

    <!-- Init js-->
    <script>
        $(function() {
            // For select 2
            $(".select2").select2(); 
                $("#reportrange span").html(moment().
                subtract(29,"days").format("D MM, YYYY")+" - "+moment().
                format("D MM, YYYY")),
                $("#reportrange").daterangepicker({format:"DD/MM/YYYY",startDate:moment().
                subtract(29,"days"),endDate:moment(),minDate:"01/01/2020",maxDate:"31/12/2022",
                dateLimit:{days:60},showDropdowns:!0,showWeekNumbers:!0,timePicker:!1,
                timePickerIncrement:1,timePicker12Hour:!0,ranges:{Today:[moment(),moment()],
                    Yesterday:[moment().subtract(1,"days"),moment().subtract(1,"days")],
                    "Last 7 Days":[moment().subtract(6,"days"),moment()],"Last 30 Days":
                    [moment().subtract(29,"days"),moment()],
                    "This Month":[moment().startOf("month"),moment().endOf("month")],
                    "Last Month":[moment().subtract(1,"month").startOf("month"),
                    moment().subtract(1,"month").endOf("month")]},opens:"left",drops:"down",
                    buttonClasses:["btn","btn-sm"],applyClass:"btn-success",cancelClass:"btn-default",
                    separator:" to ",locale:{applyLabel:"Submit",cancelLabel:"Cancel",
                    fromLabel:"From",toLabel:"To",customRangeLabel:"Custom",
                    daysOfWeek:["Su","Mo","Tu","We","Th","Fr","Sa"],
                    monthNames:["January","February","March","April","May","June","July","August",
                    "September","October","November","December"],firstDay:1}},
                    function(e,t,n){console.log(e.toISOString(),t.toISOString(),n),
                        $("#reportrange span").html(e.format("D MM, YYYY")+" - "+
                        t.format("D MM, YYYY"))})        
    
        });
    </script>

    <!-- App js -->
    <script src="Assets/js/app.min.js"></script>