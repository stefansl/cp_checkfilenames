<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/* Palettes */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace( 'imageHeight;',
    'imageHeight,validateFilenames,filePreserveUppercase;', $GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] );


/* Fields */
$GLOBALS['TL_DCA']['tl_settings']['fields']['validateFilenames'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['validateFilenames'],
    'inputType' => 'checkbox',
    'eval'      => array( 'tl_class' => 'w50 cbx' ),
    'default'   => true
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['filePreserveUppercase'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['filePreserveUppercase'],
    'inputType' => 'checkbox',
    'eval'      => array( 'tl_class' => 'w50 cbx' )
);
