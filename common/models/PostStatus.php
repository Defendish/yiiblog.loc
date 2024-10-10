<?php

namespace common\models;

class PostStatus
{
    const BRAND_NEW = 0;
    const PUBLISHED = 10;
    const REJECTED = 20;

    public static function getList() {
        return [
            self::BRAND_NEW => 'Новый',
            self::PUBLISHED => 'Опубликован',
            self::REJECTED => 'Отклонен',
        ];
    }

    public static function getText($value) {
        $list = self::getList();
        return isset($list[$value]) ? $list[$value] : null;
    }

    public static function getApiList() {
        return [
            self::BRAND_NEW => 'brandnew',
            self::PUBLISHED => 'published',
            self::REJECTED => 'rejected',
        ];
    }
}