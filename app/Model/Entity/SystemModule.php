<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 【系统】 模块表
 * Class SystemModule
 *
 * @since 2.0
 *
 * @Entity(table="system_module")
 */
class SystemModule extends Model
{
    /**
     * 主键
     * @Id()
     * @Column()
     * @var int|null
     */
    private $id;

    /**
     * 是否系统模块 1是 2否
     *
     * @Column()
     * @var int
     */
    private $system;

    /**
     * 模块名称
     *
     * @Column()
     * @var string|null
     */
    private $name;

    /**
     * 模块标识（模块名（字母）.开发者标识.module）
     *
     * @Column()
     * @var string|null
     */
    private $identifier;

    /**
     * 模块标题
     *
     * @Column()
     * @var string|null
     */
    private $title;

    /**
     * 模块简介
     *
     * @Column()
     * @var string|null
     */
    private $intro;

    /**
     * 作者
     *
     * @Column()
     * @var string|null
     */
    private $author;

    /**
     * 图标
     *
     * @Column()
     * @var string|null
     */
    private $icon;

    /**
     * 版本号
     *
     * @Column()
     * @var string|null
     */
    private $version;

    /**
     * 模块文档url
     *
     * @Column()
     * @var string|null
     */
    private $url;

    /**
     * 排序
     *
     * @Column()
     * @var int
     */
    private $sort;

    /**
     * 状态
     *
     * @Column()
     * @var int
     */
    private $status;

    /**
     * 默认模板
     *
     * @Column()
     * @var int|null
     */
    private $default;

    /**
     * 配置文件夹
     *
     * @Column()
     * @var string|null
     */
    private $config;

    /**
     * 主题模板
     *
     * @Column()
     * @var string
     */
    private $theme;

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
     * @param int $system
     * @return self
     */
    public function setSystem(int $system): self
    {
        $this->system = $system;

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
     * @param string|null $identifier
     * @return self
     */
    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;

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
     * @param string|null $intro
     * @return self
     */
    public function setIntro(?string $intro): self
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * @param string|null $author
     * @return self
     */
    public function setAuthor(?string $author): self
    {
        $this->author = $author;

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
     * @param string|null $version
     * @return self
     */
    public function setVersion(?string $version): self
    {
        $this->version = $version;

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
     * @param int $sort
     * @return self
     */
    public function setSort(int $sort): self
    {
        $this->sort = $sort;

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
     * @param int|null $default
     * @return self
     */
    public function setDefault(?int $default): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @param string|null $config
     * @return self
     */
    public function setConfig(?string $config): self
    {
        $this->config = $config;

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
     * @return int
     */
    public function getSystem(): int
    {
        return $this->system;
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
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
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
    public function getAuthor(): ?string
    {
        return $this->author;
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
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
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
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getDefault(): ?int
    {
        return $this->default;
    }

    /**
     * @return string|null
     */
    public function getConfig(): ?string
    {
        return $this->config;
    }

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
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
