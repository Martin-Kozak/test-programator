<?php

/** Nastavení striktních typů - zakazuje použití jiných datových typů do funkce, než které tam jsou definované */
declare (strict_types = 1);

/** Cesta k DatabaseManager */
namespace App\Model;

/** Použití služeb v DatabaseManager */
use Nette\Database\Explorer;
use Nette\SmartObject;

/**
 * Model pro práci s databází
 * @package App\Model
 */
class DatabaseManager {
    
    // Umožňuje lépe odhalit chyby v programu
    use SmartObject;
    
    // @var  Explorer Nette služba pro práci s databází
    protected Explorer $database;
    
    /**
     * Konstruktor s injektovanou službou Explorer od Nette pro práci s databází
     * @param Explorer $database Automaticky injektovaná služba od Nette pro práci s databází
     */
    public function __construct(Explorer $database) {
        $this->database = $database;
    }
    
}
