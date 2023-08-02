<?php
declare(strict_types=1);

namespace Test\Modules\Cli\Tasks;

use Phalcon\Cli\Task;

class MainTask extends Task
{
    public function mainAction()
    {
        echo "Congratulations! You are now flying with Phalcon CLI!";
    }
}
