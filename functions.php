<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

function themeInit($archive)
{
    $pageSize = tiphia_theme_int('posts_per_page', 10, 1, 100);
    if ($pageSize > 0 && isset($archive->parameter)) {
        $archive->parameter->pageSize = $pageSize;
    }
}

function themeConfig($form)
{
    $fields = array(
        array('accent_color', 'Text', '#2563eb', '强调色', '按钮、链接、标签等会使用该颜色。'),
        array('font_family', 'Text', 'Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif', '字体栈', '会写入 --theme-font。'),
        array('posts_per_page', 'Text', '10', '首页每页文章数量', '建议 1-100。'),
        array('popular_posts_limit', 'Text', '5', '热门文章数量', ''),
        array('recent_comments_limit', 'Text', '5', '最新评论数量', ''),
        array('tag_cloud_limit', 'Text', '24', '页脚标签云最大数量', ''),
        array('pinned_post_ids', 'Textarea', '', '置顶文章 ID', 'JSON 数组或逗号分隔，例如 [1,2]。'),
        array('pinned_post_slugs', 'Textarea', '', '置顶文章 slug', 'JSON 数组或逗号分隔，例如 ["hello","about"]。'),
        array('nav_pages', 'Textarea', '', '顶部自定义页面导航', 'JSON 数组或每行 label|slug。slug 会链接到对应独立页面。'),
        array('footer_icons', 'Textarea', '', '页脚图标', 'JSON 数组，例如 [["fa-brands fa-github","https://github.com/cairbin/tiphia-for-typecho"]]；也支持每行 class|url。'),
        array('friend_links', 'Textarea', '', '友情链接', 'JSON 对象数组，例如 [{"name":"CairBin","avatar":"https://...","url":"https://posts.cairbin.top","description":"介绍","category":"朋友"}]。'),
        array('gravatar_base_url', 'Text', 'https://cn.gravatar.com/avatar/', 'Gravatar 镜像地址', '例如 https://cn.cravatar.com/avatar/，留空使用官方地址。'),
        array('cookie_notice_text', 'Textarea', '本站使用 Cookie 改善浏览体验。', 'Cookie 提示文本', ''),
        array('cookie_notice_link', 'Text', '', 'Cookie 了解更多链接', ''),
        array('cookie_notice_link_text', 'Text', '了解更多', 'Cookie 链接文字', ''),
        array('cookie_notice_button_text', 'Text', '知道了', 'Cookie 按钮文字', ''),
        array('custom_css', 'Textarea', '', '额外 CSS', '直接输出到页面 head 的 style 标签中。'),
        array('avatar', 'Text', '', '站点头像', '留空则不显示首页和导航头像。'),
        array('announcementTitle', 'Text', '', '公告标题', ''),
        array('announcementContent', 'Textarea', '', '公告内容', ''),
        array('announcementUrl', 'Text', '', '公告链接', ''),
        array('announcementLinkText', 'Text', '查看详情', '公告链接文字', ''),
        array('icp', 'Text', '', 'ICP备案号', ''),
        array('icp_url', 'Text', 'https://beian.miit.gov.cn/', 'ICP备案链接', ''),
        array('police_record', 'Text', '', '公安备案号', ''),
        array('police_record_url', 'Text', '', '公安备案链接', ''),
    );

    $showPopularPosts = new Typecho_Widget_Helper_Form_Element_Radio('show_popular_posts', array('0' => _t('关闭'), '1' => _t('开启')), '0', _t('显示热门文章'));
    $form->addInput($showPopularPosts);

    $showRecentComments = new Typecho_Widget_Helper_Form_Element_Radio('show_recent_comments', array('0' => _t('关闭'), '1' => _t('开启')), '0', _t('显示最新评论'));
    $form->addInput($showRecentComments);

    $liquidGlass = new Typecho_Widget_Helper_Form_Element_Radio('liquid_glass', array('0' => _t('关闭'), '1' => _t('开启')), '0', _t('启用液态玻璃样式'));
    $form->addInput($liquidGlass);

    $announcementEnabled = new Typecho_Widget_Helper_Form_Element_Radio('announcementEnabled', array('0' => _t('关闭'), '1' => _t('开启')), '0', _t('站点公告'));
    $form->addInput($announcementEnabled);

    $cookieNoticeEnabled = new Typecho_Widget_Helper_Form_Element_Radio('cookie_notice_enabled', array('0' => _t('关闭'), '1' => _t('开启')), '0', _t('Cookie 提示'));
    $form->addInput($cookieNoticeEnabled);

    foreach ($fields as $field) {
        list($name, $type, $default, $label, $description) = $field;
        $class = 'Typecho_Widget_Helper_Form_Element_' . $type;
        $input = new $class($name, null, $default, _t($label), _t($description));
        $form->addInput($input);
    }
}

