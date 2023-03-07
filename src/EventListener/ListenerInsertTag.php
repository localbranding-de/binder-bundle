<?php 
namespace LocalbrandingDe\BinderBundle\EventListener;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\Widget;
use \FrontendUser;


/**
 * @Hook("replaceInsertTags")
 * 
 */
class ListenerInsertTag
{

    private $config;
    public function __invoke(string $tag)
    {
        

        $chunks = explode('::', $tag);
        switch($chunks[0]){
            case 'lb_binderInsert':
                return '<script src="'.$_SERVER[REQUEST_URI].'?binder='.$chunks[1].'"></script>';
                break;
            case 'lb_binderInsertJs':
                return '<script src="'.$_SERVER[REQUEST_URI].'?binderjs='.$chunks[1].'"></script>';
                break;
            case 'lb_binderInsertCss':
                return '<link href="'.$_SERVER[REQUEST_URI].'?bindercss='.$chunks[1].'" rel="stylesheet" />';
                break;


           default:
               return false;
               break;
        }
     
        
      
    }
}

?>
