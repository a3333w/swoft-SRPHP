<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 【系统】管理员账号表
 * Class SystemUser
 *
 * @since 2.0
 *
 * @Entity(table="system_user")
 */
class SystemUser extends Model
{
    /**
     * 主键
     * @Id()
     * @Column()
     * @var int|null
     */
    private $id;

    /**
     * 角色表id
     *
     * @Column(name="role_id", prop="roleId")
     * @var int|null
     */
    private $roleId;

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
     * 昵称
     *
     * @Column()
     * @var string|null
     */
    private $nike;

    /**
     * 手机
     *
     * @Column()
     * @var string|null
     */
    private $mobile;

    /**
     * 邮箱
     *
     * @Column()
     * @var string|null
     */
    private $email;

    /**
     * [优先角色权限，再可单独设置此管理员权限]
     *
     * @Column()
     * @var string|null
     */
    private $auth;

    /**
     * 0默认 1框架
     *
     * @Column()
     * @var int|null
     */
    private $iframe;

    /**
     * 前台主题
     *
     * @Column()
     * @var string
     */
    private $theme;

    /**
     * 状态 1正常 0非正常
     *
     * @Column()
     * @var int
     */
    private $status;

    /**
     * 最后登陆ip
     *
     * @Column(name="last_login_ip", prop="lastLoginIp")
     * @var string|null
     */
    private $lastLoginIp;

    /**
     * 最后登陆时间
     *
     * @Column(name="last_login_time", prop="lastLoginTime")
     * @var int|null
     */
    private $lastLoginTime;

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
     * @param int|null $roleId
     * @return self
     */
    public function setRoleId(?int $roleId): self
    {
        $this->roleId = $roleId;

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
     * @param string|null $nike
     * @return self
     */
    public function setNike(?string $nike): self
    {
        $this->nike = $nike;

        return $this;
    }

    /**
     * @param string|null $mobile
     * @return self
     */
    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * @param string|null $email
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

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
     * @param int|null $iframe
     * @return self
     */
    public function setIframe(?int $iframe): self
    {
        $this->iframe = $iframe;

        return $this;
    }

    /**
     * @param string $theme
     * @return self
     */
    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

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
     * @param string|null $lastLoginIp
     * @return self
     */
    public function setLastLoginIp(?string $lastLoginIp): self
    {
        $this->lastLoginIp = $lastLoginIp;

        return $this;
    }

    /**
     * @param int|null $lastLoginTime
     * @return self
     */
    public function setLastLoginTime(?int $lastLoginTime): self
    {
        $this->lastLoginTime = $lastLoginTime;

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
     * @return int|null
     */
    public function getRoleId(): ?int
    {
        return $this->roleId;
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
     * @return string|null
     */
    public function getNike(): ?string
    {
        return $this->nike;
    }

    /**
     * @return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getAuth(): ?string
    {
        return $this->auth;
    }

    /**
     * @return int|null
     */
    public function getIframe(): ?int
    {
        return $this->iframe;
    }

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getLastLoginIp(): ?string
    {
        return $this->lastLoginIp;
    }

    /**
     * @return int|null
     */
    public function getLastLoginTime(): ?int
    {
        return $this->lastLoginTime;
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
