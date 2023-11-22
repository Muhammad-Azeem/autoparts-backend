<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/sidebar.js') }}"></script>
<script src="{{ asset('assets/dist/js/custom.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/data-basic.active.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/pages/demo.select2.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.css') }}">
<script src="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js') }}"></script>
<script src="{{asset("assets/plugins/sparkline/sparkline.min.js")}}"></script>
<script src="{{ asset('assets/dist/js/pages/demo.select2.js') }}"></script>
<script src="{{ asset('assets/dist/js/pages/demo.jquery.sumoselect.js') }}"></script>
<script src="{{ asset('assets/dist/js/pages/newsletter.active.js') }}"></script>

@if(request()->segment(2) === 'create-story')
    <script src="{{ asset('assets-m/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets-m/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets-m/js/main.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets-m/plugins/tags/bootstrap-tagsinput.css') }}">
    <script src="{{ asset('assets-m/plugins/tags/bootstrap-tagsinput.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets-m/plugins/tags/tagcomplete.min.css') }}">
    <script src="{{ asset('assets-m/plugins/tags/tagcomplete.min.js') }}"></script>
@endif
@if(request()->segment(2) === 'story-list' || request()->segment(2) === 'research')
    <script src="{{ asset('assets-m/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets-m/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets-m/plugins/daterangepicker/daterangepicker.active.js') }}"></script>
@endif
@if(request()->segment(2) === 'story-list' || request()->segment(2) === 'users' || request()->segment(2) === 'comments')
    <script src="{{ asset('assets-m/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets-m/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{ asset('assets-m/dist/js/pages/icheck.active.js') }}"></script>
@endif

@if(request()->segment(2) === 'home-settings')
    <!-- Third Party Scripts(used by this page)-->
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js') }}"></script>
    <!--Page Active Scripts(used by this page)-->
    <script src="{{ asset('assets/dist/js/pages/demo.select2.js') }}"></script>
    <script src="{{ asset('assets/dist/js/pages/demo.jquery.sumoselect.js') }}"></script>
    <script src="{{ asset('assets/dist/js/pages/newsletter.active.js') }}"></script>
@endif
<script type="text/javascript">
        @if(request()->segment(2) === "create-story")
    $(function () {
        $('.datetimepicker').datetimepicker();
    });
    @endif
</script>
</body>
</html>
@php
    $mediaPanel = new \hassankwl1001\mediapanel\Http\Controllers\MediaPanelController;
    echo $mediaPanel->index();
@endphp
