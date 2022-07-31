# opc 安装指南
Online Programming Community

本系统基于开源的[hustoj](https://github.com/zhblue/hustoj)二次开发。
## 准备
- Ubuntu18.04
- MySQL
- Nginx


## 部署
### hustoj 建立分布式判题系统：
检查/etc/mysql/my.cnf
    
    bind-address = 0.0.0.0
    max_connections = 512

配置web 程序连接到数据库：

    include/db_info.inc.php
    static $DB_HOST="192.168.1.**";
    static $DB_NAME="**";
    static $DB_USER="**"
    static $DB_PASS="**"

配置各判题程序连接到数据库：

    OJ_HOST_NAME=192.168.1.**
    OJ_USER_NAME=**
    OJ_PASSWORD=**
    OJ_DB_NAME=**
    ...
    OJ_TOTAL=4
    OJ_MOD=本机编号，从0 开始

复制测试数据目录到各个判题机：

    从主机向判题机复制:
    scp -r /home/judge/data root@判题机ip:/home/judge/
    
    或用同步命令:
    rsync -vzrtopg --progress --delete /home/judge/data root@判题机ip:/home/judge/

    判题机从主机复制:
    scp -r root@主机ip:/home/judge/data /home/judge/
    
    或用同步命令:
    rsync -vzrtopg --progress --delete root@主机ip:/home/judge/data /home/judge/

最后在各个判题机上重新启动程序。