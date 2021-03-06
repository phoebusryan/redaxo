<?php

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @package redaxo\core
 */
class rex_command_package_install extends rex_console_command
{
    protected function configure()
    {
        $this
            ->setDescription('Installs the selected package')
            ->addArgument('package-id', InputArgument::REQUIRED, 'The id of the package (addon or plugin); e.g. "cronjob" or "structure/content"')
            ->addOption('re-install', '-r', InputOption::VALUE_NONE, 'Allows to reinstall the Package without asking the User');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = $this->getStyle($input, $output);

        $packageId = $input->getArgument('package-id');
        $package = rex_package::get($packageId);
        if ($package instanceof rex_null_package) {
            $io->error('Package "'.$packageId.'" doesn\'t exists!');
            return 1;
        }

        if ($package->isInstalled() && !$input->getOption('re-install')) {
            $helper = $this->getHelper('question');
            $question = new \Symfony\Component\Console\Question\ConfirmationQuestion('Package "'.$package->getPackageId().'" is already installed. Should it be reinstalled? (y/n) ', false);
            if (!$helper->ask($input, $output, $question)) {
                $io->success('Package "'.$package->getPackageId().'" wasn\'t reinstalled');
                return 0;
            }
        }

        $manager = rex_package_manager::factory($package);
        try {
            $success = $manager->install();
        } catch (rex_functional_exception $e) {
            $io->error($e->getMessage());
            return 1;
        }
        $message = strip_tags($manager->getMessage());
        if ($success) {
            $io->success($message);
            return 0;
        }
        $io->error($message);
        return 1;
    }
}
