<?php
/**
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 * @license
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 *
 * @copyright Copyright (C)1999,2005 easyDNS Technologies Inc. & Mark Jeftovic
 * @copyright Maintained by David Saez
 *
 */

if (!defined('__MD_HANDLER__'))
	define('__MD_HANDLER__', 1);

require_once('whois.parser.php');

class md_handler {
	function parse($data, $query) {
		$items = array (
			'Domain name:'		=> 'domain.name',
			'Registrant:'		=> 'owner',
			'Created:'			=> 'domain.created',
			'Expiration date:'	=> 'domain.expires',
			'Name servers:'		=> 'domain.nserver',
			'DNS update:'		=> 'domain.changed',
		);

		$r['regrinfo'] = generic_parser_b($data['rawdata'], $items);

		$r['regyinfo'] = array(
			'referrer' => 'http://nic.md',
			'registrar' => 'MoldData S.E.'
		);

		return $r;
	}
}
