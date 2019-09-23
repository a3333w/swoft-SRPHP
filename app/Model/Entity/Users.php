<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class Users
 *
 * @since 2.0
 *
 * @Entity(table="users")
 */
class Users extends Model
{
    /**
     * 主键id
     * @Id()
     * @Column()
     * @var int|null
     */
    private $id;

    /**
     * 昵称
     *
     * @Column()
     * @var string|null
     */
    private $nike;

    /**
     * 账号
     *
     * @Column()
     * @var string|null
     */
    private $username;

    /**
     * 密码
     *
     * @Column(hidden=true)
     * @var string|null
     */
    private $password;

    /**
     * 等级
     *
     * @Column()
     * @var int|null
     */
    private $level;

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
     * @var string|null
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
     * @param string|null $nike
     * @return self
     */
    public function setNike(?string $nike): self
    {
        $this->nike = $nike;

        return $this;
    }

    /**
     * @param string|null $username
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string|null $password
     * @return self
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param int|null $level
     * @return self
     */
    public function setLevel(?int $level): self
    {
        $this->level = $level;

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
     * @param string|null $dtime
     * @return self
     */
    public function setDtime(?string $dtime): self
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
    public function getNike(): ?string
    {
        return $this->nike;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
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
     * @return string|null
     */
    public function getDtime(): ?string
    {
        return $this->dtime;
    }

}
