<?php

class Load
{
    public function view($filename, $vars = array(), $display = false)
    {
        if (!empty($vars)) {
            extract($vars);
        }
        ob_start();
        include $filename;
        $include = ob_get_contents();
        ob_end_clean();
        
        if ($display) {
            return $include;
        }
        echo $include;
    }
}
/* usage
<?php 
    include 'loadView.php';
    $load = new Load;
    $load->view('application.php');
?>
<?php 
    include 'loadView.php';
    $load = new Load;
    $view = $load->view('application.php',[],false);
?>