<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
class RecentSplitPage extends \Widget\Contents\Post\Recent {
    private $total = 0; // 所有文章个数

    public function getTotal() {
        return $this->total;
    }

    public function execute(){
        $this->parameter->setDefault([
            'pageSize' => $this->options->postsListSize,
            'currentPage' => 1,
        ]);
        $select = $this->select()
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created < ?', $this->options->time)
            ->where('table.contents.type = ?', 'post');
        // 记录总数
        $cloneSql = clone $select;
        $this->total = $this->size($cloneSql);
        $this->db->fetchAll($select
            ->order('table.contents.created', Typecho\Db::SORT_DESC)
            ->page($this->parameter->currentPage, $this->parameter->pageSize), [$this, 'push']);
    }
}
