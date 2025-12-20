<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBar extends Component
{
	public string $searchRoute;
	public ?string $addRoute;
	public string $addLabel;
	public string $placeholder;
	public string $name;

	public function __construct(
		string $searchRoute,
		string $placeholder = 'Masukkan kata kunci',
		string $name = 'search',
		string $addRoute = null,
		string $addLabel = 'Tambah Data'
	) {
		$this->searchRoute = $searchRoute;
		$this->placeholder = $placeholder;
		$this->name = $name;
		$this->addRoute = $addRoute;
		$this->addLabel = $addLabel;
	}


	public function render(): View|Closure|string
	{
		return view('components.search-bar');
	}
}
