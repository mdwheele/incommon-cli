<?php

namespace InCommon\CLI\Commands;

use InCommon\SoapTypes\customerCertType;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class representing the command for enrolling multiple CSRs with
 * InCommon.
 *
 * @author Dustin Wheeler <mdwheele@ncsu.edu>
 */
class EnrollCertCommand extends AbstractCommand
{
    private $orgId;
    private $orgSecret;

    protected function configure()
    {
        $this->setName('cert:enroll')
             ->setDescription('Enrolls an individual CSR or glob with InCommon.')
             ->addArgument('csr_paths', InputArgument::IS_ARRAY, 'Paths to CSR files.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->promptForCredentials($input, $output);
        $this->promptForOrgCredentials($input, $output);

        $output->writeln("<info>Loading CSR Data...</info>");
        $csrPaths = $input->getArgument('csr_paths');

        foreach ($csrPaths as $path) {
            $csrData = file_get_contents($path);

            $response = $this->incommon->certs->enroll(
                $this->authData,
                $this->orgId,
                $this->orgSecret,
                $csrData,
                "none", // cannot be blank -_-
                "",
                new customerCertType(62, 'InCommon SSL', array(1,2,3)),
                $numberOfServers = 1,
                $serverType = 2,
                $term = 3,
                $comments = ""
            );

            $output->writeln(sprintf("%s: %s", $path, print_r($response, true)));
        }
    }

    protected function promptForOrgCredentials(InputInterface $input, OutputInterface $output)
    {
        $dialog = $this->getHelperSet()->get('dialog');

        $this->orgId = $dialog->ask($output, 'Enter Organization ID: ');
        $this->orgSecret = $dialog->ask($output, 'Enter Secret Key: ');
    }
}