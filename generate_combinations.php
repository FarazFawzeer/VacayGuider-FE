<?php
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

// All possible combinations of 5 distinct rule types
$typeCombinations = [
    ['Subtotal', 'Category', 'All Products', 'Products', 'Brand'],
    ['Subtotal', 'Category', 'All Products', 'Products', 'Product Quantity'],
    ['Subtotal', 'Category', 'All Products', 'Brand', 'Product Quantity'],
    ['Subtotal', 'Category', 'Products', 'Brand', 'Product Quantity'],
    ['Subtotal', 'All Products', 'Products', 'Brand', 'Product Quantity'],
    ['Category', 'All Products', 'Products', 'Brand', 'Product Quantity']
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
foreach (range(1, 5) as $i) {
    $header[] = "Rule Type $i";
    $header[] = "Options $i";
}
echo implode(',', $header) . "\n";

// Counter for combination IDs
$combinationId = 1;

// Generate all possible scenarios
foreach ($typeCombinations as $comboIndex => $types) {
    // Generate all sub-option combinations for each rule in this group
    $ruleCombinations = [];
    foreach ($types as $type) {
        $ruleCombinations[$type] = generateRuleCombinations($type, $ruleTypes);
    }
    
    // Cross-product of all rule combinations in this group
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
            // Start building CSV row
            $row = [
                $combinationId++,
                $discountType
            ];
            
            // Add rule types and their options
            foreach ($types as $type) {
                $row[] = $type;
                $options = [];
                foreach ($scenario[$type] as $opt => $val) {
                    $options[] = "$opt: $val";
                }
                $row[] = implode(' | ', $options);
            }
            
            // Pad empty columns if less than 5 rules
            $remainingRules = 5 - count($types);
            for ($i = 0; $i < $remainingRules; $i++) {
                $row[] = '';
                $row[] = '';
            }
            
            // Output CSV row
            echo implode(',', array_map(function($item) {
                return '"' . str_replace('"', '""', $item) . '"';
            }, $row)) . "\n";
        }
    }
}

// Summary
$totalCombinations = 93312; // 6 groups × their individual combinations
$totalWithDiscount = $totalCombinations * count($discountTypes);
echo "\n\nSUMMARY:\n";
echo "Total 5-type rule combinations: $totalCombinations\n";
echo "Including discount types: $totalWithDiscount\n";
?>