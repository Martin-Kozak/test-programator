<?php
/** Nastavení striktních typů - zakazuje použití jiných datových typů do funkce, než které tam jsou definované*/
declare(strict_types=1);

/**Cesta k HomepagePresenter*/
namespace App\Presenters;

/**Použití služeb v HomepagePresenter*/
use Nette\Application\UI\Presenter;
use App\Model\DataManager;

/**
 * Hlavní presenter aplikace
 * @package App\Presenters
 */
final class HomepagePresenter extends Presenter
{ 
    /** @var DataManager Model pro správu dat CSV a dat z databáze*/
     private DataManager $dataManager;
     
    /** Výchozí vykreslovací metoda tohoto presenteru*/
    public function renderDefault(): void
    {
        $this->template;
    }
    
    /** Vykreslovací metoda s výpisem dat z databáze*/
    public function renderList($data)
    {
        $this->template->persons = $data;
    }
    
    /**
     * Konstruktor s injektovaným modelem pro správu dat CSV a dat z databáze
     * @param DataManager $dataManager automaticky injektovaný model pro správu dat CSV a dat z databáze
     */
    public function __construct(DataManager $dataManager)
    {
        parent::__construct();
        $this->dataManager = $dataManager;
    }
    
    /**
     * Stažení dat z CSV souboru do databáze
     */
    public function actionTransferData()
    {
        // Po úspěšném stažení dat z CSV souboru do databáze informujeme uživatele o úspěchu a přesměrujeme na domovský HomepagePresenter s voláním funkce: renderDefault
        try
        {
            $this->dataManager->transferData(); // Stažení dat z CSV souboru do databáze.
            $this->flashMessage('Data z CSV souboru byla úspěšně stažena do databáze.'); // Oznámení o úspěšném stažení dat do databáze
            $this->redirect('Homepage:default'); // Přesměrování na úvodní stránku
        } catch (Exception $ex) { 
            $this->flashMessage('Při stahování dat ze souboru do databáze došlo k chybě. Zkontrolujte připojení k databázi nebo CSV soubor'); // Při neúspěšném stažení dat z CSV souboru do databáze informujeme uživatele o neúspěchu
        }
    }
   
    /**
     * Zobrazení dat z databáze do šablony presenteru
     */
   public function actionViewData()
   {
        // Načtení dat z databáze
        $data = $this->dataManager->viewData();
       
        // V případě, že v databázi nejsou nahrána žádná data pro zobrazení, informujeme uživatele o neúspěchu a přesměrujeme na domovský HomepagePresenter s voláním funkce: renderDefault
        if(count($data) == null)
        {
            $this->flashMessage('V databázi nejsou nahrána žádná data'); // Oznámení o prázdné databázi
            $this->redirect('Homepage:default'); // Přesměrování na úvodní stránku
        }
        else
        {
            $this->renderList($data); // Volání vykreslovací metody, které předáme data z databáze
        }

    }
}
