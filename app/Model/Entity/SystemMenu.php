<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 【系统】菜单表
 * Class SystemMenu
 *
 * @since 2.0
 *
 * @Entity(table="system_menu")
 */
class SystemMenu extends Model
{
    /**
     * 主键
     * @Id()
     * @Column()
     * @var int|null
     */
    private $id;

    /**
     * 管理员id 快捷菜单专用
     *
     * @Column()
     * @var int|null
     */
    private $uid;

    /**
     * 父菜单id
     *
     * @Column()
     * @var int|null
     */
    private $pid;

    /**
     * 模块名称
     *
     * @Column()
     * @var string|null
     */
    private $module;

    /**
     * 菜单标题
     *
     * @Column()
     * @var string|null
     */
    private $title;

    /**
     * 菜单级别
     *
     * @Column()
     * @var int
     */
    private $level;

    /**
     * 菜单图标
     *
     * @Column()
     * @var string|null
     */
    private $icon;

    /**
     * 方法路由(模块/控制器/方法)
     *
     * @Column()
     * @var string|null
     */
    private $url;

    /**
     * 菜单连接 仅用于2级菜单的页面跳转
     *
     * @Column()
     * @var string|null
     */
    private $hraf;

    /**
     * 扩展参数
     *
     * @Column()
     * @var string|null
     */
    private $param;

    /**
     * 排序
     *
     * @Column()
     * @var int
     */
    private $sort;

    /**
     * 菜单是否显示 1是 0否
     *
     * @Column()
     * @var int
     */
    private $nav;

    /**
     * 状态 1显示 0 不显示
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
     * @param int|null $uid
     * @return self
     */
    public function setUid(?int $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * @param int|null $pid
     * @return self
     */
    public function setPid(?int $pid): self
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * @param string|null $module
     * @return self
     */
    public function setModule(?string $module): self
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @param string|null $title
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param int $level
     * @return self
     */
    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @param string|null $icon
     * @return self
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @param string|null $url
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param string|null $hraf
     * @return self
     */
    public function setHraf(?string $hraf): self
    {
        $this->hraf = $hraf;

        return $this;
    }

    /**
     * @param string|null $param
     * @return self
     */
    public function setParam(?string $param): self
    {
        $this->param = $param;

        return $this;
    }

    /**
     * @param int $sort
     * @return self
     */
    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @param int $nav
     * @return self
     */
    public function setNav(int $nav): self
    {
        $this->nav = $nav;

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
     * @return int|null
     */
    public function getUid(): ?int
    {
        return $this->uid;
    }

    /**
     * @return int|null
     */
    public function getPid(): ?int
    {
        return $this->pid;
    }

    /**
     * @return string|null
     */
    public function getModule(): ?string
    {
        return $this->module;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getHraf(): ?string
    {
        return $this->hraf;
    }

    /**
     * @return string|null
     */
    public function getParam(): ?string
    {
        return $this->param;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @return int
     */
    public function getNav(): int
    {
        return $this->nav;
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
