<?php

namespace APP\plugins\generic\processingFramework\classes;
class JHOVEValidator extends Validator
{

	public function __construct($plugin)
	{
		parent::__construct($plugin);

	}

	public function validate($validatableObject): void
	{
		$output = null;
		$retval = null;

		try {
			$command = $this->getLocalServicePath() . '  -kr -h xml -m pdf-hul ' . $validatableObject;
			exec($command, $output, $retval);
			$outputString = implode('', $output);
			$this->output = $this->formatResults($outputString);
		} catch (\Exception $e) {
			$this->output = $e->getMessage();
		}

	}


	public function getServiceName(): string
	{
		return 'jhove';
	}

	public function getServicePath(): string
	{
		return 'jhove';
	}

	public function formatResults(string $result): string
	{
		return $result;
	}
}