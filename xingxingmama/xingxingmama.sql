/*
SQLyog Trial v12.2.4 (64 bit)
MySQL - 10.1.9-MariaDB : Database - xingxingmama
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xingxingmama` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `xingxingmama`;

/*Table structure for table `answer` */

DROP TABLE IF EXISTS `answer`;

CREATE TABLE `answer` (
  `answer_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '回答id',
  `question_id` int(11) unsigned NOT NULL COMMENT '问题id',
  `answer_content` text COMMENT '回答内容',
  `add_time` int(10) DEFAULT '0' COMMENT '添加时间',
  `against_count` int(11) NOT NULL DEFAULT '0' COMMENT '反对人数',
  `agree_count` int(11) NOT NULL DEFAULT '0' COMMENT '支持人数',
  `answer_uid` int(11) DEFAULT '0' COMMENT '回答问题用户ID',
  `comment_count` int(11) DEFAULT '0' COMMENT '评论总数',
  `uninterested_count` int(11) DEFAULT '0' COMMENT '用户不感兴趣，则他再也看不到',
  `force_fold` tinyint(1) DEFAULT '0' COMMENT '强制折叠',
  `anonymous` tinyint(1) DEFAULT '0' COMMENT '匿名',
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`),
  KEY `agree_count` (`agree_count`),
  KEY `against_count` (`against_count`),
  KEY `add_time` (`add_time`),
  KEY `uid` (`answer_uid`),
  KEY `uninterested_count` (`uninterested_count`),
  KEY `force_fold` (`force_fold`),
  KEY `anonymous` (`anonymous`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='回答';

/*Data for the table `answer` */

/*Table structure for table `question` */

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(256) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `tag` tinyint(4) DEFAULT NULL COMMENT '话题/标签',
  `asker_uid` int(10) unsigned DEFAULT NULL COMMENT '提问者ID',
  `anonymous` tinyint(4) DEFAULT NULL COMMENT '是否匿名',
  `answer_quantity` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '答案数量',
  `system_suggest` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否系统推荐',
  `cagegory_id` smallint(6) DEFAULT '1' COMMENT '分类ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `question` */

insert  into `question`(`id`,`title`,`content`,`tag`,`asker_uid`,`anonymous`,`answer_quantity`,`system_suggest`,`cagegory_id`) values 
(5,'标题','描述',0,10193,0,0,0,1),
(6,'标题','描述',0,10193,0,0,0,1),
(7,'标题','描述',0,10193,0,0,0,1),
(8,'学习写代码是种什么体验','韩国周一（3月20日）表示已经向世界贸易组织（WTO）投诉中国因不满韩国布署美韩联合的防御系统“萨德”，对韩国企业实施的报复手段。\r\n韩国贸易部长周亨焕周一在韩国国会回应质询时说：“我们已经通知WTO中国可能已经违反一些贸易协议。”周亨焕表示，在上星期中国进一步在旅游及销售方面限制韩国后，韩国向WTO投诉。\r\n韩国同意美军在当地部署萨德（THAAD）防御朝鲜导弹后，引发中国强烈反弹，认为萨德的雷达系统可穿透中国全境。中国政府亦表示，部署萨德反导弹系统并不会缓解朝鲜半岛的紧张情势。\r\n根据路透社报道，中国政府因为政治对峙，已经关闭中国境内20多家韩国乐天（LOTTE）企业旗下的乐天超市。在中国社交网站微博上，一些网民分享抵制乐天的贴文。\r\n中国政府否认这些限制和萨德反导弹系统有关。但韩国政府已经对受到影响的企业提供低率贷款或延长还款时限，也鼓励企业开拓其他市场。\r\n韩国贸易部长周亨焕图片版权AP\r\nImage caption\r\n韩国贸易部长周亨焕（资料照片）\r\n旅游及文化限制\r\n根据韩国通讯社韩聨社报道，自三月初，中国国家旅游局以口头方式下令禁止在线上线下销售所有韩国游产品，来韩旅游的中国游客有可能减少六至七成。韩国当地购物热点，中国游客明显减少。\r\n除了旅游与商业，文化交流也受到影响。韩聨社3月16日报道，由于中国境内反韩情绪升温，韩国各地中小学出于学生安全考虑纷纷取消赴华旅游、实习计划。\r\n根据韩聨社周日（19日）报道，韩国娱乐产业正积极开拓东南亚市场，以降低中国市场限缩的冲击。韩国政府并出资鼓励娱乐产业开拓中国以外的市场。日前韩国男星河正宇宣布与中国女星章子怡合演中国电影《假面》，但3月15日河正宇的经纪公司证实因无法取得中国签证，计画告吹。经纪公司认为中方不发给河正宇签证，可能与中国反萨措施有关。',1,10193,1,0,0,1),
(9,'阿萨德','',1,10193,0,0,0,1),
(10,'阿萨德','',0,10193,0,0,0,1),
(11,'阿萨德','',0,10193,0,0,0,1),
(12,'阿萨德','',0,10193,0,0,0,1),
(13,'阿萨德','',0,10193,0,0,0,1),
(14,'阿萨德','',0,10193,0,0,0,1),
(15,'阿萨德','',1,10193,0,0,0,1),
(16,'新问题','',1,10193,0,0,0,1),
(17,'新问题2','我是 CodeIgniter\r\n\r\n搜索手册\r\n欢迎使用 CodeIgniter\r\n安装说明\r\nCodeIgniter 概览\r\n教程 - 内容提要\r\n加载静态内容\r\n读取新闻条目\r\n创建新闻条目\r\n结束语\r\n向 CodeIgniter 贡献你的力量\r\n常规主题\r\n类库参考\r\n数据库参考\r\n辅助函数参考\r\n \r\nCodeIgniter 中国 »  文档首页 »  教程 - 内容提要 »  加载静态内容\r\ntoc\r\n加载静态内容\r\nNote: 这篇教程假设你已经下载好 CodeIgniter ，并将其 安装 到你的开发环境。\r\n\r\n你要做的第一件事情是新建一个 控制器 来处理静态页面，控制器就是一个简单的类， 用来完成你的工作，它是你整个 Web 应用程序的 “粘合剂” 。\r\n\r\n例如，当访问下面这个 URL 时:\r\n\r\nhttp://example.com/news/latest/10\r\n通过这个 URL 我们就可以推测出来，有一个叫做 \"news\" 的控制器，被调用的方法为 \"latest\" ， 这个方法的作用应该是查询 10 条新闻条目并显示在页面上。在 MVC 模式里，你会经常看到下面 格式的 URL ：\r\n\r\nhttp://example.com/[controller-class]/[controller-method]/[arguments]\r\n在正式环境下 URL 的格式可能会更复杂，但是现在，我们只需要关心这些就够了。\r\n\r\n新建一个文件 application/controllers/Pages.php ，然后添加如下代码。\r\n\r\n<?php\r\nclass Pages extends CI_Controller {\r\n\r\n    public function view($page = \'home\')\r\n    {\r\n    }\r\n}\r\n你刚刚创建了一个 Pages 类，有一个方法 view 并可接受一个 $page 参数。 Pages 类继承自 CI_Controller 类，这意味着它可以访问 CI_Controller 类（ system/core/Controller.php ）中定义的方法和变量。\r\n\r\n控制器将会成为你的 Web 应用程序中的处理请求的核心，在关于 CodeIgniter 的技术讨论中，这有时候被称作 超级对象 。和其他的 PHP 类一样，可以在 你的控制器中使用 $this 来访问它，通过 $this 你就可以加载类库、 视图、以及针对框架的一般性操作。\r\n\r\n现在，你已经创建了你的第一个方法，是时候创建一些基本的页面模板了，我们将 新建两个视图（页面模板）分别作为我们的页脚和页头。\r\n\r\n新建页头文件 application/views/templates/header.php 并添加以下代码：\r\n\r\n<html>\r\n    <head>\r\n        <title>CodeIgniter Tutorial</title>\r\n    </head>\r\n    <body>\r\n\r\n        <h1><?php echo $title; ?></h1>\r\n页头包含了一些基本的 HTML 代码，用于显示页面的主视图之前的内容。 另外，它还打印出了 $title 变量，这个我们后面讲控制器的时候再讲。 现在，再新建个页脚文件 application/views/templates/footer.php ，然后添加以下代码：\r\n\r\n        <em>&copy; 2015</em>\r\n    </body>\r\n</html>\r\n在控制器中添加逻辑\r\n你刚刚新建了一个控制器，里面有一个 view() 方法，这个方法接受一个参数 用于指定要加载的页面，静态页面模板位于 application/views/pages/ 目录。\r\n\r\n在该目录中，再新建两个文件 home.php 和 about.php ，在每个文件里随便 写点东西然后保存它们。如果你没什么好写的，就写 \"Hello World!\" 吧。\r\n\r\n为了加载这些页面，你需要先检查下请求的页面是否存在：\r\n\r\npublic function view($page = \'home\')\r\n{\r\n  if ( ! file_exists(APPPATH.\'views/pages/\'.$page.\'.php\'))\r\n    {\r\n        // Whoops, we don\'t have a page for that!\r\n        show_404();\r\n    }\r\n\r\n    $data[\'title\'] = ucfirst($page); // Capitalize the first letter\r\n\r\n    $this->load->view(\'templates/header\', $data);\r\n    $this->load->view(\'pages/\'.$page, $data);\r\n    $this->load->view(\'templates/footer\', $data);\r\n}\r\n当请求的页面存在，将包括页面和页脚一起被加载并显示给用户，如果不存在， 会显示一个 \"404 Page not found\" 错误。\r\n\r\n第一行检查页面是否存在，file_exists() 是个原生的 PHP 函数，用于检查某个 文件是否存在，show_404() 是个 CodeIgniter 内置的函数，用来显示一个默认的 错误页面。\r\n\r\n在页头文件中，$title 变量用来自定义页面的标题，它是在这个方法中赋值的， 但是注意的是并不是直接赋值给 title 变量，而是赋值给一个 $data 数组的 title 元素。\r\n\r\n最后要做的是按顺序加载所需的视图，view() 方法的第二个参数用于向视图传递参数， $data 数组中的每一项将被赋值给一个变量，这个变量的名字就是数组的键值。 所以控制器中 $data[\'title\'] 的值，就等于视图中的 $title 的值。\r\n\r\n路由\r\n控制器现在开始工作了！在你的浏览器中输入 [your-site-url]index.php/pages/view 来查看你的页面。当你访问 index.php/pages/view/about 时你将看到 about 页面， 包括页头和页脚。\r\n\r\n使用自定义的路由规则，你可以将任意的 URI 映射到任意的控制器和方法上，从而打破 默认的规则：\r\n\r\nhttp://example.com/[controller-class]/[controller-method]/[arguments]\r\n\r\n让我们来试试。打开文件 application/config/routes.php 然后添加如下两行代码， 并删除掉其他对 $route 数组赋值的代码。\r\n\r\n$route[\'default_controller\'] = \'pages/view\';\r\n$route[\'(:any)\'] = \'pages/view/$1\';\r\nCodeIgniter 从上到下读取路由规则并将请求映射到第一个匹配的规则，每一个规则都是 一个正则表达式（左侧）映射到 一个控制器和方法（右侧）。当有请求到来时，CodeIgniter 首先查找能匹配的第一条规则，然后调用相应的控制器和方法，可能还带有参数。\r\n\r\n你可以在关于 URI 路由的文档 中找到更多信息。\r\n\r\n这里，第二条规则中 $routes 数组使用了通配符 (:any) 可以匹配所有的请求， 然后将参数传递给 Pages 类的 view() 方法。\r\n\r\n现在访问 index.php/about 。路由规则是不是正确的将你带到了控制器中的 view() 方法？实在是太棒了！\r\n\r\n下一个主题  上一个主题\r\n社交帐号登录:\r\n微信\r\n微博\r\nQQ\r\n人人\r\n更多»\r\n\r\n\r\n说点什么吧…\r\n发布\r\n最新最早最热\r\n49条评论 1条新浪微博\r\n索云鹏\r\n索云鹏\r\n路由：不配置的rewrite规则，浏览器输入“ [your-site-url]index.php/pages/view ”出现404页面。输入 “ [your-site-url]index.php?/pages/view ” 能够正常访问。\r\n2015年9月11日回复顶(3)转发\r\n后台君\r\n后台君\r\nAPPPATH加上去有问题。\r\n2015年9月13日回复顶转发\r\n神族阿邺\r\n神族阿邺\r\n回复 后台君: 那是你自己的\r\n问题\r\n2015年9月15日回复顶转发\r\n丨丶灬涐沉默\r\n丨丶灬涐沉默\r\n回复 索云鹏: 你好， 怎么才可以去掉？ 访问呢？ 还有我初始页面配置在文件夹下，就没办法访问的\r\n2015年11月16日回复顶转发\r\n看看\r\n看看\r\n每个文章都做广告，你烦不烦啊\r\n2015年11月23日回复顶转发\r\n小宋\r\n小宋\r\n这一切看上去都比较简单很容易上手，不错\r\n2015年12月3日回复顶转发\r\nbook\r\nbook\r\n不知道是我的问题还是教程比较老的问题，所有步骤都是按照以上教程执行，但最后访问的时候 ，用‘[your-site-url]index.php/pages/view ’什么都访问不到，用‘[your-site-url]index.php’就能访问到， $page = \'home\'访问到home.php，$page = \'about‘访问到about.php.......\r\n2015年12月8日回复顶转发\r\nmogp\r\nmogp\r\n回复 索云鹏: 我的也是出现这个404错误，回头试一下你的办法看看\r\n2015年12月26日回复顶转发\r\n罗纳右岸\r\n罗纳右岸\r\n在浏览教程，发现，为什么不直接用php编写网站，CI框架的意义何在呀。。。\r\n2016年3月23日回复顶(1)转发\r\n蛋蛋\r\n蛋蛋\r\n为什么我的出现 404 Page Not Found\r\n\r\nThe page you requested was not found.\r\n但是会出现一个下载项，把页面下载下来再打开就对了。？？？？？为什么呢？？？\r\n2016年4月26日回复顶(1)转发\r\nTop小杰\r\nTop小杰\r\n路由哪里就有点看不懂了\r\n2016年4月28日回复顶转发\r\n野心\r\n野心\r\n按照文档没有成功，做了如下修改后看到效果，附代码：\r\n\r\nclass Pages extends CI_Controller\r\n{\r\n\r\npublic function view($page = \'home\')\r\n{\r\nif (! file_exists(APPPATH . \'views/\' . $page . \'.php\')) {\r\necho APPPATH . \'views/\' . $page . \'.php\';\r\nshow_404();\r\n}else {\r\necho \'存在的页面\';\r\n}\r\n\r\n$data[\'title\'] = ucfirst($page);\r\n\r\n$this->load->view(\'templates/header\', $data);\r\n$this->load->view(\'/\' . $page, $data);\r\n$this->load->view(\'templates/footer\', $data);\r\n}\r\n}\r\n2016年5月3日回复顶转发\r\nQK\r\nQK\r\n回复 索云鹏: 谢谢\r\n2016年5月8日回复顶转发\r\n李\r\n李\r\n学习中。。。\r\n2016年5月12日回复顶转发\r\n艾丝凡\r\n艾丝凡\r\nif ( ! file_exists(APPPATH.\'/views/pages/\'.$page.\'.php\'))\r\n{\r\n// Whoops, we don\'t have a page for that!\r\nshow_404();\r\n}\r\n为什么 show_404(); 后面不用加 return; 表示不用执行后面的语句了？\r\n2016年5月20日回复顶转发\r\n神大爷\r\n神大爷\r\n回复 艾丝凡: 因为 show_404();直接跳转了`\r\n2016年5月27日回复顶转发\r\n遥远的航向梦海\r\n遥远的航向梦海\r\n回复 罗纳右岸: 一开始我也有和你一样的疑问，但直到我写了四五个php页后，我就明白为什么了 [嘻嘻]\r\n2016年6月15日回复顶转发\r\nMR_right\r\nMR_right\r\nif ( ! file_exists(APPPATH.\'/views/pages/\'.$page.\'.php\'))\r\n2016年7月5日回复顶转发\r\nMR_right\r\nMR_right\r\nif ( ! file_exists(APPPATH.\'/views/pages/\'.$page.\'.php\'))\r\n这里写的不对，因为view目录是可以配置的，应该用VIEWPATH来拼接视图文件地址的。\r\n2016年7月5日回复顶(1)转发\r\n赵哲\r\n赵哲\r\n回复 索云鹏: nginx服务器不支持pathinfo的访问模式，可以通过该方法配置：http://codeigniter.org.cn/user_guide/installation/troubleshooting.html\r\n2016年7月24日回复顶(1)转发\r\n山水之间\r\n山水之间\r\n有个疑问，为什么class的类名称非得大写开头？？而且类名称必须和php文件名称相同才有效果。这些注意事项，在这篇文章中都没有。\r\n2016年8月5日回复顶(1)转发\r\nMGL-Tsogdelger\r\nMGL-Tsogdelger\r\n为什么必须是 index.php/about 我就不能 xx.com/about 这样不行吗\r\n2016年8月12日回复顶(1)转发\r\n汪春阳\r\n汪春阳\r\nAPPPATH.\'/views/pages/\'.$page.\'.php\' 我的用不行。改成：APPPATH.\'views\\\\pages\\\\\'.$page.\'.php\' 就正常了\r\n2016年9月8日回复顶(1)转发\r\ntutuweb\r\ntutuweb\r\n感觉文档有不少的错误\r\n第一开始显示的是404\r\n改了很多才显示正常\r\n2016年9月13日回复顶转发\r\nPageOne\r\nPageOne\r\n新手表示这个 句法看不懂啊:\r\n$this->load->view()\r\n连续两个->是啥意思\r\n2016年9月20日回复顶转发\r\n王剑\r\n王剑\r\n回复 PageOne: 意思是加载view视图\r\n$this->load->view(\'templates/header\', $data);\r\n$this->load->view(\'pages/\'.$page, $data);\r\n$this->load->view(\'templates/footer\', $data);\r\n括号里头跟的是路径，连续加载是为了用模板，他们三个会根据dom合成一个页面\r\n2016年9月21日回复顶转发\r\nPageOne\r\nPageOne\r\n回复 王剑: 谢谢！ [给力]\r\n2016年10月1日回复顶转发\r\n小宇\r\n小宇\r\n回复 索云鹏: 文档的疑难解答上来说的就是这个问题，在application/config/config.php找到URI Protocol信息，把$config[\'index_page\'] = \"index.php\"; 修改为$config[\'index_page\'] = \"index.php?\"; 以后打网址就不用经常写问号了\r\n2016年10月13日回复顶转发\r\n小宇\r\n小宇\r\n回复 山水之间: 类的命名规范说到过首字母大写\r\n2016年10月13日回复顶转发\r\n意念自行车3525945874\r\n意念自行车3525945874\r\n环境：CentOS Linux release 7.2.1511 + PHP 5.5.38 + Apache/2.4.6 \r\n上面代码无错通过！\r\n2016年10月25日回复顶转发\r\n意念自行车3525945874\r\n意念自行车3525945874\r\n这篇和接下来的几篇——“教程提要”不是给没接触过框架或PHP不熟悉的人看的，如果看不懂，可以忽略，后面“常规主题”有更详细更基础讲解，不要被“难”住！\r\n2016年10月26日回复顶转发\r\n流萤的翅膀\r\n流萤的翅膀\r\n教程的问题在于class的路径问题，‘php’应该改为‘.php’\r\n2016年10月28日回复顶(1)转发\r\n_夕人\r\n_夕人\r\n(:any) 那个不懂啊, 也百度不到. 通配符? 正则? :any代表什么, 还有后面的$1\r\n2016年11月18日回复顶转发\r\nling\r\nling\r\n回复 _夕人: (:any) 任意字符 \r\n实例 ： $route[\'(:any)\'] = \'pages/view/$1\';\r\n例如你的网址是 www.baidu.com 那么你访问 www.baidu.com/2 他就会匹配这规则 $1就是网址后面的2 也就是你输入的任意字符(随便写什么他都能匹配 因为他是(:any) )\r\n实际访问的URL是www.baidu.com/pages/view/2 只不过是更加简写的方法 不要懵了\r\n2016年11月21日回复顶转发\r\n刘鑫\r\n刘鑫\r\n回复 赵哲: 添加问号可以解决，但是隐藏index.php怎么办？\r\n2016年11月24日回复顶转发\r\n冯吉堃\r\n冯吉堃\r\n回复 王剑: 我认为他问的应该是load->view指向哪里\r\n2016年12月17日回复顶转发\r\n冯吉堃\r\n冯吉堃\r\n回复 MGL-Tsogdelger: index是入口文件名，你可以把入口文件名改成你自己的文件名然后就可以xx.php访问了\r\n2016年12月17日回复顶转发\r\n我要陪你数太阳丶\r\n我要陪你数太阳丶\r\n输入什么都是404\r\n2016年12月18日回复顶转发\r\n张胜涛\r\n张胜涛\r\n教程兼容到那个版本啊！\r\n2016年12月28日回复顶转发\r\nHex\r\nHex\r\n回复 张胜涛: 原则上要以最新版本为准，老版本不做保证。\r\n2016年12月30日回复顶转发\r\nFuTing\r\nFuTing\r\n怎么没有介绍linux+apche+ci怎么配置\r\n1月3日回复顶转发\r\n小飞\r\n小飞\r\n为何我看不懂这篇讲啥内容 完全看不懂啊 有木有 [泪] 而且操作也不对劲 怎么回事呢\r\n1月4日回复顶转发\r\n小飞\r\n小飞\r\n回复 我要陪你数太阳丶: 哈哈 一样的情况\r\n1月4日回复顶转发\r\nHex\r\nHex\r\n回复 小飞: 如果是 404 应该和你的环境有关系，正常是不会出 404 的。\r\n1月4日回复顶转发\r\n_B保B_\r\n_B保B_\r\nHello 有哪位大神能说说怎么去掉index.php吗？\r\n2月5日回复顶转发\r\n陈永超\r\n陈永超\r\n回复 艾丝凡: 这是这个框架内部函数，应该有直接截止代码运行的功能吧\r\n2月13日回复顶转发\r\n毛毛虫面包\r\n毛毛虫面包\r\n从例子上看，控制器类名 和路由配置的大小写是无关的，感觉有点混乱\r\n2月13日回复顶转发\r\n贾超\r\n贾超\r\n回复 王剑: $data有什么用？\r\n2月16日回复顶转发\r\n低调的华丽\r\n低调的华丽\r\n回复 ling: 为什么是 $1 而不是 $2/$3/$4...\r\n3月16日回复顶转发\r\nCodeIgniter 中国正在使用多说\r\n分享到：\r\n微博\r\nQQ空间\r\n腾讯微博\r\n微信\r\n© 版权所有 2014 - 2017, 不列颠哥伦比亚理工学院. 最后修改: 2017-01-10.\r\n\r\n以 aneasystone 制作的手册为基础构建\r\n\r\n基于 Sphinx 并使用 Read the Docs 提供的风格构建\r\n\r\nGithub 简体中文翻译 · 离线版压缩包下载 · PDF 版下载',3,10193,1,0,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
