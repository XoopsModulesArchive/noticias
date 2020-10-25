<?php

// Xoops Spanish Support (http://www.esxoops.com)
// $Id: modinfo.php,v 1.1 2006/03/27 15:15:27 mikhail Exp $
// Module Info

// The name of this module
define('_MI_NOTICIAS_NAME', 'Artículos');

// A brief description of this module
define('_MI_NOTICIAS_DESC', 'Crear una sección de Noticias, donde los usuarios puedan enviar Artículos/Comentarios.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NOTICIAS_BNAME1', 'Temas');
define('_MI_NOTICIAS_BNAME3', 'Historia del Día');
define('_MI_NOTICIAS_BNAME4', 'Top Artículo');
define('_MI_NOTICIAS_BNAME5', 'Artículos Recientes');

// Sub menus in main menu block
define('_MI_NOTICIAS_SMNAME1', 'Enviar Artículo');
define('_MI_NOTICIAS_SMNAME2', 'Archivo');

// Names of admin menu items
define('_MI_NOTICIAS_ADMENU2', 'Manejar Temas');
define('_MI_NOTICIAS_ADMENU3', 'Enviar/Editar Noticias');

// Title of config items
define('_MI_STORYHOME', 'Seleccione el número de items a mostrar en la página top');
define('_MI_NOTIFYSUBMIT', 'Seleccione SI para enviar un mensaje de notificación al administrador acerca de nuevos envíos');
define('_MI_DISPLAYNAV', 'Seleccione SI para mostrar la barra de navegación al tope de cada página de noticias');
define('_MI_ANONPOST', '¿Permitir a los usuarios anónimos el envío de nuevos artículos?');
define('_MI_AUTOAPPROVE', '¿ Auto aprobar las nuevas historias sin la intervención del administrador ?');

// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_NOTICIAS_GLOBAL_NOTIFY', 'Global');
define('_MI_NOTICIAS_GLOBAL_NOTIFYDSC', 'Opciones de Notificación Global de Artículos.');

define('_MI_NOTICIAS_STORY_NOTIFY', 'Historia');
define('_MI_NOTICIAS_STORY_NOTIFYDSC', 'Opciones de Notificación que se aplican a la Historia actual.');

define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nuevo Tema');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notificarme cuando un nuevo Tema es creado.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Recibir notificación cuando un nuevo Tema es creado.');
define('_MI_NOTICIAS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo Tema');

define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFY', 'Nueva Historia enviada');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Notificarme cuando cualquier nueva historia es enviada (aguardando aprobación).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Recibir una notificación cuando cualquier nueva historia es enviada  (aguardando aprobación).');
define('_MI_NOTICIAS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nueva historia enviada');

define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFY', 'Nueva Historia');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYCAP', 'Notificarme cuando cualquier nueva historia es publicada.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYDSC', 'Recibir una notificación cuando cualquier nueva historia es publicada.');
define('_MI_NOTICIAS_GLOBAL_NOTICIASTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nueva historia enviada');

define('_MI_NOTICIAS_STORY_APPROVE_NOTIFY', 'Historia Aprobada');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYCAP', 'Notificarme cuando esta historia es aprobada.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYDSC', 'Recibir una notificación cuando esta historia es aprobada.');
define('_MI_NOTICIAS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Historia Aprobada');
