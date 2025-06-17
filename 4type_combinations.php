<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit', '2048M');

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

$discountTypes = ['Percentage', 'Fixed amount', 'Fixed price per item'];

// Generate all possible 4-type combinations (15 total)
$allTypes = array_keys($ruleTypes);
$typeCombinations = [];
$used = [];

function generateCombinations($start, $depth, $current, &$result, $items) {
    if ($depth == 0) {
        $result[] = $current;
        return;
    }
    for ($i = $start; $i < count($items); $i++) {
        generateCombinations($i + 1, $depth - 1, array_merge($current, [$items[$i]]), $result, $items);
    }
}
generateCombinations(0, 4, [], $typeCombinations, $allTypes);

// Function to generate rule combinations
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

// Output as CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="4type_combinations.csv"');
$output = fopen('php://output', 'w');

// CSV Header
$header = ['Combination ID', 'Group ID', 'Discount Type'];
foreach (range(1, 4) as $i) {
    $header[] = "Rule Type $i";
    $header[] = "Options $i";
}
fputcsv($output, $header);

// Generate all scenarios
$combinationId = 1;
foreach ($typeCombinations as $groupIndex => $types) {
    $ruleCombinations = [];
    foreach ($types as $type) {
        $ruleCombinations[$type] = generateRuleCombinations($type, $ruleTypes);
    }
    
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
    
    foreach ($discountTypes as $discountType) {
        foreach ($scenarios as $scenario) {
            $row = [
                $combinationId++,
                $groupIndex + 1,
                $discountType
            ];
            
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
$totalCombinations = 0;
foreach ($typeCombinations as $types) {
    $groupTotal = 1;
    foreach ($types as $type) {
        $groupTotal *= array_product(array_map('count', $ruleTypes[$type]));
    }
    $totalCombinations += $groupTotal * count($discountTypes);
}

fwrite($output, "\n# SUMMARY\n");
fwrite($output, "# Total 4-type groups: " . count($typeCombinations) . "\n");
fwrite($output, "# Total combinations including discounts: $totalCombinations\n");
fclose($output);
?>