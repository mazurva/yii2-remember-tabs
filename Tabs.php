<?php
namespace mazurva\bootstrap;

use \Yii;

class Tabs extends \yii\bootstrap4\Tabs
{
	/**
	@var boolean
	*/
	public $remember = false;

	public function init()
    {
        parent::init();
        $view = $this->getView();
        /* remember tabs */
$script = <<< JS
    $(function() {
        //save the latest tab (http://stackoverflow.com/a/18845441)
        $('a[data-toggle="tab"]').on('click', function (e) {
            localStorage.setItem('lastTab', $(e.target).attr('href'));
        });

        //go to the latest tab, if it exists:
        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('a[href="'+lastTab+'"]').click();
        }
    });
JS;
		$view->registerJs($script, yii\web\View::POS_END);
    }
	
}
