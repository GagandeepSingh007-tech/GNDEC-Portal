<?php


require_once(__DIR__ . '/../../config.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/training_letter/generate.php'));
require_login();

$student_name = required_param('student_name', PARAM_TEXT);
$crn          = required_param('crn', PARAM_TEXT);
$company      = required_param('company', PARAM_TEXT);
$duration     = required_param('duration', PARAM_TEXT);
$date_today   = date('d F Y');

$PAGE->set_title('Training Request Letter');
$PAGE->set_heading('GNDEC Training Request Letter');

echo $OUTPUT->header();
?>

<div class="card p-5 shadow-sm bg-white" id="printable-letter" style="max-width: 800px; margin: 0 auto; color: #000;">
    <div class="text-center mb-4">
        <h2>GURU NANAK DEV ENGINEERING COLLEGE</h2>
        <p class="text-muted mb-1">Ludhiana, Punjab - 141006</p>
        <hr>
        <h4 class="mt-3 text-primary">TRAINING REQUEST LETTER</h4>
    </div>

    <div class="row justify-content-between mb-4">
        <div class="col-6">
            <strong>Ref No:</strong> GNDEC/CSE/TR/<?php echo date('Y'); ?>/<?php echo rand(1000, 9999); ?>
        </div>
        <div class="col-6 text-end">
            <strong>Date:</strong> <?php echo $date_today; ?>
        </div>
    </div>

    <div class="mb-4">
        <p>To,</p>
        <p><strong>The HR / Training Manager</strong><br>
        <?php echo s($company); ?></p>
    </div>

    <p class="mb-3"><strong>Subject: Request for 6 Weeks / Months Industrial Training / Internship</strong></p>

    <p>Respected Sir/Madam,</p>

    <p class="text-justify">
        I am writing to formally request industrial training opportunities for our student at your esteemed organization. 
        <strong><?php echo s($student_name); ?></strong> is a dedicated student currently pursuing a Bachelor of Technology 
        in Computer Science and Engineering at Guru Nanak Dev Engineering College, Ludhiana, with CRN: <strong><?php echo s($crn); ?></strong>.
    </p>

    <p class="text-justify">
        As part of our curriculum requirements, students are required to undergo practical industrial training for a duration of 
        <strong><?php echo s($duration); ?></strong> to bridge academic concepts with real-world industry applications. Given your organization's 
        reputation for excellence in technology, we believe this training will provide invaluable hands-on experience.
    </p>

    <p class="text-justify">
        We request you to kindly consider <strong><?php echo s($student_name); ?></strong> for an internship or training program starting at your earliest convenience. 
        We assure you that our student will maintain high standards of discipline, professionalism, and commitment throughout the tenure.
    </p>

    <div class="mt-5">
        <p>Thanking you,</p>
        <br><br>
        <p><strong>Training and Placement Cell</strong><br>
        Department of Computer Science & Engineering<br>
        Guru Nanak Dev Engineering College, Ludhiana</p>
    </div>

    <div class="text-center mt-4 no-print">
        <button onclick="window.print();" class="btn btn-success btn-lg">🖨️ Print / Save as PDF</button>
        <a href="index.php" class="btn btn-secondary btn-lg ms-2">← Back to Form</a>
    </div>
</div>

<style>
@media print {
    body * { visibility: hidden; }
    #printable-letter, #printable-letter * { visibility: visible; }
    #printable-letter { position: absolute; left: 0; top: 0; width: 100%; box-shadow: none !important; border: none !important; }
    .no-print { display: none !important; }
}
</style>

<?php
echo $OUTPUT->footer();