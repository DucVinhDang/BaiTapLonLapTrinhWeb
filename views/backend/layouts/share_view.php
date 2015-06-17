<?php
	class Share_view {
	    function render($file, $variables) {
	    	if (isset($variables)) { extract($variables); }
	        ob_start();
	        include $file;
	        $renderedView = ob_get_clean();
	        return $renderedView;
	    }
	}
?>