function tiphia_theme_option($name, $default = '')
{
    $options = Helper::options();
    $value = isset($options->{$name}) ? $options->{$name} : null;
    return $value === null || $value === '' ? $default : $value;
}

function tiphia_theme_bool($name, $default = false)
{
    $value = tiphia_theme_option($name, $default ? '1' : '0');
    return $value === true || $value === 1 || $value === '1' || $value === 'true';
}

function tiphia_theme_int($name, $default, $min = 0, $max = 999)
{
    $value = (int) tiphia_theme_option($name, $default);
    return max($min, min($max, $value));
}

function tiphia_theme_list($name)
{
    $raw = trim((string) tiphia_theme_option($name, ''));
    if ($raw === '') {
        return array();
    }

    $decoded = json_decode($raw, true);
    if (is_array($decoded)) {
        return $decoded;
    }

    return array_values(array_filter(array_map('trim', preg_split('/[\r\n,]+/', $raw))));
}

function tiphia_theme_pairs($name)
{
    $raw = trim((string) tiphia_theme_option($name, ''));
    if ($raw === '') {
        return array();
    }

    $decoded = json_decode($raw, true);
    if (is_array($decoded)) {
        return $decoded;
    }

    $items = array();
    foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
        $line = trim($line);
        if ($line === '') {
            continue;
        }
        $items[] = array_map('trim', explode('|', $line, 2));
    }
    return $items;
}

function tiphia_theme_json_array($name)
{
    $raw = trim((string) tiphia_theme_option($name, ''));
    if ($raw === '') {
        return array();
    }

    $decoded = json_decode($raw, true);
    return is_array($decoded) ? $decoded : array();
}

function tiphia_theme_attr($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function tiphia_theme_gravatar_url($mail)
{
    $base = trim((string) tiphia_theme_option('gravatar_base_url', 'https://www.gravatar.com/avatar/'));
    if ($base === '') {
        $base = 'https://www.gravatar.com/avatar/';
    }
    $base = rtrim($base, '/') . '/';
    if (!preg_match('~/avatar/$~i', $base)) {
        $base .= 'avatar/';
    }
    return $base . md5(strtolower(trim((string) $mail))) . '?s=72&d=mp';
}

function tiphia_theme_friend_links()
{
    $items = tiphia_theme_json_array('friend_links');
    $groups = array();
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $url = trim((string) ($item['url'] ?? ''));
        if ($url === '') {
            continue;
        }
        $name = trim((string) ($item['name'] ?? $item['title'] ?? parse_url($url, PHP_URL_HOST)));
        $category = trim((string) ($item['category'] ?? '友情链接'));
        $groups[$category ?: '友情链接'][] = array(
            'name' => $name ?: $url,
            'avatar' => trim((string) ($item['avatar'] ?? '')),
            'url' => $url,
            'description' => trim((string) ($item['description'] ?? $item['intro'] ?? '')),
        );
    }
    return $groups;
}

function tiphia_theme_avatar_url()
{
    return trim((string) tiphia_theme_option('avatar', ''));
}

function tiphia_theme_body_class()
{
    $classes = array('site', 'default-theme');
    if (tiphia_theme_bool('liquid_glass')) {
        $classes[] = 'theme-liquid-glass';
    }
    return implode(' ', $classes);
}

function tiphia_theme_head_config()
{
    $accent = trim((string) tiphia_theme_option('accent_color', '#2563eb'));
    if (!preg_match('/^#([0-9a-fA-F]{3}|[0-9a-fA-F]{6}|[0-9a-fA-F]{8})$/', $accent)) {
        $accent = '#2563eb';
    }

    $font = trim((string) tiphia_theme_option('font_family', ''));
    $css = ':root[data-theme="default"]{--accent:' . $accent . ';';
    if ($font !== '') {
        $css .= '--theme-font:' . str_replace(array('<', '>', '{', '}'), '', $font) . ';';
    }
    $css .= '}';

    $custom = trim((string) tiphia_theme_option('custom_css', ''));
    if ($custom !== '') {
        $css .= "\n" . $custom;
    }

    echo '<style id="tiphia-theme-config">' . $css . '</style>' . "\n";
}

