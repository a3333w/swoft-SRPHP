<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 【系统】角色表
 * Class SystemRole
 *
 * @since 2.0
 *
 * @Entity(table="system_role")
 */
class SystemRole extends Model
{
    /**
     * 主键
     * @Id()
     * @Column()
     * @var int|null
     */
    private $id;

    /**
     * 角色名称
     *
     * @Column()
     * @var string|null
     */
    private $name;

    /**
     * 角色简介
     *
     * @Column()
     * @var string|null
     */
    private $intro;

    /**
     * [1，2，3，4] 角色权限->菜单id
     *
     * @Column()
     * @var string|null
     */
    private $auth;

    /**
     * 状态
     *
     * @Column()
     * @var int
     */
    private $status;

    /**
     * 
     *
     * @Column(name="created_at", prop="createdAt")
     * @var string
     */
    private $createdAt;

    /**
     * 
     *
     * @Column(name="updated_at", prop="updatedAt")
     * @var string
     */
    private $updatedAt;

    /**
     * 
     *
     * @Column()
     * @var string
     */
    private $dtime;


    /**
     * @param int|null $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string|null $intro
     * @return self
     */
    public function setIntro(?string $intro): self
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * @param string|null $auth
     * @return self
     */
    public function setAuth(?string $auth): self
    {
        $this->auth = $auth;

        return $this;
    }

    /**
     * @param int $status
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param string $createdAt
     * @return self
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param string $updatedAt
     * @return self
     */
    public function setUpdatedAt(string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @param string $dtime
     * @return self
     */
    public function setDtime(string $dtime): self
    {
        $this->dtime = $dtime;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getIntro(): ?string
    {
        return $this->intro;
    }

    /**
     * @return string|null
     */
    public function getAuth(): ?string
    {
        return $this->auth;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getDtime(): string
    {
        return $this->dtime;
    }

}
