@php
    $req = $_SERVER['REQUEST_URI'];
@endphp
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="Bdtask">
    <title>Admin | Beauty Garage</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <!--Global Styles(used by all pages)-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/metisMenu/metisMenu.min.css') }}">
    <link href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/typicons/src/typicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/themify-icons/themify-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/glyphicons/glyphicons.css') }}" rel="stylesheet">
    <!--Third party Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <!--Third party Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/icheck/skins/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css') }}" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/Sortable/js/Sortable.js') }}"></script>
    <script src="https://xrays.io/admin-assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>

    <!--Start Your Custom Style Now-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="https://aaraishcollections.com/assets/backend/assets/dist/css/custom.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Switch 4 Specific Style Start */
        .input_wrapper{
            width: 80px;
            height: 40px;
            position: relative;
            cursor: pointer;
        }

        .input_wrapper input[type="checkbox"]{
            width: 80px;
            height: 40px;
            cursor: pointer;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: #C82733;
            border-radius: 2px;
            position: relative;
            outline: 0;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .input_wrapper input[type="checkbox"]:after{
            position: absolute;
            content: "";
            top: 3px;
            left: 3px;
            width: 34px;
            height: 34px;
            background: #dfeaec;
            z-index: 2;
            border-radius: 2px;
            -webkit-transition: all .35s;
            transition: all .35s;
        }

        .input_wrapper svg{
            position: absolute;
            top: 44%;
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            fill: #fff;
            -webkit-transition: all .35s;
            transition: all .35s;
            z-index: 1;
        }

        .input_wrapper .is_checked{
            width: 18px;
            left: 18%;
            -webkit-transform: translateX(190%) translateY(-30%) scale(0);
            transform: translateX(190%) translateY(-30%) scale(0);
        }

        .input_wrapper .is_unchecked{
            width: 15px;
            right: 16%;
            -webkit-transform: translateX(0) translateY(-30%) scale(1);
            transform: translateX(0) translateY(-30%) scale(1);
        }

        /* Checked State */
        .input_wrapper input[type="checkbox"]:checked{
            background: #4BA005;
        }

        .input_wrapper input[type="checkbox"]:checked:after{
            left: calc(100% - 37px);
        }

        .input_wrapper input[type="checkbox"]:checked + .is_checked{
            -webkit-transform: translateX(0) translateY(-30%) scale(1);
            transform: translateX(0) translateY(-30%) scale(1);
        }

        .input_wrapper input[type="checkbox"]:checked ~ .is_unchecked{
            -webkit-transform: translateX(-190%) translateY(-30%) scale(0);
            transform: translateX(-190%) translateY(-30%) scale(0);
        }

        /* Switch 4 Specific Style End */
        .checkbo{
            display: none;
        }
        .des{
            display: block;
            background: white;
            border: 2px solid #C82733;
            border-radius: 9px;
            padding: 5px 8px;
            margin-bottom: 1rem;
            text-align: center;
            box-shadow: 0px 3px 10px -2px rgb(161 170 166 / 50%);
            position: relative;
            color: #777;
            cursor: pointer;
        }
        .chk input[type="checkbox"]:checked + .des {
            background: #C82733;
            color: white;
            cursor: pointer;
            border-color: #C82733;
        }
    </style>
</head>
<body class="fixed">
@include('admin.layouts.header');
@yield('content')
</div>
@include('admin.layouts.footer');
<!--Global script(used by all pages)-->
<script>
    var baseUrl = "{{route("HomeUrl")}}/";
    var products_url = "{{ route("aj_product") }}";
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://xrays.io/admin-assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/metisMenu/metisMenu.min.js')}}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>

<script src="{{asset('assets/plugins/sparkline/sparkline.min.js')}}"></script>
@if(!($req=="/admin/home-meta"))
<script src="{{asset('assets/plugins/chartJs/Chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/data-bootstrap4.active.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
@endif
<script src="{{ asset('assets/plugins/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<script src="{{ asset('assets/js/pages/icheck.active.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

@if($req=="/admin/home-meta")
    {{--Nestable--}}
    <script src="https://xrays.io/admin-assets/plugins/nestable/nestable.js"></script>
    <script>
        $(document).ready(function(){
            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            // activate Nestable for list 1
            $('#nestable').nestable({
                group: 1,
                maxDepth: 3
            }).on('change', updateOutput);

            // output initial serialised data
            updateOutput($('#nestable').data('output', $('#nestable-output')));

            $('#nestable-menu').on('click', function (e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            function add_to_menu(type,title, slug){
                var list = $(".main-dd-list");
                var data = "<li "+
                    "class='dd-item' "+
                    "data-type='"+type+"'"+
                    "data-title='"+title+"'"+
                    "data-link='"+slug+"'>"+
                    "<div class='dd-handle'>"+title+""+
                    "<span class='menu-del pull-right' data-id='x'>x</span>"+
                    "<span class='type pull-right'>"+type+"</span>"+
                    "</div>"+
                    "</li>";
                list.append(data);
                updateOutput($('#nestable').data('output', $('#nestable-output')));
            }

            $(".menu-added").click(function(){
                var type, id, title, slug;
                var type = $(this).data("type");
                if (type=="page" || type=="category"){
                    id = $(this).data("id");
                    title = $(this).data("title");
                    slug = $(this).data("link");
                }else{
                    title = $("input[name='text']").val();
                    slug = $("input[name='url']").val();
                    slug = (slug=="") ? "#" : slug;
                }
                if (title==""){
                    alert("Please enter link title");
                }else{
                    $("input[name='text']").val("");
                    $("input[name='url']").val("");
                    add_to_menu(type, title, slug);
                }

            });

            $(document).on("click",".menu-del",function(){
                var s = window.confirm("Do you want to continue?");
                if (s){
                    $(this).closest(".dd-item").remove();
                    updateOutput($('#nestable').data('output', $('#nestable-output')));
                }
            });

            $(".save-menu").click(function(){
                var data = $("#nestable-output").val();
                var d = JSON.parse(data);
                var r = "Enter menu item.";
                if (Object.keys(d).length > 0){
                    //window.location = "?menu="+check+"&sv=1";
                    return true;
                }
                alert(r);
                return false;
            });

        });
    </script>
@endif

@if(Request()->segment(2) == "reports")
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <link href="{{ asset('assets/css/datepicker3.css') }}" rel="stylesheet">
    <script>
        $("input._datetimepicker").datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    </script>
@endif

@php
    $mediaPanel = new \hassankwl1001\mediapanel\Http\Controllers\MediaPanelController;
    echo $mediaPanel->index();
@endphp
</body>
</html>
