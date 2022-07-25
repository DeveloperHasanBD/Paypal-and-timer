<?php

/**
 * template name: ASSESMENT
 */
get_header();

// if (function_exists('get_field')) {

//     $abtgr_section_showhide = get_field('abtgr_section_showhide');

//     if (1 == $abtgr_section_showhide) {
//         get_template_part('page-templates/about/sec-1-hero');
//     }
// }


$asmt_assesment_time = get_field('asmt_assesment_time');

?>
<input type="hidden" id="get_exam_time" value="<?php echo $asmt_assesment_time; ?>">
<section class="accordion_header">
    <div class="select_header">
        <div class="container">
            <div class="row">
                <h2>ENGLISH ASSESSMENT</h2>
            </div>
        </div>
    </div>
</section>
<!-- start assesment  -->
<div class="set_notice_for_assesment">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="srt_assesment_form_message">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="srt_assesment_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="assesment_top_info">
                    <h2>Level 1 Initial Literacy Assessment Tool</h2>
                    <h3>Reading and Writing Assessment</h3>
                    <br>
                    <p> <strong><i>Reading Criteria:</i> </strong> A minimum of 5 Questions must be answered correctly to Pass</p>
                    <p><strong>Writing Criteria:</strong></p>
                    <br>
                    <p>Minimum of 50 words used in each section.Writing must be easily read - letters/words should be clearly formed.
                        Writing must be easily read - letters/words should be clearly formed.
                        Most words should be spelt correctly. Any misspelt words should not stop the reader from understanding what has been written.
                        Majority of capital letters, full stops, question marks or exclamation marks used in the correct place.
                        Correct tense used in the majority of written work</p>
                    <br>
                    <p><strong>Time:</strong> 30 Minutes</p>

                </div>
                <div class="assesment_bottom_form_info">
                    <form id="assesment_form" action="">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>Name</strong>:</td>
                                    <td><input id="get_name" name="name" type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong>:</td>
                                    <td><input id="get_email" name="email" type="email" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><strong>Course name</strong>:</td>
                                    <td>
                                        <select id="get_course" name="course" class="form-select" aria-label="Default select example">
                                            <option value="" disabled selected>Select course name</option>

                                            <?php get_mcq_can_name(); ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Course Date</strong> :</td>
                                    <td><input id="get_date" name="date" type="date" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><strong> Date of Assessment</strong>:</td>
                                    <td><input id="get_date_of_assesment" name="date_of_assesment" type="date" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><strong>Start Time</strong> :</td>
                                    <td><input id="get_time" name="time" type="time"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="card text-center">
                            <div class="card-header">
                                <h4>100% Delivery Service <br>
                                    Slough Industrial Estate <br>
                                    Berks. SL33 3PT</h4>
                                <div class="table_top_info">
                                    <p>Tel: 01753 630525</p>
                                    <p>100%DS@delivery.com</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="asses_top_notice">
                                    <h4><strong><i>Date: 1 May 2015</i></strong></h4>
                                    <h4><strong><i>Time: 6.35 p.m.</i></strong></h4>
                                    <h4><strong><i>Parcel No: SB 1050</i></strong></h4>
                                </div>

                                <div class="asses_long_desc">
                                    <p><br>
                                        We have attempted to deliver the above parcel to you at: <br><br>

                                        Wellington House, High Road, Slough. SL14 5PJ <br><br>

                                        As there was no one to receive the package, we are returning it to our local <br><br>depot, telephone number as above. <br><br>

                                        Please contact us as soon as possible to arrange EITHER: <br><br>

                                        a)Collection from the depot (please bring this card and some form of ID). <br><br>

                                        b)Redelivery to this address at a mutually convenient time during our normal <br>working hours which are 8 a.m. to 7 p.m. This will cost you £5.00. <br> <br>

                                        <strong>Please note: we are unable to leave the package without a signature, or deliver it to an alternative address without written authority of the sender.</strong>
                                    </p>
                                </div>

                            </div>

                            <div class="start_exam">
                                <p class="btn btn-info">START</p>
                            </div>
                            <div class="card-footer text-muted bottom_mcq_dgn">
                                <div class="specefic_info">
                                    <h4>Time Remaining:</h4>
                                    <span id="timer_div"> </span>
                                    <div class="set_min_input"> </div>
                                    <input type="hidden" id="secounds" value="00">
                                </div>
                                <div id="set_mcq_as_category"></div>
                            </div>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- start assesment  -->
<?php
get_footer();
