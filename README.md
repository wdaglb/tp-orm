## tp-orm扩展包

*可以使用tp6.x的动态绑定属性到父模型方法*

**安装**

`` composer require ke/tp-orm dev-master ``

**使用**

如果要使用此方法，则你的模型需要继承\ke\model\Model。而不是\think\Model

可以使用动态绑定关联属性，可以使用

```
$user = User::find(1)->bindAttr('profile',['email','nickname']);
// 输出Profile关联模型的email属性
echo $user->email;
echo $user->nickname;
```

同样支持指定属性别名

```
$user = User::find(1)->bindAttr('profile',[
	'email',
    'truename'	=> 'nickname',
]);
// 输出Profile关联模型的email属性
echo $user->email;
echo $user->truename;
```