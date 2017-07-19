<?php
declare(strict_types=1);

namespace #[[$NAMESPACE$]]#;

use Symfony\Component\Console;

/**
 * Class #[[$NAME$]]#
 * @package Console\Command\Data
 */
class #[[$NAME$]]# extends Console\Command\Command
{
    /**
     * #[[$NAME$]]# constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        \$this->setName('');
        \$this->setDescription('');
    }

    /**
     * @param Console\Input\InputInterface \$input
     * @param Console\Output\OutputInterface \$output
     * @return int
     */
    protected function execute(Console\Input\InputInterface \$input, Console\Output\OutputInterface \$output)
    {
        return 0;
    }
}
