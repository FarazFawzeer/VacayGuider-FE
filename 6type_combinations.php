<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit', '2048M'); // Increased memory for larger dataset

// Define all rule types and their options
$ruleTypes = [
    'Subtotal' => [
        'Subtotal Logic' => ['>', '>=', '<', '<='],
        'Select Bank' => ['card checkout commercial', 'koko', 'Mint']
    ],
    'Category' => [
        'Select Bank' => ['card checkout commercial', 'koko', 'Mint'],
        'Select Inclusion' => ['In List', 'Not In List']
    ],
    'All Products' => [
        'Select Bank' => ['card checkout commercial', 'koko', 'Mint']
    ],
    'Products' => [
        'Select Bank' => ['card checkout commercial', 'koko', 'Mint'],
        'Select Inclusion' => ['In List', 'Not In List']
    ],
    'Brand' => [
        'Select Bank' => ['card checkout commercial', 'koko', 'Mint'],
        'Select Inclusion' => ['In List', 'Not In List']
    ],
    'Product Quantity' => [
        'Quantity Logic' => ['>', '>=', '<', '<='],
        'Select Bank' => ['card checkout commercial', 'koko', 'Mint']
    ]
];

// Discount types (applies to all rules)
$discountTypes = ['Percentage', 'Fixed amount', 'Fixed price per item'];

// There's only ONE combination when using all 6 types
$typeCombinations = [
    ['Subtotal', 'Category', 'All Products', 'Products', 'Brand', 'Product Quantity']
];

// Function to generate all combinations for a single rule type
function generateRuleCombinations($ruleType, $ruleDefinitions) {
    $options = $ruleDefinitions[$ruleType];
    $combinations = [[]];
    
    foreach ($options as $optionName => $values) {
        $temp = [];
        foreach ($combinations as $combo) {
            foreach ($values as $value) {
                $temp[] = $combo + [$optionName => $value];
            }
        }
        $combinations = $temp;
    }
    
    return $combinations;
}

// Generate CSV header
$header = ['Combination ID', 'Discount Type'];
foreach (range(1, 6) as $i) {
    $header[] = "Rule Type $i";
    $header[] = "Options $i";
}

// Output to browser as CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="6type_combinations.csv"');
$output = fopen('php://output', 'w');
fputcsv($output, $header);

// Counter for combination IDs
$combinationId = 1;

// Generate all possible scenarios
foreach ($typeCombinations as $types) {
    // Generate all sub-option combinations for each rule
    $ruleCombinations = [];
    foreach ($types as $type) {
        $ruleCombinations[$type] = generateRuleCombinations($type, $ruleTypes);
    }
    
    // Cross-product of all rule combinations
    $scenarios = [[]];
    foreach ($types as $type) {
        $temp = [];
        foreach ($scenarios as $scenario) {
            foreach ($ruleCombinations[$type] as $ruleCombo) {
                $temp[] = $scenario + [$type => $ruleCombo];
            }
        }
        $scenarios = $temp;
    }
    
    // Add discount type to each scenario
    foreach ($discountTypes as $discountType) {
        foreach ($scenarios as $scenario) {
            $row = [
                $combinationId++,
                $discountType
            ];
            
            // Add all 6 rule types and their options
            foreach ($types as $type) {
                $row[] = $type;
                $options = [];
                foreach ($scenario[$type] as $opt => $val) {
                    $options[] = "$opt: $val";
                }
                $row[] = implode(' | ', $options);
            }
            
            fputcsv($output, $row);
        }
    }
}

// Calculate totals
$totalPerGroup = 1; // Only 1 group for 6 types
foreach ($ruleTypes as $type => $options) {
    $totalPerGroup *= array_product(array_map('count', $options));
}
$totalCombinations = $totalPerGroup * count($discountTypes);

// Add summary as comment at the end
fwrite($output, "\n# SUMMARY\n");
fwrite($output, "# Total 6-type rule combinations: $totalPerGroup\n");
fwrite($output, "# Including discount types: $totalCombinations\n");

fclose($output);
?>