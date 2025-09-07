<?php
$data = json_encode([5.1, 3.5, 1.4, 0.2]); // Encode array menjadi JSON string
$command = "python test.py " . escapeshellarg($data);
$output = shell_exec($command);

// Debugging: lihat output Python
echo "Output dari Python: " . $output;