function tiphia_theme_page_url($slug)
{
    $options = Helper::options();
    try {
        $db = Typecho_Db::get();
        $row = $db->fetchRow($db->select('cid', 'slug', 'created', 'type')->from('table.contents')->where('type = ?', 'page')->where('slug = ?', $slug)->where('status = ?', 'publish')->limit(1));
        if ($row) {
            return Typecho_Router::url('page', $row, $options->index);
        }
    } catch (Exception $e) {
    }

    return rtrim($options->siteUrl, '/') . '/' . rawurlencode($slug);
}

function tiphia_theme_post_url($row)
{
    $options = Helper::options();
    try {
        return Typecho_Router::url(isset($row['type']) && $row['type'] === 'page' ? 'page' : 'post', $row, $options->index);
    } catch (Exception $e) {
        return rtrim($options->siteUrl, '/') . '/archives/' . (int) $row['cid'] . '/';
    }
}

function tiphia_theme_nav_pages()
{
    $items = array();
    foreach (tiphia_theme_pairs('nav_pages') as $item) {
        if (!is_array($item)) {
            continue;
        }
        if (isset($item['label'], $item['slug'])) {
            $label = $item['label'];
            $slug = $item['slug'];
        } else {
            $label = $item[0] ?? '';
            $slug = $item[1] ?? $label;
        }
        $label = trim((string) $label);
        $slug = trim((string) $slug);
        if ($label !== '' && $slug !== '') {
            $items[] = array('label' => $label, 'slug' => $slug, 'url' => tiphia_theme_page_url($slug));
        }
    }
    return $items;
}

function tiphia_theme_excerpt($widget, $length = 180)
{
    $text = trim(strip_tags($widget->content));
    if ($text === '') {
        return '';
    }
    return function_exists('mb_substr') ? mb_substr($text, 0, $length, 'UTF-8') : substr($text, 0, $length);
}

function tiphia_theme_pinned_ids()
{
    return array_map('intval', tiphia_theme_list('pinned_post_ids'));
}

function tiphia_theme_pinned_slugs()
{
    return array_map('strval', tiphia_theme_list('pinned_post_slugs'));
}

function tiphia_theme_is_pinned($widget)
{
    return in_array((int) $widget->cid, tiphia_theme_pinned_ids(), true) || in_array((string) $widget->slug, tiphia_theme_pinned_slugs(), true);
}

function tiphia_theme_pinned_posts()
{
    $ids = tiphia_theme_pinned_ids();
    $slugs = tiphia_theme_pinned_slugs();
    if (!$ids && !$slugs) {
        return array();
    }

    try {
        $db = Typecho_Db::get();
        $columns = tiphia_theme_contents_columns();
        $fields = array('cid', 'title', 'slug', 'created', 'text', 'commentsNum', 'type');
        if (in_array('viewsNum', $columns, true)) {
            $fields[] = 'viewsNum';
        }
        $where = array();
        if ($ids) {
            $where[] = 'cid IN (' . implode(',', array_map('intval', $ids)) . ')';
        }
        if ($slugs) {
            $quoted = array();
            foreach ($slugs as $slug) {
                $quoted[] = $db->quoteValue($slug);
            }
            $where[] = 'slug IN (' . implode(',', $quoted) . ')';
        }
        $select = call_user_func_array(array($db, 'select'), $fields)->from('table.contents')->where('type = ?', 'post')->where('status = ?', 'publish');
        $rows = $db->fetchAll($select->where(implode(' OR ', $where)));
        return $rows;
    } catch (Exception $e) {
        return array();
    }
}

function tiphia_theme_contents_columns()
{
    static $columns = null;
    if ($columns !== null) {
        return $columns;
    }

    try {
        $db = Typecho_Db::get();
        $columns = array_keys($db->fetchRow($db->select()->from('table.contents')->limit(1)) ?: array());
    } catch (Exception $e) {
        $columns = array();
    }
    return $columns;
}

function tiphia_theme_post_stats($widget)
{
    $comments = isset($widget->commentsNum) ? (int) $widget->commentsNum : 0;
    echo '<div class="post-stats">';
    if (isset($widget->viewsNum)) {
        echo '<span>' . (int) $widget->viewsNum . ' 次浏览</span>';
    }
    echo '<span>' . $comments . ' 条评论</span>';
    echo '</div>';
}

