
window.addEventListener('DOMContentLoaded', function () {

    $(document).ready(function () {


        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.addToCartBtn').click(function (e) {
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },
                success: function (response) {
                    Swal.fire(response.status);
                }
            });
        });

        $('.delete-cart-item').click(function (e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/delete-cart-item",
                data: {
                    'product_id': product_id,
                },
                success: function (response) {
                    window.location.reload();
                    Swal.fire("", response.status, "success");
                }
            });
        });

        $('.changeQuantity').click(function (e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();


            data = {
                'product_id': product_id,
                'quantity': quantity,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/update-cart-item",
                data: data,
                success: function (response) {
                    window.location.reload();
                    Swal.fire("", response.status, "success");
                }

            });
        })

        $('input:checkbox').change(function (e) {
            e.preventDefault();
            var total = 0;
            $('input:checkbox:checked').each(function () {
                total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
            });

            $("#total").val(total);

        });





    })
});
