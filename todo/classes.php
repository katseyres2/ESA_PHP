<?php

class Task
{
	private int $id;
	private string $title;
	private string $description;
	private DateTime $createdAt;
	private DateTime $endDate;
	private bool $done;

	public function __construct(int $id, string $title, string $description, bool $done=false, DateTime $createdAt=new DateTime(), DateTime $endDate=new DateTime())
	{
		$this->id = $id;
		$this->title = $title;
		$this->done = $done;
		$this->description = $description;
		$this->createdAt = $createdAt;
		$this->endDate = $endDate;
	}

	public function getId(): int
	{
		return $this->id;
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

	public function isDone(): bool
	{
		return $this->done;
	}

	public function setDone(bool $done): void
	{
		$this->done = $done;
	}
}