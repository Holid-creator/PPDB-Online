<?php

namespace Config;

use App\Controllers\Pekerjaan;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'filteruser' => \App\Filters\Filteruser::class,
		'filtersiswa' => \App\Filters\Filtersiswa::class
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'filteruser' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/',
					'pendaftaran', 'pendaftaran/*'
				]
			],

			'filtersiswa' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/',
					'pendaftaran', 'pendaftaran/*'
				]
			]
		],
		'after'  => [
			'filteruser' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/',
					'admin', 'admin/*',
					'pekerjaan', 'pekerjaan/*',
					'pendidikan', 'pendidikan/*',
					'pendaftaran', 'pendaftaran/*',
					'agama', 'agama/*',
					'penghasilan', 'penghasilan/*',
					'user', 'user/*',
					'ta', 'ta/*',
					'jurusan', 'jurusan/*',
					'benner', 'benner/*',
					'jalurmasuk', 'jalurmasuk/*',
					'lampiran', 'lampiran/*',
					'siswa', 'siswa/*',
					'ppdb', 'ppdb/*',
				]
			],

			'filtersiswa' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/',
					'siswa', 'siswa/*',
					'lampiran', 'lampiran/*',
				]
			],
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
