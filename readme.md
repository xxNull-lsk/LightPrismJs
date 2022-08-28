# 介绍

基于prismjs的代码语法高亮typecho插件，支持众多常见的代码语言高亮显示，各种代码高亮风格自由切换，支持显示代码语言类型、行号，支持复制代码到剪切板。

# 起因

尝试了各种代码高亮插件（ColorHighlight、Code Prettify等等）。结果发现都有各种兼容问题，效果不太理想。所以，研究了一下prismjs。没有对prismjs做任何调整，仅仅是把prismjs嵌入到了typecho里面。

# 激活

1. 下载本插件，解压放到 `<安装目录>/usr/plugins/`目录中；

2. 文件夹名改为 `LightPrismJs`；

3. 登录管理后台，激活插件 （请勿与其它同类插件同时启用，以免互相影响）

# 升级

因为没有对prismjs做任何调整。所以，可以从[Prism官网](https://prismjs.com/download.html)下载后直接覆盖更新。



# 常见问题

1. `maupassant`主题的兼容问题。

        `maupassant`主题的CSS调整了`code`标签的样式，跟显示行号有冲突，导致行号错位。只需要注释掉下面这几行即可。

```css
.post-content pre code ,.comment-content pre code {
    padding: 1.5em 2em;
}
.post-content p code, .comment-content p code {
    display:inline;
    margin:0 5px;
    padding:3px 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
}
```


