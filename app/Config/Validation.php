<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $product = [
        'name' => 'required|trim',
        'price_per_unit' => 'required|numeric'
    ];

    public $product_errors= [
        'name' => [
            'required' => 'Der Name muss vorhanden sein'
        ], 
        'price_per_unit' => [
            'required' => 'Der Preis muss vorhanden sein', 
            'numeric' => 'Der Preis muss eine Zahl sein'
        ]
    ];

    public $ingredient = [
        'product_type_id_sub' => 'required',
        'amount' => 'required|numeric'
    ];

    public $ingredient_errors = [
        'naproduct_type_id_subme' => [
            'required' => 'Bitte geben Sie einer ProductID ein.'
        ],
        'amount' => [
            'required' => 'Bitte geben Sie eine Menge für das Produkt an.',
            'numeric' => 'Die Menge muss eine Zahl sein.'
        ]
    ];


}
