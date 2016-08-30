<?php

function flash($title = null, $message = null) {
	$flash = app('App\Http\Flash');

	if (func_num_args() == 0) {
		return $flash;
	}

	return $flash->info($title, $message);
}

/**
 * The path to the given flyer
 * @param  App\Flyer  $flyer 
 * @return string        
 */
function flyer_path(App\Flyer $flyer) {
	return $flyer->zip . '/' . str_replace(' ', '-', $flyer->street);
}

function link_to($body, $path, $type) {

	$csrf = csrf_field();	
	$method = method_field($type);

	if (is_object($path)) {
		$action = '/' . $path->getTable();

		if (in_array($type, ['PUT', 'PATCH', 'DELETE'])) {
			$action .= '/' . $path->getKey();
		}
	} else {
		$action = $path;
	}

	$url = url($action);

	return <<<EOT
		<form action="{$url}" method="POST" >
			$csrf
			$method
			
			<button type="submit">{$body}</button>
			
		</form>
EOT;
}
