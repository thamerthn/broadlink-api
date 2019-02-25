<?php

namespace BroadlinkApi\Device;

use BroadlinkApi\Cipher\CipherInterface;
use BroadlinkApi\Cipher\Cipher;

/**
 * @TODO:
 * - Remove (BroadcastDevice.php, Device.php)
 * - Leave only DiscoveredDevice.php, AuthenticatedDevice.php, (all extended)
 * - Remove unnecessary nested passing of device references in methods
 * - Refactor workflow as follows:
 *      1) After discovering: DiscoveredDevice[]
 *      2) After authentication of each device: AuthenticatedDevice[]|Corresponding Extended Class[]
 */
class IdentifiedDevice implements IdentifiedDeviceInterface
{
    /**
     * @var int
     */
    private $deviceId;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $mac;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $model;

    public function __construct(string $ip, string $mac, int $deviceId, string $name, string $model)
    {
        $this->ip = $ip;
        $this->mac = $mac;
        $this->deviceId = $deviceId;
        $this->name = $name;
        $this->model = $model;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getMac(): string
    {
        return $this->mac;
    }

    public function getId(): int
    {
        return $this->deviceId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPort(): int
    {
        return self::DEFAULT_PORT;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getCipher(): CipherInterface
    {
        return new Cipher(self::BASE_KEY, self::BASE_IV);
    }
}