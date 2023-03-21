<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="{{url('/')}}/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript" src="https://parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript" src="https://parsleyjs.org/dist/parsley.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    /*append items start */
    

    $(document).ready(function() {
        $(".country").change(function() {
            var countryId = $(this).val();
            if (typeof(countryId) != 'undefined' && countryId != null) {
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{ url('get-city-by-country') }}",
                    type: "POST",
                    data: {
                        countryId: countryId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (!$.isEmptyObject(result)) {
                            $("#city-dropdown").append('<option value="">Select City</option>');
                            $.each(result, function(key, value) {
                                $("#city-dropdown").append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            //$("#state-dropdown").val(state);
                        } else {
                            $("#city-dropdown").append('<option value="">City not available</option>');
                        }

                    }
                });
            }
        });

        $('#mySelect2').select2();
        $('.mySelect2').select2();
        $(".toggle_sidebar").click(function() {
            event.preventDefault();
            $('body').toggleClass("active");
        });

        $(".mobile_close").click(function() {
            event.preventDefault();
            $('body').removeClass("active");
        });


        $(".add_items").click(function() {
            event.preventDefault();
            var add_row = '<tr class="order_row">' +
                '<td><select class="form-control"><option value="" disabled selected>Select Service</option><option> Unique website </option><option> Virtual Business Card </option><option> Branded presentation template </option></select></td>' +
                '<td><div class="sa-price">$3,630.00</div></td>' +
                '<td><input type="number" value="1" class="form-control qty_input"/></td>' +
                '<td><div class="sa-price">$3,630.00</div></td>' +
                '<td class="hide_tab"><span class="remove_item"><i class="fa-solid fa-minus"></i></span></td>' +
                '</tr>';

            // console.log(add_row)
            $('.orders_table .total_row').before(add_row);
        });


        $(document).on('click', '.remove_item', function() {
            $(this).parents('tr').remove();
        });

        /*append items start end */
        $(function() {
            var dateFormat = "mm/dd/yy",
                from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#to").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });



        // Bar chart
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                datasets: [{
                    label: 'Order No',
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    data: [15, 20, 30, 40],
                    order: 2,

                }, {
                    label: 'Revenue',
                    data: [10, 30, 70, 10],
                    type: 'line',
                    order: 1,
                    fill: false,
                    borderColor: 'rgba(255, 99, 132, 0.2)',
                    unitPrefix: "$",
                }],
                labels: ["21 June", "22 June", "23 June", "24 June"],
            },
            options: {

                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Orders & Revenue'
                }
            }
        });
    });
</script>

</body>

</html>