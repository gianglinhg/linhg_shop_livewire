<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('/template/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/template/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/template/assets/js/detect.js')}}"></script>
<script src="{{asset('/template/assets/js/fastclick.js')}}"></script>
<script src="{{asset('/template/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('/template/assets/js/waves.js')}}"></script>
<script src="{{asset('/template/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('/template/assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('/template/plugins/switchery/switchery.min.js')}}"></script>

<!-- Counter js  -->
<script src="{{asset('/template/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('/template/plugins/counterup/jquery.counterup.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('/template/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('/template/plugins/raphael/raphael-min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('/template/assets/pages/jquery.dashboard.js')}}"></script>

<!-- App js -->
<script src="{{asset('/template/assets/js/jquery.core.js')}}"></script>
<script src="{{asset('/template/assets/js/jquery.app.js')}}"></script>
<script src="{{asset('/template/assets/ckeditor/ckeditor.js')}}"></script>
@stack('scripts')
@livewireScripts