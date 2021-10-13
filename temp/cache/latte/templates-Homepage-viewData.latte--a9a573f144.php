<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\test-programator\app\Presenters/templates/Homepage/viewData.latte */
final class Templatea9a573f144 extends Latte\Runtime\Template
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
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['person' => '18'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block title} on line 1 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Seznam osob';
	}


	/** {block content} on line 2 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '
<table id="gridview" class="blueTable">
    <thead>
        <tr>
            <th>Jméno</th>
            <th>Příjmení</th>
            <th>Datum</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="3"></td>
        </tr>
    </tfoot>
    <tbody>
';
		$iterations = 0;
		foreach ($persons as $person) /* line 18 */ {
			echo '        <tr onclick="toggleClass(this,\'selected\');">
            <td>
                ';
			echo LR\Filters::escapeHtmlText($person->jmeno) /* line 20 */;
			echo '
            </td>
            <td>
                ';
			echo LR\Filters::escapeHtmlText($person->prijmeni) /* line 23 */;
			echo '
            </td>
            <td>
                ';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($person->datum, 'd.m. Y')) /* line 26 */;
			echo '
            </td>
        </tr>
';
			$iterations++;
		}
		echo '    </tbody>
</table>';
	}

}
