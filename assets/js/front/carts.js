$(document).on("click", ".del-item", function () {
    var el = $(this);
    var pid = el.attr("data-id");
    $.ajax({
        type: "post",
        url: baseUrl + "delete/product",
        data: {"_token": token, id: pid},
        success: function (data) {
            $.notify(data.msg, data.resp);
            location.reload();
        }
    });
});
/*Add to Cart*/
$(document).on("click", ".addcart", function () {
    var el = $(this);
    var pid = el.attr("data-id");
    el.removeClass('addcart');
    $.ajax({
        type: "post",
        url: baseUrl + "cart/addcart",
        data: {"_token": token, id: pid},
        success: function (data) {
            el.addClass('addcart');
            if (data.resp == "error") {
                $.notify(data.msg, data.resp);
            } else if (data.resp == "success") {
                var arr = data.msg;
                var a = 0;
                var total_p = 0;
                $(".cart").html("");
                for (var k in arr) {
                    var x = arr[k]['product'];
                    var price = arr[k]['price'];
                    var photo = arr[k]["img"];
                    var qty = arr[k]['qty'];
                    var id = arr[k]['id'];
                    var sku = arr[k]['sku'];
                    var len = arr.length;
                    a = a + 1;
                    total_p = total_p + (qty * price);
                    $(".cart").append(
                        '<li id="cartItem">' +
                        '<a class="del-item remove" data-id="' + sku + '" title="Remove this item"><i class="fa fa-remove"></i></a>' +
                        '<a class="cart-img" href="' + baseUrl + '/-1' + id + '"><img src="' + photo + '"></a>' +
                        '<h4><a href="#">' + x + '</a></h4>' +
                        '<p class="quantity">' + qty + 'x - ' +
                        'Rs.<span class="amount" id="prct' + id + '">' + price + '</span>' +
                        '</p></li>');
                }
                $(".total-amount").text(total_p + " .Rs");
                $(".total-count").text(a);
                $(".cart-quantity").text(a);
                $.notify("Successfully Added To Cart.", "success");
            }
        }
    });
    return false;
});

$("#load-more-products").on("click", function () {
    var t = $(this);
    var x = 0;
    x++;
    var offset = t.attr("data-id");
    $.ajax({
        type: "post",
        data: {"_token": token, i: offset},
        url: baseUrl + "?page=" + offset,
        success: function (data) {
            if (data == null || data == '') {
                $.notify("No More Data Available","error")
                $("#load-more-products").css('display', 'none');
            } else {
                offset++;
                $('#load-more-products').attr('data-id', offset);
                $("#more-products").append(data);
            }
        }
    });
});

$(document).on("click", ".adding", function () {
    var id = $(this).parent().find('input[type=hidden]').val();
    var qty = $("#qty" + id).html();
    var size_new = $('.size-li'+id+'.selected').attr("data-value");
    qty++;
    if (qty < 1) {
        $("#qty" + id).html("1");
    } else {
        $('#overlay').fadeIn();
        $.ajax({
            type: "POST",
            url: baseUrl + "addby",
            data: {id: id, "_token": token, "size_val":size_new},
            success: function (data) {
                if (data.resp == "error") {
                    $.notify(data.msg, "error");
                } else if (data.resp == "success") {
                    data = data.msg;
                    $("#qty" + id).html(data['qty']);
                    $("#prc" + id).html(data['qty'] * data['price']);
                    var total_v = $("#grandtotal-to").html();
                    $("#grandtotal-to").empty();
                    var t = parseInt(total_v) + parseInt(data['price']);
                    $("#grandtotal-to").text(t);
                    $('#overlay').fadeOut();
                    $.notify(data['product'] + " is Increased", "success");
                }
                $('#overlay').fadeOut();
            }
        });
    }
});

$(document).on("click", ".reducing", function () {
    var id = $(this).parent().find('input[type=hidden]').val();
    var qty = $("#qty" + id).html();
    var size_new = $('.size-li'+id+'.selected').attr("data-value");
    qty--;
    if (qty < 1) {
        $("#qty" + id).html("1");
    } else {
        $('#overlay').fadeIn();
        $.ajax({
            type: "POST",
            url: baseUrl + "reduceby",
            data: {id: id, "_token": token,"size_val":size_new},
            success: function (data) {
                if (data.resp == "error") {
                    $.notify(data.msg, "error");
                } else if (data.resp == "success") {
                    data = data.msg;
                    $("#qty" + id).html(data['qty']);
                    $("#prc" + id).html(data['qty'] * data['price']);
                    var total_v = $("#grandtotal-to").html();
                    $("#grandtotal-to").empty();
                    $("#grandtotal-to").html(parseInt(total_v) - parseInt(data['price']));
                    $('#overlay').fadeOut();
                    $.notify(data['product'] + " is Decreased");
                }
                $('#overlay').fadeOut();
            }
        });
    }
    return false;
});
/*Num Js Cart*/
$(document).on("click", "#addcart", function () {
    var qty = $("#qval").val();
    var pid = $("#pid").val();
    var size_new = $(".size-li.selected").attr("data-value");
    if ((qty > 50) || (qty <= 0) || ($.isNumeric(qty) === false)) {
        $.notify("Sorry Wrong Value", "error");
        return false;
    }
    qty = parseInt(qty);
    $(".empty").html("");
    $.ajax({
        type: "POST",
        url: baseUrl + "addnumcart",
        data: {id: pid, qty: qty, "_token": token, "size_val": size_new},
        success: function (data) {
            if (data.resp == "error") {
                $.notify(data.msg, "error");
            } else if (data.resp == "success") {
                var arr = data.msg;
                var a = 0;
                var total_p = 0;
                $(".cart").html("");
                for (var k in arr) {
                    var x = arr[k]['product'];
                    var price = arr[k]['price'];
                    var photo = arr[k]["img"];
                    var qty = arr[k]['qty'];
                    var id = arr[k]['id'];
                    var len = arr.length;
                    a = a + 1;
                    total_p = total_p + (qty * price);
                    $(".cart").append(
                        '<li id="cartItem-' + qty + '">' +
                        '<a onclick="remove(' + id + ')" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>' +
                        '<a class="cart-img" href="' + baseUrl + '/-1' + id + '"><img src="' + photo + '"></a>' +
                        '<h4><a href="#">' + x + '</a></h4>' +
                        '<p class="quantity">' + qty + 'x - ' +
                        'Rs.<span class="amount" id="prct' + id + '">' + price + '</span>' +
                        '</p></li>');
                }
                $(".total-amount").text(total_p + " .Rs");
                $(".total-count").text(a);
                $(".cart-quantity").text(a);
                $.notify("Successfully Added To Cart.", "success");
            }
        }
    });
});

