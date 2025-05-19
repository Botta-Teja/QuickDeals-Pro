<?php
$outputFile = 'combined.php';
$files = glob('*.php'); // Get all PHP files in current directory

// Remove the combiner script and output file from the list
$files = array_diff($files, array('combine.php', $outputFile));

// Start output buffer
$combinedContent = "<?php\n\n// Combined PHP Files\n// Generated on " . date('Y-m-d H:i:s') . "\n\n";

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    // Add file header
    $combinedContent .= "\n\n// ======== FILE: $file ========\n\n";
    
    // Remove opening PHP tag if exists
    $content = preg_replace('/^<\?php/', '', $content);
    
    // Remove closing PHP tag if exists
    $content = preg_replace('/\?>\s*$/', '', $content);
    
    $combinedContent .= trim($content) . "\n";
}

file_put_contents($outputFile, $combinedContent);

echo "Combined $outputFile created successfully with " . count($files) . " files!\n";
?>