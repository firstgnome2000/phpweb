<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Copyright (C) 2020 FlameCMS <NOT YET>
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation; either version 2 of the License, or (at your
 * option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>.
 */

class IPN_Model extends CI_Model 
{

	public function log_ipn($ipn) 
	{
		$this->db->insert("ipn_log", array(
			"data" => $ipn, 
			"timestamp" => time(), 
			"IP" => $_SERVER['REMOTE_ADDR']
			)
		);
	}

	public function add_payment($data) 
	{
		$this->db->insert("payment_logs", $data);
	}

	public function get_payment_log_hash($hash) 
	{
		return $this->db->where("hash", $hash)->get("payment_logs");
	}
}
