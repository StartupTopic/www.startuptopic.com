<?php
/*
Plugin Name: Remove Comment Notes
Plugin URI: http://andrewnorcross.com/plugins/
Description: Removes the notes below the comment form.
Version: 1.0.0
Author: Andrew Norcross
Author URI: http://andrewnorcross.com

	Copyright 2013 Andrew Norcross

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Start up the engine
class Remove_Comment_Notes
{

	/**
	 * Static property to hold our singleton instance
	 *
	 * @return Remove_Comment_Notes
	 */
	static $instance = false;

	/**
	 * This is our constructor
	 *
	 * @return Remove_Comment_Notes
	 */
	private function __construct() {
		add_filter		( 'comment_form_defaults',		array( $this, 'remove_notes_filter'		) 			);
	}

	/**
	 * If an instance exists, this returns it.  If not, it creates one and
	 * retuns it.
	 *
	 * @return Remove_Comment_Notes
	 */

	public static function getInstance() {
		if ( !self::$instance )
			self::$instance = new self;
		return self::$instance;
	}

	/**
	 * The actual filter for removing the notes.
	 *
	 * @return Remove_Comment_Notes
	 */

	public function remove_notes_filter($fields) {

		$fields['comment_notes_after'] = '';
		return $fields;
	}

/// end class
}


// Instantiate our class
$Remove_Comment_Notes = Remove_Comment_Notes::getInstance();
