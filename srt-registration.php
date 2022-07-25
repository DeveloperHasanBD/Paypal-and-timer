<script>
	// location.reload();
</script>

<?php
/**
 * template name: REGISTRATION
 */
get_header();

if (function_exists('get_field')) {

	$hm_sec_1_section_showhide = get_field('hm_sec_1_section_showhide');
	if (1 == $hm_sec_1_section_showhide) {
		// get_template_part('page-templates/home/sec-1');
	}
}
$course_name = $_POST['course_name'] ?? '';
$course_location = $_POST['course_location'] ?? '';
$course_date = $_POST['course_date'] ?? '';
$course_payment_type = $_POST['course_payment_type'] ?? '';
$course_price = $_POST['course_price'] ?? '';
$course_pay = $_POST['course_pay'] ?? '';
?>

<input id="rg_mail_text" type="hidden" value="<?php echo get_field('rg_mail_text', 'option');?>" >
<input id="rg_mail_image" type="hidden" value="<?php echo get_field('rg_mail_image', 'option');?>" >




<section class="course_details_content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div id="srt_payment_msg"></div>
				<div class="course_detail_inner">
					<form action="">
						<div class="details_course">
							<h2>Course Details</h2>
						</div>
						<div class="details_address">
							<table class="table table-bordered">

								<tr>
									<td>
										<p><b>Name :</b><?php echo $course_name; ?></p>
										<input id="course_name" type="hidden" value="<?php echo $course_name; ?>">
									</td>
								</tr>
								<tr>
									<td>
										<p><b>Location :</b><?php echo $course_location; ?></p>
										<input id="course_location" type="hidden" value="<?php echo $course_location; ?>">

									</td>
								</tr>
								<tr>
									<td>
										<p><b>Course Date :</b><?php echo $course_date; ?></p>
										<input id="course_date" type="hidden" value="<?php echo $course_date; ?>">

									</td>
								</tr>
								<tr>
									<td>
										<p><b>Payment Type:</b><?php echo $course_payment_type; ?></p>
										<input id="course_payment_type" type="hidden" value="<?php echo $course_payment_type; ?>">
									</td>
								</tr>
								<td>
									<p><b>Price :</b><span><i class="fa-solid fa-sterling-sign"></i></span><?php echo $course_price; ?></p>
								</td>
								</tr>
								<tr>
									<td>
										<p><b>Pay :</b><span><i class="fa-solid fa-sterling-sign"></i></span><?php echo $course_pay; ?></p>
										<input id="get_total_ant" type="hidden" value="<?php echo $course_price; ?>">
										<input id="get_course_pay" type="hidden" value="<?php echo $course_pay; ?>">
									</td>
								</tr>
							</table>
						</div>
						<div class="details_learner">
							<div class="learner_details">
								<h2>Learner Details</h2>
							</div>
						</div>
						<div class="details_form">

							<div class="form">
								<input id="fname" type="text" name="fname" placeholder="Name*">
								<input id="address1" type="text" name="address1" placeholder="Address Line 1*">
								<input id="address2" type="text" name="address2" placeholder="Address Line 2*">
								<input id="city" type="text" name="city" placeholder="City*">
								<input id="post_code" type="text" name="post_code" placeholder="Post Code*">
							</div>

						</div>
						<div class="details_contact">
							<div class="contact_detalis">
								<h2>Contact Details</h2>
							</div>
						</div>
						<div class="details_form2">

							<div class="form">
								<input id="email" type="text" name="email" placeholder="Email*">
								<input id="phone" type="text" name="phone" placeholder="Phone*">
							</div>

						</div>
						<div class="details_payment">
							<div class="payment_details">
								<h2>Payment</h2>
							</div>
						</div>
						<div class="details_card">
							<div id="paypal-button-container" class="mt-3"></div>
						</div>
					</form>

				</div>
			</div>
		</div>

	</div>
</section>

<?php
get_footer();