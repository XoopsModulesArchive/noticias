<?php

// $Id: modinfo.php,v 1.1 2006/03/27 15:16:17 mikhail Exp $
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', 'noticiasy');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Sekcja w której warto umieszczaæ najnowsze wiadomo¶ci.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'Kategorie noticiasów');
define('_MI_NOTICIAS_BNAME3', 'Najgorêtszy noticias');
define('_MI_NOTICIAS_BNAME4', 'Top noticias');
define('_MI_NOTICIAS_BNAME5', 'Ostatnio dodany noticias');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Dodaj noticiasa');
define('_MI_NOTICIAS_SMNAME2', 'Archiwum noticiasów');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Manager Tematów');
define('_MI_NOTICIAS_ADMENU3', 'Dodanie/Edycja noticiasów');

// Title of config items
define('_MI_STORYHOME', 'Ilo¶æ noticiasów wyswietlanych na stronie g³ównej');
define('_MI_NOTIFYSUBMIT', 'Wybierz Tak je¶li chcesz by admin dostawa³ mail gdy bêdzie nowy noticias');
define('_MI_DISPLAYNAV', 'Wybierz Tak, by wyswietlac panel nawigacyjny na górze strony');
define('_MI_ANONPOST', 'Zezwól anonimowym uzytkownikom na wysy³anie noticiasów?');
define('_MI_AUTOAPPROVE', 'Zatwierdzanie noticiasów bez udzia³u admina?');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Ogólne');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Ogólne opcje powiadamiania o zdarzeniach w sekcji noticiasów.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Artyku³');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Opcje powiadamiania dla aktualnego artyku³u.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nowy temat');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Powiadom mnie gdy powstanie nowy temat.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Otrzymywanie informacji gdy powstanie nowy temat.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-powiadamianie : Nowy temat w noticiasach');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Wys³ano nowy artyku³');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Powiadom mnie gdy zostanie wys³any nowy artyku³ (czeka na autoryzacje).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Powiadamia gdy zostanie wys³any nowy artyku³ (czeka na autoryzacje).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-powiadamianie : Wys³ano nowy artyku³');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Nowy artyku³');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Powiadom mnie gdy nowy artyku³ zostanie opublikowany.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Powiadamia gdy nowy artyku³ zostanie opublikowany.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-powiadamianie : Jest nowy artyku³');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Artyku³ zosta³ autoryzowany');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Powiadom mnie gdy artyku³ zostanie autoryzowany.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Powiadamia gdy artyku³ zostanie autoryzowany.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-powiadamianie : Artyku³ zosta³ autoryzowany');
