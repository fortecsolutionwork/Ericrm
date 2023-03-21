<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="{{url('/')}}/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript" src="https://parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript" src="https://parsleyjs.org/dist/parsley.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    /*append items start */

    $(document).ready(function() {
        /* password check */
        $('#password').keyup(function() {
            var password = $('#password').val();
            if (checkStrength(password) == false) {
                alert("sdfsdf");
                $('button.btn.btn-primary.btn-lg').attr('disabled', true);
            }
        });

        $('#confirm-password').blur(function() {
            if ($('#password').val() !== $('#confirm-password').val()) {
                $('#popover-cpassword').removeClass('hide');
                //  $('.fakeanchor').attr('disabled', true);
                $('button.btn.btn-primary.btn-lg').attr('disabled', true);
            } else {
                $('#popover-cpassword').addClass('hide');
            }
        });

        $('#confirm-password').blur(function() {
            if ($('#password').val() !== $('#confirm-password').val()) {
                $('#popover-cpassword').removeClass('hide');
                $('button.btn.btn-primary.btn-lg').attr('disabled', true);
            } else {
                $('#popover-cpassword').addClass('hide');
            }
        });


        function checkStrength(password) {
            var strength = 0;
            $('button.btn.btn-primary.btn-lg').attr('disabled', true);
            //If password contains both lower and uppercase characters, increase strength value.
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                strength += 1;
                $('.low-upper-case').addClass('text-success');
                $('.low-upper-case i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');


            } else {
                $('.low-upper-case').removeClass('text-success');
                $('.low-upper-case i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has numbers and characters, increase strength value.
            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                strength += 1;
                $('.one-number').addClass('text-success');
                $('.one-number i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-number').removeClass('text-success');
                $('.one-number i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has one special character, increase strength value.
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                strength += 1;
                $('.one-special-char').addClass('text-success');
                $('.one-special-char i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-special-char').removeClass('text-success');
                $('.one-special-char i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            if (password.length > 7) {
                strength += 1;
                $('.eight-character').addClass('text-success');
                $('.eight-character i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.eight-character').removeClass('text-success');
                $('.eight-character i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            // If value is less than 2

            if (strength < 2) {
                $('#result').removeClass()
                $('#password-strength').addClass('progress-bar-danger');

                $('#result').addClass('text-danger').text('Very Week');
                $('#password-strength').css('width', '10%');
            } else if (strength == 2) {
                $('#result').addClass('good');
                $('#password-strength').removeClass('progress-bar-danger');
                $('#password-strength').addClass('progress-bar-warning');
                $('#result').addClass('text-warning').text('Week')
                $('#password-strength').css('width', '60%');
                return 'Week'
            } else if (strength == 4) {
                $('#result').removeClass()
                $('#result').addClass('strong');
                $('#password-strength').removeClass('progress-bar-warning');
                $('#password-strength').addClass('progress-bar-success');
                $('#result').addClass('text-success').text('Strength');
                $('#password-strength').css('width', '100%');
                $('button.btn.btn-primary.btn-lg').attr('disabled', false);

                return 'Strong'
            }

        }

        $(".country").change(function() {
            var countryId = $(this).val();


            $(".loader").addClass("fa fa-refresh fa-spin");

          
            $('#city-dropdown').empty();
            if (typeof(countryId) != 'undefined' && countryId != null) {
                $("#city-dropdown").append('<option value="">Select City</option>');
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
                            $(".loader").removeClass("fa fa-refresh fa-spin");
                            $.each(result, function(key, value) {
                                $("#city-dropdown").append('<option value="' + value.id +
                                    '">' + value.name + ' (' + value.state_code + ')</option>');
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