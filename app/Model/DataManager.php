<?php

/** Nastavení striktních typů - zakazuje použití jiných datových typů do funkce, než které tam jsou definované*/
declare (strict_types=1);

/**Cesta k modelu DataManager*/
namespace App\Model;

/**Použití služeb v DataManager*/
use App\Model\DatabaseManager;
use Nette\SmartObject;
use Nette\Database\Table\Selection;

/**
 * Hlavní model aplikace
 * @package App\Model
 */
class DataManager extends DatabaseManager{
    
    // Umožňuje lépe odhalit chyby v programu
    use SmartObject;
    
    // Konstanty s názvem tabulky a s názvy sloupců tabulky 'zaznamy' pro usnadnění práce ve funkcích modelu DataManager
    const
        TABLE_NAME = 'zaznamy', 
        COLUMN_ID = 'id',
        COLUMN_JMENO = 'jmeno',
        COLUMN_PRIJMENI = 'prijmeni',
        COLUMN_DATUM = 'datum';
    
    /**
     * Přenesení dat z CSV souboru do databáze MYSQL
     */
    public function transferData()
    {
        if(($handle = fopen("..\soubory-csv\csv", "r")) !== FALSE){ // fopen Otevření souboru pro čtení
            while(($row = fgetcsv($handle)) !== FALSE) // fgetcsv Přečte řádek ze souboru, zpracuje ho jako CSV a již rozdělené sloupce vrátí jako pole
            {            
                $this->database->table(self::TABLE_NAME)->insert([ 
                self::COLUMN_JMENO => $row[1], // Uloží do sloupce 'jmeno' hodnotu $row['jmeno']
                self::COLUMN_PRIJMENI => $row[2], // Uloží do sloupce 'prijmeni' hodnotu $row['prijmeni']
                self::COLUMN_DATUM => $row[3], // Uloží do sloupce 'datum' hodnotu $row['datum']
                ]);
            }
            fclose($handle); // Zavřeme soubor, aby nedošlo k poškození dat
        }
    }
    
    /**
     * Data z databáze jsou vypsána vzestupně podle datumu
     * @return Selection seznam všech osob  
     */
    public function viewData()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_DATUM . ' ASC'); // Načtení dat z databáze
    }
    
   
    
}
