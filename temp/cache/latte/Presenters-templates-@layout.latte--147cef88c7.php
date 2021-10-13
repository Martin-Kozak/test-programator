<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\test-programator\app\Presenters/templates/@layout.latte */
final class Template147cef88c7 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['head' => 'blockHead'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>';
		if ($this->hasBlock("title")) /* line 7 */ {
			$this->renderBlock($ʟ_nm = 'title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('striphtml', $ʟ_fi, $s));
			}) /* line 7 */;
			echo ' | ';
		}
		echo 'Nette Sandbox</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */;
		echo '/css/style.css">
    
    <script>
        function toggleClass(el, className) {
            if (el.className.indexOf(className) >= 0) {
                el.className = el.className.replace(className,"");
            }
            else {
                el.className  += className;
            }
        }
    </script>
        
    
    ';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('head', get_defined_vars()) /* line 25 */;
		echo '
</head>

<body>
    <header>
        <h1>Základní test PHP programátora</h1>
    </header>
    <div class=container>
';
		$iterations = 0;
		foreach ($flashes as $flash) /* line 34 */ {
			echo '        <div';
			echo ($ʟ_tmp = array_filter(['alert', 'alert-' . $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 34 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 34 */;
			echo '</div>
';
			$iterations++;
		}
		echo '
        <nav>
            <ul>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:transferData")) /* line 38 */;
		echo '">Stáhnout data</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:viewData")) /* line 39 */;
		echo '">Zobrazit data</a></li>
            </ul>
        </nav>

        <br style="clear: both;">
        <article>
            <header>
                <h3>';
		$this->renderBlock($ʟ_nm = 'title', [], 'html') /* line 46 */;
		echo '</h3>
            </header>
            <section>
                ';
		$this->renderBlock($ʟ_nm = 'content', [], 'html') /* line 49 */;
		echo ' 
            </section>
        </article>
    </div>

    <footer>
        <p>
            Tento test pro Vás připravil Martin Kozák
        </p>
    </footer>

</body>
</html>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['flash' => '34'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block head} on line 25 */
	public function blockHead(array $ʟ_args): void
	{
		
	}

}
