<?php


require_once(__DIR__ . '/../../config.php');


$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/training_letter/index.php'));
$PAGE->set_title(get_string('pluginname', 'local_training_letter'));
$PAGE->set_heading(get_string('pluginname', 'local_training_letter'));


require_login();


echo $OUTPUT->header();

echo '<div class="card p-4 shadow-sm">';
echo '<h3>Welcome to GNDEC Training Letter Generator</h3>';
echo '<p class="text-muted">Fill in your training details below to generate your official request letter.</p>';


echo '<form method="POST" action="generate.php">';
echo '<div class="mb-3"><label class="form-label">Student Name</label><input type="text" name="student_name" class="form-control" placeholder="Enter Name" required></div>';
echo '<div class="mb-3"><label class="form-label">CRN / University Roll Number</label><input type="text" name="crn" class="form-control" placeholder="Enter crn" required></div>';
echo '<div class="mb-3"><label class="form-label">Company / Organization Name</label><input type="text" name="company" class="form-control" placeholder="Enter company" required></div>';
echo '<div class="mb-3"><label class="form-label">Training Duration (Weeks/Months)</label><input type="text" name="duration" class="form-control" placeholder="e.g., 6 Weeks" required></div>';
echo '<button type="submit" class="btn btn-primary">Generate Training Letter</button>';
echo '</form>';

echo '</div>';


echo $OUTPUT->footer();