function tiphia_theme_row_stats($row)
{
    echo '<div class="post-stats">';
    if (isset($row['viewsNum'])) {
        echo '<span>' . (int) $row['viewsNum'] . ' 次浏览</span>';
    }
    echo '<span>' . (int) ($row['commentsNum'] ?? 0) . ' 条评论</span>';
    echo '</div>';
}

function tiphia_theme_row_excerpt($row)
{
    $text = trim(strip_tags((string) ($row['text'] ?? '')));
    return function_exists('mb_substr') ? mb_substr($text, 0, 180, 'UTF-8') : substr($text, 0, 180);
}

function tiphia_theme_footer_icons()
{
    $items = tiphia_theme_pairs('footer_icons');
    if (!$items) {
        $items = array(array('fa-brands fa-github', 'https://github.com/cairbin/tiphia-for-typecho'), array('fa-solid fa-rss', Helper::options()->feedUrl));
    }

    echo '<div class="theme-footer-icons">';
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $icon = trim((string) ($item['icon'] ?? $item[0] ?? ''));
        $url = trim((string) ($item['url'] ?? $item[1] ?? ''));
        if ($icon === '' || $url === '') {
            continue;
        }
        echo '<a href="' . tiphia_theme_attr($url) . '" rel="nofollow noopener noreferrer" target="_blank"><i class="' . tiphia_theme_attr($icon) . '" aria-hidden="true"></i></a>';
    }
    echo '</div>';
}

function tiphia_theme_announcement()
{
    if (!tiphia_theme_bool('announcementEnabled')) {
        return;
    }

    $title = trim((string) tiphia_theme_option('announcementTitle', ''));
    $content = trim((string) tiphia_theme_option('announcementContent', ''));
    $url = trim((string) tiphia_theme_option('announcementUrl', ''));
    $linkText = trim((string) tiphia_theme_option('announcementLinkText', '查看详情'));
    if ($title === '' && $content === '') {
        return;
    }

    echo '<aside class="theme-announcement" aria-label="站点公告"><span class="theme-announcement-label">公告</span><div class="theme-announcement-content">';
    if ($title !== '') {
        echo '<h2>' . tiphia_theme_attr($title) . '</h2>';
    }
    if ($content !== '') {
        echo '<p>' . nl2br(tiphia_theme_attr($content)) . '</p>';
    }
    echo '</div>';
    if ($url !== '') {
        echo '<a class="theme-announcement-link" href="' . tiphia_theme_attr($url) . '">' . tiphia_theme_attr($linkText ?: '查看详情') . '</a>';
    }
    echo '</aside>';
}

function tiphia_theme_cookie_notice()
{
    if (!tiphia_theme_bool('cookie_notice_enabled')) {
        return;
    }

    $text = trim((string) tiphia_theme_option('cookie_notice_text', '本站使用 Cookie 改善浏览体验。'));
    if ($text === '') {
        return;
    }
    $link = trim((string) tiphia_theme_option('cookie_notice_link', ''));
    $linkText = trim((string) tiphia_theme_option('cookie_notice_link_text', '了解更多'));
    $buttonText = trim((string) tiphia_theme_option('cookie_notice_button_text', '知道了'));
    ?>
    <div class="cookie-notice" id="tiphia-cookie-notice" hidden>
        <p><?php echo tiphia_theme_attr($text); ?></p>
        <div class="cookie-notice-actions">
            <?php if ($link !== ''): ?>
                <a href="<?php echo tiphia_theme_attr($link); ?>"><?php echo tiphia_theme_attr($linkText ?: '了解更多'); ?></a>
            <?php endif; ?>
            <button type="button" id="tiphia-cookie-accept"><?php echo tiphia_theme_attr($buttonText ?: '知道了'); ?></button>
        </div>
    </div>
    <script>
    (function () {
      var key = "tiphia-cookie-notice-accepted";
      var notice = document.getElementById("tiphia-cookie-notice");
      if (!notice || localStorage.getItem(key) === "1") return;
      notice.hidden = false;
      var button = document.getElementById("tiphia-cookie-accept");
      if (button) {
        button.addEventListener("click", function () {
          localStorage.setItem(key, "1");
          notice.hidden = true;
        });
      }
    })();
    </script>
    <?php
}

