(function ($) {

  $(document).ready(function () {


    $(".start_exam").on('click', function () {
      var get_name = $("#get_name").val();
      var get_email = $("#get_email").val();
      var get_course = $("#get_course").val();
      var get_date = $("#get_date").val();
      var get_date_of_assesment = $("#get_date_of_assesment").val();
      var get_time = $("#get_time").val();
      if (get_name && get_email && get_course && get_date && get_date_of_assesment && get_time) {
        $(this).css({ 'display': 'none' });
        $(".bottom_mcq_dgn").slideToggle();
        var get_exam_time = $("#get_exam_time").val();
        var set_exam_time = parseInt(get_exam_time);
        $(".set_min_input").html('<input type="hidden" id="minutes" value="' + set_exam_time + '">');
        showTimer();
      } else {
        alert("Please fill up the form correctly before start the Exam");
      }
    })

    function showTimer() {
      var minutes = $("#minutes").val();
      var secounds = $("#secounds").val();
      if (minutes < 10) {
        minutes = '0' + minutes;
      }
      if (secounds > 60) {
        secounds = 60;
      }
      if (secounds < 10) {
        secounds = '0' + secounds;
      }
      var time = "00: " + minutes + ": " + secounds;
      console.log(time);
      timer_div = document.getElementById("timer_div");
      timer_div.innerHTML = time;
      my_timer = setInterval(function () {
        var hr = 0;
        var min = 0;
        var sec = 0;
        var time_up = false;
        t = time.split(":");
        hr = parseInt(t[0]);
        min = parseInt(t[1]);
        sec = parseInt(t[2]);
        if (sec == 0) {
          if (min > 0) {
            sec = 59;
            min--;
          } else if (hr > 0) {
            min = 59;
            sec = 59;
            hr--;
          } else {
            time_up = true;
          }
        } else {
          sec--;
        }
        if (hr < 10) {
          hr = "0" + hr;
        }
        if (min < 10) {
          min = "0" + min;
        }
        if (sec < 10) {
          sec = "0" + sec;
        }
        time = hr + " :" + min + " :" + sec;
        if (time_up) {
          time = "TIME UP";
        }
        timer_div = document.getElementById("timer_div");
        timer_div.innerHTML = time;
        if (time_up) {
          $('#assesment_form').submit();
          clearInterval(my_timer);
          $(".srt_assesment_section").css({ 'display': 'none' });
        }
      }, 1000);
    }

    // user reggistration 
    var course_name = $("#course_name").val();
    var course_location = $("#course_location").val();
    var course_date = $("#course_date").val();
    var course_payment_type = $("#course_payment_type").val();
    var pay_amount = $("#get_total_ant").val();
    var get_course_pay = $("#get_course_pay").val();
    var rg_mail_text = $("#rg_mail_text").val();
    var rg_mail_image = $("#rg_mail_image").val();

    var logged_id_user_id = 1;

    paypal.Button.render({
      env: 'production', // sandbox | production
      // PayPal Client IDs - replace with your own
      // Create a PayPal app: https://developer.paypal.com/developer/applications/create
      client: {
        // sandbox: 'AaLV4C1_8HnbDweIBa6P3v5-zwaXjUjKrn5mmwQS5dvUyfqSmVNZcdwlfWH6VMbdmu9v6HAynYFnL7W9',
        production: 'AbCIqM1miXdgkFr-v4CLu2sSs6J3nA_7GCExLrb4mHhDgtG5E2d9n_fqX6FEOtfaDNGAOClo18gKFHtf',
      },
      // Show the buyer a 'Pay Now' button in the checkout flow
      commit: true,
      // payment() is called when the button is clicked
      payment: function (data, actions) {
        // Make a call to the REST api to create the payment
        return actions.payment.create({
          payment: {
            transactions: [
              {
                amount: { total: get_course_pay, currency: 'GBP' }
              }
            ]
          }
        });
      },
      // onAuthorize() is called when the buyer approves the payment
      onAuthorize: function (data, actions) {
        // Make a call to the REST api to execute the payment
        return actions.payment.execute().then(function (payment) {
          var is_approve = payment.state;
          if ('approved' == is_approve) {
            var fname = $("#fname").val();
            var address1 = $("#address1").val();
            var address2 = $("#address2").val();
            var city = $("#city").val();
            var post_code = $("#post_code").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var url = action_url_ajax.ajax_url;
            $.ajax({
              url: url,
              data: '&action=' + 'srt_payment_form' + '&param=' + 'srt_paypal' + '&pay_amount=' + pay_amount + '&get_course_pay=' + get_course_pay + '&course_name=' + course_name + '&course_location=' + course_location + '&course_date=' + course_date + '&course_payment_type=' + course_payment_type + '&fname=' + fname + '&address1=' + address1 + '&address2=' + address2 + '&city=' + city + '&post_code=' + post_code + '&email=' + email + '&phone=' + phone + '&rg_mail_text=' + rg_mail_text + '&rg_mail_image=' + rg_mail_image,
              type: 'post',
              success: function (data) {
                $("#srt_payment_msg").html(data);
              }
            });
          } else {
            window.alert('Payment Not Complete! Please try again');
          }
        });
      }
    }, '#paypal-button-container');



  })

})(jQuery)