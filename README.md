## 拾光纪----人人参与的照片交流分享社区
> 这是一个专注于摄影领域的摄影师图片交流分享社区，每个摄影师都可以上传自己的作品，并且可以欣赏其他用户的作品，同时可以对喜欢的作品进行点赞、评论。每个照片在用户上传后都需要后台管理员来审核，审核通过之后才会展示到首页。

#### 技术栈

- webupload：实时预览上传图片
- 腾讯地图api，用作判断学士与教室距离
- thinkphp5.0：用于构建后台管理系统
- html+css+javascript(es6)：使用前端三剑客完成项目的前台界面
- jQuery：使用jquery协助操作js
- MySQL：用于存储各项数据

#### 界面预览图

![首页](/tree/master/img/index.png)

![照片预览页](/tree/master/img/detail.png)

#### 安装流程：

- 在服务器搭建Linux+apache+mysql+php服务。
- 把后台源码以及数据库上传到服务器root目录下。
- 把源码放到apache服务根目录下并解压。
- 源码下runtime文件夹及子文件设置777权限。
- 修改接口地址为服务器地址。
- 建立数据库shequsql，导入根路径下`shequsql.sql`数据库。
- 修改数据库配置文件改为服务器数据库密码。
- 后台访问http://服务器ip地址/文件路径/public/admin
- 管理员账号：admin、密码：123456
- 前台访问http://服务器ip地址/文件路径/public/index
