<?php
session_start(); // Start session if needed

// Include database connection if required
// include("dbConn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Collect and sanitize inputs
        $name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
        $age = isset($_POST['age']) ? (int)$_POST['age'] : null;
        $sex = htmlspecialchars($_POST['sex'] ?? '', ENT_QUOTES, 'UTF-8');
        $patientid = htmlspecialchars($_POST['patientId'] ?? '', ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES, 'UTF-8');
        $address = htmlspecialchars($_POST['address'] ?? '', ENT_QUOTES, 'UTF-8');
        $reason = htmlspecialchars($_POST['reason'] ?? '', ENT_QUOTES, 'UTF-8');
        $seriousIllness = htmlspecialchars($_POST['seriousIllness'] ?? '', ENT_QUOTES, 'UTF-8');

        // Dental History
        $dentalHistory = [
            'badBreath' => isset($_POST['badBreath']) ? "on" : "off",
            'bleedingGums' => isset($_POST['bleedingGums']) ? "on" : "off",
            'clickingJaw' => isset($_POST['clickingJaw']) ? "on" : "off",
            'foodCollecting' => isset($_POST['foodCollecting']) ? "on" : "off",
            'grindingTeeth' => isset($_POST['grindingTeeth']) ? "on" : "off",
            'looseTeeth' => isset($_POST['looseTeeth']) ? "on" : "off",
            'pain' => isset($_POST['pain']) ? "on" : "off",
            'sensitivityCold' => isset($_POST['sensitivityCold']) ? "on" : "off",
            'sensitivityHot' => isset($_POST['sensitivityHot']) ? "on" : "off",
            'sensitivitySweets' => isset($_POST['sensitivitySweets']) ? "on" : "off",
            'soresMouth' => isset($_POST['soresMouth']) ? "on" : "off",
            'swelling' => isset($_POST['swelling']) ? "on" : "off",
            'reactionAnesthetic' => isset($_POST['reactionAnesthetic']) ? "on" : "off",
        ];

        // Medical History
        $medicalHistory = [
            'pregnant' => isset($_POST['pregnant']) ? "on" : "off",
            'birthControl' => isset($_POST['birthControl']) ? "on" : "off",
            'nursing' => isset($_POST['nursing']) ? "on" : "off",
            'anemia' => isset($_POST['anemia']) ? "on" : "off",
            'arthritis' => isset($_POST['arthritis']) ? "on" : "off",
            'artificialDevices' => isset($_POST['artificialDevices']) ? "on" : "off",
            'asthma' => isset($_POST['asthma']) ? "on" : "off",
            'autoimmune' => isset($_POST['autoimmune']) ? "on" : "off",
            'bleedingProblem' => isset($_POST['bleedingProblem']) ? "on" : "off",
            'cancer' => isset($_POST['cancer']) ? "on" : "off",
            'hivAids' => isset($_POST['hivAids']) ? "on" : "off",
            'jawPain' => isset($_POST['jawPain']) ? "on" : "off",
            'kidneyDisease' => isset($_POST['kidneyDisease']) ? "on" : "off",
            'liverDisease' => isset($_POST['liverDisease']) ? "on" : "off",
            'osteoporosis' => isset($_POST['osteoporosis']) ? "on" : "off",
            'psychiatricTreatment' => isset($_POST['psychiatricTreatment']) ? "on" : "off",
            'respiratoryDisease' => isset($_POST['respiratoryDisease']) ? "on" : "off",
        ];

        // Allergies
        $allergies = [
            'localAnesthetic' => isset($_POST['localAnesthetic']) ? "on" : "off",
            'nsaid' => isset($_POST['nsaid']) ? "on" : "off",
            'penicillin' => isset($_POST['penicillin']) ? "on" : "off",
            'latex' => isset($_POST['latex']) ? "on" : "off",
            'others' => htmlspecialchars($_POST['others'] ?? '', ENT_QUOTES, 'UTF-8'),
        ];

        // Save data to session (optional)
        $_SESSION['patientData'] = [
            'name' => $name,
            'age' => $age,
            'sex' => $sex,
            'patientId' => $patientid,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'reason' => $reason,
            'seriousIllness' => $seriousIllness,
            'dentalHistory' => $dentalHistory,
            'medicalHistory' => $medicalHistory,
            'allergies' => $allergies,
        ];
        // Respond with success
        echo json_encode(['success' => true, 'message' => 'Data saved successfully!']);
    } catch (Exception $e) {
        // Respond with error
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
} else {
    // Invalid request method
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
