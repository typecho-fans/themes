<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
class ArticleCatalog {
    /**
     * 索引ID
     */
    public $id = 1;

    /**
     * 目录树
     */
    public $tree = array();

    /**
     * @var string 描点
     */
    public $anchor = '<span id="article_menu_index_{menu_id}" class="title-anchor"></span>';

    /**
     * @var string 目录
     */
    public $catalog_item = '<a data-scroll href="#article_menu_index_{menu_id}" title="{title}">{title}</a>';

    /**
     * 解析
     *
     * @access public
     * @param array $matches 解析值
     * @return string
     */
    public function parseCallback( $match ) {
        $parent = &$this->tree;

        $h = $match[0];
        $n = $match[1];
        $menu = array(
            'num' => $n,
            'title' => trim( strip_tags( $h ) ),
            'id' => $this->id,
            'sub' => array()
        );
        $current = array();
        if( $parent ) {
            $current = &$parent[ count( $parent ) - 1 ];
        }
        // 根
        if( ! $parent || ( isset( $current['num'] ) && $n <= $current['num'] ) ) {
            $parent[] = $menu;
        } else {
            while( is_array( $current[ 'sub' ] ) ) {
                // 父子关系
                if( $current['num'] == $n - 1 ) {
                    $current[ 'sub' ][] = $menu;
                    break;
                }
                // 后代关系，并存在子菜单
                elseif( $current['num'] < $n && $current[ 'sub' ] ) {
                    $current = &$current['sub'][ count( $current['sub'] ) - 1 ];
                }
                // 后代关系，不存在子菜单
                else {
                    for( $i = 0; $i < $n - $current['num']; $i++ ) {
                        $current['sub'][] = array(
                            'num' => $current['num'] + 1,
                            'sub' => array()
                        );
                        $current = &$current['sub'][0];
                    }
                    $current['sub'][] = $menu;
                    break;
                }
            }
        }
        $this->id++;
        return str_replace('{menu_id}', $menu['id'], $this->anchor) . $h;
    }

    public function renderHtml($html, $anchor='') {
        if ($anchor) {
            $this->anchor = $anchor;
        }
        $html = preg_replace_callback( '/<h([1-6])[^>]*>.*?<\/h\1>/s', array( $this, 'parseCallback' ), $html );
        return $html;
    }

    public function renderCatalogHtml($li = '') {
        if ($li) {
            $this->catalog_item = $li;
        }
        return $this->buildCatalogHtml($this->tree);
    }

    /**
     * 构建目录树，生成索引
     *
     * @access public
     * @return string
     */
    public function buildCatalogHtml( $tree, $include = true ) {
        $menuHtml = '';
        foreach( $tree as $menu ) {
            if( ! isset( $menu['id'] ) && $menu['sub'] ) {
                $menuHtml .= $this->buildCatalogHtml( $menu['sub'], false );
            } else {
                $title = htmlspecialchars($menu['title'], ENT_QUOTES);
                $li = "<li>";
                $li .= str_replace(array('{menu_id}', '{title}'), array($menu['id'], $title), $this->catalog_item);
                if ($menu['sub']) {
                    $li .= $this->buildCatalogHtml( $menu['sub'] );
                }
                $li .= "</li>";
                $menuHtml .= $li;
            }
        }
        if( $include ) {
            $menuHtml = '<ul>' . $menuHtml . '</ul>';
        }
        return $menuHtml;
    }

    // 单例
    public static function instance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new static();
        }
        return $instance;
    }
}
