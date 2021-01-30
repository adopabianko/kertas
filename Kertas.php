<?php

/**
 * Library untuk mencatat aktifitas API
 * @author adopabianko@gmail.com
 */

class Kertas {
	private $path;
	private $filename;

	/**
	 * Create log
	 * @param array $dataLog
	 */
	public function create($dataLog = array()) {
		$this->path     = './logs/'.date('Y').'/'.date('m'); // Directory Logs
		$this->filename = 'log_api_'.date('dmY').'.log'; // File log

		// Set permission denied di linux
		@chmod($this->path,0777); // Folder
		@chmod($this->path.'/'.$this->filename,0777); // File

		// Jika folder sudah ada maka data di update
		if ( file_exists($this->path) ) {
			// Jika file sudah ada maka data di update
			if ( file_exists($this->path.'/'.$this->filename) ) {
				// Update file log
				$this->updateFile($dataLog);
			} else {
				// Create file log
				$this->createFile($dataLog);
			}
		} else {
			// Create folder logs
			if ( ! mkdir($this->path, 0777, true) ) {
			    echo "Gagal membuat folder";
			} else {
				$this->create($dataLog);
			}
		}

	}

	/**
	 * Create file Log
	 * @param  array $dataLog
	 */
	public function createFile($dataLog) {
		$file = fopen($this->path.'/'.$this->filename,"w");

		$format_log = '['.date('Y-m-d H:i:s').']';

		for ($i = 0; $i < count($dataLog); $i++) {
			$format_log .= ' - '.'['.$dataLog[$i].']';
		}

		$format_log .= "\n";

		fwrite($file, $format_log);
		fclose($file);
	}

	/**
	 * Update file Log
	 * @param  array $dataLog
	 */
	public function updateFile($dataLog) {
		$file = fopen($this->path.'/'.$this->filename,"a");

		$format_log = '['.date('Y-m-d H:i:s').']';

		for ($i = 0; $i < count($dataLog); $i++) {
			$format_log .= ' - '.'['.$dataLog[$i].']';
		}

		$format_log .= "\n";
		
		fwrite($file, $format_log);
		fclose($file);
	}
}
