<?php

namespace InCommon\CLI\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckStatusCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('cert:status')
             ->setDescription('Checks the status of an SSL cert given SSL identifier.')
             ->addArgument('sslid', InputArgument::REQUIRED, 'Path to CSR or glob.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->promptForCredentials($input, $output);

        $sslId = $input->getArgument('sslid');

        # response statuscode = -23 seems to be 'requested'.
        $response = $this->incommon->certs->checkStatus($this->authData, $sslId);

        var_dump($response);
    }
}