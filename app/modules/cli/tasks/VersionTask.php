<?php
declare(strict_types=1);

namespace Test\Modules\Cli\Tasks;

use Phalcon\Cli\Task;

class VersionTask extends Task
{
    public function mainAction()
    {
        $config = $this->getDI()->get('config');

        echo $config['version'];
    }
}
