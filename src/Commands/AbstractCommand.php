<?php

namespace InCommon\CLI\Commands;

use InCommon\InCommon;
use InCommon\SoapTypes\authData as AuthData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Base class for implementing Symfony commands.  This class adds a few common utility functions.
 *
 * @author Dustin Wheeler <mdwheele@ncsu.edu>
 */
class AbstractCommand extends Command
{
    protected $finder;
    protected $incommon;

    protected $authData;

    public function __construct(InCommon $incommon, $name = null)
    {
        $this->finder = new Finder();
        $this->incommon = $incommon;

        parent::__construct($name);
    }

    protected function promptForCredentials(InputInterface $input, OutputInterface $output)
    {
        $dialog = $this->getHelperSet()->get('dialog');

        #$login = $dialog->ask($output, 'Enter login: ');
        $login = 'mdwheele@ncsu.edu';
        $password = $dialog->askHiddenResponse($output, 'Enter password: ');

        $this->authData = new authData('InCommon', $login, $password);
    }

    /**
     * Renders an error message to an OutputInterface.  The error has a bright red background.
     *
     * @param string $message Message to send to output.
     * @param OutputInterface $output Console output interface.
     */
    protected function printError($message, OutputInterface $output) {
        $len = $this->getApplication()->getTerminalDimensions(); # 0 is width.

        $messages = array('', '');
        $messages[] = $emptyLine = sprintf('<error>%s</error>', str_repeat(' ', $len[0]));
        $messages[] = sprintf('<error> %s%s</error>', $message, str_repeat(' ', max(0, $len[0] - strlen($message) - 1)));
        $messages[] = $emptyLine;
        $messages[] = '';
        $messages[] = '';

        $output->writeln($messages);
    }
}