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
    public array $product = [
        'nama_menu'     => 'required|max_length[30]',
        'jenis_menu'    => 'required|max_length[20]',
        'harga'         => 'required',
        'status_menu'   => 'required|in_list[Ada,Tidak Ada]'
    ];

    public array $product_errors = [
        'nama_menu' => [
            'required' => 'Nama menu wajib diisi.',
            'max_length' => 'Nama menu harus 30 karakter.',
        ],
        'jenis_menu' => [
            'required'      => 'Jenis menu wajib diisi.',
            'max_length'    => 'Jenis menu harus 20 karakter.',
        ],
        'harga' => [
            'required' => 'Harga wajib diisi.'
        ],
        'status_menu' => [
            'required' => 'Status Menu diisi.'
        ]
    ];
}
