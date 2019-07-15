-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019-06-10 12:53:52
-- 服务器版本： 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iBook`
--

-- --------------------------------------------------------

--
-- 表的结构 `td_admin_log`
--

CREATE TABLE `td_admin_log` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `aid` int(10) NOT NULL COMMENT '管理员id',
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求方式',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求路径',
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求ip',
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '时间',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `td_article`
--

CREATE TABLE `td_article` (
  `aid` int(255) NOT NULL COMMENT '文章ID',
  `title` varchar(150) NOT NULL COMMENT '文章标题',
  `author` varchar(50) NOT NULL COMMENT '文章作者',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创作时间',
  `content` text COMMENT '文章内容',
  `brief` varchar(255) DEFAULT NULL COMMENT '文章简介',
  `commentCount` int(255) NOT NULL DEFAULT '0' COMMENT '文章评论数',
  `likeCount` int(255) NOT NULL DEFAULT '0' COMMENT '文章喜欢数',
  `collectionCount` int(255) NOT NULL COMMENT '收藏数',
  `type` varchar(10) NOT NULL COMMENT '文章类型',
  `tags` varchar(30) DEFAULT NULL COMMENT '文章标签',
  `item` varchar(10) DEFAULT NULL COMMENT '栏目',
  `cover` varchar(255) NOT NULL DEFAULT '/storage/images/cover/2cbcf9174d623c72debacd4b57d8432da2a65d3b.jpeg' COMMENT '封面路径',
  `power` int(1) NOT NULL DEFAULT '2' COMMENT '文章权限0仅自己可见，1关注人可见，2所有人可见'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `td_article`
--

INSERT INTO `td_article` (`aid`, `title`, `author`, `created_at`, `content`, `brief`, `commentCount`, `likeCount`, `collectionCount`, `type`, `tags`, `item`, `cover`, `power`) VALUES
(32, '树为谁坚守，倾一世芳华', '大三十五', '2019-04-30 01:40:13', '/storage/article/散文/b347270433f105df370e063751d67278e486535c.text', '人有生老病死、旦夕祸福，树同样有，但如果没有毁灭性的天灾人祸，树却能站立几百年，甚至更久，为一代代人撒下片片斑驳的绿荫。', 1, 1, 1, '散文', '散文', '散文', '/storage/images/cover/f4fea2e2c7dbbd1afc4327325f68f35d8d974b2f.jpg', 2),
(33, '感人狗狗《忠犬八公》', '大三十五', '2019-04-30 03:33:14', '/storage/article/随笔/4887fae6b59bd394b0d6a32f407bf4a6459a51bb.text', '这部电影的原形在东京，电影是根据东京的这条秋田犬的原形所拍摄的。现实世界中的它，也是为了等待自己的主人。电影情节紧凑，特别是到了后半个小时，我一直在哭。有兴趣的朋友可以去看一下。好了，今天的故事就到这里，谢谢观赏。', 1, 6, 5, '随笔', '忠犬八公', '电影', '/storage/images/cover/46a3e6cd6e3908ea68cc51c8d345ceacc0ea9420.jpg', 2),
(35, '你是人间的四月天', '123', '2019-04-30 08:22:15', '/storage/article/散文/afcb262a23736e327ca871f49af535e0677a69f7.text', '我说你是人间的四月天；', 6, 6, 3, '散文', '散文', '散文', '/storage/images/cover/c2e3245a93792631107bdca9ed35e957e22b146b.jpg', 2),
(36, '从前慢', '大三十五', '2019-04-30 08:23:40', '/storage/article/诗歌/d93aa0d976e58faf4b263fb717eb99da4bb682a4.text', '记得早先少年时\r\n　　大家诚诚恳恳\r\n　　说一句 是一句', 0, 0, 1, '诗歌', '诗歌', '诗歌', '/storage/images/cover/e3cedeeabc06549ffa8e367994995e21ac9fe7a5.jpg', 2),
(37, '一面镜子一面眼', '大三十五', '2019-05-07 05:10:52', '/storage/article/散文/37728efc2d79a9117ecbcd347eeb29e2d37c50a2.text', '镜子偏爱光阴。一树风景，窥见寸金真身，一地萤光，惊现成长本色，一空灯火，开亮光阴足迹，一山妍语，流尽点高峰。', 3, 1, 1, '散文', '散文,爱情', '散文', '/storage/images/cover/2cbcf9174d623c72debacd4b57d8432da2a65d3b.jpeg', 2),
(38, '做一个乐观的人，这就是幸福', '十三五', '2019-05-08 07:49:02', '/storage/article/散文/6480fe844daec27c0add25b0bc97f504e1f6b3c0.text', '每个人都想拥有幸福，但是，幸福到底是什么呢？不同的人都不同的答案。', 4, 4, 2, '散文', '幸福', '散文', '/storage/images/cover/2cbcf9174d623c72debacd4b57d8432da2a65d3b.jpeg', 2),
(40, '面朝大海，春暖花开', 'pjm', '2019-05-08 09:52:33', '/storage/article/诗歌/5a82d9ba3a595f18af646bdb767c36ada8ac94fe.text', '从明天起，做一个幸福的人', 2, 5, 1, '诗歌', '诗歌', '诗歌', '/storage/images/cover/c2e3245a93792631107bdca9ed35e957e22b146b.jpg', 2),
(41, '谢谢你，让我成为你想要的模样', '123', '2019-05-08 14:43:42', '/storage/article/散文/71fea183401d39251f37926d87c9eda7b7b8302e.text', '佛说前世五百次回眸，换来今生一次擦肩而过。总有一个人会在你生命最精彩的时刻出现，陪你走过一段路后，悄然离开，徒留下彻夜难眠的痛楚。', 2, 3, 2, '散文', '散文,爱情', '散文', '/storage/images/cover/aaf9009f2ff797deeabfcd9b83eed99ec5c11eb1.jpg', 2),
(42, '雨后彩虹', 'pjm', '2019-05-11 02:10:58', '/storage/article/小说/4fdabd8691b80db64e03c704605d5ab445136647.text', '一个史诗般的成功故事', 4, 5, 1, '小说', '小说,励志', NULL, '/storage/images/cover/b2ac2ee97f702d178dd6d4620c76010bb6599a1b.jpg', 2),
(43, '地球的另一个你', '12345', '2019-05-14 15:04:46', '/storage/article/小说/7ab366d17561953d2931dd65f6bc7533c57db57b.text', '我坐在巴黎一家咖啡厅靠窗的位置，来这家咖啡厅大多是情侣，因为这位置很好，能看得见巴黎那座带有神秘又神圣的铁塔，店名也很有意思“Another of the earth you 地球的另一个你”。', 2, 1, 0, '小说', '小说', '小说', '/storage/images/cover/dfb6c2b4afd8584b6e9495362f59a19a0d992552.jpg', 2),
(44, '一次性搞清楚equals和hashCode', '12345', '2019-05-31 00:44:30', '/storage/article/随笔/f8390d69cb5bb022c8ef7f1a1766fce27ffe4ef9.text', '一次性搞清楚equals和hashCode', 1, 5, 1, '专业', 'java,equals,hashCode', 'JAVA', '/storage/images/cover/18def029e69b1f4e385ee3e296095e336db3bef5.jpg', 2),
(45, '活着', '祖国的多肉', '2019-06-04 11:38:50', '/storage/article/小说/a82b933c5d6817122dd57f7ea0d1bac2ae93eebe.text', '《活着》是作家余华的代表作之一，讲述了在大时代背景下，随着内战、三反五反，大跃进，文化大革命等社会变革，徐福贵的人生和家庭不断经受着苦难，到了最后所有亲人都先后离他而去，仅剩下年老的他和一头老牛相依为命。', 3, 5, 1, '小说', '生命的意义,活着', NULL, '/storage/images/cover/62d404ec903e00b8d8723d063763ba346b21035f.jpg', 2),
(46, '湘西游记，神秘的别样风情', '12345', '2019-06-04 16:47:39', '/storage/article/旅行/dce9972b1a96ef26be2c61aee700b258e6f0fbb1.text', '湘西游记，神秘的别样风情', 0, 4, 0, '旅行', '游记,湘西', '游记', '/storage/images/cover/a91e552e998a0de7f0e8f88296c04f48346cc4ab.jpg', 2),
(47, 'String，StringBuilder，StringBuffer三者的区别', '12345', '2019-06-05 01:20:49', '/storage/article/专业/84a680f6215e4f913fd00cf17b06be76ae107019.text', 'String、StringBuffer、StringBuilder的区别', 0, 6, 2, '专业', 'java,string', 'JAVA', '/storage/images/cover/c1fe55357e8c62fbb136d83e16840197cd4d417c.jpg', 2),
(48, '这个方法厉害了，可以免费下载XX文库任意文档！', 'cjq', '2019-06-05 01:59:23', '/storage/article/专业/3838f7d684571423e1ba7264e8f9cdc2972787ef.text', '不想写', 0, 0, 0, '专业', NULL, NULL, '/storage/images/cover/0a7ce6dbd8b90c6f7a6ec17b37687238d8e50696.jpg', 2),
(49, '油猴脚本刷实验课', 'cjq', '2019-06-05 02:03:01', '/storage/article/专业/5da29a230da82fb767633a69bb6d43614a33c32a.text', '油猴脚本刷实验课', 0, 0, 0, '专业', '油猴脚本', NULL, '/storage/images/cover/7d70da5929c2137a0ece5f49f91f323437b7abca.jpg', 2),
(50, '天上的街市', '12345', '2019-06-05 09:00:44', '/storage/article/诗歌/4e9fbadddf8c5a58b3b710efdb76bc9158aba6a9.text', '郭沫若（1892一1978年），原名郭开贞，字鼎堂，号尚武，乳名文豹，笔名沫若、麦克昂、郭鼎堂、石沱、高汝鸿、羊易之等。 [1]  1892年11月16日出生于四川乐山沙湾，毕业于日本九州帝国大学，现代文学家、历史学家、新诗奠基人之一 [2]  、中国科学院首任院长 [3]  、中国科学技术大学首任校长 [4]  、苏联科学院外籍院士 [5]  。', 0, 1, 0, '诗歌', '诗歌,郭沫若', '诗歌', '/storage/images/cover/aef41b3df03958138331276ed0eeead54142a60b.jpeg', 2),
(51, '顾城诗集', '祖国的多肉', '2019-06-05 14:19:57', '/storage/article/诗歌/fa74c9c32934c8e55950b0d464deef7378c6b8c3.text', '顾城（1956—1993），男，原籍上海，1956年9月24日生于北京一个诗人之家，中国朦胧诗派的重要代表，被称为当代的“唯灵浪漫主义”诗人。顾城在新诗、旧体诗和寓言故事诗上都有很高的造诣，其《一代人》中的一句“黑夜给了我黑色的眼睛/我却用它寻找光明”成为中国新诗的经典名句。', 2, 0, 0, '诗歌', '黑夜,思念,一代人', NULL, '/storage/images/cover/393b72bf001b1e71a799b7e35d40be1644935417.jpg', 2),
(52, '平凡的世界', '祖国的多肉', '2019-06-05 14:22:41', '/storage/article/随笔/2be9de0e81e295b7c7c10e791564b863cb7f50d9.text', '《平凡的世界》是中国作家路遥创作的一部百万字的小说。这是一部全景式地表现中国当代城乡社会生活的长篇小说，全书共三部。1986年12月首次出版。\r\n该书以中国70年代中期到80年代中期十年间为背景，通过复杂的矛盾纠葛，以孙少安和孙少平两兄弟为中心，刻画了当时社会各阶层众多普通人的形象；劳动与爱情、挫折与追求、痛苦与欢乐、日常生活与巨大社会冲突纷繁地交织在一起，深刻地展示了普通人在大时代历史进程中所走过的艰难曲折的道路。1991年3月，《平凡的世界》获中国第三届茅盾文学奖。', 0, 0, 0, '随笔', '平凡,生活', NULL, '/storage/images/cover/c3ab4aaac5063a60c45aec3d0045ce7169ab2138.jpg', 2),
(54, '像我这样的人', '三三', '2019-06-05 14:29:59', '/storage/article/随笔/be46273642b00d4fc08ef83d3a4cb3aa5b9d5fba.text', '作者：吴铭6100', 0, 0, 0, '随笔', NULL, NULL, '/storage/images/cover/ad883512dfbf15c2d2d2309d3975c1ccbf500e3a.jpg', 2),
(55, '两个人的车站', '迪丽热巴', '2019-06-05 14:31:52', '/storage/article/随笔/15af2ce6988b345383061318005c99c98e64f23f.text', '我们一同成长，经历幸福与悲伤；\r\n当梧桐飘絮的时候，桂花坠落惆怅；\r\n雾重烟轻，桃花带雨浓；\r\n那晚，芬芳。', 0, 0, 0, '随笔', '情有独钟,青梅竹马', '成长', '/storage/images/cover/968c873b3ee486b334c452d5208a528bd6df8362.jpg', 2),
(56, '如何成为一个内心强大的人？', '三三', '2019-06-05 14:34:43', '/storage/article/随笔/edfc0e250f78f276f1b0971eea550c9e06fc2065.text', '文章来源 / 丹尼尔先生', 0, 0, 0, '随笔', NULL, NULL, '/storage/images/cover/32cf767cbfd0018dc939e68ca25a6cb4bd934fa0.jpg', 2),
(57, '勒古鲁斯决定不当圣斗士了', '迪丽热巴', '2019-06-05 14:37:04', '/storage/article/随笔/43286ab38337f36b4db28764f48957d8e579c5c0.text', '守护爱与正义', 0, 0, 0, '小说', '轻小说', '轻小说', '/storage/images/cover/8ff1cdefdb7d8ac2b8d2ce03bdcd35cb5caee476.jpg', 2),
(58, '致橡树', '迪丽热巴', '2019-06-05 14:45:12', '/storage/article/诗歌/05616554b350e492cfe7b181b1d3e17c5d382ec0.text', '《致橡树》是中国诗人舒婷1977年创作的一首现代诗歌。这首诗共36行，前13行诗人用攀援的凌霄花、痴情的鸟儿、泉源、险峰、日光、春雨六个形象，对传统的爱情观进行否定；14～36行正面抒写了自己理想的爱情观。全诗通过整体象征的艺术手法，用“木棉”对“橡树”的内心独白，热情而坦诚地歌唱自己的人格理想以及要求比肩而立、各自独立又深情相对的爱情观。 诗歌的章法及句法精心安排，使抒情与议论自然融合，使丰富细腻的感情带有理性的光彩。', 0, 0, 0, '诗歌', '现代诗歌', '诗歌', '/storage/images/cover/168b597951b5f1bc8a834dd55ad22da23e5abdc0.jpg', 2),
(59, '动漫鉴赏', 'OVERLORD', '2019-06-05 14:52:01', '/storage/article/0/b142b0bef30c61009d66d4dbb617d3bf6544c8fb.text', NULL, 0, 2, 1, '0', NULL, NULL, '/storage/images/cover/7c3642695a2a2906ecd649b98c7c1c642a923464.jpg', 2),
(60, '卡夫卡随笔集', '迪丽热巴', '2019-06-05 14:52:47', '/storage/article/随笔/00c64e3598aa4ed9e348b524c6bc6eb5cd6baf8d.text', '《卡夫卡全集》是奥地利作家弗朗茨·卡夫卡作品。本书共包括九卷，收入卡夫卡全部作品，读者可以领略到卡夫卡的作品全貌。该书中文译本于2015年由中央编译出版社出版发行，由叶廷芳主编翻译。', 1, 2, 1, '随笔', '德国', '随笔', '/storage/images/cover/a86dc7d4b78afed4c9ff4f91477949a515d1c445.jpg', 2),
(61, '初识蒙古坟', 'OVERLORD', '2019-06-05 14:54:38', '/storage/article/0/d441efa371c7708f7300796a0b6d5bd8d83e414f.text', NULL, 0, 3, 1, '0', NULL, NULL, '/storage/images/cover/02eb17fed2bd1dd2b80ade359c9b17b2ebfea166.jpg', 2),
(62, '遇见', '迪丽热巴', '2019-06-05 14:57:06', '/storage/article/散文/ab8bdf680d72aed9a69f018f442873fdf6ac2396.text', '最美的遇见，不过初见。', 0, 1, 1, '散文', '文艺', '散文', '/storage/images/cover/eac740e5a67cfed38ff8a8414d37cdfc0e6f6bb0.jpg', 2),
(63, '梦断代码', '迪丽热巴', '2019-06-05 15:02:11', '/storage/article/专业/03023517acd436a9664d6b4c1e2103fd0053919f.text', '软件乃是人类自以为最有把握，实则最难掌控的技术。《梦断代码》作者罗森伯格对OSAF主持的Chandler项目进行田野调查，跟踪经年，试图借由Chandler项目的开发过程揭示软件开发中的一些根本性大问题。', 0, 0, 0, '专业', '专业书籍', '代码', '/storage/images/cover/c22eb85621be7c43efba945c7d705edb55049a37.jpg', 2),
(64, '马云传', '迪丽热巴', '2019-06-05 15:10:12', '/storage/article/传记/6f4ffeddd0342e87b39b3187019782fe2c391386.text', '从顽劣少年到“创业教父”，从英语教师到新经济领袖，马云是如何完成这场完美逆袭的？ 本书以时间为线索，讲述了马云的成长、创业和缔造“阿里帝国”的过程，描写了他遭遇过的困苦、经历过的辉煌，解剖了他的奋斗精神和管理智慧。 想创业的年轻人，正在人生事业上勇攀高峰或艰难跋涉的年轻人，都可以从马云身上汲取力量，从马云身上学到人生的智慧，为自己补充正能量！', 0, 1, 0, '传记', '马云', '人物传记', '/storage/images/cover/944c621c94957bfe273680adee3909d121bdc22b.jpg', 2),
(65, '带着柔软的心意感知旅途的美好', '迪丽热巴', '2019-06-05 15:18:11', '/storage/article/旅行/b7247c371edb4639a6f4dddcbf3d008c9ba772b4.text', '旅行不会改变世界，却会改变我们看世界的眼睛', 1, 1, 0, '旅行', '云南,大理', '旅行随笔', '/storage/images/cover/9bfc63a966fe575da729e7d06538b2ae55ce2ec5.jpg', 2),
(66, 'MySQL添加外键常见错误代码', '12345', '2019-06-06 03:19:16', '/storage/article/专业/4dd31a5a5ceef5d1aee3eedc9a22f3b8eac5822b.text', 'MySQL添加外键常见错误代码', 0, 0, 0, '专业', 'MYSQL,主键', 'MYSQL', '/storage/images/cover/4b7d794c6750e31a4b16f0264cafdbd684a19d50.jpg', 2),
(67, '傲慢与偏见读后感', '小刀大大', '2019-06-06 05:31:47', '/storage/article/0/02b2721bf4bfd430772f8f9d2d91897159515599.text', NULL, 1, 2, 1, '0', NULL, NULL, '/storage/images/cover/e21ecff57786b51d6850cf28da217100c7b7af78.jpg', 2),
(68, 'jquery.validate通过remote来实现ajax验证', '12345', '2019-06-06 13:40:02', '/storage/article/专业/11028072047ce8fd86dd6a574f9da5c2e0838e8f.text', 'jquery.validate通过remote来实现ajax验证', 0, 2, 0, '专业', 'validate,Ajax,jQuery', 'jQuery', '/storage/images/cover/a62c106c64db2eb14591c9d7baef230af69e3df1.jpg', 2),
(69, '小时候的宇航员先生', '12345', '2019-06-06 19:03:30', '/storage/article/随笔/343ed7ee480b852afe65b14439ecc82d03c9b6a9.text', '小时候的宇航员先生', 0, 1, 0, '随笔', '梦想,彩绘', '梦想', '/storage/images/cover/3b95e170e48e90841b9883d88a98152c774bcfc1.jpg', 2),
(71, 'Android 9.0 WebView无法加载页面报错net：ERR_CLEARTEXT_NOT_PERMITTED', '12345', '2019-06-09 15:46:29', '/storage/article/专业/0d18113fb45c736a840ee0d5e2242c3a0ca2953a.text', 'Android 9.0 WebView无法加载页面报错net：ERR_CLEARTEXT_NOT_PERMITTED', 0, 0, 0, '专业', 'Android,WebView', 'Android', '/storage/images/cover/07b4477374195cfa91c1a715d6ecd0bc6d9d9a51.png', 2);

-- --------------------------------------------------------

--
-- 表的结构 `td_collection`
--

CREATE TABLE `td_collection` (
  `cid` int(255) NOT NULL COMMENT '收藏ID',
  `aid` int(255) NOT NULL COMMENT '收藏文章ID',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '收藏时间',
  `account` varchar(50) NOT NULL COMMENT '收藏账号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `td_collection`
--

INSERT INTO `td_collection` (`cid`, `aid`, `created_at`, `account`) VALUES
(8, 33, '2019-05-07 03:41:08', '大三十五'),
(9, 32, '2019-05-07 03:41:16', '大三十五'),
(10, 35, '2019-05-07 03:41:21', '大三十五'),
(11, 37, '2019-05-07 11:03:29', '大三十五'),
(12, 38, '2019-05-08 09:06:33', '大三十五'),
(13, 35, '2019-05-08 09:45:06', 'pjm'),
(14, 40, '2019-05-08 14:25:51', '123'),
(15, 41, '2019-05-11 02:14:03', '123'),
(16, 42, '2019-05-11 02:50:12', 'pjm'),
(18, 38, '2019-06-04 02:41:19', 'pjm'),
(19, 35, '2019-06-04 11:33:56', '祖国的多肉'),
(20, 45, '2019-06-04 16:02:07', '12345'),
(21, 47, '2019-06-05 01:26:56', '12345'),
(22, 41, '2019-06-05 01:59:57', 'cjq'),
(23, 44, '2019-06-05 03:32:10', '大三十五'),
(24, 47, '2019-06-05 05:59:49', '大三十五'),
(25, 60, '2019-06-05 14:54:51', '南昌八度'),
(26, 62, '2019-06-05 14:59:39', '南昌八度'),
(27, 61, '2019-06-05 14:59:55', '南昌八度'),
(28, 59, '2019-06-05 15:00:22', '南昌八度'),
(29, 67, '2019-06-06 09:43:12', '12345');

-- --------------------------------------------------------

--
-- 表的结构 `td_comm`
--

CREATE TABLE `td_comm` (
  `CID` int(255) NOT NULL COMMENT '评论ID',
  `CUsername` varchar(50) DEFAULT '游客' COMMENT '评论用户',
  `CContent` text NOT NULL COMMENT '评论内容',
  `CTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间',
  `CAID` int(255) NOT NULL COMMENT '评论文章ID',
  `CAuthor` varchar(255) NOT NULL COMMENT '文章作者',
  `LikeCount` int(255) NOT NULL DEFAULT '0' COMMENT '喜欢数',
  `isDelete` int(5) NOT NULL DEFAULT '0' COMMENT '是否删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `td_comm`
