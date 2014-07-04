<?php
/*
*********************************
deployWP - active theme module
*********************************
*/
class deploy_active_theme extends deployWP_module {

	/**
	 *
	 *
	 * @return void
	 **/
	function setup(){
		$this->collect_file = $this->env_dir.'/active_theme.json';
		$this->deploy_file 	= $this->deploy_from_dir.'/active_theme.json';
	}


	/**
	 * 
	 * 
	 * @return void
	 **/
	function collect(){

		$arr['stylesheet'] = get_option('stylesheet');
		$arr['template'] = get_option('template');

		$file = $this->collect_file;
		$file = fopen($file, 'w+');
		fwrite($file, json_encode($arr));
		fclose($file);

	}

	/**
	 *
	 *
	 * @return void
	 **/
	function deploy(){
		/* Collect code goes here */
		if(file_exists($this->deploy_file)){
			if($arr = json_decode(file_get_contents($this->deploy_file), JSON_ARRAY)){
				
				if($stylesheet = $arr['stylesheet'])
					update_option('stylesheet', $stylesheet);
				if($template = $arr['template'])
					update_option('template', $template);

			}

		}
	}

}
?>