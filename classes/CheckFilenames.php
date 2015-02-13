<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Class CheckFilenames
 *
 * @author Patrick Beyer <http://www.idee-anhang.de>
 * @author Stefan Schulz-Lauterbach <http://clickpress.de>
 */
class CheckFilenames extends \Frontend
{

    protected $search = '';

    /**
     * validateFilenames function.
     *
     * @access public
     *
     * @param mixed $arrFiles
     *
     * @return void
     */
    public function validateFilenames( $arrFiles )
    {
        if (!$GLOBALS['TL_CONFIG']['validateFilenames']) {
            return null;
        }

        $this->Import( 'Files' );

        if (!empty($arrFiles)) {
            foreach ($arrFiles as $file) {
                $newFile = $this->sanitizeIt( $file );
                $this->Files->rename( $file, $newFile );
            }
        }
    }

    /**
     * sanitizeFilename function.
     *
     * @access protected
     *
     * @param mixed $strFile
     *
     * @return void
     */
    protected function sanitizeIt( $strFile )
    {
        $info = pathinfo( $strFile );

        $newFilename = substr( $info['filename'], 0, 32 );
        $newFilename = standardize( String::restoreBasicEntities( $newFilename ),
            $GLOBALS['TL_CONFIG']['filePreserveUppercase'] );
        $newFilename = $this->cleanUnderscore( $newFilename );

        return $info['dirname'] . '/' . $newFilename . '.' . strtolower( $info['extension'] );
    }

    /**
     * cleanUnderscore function.
     *
     * @access protected
     *
     * @param mixed $strFilename
     *
     * @return void
     */
    protected function cleanUnderscore( $strFilename )
    {
        $newFilename = str_replace( "__", "_", $strFilename );

        if ($newFilename != $strFilename) {
            $newFilename = $this->cleanUnderscore( $newFilename );
        }

        return $newFilename;
    }
}

