/*var ajaxReq = baseURL+"ajaxrequest";
function sendData(url,obj){
    return $.ajax({
        "async":false,
        "type" : "POST",
        "global" : false,
        "dataType" : "html",
        "url":url,
        "data" : obj,
        "success" : function(data){
            smVaribale=data;
        }
    });
}*/
$(document).ready(function(){
    function urlTitle(txt_src) {
        var output = txt_src.replace(/[^a-zA-Z0-9]/g,' ').replace(/\s+/g,"-").toLowerCase();
        /* remove first dash */
        if(output.charAt(0) == '-') output = output.substring(1);
        /* remove last dash */
        var last = output.length-1;
        if(output.charAt(last) == '-') output = output.substring(0, last);

        return output;
    }

    function remove_special_char(txt_src){
        var output = txt_src.replace(/[^a-zA-Z0-9]/g,' ').replace(/\s+/g," ");
        /* remove first dash */
        if(output.charAt(0) == '-') output = output.substring(1);
        /* remove last dash */
        var last = output.length-1;
        if(output.charAt(last) == '-') output = output.substring(0, last);

        return output;
    }

    // Home Page Website Dashboard Views
    $(".___vw_dsb").click(function(){
        event.preventDefault();
        $(".___vw_dsb").removeClass("active");
        $(this).addClass("active");
        var m = $(this).attr("data-m");
        var d = {};
        if (m==="current_month"){
            d  = JSON.parse($(".vw-cr-mn").html());
        }else if(m==="monthly"){
            d = JSON.parse($(".vw-cr-yr").html());
        }else{
            d = JSON.parse($(".vw-cr-an").html());
        }
        _____vchart(d["labels"], d["data1"]);
    });
    // View Customer Informations
    $("._userDetail").click(function(){
        var id = $(this).attr("data-id");
        var d = $(".userdata"+id).val();
        d = JSON.parse(d);
        $("#cstatus .name").html(d.name);
        $("#cstatus .email").html(d.email);
        $("#cstatus .date").html(d.created_at);
        $("#cstatus .country").html("Pakistan");
        $("#cstatus .city").html(d.city);
        $("#cstatus .zip").html(d.zip);
        $("#cstatus .phone").html(d.phone+" , "+d.phone1+" , "+d.phone2);
        $("#cstatus .address").html(d.address);

        $("#cstatus .modal-header").attr("style", d.style);
        $("#cstatus .cname").html(d.name+" ( "+d.status+" )");
        $("#cstatus").modal("show");
    });

    // create slug

    $(".cslug").keyup(function(){
        var v = $(this).val();
        var input = $(this).attr("data-link");
        $("input[name='"+input+"']").val(urlTitle(v));
    });

    $(".tcount").keyup(function(){
        var v = $(this).val();
        var t = $(this).attr("data-count");
        if (t=="text"){
            console.log(v);
            $(this).closest(".form-group").find(".countShow").text(v.length);
        }else{
            var s = v.split(',');
            console.log(v);
            $(this).closest(".form-group").find(".countShow").text(s.length);
        }
    });
    $(".toggle-password").click(function () {
        if ($(this).hasClass("fa-eye-slash")){
            $(this).removeClass("fa-eye-slash");
            $(this).addClass("fa-eye");
            $(this).closest("div").find("input").attr("type", "text");
        } else {
            $(this).addClass("fa-eye-slash");
            $(this).removeClass("fa-eye");
            $(this).closest("div").find("input").attr("type", "password");
        }
    });
    $(document).on("click",".btn-more",function(){
        var ops = $(".ops").html();
        var from = $(this).attr("data-from");
        var data = $("."+from).html();
        var to = $(this).attr("data-to");

        if (from=="v-swatch-opt"){
            $("."+to).append(data);
            $("._colorP").colorpicker({
                color: $(this).attr("data-color")
            }).on('changeColor', function(ev) {
                $(this).css("background", ev.color.toHex());
                $(this).parent().find(".color").val(ev.color.toHex());
            });
        }else if(from=="dropdown-opt"){
            $(".dropdown-opt .option").attr("name", "option-"+$(this).attr("data-type")+"[]");
            $(".dropdown-opt .def").attr("name", "def-"+$(this).attr("data-type"));
            data = $("."+from).html();
            $("."+to).append(data);
        }else{
            $("."+to).append(data);
        }
    });

    //
    $(document).on('click','.add_input',function(){
        var id = parseInt($(this).attr('data-fid'));
        var name= $(this).attr('data-fname');
        var ht = "<li title='"+name+"' class='r"+id+"'><input type='hidden' name='order[]' value='"+id+"' class='form-control'/>"+name+"</li>";
        var al = false;
        $(".m-tbc li").each(function(){
            if ($(this).attr("title")===name){
                al = true;
            }
        });
        if (al===false){
            $('.m-tbc').append(ht);
        }else{
            $(".r"+id).remove();
        }
    });
    $(document).on("click", ".sconfirm", function(){
        var c = window.confirm("Do you want to continue?");
        if (c){
            return true;
        }else{
            return false;
        }
    });

    $(".add-more-images a").click(function(){
        var m = $(".uc-image").length;
        $(".uc-image").each(function(index, value){
            var indx = index + 1;
            $(this).find("input[type='hidden']").attr("name", "image"+indx);
            $(this).find(".image_display").attr("id", "image"+indx);
            $(this).find(".insert-media").attr("data-return", "#image"+indx);
            $(this).find(".insert-media").attr("data-link", "image"+indx);
        });
        var mc = parseInt(m) + 1;
        var d = '<div class="uc-image"><span class="close-image-x">x</span>'+
            '<input type="hidden" name="image[]" value=""/>'+
            '<div id="m-image'+mc+'" class="image_display"></div>'+
            '<div style="margin-top:10px;">'+
            '<a class="insert-media btn btn-danger btn-sm" data-type="image" data-for="display" '+
            'data-return="#m-image'+mc+'" data-link="image'+mc+'">Add Image</a>'+
            '</div>'+
            '</div>';
        $(".ext-image").before(d);
        $("input[name='total_images']").val(mc);
        return false;
    });
    $(".add-more-images2 a").click(function(){
        var m = $(".gallery .uc-image").length;
        $(".gallery .uc-image").each(function(index, value){
            var indx = index + 1;
            $(this).find("input[type='hidden']").attr("name", "image"+indx);
            $(this).find(".image_display").attr("id", "image"+indx);
            $(this).find(".insert-media").attr("data-return", "#image"+indx);
            $(this).find(".insert-media").attr("data-link", "image"+indx);
        });
        var mc = parseInt(m) + 1;
        if (mc >= 6){
           return false;
        }
        else {
            var d = '<div class="uc-image col-lg-3 col-md-4 col-sm-6"><span class="close-image-x">x</span>' +
                '<input type="hidden" name="image' + mc + '" id="imgss' + mc + '" value=""/>' +
                '<div id="m-image' + mc + '" class="image_display">' +
                '<img src="" id="imgs' + mc + '" >' +
                '</div>' +
                '<div style="margin-top:10px;">' +
                '<a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" ' +
                'data-return="#m-image' + mc + '" data-link="image' + mc + '">Add Image/Url</a>' +
                '</div>' +
                '</div>';
            $(".ext-image").before(d);
            $("input[name='total_images']").val(mc);
            return false;
        }
    });
    var cloneSchema =
        '<div class="new-schema border row">'+
        '<span class="clear-data2">x</span>'+
        '<div class="col-lg-12">'+
        '<div class="form-row">'+
        '<div class="form-group col-lg-12">'+
        '<div style="text-align: center;"><b> Schema <span class="no"></span></b> </div> <br>'+
        '<textarea rows="6" name="schema[]" class="form-control" placeholder="Type Your Schema Quotes here..."  ></textarea>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';
    $(".add-more-schema").click(function() {
        var html_obj = cloneSchema;
        $(".schema .schema-rows").append(html_obj);
        var n = $(".schema .schema-rows").find(".new-schema").length;
        var el =  $(".schema .schema-rows .new-schema:nth-child("+n+")");
        el.find(".no").text(n);
        return false;
    });
    var clone = '<div class="new-review border row">'+
        '<span class="clear-data">x</span>'+
        '<div class="form-group col-lg-5" style="text-align: center;">'+
        '<h6> <b>Home slider <span class="num"> </span> </b></h6>'+
        '<label><b>Cover Image</b> <b>Size : </b><small> <b>1280 x 370</b></small></label> <br>'+
        '<div class="uc-image" style="width:150px;height:150px;">'+
        '<span class="clear-image-x">x</span>'+
        '<input type="hidden" name="img" value="">'+
        '<div id="img" class="image_display"><img src="" alt=""></div>'+
        '<div style="margin-top:10px;"> <a class="insert-media btn btn-danger btn-sm" data-type="image" data-for="display" data-return="#img" data-link="img">Add Image</a></div>'+
        '</div><br> <br></div>'+
        '<div class="col-lg-7">'+
        '<div class="form-group">'+
        '<label>Title</label>'+
        '<input type="text" name="title[]" class="form-control" value=""/>'+
        '<div class="text-danger"> </div>'+
        '</div>'+
        '<div class="form-group">'+
        '<label>Button</label>'+
        '<input type="text" name="button[]" class="form-control" value=""/>'+
        '<div class="text-danger"> </div>'+
        '</div>'+
        '<div class="form-group">'+
        '<label>Button Link</label>'+
        '<input type="text" name="btn_link[]" class="form-control" value=""/>'+
        '<div class="text-danger"> </div>'+
        '</div>'+
        '<div class="form-group">'+
        '<div></div>'
    '</div>'+
    '</div>'+
    '</div>'+
    $(".add-review").click(function(e) {
        e.preventDefault();
        var html_obj = clone;
        var ln = $(".form-rows .row").length;
        $(".reviews .form-rows").append(html_obj);
        var n = $(".reviews .form-rows").find(".new-review").length;
        var el =  $(".reviews .form-rows .new-review:nth-child("+n+")");
        el.find(".uc-image").find("#img").attr("id", "img"+ln);
        el.find(".uc-image").find(".img").attr("class", "img"+ln);
        el.find(".uc-image").find(".image_display").attr("id", "img"+ln);
        el.find(".uc-image").find("input").attr("name", "img"+ln);
        el.find(".uc-image").find("a").attr("data-return", "#img"+ln);
        el.find(".uc-image").find("a").attr("data-link", "img"+ln);
        el.find(".num").text(n)
        return false;
    });
    $(document).on("click", ".clear-data", function() {
        var v = window.confirm("Do you want to delete data?");
        if (v) {
            $(this).closest(".row").remove();
        }
    });
    $(document).on("click", ".clear-data2", function() {
        var v = window.confirm("Do you want to delete data?");
        if (v) {
            $(this).closest(".row").remove();
        }
    });
    $(document).on("click", ".close-image-x", function(){
        var r = window.confirm("Do you want to delete image");
        if (r){
            $(this).parent().remove();
            var mc = 1;
            $(".uc-image2").each(function(){
                $(this).find("input").attr("name","image"+mc);
                $(this).find(".image_display").removeClass("image"+(mc+1));
                $(this).find(".image_display").addClass("image"+mc);
                $(this).find(".insert-media").attr("data-return", "image"+mc);
                $(this).find(".insert-media").attr("data-link", "image"+mc);
                mc++;
            });
        }
        $("input[name='total_images']").val(mc);
    });
    $(document).on("click", ".clear-image-x", function(){
        var r = window.confirm("Do you want to delete image");
        if (r){
            $(this).parent().find("input").val("");
            $(this).parent().find(".image_display").html("");
        }
    });


    $("span.adm-prev a").html('<i class="fa fa-chevron-left"></i>');
    $("span.adm-next a").html('<i class="fa fa-chevron-right"></i>');

    // creating slug
    $("#title").keypress(function(e){
        var replaceSpace = $("#title").val();
        var result = replaceSpace.replace(/\s/g, "-");
        $("#slug").val(result);
    });
    // sending request to add new product hardware
    $("#brand_btn_submit").click(function (e){
        var brnad_name=$("#brand_name").val();
        var data="action=";
        e.preventDefault();
    });
    // sending request to add new product hardware
    $('.i-check input').each(function () {
        var self = $(this),
            label = self.next(),
            label_text = label.text();

        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-red',
            radioClass: 'iradio_line-red',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });
    $('input').on("ifChanged",function(){
        if($(this).prop("checked") == true){
            $(this).parent().addClass("icheckbox_line-green c-checked");
            $(this).parent().removeClass("icheckbox_line-grey");
        }
        else{
            $(this).parent().addClass("icheckbox_line-red");
            $(this).parent().removeClass("icheckbox_line-green c-checked");
        }
    });
    setTimeout(function(){
        $(".i-check input[type='checkbox']").each(function(){
            if($(this).prop("checked") == true){
                var el =  $(this).closest('.i-check').find(".checked");
                el.addClass(" icheckbox_line-green ");
                el.removeClass("icheckbox_line-grey");
            }else{
                var el =  $(this).closest('.i-check').find(".icheckbox_line-grey");
                el.addClass(" icheckbox_line-red ");
                el.removeClass("icheckbox_line-grey");
            }
        });
    },1000);
    $(document).on("click",".-change-order-status",function(){
        $("#cstatus").modal("show");
        $("#cstatus input[data-label='"+$(this).attr("data-label")+"']").attr("checked", true);
        $(".hidID").val($(this).attr("data-id"));
        var data = {
            _token : $('meta[name="csrf-token"]').attr('content'),o:$(this).attr("data-id"),s:$(this).attr("data-label")
        };
        sendData(baseURL+"changeOrderStatus",data).done(function(d){
            $("#cstatus .modal-body-s").html(d);
        });
        return false;
    });

    $(".-change-vostat").click(function(){
        $("#exampleModalLabel4").html('<div class="alert alert-info" role="alert">Be patient, Order status is being changed and sent email to the user.</div>');
        var id = $(".hidID").val();
        var s, lb, _el;
        var _this = $(this);

        var is_check = false;
        $("#cstatus input[type='radio']").each(function(){
            if ($(this).is(":checked")){
                s = $(this).val();
                lb = $(this).attr("data-label");
                _el = $(this);
                is_check = true;
            }
        });

        if (is_check==false){
            alert("Please select status.");
        }else{
            $(".-dpm"+id).find(".-change-order-status").attr("data-label", lb);
            $(".shtd"+id).html(lb);

            var data = {
                _token : $('meta[name="csrf-token"]').attr('content'), id:id,s:s
            };
            $("#cstatus").modal("show");

            sendData(baseURL+"changeProductStatus", data).done(function(d){
                $("#cstatus").modal("hide");
                _el.prop('checked', false);
                $("#exampleModalLabel4").html("");
            }).fail(function(){
                _el.prop('checked', false);
                $("#exampleModalLabel4").html('<div class="alert alert-danger" role="alert">Sorry, Something is wrong.</div>');
            });
        }

    });

    $(".rptBtnPnd").click(function(){
        var c = window.confirm("Do you want to continue?");
        var _el = $(this);
        if (c){
            var id = $(this).attr("data-id");
            var type = $(this).attr("data-type");
            var status = $(this).attr("data-status");
            var data = {
                id: id,
                status : status,
                type : type,
                _token : $(".tokenId").val(),
            };
            sendData(baseURL+"changeReportStatus", data).done(function(){
                _el.hide();
            });
        }
        return false;
    });

        /*$('form').bind("keypress", function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });
        $(document).ready(function () {
            _token = $('meta[name="csrf-token"]').attr('content');
            var pageURL = $(location).attr("href");
            var url = new URL(pageURL);
            var id = url.searchParams.get("id");
            var data = {};
            var data1 = {};
            data.id = id;
            data._token = _token;
            console.log(data);
            sendData(baseURL + "get-internal-links", data).done(function (resp) {
                var string = resp;
                var data1 = string.split(',');
                const data2 = [];
                data1.forEach(element => {
                    data2.push(element.toLowerCase());
                });
                $(".tags_input").tagComplete({
                    keylimit: 5,
                    hide: false,
                    freeInput: true,
                    freeEdit: false,
                    autocomplete: {
                        data: data2
                    }
                });
            });

        });*/

    // $( function() {
    //     $( "#sortable" ).sortable({
    //         revert: true
    //     });
    //     $( "#draggable" ).draggable({
    //         connectToSortable: "#sortable",
    //         helper: "clone",
    //         revert: "invalid"
    //     });
    //     $( "ul, li" ).disableSelection();
    // });
    // function tiny_editor(){
    //     tinymce.init({
    //         mode : "specific_textareas",
    //         setup: function (editor) {
    //             editor.on('change', function () {
    //                 editor.save();
    //             });
    //         },
    //         editor_selector: "tinyeditor",
    //         menubar:false,
    //         statusbar: false,
    //         plugins: [
    //             'advlist autolink lists link image charmap anchor',
    //             'searchreplace',
    //             'media table',
    //         ],
    //         toolbar: '| bold italic | alignleft aligncenter alignright alignjustify | bullist numlist'
    //     });
    // }
    // tiny_editor();
    function deeptest(target,s){
        s= s.split('.');
        s.shift();
        var key = s.shift();
        var obj= target[key];
        while(obj && s.length){
            obj= obj[s.shift()];
        }
        return obj;
    }
    // var editor_config = {
    //     path_absolute : "/",
    //     selector: "textarea.oneditor",
    //     plugins: [
    //         "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    //         "searchreplace wordcount visualblocks visualchars code fullscreen",
    //         "insertdatetime media nonbreaking save table contextmenu directionality",
    //         "emoticons template paste textcolor colorpicker textpattern"
    //     ],
    //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor",
    //     relative_urls: false,
    //     remove_script_host : false,
    //     convert_urls : true,
    //     file_browser_callback : function(field_name, url, type, win) {
    //         var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    //         var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
    //         var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
    //         if (type == 'image') {
    //             cmsURL = cmsURL + "&type=Images";
    //         } else {
    //             cmsURL = cmsURL + "&type=Files";
    //         }
    //         tinyMCE.activeEditor.windowManager.open({
    //             file : cmsURL,
    //             title : 'Filemanager',
    //             width : x * 0.8,
    //             height : y * 0.8,
    //             resizable : "yes",
    //             close_previous : "no"
    //         });
    //     }
    // };
    // tinymce.init(editor_config);

});
