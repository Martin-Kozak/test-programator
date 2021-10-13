<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;

/**
 * Továrna na routovací pravidla.
 * Řídí směrování a generovaní URL adres v celé aplikaci.
 * @package App
 */
final class RouterFactory
{
    use Nette\StaticClass;

    /**
    * Vytváří a vrací seznam routovacích pravidel pro aplikaci.
    * @return RouteList výsledný router pro aplikaci
    */
    public static function createRouter(): RouteList
    {
        $router = new RouteList;

        // Počeštění akcí v presenteru HomepagePresenter
        $router->addRoute('<action>', [
                    'presenter' => 'Homepage',
                    'action' => [
                         Route::FILTER_STRICT => true,
                         Route::FILTER_TABLE => [
                              // řetězec v URL => akce presenteru
                              'stahnout-data' => 'transferData',
                              'zobrazit-data' => 'viewData'
                              ]
                    ]
        ]);
        
            # Nastavení směrování na náš hlavní presenter HomepagePresenter
            $router->addRoute('<presenter>/<action>[/<id>]', 'Homepage:default');
            return $router;
    }
}