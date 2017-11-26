<?php
declare(strict_types=1);

namespace App\Id;

use MongoDB\BSON\Binary;

/**
 * Class IdModifier
 * @package App\Id
 */
final class IdModifier
{
    const PACK_FORMAT = 'H*';

    /**
     * @param string $uuid
     * @return Binary
     */
    public static function uuidStringToBin(string $uuid): Binary
    {
        $uuid = str_replace('-', '', $uuid);
        $uuid = pack(self::PACK_FORMAT, $uuid);
        return new Binary($uuid, Binary::TYPE_UUID);
    }

    /**
     * @param Binary $uuid
     * @return string
     */
    public static function uuidBinToString(Binary $uuid): string
    {
        $id = $uuid->getData();
        $id = unpack(self::PACK_FORMAT, $id);
        $id = implode('', $id);
        $id = str_split($id, 4);
        $id = vsprintf('%s%s-%s-%s-%s-%s%s%s', $id);
        return $id;
    }
}
