<?php

class Task
{
	private int $id;
	private string $title;
	private string $description;
	private DateTime $createdAt;
	private DateTime $endDate;
	private bool $done;
	private bool $deleted;

	public function __construct(int $id, string $title, string $description, bool $done=false, DateTime $createdAt=new DateTime(), DateTime $endDate=new DateTime(), bool $deleted=false)
	{
		$this->id = $id;
		$this->title = $title;
		$this->done = $done;
		$this->description = $description;
		$this->createdAt = $createdAt;
		$this->endDate = $endDate;
		$this->deleted = $deleted;
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

	public function isDeleted(): bool
	{
		return $this->deleted;
	}

	public function delete(): void
	{
		$this->deleted = true;
	}

	public function restore(): void
	{
		$this->deleted = false;
	}

	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	public function setDescription(string $description): void
	{
		$this->description = $description;
	}
}
