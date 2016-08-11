<?php


include 'models/my_patient.php';

$patient_model = new my_patient();

$patients = $patient_model->list_all();
$patients_group = $patient_model->list_age_group();

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>El País Test</title>
    <meta name="description" content="El País programming test">
    <meta name="author" content="assistrx-dw">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <h1>Patient Listing</h1>

        <p>
            <label for="patient_filter">Filter by Name</label>
            <input type="text" name="patient_filter" id="filtro"/>
            <label for="patient_filter_age">Filter age from</label>
            <input type="text" name="patient_filter_age" id="filtro_edad"/>
        </p>

        <p>
            <label for="patient_filter">Number of patients grouped by age</label>
            <ul>
                <!-- Punto 3 Listar numero de paciente por edades -->
                <li id="list_group_age"><a href="javascript:mostrar_age(1)"><span>Age:  </span><span>Patients quantity: </span></a></li>
                <?php foreach($patients_group as $patients_age): ?>
                    <li class="list_group_age_dat"><span>Age: <?php echo $patients_age->patient_age; ?> </span><span>Patients quantity: <?php echo $patients_age->cantidad; ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </p>

        <div class="row">
            <div class="col-xs-4">Name</div>
            <div class="col-xs-4 visible-lg-block">Age</div>
            <div class="col-xs-4">Phone</div>
        </div>

        <!-- Punto 4 Esconde la columna Age para móviles -->
        <div id="all_pacientes">
        <?php foreach($patients as $patient): ?>
            <div class="row paciente">
                <div class="col-xs-4 nombre"><?php echo $patient->patient_name; ?></div>
                <div class="col-xs-4 visible-lg-block"><?php echo $patient->patient_age; ?></div>
                <div class="col-xs-4"><?php echo $patient->patient_phone; ?></div>
            </div>
        <?php endforeach; ?>
        </div>

    </div>

    <!-- scripts at the bottom! -->
    <script src="public/js/jquery-1.9.1.min.js"></script>

    <!-- this script file is for global js -->
    <script src="public/js/script.js"></script>
</body>
</html>
