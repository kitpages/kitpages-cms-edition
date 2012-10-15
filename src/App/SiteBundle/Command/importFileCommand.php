<?php
namespace App\SiteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class importFileCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('kitCmsDemo:importFile')
            ->setHelp(<<<EOT
The <info>kitCmsDemo:importFile</info> command to import the demonstration files related in the database.

<info>php app/console kitCmsDemo:importFile</info>

EOT
            )
            ->setDescription('import demonstration files')
            ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln('Import file');
        if (!is_dir("app/data")) {
            mkdir("app/data");
        }
        if (!is_dir("app/data/bundle")) {
            mkdir("app/data/bundle");
        }
        $this->recursiveCopy("app/dataInit/bundle", "app/data/bundle");
    }

    protected function recursiveRmdir($dir) {
      if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file)
        if ($file != "." && $file != "..") $this->recursiveRmdir("$dir/$file");
        rmdir($dir);
      }
      else if (file_exists($dir)) unlink($dir);
    }

    // copies files and non-empty directories
    protected function recursiveCopy($src, $dst) {
      if (file_exists($dst)) $this->recursiveRmdir($dst);
      if (is_dir($src)) {
        mkdir($dst);
        $files = scandir($src);
        foreach ($files as $file)
        if ($file != "." && $file != "..") $this->recursiveCopy("$src/$file", "$dst/$file");
      }
      else if (file_exists($src)) copy($src, $dst);
    }

}