function tiphia_theme_popular_posts()
{
    if (!tiphia_theme_bool('show_popular_posts')) {
        return;
    }

    $limit = tiphia_theme_int('popular_posts_limit', 5, 1, 20);
    try {
        $db = Typecho_Db::get();
        $columns = tiphia_theme_contents_columns();
        $fields = array('cid', 'title', 'slug', 'created', 'commentsNum', 'type');
        if (in_array('viewsNum', $columns, true)) {
            $fields[] = 'viewsNum';
        }
        $select = call_user_func_array(array($db, 'select'), $fields)->from('table.contents')->where('type = ?', 'post')->where('status = ?', 'publish');
        $select = in_array('viewsNum', $columns, true) ? $select->order('viewsNum', Typecho_Db::SORT_DESC) : $select->order('commentsNum', Typecho_Db::SORT_DESC);
        $rows = $db->fetchAll($select->limit($limit));
    } catch (Exception $e) {
        $rows = array();
    }

    echo '<section class="widget"><h2>热门文章</h2>';
    if (!$rows) {
        echo '<p>暂无热门文章</p>';
    }
    foreach ($rows as $row) {
        echo '<a href="' . tiphia_theme_attr(tiphia_theme_post_url($row)) . '"><span>' . tiphia_theme_attr($row['title']) . '</span><small>' . (int) ($row['viewsNum'] ?? 0) . ' 次浏览</small></a>';
    }
    echo '</section>';
}

function tiphia_theme_recent_comments()
{
    if (!tiphia_theme_bool('show_recent_comments')) {
        return;
    }

    $limit = tiphia_theme_int('recent_comments_limit', 5, 1, 20);
    try {
        $db = Typecho_Db::get();
        $rows = $db->fetchAll($db->select('table.comments.coid', 'table.comments.author', 'table.comments.text', 'table.contents.cid', 'table.contents.title', 'table.contents.slug', 'table.contents.created', 'table.contents.type')->from('table.comments')->join('table.contents', 'table.contents.cid = table.comments.cid')->where('table.comments.status = ?', 'approved')->where('table.contents.status = ?', 'publish')->order('table.comments.created', Typecho_Db::SORT_DESC)->limit($limit));
    } catch (Exception $e) {
        $rows = array();
    }

    echo '<section class="widget"><h2>最新评论</h2>';
    if (!$rows) {
        echo '<p>暂无评论</p>';
    }
    foreach ($rows as $row) {
        $text = function_exists('mb_substr') ? mb_substr(strip_tags($row['text']), 0, 48, 'UTF-8') : substr(strip_tags($row['text']), 0, 48);
        echo '<a href="' . tiphia_theme_attr(tiphia_theme_post_url($row)) . '#comment-' . (int) $row['coid'] . '"><span>' . tiphia_theme_attr($row['author']) . '</span><small>' . tiphia_theme_attr($row['title'] . ' · ' . $text) . '</small></a>';
    }
    echo '</section>';
}

function threadedComments($comment, $options)
{
    $authorUrl = trim((string) $comment->url);
    $avatar = tiphia_theme_gravatar_url($comment->mail);
    $depth = (int) $comment->levels + 1;
    $hasChildren = !empty($comment->children);
    $flattenChildren = $hasChildren && $depth >= 3;
    ?>
    <li class="comment-node comment-depth-<?php echo $depth; ?>" id="<?php $comment->theId(); ?>">
    <div class="comment">
        <div class="comment-author-row">
            <img class="comment-avatar" src="<?php echo tiphia_theme_attr($avatar); ?>" alt="" loading="lazy">
            <?php if ($authorUrl !== ''): ?>
                <a class="comment-author" href="<?php echo tiphia_theme_attr($authorUrl); ?>" rel="nofollow noopener noreferrer"><?php $comment->author(); ?></a>
            <?php else: ?>
                <strong class="comment-author-name"><?php $comment->author(); ?></strong>
            <?php endif; ?>
            <time class="comment-meta" datetime="<?php $comment->date('c'); ?>"><?php $comment->date('Y-m-d H:i'); ?></time>
        </div>
        <p class="comment-content"><?php $comment->content(); ?></p>
        <?php $comment->reply('<span class="text-button">回复</span>'); ?>
        <?php if ($hasChildren && !$flattenChildren): ?>
            <div class="comment-children"><?php $comment->threadedComments($options); ?></div>
        <?php endif; ?>
    </div>
    <?php if ($flattenChildren): ?>
        <div class="comment-children comment-children-flat"><?php $comment->threadedComments($options); ?></div>
    <?php endif; ?>
    </li>
    <?php
}
