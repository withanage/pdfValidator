<?php

class xmlUtils
{

	public static function xmlNodeToString($node, $level = 0): string
	{
		$markdown = '';


		switch ($node->nodeType) {
			case XML_ELEMENT_NODE:
				$tagName = $node->tagName;
				switch ($tagName) {
					case 'jhove':
						foreach ($node->childNodes as $child) {
							$markdown .= self::xmlNodeToString($child, $level);
						}
						break;
					case 'reportingModule':
						$markdown .= "Module: " . $node->nodeValue . "  ";
						break;
					case 'version':
						$markdown .= "PDF version: " . $node->nodeValue . "  ";
						break;
					case 'status':
						$markdown .= "Status: " . $node->nodeValue . "  ";
						break;
					default:
						break;
				}

				foreach ($node->childNodes as $child) {
					$markdown .= self::xmlNodeToString($child, $level + 1);
				}
				break;
			case XML_TEXT_NODE:
				break;
			default:
				break;
		}

		return $markdown;
	}
}
