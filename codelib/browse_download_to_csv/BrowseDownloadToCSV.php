// Retrieve parameters from the property
$downloadParams = nuGetProperty('BrowseDownloadParams');
$params = nuDecode($downloadParams); 

// Return  if parameters are not set
if (!$params) {
    return;
}

// Set default values for file export
$delimiter = $params['file_delimiter'] ?? ';';
$fileName = $params['file_name'] ?? 'browse-export.csv';
$sql = $params['sql'] ?? 'SELECT * from zzzzsys_object';
$sqlCode = $params['sql_code'] ?? '';

$tempTable = "";

// Execute SQL code if specified
if ($sqlCode) {
    $sql = nuSQL($sqlCode);
} else {
    // Check if SQL contains placeholder and replace it
    if (nuStringContains('___', $sql)) {
        nuEval("#form_id#" . "_BB"); // Evaluate to get TABLE_ID
        $tempTable = $_POST['nuHash']['TABLE_ID'];
        $sql = preg_replace("#___[\s\S]+___#im", $tempTable, $sql);
    }
}

// Return if SQL is not valid
if (!$sql) {
    return;
}

// Run the query
$stmt = nuRunQuery($sql);
$rows = db_fetch_array($stmt, true);

// Prepare column names from the result set
$columnNames = array();
if (!empty($rows)) {
    $firstRow = $rows[0];
    foreach ($firstRow as $colName => $val) {
        $columnNames[] = $colName;
    }
}

// Set headers for CSV export
header('Content-Encoding: UTF-8');
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('BOM: true'); // Ensure UTF-8 CSV files are correctly opened by Excel

// Open a file pointer for output
$fp = fopen('php://output', 'w');
fprintf($fp, chr(0xEF).chr(0xBB).chr(0xBF)); // Print the byte order mark for UTF-8

// Write the column names to the CSV
fputcsv($fp, $columnNames, $delimiter);

// Write data rows to the CSV
foreach ($rows as $row) {
    fputcsv($fp, $row, $delimiter);
}

// Close the file pointer
fclose($fp);

// Drop the temporary table if it was created
if ($tempTable) {
    nuRunQuery("DROP TABLE $tempTable");
}
