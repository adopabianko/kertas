<?php

/**
 * Library Log
 * @author adopabianko@gmail.com
 */

class Log_activity {
	protected $path;
	protected $filename;

	/**
	 * Create log
	 */
	public function createLog($dataLog = array()) {
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
				$this->updateFileLog($dataLog);
			} else {
				// Create file log
				$this->createFileLog($dataLog);
			}
		} else {
			// Create folder logs
			if ( ! mkdir($this->path, 0777, true) ) {
			    echo "Gagal membuat folder";
			} else {
				if ( file_exists($this->filename) ) {
					// Update file log
					$this->updateFileLog($dataLog);
				} else {
					// Create file log
					$this->createFileLog($dataLog);
				}
			}
		}

	}

	/**
	 * Create file Log
	 * @param  array $dataLog
	 */
	public function createFileLog($dataLog) {
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
	public function updateFileLog($dataLog) {
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
