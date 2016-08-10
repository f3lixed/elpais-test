<?php 

include 'models/my_patient.php';

$patient_model = new my_patient();

$patients = $patient_model->list_all("'".$_REQUEST["edad"]."'");

foreach($patients as $patient){ ?>
<div class="row paciente">
    <div class="col-xs-4 nombre"><?php echo $patient->patient_name; ?></div>
    <div class="col-xs-4 visible-lg-block"><?php echo $patient->patient_age; ?></div>
    <div class="col-xs-4"><?php echo $patient->patient_phone; ?></div>
</div>

<?php } ?> 
