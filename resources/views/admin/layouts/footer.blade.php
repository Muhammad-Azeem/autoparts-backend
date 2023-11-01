<script src="{{ asset('assets/dist/js/popper.min.js') }}"></script>
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
    <script src="{{ asset('assets/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/tags/bootstrap-tagsinput.css') }}">
    <script src="{{ asset('assets/plugins/tags/bootstrap-tagsinput.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/tags/tagcomplete.min.css') }}">
    <script src="{{ asset('assets/plugins/tags/tagcomplete.min.js') }}"></script>
@endif
@if(request()->segment(2) === 'story-list' || request()->segment(2) === 'research')
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.active.js') }}"></script>
@endif
@if(request()->segment(2) === 'story-list' || request()->segment(2) === 'users' || request()->segment(2) === 'comments')
    <script src="{{ asset('assets/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/pages/icheck.active.js') }}"></script>
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
        @if(request()->segment(2) === 'users')
        function toggleZoomScreen() {
        document.body.style.zoom = "90%";
    }
        @else
        function toggleZoomScreen() {
        document.body.style.zoom = "80%";
    }
    @endif
        @if(request()->segment(2) === "create-story")
    $(function () {
        $('.datetimepicker').datetimepicker();
    });
    @endif
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
</script>
<script>
    var baseUrl = "{{route("home")}}/";
    var products_url = "{{ route("story-list") }}";
    var user_url = "{{ route('users-list') }}";
    var comment_url = "{{ route('comment') }}";
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: products_url,
                data: {'status': status, 'product_id': product_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    });

    $(function() {
        $('.toggle-class-user').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');
            var user = $(this).data('role');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: user_url,
                data: {'status': status, 'id': product_id, 'user' : user },
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    });

    $(function() {
        $('.toggle-class-comment').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: comment_url,
                data: {'status': status, 'product_id': product_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    });
</script>
</body>
</html>
@php
    $mediaPanel = new \hassankwl1001\mediapanel\Http\Controllers\MediaPanelController;
    echo $mediaPanel->index();
@endphp
