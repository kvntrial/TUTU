<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0777, true);
}
$dataFile = $dataDir . '/database.json';

// Initial default data matching the user's image and request
$defaultData = [
    'outlets' => ['DROPSHOT', 'SUASIKO', 'BENJAMIN'],
    'transactions' => [
        [
            'id' => 'tx_1',
            'outlet' => 'DROPSHOT',
            'date' => '2026-10-15',
            'dateDisplay' => '15 oct 2026',
            'cookies' => 156000,
            'cheesecake' => 120000,
            'total' => 276000,
            'pay' => 'Cash',
            'notes' => ''
        ],
        [
            'id' => 'tx_2',
            'outlet' => 'SUASIKO',
            'date' => '2026-10-19',
            'dateDisplay' => '19 oct 2026',
            'cookies' => 300000,
            'cheesecake' => 0,
            'total' => 300000,
            'pay' => 'Transfer',
            'notes' => ''
        ],
        [
            'id' => 'tx_3',
            'outlet' => 'BENJAMIN',
            'date' => '2026-10-20',
            'dateDisplay' => '20 oct 2026',
            'cookies' => 216000,
            'cheesecake' => 0,
            'total' => 216000,
            'pay' => 'Cash',
            'notes' => ''
        ]
    ]
];

$action = $_GET['action'] ?? 'get';

if ($action === 'get') {
    if (!file_exists($dataFile)) {
        file_put_contents($dataFile, json_encode($defaultData, JSON_PRETTY_PRINT));
        echo json_encode(['status' => 'success', 'data' => $defaultData]);
    } else {
        $content = file_get_contents($dataFile);
        $data = json_decode($content, true);
        if (!$data || !isset($data['outlets'])) {
            $data = $defaultData;
            file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
        }
        echo json_encode(['status' => 'success', 'data' => $data]);
    }
    exit;
}

if ($action === 'save' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw = file_get_contents('php://input');
    $payload = json_decode($raw, true);
    
    if (!$payload || !isset($payload['transactions'])) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid data payload']);
        exit;
    }
    
    file_put_contents($dataFile, json_encode($payload, JSON_PRETTY_PRINT));
    echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    exit;
}

if ($action === 'reset') {
    file_put_contents($dataFile, json_encode($defaultData, JSON_PRETTY_PRINT));
    echo json_encode(['status' => 'success', 'message' => 'Data direset ke awal', 'data' => $defaultData]);
    exit;
}

http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Aksi tidak dikenal']);
