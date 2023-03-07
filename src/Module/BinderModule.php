<?php
namespace LocalbrandingDe\BinderBundle\Module;

class BinderModule extends \Module
{
    /**
     * @var string
     */

    
    private $statesManager;
    /**
     * Displays a wildcard in the back end.
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new \BackendTemplate('be_wildcard');
            
            $template->wildcard = '### '.utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['helloWorld'][0]).' ###';
            //$template->title = $this->headline;
            $template->title = "JS Binder Module > ".$this->name;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id='.$this->id;
            
            return $template->parse();
        }
        
        return parent::generate();
    }
    
    /**
     * Generates the module.
     */
    protected function compile()
    {
        if (isset($_GET['binder'])) {
            $binder = $_GET['binder'];
            $bundle="bundles/binder/js/".$binder.".js";
            $files="files/theme_lb_team/js/".$binder.".js";
           
            if(file_exists($bundle))
            {
                file_put_contents("binder.txt",$_GET['binder']);
              
                header("Content-type: application/x-javascript");
                echo(\Controller::replaceInsertTags(file_get_contents($bundle)));
                exit;
            }
            if(is_readable($files))
            {
            
                $binder = $_GET['binder'];
                header("Content-type: application/x-javascript");
                echo(\Controller::replaceInsertTags(file_get_contents($files)));
                exit;
            }
            else
            {
                /*    header('HTTP/1.1 500 Internal Server Booboo');
                 echo(json_encode(array('message' => 'ERROR', 'code' => 1337,'width' =>$width,'height' =>$height)));*/
            }
          
            exit;
            
        }
        if (isset($_GET['binderjs'])) {
            $binder = $_GET['binderjs'];
            $bundle="bundles/binder/js/".$binder.".js";
            $files="files/theme_lb_team/js/".$binder.".js";
            
            if(file_exists($bundle))
            {

                
                header("Content-type: application/x-javascript");
                echo(\Controller::replaceInsertTags(file_get_contents($bundle)));
                exit;
            }
            if(is_readable($files))
            {
                
                $binder = $_GET['binderjs'];
                header("Content-type: application/x-javascript");
                echo(\Controller::replaceInsertTags(file_get_contents($files)));
                exit;
            }
            else
            {
                /*    header('HTTP/1.1 500 Internal Server Booboo');
                 echo(json_encode(array('message' => 'ERROR', 'code' => 1337,'width' =>$width,'height' =>$height)));*/
            }
            
            exit;
            
        }
        if (isset($_GET['bindercss'])) {
            $binder = $_GET['bindercss'];
            $bundle="bundles/binder/css/".$binder.".css";
            $files="files/theme_lb_team/css/".$binder.".css";

            if(file_exists($bundle))
            {

                
                header("Content-type: text/css");
                echo(\Controller::replaceInsertTags(file_get_contents($bundle)));
                exit;
            }
            if(is_readable($files))
            {
                
                $binder = $_GET['bindercss'];
                header("Content-type: text/css");
                echo(\Controller::replaceInsertTags(file_get_contents($files)));
                exit;
            }
            else
            {
                /*    header('HTTP/1.1 500 Internal Server Booboo');
                 echo(json_encode(array('message' => 'ERROR', 'code' => 1337,'width' =>$width,'height' =>$height)));*/
            }
            
            exit;
            
        }
    }
    
    
    
    }