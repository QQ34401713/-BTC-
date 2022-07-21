# -开源数字货币交易所|外汇交易所|BTC交易所|数字交易所|多语言交易所|海外版区块链-
开源数字货币交易所|外汇交易所|BTC交易所|数字交易所|多语言交易所|海外版区块链
源码简介与安装说明：

CoinExchange开源数字货币合约交易所，基于Java开发的比特币交易所 | BTC交易所 | ETH交易所 | 数字货币交易所 | 交易平台 | 撮合交易引擎。本项目有完整的撮合交易引擎源码、后台管理（后端+前端）、前台（交易页面、活动页面、个人中心等）、安卓APP源码、苹果APP源码、币种钱包RPC源码。开源项目仅供学习参考，请勿用于非法用途。

特色：

1、基于内存撮合引擎，与传统基于数据库撮合更快

2、前后端分离，基于Token的Api授权机制

3、基于SpringCloud微服务架构，扩展更容易

4、MySQL、MongoDB、Redis多种数据存储方式，只为更快

5、Kafka发布订阅消息队列，让订单更快流转

6、主流币种对接区块链接口齐全，开箱即用

7、冷热钱包分离，两种提现方式，保证安全

8、机器人系统，同步行情，维护深度，防止搬砖

9、原生App，Java和ObjectC提供原生体验

10、交易所设计者提供技术支持，部署+二开无忧

11、支持添加自定义平台币及其他币种

使用教程：

准备mysql数据库，创建名称为“xxxx”的数据库

准备redis缓存数据库

准备kafka流式处理环境（先配置运行zookper，接着配置运行kafka）

准备mongodb数据库环境，创建用户admin、xxxx，创建bitrade数据库

准备阿里云OSS（修改项目中需要配置的地方）

准备nginx，修改配置文件（可选，正式上线需配置）

修改framework代码中的配置文件为准备环境配置参数

编译生成jar可执行文件

运行cloud.jar（微服务注册中心）

运行exchange.jar（撮合交易引擎）

运行market.jar（行情中心，需要等待Exchange.jar完全启动）

运行ucenter.jar（用户中心）

运行其他模块（wallet.jar、chat.jar、otc-api.jar等）

打开mysql，导入framework代码中的sql文件夹中xxxxxxx.sql文件，注意，trigger的sql如果报错，需要针对wallet表添加trigger

运行前端vue项目

运行后端vue项目

运行钱包RPC

运行自动交易机器人程序（本部分代码未上传，但不影响）

运行Admin项目（该服务并不依赖其他服务，因此也可只运行此项目，直接查看后台）

关于数据库脚本的问题

有朋友反映没有完整的SQL文件，这是因为编译成功的Jar，首次运行后会自动将Entity映射成数据库结构，项目中的SQL只是完成一些Springcloud无法完成的数据库结构。 数据库自动生成配置位于application.properties

配置文件：

#jpa

spring.jpa.show-sql=true

spring.data.jpa.repositories.enabled=true

spring.jpa.hibernate.ddl-auto=update

spring.jpa.hibernate.ddl-auto=update 这个配置会自动更新数据库结构。

核心功能说明（用户端）

1. 注册/登录/实名认证/审核（目前仅支持手机，二次开发可加入邮件，很简单）

2. Banner/公告/帮助/定制页面（Banner支持PC与APP分开设置，帮助支持各种分类模式）

3. 法币C2C交易/法币OTC交易（支持两种法币模式，项目早期可由平台承担C2C法币兑换，后期可开放OTC交易）

4. 币币交易（支持限价委托、市价委托，二次开发可加入其它委托模式）

5. 邀请注册/推广合伙人（支持对邀请推广人数、佣金进行以日、周、月的排行统计）

6. 创新实验室（该部分支持功能较多，分项说明。另，APP暂不全部支持该功能）

6-1. 首发抢购活动模式（如发行新交易对时，可对交易对设置一定数量的币种进行抢购）

6-2. 首发分摊活动模式（如发行BTC/USDT交易对之前，官方拿出5BTC做活动，根据用户充值抵押的USDT多少进行均分BTC）

6-3. 控盘抢购模式（如发行ZZZ/USDT交易对之前，ZZZ币种价格为5USDT，官方发行活动价为0.5USDT，则可使用该模式）

6-4. 控盘均摊模式（如6-3，只不过平均分配）

6-5. 矿机活动模式（支持用户抵押一定数量的币种，由官方承诺每月返还一定数量的币种）

7. 红包功能（支持平台及官方发放一定数量币种的红包，此功能适合用户裂变）

8. 用户资产管理、流水管理、委托管理、实名管理等各种基础管理

核心功能说明（管理端）

1. 概要（查看平台运行数据，包含交易额、注册人数、充值等）

2. 会员管理（会员信息管理、会员实名审核、会员实名管理、会员余额管理、会员充值/冻结余额等）

3. 邀请管理（会员邀请信息、会员邀请排行管理）

4. CTC管理（CTC订单管理、流水管理、承兑商管理）

5. 内容管理（PC广告管理、APP广告管理、公告管理、帮助管理）

6. 财务管理（充值提现管理、财务流水管理、对账管理、币种钱包余额管理）

7. 币币管理（新建交易对、管理交易对、新建交易机器人、设置交易机器人参数、设置行情引擎/交易引擎、撤销所有委托）

8. 活动管理（新建活动、矿机认购、抢购/瓜分管理）

9. 红包管理（平台红包管理、用户红包管理）

10. 系统管理（角色管理、部门管理、用户管理、权限管理、币种管理、RPC管理、版本管理）

11. 保证金管理（此功能设计时考虑到，但实际运营期间未使用到）

12. OTC管理（广告管理、订单管理、OTC币种管理、退保管理等，此功能未获得实际运营检验）

系统运行环境：

Centos 6.8

MySQL 5.5.16

Redis-x64-3.2.100

Mongodb 3.6.13

kafka_2.11-2.2.1

nginx-1.16.0

JRE 8u241

JDK 1.8

Vue

Zookeeper

源码大全测试截图：
