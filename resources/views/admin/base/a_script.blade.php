{{-- Author: Gui Hui Chyi --}}
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('admin/assets/js/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/popper.js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- jquery slimscroll js -->
/<!--<script type="text/javascript" src="{{asset('admin/assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>-->
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('admin/assets/js/modernizr/modernizr.js') }}"></script>
<!-- am chart -->
<script src="{{asset('admin/assets/pages/widget/amchart/amcharts.min.js') }}"></script>
<script src="{{asset('admin/assets/pages/widget/amchart/serial.min.js') }}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{asset('admin/assets/pages/todo/todo.js') }}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('admin/assets/pages/dashboard/custom-dashboard.js') }}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/script.js') }}"></script>
<script type="text/javascript " src="{{asset('admin/assets/js/SmoothScroll.js') }}"></script>
<script src="{{asset('admin/assets/js/pcoded.min.js') }}"></script>
<script src="{{asset('admin/assets/js/demo-12.js') }}"></script>
<script src="{{asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>
<!-- Added for Datatables - Start Here -->
<script src="{{asset('admin/assets/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('admin/assets/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin/assets/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('admin/assets/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<!-- buttons for Export datatable -->
<script src="{{asset('admin/assets/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('admin/assets/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin/assets/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{asset('admin/assets/datatables/js/buttons.html5.min.js') }}"
></script>
<script src="{{asset('admin/assets/datatables/js/buttons.flash.min.js') }}"></script>
<script src="{{asset('admin/assets/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{asset('admin/assets/datatables/js/vfs_fonts.js') }}"></script>
<!-- Datatable Setting js -->
<script src="{{asset('admin/assets/datatables/js/datatable-setting.js') }}"></script>
<!-- Added for Datatables - Ends Here -->
