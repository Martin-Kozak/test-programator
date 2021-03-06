<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette\PhpGenerator;


/**
 * Promoted parameter in constructor.
 */
final class PromotedParameter extends Parameter
{
	use Traits\VisibilityAware;
	use Traits\CommentAware;

	/** @var bool */
	private $readOnly = false;


	/** @return static */
	public function setReadOnly(bool $state = true): self
	{
		$this->readOnly = $state;
		return $this;
	}


	public function isReadOnly(): bool
	{
		return $this->readOnly;
	}
}
