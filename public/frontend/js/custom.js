$(document).ready(function () {
    loadcart();
    loadwishlist();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function loadcart() {
        $.ajax({
            method: "GET",
            url: "load-cart-data",
            success: function (response) {
                $(".cart-count").html("");
                $(".cart-count").html(response.count);
            },
        });
    }
    function loadwishlist() {
        $.ajax({
            method: "GET",
            url: "load-wishlist-data",
            success: function (response) {
                $(".wishlist-count").html("");
                $(".wishlist-count").html(response.count);
            },
        });
    }

    $(".addToCartBtn").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                if (response.status == "Login to continue") {
                    swal({
                        title: "Bạn chưa đăng nhập?",
                        text: "Bạn cần đăng nhập để tiếp tục thao tác ",
                        icon: "warning",
                        buttons: {
                            cancel: "Hủy",
                            login: {
                                text: "Đăng nhập",
                                value_login: "login",
                            },
                        },
                    }).then((value_login) => {
                        if (value_login === "login") {
                            window.location.href = "/login";
                        }
                    });
                } else {
                    swal("Thêm thành công!!", response.status, "success");
                    loadcart();
                }
            },
        });
    });
    $(".increment-btn").click(function (e) {
        e.preventDefault();
        // var inc_value = $('.qty-input').val();
        var inc_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $('.qty-input').val(value);
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });
    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        var dec_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });
    $(".delete-cart-item").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();

        $.ajax({
            method: "POST",
            url: "deleta-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                window.location.reload();
                if (response.status) {
                    swal("Deleted successfully!!", response.status, "success");
                } else {
                    swal("Deleted successfully!!", "Unknown status", "success");
                }
                loadcart();
            },
        });
    });
    $(".remove-wishlist-item").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();

        $.ajax({
            method: "POST",
            url: "deleta-wishlist-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                window.location.reload();
                if (response.status) {
                    swal("Deleted successfully!!", response.status, "success");
                } else {
                    swal("Deleted successfully!!", "Unknown status", "success");
                }
                loadwishlist();
            },
        });
    });
    $(".changeQuantity").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var prod_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        data = {
            prod_id: prod_id,
            prod_qty: prod_qty,
        };
        $.ajax({
            method: "POST",
            url: "update-quantity",
            data: data,
            success: function (response) {
                window.location.reload();
            },
        });
    });
    $(".addToWishlish").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                if (response.status == "Login to continue") {
                    swal({
                        title: "Bạn chưa đăng nhập?",
                        text: "Bạn cần đăng nhập để tiếp tục thao tác ",
                        icon: "warning",
                        buttons: {
                            cancel: "Hủy",
                            login: {
                                text: "Đăng nhập",
                                value_login: "login",
                            },
                        },
                    }).then((value_login) => {
                        if (value_login === "login") {
                            window.location.href = "/login";
                        }
                    });
                } else {
                    swal("Thêm thành công!!", response.status, "success");
                    loadwishlist();
                    window.location.reload();
                }
            },
        });
    });
});

function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdown-content");
    dropdownContent.classList.toggle("show");
}
window.onclick = function (event) {
    if (!event.target.matches(".dropdown-button")) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
            }
        }
    }
};

// Thay đổi placeholder sau mỗi 3 giây
const inputElement = document.getElementById("inputFind");
const placeholders = [
    "Mua gì cũng có",
    "Giao hàng nhanh chóng",
    "Thịt,rau,cá gì cũng có",
];

let currentPlaceholderIndex = 0;

function changePlaceholder() {
    inputElement.placeholder = placeholders[currentPlaceholderIndex];
    currentPlaceholderIndex =
        (currentPlaceholderIndex + 1) % placeholders.length;
}

setInterval(changePlaceholder, 3000);
