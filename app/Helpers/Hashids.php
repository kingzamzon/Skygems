<?php

use Hashids\Hashids;

/**
 * encodes an id
 * @param int $id
 * @return string
 */
function encodeId($id, $padding = 10)
{
    $hashId = new Hashids(env('APP_KEY', '3sdf3esd8s8kjsksdsksjksdnji3u434'), $padding);
    return $hashId->encode($id);
}

/**
 * encodes many id
 * @param array $id
 * @return string
 */
function encodeIds(array $ids, $padding = 10)
{
    // return null if id is null
    if (null === $ids) {
        return null;
    }

    // if is an integer return integer
    if (gettype($ids) !== 'array') {
        return $ids;
    }

    // create a list of encoded ids
    $encoded = [];
    foreach ($ids as $id) {
        $encoded[] = encodeId($id, $padding);
    }

    // return encoded data
    return $encoded;
}

/**
 * decode an encoded id
 * @param string $id
 * @return int
 */
function decodeId($id, $padding = 10)
{
    // return null if id is null
    if (is_null($id)) {
        return null;
    }

    // if is an integer return integer
    if (is_integer($id)) {
        return $id;
    }

    $hashId = new Hashids(env('APP_KEY', '3sdf3esd8s8kjsksdsksjksdnji3u434'), $padding);
    // decode id
    $decoded = $hashId->decode($id);
    return isset($decoded[0]) ? (int) $decoded[0] : $id;
}

/**
 * decode many encoded ids
 * @param array $id
 * @return int
 */
function decodeIds($ids, $padding = 10)
{
    // return null if id is null
    if (is_null($ids)) {
        return null;
    }

    // if is an integer return integer
    if (!is_array($ids)) {
        return $ids;
    }

    // decode id
    $decoded = [];
    foreach ($ids as $id) {
        $decoded[] = decodeId($id, $padding);
    }

    // return decoded ids
    return $decoded;
}


/**
 * encodes an hex
 * @param string $hex
 * @return string
 */
function encodeHex($hex, $padding = 10)
{
    $hashHex = new Hashids(env('APP_KEY', '3sdf3esd8s8kjsksdsksjksdnji3u434'), $padding);
    return $hashHex->encodeHex($hex);
}

/**
 * encodes many hex
 * @param array $hex
 * @return string
 */
function encodeHexes($hexes, $padding = 10)
{
    // return null if hex is null
    if (is_null($hexes)) {
        return null;
    }

    // if is an integer return integer
    if (!is_array($hexes)) {
        return $hexes;
    }

    // create a list of encoded hexes
    $encoded = [];
    foreach ($hexes as $hex) {
        $encoded[] = encodeHex($hex, $padding);
    }

    // return encoded data
    return $encoded;
}

/**
 * decode an encoded hex
 * @param string $hex
 * @return int
 */
function decodeHex($hex, $padding = 10)
{
    // return null if hex is null
    if (is_null($hex)) {
        return null;
    }

    // if is an integer return integer
    if (is_integer($hex)) {
        return $hex;
    }

    $hashHex = new Hashids(env('APP_KEY', '3sdf3esd8s8kjsksdsksjksdnji3u434'), $padding);
    // decode hex
    $decoded = $hashHex->decodeHex($hex);
    return isset($decoded[0]) ? (int)$decoded[0] : null;
}

/**
 * decode many encoded hexes
 * @param array $hex
 * @return int
 */
function decodeHexes($hexes, $padding = 10)
{
    // return null if hex is null
    if (is_null($hexes)) {
        return null;
    }

    // if is an integer return integer
    if (!is_array($hexes)) {
        return $hexes;
    }

    // decode hex
    $decoded = [];
    foreach ($hexes as $hex) {
        $decoded[] = decodeHex($id, $padding);
    }

    // return decoded hexes
    return $decoded;
}
