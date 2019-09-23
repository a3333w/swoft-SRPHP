<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 【系统】配置表
 * Class SystemConfig
 *
 * @since 2.0
 *
 * @Entity(table="system_config")
 */
class SystemConfig extends Model
{
    /**
     * 主键
     * @Id()
     * @Column()
     * @var int|null
     */
    private $id;

    /**
     * 是否系统配置 1是 0不是
     *
     * @Column()
     * @var int
     */
    private $system;

    /**
     * 配置分组
     *
     * @Column()
     * @var string
     */
    private $group;

    /**
     * 配置标题
     *
     * @Column()
     * @var string|null
     */
    private $title;

    /**
     * 配置名称
     *
     * @Column()
     * @var string|null
     */
    private $name;

    /**
     * 配置值
     *
     * @Column()
     * @var string|null
     */
    private $value;

    /**
     * 配置类型（文件、图片、表单、多选）
     *
     * @Column()
     * @var string|null
     */
    private $type;

    /**
     * 配置项目（表单：7:左下角1:左上角4:左居中）
     *
     * @Column()
     * @var string|null
     */
    private $options;

    /**
     * 文件上传接口
     *
     * @Column()
     * @var string|null
     */
    private $url;

    /**
     * 配置提示
     *
     * @Column()
     * @var string|null
     */
    private $tips;

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
     * 创建时间
     *
     * @Column(name="created_at", prop="createdAt")
     * @var string
     */
    private $createdAt;

    /**
     * 更新时间
     *
     * @Column(name="updated_at", prop="updatedAt")
     * @var string
     */
    private $updatedAt;

    /**
     * 删除时间
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
     * @param string $group
     * @return self
     */
    public function setGroup(string $group): self
    {
        $this->group = $group;

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
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string|null $value
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param string|null $type
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string|null $options
     * @return self
     */
    public function setOptions(?string $options): self
    {
        $this->options = $options;

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
     * @param string|null $tips
     * @return self
     */
    public function setTips(?string $tips): self
    {
        $this->tips = $tips;

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
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getOptions(): ?string
    {
        return $this->options;
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
    public function getTips(): ?string
    {
        return $this->tips;
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
