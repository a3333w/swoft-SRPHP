<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 【系统】菜单语言包配置表
 * Class SystemMenuLang
 *
 * @since 2.0
 *
 * @Entity(table="system_menu_lang")
 */
class SystemMenuLang extends Model
{
    /**
     * 主键
     * @Id()
     * @Column()
     * @var int|null
     */
    private $id;

    /**
     * 菜单表id
     *
     * @Column(name="menu_id", prop="menuId")
     * @var int|null
     */
    private $menuId;

    /**
     * 标题
     *
     * @Column()
     * @var string|null
     */
    private $title;

    /**
     * 语言包
     *
     * @Column()
     * @var int|null
     */
    private $lang;


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
     * @param int|null $menuId
     * @return self
     */
    public function setMenuId(?int $menuId): self
    {
        $this->menuId = $menuId;

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
     * @param int|null $lang
     * @return self
     */
    public function setLang(?int $lang): self
    {
        $this->lang = $lang;

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
    public function getMenuId(): ?int
    {
        return $this->menuId;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return int|null
     */
    public function getLang(): ?int
    {
        return $this->lang;
    }

}
