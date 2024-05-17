<?php

class Task
{
	private string $title;
	private string $description;
	private DateTime $createdAt;
	private DateTime $endDate;

	public function __construct(string $title, string $description, DateTime $createdAt, DateTime $endDate)
	{
		$this->title = $title;
		$this->description = $description;
		$this->createdAt = $createdAt;
		$this->endDate = $endDate;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getCreatedAt(): DateTime
	{
		return $this->createdAt;
	}

	public function getEndDate(): DateTime
	{
		return $this->endDate;
	}
}