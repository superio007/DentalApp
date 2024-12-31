<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <style>
        #main {
            /* background-color: #73c7e3; */
            position: relative;
            z-index: 1;
            background-color: #2e4a71;
            color: rgb(0, 0, 0);
        }

        label {
            color: #fff;
        }

        #date {
            outline: none;
            border: none;
            background-color: transparent;

            &::placeholder {
                color: #fff;
            }
        }
    </style>
</head>

<body>
    <?php
    include("dbConn.php");
    function getFormattedDate()
    {
        return date('d F Y');
    }
    function getPatientId()
    {
        return rand(000000, 999999);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $patientid = $_POST['patientId'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $reason = $_POST['reason'];
        $seriousIllness = $_POST['seriousIllness'];

        // var_dump("Form data received: name=$name, age=$age, sex=$sex, patientId=$patientid" . ", email=$email, phone=$phone, address=$address, reason=$reason, seriousIllness=$seriousIllness");

        $dentalHistory = array();
        $dentalHistory['badBreath'] = $_POST['badBreath'] ?? false;
        $dentalHistory['bleedingGums'] = $_POST['bleedingGums'] ?? false;
        $dentalHistory['clickingJaw'] = $_POST['clickingJaw'] ?? false;
        $dentalHistory['foodCollecting'] = $_POST['foodCollecting'] ?? false;
        $dentalHistory['grindingTeeth'] = $_POST['grindingTeeth'] ?? false;
        $dentalHistory['looseTeeth'] = $_POST['looseTeeth'] ?? false;
        $dentalHistory['pain'] = $_POST['pain'] ?? false;
        $dentalHistory['sensitivityCold'] = $_POST['sensitivityCold'] ?? false;
        $dentalHistory['sensitivityHot'] = $_POST['sensitivityHot'] ?? false;
        $dentalHistory['sensitivitySweets'] = $_POST['sensitivitySweets'] ?? false;
        $dentalHistory['soresMouth'] = $_POST['soresMouth'] ?? false;
        $dentalHistory['swelling'] = $_POST['swelling'] ?? false;
        $dentalHistory['reactionAnesthetic'] = $_POST['reactionAnesthetic'] ?? false;

        // var_dump("Dental History: " . json_encode($dentalHistory));

        $medicalHistory = array();
        $medicalHistory['pregnant'] = $_POST['pregnant'] ?? false;
        $medicalHistory['birthControl'] = $_POST['birthControl'] ?? false;
        $medicalHistory['nursing'] = $_POST['nursing'] ?? false;
        $medicalHistory['anemia'] = $_POST['anemia'] ?? false;
        $medicalHistory['arthritis'] = $_POST['arthritis'] ?? false;
        $medicalHistory['artificialDevices'] = $_POST['artificialDevices'] ?? false;
        $medicalHistory['asthma'] = $_POST['asthma'] ?? false;
        $medicalHistory['autoimmune'] = $_POST['autoimmune'] ?? false;
        $medicalHistory['bleedingProblem'] = $_POST['bleedingProblem'] ?? false;
        $medicalHistory['cancer'] = $_POST['cancer'] ?? false;
        $medicalHistory['hivAids'] = $_POST['hivAids'] ?? false;
        $medicalHistory['jawPain'] = $_POST['jawPain'] ?? false;
        $medicalHistory['kidneyDisease'] = $_POST['kidneyDisease'] ?? false;
        $medicalHistory['liverDisease'] = $_POST['liverDisease'] ?? false;
        $medicalHistory['osteoporosis'] = $_POST['osteoporosis'] ?? false;
        $medicalHistory['psychiatricTreatment'] = $_POST['psychiatricTreatment'] ?? false;
        $medicalHistory['respiratoryDisease'] = $_POST['respiratoryDisease'] ?? false;

        // var_dump("Medical History: " . json_encode($medicalHistory));

        $allergies = array();
        $allergies['localAnesthetic'] = $_POST['localAnesthetic'] ?? false;
        $allergies['nsaid'] = $_POST['nsaid'] ?? false;
        $allergies['penicillin'] = $_POST['penicillin'] ?? false;
        $allergies['latex'] = $_POST['latex'] ?? false;
        $allergies['others'] = $_POST['others'] ?? false;

        // var_dump("Allergies: " . json_encode($allergies));

        // Sanitize inputs
        $name = $conn->real_escape_string($_POST['name']);
        $age = (int)$_POST['age'];
        $sex = $conn->real_escape_string($_POST['sex']);
        $patientid = $conn->real_escape_string($_POST['patientId']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $address = $conn->real_escape_string($_POST['address']);
        $reason = $conn->real_escape_string($_POST['reason']);
        $seriousIllness = $conn->real_escape_string($_POST['seriousIllness']);
        $dentalHistory = [
            'badBreath' => isset($_POST['badBreath']) ? 1 : 0,
            'bleedingGums' => isset($_POST['bleedingGums']) ? 1 : 0,
            'clickingJaw' => isset($_POST['clickingJaw']) ? 1 : 0,
            'foodCollecting' => isset($_POST['foodCollecting']) ? 1 : 0,
            'grindingTeeth' => isset($_POST['grindingTeeth']) ? 1 : 0,
            'looseTeeth' => isset($_POST['looseTeeth']) ? 1 : 0,
            'pain' => isset($_POST['pain']) ? 1 : 0,
            'sensitivityCold' => isset($_POST['sensitivityCold']) ? 1 : 0,
            'sensitivityHot' => isset($_POST['sensitivityHot']) ? 1 : 0,
            'sensitivitySweets' => isset($_POST['sensitivitySweets']) ? 1 : 0,
            'soresMouth' => isset($_POST['soresMouth']) ? 1 : 0,
            'swelling' => isset($_POST['swelling']) ? 1 : 0,
            'reactionAnesthetic' => isset($_POST['reactionAnesthetic']) ? 1 : 0,
        ];
        $medicalHistory = [
            'pregnant' => isset($_POST['pregnant']) ? 1 : 0,
            'birthControl' => isset($_POST['birthControl']) ? 1 : 0,
            'nursing' => isset($_POST['nursing']) ? 1 : 0,
            'anemia' => isset($_POST['anemia']) ? 1 : 0,
            'arthritis' => isset($_POST['arthritis']) ? 1 : 0,
            'artificialDevices' => isset($_POST['artificialDevices']) ? 1 : 0,
            'asthma' => isset($_POST['asthma']) ? 1 : 0,
            'autoimmune' => isset($_POST['autoimmune']) ? 1 : 0,
            'bleedingProblem' => isset($_POST['bleedingProblem']) ? 1 : 0,
            'cancer' => isset($_POST['cancer']) ? 1 : 0,
            'hivAids' => isset($_POST['hivAids']) ? 1 : 0,
            'jawPain' => isset($_POST['jawPain']) ? 1 : 0,
            'kidneyDisease' => isset($_POST['kidneyDisease']) ? 1 : 0,
            'liverDisease' => isset($_POST['liverDisease']) ? 1 : 0,
            'osteoporosis' => isset($_POST['osteoporosis']) ? 1 : 0,
            'psychiatricTreatment' => isset($_POST['psychiatricTreatment']) ? 1 : 0,
            'respiratoryDisease' => isset($_POST['respiratoryDisease']) ? 1 : 0,
        ];
        $allergies = [
            'localAnesthetic' => isset($_POST['localAnesthetic']) ? 1 : 0,
            'nsaid' => isset($_POST['nsaid']) ? 1 : 0,
            'penicillin' => isset($_POST['penicillin']) ? 1 : 0,
            'latex' => isset($_POST['latex']) ? 1 : 0,
            'others' => $conn->real_escape_string($_POST['others'] ?? ''),
        ];

        // Construct SQL query
        $sql = "
INSERT INTO patient_records (
    name, age, sex, patient_id, email, phone, address, reason, serious_illness, 
    bad_breath, bleeding_gums, clicking_jaw, food_collecting, grinding_teeth, loose_teeth, pain, 
    sensitivity_cold, sensitivity_hot, sensitivity_sweets, sores_mouth, swelling, reaction_anesthetic, 
    pregnant, birth_control, nursing, anemia, arthritis, artificial_devices, asthma, autoimmune, 
    bleeding_problem, cancer, hiv_aids, jaw_pain, kidney_disease, liver_disease, osteoporosis, 
    psychiatric_treatment, respiratory_disease, local_anesthetic, nsaid, penicillin, latex, others
) VALUES (
    '$name', $age, '$sex', '$patientid', '$email', '$phone', '$address', '$reason', '$seriousIllness',
    {$dentalHistory['badBreath']}, {$dentalHistory['bleedingGums']}, {$dentalHistory['clickingJaw']}, 
    {$dentalHistory['foodCollecting']}, {$dentalHistory['grindingTeeth']}, {$dentalHistory['looseTeeth']}, {$dentalHistory['pain']}, 
    {$dentalHistory['sensitivityCold']}, {$dentalHistory['sensitivityHot']}, {$dentalHistory['sensitivitySweets']}, 
    {$dentalHistory['soresMouth']}, {$dentalHistory['swelling']}, {$dentalHistory['reactionAnesthetic']}, 
    {$medicalHistory['pregnant']}, {$medicalHistory['birthControl']}, {$medicalHistory['nursing']}, 
    {$medicalHistory['anemia']}, {$medicalHistory['arthritis']}, {$medicalHistory['artificialDevices']}, 
    {$medicalHistory['asthma']}, {$medicalHistory['autoimmune']}, {$medicalHistory['bleedingProblem']}, 
    {$medicalHistory['cancer']}, {$medicalHistory['hivAids']}, {$medicalHistory['jawPain']}, 
    {$medicalHistory['kidneyDisease']}, {$medicalHistory['liverDisease']}, {$medicalHistory['osteoporosis']}, 
    {$medicalHistory['psychiatricTreatment']}, {$medicalHistory['respiratoryDisease']}, 
    {$allergies['localAnesthetic']}, {$allergies['nsaid']}, {$allergies['penicillin']}, {$allergies['latex']}, '{$allergies['others']}'
)";

        // Execute query
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
    <?php // include("slider.php"); 
    ?>
    <div id="main">
        <div class="container py-4">
            <div class="text-center mb-4">
                <h4 class="fw-bold text-white">CASE HISTORY / OPD</h4>
            </div>

            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-6 d-flex align-items-center gap-2">
                        <label for="date" class="form-label mb-0"><b>Date:</b></label>
                        <input
                            type="text"
                            required
                            id="date"
                            class="form-control"
                            placeholder="<?php echo getFormattedDate(); ?>"
                            disabled />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name<span style="color:red;"> * </span></label>
                        <input
                            type="text"
                            required
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="Enter name" />
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="age" class="form-label">Age<span style="color:red;"> * </span></label>
                                <input
                                    type="text"
                                    id="age"
                                    required
                                    name="age"
                                    class="form-control"
                                    placeholder="Enter age" />
                            </div>
                            <div class="col-md-6">
                                <label for="sex" class="form-label">Sex<span style="color:red;"> * </span></label>
                                <select class="form-select" name="sex" id="" required>
                                    <option value="#" selected hidden>Please Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="patient-id" class="form-label">Patient ID<span style="color:red;"> * </span></label>
                                <input
                                    type="text"
                                    id="patient-id"
                                    readonly
                                    name="patientId"
                                    required
                                    value="<?php echo getPatientId(); ?>"
                                    class="form-control"
                                    placeholder="Enter patient ID" />
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email<span style="color:red;"> * </span></label>
                                <input
                                    type="email"
                                    required
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Enter email" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address<span style="color:red;"> * </span></label>
                                <input
                                    type="text"
                                    required
                                    id="address"
                                    name="address"
                                    class="form-control"
                                    placeholder="Enter address" />
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone<span style="color:red;"> * </span></label>
                                <input
                                    type="text"
                                    required
                                    id="phone"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Enter phone" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold text-white">DENTAL HISTORY</h5>
                    <label for="reason" class="form-label">Reason for Today's Visit:</label>
                    <textarea id="reason" name="reason" class="form-control mb-3" rows="2"></textarea>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="badBreath"
                                    name="badBreath" />
                                <label for="badBreath" class="form-check-label">Bad Breath</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="bleedingGums"
                                    name="bleedingGums" />
                                <label for="bleedingGums" class="form-check-label">Bleeding Gums</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="clickingJaw"
                                    name="clickingJaw" />
                                <label for="clickingJaw" class="form-check-label">Clicking or Popping Jaw</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="foodCollecting"
                                    name="foodCollecting" />
                                <label for="foodCollecting" class="form-check-label">Food Collecting Between Teeth</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="grindingTeeth"
                                    name="grindingTeeth" />
                                <label for="grindingTeeth" class="form-check-label">Grinding Teeth</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="looseTeeth"
                                    name="looseTeeth" />
                                <label for="looseTeeth" class="form-check-label">Loose Teeth or Broken Fillings</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="pain" name="pain" />
                                <label for="pain" class="form-check-label">Pain</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="sensitivityCold"
                                    name="sensitivityCold" />
                                <label for="sensitivityCold" class="form-check-label">Sensitivity to Cold</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="sensitivityHot"
                                    name="sensitivityHot" />
                                <label for="sensitivityHot" class="form-check-label">Sensitivity to Hot</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="sensitivitySweets"
                                    name="sensitivitySweets" />
                                <label for="sensitivitySweets" class="form-check-label">Sensitivity to Sweets</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="soresMouth"
                                    name="soresMouth" />
                                <label for="soresMouth" class="form-check-label">Sores or Growths in Mouth</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="swelling"
                                    name="swelling" />
                                <label for="swelling" class="form-check-label">Swelling</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="reactionAnesthetic"
                                    name="reactionAnesthetic" />
                                <label for="reactionAnesthetic" class="form-check-label">Reaction to Local Anesthetics</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold text-white">MEDICAL HISTORY</h5>
                    <div class="mb-3">
                        <label for="seriousIllness" class="form-label">Have you had any serious illness or operation?</label>
                        <textarea
                            id="seriousIllness"
                            class="form-control"
                            name="seriousIllness"
                            rows="2"></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="pregnant" name="pregnant" />
                                <label for="pregnant" class="form-check-label">Are you Pregnant?</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="nursing"
                                    name="nursing" />
                                <label for="nursing" class="form-check-label">Nursing</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="birthControl"
                                    name="birthControl" />
                                <label for="birthControl" class="form-check-label">Taking Birth Control Pills</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold text-white">MEDICAL HISTORY</h5>
                    <label class="form-label">Check (✔) YES/NO if you had problems with the following:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="anemia"
                                    name="anemia" />
                                <label for="anemia" class="form-check-label">Anemia</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="arthritis"
                                    name="arthritis" />
                                <label for="arthritis" class="form-check-label">Arthritis, Rheumatism</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="artificialDevices"
                                    name="artificialDevices" />
                                <label for="artificialDevices" class="form-check-label">Artificial Devices or Joints</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="asthma"
                                    name="asthma" />
                                <label for="asthma" class="form-check-label">Asthma</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="autoimmune"
                                    name="autoimmune" />
                                <label for="autoimmune" class="form-check-label">Autoimmune Condition</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="bleedingProblem"
                                    name="bleedingProblem" />
                                <label for="bleedingProblem" class="form-check-label">Bleeding Problem</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="cancer" name="cancer" />
                                <label for="cancer" class="form-check-label">Cancer</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="hivAids" name="hivAids" />
                                <label for="hivAids" class="form-check-label">HIV/AIDS</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="jawPain" name="jawPain" />
                                <label for="jawPain" class="form-check-label">Jaw Pain</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="kidneyDisease"
                                    name="kidneyDisease" />
                                <label for="kidneyDisease" class="form-check-label">Kidney Disease</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="liverDisease"
                                    name="liverDisease" />
                                <label for="liverDisease" class="form-check-label">Liver Disease</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="osteoporosis"
                                    name="osteoporosis" />
                                <label for="osteoporosis" class="form-check-label">Osteoporosis</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="psychiatricTreatment"
                                    name="psychiatricTreatment" />
                                <label for="psychiatricTreatment" class="form-check-label">Psychiatric Treatment</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="respiratoryDisease"
                                    name="respiratoryDisease" />
                                <label for="respiratoryDisease" class="form-check-label">Respiratory Disease</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold text-white">ALLERGIES</h5>
                    <label class="form-label">Check (✔) YES/NO if you had Allergies with the following:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="localAnesthetic"
                                    name="localAnesthetic" />
                                <label for="localAnesthetic" class="form-check-label">Local Anesthetic</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="nsaid" name="nsaid" />
                                <label for="nsaid" class="form-check-label">NSAID</label>
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="penicillin"
                                    name="penicillin" />
                                <label for="penicillin" class="form-check-label">Penicillin</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="latex" name="latex" />
                                <label for="latex" class="form-check-label">Latex</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="others" id="others" />
                                <label for="others" class="form-check-label">Others</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>

    </script>
</body>

</html>