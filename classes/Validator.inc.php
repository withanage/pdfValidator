<?php

import ('plugins.generic.processingFramework.classes.FormattedResults');

abstract class Validator
 {

	protected array $errors = [];
	protected string $pluginToolsPath;
	protected string $output;
	protected FormattedResults $formattedResults;

	public function getOutput(): string
	{
		return $this->output;
	}
	protected \Plugin $plugin;
	public function __construct( \Plugin $plugin)
	{
		$this->pluginToolsPath = \Core::getBaseDir().DIRECTORY_SEPARATOR.$plugin->getPluginPath().DIRECTORY_SEPARATOR.'bin';

	}
	abstract public function executeCommand(string $validatableObject) : bool;

	abstract public function getFormattedResults(string $input): \FormattedResults;



	abstract public function getServiceName(): string;
	abstract public function getServicePath(): string;

	public function getLocalServicePath() :string
	{
	return $this->pluginToolsPath.DIRECTORY_SEPARATOR.$this->getServiceName().DIRECTORY_SEPARATOR.$this->getServicePath();
	}

	public function getErrors(): array
	{
		return $this->errors;
	}

}
