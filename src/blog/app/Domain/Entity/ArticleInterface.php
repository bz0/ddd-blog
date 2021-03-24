<?php
declare(strict_types=1);

namespace App\Domain\Entity;

/**
 * Todo項目エンティティのインターフェース
 * @package N1215\LaraTodo\Common
 */
interface ArticleInterface
{
    /**
     * IDを取得
     * @return int
     */
    public function getId(): int;

    /**
     * タイトルを取得
     * @return Title
     */
    public function getTitle(): string;

    /**
     * 本文を取得
     * @return Title
     */
    public function getBody(): string;
}