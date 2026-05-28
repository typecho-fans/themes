# Tiphia for Typecho

Tiphia for Typecho 是从 TiphiaPress 默认主题移植而来的 Typecho 主题，保留了 Tiphia 默认主题的首页、文章卡片、文章页、分类/标签/时间线、友情链接、评论卡片、液态玻璃样式和可配置的主题颜色。

主题仓库：[cairbin/tiphia-for-typecho](https://github.com/cairbin/tiphia-for-typecho)  

- 原主题来源：[TiphiaPress/tiphia-default-themes](https://github.com/tiphiapress/tiphia-default-themes)  
- 主题作者演示站点：[CairBin](https://posts.cairbin.top)


本仓库与原主题仓库独立维护，样式细节会有较小差异。演示站点为TiphiaPress构建，并非typecho。

## 安装

1. 解压后，将主题文件夹改名`tiphia-for-typecho`放到 Typecho 的 `usr/themes/`。
2. 进入 Typecho 后台：`控制台 -> 外观`。
3. 启用 `Tiphia for Typecho`。
4. 进入主题设置，按需要填写配置。



## 功能

- 响应式首页、文章列表、文章页和独立页面。
- 支持强调色、字体栈、额外 CSS。
- 支持置顶文章。
- 支持热门文章和最新评论。
- 支持分类、标签、时间线内置页面。
- 支持友情链接页面。
- 支持 404 页面。
- 支持页脚 Font Awesome 图标。
- 支持 ICP 备案和公安备案链接。
- 支持 Gravatar 镜像。
- 支持 Cookie 提示。
- 支持液态玻璃样式。
- 评论区使用主题自绘卡片样式，超过三层后改为平铺。

## 内置页面

在 Typecho 后台创建独立页面，并设置对应 slug，即可启用主题内置页面。

| slug | 用途 |
| --- | --- |
| `categories` | 分类目录 |
| `tags` | 标签目录 |
| `timeline` | 时间线 |
| `links` | 友情链接 |

`links` 页面会先渲染页面正文，再渲染主题设置中的友情链接卡片。

## 主题配置

### 基础外观

| 配置项 | 说明 |
| --- | --- |
| `accent_color` | 强调色，按钮、链接、标签、激活导航等会使用该颜色。示例：`#2563eb` |
| `font_family` | 字体栈，会写入 CSS 变量 `--theme-font`。 |
| `liquid_glass` | 是否启用液态玻璃样式。 |
| `custom_css` | 额外 CSS，会直接输出到页面头部。 |
| `avatar` | 站点头像 URL，显示在首页和导航。 |

### 首页

| 配置项 | 说明 |
| --- | --- |
| `posts_per_page` | 首页/归档每页文章数量。 |
| `show_popular_posts` | 是否显示热门文章。 |
| `popular_posts_limit` | 热门文章数量。 |
| `show_recent_comments` | 是否显示最新评论。 |
| `recent_comments_limit` | 最新评论数量。 |
| `pinned_post_ids` | 置顶文章 ID，支持 JSON 数组或逗号分隔。 |
| `pinned_post_slugs` | 置顶文章 slug，支持 JSON 数组或逗号分隔。 |

置顶文章示例：

```json
[1, 2, 3]
```

```json
["hello-world", "about-tiphia"]
```

### 导航

顶部导航默认包含：首页、分类、标签、时间线。可以通过 `nav_pages` 追加自定义页面。

JSON 示例：

```json
[
  { "label": "关于", "slug": "start-page" },
  { "label": "友链", "slug": "links" }
]
```

也支持逐行格式：

```text
关于|start-page
友链|links
```

**请注意：特殊的几个页面，即时间线、分类、标签、友情链接页面需要在 Typecho 后台创建并设置 slug，主题会根据slug渲染各自独特的内容，对应slug如下所示。**

| 页面 | slug |
| --- | --- |
| 时间线 | timeline |
| 分类目录 | categories |
| 标签目录 | tags |
| 友情链接 | links |




### 友情链接

配置项：`friend_links`

格式为 JSON 对象数组：

```json
[
  {
    "name": "CairBin",
    "avatar": "https://posts.cairbin.top/avatar.png",
    "url": "https://posts.cairbin.top",
    "description": "个人博客",
    "category": "朋友"
  },
  {
    "name": "TiphiaPress",
    "avatar": "https://example.com/tiphia.png",
    "url": "https://github.com/tiphiapress/tiphia",
    "description": "TiphiaPress 项目",
    "category": "项目"
  }
]
```

字段说明：

| 字段 | 说明 |
| --- | --- |
| `name` | 站点名称。 |
| `avatar` | 头像 URL。 |
| `url` | 友情链接地址。 |
| `description` | 简短介绍。 |
| `category` | 分组名称。 |

添加友情链接后，会在slug为`links`的页面渲染友情链接卡片。同一分类的卡片会被聚合在同一个卡片组中，其标题名称为分类名称。

### 评论

| 配置项 | 说明 |
| --- | --- |
| `gravatar_base_url` | Gravatar 镜像地址。可填写 `https://cn.cravatar.com/avatar/` 。 |

主题定义了 Typecho 的 `threadedComments()` 评论输出函数，因此评论头像会走 `gravatar_base_url` 配置。

评论区规则：

- 每条评论显示为卡片。
- 子评论正常嵌套。
- 超过三层后改为平铺，避免无限缩进导致内容变窄。
- 回复表单会跟随 Typecho 的回复逻辑移动。

### 站点公告

| 配置项 | 说明 |
| --- | --- |
| `announcementEnabled` | 是否开启站点公告。 |
| `announcementTitle` | 公告标题。 |
| `announcementContent` | 公告内容。 |
| `announcementUrl` | 公告链接。 |
| `announcementLinkText` | 公告链接文字。 |

### Cookie 提示

| 配置项 | 说明 |
| --- | --- |
| `cookie_notice_enabled` | 是否开启 Cookie 提示。 |
| `cookie_notice_text` | Cookie 提示文本。 |
| `cookie_notice_link` | 了解更多链接。 |
| `cookie_notice_link_text` | 链接文字。 |
| `cookie_notice_button_text` | 确认按钮文字。 |

用户点击按钮后，主题会使用 `localStorage` 记住关闭状态。

### 页脚


| 配置项 | 说明 |
| --- | --- |
| `footer_icons` | 页脚 Font Awesome 图标。 |
| `tag_cloud_limit` | 页脚标签云数量。 |
| `icp` | ICP 备案号。 |
| `icp_url` | ICP 备案链接，默认可填 `https://beian.miit.gov.cn/`。 |
| `police_record` | 公安备案号。 |
| `police_record_url` | 公安备案链接。 |

`footer_icons` JSON 示例：

页脚图标使用 Font Awesome 图标库，版本为6.5.2。

```json
[
  ["fa-brands fa-github", "https://github.com/cairbin/tiphia-for-typecho"],
  ["fa-solid fa-rss", "/feed/"]
]
```

也支持逐行格式：

```text
fa-brands fa-github|https://github.com/cairbin/tiphia-for-typecho
fa-solid fa-rss|/feed/
```

如`fa-brands fa-github`为Font Awesome图标的类名，`https://github.com/cairbin/tiphia-for-typecho`为对应的链接地址。
更多请参考[Font Awesome 图标库](https://fontawesome.com/).

## 常见问题



### 友情链接页面没有显示卡片

请确认：

1. 已创建独立页面。
2. 页面 slug 是 `links`。
3. 主题设置中的 `friend_links` 是合法 JSON 数组。

### 分类、标签、时间线链接打不开

请创建对应 slug 的独立页面：

- `categories`
- `tags`
- `timeline`

### 评论样式没有更新

请强制刷新浏览器缓存。若使用缓存插件或 CDN，也需要清理缓存。

## 致谢

- [TiphiaPress](https://github.com/tiphiapress/tiphia)
- [Typecho](https://typecho.org/)
- [Font Awesome](https://fontawesome.com/)

如果你喜欢这个主题，欢迎给项目一个 Star。也欢迎使用TiphiaPress来构建你的博客。
