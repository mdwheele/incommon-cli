<?php

namespace InCommon\CLI\Commands;

use InCommon\SoapTypes\customerCertType;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 *
 * @author Dustin Wheeler <mdwheele@ncsu.edu>
 */
class EnrollCertCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('cert:enroll')
             ->setDescription('Enrolls an individual CSR or glob with InCommon.')
             ->addArgument('path_to_csr', InputArgument::REQUIRED, 'Path to CSR or glob.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->promptForCredentials($input, $output);

        $output->writeln("<info>Loading CSR Data...</info>");
        $csrPath = $input->getArgument('path_to_csr');
        $csrData = file_get_contents($csrPath);

        $response = $this->incommon->certs->enroll(
            $this->authData,
            0,
            "",
            $csrData,
            "none", // cannot be blank -_-
            "",
            new customerCertType(62, 'InCommon SSL', array(1,2,3)),
            1,
            2,
            3,
            ""
        );

        var_dump($response);
    }
}