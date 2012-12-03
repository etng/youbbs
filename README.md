youbbs
======

youbbs是一个轻型的php+mysql论坛。

可搭建在多个平台：普通vps环境、SAE php、BAE php、Appfog php。

=了解youbbs=

youbbs的意思：又一个bbs（轮子）、you bbs……

youbbs开发的动机：传统论坛功能越来越多，越来越臃肿，而对于一些小站长只需要一些简单的功能；

youbbs特点：界面简洁优美、功能简洁实用、性能高效、代码简洁安全；

youbbs运行平台：标准php+mysql平台，目前已成功移植到SAE、新浪云空间、BAE、AppFog；

=益于开源，归于开源=

官方demo http://youbbs.sinaapp.com

google 项目托管 http://code.google.com/p/youbbs/ 放一些稳定的版本

这里也有托管 https://github.com/ego008/youbbs 小的更新会在这里看到

Author： ego008

=安装方法=

目前开源的版本是运行在标准php+mysql平台，因为不想在网页里出现.php?a=1&id=1字样，需要环境支持rewrite。

下载后在 config.php 配置好mysql数据库信息，打开/install即可完成安装，默认第一个注册用户是管理员。

另外有youbbs性能加强版供使用，数据主从读写分离，memcache缓存提高性能，但要给开发者及平台支付一点合理的费用 http://t.cn/zjbv7FM （建议使用又拍云作第三方存储）。

=感谢=

v2ex优美的ui蓝本，php帮助手册，网络关于php+mysql的性能、安全的博客，各类开源项目，limodou的UliPad……

还有我的妻子和儿子，在我编码的时候他们没有过多打扰，还有26个英文字母和那10个阿拉伯兄弟，没有他们这个项目是完成不了的。

==支持论坛==

http://youbbs.sinaapp.com/