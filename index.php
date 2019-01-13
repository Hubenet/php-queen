<?php

	/**
	 * First I create a multidimensional array with all coords from a1 to g7 in a multidimensional array.
	 * This will be all the tiles of the chessboard. Each position of the Queen wiil clear the tiles from
	 * the array by its horizontal, vertical and diagonal property.
	 * @author Theo Hubenet
	 * @version 0.01
	*/
	
	class Chessboard
	{
		// TODO-theo use construct maybe?

		// Horizontal rows
		public $arrHorizontalRows = array("a","b","c","d","e","f","g");

		// Vertical cols
		public $arrVerticalCols   = array(1,2,3,4,5,6,7);

		// Remaining tiles
		public $arrRemainingTiles = array();

		// TODO-theo 
		// Method returns Horizontal rows array minus $hCoord
		function removeHorizontalTiles($hCoord = '') {
			// Remove horizontal row by array value $hCoord
			if( ( $hKey = array_search($hCoord, $this->arrHorizontalRows)) !== false ) {
				unset($this->arrHorizontalRows[$hKey]);
			}
			// Return the remaining horizontal rows
			return $this->arrHorizontalRows;
		}

		// Method returns Vertical cols array minus $vCoord
		function removeVerticalTiles($vCoord = 0) {
			// Remove horizontal row by array value $hCoord
			if( ( $vKey = array_search($vCoord, $this->arrVerticalCols)) !== false ) {
				unset($this->arrVerticalCols[$vKey]);
			}
			// Return the remaining horizontal rows
			return $this->arrVerticalCols;
		}

		// This Method removes the diagonal tiles of the Queen
		function removeTilesDiagonally($hCoord = '', $vCoord = 0) {
			// TODO-theo undo diagonal tiles from Queen position by the following: 
			/**
			*  NE = North East ( +1 arrHorizontalRows , -1 arrVerticalCols)
			*  SE = South East ( +1 arrHorizontalRows , +1 arrVerticalCols)
			*  SW = South West ( -1 arrHorizontalRows , +1 arrVerticalCols)
			*  NW = North West ( -1 arrHorizontalRows , -1 arrVerticalCols)
			*/			
			
			/* NORTH EAST **************************************************************/
			// TODO-theo loop until end of array
			if( ( $hsKey = array_search($hCoord, $this->arrHorizontalRows)) !== false ) {
				$iE = $hsKey+1; // EAST +1
				unset($this->arrHorizontalRows[$iE]);
			}
			// TODO-theo loop until end of array
			if( ( $vKey = array_search($vCoord, $this->arrVerticalCols)) !== false ) {
				$iN = $vKey+1; // NORTH +1
				unset($this->arrVerticalCols[$iN]);
			}
		
			return true;
		}

		// Method returns remaingTiles
		function remainingTiles( $aHs = array() , $aVs = array() ) {
			// Combine the rows and cols
			foreach( $aHs as $aH ){
				// Add vertical cols to each row
				$this->arrRemainingTiles[$aH] = $aVs;
			}
			return $this->arrRemainingTiles;
		}
	}

	// Set new Chessboard
	$oChessboard 		= new Chessboard();

	// Piece set on 'd5'
	$arrHorizontalTiles	= $oChessboard->removeHorizontalTiles('d');
	$arrVerticalTiles	= $oChessboard->removeVerticalTiles(5);
	//$arrDiagonalTiles	= $oChessboard->removeTilesSE('d',5);

	// Remaing tiles
	$arrRemainingTiles	= $oChessboard->remainingTiles($arrHorizontalTiles,$arrVerticalTiles);

	print_r($arrHorizontalTiles);
	echo '<hr>';

	print_r($arrVerticalTiles);
	echo '<hr>';

	echo '<pre>';
	print_r($arrRemainingTiles);
	echo '</pre>';
	

?>