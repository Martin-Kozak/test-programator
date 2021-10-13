<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\test-programator\app\Presenters/templates/Homepage/default.latte */
final class Template9f0d43836f extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars()) /* line 1 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 2 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block title} on line 1 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Úvodní stránka';
	}


	/** {block content} on line 2 */
	public function blockContent(array $ʟ_args): void
	{
		echo 'Pokud jste již stáhli data z CSV souboru do databáze, stiskněte tlačítko "Zobrazit data". Pokud nikoliv, stiskněte tlačítko "Stáhnout data"';
	}

}
