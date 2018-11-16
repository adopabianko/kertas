<?php

/**
 * Library Log txt
 * @author adopabianko@gmail.com
 */

class Log_activitytxt {
	protected $path;
	protected $filename;

	/**
	 * Create log
	 * @param  string $log_url
	 * @param  string $log_method
	 * @param  string $log_param
	 * @param  string $log_response
	 * @param  string $log_ip
	 * @param  string $created_by
	 */
	public function createLog(
		$created_by,
		$log_url,
		$log_method,
		$log_param,
		$log_response
	) {
		$this->path     = './logs/'.date('Y').'/'.date('m'); // Directory Logs
		$this->filename = 'log_api_'.date('d_m_Y').'.log'; // File log

		$list = array (
			date('ymdHis'),
			$created_by,
			$log_url,
			$log_method,
			$log_param,
			$log_response,
			$_SERVER['REMOTE_ADDR'] != null ? $_SERVER['REMOTE_ADDR'] : $_SERVER['HTTP_X_FORWARDED_FOR']
		);

		// Set permission denied di linux
		@chmod($this->path,0777); // Folder
		@chmod($this->path.'/'.$this->filename,0777); // File

		// Jika folder sudah ada maka data di update
		if ( file_exists($this->path) ) {
			// Jika file sudah ada maka data di update
			if ( file_exists($this->path.'/'.$this->filename) ) {
				// Update file log
				$this->updateFileTxt($list);
			} else {
				// Create file log
				$this->createFileTxt($list);
			}
		} else {
			// Create folder logs
			if ( ! mkdir($this->path, 0777, true) ) {
			    echo "Gagal membuat folder";
			} else {
				if ( file_exists($this->filename) ) {
					// Update file log
					$this->updateFileTxt($list);
				} else {
					// Create file log
					$this->createFileTxt($list);
				}
			}
		}

	}

	/**
	 * Create file TEXT
	 * @param  array $list
	 */
	public function createFileTxt($list) {
		$file = fopen($this->path.'/'.$this->filename,"w");

		$format_log = $list[0].'|'.$list[1].'|'.$list[2].'|'.$list[3].'|'.$list[4].'|'.$list[5].'|'.$list[6]."\n";
		fwrite($file, $format_log);
		fclose($file);
	}

	/**
	 * Update file TEXT
	 * @param  array $list
	 */
	public function updateFileTxt($list) {
		$file = fopen($this->path.'/'.$this->filename,"a");

		$format_log = $list[0].'|'.$list[1].'|'.$list[2].'|'.$list[3].'|'.$list[4].'|'.$list[5].'|'.$list[6]."\n";
		fwrite($file, $format_log);
		fclose($file);
	}
}
