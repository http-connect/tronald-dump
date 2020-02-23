<?php

namespace HttpConnect\TronaldDump\Transport;

use DateTimeInterface;
use HttpConnect\HttpConnect\Transport\ResourceInterface;

class QuoteResource implements ResourceInterface
{
    /**
     * @var DateTimeInterface
     */
    private $appearedAt;

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @var string
     */
    private $quoteId;

    /**
     * @var array|string[]
     */
    private $tags;

    /**
     * @var DateTimeInterface
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $value;

    /**
     * @var array
     */
    private $embedded;

    /**
     * @param DateTimeInterface $appearedAt
     * @param DateTimeInterface $createdAt
     * @param string $quoteId
     * @param string[] $tags
     * @param DateTimeInterface $updatedAt
     * @param string $value
     * @param array $embedded
     */
    public function __construct(
        DateTimeInterface $appearedAt,
        DateTimeInterface $createdAt,
        string $quoteId,
        array $tags,
        DateTimeInterface $updatedAt,
        string $value,
        array $embedded
    ) {
        $this->appearedAt = $appearedAt;
        $this->createdAt = $createdAt;
        $this->quoteId = $quoteId;
        $this->tags = $tags;
        $this->updatedAt = $updatedAt;
        $this->value = $value;
        $this->embedded = $embedded;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) json_encode([
        ], JSON_THROW_ON_ERROR);
    }

    /**
     * @return DateTimeInterface
     */
    public function getAppearedAt(): DateTimeInterface
    {
        return $this->appearedAt;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getQuoteId(): string
    {
        return $this->quoteId;
    }

    /**
     * @return array|string[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public function getEmbedded(): array
    {
        return $this->embedded;
    }
}
