<?php
return [
     // User address residence address
    'residence_statuses' => [
        'owner',
        'council tenant',
        'tenant furnished',
        'tenant unfurnished',
        'tenant',
        'living with parents',
        'others'
    ],

    // User primary bank debit card types
    'primary_debit_card_types' => [
        'visa debit',
        'visa delta',
        'mastercard debit',
        'solo',
        'switch/maestro'
    ],

    // user address status [current, previous]
    'address_types' => ['current', 'previous'],

    // customer name title
    'title' => [ "Ms", "Miss", "Mr", "Mrs", "Dr."],

    // user gender type
    'gender' => ['male', 'female', 'unclassified'],

    // user marital status
    'marital_status' => [
        'married',
        'single',
        'divorced',
        'widowed',
        'cohabiting',
        'separated',
        'other'
    ],
    // customer payment method
    'payment_method' => ['bank', 'others'],
    // customer loan payment return type
    'payment_frequency' => ['weekly', 'bi-weekly', 'fortnightly', 'monthly'],
    // customer contact type
    'contact_types' => ['primary', 'secondary', 'emergency', 'home'],
    // customer application status
    'application_status' => ['new', 'offered', 'likely offered', 'fully approved', 'conditionally approved', 'decline'],
    // application load purpose names
    'loan_purposes_name' => [
        'subsistence',
        'pay-bills',
        'home improvement',
        'short term cash',
        'pay off loan',
        'one off purchase',
        'debt consolidation',
        'car loan'
    ],
    // media types
    'media_types' => ['audio', 'video', 'image', 'docs', 'pdf', 'excel', 'other'],
    // bucket color
    'bucket_colors' => ['white', 'red', 'blue', 'green', 'black', 'yellow', 'biolet'],
    // bucket rating
    'bucket_rating' => ['excellent', 'good', 'fair', 'poor', 'very poor'],
    // bucket rule operator
    'bucket_rule_operator' => ['=', '<=', '>=', '<', '>'],

    // bucket color links
    'bucket_color_links' => [
        [ 'id' => 1, 'src' => 'images/bucket/color/red.png'],
        [ 'id' => 2, 'src' => 'images/bucket/color/black.png'],
        [ 'id' => 3, 'src' => 'images/bucket/color/blue.png'],
        [ 'id' => 4, 'src' => 'images/bucket/color/green.png'],
        [ 'id' => 5, 'src' => 'images/bucket/color/purple.png'],
        [ 'id' => 6, 'src' => 'images/bucket/color/orange.png'],
        [ 'id' => 7, 'src' => 'images/bucket/color/yellow.png'],
    ],
];
