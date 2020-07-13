<?php
//============================================================+
// File name   : tcpdf_config.php
// Begin       : 2004-06-11
// Last Update : 2014-12-11
//
// Description : Configuration file for TCPDF.
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2004-2014  Nicola Asuni - Tecnick.com LTD
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with TCPDF.  If not, see <http://www.gnu.org/licenses/>.
//
// See LICENSE.TXT file for more information.
//============================================================+

/**
 * Configuration file for TCPDF.
 * @author Nicola Asuni
 * @package com.tecnick.tcpdf
 * @version 4.9.005
 * @since 2004-10-27
 */

// IMPORTANT:
// If you define the constant K_TCPDF_EXTERNAL_CONFIG, all the following settings will be ignored.
// If you use the tcpdf_autoconfig.php, then you can overwrite some values here.


/**
 * Installation path (/var/www/tcpdf/).
 * By default it is automatically calculated but you can also set it as a fixed string to improve performances.
 */
//define ('K_PATH_MAIN', '');

/**
 * URL path to tcpdf installation folder (http://localhost/tcpdf/).
 * By default it is automatically set but you can also set it as a fixed string to improve performances.
 */
//define ('K_PATH_URL', '');

/**
 * Path for PDF fonts.
 * By default it is automatically set but you can also set it as a fixed string to improve performances.
 */
//define ('K_PATH_FONTS', K_PATH_MAIN.'fonts/');

/**
 * Default images directory.
 * By default it is automatically set but you can also set it as a fixed string to improve performances.
 */
define ('K_PATH_IMAGES', 'img/');

/**
 * Deafult image logo used be the default Header() method.
 * Please set here your own logo or an empty string to disable it.
 */
define ('PDF_HEADER_LOGO', 'sainsLogo.png');

/**
 * Header logo image width in user units.
 */
define ('PDF_HEADER_LOGO_WIDTH', 50);

/**
 * Cache directory for temporary files (full path).
 */
//define ('K_PATH_CACHE', '/tmp/');

/**
 * Generic name for a blank image.
 */
define ('K_BLANK_IMAGE', '_blank.png');

/**
 * Page format.
 */
define ('PDF_PAGE_FORMAT', 'A4');

/**
 * Page orientation (P=portrait, L=landscape).
 */
define ('PDF_PAGE_ORIENTATION', 'P');

/**
 * Document creator.
 */
define ('PDF_CREATOR', 'PENTEST ADMINISTRATION');

/**
 * Document author.
 */
define ('PDF_AUTHOR', 'PENTEST ADMINISTRATION');

/**
 * Header title.
 */
define ('PDF_HEADER_TITLE', 'Engagement Summary Report');

/**
 * Header description string.
 */
define ('PDF_HEADER_STRING', "by PENTEST ADMINISTRATION - pentest.sains.com.my
Sarawak Information Systems Sdn Bhd (SAINS)");

/**
 * Document unit of measure [pt=point, mm=millimeter, cm=centimeter, in=inch].
 */
define ('PDF_UNIT', 'mm');

/**
 * Header margin.
 */
define ('PDF_MARGIN_HEADER', 10);

/**
 * Footer margin.
 */
define ('PDF_MARGIN_FOOTER', 10);

/**
 * Top margin.
 */
define ('PDF_MARGIN_TOP', 40);

/**
 * Bottom margin.
 */
define ('PDF_MARGIN_BOTTOM', 25);

/**
 * Left margin.
 */
define ('PDF_MARGIN_LEFT', 15);

/**
 * Right margin.
 */
define ('PDF_MARGIN_RIGHT', 15);

/**
 * Default main font name.
 */
define ('PDF_FONT_NAME_MAIN', 'helvetica');

/**
 * Default main font size.
 */
define ('PDF_FONT_SIZE_MAIN', 12);

/**
 * Default data font name.
 */
define ('PDF_FONT_NAME_DATA', 'helvetica');

/**
 * Default data font size.
 */
define ('PDF_FONT_SIZE_DATA', 8);

/**
 * Default monospaced font name.
 */
define ('PDF_FONT_MONOSPACED', 'courier');

/**
 * Ratio used to adjust the conversion of pixels to user units.
 */
define ('PDF_IMAGE_SCALE_RATIO', 1.25);

/**
 * Magnification factor for titles.
 */
define('HEAD_MAGNIFICATION', 1.1);

/**
 * Height of cell respect font height.
 */
define('K_CELL_HEIGHT_RATIO', 1.25);

/**
 * Title magnification respect main font size.
 */
define('K_TITLE_MAGNIFICATION', 1.3);

/**
 * Reduction factor for small font.
 */
define('K_SMALL_RATIO', 2/3);

/**
 * Set to true to enable the special procedure used to avoid the overlappind of symbols on Thai language.
 */
define('K_THAI_TOPCHARS', true);

/**
 * If true allows to call TCPDF methods using HTML syntax
 * IMPORTANT: For security reason, disable this feature if you are printing user HTML content.
 */
define('K_TCPDF_CALLS_IN_HTML', false);

/**
 * If true and PHP version is greater than 5, then the Error() method throw new exception instead of terminating the execution.
 */
define('K_TCPDF_THROW_EXCEPTION_ERROR', false);

/**
 * Default timezone for datetime functions
 */
define('K_TIMEZONE', 'UTC');

//============================================================+
// END OF FILE
//============================================================+

class MyCustomPDFWithWatermark extends TCPDF {

	public function Header() {
        // Get the current page break margin
        $bMargin = $this->getBreakMargin();

        // Get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;

        // Disable auto-page-break
        $this->SetAutoPageBreak(false, 0);

        // Define the path to the image that you want to use as watermark.
        $img_file = K_PATH_IMAGES.'border.jpg';

        // Render the image
        $this->Image($img_file, 0, 0, 220, 300, '', '', '', false, 300, '', false, false, 0);

        // Restore the auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);

        // Set the starting point for the page content
        $this->setPageMark();
    }
	public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-100);
        // Set font
        $this->SetFont('helvetica', '', 12);

		$image_file = K_PATH_IMAGES.'verified.png';
 
        // Page number
        $this->Cell(0, 10, $this->Image($image_file, 25, 225, 55, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