--

INSERT INTO `td_comm` (`CID`, `CUsername`, `CContent`, `CTime`, `CAID`, `CAuthor`, `LikeCount`, `isDelete`) VALUES
(73, '123', '电影情节紧凑', '2019-04-30 07:57:13', 33, '大三十五', 5, 0),
(74, '123', '人有生老病死、旦夕祸福，树同样有', '2019-04-30 08:25:08', 32, '大三十五', 23, 0),
(75, '大三十五', '镜子，频繁照生命语，思，不禁仰视这远，不由自主俯瞰这境窗。', '2019-05-07 11:04:24', 37, '大三十五', 22, 0),
(77, '大三十五', '每个人都想拥有幸福，但是，幸福到底是什么呢？不同的人都不同的答案。', '2019-05-08 08:28:48', 38, '十三五', 0, 0),
(78, '大三十五', '幸福是变幻莫测的，它时而简单，时而复杂。对于知足的人来说，幸福其实很简单，但对于贪心的人来说，幸福是个复杂的东西。幸福总是会降临到善良的人和乐观的人身上，正如我的题目所写得那样：幸福，既简单又不简单。', '2019-05-08 08:29:07', 38, '十三五', 1, 0),
(79, '大三十五', '镜子喜欢岁月。叠青春的皱纹，婀娜多姿，用日月的华发，熠熠生辉，翻花样的晨暮，层出不穷。刻岁月的样子，最初是稚嫩的，经历生命尝尽人间百味而变为忆场地。照岁月，知我有后山，我知那一坡的故事是今后时间的茶闲语。', '2019-05-08 08:32:28', 37, '大三十五', 3, 0),
(80, '大三十五', '你是一树一树的花开，\n是燕在梁间呢喃，——你是爱，是暖，\n是希望，你是人间的四月天！', '2019-05-08 08:52:32', 35, '123', 3, 0),
(81, '大三十五', '我说你是人间的四月天；\n笑响点亮了四面风；\n轻灵在春的光艳中交舞着变。', '2019-05-08 08:58:56', 35, '123', 2, 0),
(84, 'pjm', '我说你是人间的四月天；\n笑响点亮了四面风；\n轻灵在春的光艳中交舞着变。', '2019-05-08 09:44:21', 35, '123', 3, 0),
(86, '123', '从明天起，做一个幸福的人', '2019-05-11 02:15:05', 40, 'pjm', 1, 0),
(93, 'pjm', '一个史诗般的成功故事', '2019-05-11 02:53:42', 42, 'pjm', 1, 0),
(94, 'pjm', '感动', '2019-05-11 03:02:11', 42, 'pjm', 0, 0),
(99, '12345', '雨后彩虹', '2019-05-13 13:10:10', 42, 'pjm', 0, 0),
(100, '12345', '这再熟悉过的怀抱，此刻真实出现在我的世界，好再我并没有放弃等待寻找，终于等到梦中的你了！', '2019-05-17 06:59:55', 43, '12345', 13, 0),
(101, '大三十五', 'Another of the earth you', '2019-05-17 07:01:26', 43, '12345', 0, 0),
(102, '祖国的多肉', '我是祖国的多肉', '2019-05-30 08:30:25', 35, '123', 1, 0),
(103, '祖国的多肉', '老感动坏了', '2019-05-30 08:32:30', 42, 'pjm', 0, 0),
(104, '祖国的多肉', '世界是所有人的，生活是自己的', '2019-05-30 08:37:38', 37, '大三十五', 0, 0),
(105, '祖国的多肉', '有的人活着，他已经死了。有的人死了，他还活着。', '2019-06-04 13:32:42', 45, '祖国的多肉', 0, 0),
(106, '祖国的多肉', '生活不止眼前的苟且，还有诗和远方', '2019-06-04 13:33:06', 45, '祖国的多肉', 0, 0),
(107, 'cjq', '你离开的一年里，我依旧秉公无私的工作，坚持每天一小时的体能训练。夜深时分，仍然会写几段稿子或文章，然后放下笔，默默想起你。回想曾经，承诺了太多，如今补偿给你的，就是活成最好的自己。谢谢你让我变成你想要的模样，谢谢你让我蜕变成最好的自己。', '2019-06-05 02:00:14', 41, '123', 0, 0),
(108, '大三十五', '重写了euqls方法的对象必须同时重写hashCode()方法。', '2019-06-05 03:31:00', 44, '12345', 0, 0),
(109, '12345', '我看到广阔的土地袒露着结实的胸膛，那是召唤的姿态，就像女人召唤着她们的儿女，土地召唤着黑夜来临。', '2019-06-05 06:54:09', 45, '祖国的多肉', 0, 0),
(110, '祖国的多肉', '折磨我们的往往是想象，而不是事实。', '2019-06-05 14:27:24', 51, '祖国的多肉', 0, 0),
(111, '祖国的多肉', '我需要\n最狂的风、和最静的海', '2019-06-05 14:29:13', 51, '祖国的多肉', 0, 0),
(112, '南昌八度', '“藏身处难以计数，而能使你获救的只有一处，但获救的可能性又像藏身处一样地多。\n目标确有一个，道路却无一条；我们谓之路者，乃踌躇也。', '2019-06-05 14:56:07', 60, '蔡徐坤', 0, 0),
(113, '小刀大大', '棒棒的！', '2019-06-06 05:42:30', 65, '迪丽热巴', 0, 0),
(114, '12345', '戴维·塞西尔也说：“最成功的作家是最严格地遵循支配他所挑选的艺术的规律的人。在所有挑选小说这种艺术的人中，没有谁比简·奥斯汀更细心地遵守着小说艺术的规律，正是这一点使她胜过其他英国小说家。由于她的小说艺术技巧高超，她使得所有其他英国小说家都相形见绌。”', '2019-06-09 12:25:13', 67, '小刀大大', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `td_fans`
--

CREATE TABLE `td_fans` (
  `fid` int(255) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '关注账号',
  `account` varchar(255) NOT NULL COMMENT '被关注账号',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '关注时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `td_fans`
--

INSERT INTO `td_fans` (`fid`, `username`, `account`, `created_at`) VALUES
(9, '大三十五', '123', '2019-05-08 15:22:39'),
(10, '大三十五', '十三五', '2019-05-08 16:29:46'),
(11, 'pjm', '123', '2019-05-08 17:43:06'),
(12, '123', 'pjm', '2019-05-08 22:51:30'),
(14, '祖国的多肉', 'pjm', '2019-05-30 16:38:12'),
(15, '祖国的多肉', '大三十五', '2019-05-30 16:38:48'),
(16, '祖国的多肉', '12345', '2019-05-30 16:38:55'),
(17, 'pjm', '十三五', '2019-06-04 10:40:34'),
(18, 'cjq', '123', '2019-06-05 10:00:00'),
(19, '大三十五', '12345', '2019-06-05 14:01:09'),
(21, '南昌八度', '蔡徐坤', '2019-06-05 22:54:40'),
(22, '南昌八度', 'OVERLORD', '2019-06-05 22:59:48'),
(28, '12345', '祖国的多肉', '2019-06-06 14:32:03'),
(29, '12345', '十三五', '2019-06-06 14:35:11'),
(30, '12345', 'pjm', '2019-06-06 14:35:15');

-- --------------------------------------------------------

--
-- 表的结构 `td_manager`
--

CREATE TABLE `td_manager` (
  `id` int(10) NOT NULL COMMENT 'id',
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `gender` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '性别',
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手机号',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `role_id` int(10) NOT NULL COMMENT '角色ID',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '状态',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `td_manager`
--

INSERT INTO `td_manager` (`id`, `username`, `password`, `gender`, `mobile`, `email`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, '0', '0', '1', '', '', 1, '1', NULL, NULL, NULL),
(11, 'wsed', '$2y$10$RheegMbp5tXWvjXQvBItmeRax', '3', '15540428887', 'yrerum@163.com', 3, '', NULL, '2019-04-12 15:37:32', NULL),
(12, 'quia.eligendi', '$2y$10$8/liBnAz5EOuoHasj4ZCsOqL5', '3', '18227240391', 'velit_excepturi@gmail.com', 1, '1', NULL, '2019-04-12 15:37:32', NULL),
(13, 'nihil47', '$2y$10$HVNtPtDG6U08uENP1U5BZOcuR', '1', '15865061779', 'ex.quo@gmail.com', 1, '1', NULL, '2019-04-12 15:37:32', NULL),
(14, 'suscipit59', '$2y$10$zvVsV6i28gk8N6Fd0zCFo.tzy', '3', '17823080796', 'autem86@163.com', 1, '1', NULL, '2019-04-12 15:37:32', NULL),
(15, 'itaque_nulla', '$2y$10$muVfExp4kSkV2xkpP.dRbutlY', '3', '13860392963', 'yet@qq.com', 1, '2', NULL, '2019-04-12 15:37:32', NULL),
(16, 'qeaque', '$2y$10$rWHlq5ZD.t4P4Z/IH6Bt6OVK5', '3', '17090960323', 'et_ullam@yahoo.com', 1, '2', NULL, '2019-04-12 15:37:32', NULL),
(17, 'ybeatae', '$2y$10$njUKNZVO/d56J.j8sZHJruhET', '2', '15026308419', 'qut@sina.com', 3, '2', NULL, '2019-04-12 15:37:32', NULL),
(18, 'pariatur_cupiditate', '$2y$10$lY/OsEDQ4MSJh.Pm5nSRwetj9', '3', '17152491989', 'dolorem74@sohu.com', 3, '2', NULL, '2019-04-12 15:37:32', NULL),
(20, 'quam_voluptas', '$2y$10$xM0OJAaALVhf4Ix3rzZAv.9s5', '1', '18852046151', 'fqui@sina.com', 1, '1', NULL, '2019-04-12 15:37:32', NULL),
(21, '123', '202cb962ac59075b964b07152d234b70', '1', '123', '123', 0, '2', 'tAOlb2qhERgF5t3QXGKgp3Qg4JdA99GDMLT0vv9pxwebnqL1pOUWup2wkG8w', NULL, NULL),
(24, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', '', '', 3, '2', NULL, NULL, NULL),
(27, '20160210490101', 'b033dc444d1628ef34e3c53e0f1ec8aa', '1', '', '', 1, '2', NULL, '2019-06-06 08:21:34', '2019-06-06 08:21:34');

-- --------------------------------------------------------

--
-- 表的结构 `td_notifications`
--

CREATE TABLE `td_notifications` (
  `notifiable_id` int(36) NOT NULL COMMENT 'id',
  `user_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '操作账号',
  `reply_type` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '类型',
  `reply_user` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '被通知账号',
  `topic_id` int(255) NOT NULL DEFAULT '0' COMMENT '操作文章id',
  `read_at` int(11) NOT NULL DEFAULT '0' COMMENT '是否阅读',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `td_notifications`
--

INSERT INTO `td_notifications` (`notifiable_id`, `user_name`, `reply_type`, `reply_user`, `topic_id`, `read_at`, `created_at`, `updated_at`) VALUES
(1, '大三十五', '评论', '12345', 44, 0, '2019-06-04 16:00:00', '2019-06-04 16:00:00'),
(2, '大三十五', '收藏', '12345', 47, 0, '2019-06-05 05:59:49', '2019-06-05 05:59:49'),
(3, '大三十五', '点赞', '12345', 47, 1, '2019-06-05 05:59:52', '2019-06-05 05:59:52'),
(4, '大三十五', '关注', '12345', 0, 0, '2019-06-05 06:01:09', '2019-06-05 06:01:09'),
(5, '12345', '关注', '祖国的多肉', 0, 0, '2019-06-05 06:53:54', '2019-06-05 06:53:54'),
(6, '12345', '评论', '祖国的多肉', 45, 0, '2019-06-05 06:54:09', '2019-06-05 06:54:09'),
(7, '12345', '收藏', '祖国的多肉', 45, 0, '2019-06-05 06:54:17', '2019-06-05 06:54:17'),
(8, '祖国的多肉', '评论', '祖国的多肉', 51, 0, '2019-06-05 14:27:24', '2019-06-05 14:27:24'),
(9, '祖国的多肉', '评论', '祖国的多肉', 51, 0, '2019-06-05 14:29:13', '2019-06-05 14:29:13'),
(10, '南昌八度', '关注', '蔡徐坤', 0, 0, '2019-06-05 14:54:40', '2019-06-05 14:54:40'),
(11, '南昌八度', '点赞', '蔡徐坤', 60, 0, '2019-06-05 14:54:46', '2019-06-05 14:54:46'),
(12, '南昌八度', '点赞', '蔡徐坤', 60, 0, '2019-06-05 14:54:48', '2019-06-05 14:54:48'),
(13, '南昌八度', '收藏', '蔡徐坤', 60, 0, '2019-06-05 14:54:51', '2019-06-05 14:54:51'),
(14, '南昌八度', '评论', '蔡徐坤', 60, 0, '2019-06-05 14:56:07', '2019-06-05 14:56:07'),
(15, '南昌八度', '点赞', '蔡徐坤', 62, 0, '2019-06-05 14:59:38', '2019-06-05 14:59:38'),
(16, '南昌八度', '收藏', '蔡徐坤', 62, 0, '2019-06-05 14:59:39', '2019-06-05 14:59:39'),
(17, '南昌八度', '关注', 'OVERLORD', 0, 0, '2019-06-05 14:59:48', '2019-06-05 14:59:48'),
(18, '南昌八度', '点赞', 'OVERLORD', 61, 0, '2019-06-05 14:59:51', '2019-06-05 14:59:51'),
(19, '南昌八度', '点赞', 'OVERLORD', 61, 0, '2019-06-05 14:59:52', '2019-06-05 14:59:52'),
(20, '南昌八度', '点赞', 'OVERLORD', 61, 0, '2019-06-05 14:59:54', '2019-06-05 14:59:54'),
(21, '南昌八度', '收藏', 'OVERLORD', 61, 0, '2019-06-05 14:59:55', '2019-06-05 14:59:55'),
(22, '南昌八度', '点赞', 'OVERLORD', 59, 0, '2019-06-05 15:00:21', '2019-06-05 15:00:21'),
(23, '南昌八度', '收藏', 'OVERLORD', 59, 0, '2019-06-05 15:00:22', '2019-06-05 15:00:22'),
(24, '南昌八度', '点赞', 'OVERLORD', 59, 0, '2019-06-05 15:00:25', '2019-06-05 15:00:25'),
(25, '南昌八度', '点赞', '蔡徐坤', 64, 0, '2019-06-05 15:14:38', '2019-06-05 15:14:38'),
(26, '小刀大大', '点赞', '迪丽热巴', 65, 0, '2019-06-06 05:42:03', '2019-06-06 05:42:03'),
(27, '小刀大大', '评论', '迪丽热巴', 65, 0, '2019-06-06 05:42:30', '2019-06-06 05:42:30'),
(28, '小刀大大', '关注', '迪丽热巴', 0, 0, '2019-06-06 05:44:04', '2019-06-06 05:44:04'),
(29, '12345', '关注', '祖国的多肉', 0, 0, '2019-06-06 06:26:17', '2019-06-06 06:26:17'),
(30, '12345', '关注', 'pjm', 0, 0, '2019-06-06 06:26:24', '2019-06-06 06:26:24'),
(31, '12345', '关注', 'pjm', 0, 0, '2019-06-06 06:26:31', '2019-06-06 06:26:31'),
(32, '12345', '关注', 'pjm', 0, 0, '2019-06-06 06:31:59', '2019-06-06 06:31:59'),
(33, '12345', '关注', '祖国的多肉', 0, 0, '2019-06-06 06:32:03', '2019-06-06 06:32:03'),
(34, '12345', '关注', '十三五', 0, 0, '2019-06-06 06:35:11', '2019-06-06 06:35:11'),
(35, '12345', '关注', 'pjm', 0, 0, '2019-06-06 06:35:15', '2019-06-06 06:35:15'),
(36, '12345', '点赞', '小刀大大', 67, 0, '2019-06-06 09:43:10', '2019-06-06 09:43:10'),
(37, '12345', '收藏', '小刀大大', 67, 0, '2019-06-06 09:43:12', '2019-06-06 09:43:12'),
(38, '12345', '点赞', '12345', 68, 0, '2019-06-08 12:10:45', '2019-06-08 12:10:45'),
(39, '12345', '点赞', '12345', 68, 0, '2019-06-08 12:10:46', '2019-06-08 12:10:46'),
(40, '12345', '点赞', '12345', 69, 0, '2019-06-08 12:14:25', '2019-06-08 12:14:25'),
(41, '12345', '点赞', '12345', 50, 0, '2019-06-08 12:23:31', '2019-06-08 12:23:31'),
(42, '12345', '点赞', '小刀大大', 67, 0, '2019-06-09 12:22:49', '2019-06-09 12:22:49'),
(43, '12345', '评论', '小刀大大', 67, 0, '2019-06-09 12:25:13', '2019-06-09 12:25:13'),
(44, '12345', '点赞', '十三五', 38, 0, '2019-06-09 13:53:39', '2019-06-09 13:53:39');

-- --------------------------------------------------------

--
-- 表的结构 `td_role`
--

CREATE TABLE `td_role` (
  `role_id` int(10) NOT NULL COMMENT '角色ID',
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名',
  `role_power` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '权利',
  `role_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '激活' COMMENT '状态',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `td_role`
--

INSERT INTO `td_role` (`role_id`, `role_name`, `role_power`, `role_status`, `created_at`, `updated_at`) VALUES
(0, '超级管理员', '拥有所有管理的权限，并能进行管理员以及管理员角色的添加和修改', '激活', '2019-06-06 08:32:17', '2019-06-06 08:32:17'),
(1, '用户管理员', '对上传用户进行审核（增删查改）', '激活', '2019-04-25 16:00:00', '2019-04-25 16:00:00'),
(2, '评论管理员', '对上传评论进行审核（增删查改）', '激活', '2019-06-06 07:41:52', '2019-06-06 07:41:52'),
(3, '书籍管理员', '对上传文章进行审核（查看、修改、删除）', '激活', '2019-04-26 02:36:39', '2019-04-26 02:36:39'),
(4, '分类管理员', '对文章的分类进行管理（增删查改）', '激活', '2019-06-06 08:29:07', '2019-06-06 08:29:07');

-- --------------------------------------------------------

--
-- 表的结构 `td_type`
--

CREATE TABLE `td_type` (
  `id` int(255) NOT NULL COMMENT '类型ID',
  `typename` varchar(11) NOT NULL COMMENT '类型名',
  `count` int(11) NOT NULL COMMENT '文章数量',
  `detailed` varchar(255) DEFAULT NULL COMMENT '详细描述',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `td_type`
--

INSERT INTO `td_type` (`id`, `typename`, `count`, `detailed`, `created_at`) VALUES
(1, '诗歌', 5, '有具体的诗歌形式，短片为主', '2019-04-26 05:39:42'),
(2, '小说', 5, '长篇短篇均可，原创', '2019-06-05 14:42:42'),
(3, '随笔', 8, '以短篇为主，没有固定格式，可以上传封面，但不可以连载和订阅', '2019-04-26 05:42:34'),
(4, '散文', 6, '形散意不散', '2019-04-26 11:13:27'),
(5, '专业', 8, '专业技能知识', '2019-06-04 05:25:14'),
(6, '传记', 1, '人物传记', '2019-06-04 05:32:14'),
(7, '旅行', 2, '旅行游记，介绍一次说走就走的旅行', '2019-06-04 05:34:20'),
(8, '其他', 0, '除了上述类型以外的其他文章类型', '2019-06-09 12:59:33');

-- --------------------------------------------------------

--
-- 表的结构 `td_user`
--

CREATE TABLE `td_user` (
  `id` int(255) NOT NULL COMMENT '用户ID',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '用户密码',
  `email` varchar(255) DEFAULT NULL COMMENT '账号',
  `phone` varchar(255) DEFAULT NULL COMMENT '电话',
  `sex` varchar(3) NOT NULL DEFAULT '3' COMMENT '性别',
  `CTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `birthday` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '出生日期',
  `profile` varchar(255) DEFAULT '暂无介绍' COMMENT '个人简介',
  `icon` varchar(255) DEFAULT 'home/static/images/user.png' COMMENT '用户头像',
  `status` varchar(10) DEFAULT '激活' COMMENT '状态',
  `openid` varchar(255) DEFAULT NULL COMMENT '绑定qqid',
  `notification_count` int(10) UNSIGNED DEFAULT '0' COMMENT '通知数量',
  `remember_token` varchar(100) DEFAULT NULL COMMENT 'token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `td_user`
--

INSERT INTO `td_user` (`id`, `username`, `password`, `email`, `phone`, `sex`, `CTime`, `birthday`, `profile`, `icon`, `status`, `openid`, `notification_count`, `remember_token`) VALUES
(9, '123456', 'e10adc3949ba59abbe56e057f20f883e', '', '0', '3', '2019-03-25 09:30:44', NULL, NULL, 'home/static/images/user.png', '激活', '0', 0, '0'),
(10, '666', 'fae0b27c451c728867a567e8c1bb4e53', '', '0', '3', '2019-03-25 10:41:03', NULL, NULL, 'home/static/images/user.png', '禁用', '0', 0, '0'),
(12, 'Xiong', '5dcc8d734bcb712be518c79e82f9ebbd', '', '0', '3', '2019-03-25 12:24:43', NULL, NULL, 'home/static/images/user.png', '激活', '0', 0, '0'),
(14, 'lifen201', 'bbfadd2be649c5615e3c473ff21005fc', '', '0', '3', '2019-03-25 23:58:03', NULL, NULL, 'home/static/images/user.png', '激活', '0', 0, '0'),
(16, '222', 'bcbe3365e6ac95ea2c0343a2395834dd', '', '0', '3', '2019-03-26 01:52:26', NULL, NULL, 'home/static/images/user.png', '激活', '0', 0, '0'),
(17, '111111', '96e79218965eb72c92a549dd5a330112', '', '0', '3', '2019-03-26 01:52:42', NULL, NULL, 'home/static/images/user.png', '激活', '0', 0, '0'),
(18, 'oyw123', 'd0dcbf0d12a6b1e7fbfa2ce5848f3eff', '', '0', '3', '2019-03-26 01:53:09', NULL, NULL, 'home/static/images/user.png', '激活', '0', 0, '0'),
(19, 'ggg', 'ba248c985ace94863880921d8900c53f', '', '0', '3', '2019-03-31 10:10:56', '2019-03-03 00:00:00', '是是是', 'home/static/images/user.png', '激活', '0', 0, '0'),
(20, '11', '6512bd43d9caa6e02c990b0a82652dca', '', '0', '3', '2019-03-31 13:04:23', '2019-03-12 00:00:00', '行行行', 'home/static/images/user.png', '激活', '0', 0, '0'),
(21, 'qq123', 'e10adc3949ba59abbe56e057f20f883e', '', '0', '3', '2019-04-04 12:14:13', '2019-04-04 20:14:13', '暂无介绍', 'home/static/images/user.png', '激活', '0', 0, '0'),
(22, '000000', '670b14728ad9902aecba32e22fa4f6bd', '', '0', '3', '2019-04-16 08:19:37', '2019-04-16 16:19:37', '暂无介绍', 'home/static/images/user.png', '激活', '0', 0, '0'),
(23, '999999', '$2y$10$f2DryR5iGHbqa8UlN3FlkO1bb', '', '0', '3', '2019-04-16 12:45:54', '2019-04-16 20:45:54', '暂无介绍', 'home/static/images/user.png', '激活', '0', 0, '0'),
(24, '222222', '$2y$10$zG1Sj98B0FwAPUV580rqMuqv1jAwR18wBRCOekO6srMSvq9UUaUPK', '', '0', '3', '2019-04-16 12:53:03', '2019-04-16 20:53:03', '暂无介绍', 'home/static/images/user.png', '激活', '0', 0, '0'),
(25, 'qqqqqq', 'qqqqqq', '', '0', '3', '2019-04-16 13:52:23', '2019-04-16 21:52:23', '暂无介绍', 'home/static/images/user.png', '激活', '0', 0, '0'),
(26, '123', '202cb962ac59075b964b07152d234b70', '', '0', '3', '2019-04-24 09:05:44', '2019-04-24 17:05:44', '暂无介绍', 'home/static/images/user.png', '激活', '0', 0, '0'),
(27, '味道还不错', 'ljwlloveyou980', '1184465220@qq.com', '0', '3', '2019-04-26 07:56:19', '2019-04-26 15:56:19', '暂无介绍', 'home/static/images/user.png', '激活', '0', 0, NULL),
(28, '十三五', '21d1f478ab923258fc68c88c0daf7046', '1184465220@qq.com', '0', '3', '2019-04-26 08:34:31', '2019-04-26 16:34:31', '暂无介绍', '/storage/images/icon/2f4f7b894466f474843dbd2dfb8415020ffcb212.jpg', '激活', '0', 0, NULL),
(29, '九八五计划', '21d1f478ab923258fc68c88c0daf7046', '1184465220@qq.com', '18855109072', '3', '2019-04-27 04:30:52', '2019-04-27 12:30:52', '九八五计划开始', '/storage/images/icon/247bde37b7aae6da252ad6b2432a8eb0d5954017.jpg', '激活', '0', 0, NULL),
(30, '大三十五', '21d1f478ab923258fc68c88c0daf7046', '1184465220@qq.com', '', '3', '2019-04-27 12:16:44', '2019-04-27 20:16:44', '暂无介绍', '/storage/images/icon/958414fbf852c767948e6cb02cefc0802719329a.jpg', '激活', '0', 0, NULL),
(31, '大风吹啊吹', '21d1f478ab923258fc68c88c0daf7046', '1184465220@qq.com', NULL, '3', '2019-04-29 12:05:33', '2019-04-29 20:05:33', '暂无介绍', 'home/static/images/user.png', '激活', '0', 0, NULL),
(32, '12345', '21d1f478ab923258fc68c88c0daf7046', NULL, NULL, '3', '2019-04-30 01:07:16', '2019-04-30 09:07:16', '暂无介绍', 'http://thirdqq.qlogo.cn/g?b=oidb&k=VkEJiaqDQHkba9DBfzWwdAg&s=100', '激活', '4086FE74ECF9C5D147B9AABF7F1BBFD9', 0, NULL),
(33, '李芬', '21d1f478ab923258fc68c88c0daf7046', '1184465220@qq.com', NULL, '3', '2019-04-30 11:06:25', '2019-04-30 19:06:25', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(34, 'pjm', 'e10adc3949ba59abbe56e057f20f883e', '1378039120@qq.com', NULL, '3', '2019-05-08 09:29:22', '2019-05-08 17:29:22', '我是宇宙无敌美少女彭佳美', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(39, 'pjm2', 'e10adc3949ba59abbe56e057f20f883e', '1378039120@qq.com', NULL, '3', '2019-05-08 09:39:58', '2019-05-08 17:39:58', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(40, 'lifen', 'a35f752ed89006d06b0a110874358dd3', '2271988987@qq.com', NULL, '3', '2019-05-10 00:26:28', '2019-05-10 08:26:28', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(42, '7299', '21d1f478ab923258fc68c88c0daf7046', '1184465220@qq.com', NULL, '3', '2019-05-10 00:27:35', '2019-05-10 08:27:35', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(43, '567', 'a35f752ed89006d06b0a110874358dd3', '2271988987@qq.com', NULL, '3', '2019-05-10 00:28:08', '2019-05-10 08:28:08', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(45, '迪丽热巴', 'e10adc3949ba59abbe56e057f20f883e', '2271988987@qq.com', '15946965652', '3', '2019-05-10 01:08:40', '2019-05-10 09:08:40', '暂无介绍', '/storage/images/icon/de42281d6ec8ccaa61242bc1fd88dcf650330148.jpg', '激活', NULL, 0, NULL),
(46, '蔡徐', 'a35f752ed89006d06b0a110874358dd3', '2271988987@qq.com', NULL, '3', '2019-05-10 01:20:13', '2019-05-10 09:20:13', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(56, '祖国的多肉', '36f4cd880be1df95150e93942412d53b', '783230416@qq.com', NULL, '1', '2019-05-30 08:28:27', '2019-05-30 16:28:27', '我是祖国的多肉', '/storage/images/icon/556c4b9fc758832ae261c7f964b7757129b6d9e7.png', '激活', 'C669638509F3F696C0503BC15D6ED057', 0, NULL),
(57, '小刀大大', 'e10adc3949ba59abbe56e057f20f883e', '2578193950@qq.com', NULL, '1', '2019-05-30 13:27:06', '2019-05-30 21:27:06', '暂无介绍', '/storage/images/icon/312765541e214997a1174228a883472a6783d846.jpg', '激活', NULL, 0, NULL),
(58, '徒步去大理', '123456', '724347766@qq.com', NULL, '3', '2019-05-31 06:00:34', '2019-05-31 14:00:34', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(59, 'hhh', 'e10adc3949ba59abbe56e057f20f883e', '3431717884@qq.com', NULL, '3', '2019-06-04 02:25:33', '2019-06-04 10:25:33', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(60, '清风~徐来', NULL, NULL, NULL, '3', '2019-06-04 02:35:47', '2019-06-04 10:35:47', '暂无介绍', 'http://thirdqq.qlogo.cn/g?b=oidb&k=eqicKh16R0oy6zYqRZYibklg&s=100', '激活', 'F96A284BF75B199EB7D3ACC5C0798B0D', 0, NULL),
(61, '、祖国的多肉', NULL, NULL, NULL, '3', '2019-06-04 11:31:55', '2019-06-04 19:31:55', '暂无介绍', 'http://thirdqq.qlogo.cn/g?b=oidb&k=NxlvJ25qAvqLTrOGoic0Lng&s=100', '激活', 'C669638509F3F696C0503BC15D6ED057', 0, NULL),
(68, '繁华尽、物已非', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '3', '2019-06-04 13:16:34', '2019-06-04 21:16:34', '暂无介绍', 'http://thirdqq.qlogo.cn/g?b=oidb&k=MSyFknYszt0NnHHSCatQzQ&s=100', '激活', '51E27421550378149600820B965ABD8F', 0, NULL),
(69, '落殇画', 'ad929bd54695bc53e6206b806cec230c', '1824276536@qq.com', NULL, '3', '2019-06-05 01:52:20', '2019-06-05 09:52:20', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(70, '无话可说', '1bbd886460827015e5d605ed44252251', '111111@163.com', NULL, '3', '2019-06-05 01:55:38', '2019-06-05 09:55:38', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(71, '大海捞鱼', '1e849346c8fb286eeed4eb91fda1ae8c', '123456@Gmail.com', NULL, '3', '2019-06-05 01:56:38', '2019-06-05 09:56:38', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(72, 'cjq', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'luoshanghua@163.com', '18279862313', '1', '2019-06-05 01:57:03', '2019-06-05 09:57:03', '暂无介绍', '/storage/images/icon/747f19d54236fd2fa62816f55c2925d047d6ca92.jpg', '激活', NULL, 0, NULL),
(73, '大鱼', '1e849346c8fb286eeed4eb91fda1ae8c', 'haisilencehai@gmail.com', NULL, '3', '2019-06-05 01:59:51', '2019-06-05 09:59:51', '暂无介绍', '/storage/images/icon/19147e887ed21891bbabc4cf6d050e68472058f3.png', '激活', NULL, 0, NULL),
(74, 'hxt', '11111111', '1301817687@qq.com', NULL, '3', '2019-06-05 02:23:43', '2019-06-05 10:23:43', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(75, '我想封了这个号°', NULL, NULL, NULL, '3', '2019-06-05 11:39:40', '2019-06-05 19:39:40', '暂无介绍', 'http://thirdqq.qlogo.cn/g?b=oidb&k=jmCCT6ibwCPmCxwcUd58miag&s=100', '激活', '58E31B0F9F59F548C125508520453E2A', 0, NULL),
(76, '电子商务', '123456789', '763163830@qq.com', NULL, '3', '2019-06-05 11:42:51', '2019-06-05 19:42:51', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(77, 'OVERLORD', 'ba41fdbfb441d2031b12c48017accb88', NULL, NULL, '3', '2019-06-05 13:55:57', '2019-06-05 21:55:57', '暂无介绍', 'http://thirdqq.qlogo.cn/g?b=oidb&k=AT4wg0icJicx4IEvfrMQ6iblg&s=100', '激活', '8200D3E20E5167113BBB6A72370CE5E0', 0, NULL),
(78, '三三', '3542ae7d10eff82786b707134d5b82fc', '335489714@qq.com', NULL, '3', '2019-06-05 14:19:08', '2019-06-05 22:19:08', '暂无介绍', 'home/static/images/user.png', '激活', NULL, 0, NULL),
(79, '南昌八度', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '3', '2019-06-05 14:54:10', '2019-06-05 22:54:10', '暂无介绍', 'http://thirdqq.qlogo.cn/g?b=oidb&k=U2icYIqDM9VyHgFMlVJicT6w&s=100', '激活', '63A15D0B8AE41BFD018DC6225F1F62E0', 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `td_user_activations`
--

CREATE TABLE `td_user_activations` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '激活ID',
  `user_id` int(255) NOT NULL COMMENT '用户ID',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'token',
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT '激活状态',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `over_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '已读时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `td_user_activations`
--

INSERT INTO `td_user_activations` (`id`, `user_id`, `token`, `active`, `created_at`, `over_at`) VALUES
(1, 9, '60e944bc4ef91e142ecaadf12c3df27b', 1, '2019-04-26 08:34:32', '2019-04-26 08:34:32'),
(5, 39, '9ab91dc597d6f349deba4c54c40e0854', 0, '2019-05-08 09:40:00', '2019-05-08 09:40:00'),
(6, 40, 'b7c88ec0ad5cb799640019a97dd5c8fa', 0, '2019-05-10 00:26:29', '2019-05-10 00:26:29'),
(7, 42, '60e944bc4ef91e142ecaadf12c3df27b', 0, '2019-05-10 00:27:36', '2019-05-10 00:27:36'),
(8, 43, 'b7c88ec0ad5cb799640019a97dd5c8fa', 0, '2019-05-10 00:28:09', '2019-05-10 00:28:09'),
(11, 56, 'd697c5e1abbb84de29f5d1a1a83a8bea', 0, '2019-05-30 08:28:29', '2019-05-30 08:28:29'),
(12, 57, '6f37aba6b67c3d6a04b42a4268dfc69a', 0, '2019-05-30 13:27:07', '2019-05-30 13:27:07'),
(13, 58, 'd9f40fc94a74e957facb5ee3d5328192', 1, '2019-05-31 06:00:37', '2019-05-31 06:00:37'),
(14, 59, '43133068f15141fb3ae3305ea345982f', 1, '2019-06-04 02:25:34', '2019-06-04 02:25:34'),
(15, 69, 'fced67261e5474dfd3b8876787875adf', 1, '2019-06-05 01:52:21', '2019-06-05 01:52:21'),
(16, 70, '3911e02c864a4bb761f4d2e56b21fef1', 0, '2019-06-05 01:55:40', '2019-06-05 01:55:40'),
(17, 71, '9947f71aca118d92ed8cf225863a4bfa', 0, '2019-06-05 01:56:39', '2019-06-05 01:56:39'),
(18, 72, '971548a87c7a67f12df1d1147b3d4cb7', 0, '2019-06-05 01:57:05', '2019-06-05 01:57:05'),
(19, 73, '91aa49a8fc730ee2ac79f4d70a089351', 0, '2019-06-05 01:59:52', '2019-06-05 01:59:52'),
(20, 74, '55a02e323ee380bae267051e08c4ca3e', 1, '2019-06-05 02:23:45', '2019-06-05 02:23:45'),
(21, 76, '895880458b0d880ee319916c5f5cc33b', 1, '2019-06-05 11:42:52', '2019-06-05 11:42:52'),
(22, 78, '1d50bd600d67874fd37a2d82dcc86538', 1, '2019-06-05 14:19:09', '2019-06-05 14:19:09');

-- --------------------------------------------------------

--
-- 表的结构 `td_user_log`
--

CREATE TABLE `td_user_log` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '用户日志ID',
  `uid` tinyint(4) NOT NULL COMMENT '用户ID',
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求方法',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求路径',
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求IP',
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求数据',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '请求时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_admin_log`
--
ALTER TABLE `td_admin_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aid` (`aid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `td_article`
--
ALTER TABLE `td_article`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `Author` (`author`),
  ADD KEY `id` (`aid`);

--
-- Indexes for table `td_collection`
--
ALTER TABLE `td_collection`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `Account` (`account`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `td_comm`
--
ALTER TABLE `td_comm`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `CID` (`CID`),
  ADD KEY `CUsername` (`CUsername`),
  ADD KEY `CAuthor` (`CAuthor`),
  ADD KEY `CAuthor_2` (`CAuthor`),
  ADD KEY `CAID` (`CAID`),
  ADD KEY `CUsername_2` (`CUsername`),
  ADD KEY `CAID_2` (`CAID`);

--
-- Indexes for table `td_fans`
--
ALTER TABLE `td_fans`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `username` (`username`),
  ADD KEY `account` (`account`);

--
-- Indexes for table `td_manager`
--
ALTER TABLE `td_manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `td_notifications`
--
ALTER TABLE `td_notifications`
  ADD PRIMARY KEY (`notifiable_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `user_name_2` (`user_name`);

--
-- Indexes for table `td_role`
--
ALTER TABLE `td_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `td_type`
--
ALTER TABLE `td_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_user`
--
ALTER TABLE `td_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `UAccount` (`username`),
  ADD KEY `username_2` (`username`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `td_user_activations`
--
ALTER TABLE `td_user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `td_user_log`
--
ALTER TABLE `td_user_log`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `td_admin_log`
--
ALTER TABLE `td_admin_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=311;
--
-- 使用表AUTO_INCREMENT `td_article`
--
ALTER TABLE `td_article`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT COMMENT '文章ID', AUTO_INCREMENT=72;
--
-- 使用表AUTO_INCREMENT `td_collection`
--
ALTER TABLE `td_collection`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT COMMENT '收藏ID', AUTO_INCREMENT=30;
--
-- 使用表AUTO_INCREMENT `td_comm`
--
ALTER TABLE `td_comm`
  MODIFY `CID` int(255) NOT NULL AUTO_INCREMENT COMMENT '评论ID', AUTO_INCREMENT=115;
--
-- 使用表AUTO_INCREMENT `td_fans`
--
ALTER TABLE `td_fans`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `td_manager`
--
ALTER TABLE `td_manager`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=28;
--
-- 使用表AUTO_INCREMENT `td_notifications`
--
ALTER TABLE `td_notifications`
  MODIFY `notifiable_id` int(36) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=45;
--
-- 使用表AUTO_INCREMENT `td_role`
--
ALTER TABLE `td_role`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '角色ID', AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `td_type`
--
ALTER TABLE `td_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '类型ID', AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `td_user`
--
ALTER TABLE `td_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '用户ID', AUTO_INCREMENT=80;
--
-- 使用表AUTO_INCREMENT `td_user_activations`
--
ALTER TABLE `td_user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '激活ID', AUTO_INCREMENT=23;
--
-- 使用表AUTO_INCREMENT `td_user_log`
--
ALTER TABLE `td_user_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户日志ID', AUTO_INCREMENT=1934;
--
-- 限制导出的表
--

--
-- 限制表 `td_admin_log`
--
ALTER TABLE `td_admin_log`
  ADD CONSTRAINT `td_admin_log_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `td_manager` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `td_article`
--
ALTER TABLE `td_article`
  ADD CONSTRAINT `td_article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `td_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `td_collection`
--
ALTER TABLE `td_collection`
  ADD CONSTRAINT `td_collection_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `td_article` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `td_collection_ibfk_2` FOREIGN KEY (`account`) REFERENCES `td_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `td_comm`
--
ALTER TABLE `td_comm`
  ADD CONSTRAINT `td_comm_ibfk_1` FOREIGN KEY (`CUsername`) REFERENCES `td_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `td_comm_ibfk_2` FOREIGN KEY (`CAID`) REFERENCES `td_article` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `td_fans`
--
ALTER TABLE `td_fans`
  ADD CONSTRAINT `td_fans_ibfk_1` FOREIGN KEY (`username`) REFERENCES `td_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `td_manager`
--
ALTER TABLE `td_manager`
  ADD CONSTRAINT `td_manager_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `td_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `td_notifications`
--
ALTER TABLE `td_notifications`
  ADD CONSTRAINT `td_notifications_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `td_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `td_user_activations`
--
ALTER TABLE `td_user_activations`
  ADD CONSTRAINT `td_user_activations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `td_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
