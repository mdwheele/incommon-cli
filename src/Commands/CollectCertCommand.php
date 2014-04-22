<?php

namespace InCommon\CLI\Commands;

use InCommon\SoapTypes\customerCertType;
use League\Csv\Reader;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 *
 * @author Dustin Wheeler <mdwheele@ncsu.edu>
 */
class CollectCertCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('cert:collect')
             ->setDescription('Collects an individual CRT.')
             ->addArgument('csv_path', InputArgument::REQUIRED, 'InCommon CertManager CSV Export.')
             ->addArgument('dst_path', InputArgument::REQUIRED, 'Destination path for certs to be downloaded to.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->promptForCredentials($input, $output);
        $dstPath = $input->getArgument('dst_path');

        $csvPath = $input->getArgument('csv_path');
        $reader = new Reader($csvPath);

        $csv = $reader
            ->setOffset(1)
            ->fetchAll();

        // Create destination folder.
        mkdir($dstPath, 0777, true);
        if ( ! is_writeable($dstPath)) {
            die("OMERGERD COULDNT WRITE TO DIRECTORY!!!");
        }

        foreach ($csv as $row) {
            list($sslId, $cn, $status) = array($row[0], $row[2], $row[4]);

            if ($status != 'Issued') {
                $output->writeln(
                    sprintf("<info>%s is %s. Skipping...</info>", $cn, $status)
                );

                continue;
            }

            $output->writeln(sprintf("%s (%s): %s", $cn, $sslId, $status));

            $response = $this->incommon->certs->collect(
                $this->authData,
                $sslId,
                1
            );

            // Get cert contents.
            $certData = $response->SSL->certificate;

            // Clean * out of CN
            $filename = str_replace('*', 'star', $cn);

            // Write file
            $filepath = "{$dstPath}/{$filename}.crt";
            $fp = fopen($filepath, "w");
            fwrite($fp, $certData);
            fclose($fp);
        }
    }
}